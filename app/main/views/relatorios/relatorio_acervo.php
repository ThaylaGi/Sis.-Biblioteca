<?php
require_once('../../assets/fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../../assets/img/logo.png', 20, 14, 50);

        $this->Ln(20);

        $this->SetX(20);
        $this->SetFont('Arial', 'B', 20);
        $this->SetTextColor(0, 122, 51);
        $this->Cell($this->GetPageWidth() - 40, 20, utf8_decode('RELATÓRIO GERAL DE ACERVO'), 0, 1, 'C');

        $this->SetX(20);
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(255, 165, 0);
        $this->Cell($this->GetPageWidth() - 40, 20, "BIBLIOTECA STGM", 0, 1, 'C');

        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(0, 122, 51);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF("L", "pt", "A4");
$pdf->AliasNbPages();
$pdf->AddPage();

$pdo = new PDO("mysql:host=localhost;dbname=u750204740_sistBiblioteca;charset=utf8", "u750204740_sistBiblioteca", "paoComOvo123!@##");

$acervo = $pdo->prepare("SELECT 
    c.titulo_livro, 
    a.nome_autor,
    a.sobrenome_autor,
    c.edicao,
    c.quantidade,
    g.generos,
    sg.subgenero
    FROM catalogo c
    INNER JOIN autores a ON c.id = a.id_livro
    INNER JOIN genero g ON c.id_genero = g.id
    LEFT JOIN subgenero sg ON c.id_subgenero = sg.id
    ORDER BY c.titulo_livro");
$acervo->execute();
$result = $acervo->fetchAll(PDO::FETCH_ASSOC);

$pageWidth = $pdf->GetPageWidth() - 40; 
$colunas = array(
    array('largura' => $pageWidth * 0.25, 'texto' => utf8_decode('TÍTULO')),
    array('largura' => $pageWidth * 0.15, 'texto' => 'NOME AUTOR'),
    array('largura' => $pageWidth * 0.17, 'texto' => 'SOBRENOME'), // Aumentado para 17%
    array('largura' => $pageWidth * 0.10, 'texto' => utf8_decode('GÊNERO')), // Reduzido para 10%
    array('largura' => $pageWidth * 0.12, 'texto' => utf8_decode('SUBGÊNERO')),
    array('largura' => $pageWidth * 0.04, 'texto' => 'QTD'),
    array('largura' => $pageWidth * 0.17, 'texto' => utf8_decode('EDIÇÃO'))
);

$pdf->SetX(20);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(0, 122, 51);
$pdf->SetTextColor(255, 255, 255);

foreach ($colunas as $coluna) {
    $pdf->Cell($coluna['largura'], 20, $coluna['texto'], 1, 0, 'C', true);
}
$pdf->Ln();

$pdf->SetFont('Arial', '', 9);
foreach ($result as $i => $row) {
    $pdf->SetX(20);
    $pdf->SetFillColor($i % 2 == 0 ? 255 : 240, $i % 2 == 0 ? 255 : 240, $i % 2 == 0 ? 255 : 240);
    $pdf->SetTextColor(0, 0, 0);

    $titulo = utf8_decode(mb_strtoupper($row['titulo_livro'], 'UTF-8'));
    $nomeAutor = utf8_decode(mb_strtoupper($row['nome_autor'] ?? 'N/A', 'UTF-8'));
    $sobrenome = utf8_decode(mb_strtoupper($row['sobrenome_autor'] ?? 'N/A', 'UTF-8'));
    $genero = utf8_decode(mb_strtoupper($row['generos'] ?? 'N/A', 'UTF-8'));
    $subgenero = utf8_decode(mb_strtoupper($row['subgenero'] ?? 'N/A', 'UTF-8'));
    $quantidade = $row['quantidade'] ?? 1;
    // Verifica se edicao é NULL ou vazio e define "EDIÇÃO NÃO INFORMADA"
    $edicao = empty($row['edicao']) ? utf8_decode(mb_strtoupper('EDIÇÃO NÃO INFORMADA', 'UTF-8')) : utf8_decode(mb_strtoupper($row['edicao'], 'UTF-8'));

    $pdf->Cell($colunas[0]['largura'], 20, $titulo, 1, 0, 'L', true);
    $pdf->Cell($colunas[1]['largura'], 20, $nomeAutor, 1, 0, 'L', true);
    $pdf->Cell($colunas[2]['largura'], 20, $sobrenome, 1, 0, 'L', true);
    $pdf->Cell($colunas[3]['largura'], 20, $genero, 1, 0, 'L', true);
    $pdf->Cell($colunas[4]['largura'], 20, $subgenero, 1, 0, 'L', true);
    $pdf->Cell($colunas[5]['largura'], 20, $quantidade, 1, 0, 'C', true);
    $pdf->Cell($colunas[6]['largura'], 20, $edicao, 1, 1, 'C', true);
}

$totalLivros = count($result);

$pdf->Ln(20);
$pdf->SetX(20);
$pdf->SetTextColor(0, 122, 51);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'TOTAL DE LIVROS: ' . $totalLivros, 0, 1, 'L');

$pdf->Output('relatorio_acervo.pdf', 'I');
?>