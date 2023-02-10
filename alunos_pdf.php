<?php
include_once('fpdf185/fpdf.php');
$response = json_decode(file_get_contents('http://camerascomputex.ddns.net:8080/escola/ws_controller.php?action=getAlunosTurma&ano=20211&escola=1&grau_serie=15&turno=M&turma=1&status=C'));
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 20);
$pdf->Cell(30, 15, 'Alunos', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(15, 10, iconv('UTF-8', 'windows-1252', 'Nº'), 1, 0, 'C');
$pdf->Cell(130, 10, 'Nome', 1, 0, 'C');
$pdf->Cell(30, 10, 'Matricula', 1, 0, 'C');
$pdf->Cell(20, 10, 'Status', 1, 1, 'C');
foreach ($response as $key => $value) {
    $pdf->Cell(15, 10, $key + 1, 1, 0, 'C');
    $pdf->Cell(130, 10, iconv('UTF-8', 'windows-1252', $value->nome), 1, 0, 'C');
    $pdf->Cell(30, 10, $value->matricula, 1, 0, 'C');
    $pdf->Cell(20, 10, $value->status, 1, 1, 'C');
}
$pdf->Output('I');
