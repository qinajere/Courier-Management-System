<?php 

require_once('database.php');




$catid =  $_POST['categoryid'];

$rate1 = $_POST['RATE1'];
$vat1 = $rate1 * 0.165;
$total1 = $rate1 + $vat1;

$rate2 =  $_POST['RATE2'];
$vat2 = $rate2 * 0.165;
$total2 = $rate2 + $vat2;


$rate3 =  $_POST['RATE3'];
$vat3 = $rate3 * 0.165;
$total3 = $rate3 + $vat3;


$rate4 =    $_POST['RATE4'];
$vat4 = $rate4 * 0.165;
$total4 = $rate4 + $vat4;


$rate5 =   $_POST['RATE5'];
$vat5 = $rate5 * 0.165;
$total5 = $rate5 + $vat5;


$rate6 =   $_POST['RATE6'];
$vat6 = $rate6 * 0.165;
$total6 = $rate6 + $vat6;


$rate7 =  $_POST['RATE7'];
$vat7 = $rate7 * 0.165;
$total7 = $rate7 + $vat7;


$rate8 =   $_POST['RATE8'];
$vat8 = $rate8 * 0.165;
$total8 = $rate8 + $vat8;


$rate9 =   $_POST['RATE9'];
$vat9 = $rate9 * 0.165;
$total9 = $rate9 + $vat9;


$rate10 =  $_POST['RATE10'];
$vat10 = $rate10 * 0.165;
$total10 = $rate10 + $vat10;





$sql ="INSERT INTO `rate_table`(service_id, category_id, range_id, rate, vat, total, type) 
       VALUES 
	   (3,$catid,1,$rate1,$vat1,$total1,'branch'),
	   (3,$catid,2,$rate2,$vat2,$total2,'branch'),
	   (3,$catid,3,$rate3,$vat3,$total3,'branch'),
	   (3,$catid,4,$rate4,$vat4,$total4,'branch'),
	   (3,$catid,5,$rate5,$vat1,$total5,'branch'),
	   (3,$catid,6,$rate6,$vat6,$total6,'branch'),
	   (3,$catid,7,$rate7,$vat7,$total7,'branch'),
	   (3,$catid,8,$rate8,$vat8,$total8,'branch'),
	   (3,$catid,9,$rate9,$vat9,$total9,'branch'),
	   (3,$catid,10,$rate10,$vat10,$total10,'branch')
	   
	   
	   ";

dbQuery($sql);

foreach ($_POST['FeatureCodes'] as $sourceitem)
    {
    $sql2 = "INSERT INTO cat_sources(service_id, category_id, source, type) VALUES (3,$catid,'$sourceitem','branch') ";
	dbQuery($sql2);
	}



foreach ($_POST['FeatureCodes2'] as $destitem)
    {
    $sql3 = "INSERT INTO cat_destination(service_id, category_id, destination, type) VALUES (3,$catid,'$destitem','branch') ";
	dbQuery($sql3);
    }



header('Location: add-cat-credit.php');

?>