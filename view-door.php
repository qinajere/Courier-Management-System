<?php

session_start();

require_once('database.php');


	


require('fpdf/fpdf.php');

$pdf = $pdf = new FPDF('P','mm','A4');
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetTitle("door to door_pdf",false);

$pdf->SetFont('Arial','',12);

$pdf->SetX(40);
$pdf->Cell(100, 0,'RATES FOR AMPEX COURIER  ',0 ,1);

$y_axis = 30; 

$row_height = 6;




$sql2 ="SELECT distinct category_id FROM rate_table WHERE service_id = 2 order by category_id ASC ";

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
			  
			  $sql = "SELECT kilo_range.range, rate_table.rate, rate_table.vat, rate_table.total FROM rate_table,kilo_range WHERE kilo_range.range_id = rate_table.range_id and rate_table.service_id = 2 and rate_table.category_id = $category and rate_table.type = 'within city' order by category_id ASC" ;
$result = dbQuery($sql);	

$sql3 = "SELECT DISTINCT cat_sources.source FROM cat_destination, cat_sources WHERE ((cat_destination.service_id = cat_sources.service_id) AND (cat_destination.category_id = cat_sources.category_id)) AND ((cat_destination.service_id = 2) AND (cat_destination.category_id = $category) AND (cat_sources.type = 'within city') ); "; 

$result3 = dbQuery($sql3);

               while($data3 = dbFetchAssoc($result3))
	                {
						$source = $data3['source'];
						$sources = $sources. " ". $source;
					}
					
					$sql4 = "SELECT DISTINCT cat_destination.destination FROM cat_destination, cat_sources WHERE ((cat_destination.service_id = cat_sources.service_id) AND (cat_destination.category_id = cat_sources.category_id)) AND ((cat_destination.service_id = 2) AND (cat_destination.category_id = $category) AND  (cat_destination.type = 'within city')); "; 

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
			  $pdf->Cell(60, 5,'CATEGORY '.$category . '    DOOR TO DOOR  WITHIN CITY ',0 ,1 ,'L');

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
$pdf->Cell(60, 5,'CATEGORY '.$category . '    DOOR TO DOOR  WITHIN CITY',0 ,1 ,'L');

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
	 

 
 
 // OUTSIDE CITY RATES
 
 
 
 
 $sql10 ="SELECT distinct category_id FROM rate_table WHERE service_id = 2 and type = 'outside city' order by category_id ASC ";

 $result10 = dbQuery($sql10);

 
  while($data10 = dbFetchAssoc($result10))
	     {
			 $sources = "";
			 $destinations = "";
			  $category  = $data10['category_id']; 
			  
			  $sql11 = "SELECT kilo_range.range, rate_table.rate, rate_table.vat, rate_table.total FROM rate_table,kilo_range WHERE kilo_range.range_id = rate_table.range_id and rate_table.service_id = 2 and rate_table.category_id = $category and rate_table.type = 'outside city' order by category_id ASC" ;
			  
		  
$result11 = dbQuery($sql11);	

$sql12 = "SELECT DISTINCT cat_sources.source FROM cat_destination, cat_sources WHERE ((cat_destination.service_id = cat_sources.service_id) AND (cat_destination.category_id = cat_sources.category_id)) AND ((cat_destination.service_id = 2) AND (cat_destination.category_id = $category) AND (cat_sources.type = 'outside city') ); "; 

$result12 = dbQuery($sql12);

               while($data12 = dbFetchAssoc($result12))
	                {
						$source = $data12['source'];
						$sources = $sources. " ". $source;
					}
					
					$sql13 = "SELECT DISTINCT cat_destination.destination FROM cat_destination, cat_sources WHERE ((cat_destination.service_id = cat_sources.service_id) AND (cat_destination.category_id = cat_sources.category_id)) AND ((cat_destination.service_id = 2) AND (cat_destination.category_id = $category) AND  (cat_destination.type = 'outside city')); "; 

$result13 = dbQuery($sql13);

               while($data13 = dbFetchAssoc($result13))
	                {
						$destination = $data13['destination'];
						$destinations = $destinations. " ". $destination;
					}


 if ($i == $max)
            {
              $pdf->AddPage();
              //print column titles for the current page
			  $pdf->SetFont('Arial', 'B', 12);
              $pdf->SetY($y_axis_initial - 10);
              $pdf->SetX(15);
			  $pdf->Cell(60, 5,'CATEGORY '.$category . '    DOOR TO DOOR  OUTSIDE CITY',0 ,1 ,'L');

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
$pdf->Cell(60, 5,'CATEGORY '.$category . '    DOOR TO DOOR OUTSIDE CITY',0 ,1 ,'L');

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

			
        
			 
			   while($data11 = dbFetchAssoc($result11))
	                {
						$range = $data11['range'];
                        $rate = $data11['rate'];
                        $vat =$data11['vat'];
                        $total = $data11['total'];
                        

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




