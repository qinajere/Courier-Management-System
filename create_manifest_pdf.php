<?php

session_start();

require_once('database.php');

	
	$manifestdate = $_POST['manifestdate'];
	$source = $_POST['source'];
	$destination = $_POST['destination'];
	$drivername = $_POST['drivername'];
	$vehicle = $_POST['vehicle'];
	$createdby =$_SESSION['employee'];
	
	
	
	
$code = $_SESSION['user_code'];

$sqlc = "SELECT manifest
		FROM seq_note
		WHERE code = '$code'";
$resultc = dbQuery($sqlc);

$datac = dbFetchAssoc($resultc);

$last_code = $datac['manifest'];

$man_code = (int)$last_code + 1;

$manifestno = "MAN-".$code.str_pad($man_code,6, "0", STR_PAD_LEFT);
	
	$sql = "INSERT INTO manifest (manifest_no, source, destination, driver, vehicle, status , comment,created_by, manifest_date)
			VALUES ('$manifestno', '$source', '$destination', '$drivername', '$vehicle','in transit', '','$createdby','$manifestdate')";
	dbQuery($sql);
	
	$sql_1 = "UPDATE waybill 
	          SET status = 'in transit', manifest_no = '$manifestno'
			  WHERE source = '$source'
			  AND   destination = '$destination'
			  AND   status = 'at source'
			  AND   status = 'at source'
			  AND   comment = 'active'
	         ";
    dbQuery($sql_1);
	
	$sql_2 = " SELECT waybill_no, consignor_name, consignee_name, description, quantity,total_charged 
	          FROM waybill
	          WHERE source = '$source'
			  AND   destination = '$destination'
			  AND   status = 'in transit'
			  AND   manifest_no = '$manifestno'
			  AND   comment = 'active'
	         ";
     $result = dbQuery($sql_2);
	 
	 
$sql_3= "UPDATE seq_note
	          SET manifest = '$man_code'
			  WHERE code = '$code'
	         ";
	dbQuery($sql_3);

	 /*sms starts here*/
	 
	 include('trigger_sms.php');
	 require_once('AfricasTalkingGateway.php');
	 
$sql3 = "SELECT consignor_name, consignor_phone, consignee_name, consignee_phone, waybill_no FROM waybill
        where manifest_no = '$manifestno'";
        
        $result3 = dbQuery($sql3);

       while($data2 = dbFetchAssoc($result3))
	     {
         $wb  = $data2['waybill_no']; 
		 $crn = $data2['consignor_name'];
         $crp = $data2['consignor_phone']; 
		 $cen = $data2['consignee_name'];
         $cep = $data2['consignee_phone']; 
         
         $msg = "Parcel ". $wb. " sent by ". $crn. " to ". $cen." is in transit. Please note that an ID is required when collecting the parcel." ;
         
		$sql4 = "INSERT INTO sms( sms_id, senderno, recieverno, waybill_no, message) VALUES ('NULL','$crp','$cep','$wb','$msg')";
		dbQuery($sql4);
		
		
		$sql5 = "SELECT senderno,recieverno, message 
		         FROM sms 
				 WHERE status = 'to send'";
				 
		$result5 = dbQuery($sql5);
		 while($data5 = dbFetchAssoc($result5))
		 {
			 $sendor = $data5['senderno'];
			 $reciever =$data5['recieverno'];
			 $messege = $data5['message'];
			 
			 sendSMS($sendor,$messege);
			  sendSMS($reciever,$messege);
			  
			   $sql6 = "UPDATE sms SET  status = 'sent'
		    
                     WHERE status = 'to send'";
				 
		      $result6 = dbQuery($sql6);
			 
			 
		 }
		 
		
		
		 }


/*sms ends here*/

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

$pdf->SetFont('Arial','B',16);

$pdf->SetY(30);
$pdf->Cell(270, 20,'MANIFEST',0 ,1 ,"C");


$pdf->SetFont('Arial','',10);

$pdf->SetY(50);


$pdf->Cell(80, 10,'Manifest No: '.$manifestno,0 ,0 ,"C");

$pdf->Cell(20, 10,'Date: '.$manifestdate,0 ,0 ,"C");
$pdf->Cell(70, 10,'Driver: '.$drivername,0 ,0 ,"C");
$pdf->Cell(20, 10,'Vehicle: '.$vehicle,0 ,0 ,"C");
$pdf->Cell(90, 10,'Destination: '.$destination,0 ,1 ,"C");

$pdf->Cell(90, 10,'Dispatched by: '.$createdby,0 ,1 ,"C");


$y_axis = 70; 



$row_height = 6;



$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->Cell(45, 6, 'WAYBILL NO.', 0, 'L', 1);
$pdf->Cell(45, 6, 'CONSIGNER', 0, 'L', 1);
$pdf->Cell(45, 6, 'CONSIGNEE', 0, 'L', 1);
$pdf->Cell(45, 6, 'DESCRIPTION', 0, 'L', 1);
$pdf->Cell(45, 6, 'QUANTITY', 0, 'L', 1);
$pdf->Cell(45, 6, 'CHARGES', 0, 'R', 1);
$y_axis = $y_axis + $row_height;


$y_axis_initial = 25;


$i = 0;
//Set maximum rows per page
$max = 20;
//Set Row Height
$sum = 0;

 while($data = dbFetchAssoc($result))
	{
		
		if ($i == $max)
            {
              $pdf->AddPage();
              //print column titles for the current page
              $pdf->SetY($y_axis_initial);
              $pdf->SetX(15);
              $pdf->Cell(45, 6, 'WAYBILL NO.', 0, 'L', 1);
              $pdf->Cell(45, 6, 'CONSIGNER', 0, 'L', 1);
              $pdf->Cell(45, 6, 'CONSIGNEE', 0, 'L', 1);
              $pdf->Cell(45, 6, 'DESCRIPTION', 0, 'L', 1);
              $pdf->Cell(45, 6, 'QUANTITY', 0, 'L', 1);
              $pdf->Cell(45, 6, 'CHARGES', 0, 'R', 1);
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
$total = $data['total_charged'];

$pdf->SetY($y_axis);
$pdf->SetX(15);
$pdf->Cell(45, 6, $waybill_no,0, 'L', 1);
$pdf->Cell(45, 6, $consignor_name, 0, 'L', 1);
$pdf->Cell(45, 6, $consignee_name, 0, 'L', 1);
$pdf->Cell(45, 6, $describe, 0, 'L', 1);
$pdf->Cell(45, 6, $qty, 0, 'L', 1);
$pdf->Cell(45, 6, $total, 0, 'R', 1);

 $sum += 1;
//Go to next row
$y_axis = $y_axis + $row_height;
$i = $i + 1;

			
	}

$pdf->SetY($y_axis + 20);
$pdf->Setx(150);
$pdf->SetFont('Arial','B',11);

$pdf->Cell(80, 6, 'TOTAL NUMBER OF CONSIGNMENTS',0 , 0, 'L',0);
$pdf->Cell(30, 6 ,$sum , 0, 'L',1);
$pdf->Output();




?>




