
<?php

require_once 'FPDF/fpdf.php';
//require_once '../config.php';

include '../controller/reclamationC.php';
$reclamationC=new reclamationC();
	$listereclamation=$reclamationC->afficherreclamation();

if(isset($_POST['btn_pdf']))
{
    //echo 'working';
    $pdf=new FPDF('l','mm','a4');
    $pdf->AddPage();
    $pdf->SetFont('arial','b',16);
    $pdf->Cell(40,10,'id :','1','0','C');
    $pdf->Cell(40,10,'contact :','1','0','C');
    $pdf->Cell(40,10,'type :','1','0','C');
    $pdf->Cell(40,10,'destinataire :','1','0','C');
    $pdf->Cell(40,10,'statut :','1','0','C');
    $pdf->Cell(40,10,'description :','1','1','C',);
    
    foreach($listereclamation as $reclamation)
    {
        $pdf->Cell(40,10,$reclamation['id'],'1','0','C');
        $pdf->Cell(40,10,$reclamation['contact'],'1','0','C');
        $pdf->Cell(40,10,$reclamation['type'],'1','0','C');
        $pdf->Cell(40,10,$reclamation['destinataire'],'1','0','C');
        $pdf->Cell(40,10,$reclamation['statut'],'1','0','C');
        $pdf->Cell(40,10,$reclamation['description'],'1','1','C');

    }
    $pdf->Output();
    
				
}


?>

			