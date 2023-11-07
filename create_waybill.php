<?php
session_start();
require_once('library.php');
require_once('database.php');
	
	include("get_rate.php");

 $consignername = $_POST['consignername'];
	$consignerphone = $_POST['consignerphone'];
	$consigneraddress = $_POST['consigneraddress'];
	
	$consigneename = $_POST['consigneename'];
	$consigneephone = $_POST['consigneephone'];
	$consigneeaddress = $_POST['consigneeaddress'];
	
	$consignmentNo = $_POST['consignmentNo'];
	$description = $_POST['description'];
	$weight = $_POST['weight'];
	$quantity = $_POST['quantity'];
	$destination = $_POST['destination'];
	$servicetype = $_POST['servicetype'];

		
	$consignmentdate = $_POST['consignmentdate'];
	
	$source =  $_SESSION['office'];

$rate = get_rate();

if ($servicetype == 'door to door')
{
	$rate = $rate + 2000;
	
	$sql = "INSERT INTO waybill (waybill_no, consignor_name, consignor_phone, consignor_add, consignee_name, consignee_phone, consignee_add, description, weight, quantity, source, destination, service_type, total_charged, way_date, status)
	
			VALUES('$consignmentNo', '$consignername', '$consignerphone','$consigneraddress', '$consigneename', '$consigneephone','$consigneeaddress','$description','$weight','$quantity','$source','$destination','$servicetype','$rate', '$consignmentdate','at source')";	
	
	
}

else 
{
	$sql = "INSERT INTO waybill( waybill_no, consignor_name, consignor_phone, consignor_add, consignee_name, consignee_phone, consignee_add, description, weight, quantity, source, destination, service_type, total_charged, way_date, status)
	
			VALUES('$consignmentNo', '$consignername', '$consignerphone','$consigneraddress', '$consigneename', '$consigneephone','$consigneeaddress','$description','$weight','$quantity','$source','$destination','$servicetype','$rate', '$consignmentdate','at source')";	
	
}

//echo $sql;
	dbQuery($sql);
	

?>

<!DOCTYPE HTML>
<html>
<head>
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

<script type="text/javascript">
var win=null;
function printIt(printThis)
{
win = window.open();
self.focus();
win.document.open();
win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
    win.document.write('body, td { font-family: Verdana; font-size: 10pt;}');
win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
    win.document.write(printThis);
    win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
    win.document.close();
    win.print();
    win.close();
  }
</script>


  <div id="main">
  <?php
include("header.php");
?>
    
    <div id="site_content">
          <div id="content">
          
          <div id="printme">
           
 <form action="" class="register">
            <img  src="AMPEX logo.png" width="132" height="119" alt="logo" style="float:left" />
            
            <div style="float:left">
            <p style="font-size:20px;"> AMPEX LIMITED</p>
            <p>St George Street </p>
            <p>Next to Blantyre Post Office P.O Box 782, Blantyre Malawi</p>
            <p>tel: +265 111 820 100</p>
            <p>E-mail: ampex@agmaholdingsmw.com</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </div>
               <p> <center><b> <font size="+1"> WAYBILL/INVOICE </font> </b> </center></p>    
            <p> <label style="margin-left: 100px; width:200px"><b>DATE:</b> <?php echo $consignmentdate; ?> </label> <label style="margin-left: 200px; width:200px"><b>WAYBILL N0:</b><?php echo $consignmentNo; ?> </label> </p>
            <p>&nbsp;</p>
          <fieldset class="row1">
            <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;consigner: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;consignee: </legend> 
             
    
             
              
            
            <p>
                   <label>Name:
                    </label>
                    <input type="text" value="<?php echo  $consignername; ?>" readonly style="border:none"/> 
                    <label>Name:
                    </label>
                    <input type="text" value="<?php echo $consigneename ?>" readonly style="border:none"/>
                </p>
                <p>
                    <label>Phone:
                    </label>
                    <input type="text"  value="<?php echo  $consignerphone ?>" readonly style="border:none"/>
                    <label>Phone:
                    </label>
                    <input type="text" value="<?php echo  $consigneephone ?>" readonly style="border:none"/>
                   
                </p>
                 <p>
                    <label>Address:
                    </label>
                    <input type="text" value="<?php echo  $consigneraddress ?>" readonly style="border:none"/>
                    <label>Address:
                    </label>
                    <input type="text" value="<?php echo  $consigneeaddress ?>" readonly style="border:none"/>                 
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Parcel Details:
                </legend>
                 
                <p>
                    <label>Description :
                    </label>
                    <input type="text" class="long"  value="<?php echo  $description ?>" readonly style="border:none"/>
                </p>
                <p>
                    <label>Weight:
                    </label>
                    <input type="text"  value="<?php echo  $weight ?>" readonly style="border:none"/>
                </p>
                <p>
                    <label>Quantity:
                    </label>
                    <input type="text" class="long" value="<?php echo  $quantity ?>" readonly style="border:none"/>
                </p>
               
               
            </fieldset>
            <fieldset class="row3">
                <legend>Charge Details:</legend>
                <p>
                    <label>Service Type:</label>
                    
                    <input type="text" class="long" value="<?php echo  $servicetype ?>" readonlystyle="width:150px; border:none"/>
                </p>
                
                    
                <p>
                    <label>Destination:
                    </label>
                    <input type="text" class="long" value="<?php echo  $destination ?>" readonly style="width:150px; border:none"/>
                
            </p>
             <p>
                    <label> <b> CHARGE: </b>
                    </label>
                    <input type="text" class="long" value="<?php echo  $rate ?>" readonly style="width:150px; border:none"/>
                
            </p>
            
           
            </fieldset>
            </div>
             <p>
            <div><button class="button" name="Submit" type="submit" onClick="printIt(document.getElementById('printme').innerHTML); return false" > print &raquo;</button></div>
            </p>
        </form>
   
       
          
          
      </div>
    </div>
<div id="content_footer"></div>
    <div id="footer">
      Copyright © 2016 | designed by Qina Jere
</div>     
  </div>
</body></html>
