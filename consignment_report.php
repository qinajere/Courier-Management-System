<?php
session_start();

require_once('database.php');

$source = $_POST['source'];
$destination = $_POST['destination'];
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$status = $_POST['status'];

$off = $_SESSION['office'];


$sql_2 = " SELECT waybill_no, consignor_name, consignee_name, destination, description, weight, total_charged, way_date, status 
	          FROM waybill
	          WHERE source = '$source' 
			  AND
             (way_date BETWEEN '$fromdate' AND '$todate')
			 AND   comment = 'active'
	         ";
			 
			 
		if ($destination != "All")
		{
			$sql_2.= "  AND destination = '$destination' ";
		}
		
		
		if ($status != "All")
		{
			$sql_2.= "  AND status = '$status' ";
		}
		
	 $result = dbQuery($sql_2);
	// echo $sql_2;
	 
	
	require('fpdf/fpdf.php');

$pdf = $pdf = new FPDF('L','mm','A4');
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetTitle("consignment report_pdf",false);

$pdf->Image('AMPEX logo.png',10,6,30);

$pdf->SetFont('Arial','',11);

$pdf->SetX(40);
$pdf->Cell(100, 0,'AMPEX LIMITED',0 ,1);

$pdf->SetX(40);
$pdf->Cell(100, 10,'tel: +265 111 820 100 ',0 ,1);


$pdf->SetX(40);
$pdf->Cell(100, 10,'E-mail: ampex@agmaholdingsmw.com ',0 ,1);

$pdf->SetFont('Arial','B',16);

$pdf->SetY(30);
$pdf->Cell(270, 20,'CONSIGNMENT REPORT',0 ,1 ,"C");


$pdf->SetFont('Arial','',10);

$pdf->SetY(50);

$pdf->Cell(80, 10,'BRANCH:'.$source,0 ,0 ,"C");

$pdf->Cell(20, 10,'DATE:   From: '.$fromdate,0 ,0 ,"C");
$pdf->Cell(60, 10,'To: '.$todate,0 ,0 ,"C");
$pdf->Cell(30, 10,'Destination: '.$destination,0 ,0 ,"C");

$pdf->Cell(70, 10,'Status: '.$status,0 ,1 ,"C");


$y_axis = 70; 

$row_height = 6;


$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->Cell(30, 6, 'WAYBILL NO.', 1, 0, 'L', 1);
$pdf->Cell(45, 6, 'CONSIGNER', 1, 0, 'L', 1);
$pdf->Cell(45, 6, 'CONSIGNEE', 1, 0, 'L', 1);
$pdf->Cell(45, 6, 'DESCRIPTION', 1, 0, 'L', 1);
$pdf->Cell(45, 6, 'DESTINATION', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'STATUS', 1, 0, 'R', 1);
$pdf->Cell(25, 6, 'DATE', 1, 0, 'L', 1);
$y_axis = $y_axis + $row_height;


$y_axis_initial = 25;


$i = 0;
//Set maximum rows per page
$max = 20;
//Set Row Height
$sum=0;


 while($data = dbFetchAssoc($result))
	{
	
	extract($data)	;
		
		if ($i == $max)
            {
              $pdf->AddPage();
              //print column titles for the current page
              $pdf->SetY($y_axis_initial);
              $pdf->SetX(15);
              $pdf->Cell(30, 6, 'WAYBILL NO.', 1, 0, 'L', 1);
              $pdf->Cell(45, 6, 'CONSIGNER', 1, 0, 'L', 1);
              $pdf->Cell(45, 6, 'CONSIGNEE', 1, 0, 'L', 1);
              $pdf->Cell(45, 6, 'DESCRIPTION', 1, 0, 'L', 1);
              $pdf->Cell(45, 6, 'DESTINATION', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'STATUS', 1, 0, 'R', 1);
			  $pdf->Cell(25, 6, 'DATE', 1, 0, 'L', 1);
              //Go to next row
			  $y_axis = $y_axis_initial;
              $y_axis = $y_axis + $row_height;
              //Set $i variable to 0 (first row)
              $i = 0;
			}
		

$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->Cell(30, 6, $waybill_no, 1, 0, 'L', 1);
$pdf->Cell(45, 6, $consignor_name, 1, 0, 'L', 1);
$pdf->Cell(45, 6, $consignee_name, 1, 0, 'L', 1);
$pdf->Cell(45, 6, $description, 1, 0, 'L', 1);
$pdf->Cell(45, 6, $destination, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $status, 1, 0, 'R', 1);
$pdf->Cell(25, 6, $way_date, 1, 0, 'L', 1);



 

    $sum += 1;
//Go to next row
$y_axis = $y_axis + $row_height;
$i = $i + 1;

			
	}


$pdf->SetY($y_axis + 20);
$pdf->Setx(150);
$pdf->SetFont('Arial','B',11);

$pdf->Cell(80, 6, 'TOTAL NUMBER OF CONSIGNMENTS',0 , 0, 'L',0);
$pdf->Cell(30, 6 ,$sum , 0, 0, 'L',1);
	
	

$pdf->Output();

	
	
	
	
	



		
		
		
			 

			 
			 
     





?>