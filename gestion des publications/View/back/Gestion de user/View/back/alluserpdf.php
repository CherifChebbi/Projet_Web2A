<?php
require('../../../fpdf/fpdf.php');
include 'Gestion de user/Controller/personne.php';

$UserP= new UserP();
$list = $UserP->listusers();

$pdf = new FPDF();
$pdf->AddPage();

// Add a title
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetTextColor(0, 128, 128);
$pdf->Cell(0, 15, 'User Details', 0, 1, 'C');

// Add some spacing
$pdf->Ln(10);



foreach ($list as $user) {
$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(40,10,'Id user:', 1, 0, '', true);
$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(150,10,$user['Iduser'], 1, 1, '', true);

$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(40,10,'First Name:', 1, 0, '', true);
$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(150,10,$user['Name'], 1, 1, '', true);

$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(40,10,'Surname:', 1, 0, '', true);
$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(150,10,$user['Surname'], 1, 1, '', true);

$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(40,10,'Age:', 1, 0, '', true);
$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(150,10,$user['Age'], 1, 1, '', true);

$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(40,10,'Email:', 1, 0, '', true);
$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(150,10,$user['Semail'], 1, 1, '', true);

$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(211, 211, 211);
$pdf->Cell(40,10,'Password:', 1, 0, '', true);
$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(150,10,$user['Spassword'], 1, 1, '', true);

$pdf->Ln(10);
}
$pdf->Image('logo.png', 30, 80, 80);
// Output the PDF
$pdf->Output();
