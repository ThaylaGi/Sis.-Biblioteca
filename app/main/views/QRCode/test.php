<?php
// Incluir bibliotecas
require_once '../../assets/fpdf/fpdf.php';
require_once '../../assets/phpqrcode/qrlib.php';

// Configurações do QR Code
$dados = "https://exemplo.com";
$arquivo_qrcode = __DIR__ . "/qrcode.png";

// Gerar o QR Code
QRcode::png($dados, $arquivo_qrcode, QR_ECLEVEL_M, 4);

// Verificar se a imagem foi criada
if (!file_exists($arquivo_qrcode) || !getimagesize($arquivo_qrcode)) {
    die("Erro: Não foi possível gerar o QR Code.");
}

// Criar o PDF
$pdf = new FPDF();
$pdf->AddPage();

// Título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Documento com QR Code', 0, 1, 'C');

// Inserir QR Code
$pdf->Image($arquivo_qrcode, 80, 30, 50, 50);

// Salvar o PDF
$pdf->Output('I', 'qrcode_document.pdf');

// Remover imagem temporária
unlink($arquivo_qrcode);
?>