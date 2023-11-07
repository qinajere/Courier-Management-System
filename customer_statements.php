<?php

session_start();
require_once('database.php');

$cid= $_GET['cid'];

$off = $_SESSION['office'];

$curr = date("Y/m/d");

$sql = "SELECT customer_name, post, phone FROM reg_customer WHERE customer_id= $cid";

echo $sql;

$result = dbQuery($sql);



while($data = dbFetchAssoc($result))
	{
	
	extract($data)	;
	
	
	$sql2 = "SELECT reg_customer.customer_name, reg_customer.post, reg_customer.phone, cust_invoice.waybill_no, cust_invoice.amount_due, cust_invoice.amount_paid, cust_invoice.balance, cust_invoice.date FROM reg_customer, cust_invoice WHERE reg_customer.customer_id = cust_invoice.customer_id and cust_invoice.customer_id = $cid and cust_invoice.balance > 0 and cust_invoice.status = 'active' and cust_invoice.office = '$off'";
$result2 = dbQuery($sql2);


	
	require('fpdf/fpdf.php');

$pdf = $pdf = new FPDF('P','mm','A4');
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetTitle($customer_name."'s bill",false);

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
$pdf->Cell(190, 20,'BILL',0 ,1 ,"C");





$pdf->SetFont('Arial','B',10);
$pdf->SetY(45);
$pdf->SetX(25);
$pdf->Cell(20, 5,'CUSTOMER ',0 ,1);


$pdf->SetFont('Arial','',10);
$pdf->SetY(50);
$pdf->SetX(25);
$pdf->Cell(70, 18,' ',1 ,1);

$pdf->SetY(50);
$pdf->SetX(25);
$pdf->Cell(20, 5,$customer_name,0 ,1);
$pdf->SetX(25);
$pdf->Cell(20, 10,$post,0 ,1);




$pdf->SetY(70);


$pdf->Cell(70, 10,'Date: '.$curr,0 ,0 ,"C");
$pdf->Cell(70, 10,'Office: '.$off,0 ,0 ,"C");




$y_axis = 80; 

$row_height = 6;


$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis);
$pdf->SetX(18);
$pdf->Cell(35, 6, 'INVOICE', 1, 0, 'L', 1);
$pdf->Cell(35, 6, 'DATE', 1, 0, 'L', 1);
$pdf->Cell(35, 6, 'AMOUNT DUE', 1, 0, 'L', 1);
$pdf->Cell(35, 6, 'AMOUNT PAID', 1, 0, 'L', 1);
$pdf->Cell(35, 6, 'BALANCE', 1, 0, 'L', 1);

$y_axis = $y_axis + $row_height;


$y_axis_initial = 25;


$i = 0;
//Set maximum rows per page
$max = 25;
//Set Row Height
$t_ad = 0;
$t_ap = 0;
$t_b = 0;
$currb = 0;
$thirty = 0;

 while($data2 = dbFetchAssoc($result2))
	{
		
		if ($i == $max)
            {
              $pdf->AddPage();
              //print column titles for the current page
              $pdf->SetY($y_axis_initial);
              $pdf->SetX(18);
              $pdf->Cell(35, 6, 'WAYBILL NO.', 1, 0, 'L', 1);
              $pdf->Cell(35, 6, 'WAYBILL DATE', 1, 0, 'L', 1);
              $pdf->Cell(35, 6, 'AMOUNT DUE', 1, 0, 'L', 1);
              $pdf->Cell(35, 6, 'AMOUNT PAID', 1, 0, 'L', 1);
             $pdf->Cell(35, 6, 'BALANCE', 1, 0, 'L', 1);
              //Go to next row
              $y_axis = $y_axis + $row_height;
              //Set $i variable to 0 (first row)
              $i = 0;
			}
			
			
			
$waybill_no = $data2['waybill_no'];
$dt = $data2['date'];
$amountd = $data2['amount_due'];
$amountp =$data2['amount_paid'];
$balance = $data2['balance'];


$pdf->SetY($y_axis);
$pdf->SetX(18);
$pdf->Cell(35, 6, $waybill_no, 1, 0, 'L', 1);
$pdf->Cell(35, 6, $dt, 1, 0, 'L', 1);
$pdf->Cell(35, 6, $amountd, 1, 0, 'L', 1);
$pdf->Cell(35, 6, $amountp, 1, 0, 'L', 1);
$pdf->Cell(35, 6, $balance, 1, 0, 'L', 1);


//Go to next row
$y_axis = $y_axis + $row_height;
$i = $i + 1;

$t_ad += $amountd;
$t_ap += $amountp;
$t_b += $balance;


$date1=date_create($curr);
$date2=date_create($dt);

$diff=date_diff($date2,$date1);

$days_between = $diff->format("%R%a");

if($days_between >= 30)
{
	$thirty += $balance;
}
else
{
	$currb += $balance;
	
}

			
	}
	
$pdf->SetY($y_axis);
$pdf->Setx(53);
$pdf->SetFont('Arial','B',11);

$pdf->Cell(35, 6, 'TOTALS', 1, 0, 'R', 0);
$pdf->Cell(35, 6, number_format($t_ad, 2) , 1, 0, 'L', 0);
$pdf->Cell(35, 6, number_format($t_ap, 2) , 1, 0, 'L', 0);
$pdf->Cell(35, 6, number_format($t_b, 2) , 1, 0, 'L', 1);


$pdf->SetY($y_axis + 15);
$pdf->SetX(18);

$pdf->Cell(50, 6,"CURRENT:  K".number_format($currb, 2) , 0, 0, 'L', 1);

$pdf->Cell(50, 6,"30+ DAYS:  K".number_format($thirty, 2) , 0, 0, 'L', 1);




$pdf->Output();
	
	
	}



?>