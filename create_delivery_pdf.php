<?php

session_start();

require_once('database.php');


	
	$deliverydate = $_POST['deliverydate'];
	$source = $_POST['source'];
	$drivername = $_POST['drivername'];
	$vehicle = $_POST['vehicle'];
	$createdby =$_SESSION['employee'];
	$code = $_SESSION['user_code'];

$sqlc = "SELECT delivery
		FROM seq_note
		WHERE code = '$code'";
$resultc = dbQuery($sqlc);

$datac = dbFetchAssoc($resultc);

$last_code = $datac['delivery'];

$man_code = (int)$last_code + 1;

$deliveryno  = "DLV-".$code.str_pad($man_code,6, "0", STR_PAD_LEFT);		
		
	$sql_2 = " SELECT waybill_no, consignor_name, consignee_name, description, quantity, consignor_add, consignee_add
	          FROM waybill
	          WHERE destination = '$source'
			  AND   status = 'at destination'
			  AND  service_type != 'spotcash'
			  
	         ";
     $result = dbQuery($sql_2);
	 
	 $no = dbNumRows($result);
	 
	 
	 if($no >= 1) 
		{
			
			$sql = "INSERT INTO delivery_note (delivery_no, office, date, driver, vehicle, created_by)
			VALUES ('$deliveryno', '$source', '$deliverydate', '$drivername', '$vehicle','$createdby')";
	        dbQuery($sql);

			
				
			while($row = dbFetchAssoc($result))
             {
				 
				    
			
                             $wybno = $row['waybill_no'];
						$sql_3 = "INSERT INTO delivery_details (delivery_no, waybill_no, status)
			            VALUES ('$deliveryno', '$wybno', 'out for delivery')";
							 
		                    dbQuery($sql_3);
				  
				           $sql_1 = "UPDATE waybill 
	                       SET status = 'out for delivery'
			               WHERE destination = '$source'
			               AND   waybill_no = '$wybno'
			               AND   status = 'at destination'
	                        ";
                            dbQuery($sql_1);

			 }
			

	
	$sql_4 = " SELECT delivery_details.delivery_no, delivery_details.waybill_no, waybill.waybill_no, waybill.consignor_name, waybill.consignee_name, waybill.description, waybill.quantity, waybill.consignor_add, waybill.consignee_add
	          FROM waybill,delivery_details
	          WHERE delivery_details.delivery_no = '$deliveryno'
			  AND   waybill.destination = '$source'
			  AND   delivery_details.waybill_no = waybill.waybill_no
			 
	         ";
			 
			$result2 = dbQuery($sql_4);
			
$sql_3= "UPDATE seq_note
	          SET delivery = '$man_code'
			  WHERE code = '$code'
	         ";
	dbQuery($sql_3);

			

require('fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4');
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

$pdf->SetFont('Arial','B',16);

$pdf->SetY(30);
$pdf->Cell(270, 20,'DELIVERY SHEET',0 ,1 ,"C");


$pdf->SetFont('Arial','',10);

$pdf->SetY(50);

$pdf->Cell(110, 10,'Delivery Sheet No: '.$deliveryno,0 ,0 ,"C");

$pdf->Cell(20, 10,'Date: '.$deliverydate,0 ,0 ,"C");
$pdf->Cell(50, 10,'Driver: '.$drivername,0 ,0 ,"C");
$pdf->Cell(70, 10,'Vehicle: '.$vehicle,0 ,1 ,"C");

$pdf->Cell(80, 10,'Manifest No: '.$deliveryno,0 ,0 ,"C");

$pdf->Cell(20, 10,'Date: '.$deliverydate,0 ,0 ,"C");
$pdf->Cell(70, 10,'Driver: '.$drivername,0 ,0 ,"C");
$pdf->Cell(20, 10,'Vehicle: '.$vehicle,0 ,0 ,"C");
$pdf->Cell(90, 10,'Destination: '.$source,0 ,1 ,"C");

$pdf->Cell(90, 10,'Dispatched by: '.$createdby,0 ,1 ,"C");

$y_axis = 70; 

$row_height = 6;


$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->Cell(30, 6, 'WB NO.', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'CONSIGNER', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'ADD', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'CONSIGNEE', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'ADD', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'DESC', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'QTY', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'RECIEVER', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'SIGN', 1, 0, 'R', 1);
$y_axis = $y_axis + $row_height;


$y_axis_initial = 25;


$i = 0;
//Set maximum rows per page
$max = 20;
$sum = 0;
//Set Row Height


 while($data = dbFetchAssoc($result2))
	{
		
		if ($i == $max)
            {
              $pdf->AddPage();
              //print column titles for the current page
              $pdf->SetY($y_axis_initial);
              $pdf->SetX(15);
              $pdf->Cell(30, 6, 'WB NO.', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'CONSIGNER', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'ADD', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'CONSIGNEE', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'ADD', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'DESC', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'QTY', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'RECIEVER', 1, 0, 'L', 1);
              $pdf->Cell(30, 6, 'SIGN', 1, 0, 'R', 1);
              //Go to next row
			  $y_axis = $y_axis_initial;
              $y_axis = $y_axis + $row_height;
              //Set $i variable to 0 (first row)
              $i = 0;
			}
			
			
			
$waybill_no = $data['waybill_no'];
$consignor_name = $data['consignor_name'];
$consignee_name =$data['consignee_name'];
$describe = $data['description'];
$qty = $data['quantity'];
$conradd = $data['consignor_add'];
$coneeadd = $data['consignee_add'];

$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->Cell(30, 6, $waybill_no, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $consignor_name, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $conradd, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $consignee_name, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $coneeadd, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $describe, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $qty, 1, 0, 'L', 1);
$pdf->Cell(30, 6, ' ', 1, 0, 'L', 1);
$pdf->Cell(30, 6, ' ', 1, 0, 'R', 1);

//Go to next row

 $sum += 1;
$y_axis = $y_axis + $row_height;
$i = $i + 1;

			
	}
	
	$pdf->SetY($y_axis + 20);
$pdf->Setx(150);
$pdf->SetFont('Arial','B',11);

$pdf->Cell(80, 6, 'TOTAL NUMBER OF CONSIGNMENTS',0 , 0, 'L',0);
$pdf->Cell(30, 6 ,$sum , 0, 0, 'L',1);

$pdf->Output();
 
			
		}
		
		else 
		{
			echo "there are no door to door waybills to deliver";
		}
	 



?>