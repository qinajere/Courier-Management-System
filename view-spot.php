<?php

session_start();

require_once('database.php');


	


require('fpdf/fpdf.php');

$pdf = $pdf = new FPDF('P','mm','A4');
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetTitle("Spotcash_pdf",false);

$pdf->SetFont('Arial','',12);

$pdf->SetX(40);
$pdf->Cell(100, 0,'RATES FOR AMPEX COURIER  ',0 ,1);

$y_axis = 30; 

$row_height = 6;




$sql2 ="SELECT distinct category_id FROM rate_table WHERE service_id = 1 order by category_id ASC ";

 $result2 = dbQuery($sql2);
 
 $i = 0;
//Set maximum rows per page
$max = 30;
//Set Row Height

 
  while($data2 = dbFetchAssoc($result2))
	     {
			 $sources = "";
			 $destinations = "";
			  $category  = $data2['category_id']; 
			  
			  $sql = "SELECT kilo_range.range, rate_table.rate, rate_table.vat, rate_table.total FROM rate_table,kilo_range WHERE kilo_range.range_id = rate_table.range_id and rate_table.service_id = 1 and rate_table.category_id = $category order by category_id ASC" ;
$result = dbQuery($sql);	

$sql3 = "SELECT DISTINCT cat_sources.source FROM cat_destination, cat_sources WHERE ((cat_destination.service_id = cat_sources.service_id) AND (cat_destination.category_id = cat_sources.category_id)) AND ((cat_destination.service_id = 1) AND (cat_destination.category_id = $category)); "; 

$result3 = dbQuery($sql3);

               while($data3 = dbFetchAssoc($result3))
	                {
						$source = $data3['source'];
						$sources = $sources. " ". $source;
					}
					
					$sql4 = "SELECT DISTINCT cat_destination.destination FROM cat_destination, cat_sources WHERE ((cat_destination.service_id = cat_sources.service_id) AND (cat_destination.category_id = cat_sources.category_id)) AND ((cat_destination.service_id = 1) AND (cat_destination.category_id = $category)); "; 

$result4 = dbQuery($sql4);

               while($data4 = dbFetchAssoc($result4))
	                {
						$destination = $data4['destination'];
						$destinations = $destinations. " ". $destination;
					}


 if ($i == $max)
            {
              $pdf->AddPage();
              //print column titles for the current page
			  $pdf->SetFont('Arial', 'B', 12);
              $pdf->SetY($y_axis_initial - 10);
              $pdf->SetX(15);
			  $pdf->Cell(60, 5,'CATEGORY '.$category . '    CREDIT',0 ,1 ,'L');

              $pdf->SetFont('Arial', 'B', 8);
              $pdf->SetX(15);
              $pdf->Cell(120, 5,$sources.' ....... '.$destinations,0 ,1 ,'L');
			 
			  
			  $pdf->SetY($y_axis_initial);
			  $pdf->SetX(15);
              
			  $pdf->SetFont('Arial', 'B', 12);
              $pdf->Cell(45, 6, 'WEGHT(KGS)', 1, 0, 'L', 0);
              $pdf->Cell(45, 6, 'RATE', 1, 0, 'L', 0);
              $pdf->Cell(45, 6, 'VAT', 1, 0, 'L', 0);
              $pdf->Cell(45, 6, 'TOTAL', 1, 0, 'L', 0);

              //Go to next row
			  $y_axis = $y_axis_initial;
              $y_axis = $y_axis + $row_height;
              //Set $i variable to 0 (first row)
              $i = 0;
			}
			else
			{
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis - 10);
$pdf->SetX(15);
$pdf->Cell(60, 5,'CATEGORY '.$category . '    SPOTCASH',0 ,1 ,'L');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetX(15);
$pdf->Cell(120, 5,$sources.' ....... '.$destinations,0 ,1 ,'L');


$pdf->SetY($y_axis );
$pdf->SetX(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(45, 6, 'WEGHT(KGS)', 1, 0, 'L', 0);
$pdf->Cell(45, 6, 'RATE', 1, 0, 'L', 0);
$pdf->Cell(45, 6, 'VAT', 1, 0, 'L', 0);
$pdf->Cell(45, 6, 'TOTAL', 1, 0, 'L', 0);
$y_axis = $y_axis + $row_height;
			}
			
			
$y_axis_initial = 25;

			
        
			 
			   while($data = dbFetchAssoc($result))
	                {
						$range = $data['range'];
                        $rate = $data['rate'];
                        $vat =$data['vat'];
                        $total = $data['total'];
                        

                        $pdf->SetY($y_axis);
                        $pdf->SetX(15);
                        $pdf->Cell(45, 6, $range, 1, 0, 'L', 0);
                        $pdf->Cell(45, 6, $rate, 1, 0, 'L', 0);
                        $pdf->Cell(45, 6, $vat, 1, 0, 'L', 0);
                        $pdf->Cell(45, 6, $total, 1, 0, 'L', 0);
						
                        
                      //Go to next row
                       $y_axis = $y_axis + $row_height;
                       $i = $i + 1;
						
		            }
			  
			  
			  $y_axis = $y_axis + 15;
		 }
	 


$pdf->Output();




?>




