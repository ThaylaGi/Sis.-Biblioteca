<?php
require_once('../../assets/fpdf/fpdf.php');
require_once('../../config/connect.php');
class QRCode extends connect
{
    function __construct()
    {
        parent::__construct();
        $this->pdf();
        // $this->test(); // Descomente para testar a consulta
    }

    public function pdf()
    {
        $pdf = new FPDF("P", "pt", "A4");
        $pdf->AliasNbPages();
        $pdf->AddPage();

        // Cabeçalho
        $pdf->Image('../../assets/img/logo_incolor.jpg', 8, 8, 60, 60, 'JPG');
        $pdf->SetX(20);
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell($pdf->GetPageWidth() - 40, 20, utf8_decode('Sistema Biblioteca STGM'), 0, 1, 'C');

        $pdf->SetX(20);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell($pdf->GetPageWidth() - 40, 20, "ESTANTE " . $_GET['estante'] . "  |  PRATELEIRA " . $_GET['prateleira'], 0, 1, 'C');

        $prateleira = filter_var($_GET['prateleira'], FILTER_SANITIZE_STRING);
        $estante = filter_var($_GET['estante'], FILTER_SANITIZE_STRING);

        // Verificar se estante e prateleira são válidos
        if (empty($prateleira) || empty($estante)) {
            die("Erro: Estante ou prateleira não especificados.");
        }

        $select_id_livro = $this->connect->query("SELECT id, titulo_livro, edicao, quantidade FROM catalogo WHERE prateleiras = 'p$prateleira' AND estantes = '$estante'");
        $id_livros = $select_id_livro->fetchAll(PDO::FETCH_ASSOC);

        // Configurações de layout
        $qr_size = 75; // Tamanho do QR code ajustado para 75x75 pontos
        $space_between = 50; // Espaço entre QR codes
        $max_per_line = 4; // Máximo de QR codes por linha
        $start_x = 30; // Posição X inicial
        $start_y = 100; // Posição Y inicial (após o cabeçalho)
        $current_x = $start_x;
        $current_y = $start_y;

        foreach ($id_livros as $cod_livro) {
            for ($i = 1; $i <= $cod_livro['quantidade']; $i++) {
                // Determinar a edição para a URL
                $edicao = ($cod_livro['edicao'] == 'ENI*' || empty($cod_livro['edicao'])) ? '0' : $cod_livro['edicao'];

                // Verificar se as variáveis são válidas
                if (empty($cod_livro['id']) || empty($edicao) || empty($i) || empty($estante) || empty($prateleira)) {
                    die("Erro: Dados inválidos para o QR code (ID: {$cod_livro['id']}, Edição: $edicao, Número: $i, Estante: $estante, Prateleira: $prateleira)");
                }
                $id_livro = $cod_livro['id'];
                // Construir os dados para o QR code
                $data = "https://salaberga.com/salaberga/portalsalaberga/app/subsystems/biblioteca/app/main/views/emprestimo/decisao.php?cod=" . $id_livro . "_" . $edicao . "_" . $i . $estante . "_" . $prateleira;

                
                // Usar qr_img.php localmente
                $url = __DIR__ . "/qrcode/php/qr_img.php?d=" . urlencode($data) . "&e=M&s=4";

                $img_temp = tempnam(sys_get_temp_dir(), 'qr_') . '.png';
                $qr_content = file_get_contents($url);

                // Verificar se o QR code foi gerado com sucesso
                if ($qr_content === false) {
                    die("Erro ao gerar QR code para o livro ID: " . $cod_livro['id'] . ". URL: $url");
                }

                file_put_contents($img_temp, $qr_content);

                // Colocar o QR code na posição atual
                $pdf->Image($img_temp, $current_x, $current_y, $qr_size, $qr_size);

                // Configurar fonte e cor preta para o título
                $pdf->SetFont('Arial', 'B', 7);
                $pdf->SetTextColor(0, 0, 0); // Cor preta

                // Primeira linha: Nome do livro
                $nome_livro = utf8_decode($cod_livro['titulo_livro']);
                $pdf->SetXY($current_x, $current_y + $qr_size + 5); // 5 pontos abaixo do QR code
                $pdf->Cell($qr_size, 10, $nome_livro, 0, 0, 'C');

                // Segunda linha: ID, Edição e Número
                $info_livro = utf8_decode("ID: " . $cod_livro['id'] . " | Ed: " . $edicao . " | Nº: " . $i);
                $pdf->SetXY($current_x, $current_y + $qr_size + 15); // 10 pontos abaixo da linha anterior
                $pdf->Cell($qr_size, 10, $info_livro, 0, 0, 'C');

                // Terceira linha: Estante e Prateleira
                $info_local = utf8_decode("Est: " . $estante . " | Prat: " . $prateleira);
                $pdf->SetXY($current_x, $current_y + $qr_size + 25); // 10 pontos abaixo da linha anterior
                $pdf->Cell($qr_size, 10, $info_local, 0, 0, 'C');

                // Remover o arquivo temporário
                unlink($img_temp);

                // Atualizar a posição X para o próximo QR code
                $current_x += $qr_size + $space_between;

                // Verificar se atingiu o limite da linha
                if ($current_x + $qr_size > $pdf->GetPageWidth() - 20) {
                    $current_x = $start_x;
                    $current_y += $qr_size + 40; // Espaço para o título + margem
                }

                // Verificar se precisa de nova página
                if ($current_y + $qr_size + 40 > $pdf->GetPageHeight() - 20) {
                    $pdf->AddPage();
                    $current_x = $start_x;
                    $current_y = 20; // Posição Y inicial na nova página
                }
            }
        }

        $pdf->Output('relatorio_acervo.pdf', 'I');
    }

    public function test()
    {
        $prateleira = $_GET['prateleira'];
        $estante = $_GET['estante'];
        $select_id_livro = $this->connect->query("SELECT id, titulo_livro, edicao, quantidade FROM catalogo WHERE prateleiras = 'p$prateleira' AND estantes = '$estante'");
        $id_livros = $select_id_livro->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        print_r($id_livros);
        echo "</pre>";
    }
}

$qrcode = new QRCode;
?>