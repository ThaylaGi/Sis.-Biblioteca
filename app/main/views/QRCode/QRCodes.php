<?php
require_once('../../assets/fpdf/fpdf.php');
require_once('../../config/connect.php');

class QRCode extends connect
{
    function __construct()
    {
        parent::__construct();
        $this->pdf();
    }
    public function pdf()
    {
        $pdf = new FPDF("P", "pt", "A4");
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetX(20);
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->SetTextColor(0, 122, 51);
        $pdf->Cell($pdf->GetPageWidth() - 40, 20, utf8_decode('QRCodes'), 0, 1, 'C');

        $pdf->SetX(20);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetTextColor(255, 165, 0);
        $pdf->Cell($pdf->GetPageWidth() - 40, 20, "PRATELEIRA " .  $_GET['prateleira'] . " E ESTANTE " . $_GET['estante'], 0, 1, 'C');

        $pdf->Image("https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=ER",20, 14, 50);

        $pdf->Ln(10);
        $pdf->Output('relatorio_acervo.pdf', 'I');
    }
}
$qrcode = new QRCode;
?>
<img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=ER" alt="">