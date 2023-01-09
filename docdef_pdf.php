<?php

require_once 'FPDF/fpdf.php';
require_once 'connection.php';

$query="SELECT * from tbl_patient";
$data = mysqli_query($con,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

    $pdf->cell('0','20', 'Patient Details', '0', '1', 'L', false);
    $pdf->cell('30','10','Sl No','1','0','C');
    $pdf->cell('60','10','Name','1','0','C');
    // $pdf->cell('15','10','Email','1','0','C');
    $pdf->cell('60','10','Phone','1','1','C');
    
    
    $pdf->SetFont('arial','','10');
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('30','10',$row['p_id'],'1','0','C');
        $pdf->cell('60','10',$row['name'],'1','0','C');
        // $pdf->cell('15','10',$row['email'],'1','0','C');
        $pdf->cell('60','10',$row['phone'],'1','1','C');
        
    } 
    $pdf->Output();

}
	?>