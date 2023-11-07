

<?php
session_start();
require_once('database.php');
require_once('library.php');
require_once('library2.php');


$rid= (int)$_GET['rid'];

$succesfull = "";


if(isset($_POST['rateid']))
{

 $succesfull = edit_price($_POST['rateid'], $_POST['price']);
 
}

$sql = "SELECT rate_table.rate_id, rate_table.zone_id, rate_table.price, kilo_range.range FROM rate_table, kilo_range WHERE (rate_table.range_id =kilo_range.range_id)";
$result = dbQuery($sql);		
while($data = dbFetchAssoc($result)) {
extract($data);
	 

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

<script type="text/JavaScript">
<!--
function MM_findObj(n, d)

 { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) 
  
  {
    d=parent.frames[n.substring(p+1)].document; 
	
	n=n.substring(0,p);
	
	}
  
  if(!(x=d[n])&&d.all) x=d.all[n]; 
  
  for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  
  for(i=0;!x&&d.layers&&i<d.layers.length;i++)
  
   x=MM_findObj(n,d.layers[i].document);
   
  if(!x && d.getElementById) x=d.getElementById(n);
  
   return x;
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->

</script>

 
		
        
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
    <td align="left"><a href="change_password.php" >Change password<a></td>
  </tr>
</table>

  
  
  </div>
    </div>
    
    <div id="site_content">
          <div id="content">
          
          
           <form method="post" name="frmShipment" class="register" style="margin-top:50px" > 
          
       <h1> EDIT PRICE </h1>


  <table cellpadding="2" cellspacing="2" align="center" width="75%" border="0"> 

    

    <tbody>
     <tr> 

      <td  align="right" width="336">&nbsp;</td> 

      <td  width="394"> <font color="#00CC00"><font size="+1"><?php echo $succesfull; ?></font></font> </td> 
    </tr> 
 <tr> 

      <td  align="right" width="336">Office ID  : </td> 

      <td  width="394"><input type="text" name="rateid" id="rateid" readonly style="border: none" value="<?php echo $rate_id; ?>"/>&nbsp;</td> 
    </tr> 
    
    <tr>
      
      <td align="right">Zone  :</td>
      
      <td><input type="text" name="zone" id="zone" value="<?php echo $zone_id; ?>"/></td>
    </tr>
    <tr>
      <td align="right">Range:</td>
      <td >><input type="text" name="range" id="range" value="<?php echo $range; ?>"</td>
    </tr>
    <tr>
      <td align="right">Price:</td>
      <td >><input type="text" name="price" id="price" value="<?php echo $price; ?>"</td>
    </tr>
    <tr>
      
      <td align="right"> </td>
      
      <td ><button class="button" name="Submit" type="submit" onClick="MM_validateForm('zone','','R','range','','R','price','','R');return document.MM_returnValue">EDIT &raquo;</button></td>
    </tr>

   
  </tbody></table> 

  

  </td>

  </tr>



</tbody></table>
	    
           </form>
       
          
          
      </div>
    </div>
    <?php } 
?>

  </div>
</body></html>
