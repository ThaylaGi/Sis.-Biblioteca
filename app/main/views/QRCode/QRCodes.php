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
        $pdf->Cell($pdf->GetPageWidth() - 40, 20, "ESTANTE " . $_GET['estante'] ."  |  PRATELEIRA " . $_GET['prateleira'], 0, 1, 'C');

        $prateleira = $_GET['prateleira'];
        $estante = $_GET['estante'];

        $select_id_livro = $this->connect->query("SELECT id, titulo_livro, edicao, quantidade FROM catalogo WHERE prateleiras = 'p$prateleira' AND estantes = '$estante'");
        $id_livros = $select_id_livro->fetchAll(PDO::FETCH_ASSOC);

        // Configurações de layout
        $qr_size = 80; // Tamanho do QR code em pontos (80x80)
        $space_between = 60; // Espaço entre QR codes
        $max_per_line = 4; // Máximo de QR codes por linha
        $start_x = 30; // Posição X inicial
        $start_y = 100; // Posição Y inicial (após o cabeçalho)
        $current_x = $start_x;
        $current_y = $start_y;

        foreach ($id_livros as $cod_livro) {
            for ($i = 1; $i <= $cod_livro['quantidade']; $i++) {
                // Determinar a edição para a URL
                $edicao = ($cod_livro['edicao'] == 'ENI*' || empty($cod_livro['edicao'])) ? '0' : $cod_livro['edicao'];
                $url = "https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=https://salaberga.com/salaberga/portalsalaberga/app/subsystems/biblioteca/app/main/views/emprestimo/decisao.php?cod=" . $cod_livro['id'] . "_" . $edicao . "_" . $i . $estante . "_" . $prateleira ;

                $img_temp = tempnam(sys_get_temp_dir(), 'qr_') . '.png';
                file_put_contents($img_temp, file_get_contents($url));

                // Colocar o QR code na posição atual
                $pdf->Image($img_temp, $current_x, $current_y, $qr_size, $qr_size);

                // Configurar fonte e cor preta para o título
                $pdf->SetFont('Arial', 'B', 7.5);
                $pdf->SetTextColor(0, 0, 0); // Cor preta

                // Primeira linha: Nome do livro
                $nome_livro = utf8_decode($cod_livro['titulo_livro']);
                $pdf->SetXY($current_x, $current_y + $qr_size + 5); // 5 pontos abaixo do QR code
                $pdf->Cell($qr_size, 10, $nome_livro, 0, 0, 'C');

                // Segunda linha: ID_Edição_Quantidade
                $codigo = utf8_decode("Id: ".$cod_livro['id'] . "  |  Edicão: " . $edicao . "  |  Estante: ". $estante. "  |  Prateleira: ". $prateleira. "  |  Número: " . $i);
                $pdf->SetXY($current_x, $current_y + $qr_size + 15); // 15 pontos abaixo do QR code (10 da linha anterior + 5 de espaço)
                $pdf->Cell($qr_size, 10,$codigo, 0, 0, 'C');

                // Remover o arquivo temporário
                unlink($img_temp);

                // Atualizar a posição X para o próximo QR code
                $current_x += $qr_size + $space_between;

                // Verificar se atingiu o limite da linha
                if ($current_x + $qr_size > $pdf->GetPageWidth() - 20) {
                    $current_x = $start_x;
                    $current_y += $qr_size + 30; // Espaço para o título + margem
                }

                // Verificar se precisa de nova página
                if ($current_y + $qr_size + 30 > $pdf->GetPageHeight() - 20) {
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