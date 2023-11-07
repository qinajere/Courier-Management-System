<?php
session_start();

require_once('database.php');

$curr = date("Y/m/d");

$Customername = $_POST['Customername'];
$Paydate = $_POST['Paydate'];
$Mode = $_POST['Mode'];
$Transaction= $_POST['Transaction'];
$Amount = $_POST['Amount'];

$sql = "SELECT customer_id, post from reg_customer where customer_name = '$Customername'";
$result = dbQuery($sql);

 $cust_id = "";

 while($data = dbFetchAssoc($result))
 {
	 $cust_id = $data['customer_id'];
	 $cust_post = $data['post'];
 }
 
 
 $sql5 = "SELECT cust_invoice.balance FROM reg_customer, cust_invoice WHERE reg_customer.customer_id = cust_invoice.customer_id and cust_invoice.customer_id = $cust_id and cust_invoice.balance > 0 and cust_invoice.status = 'active'";
// echo $sql5;
 
$result5 = dbQuery($sql5);
$t_b = 0;



 while($data2 = dbFetchAssoc($result5))
	{		
        $balance = $data2['balance'];

        
        $t_b += $balance;
	}


$sql1 = "SELECT waybill_no, amount_paid, balance from cust_invoice where customer_id = $cust_id AND balance > 0.00";
$result1 = dbQuery($sql1);

$pay = $Amount;

 while(($data1 = dbFetchAssoc($result1)) and ($pay != 0))
 {
	  $wbn= $data1['waybill_no'];
	 
	 $amp= $data1['amount_paid'];
	  $amb = $data1['balance'];
	  
	  
	  if ($pay < $amb)
	  {
		  $amb = $amb - $pay;
		  $amp = $amp + $pay;
		  $pay = 0;
		  
	  }
	  else 
	  {
		  $pay = $pay - $amb;
		  $amp = $amp + $amb;
		  $amb = 0;
	  }
	  
	  $sql11 = "UPDATE cust_invoice set balance = $amb, amount_paid = $amp where waybill_no = '$wbn'";
	  dbQuery($sql11);
	  
 }
 
 
 $code = $_SESSION['user_code'];
 $sql_2 = "SELECT  reciept
		FROM seq_note
		WHERE code = '$code' 
		
		";
$result_2 = dbQuery($sql_2);

$data_2 = dbFetchAssoc($result_2);

$last_code = $data_2['reciept'];

$man_code = (int)$last_code + 1;

$recno  = "REC-".$code.str_pad($man_code,6, "0", STR_PAD_LEFT);
 
 
 $sql_3= "UPDATE seq_note
	          SET reciept = '$man_code'
			  WHERE code = '$code'
	         ";
	dbQuery($sql_3);
	
 $remainder = $t_b - $Amount;
	
	$sql4 = "INSERT INTO reg_transactions (id, transaction_date, customer_id , type, details, credit, office ) values ('NULL','$Paydate','$cust_id', 'RECIEPT','$recno', -$Amount, 'BLANTYRE')";
dbQuery($sql4);
 

$sql2 = "INSERT INTO payments (reciept_no, customer_id, method, description, amount, balance, office, date ) VALUES ('$recno', $cust_id, '$Mode','$Transaction', $Amount, $remainder ,  'BLANTYRE', '$Paydate')";

dbQuery($sql2);



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
$mypdf->Cell(190, 20,'RECIEPT',0 ,1 ,"C");




$mypdf->SetFont('Arial','B',11);
$mypdf->SetY(45);
$mypdf->SetX(25);
$mypdf->Cell(40, 5,'To: ',0 ,0 );


$mypdf->SetY(50);
$mypdf->SetX(25);
$mypdf->Cell(60, 20,' ',1 ,1 ,"C");

$mypdf->SetFont('Arial','',10);

$mypdf->SetY(50);
$mypdf->SetX(25);
$mypdf->Cell(40, 5,$Customername,0 ,0 );

$mypdf->SetY(60);
$mypdf->SetX(25);
$mypdf->Cell(40, 5,$cust_post,0 ,0 );


$mypdf->SetY(70);
$mypdf->SetX(40);
$mypdf->Cell(50, 10,'Date Issued: '.$Paydate,0 ,0 ,"C");
$mypdf->Cell(50, 10,'Reciept NO.: '.$recno,0 ,1,"C" );


$mypdf->SetY(80);
$mypdf->SetX(37);
$mypdf->SetFont('Arial','B',10);
$mypdf->Cell(25, 5,'Description: ',1 ,0 );

$mypdf->SetFont('Arial','',10);
$mypdf->Cell(115, 5,$Transaction,1 ,0);

$mypdf->SetY(85);
$mypdf->SetX(37);
$mypdf->SetFont('Arial','B',10);
$mypdf->Cell(25, 5,'Reciept NO.: ',1 ,0 );

$mypdf->SetFont('Arial','',10);
$mypdf->Cell(45, 5,$recno,1 ,0 );

$mypdf->SetFont('Arial','B',10);
$mypdf->Cell(25, 5,'Office: ',1 ,0 );

$mypdf->SetFont('Arial','',10);
$mypdf->Cell(45, 5,'BLANTYRE',1 ,0 );

$mypdf->SetY(90);
$mypdf->SetX(37);
$mypdf->SetFont('Arial','B',10);
$mypdf->Cell(25, 5,'Mode: ',1 ,0);
$mypdf->SetFont('Arial','',10);
$mypdf->Cell(45, 5,$Mode,1 ,0);

$mypdf->SetFont('Arial','B',10);
$mypdf->Cell(25, 5,'Amount Paid: ',1 ,0 );

$mypdf->SetFont('Arial','',10);
$mypdf->Cell(45, 5,$Amount,1 ,1 );




$mypdf->SetFont('Arial','B',10);
$mypdf->SetY(95);
$mypdf->SetX(107);
$mypdf->Cell(25, 5,'BALANCE: ',1 ,0);
$mypdf->Cell(45, 5,$remainder ,1 ,1);



$mypdf->SetFont('Arial','',10);
$mypdf->SetY(105);
$mypdf->SetX(25);
$mypdf->Cell(25, 5,'ISSUED BY: ',0 ,0);
$mypdf->Cell(45, 5,$_SESSION['employee'] ,0 ,1);
$mypdf->Output();




?>