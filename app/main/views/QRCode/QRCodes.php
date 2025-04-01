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
        $pdf->SetX(20);
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->SetTextColor(0, 122, 51);
        $pdf->Cell($pdf->GetPageWidth() - 40, 20, utf8_decode('QRCodes'), 0, 1, 'C');

        $pdf->SetX(20);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTextColor(255, 165, 0);
        $pdf->Cell($pdf->GetPageWidth() - 40, 20, "PRATELEIRA " . $_GET['prateleira'] . " E ESTANTE " . $_GET['estante'], 0, 1, 'C');

        $prateleira = $_GET['prateleira'];
        $estante = $_GET['estante'];

        $select_id_livro = $this->connect->query("SELECT id, titulo_livro, edicao, quantidade FROM catalogo WHERE prateleiras = 'p$prateleira' AND estantes = '$estante'");
        $id_livros = $select_id_livro->fetchAll(PDO::FETCH_ASSOC);

        // Configurações de layout
        $qr_size = 80; // Tamanho do QR code em pontos (80x80)
        $space_between = 40; // Aumentado de 20 para 40 para mais espaço entre QR codes
        $max_per_line = 4; // Máximo de QR codes por linha (ajustável)
        $start_x = 30; // Posição X inicial
        $start_y = 100; // Posição Y inicial (após o cabeçalho)
        $current_x = $start_x;
        $current_y = $start_y;

        foreach ($id_livros as $cod_livro) {
            for ($i = 0; $i < $cod_livro['quantidade']; $i++) {
                // Determinar a edição para a URL e o título
                $edicao = ($cod_livro['edicao'] == 'ENI*' || empty($cod_livro['edicao'])) ? '' : $cod_livro['edicao'];
                $url = "https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=https://salaberga.com/salaberga/portalsalaberga/app/subsystems/biblioteca/app/main/index.php?cod=" . $cod_livro['id'] . $edicao = $cod_livro['edicao'] == 'ENI*' ? '' : $cod_livro['edicao'] . $i;

                $img_temp = tempnam(sys_get_temp_dir(), 'qr_') . '.png';
                file_put_contents($img_temp, file_get_contents($url));

                // Colocar o QR code na posição atual
                $pdf->Image($img_temp, $current_x, $current_y, $qr_size, $qr_size);

                // Colocar o título abaixo do QR code
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->SetTextColor(255, 165, 0);
                $titulo = utf8_decode($cod_livro['id'] ."_". $edicao = $cod_livro['edicao'] == 'ENI*' ? '' : $cod_livro['edicao'] ."_". $i);
                $pdf->SetXY($current_x, $current_y + $qr_size + 5); // 5 pontos de espaço entre QR e título
                $pdf->Cell($qr_size, 10, $titulo, 0, 0, 'C');

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