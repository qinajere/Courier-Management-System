<?php
session_start();
require_once('library.php');


$off = $_SESSION['office'];
$man = $_GET['mid'];

$sql = "SELECT waybill_no, consignor_name, consignee_name, description, destination, quantity, total_charged, status 
	          FROM waybill
	          WHERE manifest_no= '$man'	
			  ";
			  
			  
$result = dbQuery($sql);




?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>courier management system</title>
<meta name="description" content="website description">
<meta name="keywords" content="website keywords, website keywords">
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="style/style.css" title="style">
<link rel="stylesheet" type="text/css" href="style/divstyle.css" title="style">
<link rel="stylesheet" type="text/css" href="style/default.css" title="style">
<style type="text/css">
#main #header #adminbar table {
	color: #333333;
}
</style>



 
		
        
</head>

<body>

  <div id="main">
  <?php
include("header.php");
?>
    
   <div id="site_content">
          <div id="content" style="height:350px auto">
          
       
	    
<table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style="margin-left:200px; margin-top:40px">
  <tbody><tr>
    <td width="900">


	</td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF">
	

<form action="checking.php" method="post" name="check">
<table border="0" align="center" width="80%" style="margin-left:50px" >
    <tbody><tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td  bgcolor="#FFFFFF" align="left"><div class="Partext1" align="center"><strong>PARCELS IN MANIFEST: <input name="manifest" type="text"  value="<?php echo $man;?>" >  </strong></div></td>
    </tr>
  </tbody></table>

 
  <table border="0" cellpadding="1" cellspacing="1" align="center" width="95%">
    <tbody>
	<tr>
    <td>
	</td>
    </tr>
  </tbody></table>
  <table class="blackbox" border="0" cellpadding="1" cellspacing="1" align="center" width="95%" style="margin-left:30px">
    <tbody><tr class="BoldRED" bgcolor="#FFFFFF" style="height:20px; color: #FFF">
     <td  bgcolor="grey" width="0%">Check</td>
     <td  bgcolor="grey" width="15%">Waybill Number</td>
      <td  bgcolor="grey" width="20%">Consigner</td>
      <td  bgcolor="grey" width="20%">Consignee</td>
      <td  bgcolor="grey" width="25%">Description</td>
      <td  bgcolor="grey" width="6%">Quantity</td>
      
      
    </tr>
    
	<?php
	
	while($data = dbFetchAssoc($result))
	{
	extract($data);	
	?>
      <tr style="cursor:pointer; <?php if ($status != 'in transit') echo 'color:green' ; if ($status == 'in transit') echo 'color:red'?> "  onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF" onDblClick="window.location='recr_way_pdf.php?wbn=<?php echo $waybill_no; ?>'">
	
    <td ><?php if ($status != 'in transit') echo '<img src="images/tick.png" width="16" height="16" alt="at destination">';
	
	           if ($status == 'in transit') echo '<img src="images/exclamation-red.png" width="16" height="16" alt="at destination">';
	
	
	     ?>
    </td>
      
      <td ><?php echo $waybill_no ?></td>
      
      <td ><?php echo $consignor_name; ?></td>
      <td ><?php echo $consignee_name; ?></td>
      <td ><?php echo $description; ?></td>
      <td> <?php echo $quantity; ?> </td>
      
    </tr>
    <?php
	}//while
	?>
    
    
	  </tbody></table>
  <br>
	
    </td>
  </tr>
  
</tbody></table>
</td>
  </tr>
</tbody></table>
	
</form>
  
        
       
          
          
      </div>
    </div>


  </div>
</body></html>
