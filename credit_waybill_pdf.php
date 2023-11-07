    <?php
    
	session_start();
require_once('database.php');

include("get_rate.php");

    $consignername = $_POST['consignername'];
	$consigneename = $_POST['consigneename'];
	$consigneephone = '+265'. $_POST['consigneephone'];
	$consigneeaddress = $_POST['consigneeaddress'];
	$description = $_POST['description'];
	$weight = $_POST['weight'];
	$quantity = $_POST['quantity'];
	$destination = $_POST['destination'];
	$servicetype = $_POST['servicetype'];
	$consignmentdate = $_POST['consignmentdate'];
	$consignerphone ='+265'. $_POST['consignerphone'];
   $consigneraddress = $_POST['consigneraddress'];
	
	$source =  $_SESSION['office'];
	$emp = $_SESSION['employee'];
	
	
	$code = $_SESSION['user_code'];

//credit
$serviceid = 3;

// create waybill number
$sql2 = "SELECT  waybill
		FROM seq_note
		WHERE code = '$code' 
		
		";
$result2 = dbQuery($sql2);

$data2 = dbFetchAssoc($result2);

$last_code = $data2['waybill'];

$man_code = (int)$last_code + 1;

$consignmentNo  = "WB-".$code.str_pad($man_code,6, "0", STR_PAD_LEFT);



// get customer info

$sql="SELECT customer_id, address, phone from reg_customer WHERE customer_name ='$consignername' AND location = '$source'" ;

$result = dbQuery($sql);

$row = dbFetchAssoc($result);

   $custid = $row['customer_id'];
   



// get categoty id
$sql10 = "SELECT cat_sources.source, cat_destination.destination, cat_sources.service_id, cat_sources.category_id FROM cat_sources, cat_destination WHERE ((cat_sources.source ='$source' OR cat_sources.source ='$destination') AND (cat_destination.destination ='$source' OR cat_destination.destination ='$destination') AND (cat_sources.service_id = $serviceid) AND (cat_destination.service_id = $serviceid)  AND (cat_sources.service_id = cat_destination.service_id) AND (cat_sources.category_id = cat_destination.category_id))";	
	
	$result10 = dbQuery($sql10);
	
	$row10 = dbFetchAssoc($result10);
	
	$cat =  $row10['category_id'];
		
	// get range id	
	
	$range = get_weght();
		
		
		
		//get rate
		
	$sql9 = "SELECT rate_table.rate, rate_table.vat, rate_table.total
          FROM rate_table, kilo_range
          WHERE rate_table.service_id = $serviceid
          AND rate_table.category_id = $cat
          AND kilo_range.range = '$range'
		  AND kilo_range.range_id = rate_table.range_id 
          ";
		  
		 
//echo $sql9;

	$result9 = dbQuery($sql9);
	
	while ($row9 = dbFetchAssoc($result9))
	{
           
    $rate = $row9['rate'];
    $vat = $row9['vat'];
	$total_charged = $row9['total'];
	}
	

// if weight is greater than 10 add 200 to each addition kg
if ($weight >= 10.1)
       {
	$adderrate = ($weight - 10.0)* 200;
	$rate = $rate + $adderrate;
	$vat = $rate * 0.165 ;
	$total_charged = $rate + $vat;
	   
   $sql2 = "INSERT INTO waybill (waybill_no, consignor_name, consignor_phone, consignor_add, consignee_name, consignee_phone, consignee_add, description, weight, quantity, source, destination, service_type,rate, tax, total_charged, created_by, way_date, status, comment)
	
			VALUES('$consignmentNo', '$consignername', '$consignerphone','$consigneraddress', '$consigneename', '$consigneephone','$consigneeaddress','$description','$weight','$quantity','$source','$destination','$servicetype','$rate','$vat','$total_charged', '$emp', '$consignmentdate','at source', 'active')";	

dbQuery($sql2);
	   }
	   
      else
	  
         {
	$sql2 = "INSERT INTO waybill (waybill_no, consignor_name, consignor_phone, consignor_add, consignee_name, consignee_phone, consignee_add, description, weight, quantity, source, destination, service_type, rate, tax, total_charged, created_by, way_date, status, comment)
	
			VALUES('$consignmentNo', '$consignername', '$consignerphone','$consigneraddress', '$consigneename', '$consigneephone','$consigneeaddress','$description','$weight','$quantity','$source','$destination','$servicetype','$rate','$vat','$total_charged', '$emp', '$consignmentdate','at source', 'active')";	
			
dbQuery($sql2);
         }
		 
		 
	 
 //increment waybill sequence number
$sql_3= "UPDATE seq_note
	          SET waybill = '$man_code'
			  WHERE code = '$code'
	         ";
	dbQuery($sql_3);
	


 $sql3 = "INSERT INTO cust_invoice (invoice_id, waybill_no, type , customer_id, amount_due, balance, date, office, status)
	
			VALUES('NULL', '$consignmentNo', 'INVOICE', '$custid', $total_charged, $total_charged, '$consignmentdate', '$source', 'active')";	

dbQuery($sql3);

