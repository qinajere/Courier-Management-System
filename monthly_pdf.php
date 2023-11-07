<?php

session_start();

require_once('database.php');

	
	$month = $_POST['month'];
	$year = $_POST['year'];
	
	
$sql = "SELECT day(way_date) AS DATE";

   $sql2 = "SELECT location FROM office";
             $result2 = dbQuery($sql2);
			 
             while($data2 = dbFetchAssoc($result2))
		           {
			
			 $off = $data2['location'];
			 
			 $sql = $sql.", SUM(CASE WHEN source= '$off' THEN total_charged ELSE 0 END) AS '$off'";
			 
		           }
	
	$sql = $sql. "FROM waybill WHERE MONTHNAME(way_date) = '$month'
	              AND YEAR(way_date) = '$year' AND ( ";
				  
				  
				  $days = 1;
				  
				  while($days <= 31)
				  {
					 
					  if ($days == 31)
					  {
						   $sql = $sql. "day(way_date) = '$days' )";
					  }
					  else
					  {
						   $sql = $sql. "day(way_date) = '$days' OR ";
					  }
					  $days = $days + 1;
				  }
				  
				  
	           $sql = $sql. " GROUP BY day(way_date) ORDER BY day(way_date) ASC";

            $result = dbQuery($sql);
			
			// echo $sql;
			

require('fpdf/fpdf.php');

$pdf = $pdf = new FPDF('L','mm','A4');
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetTitle("Manifest_pdf",false);

$pdf->Image('AMPEX logo.png',10,6,30);

$pdf->SetFont('Arial','',11);

$pdf->SetX(40);
$pdf->Cell(100, 0,'AMPEX LIMITED',0 ,1);

$pdf->SetX(40);
$pdf->Cell(100, 10,'tel: +265 111 820 100 ',0 ,1);


$pdf->SetX(40);
$pdf->Cell(100, 10,'E-mail: ampex@agmaholdingsmw.com ',0 ,1);



$pdf->SetY(50);
$pdf->SetFont('Arial','',10);
$pdf->SetX(22);

$pdf->Cell(80, 10,$month." ".$year. " MONTHLY REVENUE ANALYSIS REPORT FOR COURIER DEPORTS",0 ,0 );



$y_axis = 70; 

$row_height = 6;




$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->SetFont('Arial', 'B', 11);
              $pdf->Cell(25, 6, 'DATE.', 0, 0, 'C', 0);
              $pdf->Cell(25, 6, 'BLANTYRE', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'LILONGWE', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'MZUZU', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'ZOMBA', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'MANGOCHI', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'SALIMA', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'KARONGA', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'MZIMBA', 1, 0, 'L', 0);
			  $pdf->Cell(25, 6, 'TOTAL', 1, 0, 'L', 0);

$y_axis = $y_axis + $row_height;


$y_axis_initial = 25;


$i = 0;
//Set maximum rows per page
$max = 20;
//Set Row Height

$tbt = 0;
$tll = 0;
$tmz = 0;
$tzm = 0;
$tmgc = 0;
$tslm = 0;
$tkrn = 0;
$tmzb = 0;
$ttotal = 0;
// totals


 while($data = dbFetchAssoc($result))
	{
		
		if ($i == $max)
            {
              $pdf->AddPage();
              //print column titles for the current page
			  $pdf->SetFont('Arial', 'B', 11);

              $pdf->SetY($y_axis_initial);
              $pdf->SetX(15);
              $pdf->Cell(25, 6, 'DATE.', 0, 0, 'C', 0);
              $pdf->Cell(25, 6, 'BLANTYRE', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'LILONGWE', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'MZUZU', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'ZOMBA', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'MANGOCHI', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'SALIMA', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'KARONGA', 1, 0, 'L', 0);
              $pdf->Cell(25, 6, 'MZIMBA', 1, 0, 'L', 0);
			  $pdf->Cell(25, 6, 'TOTAL', 1, 0, 'L', 0);
              //Go to next row
			  $y_axis = $y_axis_initial;
              $y_axis = $y_axis + $row_height;
              //Set $i variable to 0 (first row)
              $i = 0;
			}
			
			
			
$date = $data['DATE'];
$bt = $data['BLANTYRE'];
$ll =$data['LILONGWE'];
$mz = $data['MZUZU'];
$zm = $data['ZOMBA'];
$mgc = $data['MANGOCHI'];
$slm = $data['SALIMA'];
$krn = $data['KARONGA'];
$mzb = $data['MZIMBA'];


$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->SetFont('Arial', '', 11);

$pdf->Cell(25, 6, $date, 0, 0, 'C', 0);
$pdf->Cell(25, 6, $bt, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $ll, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $mz, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $zm, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $mgc, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $slm, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $krn, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $mzb, 1, 0, 'L', 0);

$total = $bt + $ll + $mz + $zm + $mgc + $slm + $krn + $mzb;

$pdf->Cell(25, 6,$total , 1, 0, 'L', 0);

$tbt += $bt;
$tll += $ll;
$tmz += $mz;
$tzm += $zm;
$tmgc += $mgc;
$tslm += $slm;
$tkrn += $krn;
$tmzb += $mzb;
$ttotal += $total;
 


//Go to next row
$y_axis = $y_axis + $row_height;
$i = $i + 1;

			
	}
	
$pdf->SetY($y_axis);
$pdf->Setx(15);
$pdf->SetFont('Arial','B',11);

$pdf->Cell(25, 6, '', 0, 0, 'L', 0);
$pdf->Cell(25, 6, $tbt, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $tll, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $tmz, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $tzm, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $tmgc, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $tslm, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $tkrn, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $tmzb, 1, 0, 'L', 0);
$pdf->Cell(25, 6, $ttotal, 1, 0, 'L', 0);


$pdf->Output();




?>




