
<?php
session_start();
require_once('database.php');


$off = $_SESSION['office'];
$curr = date("Y/m/d");

$sql2 = "SELECT reg_customer.customer_name, reg_customer.phone, sum( case when (DATEDIFF('$curr',date) > 30) then cust_invoice.amount_due else '0.00'end )as thirty, sum(case when (datediff('$curr',date) < 30) then cust_invoice.amount_due else '0.00'end ) as current, sum(cust_invoice.balance)as balance, sum(cust_invoice.amount_paid)as amountp FROM reg_customer, cust_invoice WHERE reg_customer.customer_id = cust_invoice.customer_id and cust_invoice.balance > 0 and cust_invoice.status = 'active' and cust_invoice.office = '$off' group by reg_customer.customer_name ";


$result2 = dbQuery($sql2);
	require('fpdf/fpdf.php');

$pdf = $pdf = new FPDF('L','mm','A4');
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetTitle("Debtors report",false);

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
$pdf->Cell(270, 20,'DEBTORS REPORT AS AT: '.$curr,0 ,1,"C");


$pdf->SetFont('Arial','',10);

$y_axis = 50; 

$row_height = 6;


$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis);
$pdf->SetX(40);
$pdf->Cell(35, 6, 'CLIENT NAME', 1, 0, 'L', 1);
$pdf->Cell(35, 6, 'CONTACT', 1, 0, 'L', 1);
$pdf->Cell(35, 6, 'CURRENT', 1, 0, 'L', 1);
$pdf->Cell(35, 6, '30 DAYS', 1, 0, 'L', 1);
$pdf->Cell(35, 6, 'AMOUNT PAID', 1, 0, 'L', 1);
$pdf->Cell(35, 6, 'BALANCE', 1, 0, 'L', 1);

$y_axis = $y_axis + $row_height;


$y_axis_initial = 25;


$i = 0;
//Set maximum rows per page
$max = 25;
//Set Row Height


 while($data2 = dbFetchAssoc($result2))
	{
		
		if ($i == $max)
            {
              $pdf->AddPage();
              //print column titles for the current page
             $pdf->SetY($y_axis_initial);
             $pdf->SetX(40);
             $pdf->Cell(35, 6, 'CLIENT NAME', 1, 0, 'L', 1);
             $pdf->Cell(35, 6, 'CONTACT', 1, 0, 'L', 1);
             $pdf->Cell(35, 6, 'CURRENT', 1, 0, 'L', 1);
             $pdf->Cell(35, 6, '30 DAYS', 1, 0, 'L', 1);
			 $pdf->Cell(35, 6, 'AMOUNT PAID', 1, 0, 'L', 1);
             $pdf->Cell(35, 6, 'BALANCE', 1, 0, 'L', 1);
              //Go to next row
              $y_axis = $y_axis + $row_height;
              //Set $i variable to 0 (first row)
              $i = 0;
			}
			
			
			
$customer_name = $data2['customer_name'];
$phone = $data2['phone'];
$current = $data2['current'];
$thirty =$data2['thirty'];
$balance = $data2['balance'];
$amountp = $data2['amountp'];


$pdf->SetY($y_axis);
$pdf->SetX(40);
$pdf->Cell(35, 6, $customer_name, 1, 0, 'L', 1);
$pdf->Cell(35, 6, $phone, 1, 0, 'L', 1);
$pdf->Cell(35, 6, number_format($current, 2), 1, 0, 'L', 1);
$pdf->Cell(35, 6,number_format($thirty, 2), 1, 0, 'L', 1);
$pdf->Cell(35, 6, $amountp, 1, 0, 'L', 1);
$pdf->Cell(35, 6, $balance, 1, 0, 'L', 1);


//Go to next row
$y_axis = $y_axis + $row_height;
$i = $i + 1;


			
	}
	




$pdf->Output();
	
	
	



?>