$sql4 = "INSERT INTO reg_transactions (id, transaction_date, customer_id , type, details, debit, office, done_by) values ('NULL','$consignmentdate','$custid', 'WAYBILL','$consignmentNo',$total_charged, '$source', '$emp' )";
dbQuery($sql4);




//create pdf


require('fpdf/fpdf.php');

$mypdf = new FPDF();
$mypdf->AddPage();



$mypdf->Image('AMPEX logo.png',10,6,30);

$mypdf->SetFont('Arial','',11);

$mypdf->SetX(40);
$mypdf->Cell(100, 0,'AMPEX LIMITED',0 ,1);

$mypdf->SetX(40);
$mypdf->Cell(100, 10,'tel: +265 111 820 100 ',0 ,1);


$mypdf->SetX(40);
$mypdf->Cell(100, 10,'E-mail: ampex@agmaholdingsmw.com ',0 ,1);

$mypdf->SetFont('Arial','B',16);

$mypdf->SetY(30);
$mypdf->Cell(190, 20,'WAYBILL/INVOICE',0 ,1 ,"C");


$mypdf->SetFont('Arial','',10);

$mypdf->SetY(50);
$mypdf->SetX(105);

$mypdf->Cell(70, 10,'Waybill No: '.$consignmentNo,0 ,0 ,"C");


$mypdf->SetY(60);
$mypdf->SetX(25);

$mypdf->Cell(80, 30,' ',1 ,0 );

$mypdf->Cell(80,30,' ',1 ,0 );
$mypdf->SetFont('Arial','',10);

$mypdf->SetX(25);
$mypdf->Cell(30, 5,'From (Consigner): ',0 ,0 );
$mypdf->Cell(50, 5,$consignername,0 ,0);

$mypdf->SetX(105);
$mypdf->Cell(30, 5,'To (Consignee): ',0 ,0);
$mypdf->Cell(50, 5,$consigneename,0 ,1);

$mypdf->SetX(25);
$mypdf->Cell(30, 5,'Phone:',0 ,0 );
$mypdf->Cell(50, 5,$consignerphone,0 ,0 );

$mypdf->SetX(105);
$mypdf->Cell(30, 5,'Phone:',0 ,0 );
$mypdf->Cell(50, 5,$consigneephone,0 ,1 );

$mypdf->SetX(25);
$mypdf->Cell(30, 10,'Address:',0 ,0);
$mypdf->Cell(50, 10,$consigneraddress,0 ,0);

$mypdf->SetX(105);
$mypdf->Cell(30, 10,'Address:',0 ,0);
$mypdf->Cell(50, 10,$consigneeaddress,0 ,1);

$mypdf->SetY(80);
$mypdf->SetX(25);
$mypdf->Cell(30, 5,'Source:',1 ,0);
$mypdf->Cell(50, 5,$source,1 ,0);


$mypdf->SetX(105);
$mypdf->Cell(30, 5,'Destination:',1 ,0);
$mypdf->Cell(50, 5,$destination,1 ,1);


$mypdf->SetX(25);
$mypdf->Cell(30, 5,'Date:',1 ,0);
$mypdf->Cell(50, 5,$consignmentdate,1 ,0);


$mypdf->SetX(105);
$mypdf->Cell(30, 5,'Service type:',1 ,0);
$mypdf->Cell(50, 5,$servicetype,1 ,1);




$mypdf->SetY(90);
$mypdf->SetX(25);

$mypdf->SetFont('Arial','B',10);

$mypdf->Cell(10, 5,'Qnty',1 ,0 );

$mypdf->Cell(58, 5,'Description ',1 ,0 );
$mypdf->Cell(12, 5,'Wght ',1 ,0 );
$mypdf->Cell(40, 5,'Type of charge ',1 ,0 );
$mypdf->Cell(40, 5,'Amount ',1 ,1 );

$mypdf->SetX(25);
$mypdf->Cell(80, 5,' ',1 ,0 );

$mypdf->Cell(80,15,' ',1 ,0 );
$mypdf->SetFont('Arial','',10);
$mypdf->SetX(25);
$mypdf->Cell(10, 5,$quantity,1 ,0);
$mypdf->Cell(58, 5,$description,1,0 );
$mypdf->Cell(12, 5,$weight,1,0 );



$mypdf->SetX(105);
$mypdf->Cell(40, 5,'Charge for total weight',1 ,0);
$mypdf->Cell(40, 5,$rate,1 ,1);




$mypdf->SetX(105);
$mypdf->Cell(40, 5,'Surtax 16.5%',1 ,0);
$mypdf->Cell(40, 5, number_format($vat, 2, '.',''),1 ,1);

$mypdf->SetFont('Arial','B',10);
$mypdf->SetX(105);
$mypdf->Cell(40, 5,'TOTAL CHARGED',1 ,0);

$mypdf->SetFont('Arial','',10);
$mypdf->Cell(40, 5, number_format($total_charged, 2, '.',''),1 ,1);





$mypdf->SetY(105);
$mypdf->SetFont('Arial','',10);
$mypdf->SetX(25);
$mypdf->Cell(80, 5,'Dispatch clerk: '.$emp,0 ,0);

$mypdf->Output();





?>