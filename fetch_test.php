<?php

require_once('database.php');

$sql = "SELECT manifest.manifest_no
	          FROM manifest
	          WHERE manifest.comment = 'pending'
			  ";
$result = dbquery($sql);
			  
$row = dbNumRows($result);			  
			  
$sql2 = "SELECT waybill_no, way_date, way_time 
         FROM waybill 
		 WHERE status = 'at source'
		 OR status = 'in transit'
		 
		 ";
$result2 = dbquery($sql2);



 
$count = 0;



$curr = date("Y-m-d"). " ". date("h:i:sa");

while ($data = dbFetchAssoc($result2))
{
	$wbdate = $data['way_date']. " ". $data['way_time'];
	$ts1 = strtotime(str_replace('/', '-', $wbdate));
    $ts2 = strtotime($curr);
	
    $diff = abs($ts1 - $ts2) / 3600;
	
	if ($diff > 24)
	{
		$count = $count + 1;
	}
	
	
}




			  


if ($count >= 1 && $row >=1)
{
	echo "1";
}

 if ($count>=1 && $row < 1)
{
	echo "2";
}

if ($count<1 && $row>=1)
{
	
	echo "3";
}


if ($count<1 && $row<1)
{
	
	echo "4";
}

?>