<?php
session_start();
require_once('database.php');
require_once('library.php');




$sql = "SELECT zone.zone_id, kilo_range.range, rate_table.price, rate_table.rate_id FROM zone, kilo_range, rate_table WHERE rate_table.zone_id = zone.zone_id AND rate_table.range_id = kilo_range.range_id
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

</style>       
</head>

<body>

  <div id="main">
  <div id="header">
      <a href="index.html"><img src="AMPEX logo.png" width="149" height="130" alt="LOGO"></a>
      
        <div id="logo_text" style="left: 650px; top: 150px; width:800px">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1>COURIER MANAGEMENT INFORMATION SYSTEM ADMIN PANEL</h1>
      </div>
     
     
      <div id="adminbar">
        <table width="1218" height="25" border="0" cellpadding="0" cellspacing="0" >
  <tr >
    <td  width="75"><a href="admin.php" >home</a></td>
    <td  width="119"><a href="add-office.php" > New Office</a></td>
	<td width="130"><a href="new_manager.php" >New Manager</a> </td>
    <td  width="121"><a href="add-driver.php"> New Driver</a></td>
    <td  width="131"><a href="add-vehicle.php"> New Vehicle</a></td>
    <td  width="136"><a href="view-managers.php"> view manager</a></td>
    <td  width="127"><a href="view-offices.php"> view offices</a></td>
    <td  width="127"><a href="view-drivers.php"> view drivers</a></td>
     <td  width="130"><a href="view-vehicles.php"> view vehicles</a></td>
     <td  width="122"><a href="view-rates.php"> rates</a></td>
    
  </tr>
</table>
    </div>
<div class = "user info" style="margin-left:20px; margin-top:10px"> 
  
  <script language="JavaScript">
function are_u_sure()
{
	return confirm("are you sure you want to logout");
}
</script>

  <p></p>
  <p></p>
  
 <table width="100" border="0">
  <tr>
    <td align="left"> <img src="images/logout.png" width="42" height="32"/> </td>
    <td align="left" ><a href="process.php?action=logOut" onClick="return are_u_sure();">Logout</a></td>
  </tr>
  <tr>
    <td align="left"><img  src="images/changepassword.png" width="42" height="32"/></td>
    <td align="left"><a href="change_admin_pass.php" >Change password<a></td>
  </tr>
</table>


  
  
  </div>
    </div>
    
    
    <div id="site_content">
          <div id="content" style="height:350px">
          
       
	    
<table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style="margin-left:200px; margin-top:40px">
  <tbody><tr>
    <td width="900">


	</td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF">
	<script language="JavaScript">
function search(e, a)
{
	
	
	
	var c = e.keyCode
	var amt = a
	
	if (c == 13)
	{
		e.preventDefault();
		window.location='admin.php?am=a';
	}
	
	
}
</script>


<table border="0" align="center" width="80%" style="margin-left:50px" >
    <tbody><tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left"><div class="Partext1" align="center"><strong>EMPLOYEES </strong></div></td>
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
     
      <td class="newtext" bgcolor="grey" width="10%">ZONE ID</td>
      <td  bgcolor="grey" width="11%">RANGE</td>
      <td  bgcolor="grey" width="11%">PRICE</td>
     <td  bgcolor="grey" width="6%"><div align="center">Edit</div></td>
     
      
    </tr>
    
	<?php
	
	while($data = dbFetchAssoc($result))
	{
	extract($data);	
	?>
      <tr onMouseOver="this.bgColor='#EDEDED';"  onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF">
	
      
      <td ><?php echo $zone_id ?></td>
      
      <td ><?php echo $range; ?></td>
      <td > <?php echo $price; ?> </td>
      
      <td  align="center">
	  <a href="change_price.php?rid=<?php echo  $rate_id ?>">
	  <img src="images/edit_icon.gif" border="0" height="20" width="20"></a>
	  </td>
      
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
	

  
        
       
          
          
      </div>
    </div>
  
  </div>
</body></html>
