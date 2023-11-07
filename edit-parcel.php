<?php
session_start();
require_once('database.php');
require_once('library.php');
require_once('library2.php');


$wbn= $_GET['wbn'];

$succesfull = "";

if(isset($_POST['consignmentNo']))
{

 $succesfull = edit_parcel($_POST['consignmentNo'], $_POST['consignername'], $_POST['consignerphone'], $_POST['consigneraddress'],$_POST['consigneename'], $_POST['consigneephone'],$_POST['consigneeaddress'], $_POST['description'],$_POST['weight'],$_POST['quantity'],$_POST['destination'],$_POST['servicetype']);
 
}


$sql = "SELECT *
		FROM waybill
		WHERE waybill_no = '$wbn'";
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

 
  <?php
include("header.php");
?>
    
<div class="col-md-8 col-md-offset-3 mydash">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                         EDIT CONSIGNMENT DETAILS
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         <div class="col-md-12">
                          <form method="post" name="frmShipment">
                            <label class="echoed-text"><?php echo $succesfull; ?></label>
                            <div class="form-group">
                              <label>WAYBILL NO:</label>
                              <input type="text" name="consignmentNo" readonly value="<?php echo $waybill_no; ?>" class="myinput2 bold">
                            </div>
                            <hr>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Consigner Name:</label>
                              <input type="text" name="consignername" id="consignername" value="<?php echo $consignor_name; ?>" class="form-control in-line2">
                            </div>
                            <div class="form-group">
                              <label>Consigner Address:</label>
                              <input type="text" name="consigneraddress" id="consigneraddress" value="<?php echo $consignor_add; ?>" class="form-control in-line2">
                            </div>
                            <div class="form-group">
                              <label>Consigner Phone:</label>
                              <input type="text" name="consignerphone" id="consignerphone" value="<?php echo $consignor_phone; ?>" class="form-control in-line2">
                            </div>
                            <hr>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Consignee Name:</label>
                              <input type="text" name="consigneename" id="consigneename" value="<?php echo $consignee_name; ?>" class="form-control in-line2">
                            </div>
                            <div class="form-group">
                              <label>Consignee Address:</label>
                              <input type="text" name="consigneeaddress" id="consigneeaddress" value="<?php echo $consignee_add; ?>" class="form-control in-line2">
                            </div>
                            <div class="form-group">
                              <label>Consignee Phone:</label>
                              <input type="text" name="consigneephone" id="consignerphone" value="<?php echo $consignee_phone; ?>" class="form-control in-line2">
                            </div>
                            <hr>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Destination:</label>
                              <input type="text" name="destination" id="destination" value="<?php echo $destination; ?>" class="form-control in-line2">
                            </div>
                            <div class="form-group">
                              <label>Service Type:</label>
                              <input type="text" name="servicetype" id="servicetype" value="<?php echo $service_type; ?>" class="form-control in-line2">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Parcel Description:</label>
                              <input type="text" id="description" name="description" value="<?php echo $description; ?>" class="form-control in-line2">
                            </div>
                            <div class="form-group">
                              <label>Quantity:</label>
                              <input type="text" name="quantity" id="quantity"value="<?php echo $quantity; ?>" class="form-control in-line2">
                            </div>
                             <div class="form-group">
                              <label>Weight:</label>
                              <input type="text" id="weight" name="weight" value="<?php echo $weight; ?>" class="form-control in-line2">
                            </div>                           
                          </div>
                           <button type="submit" name="Submit" class="btn btn-success submit-space3 btn-size" onClick="MM_validateForm('name','','R','address','','R','phone','','R','email','','RisEmail');return document.MM_returnValue">
                            EDIT &raquo;</button> 

                          </form>

                         </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>    
   
          
          
        <!--   <form method="post" name="frmShipment" class="register" style="margin-top:50px" > 
          
       <h1> EDIT CONSIGNMENT DETAILS </h1>


  <table cellpadding="2" cellspacing="2" align="center" width="75%" border="0"> 

    

    <tbody>
     <tr> 

      <td  align="right" width="336">&nbsp;</td> 

      <td  width="394"> <font color="#00CC00"><font size="+1"><?php echo $succesfull; ?></font></font> </td> 
    </tr> 
 <tr> 

      <td  align="right" width="336">WAYBILL NO  : </td> 

      <td  width="394"><input type="text" name="consignmentNo" readonly style="border: none" value="<?php echo $waybill_no; ?>"/>&nbsp;</td> 
    </tr> 
    <tr> 

      <td  align="right" width="336">Consigner Name  : </td> 

      <td  width="394"><input type="text" name="consignername" id="consignername" value="<?php echo $consignor_name; ?>"/></td> 
    </tr> 

   

    <tr>

      <td  align="right">Consigner Address :</td>

      <td ><input type="text" name="consigneraddress" id="consigneraddress" value="<?php echo $consignor_add; ?>"/></td>
    </tr>

    <tr>

      <td align="right">Consigner Phone  :</td>

      <td><input type="text" name="consignerphone" id="consignerphone" value="<?php echo $consignor_phone; ?>"/></td>
    </tr>

    <tr>
      <td  align="right" width="336">Consignee Name  : </td>
      <td ><input type="text" name="consigneename" id="consigneename" value="<?php echo $consignor_name; ?>"/></td>
    </tr>
    <tr>
      <td  align="right">Consignee Address :</td>
      <td ><input type="text" name="consigneeaddress" id="consigneeaddress" value="<?php echo $consignor_add; ?>"/></td>
    </tr>
    <tr>
      <td align="right">Consignee Phone  :</td>
      <td ><input type="text" name="consigneephone" id="consigneephone" value="<?php echo $consignor_phone; ?>"/></td>
    </tr>
    <tr>
      <td align="right">Destination:</td>
      <td ><input type="text" name="destination" id="destination" value="<?php echo $destination; ?>"/></td>
    </tr>
    <tr>
      <td align="right">Service type:</td>
      <td ><input type="text" name="servicetype" id="servicetype" value="<?php echo $service_type; ?>"/></td>
    </tr>
    <tr>
      <td align="right">Parcel Description:</td>
      <td ><input type="text" class="long" id="description" name="description" value="<?php echo $description; ?>" /></td>
    </tr>
    <tr>
      <td align="right">Quantity</td>
      <td > <input type="text" class="long" name="quantity" id="quantity"value="<?php echo $quantity; ?>"/></td>
    </tr>
    <tr>
      <td align="right">Weight:</td>
      <td ><input type="text" id="weight" name="weight" value="<?php echo $weight; ?>" /></td>
    </tr>
    <tr>
      
      <td align="right"> </td>
      
      <td ><button class="button" name="Submit" type="submit" onClick="MM_validateForm('name','','R','address','','R','phone','','R','email','','RisEmail');return document.MM_returnValue">EDIT &raquo;</button></td>
    </tr>

   
  </tbody></table> 

  

  </td>

  </tr>



</tbody></table>
	    
           </form>-->
      
    <?php } 
?>
     
  </div>
</body></html>
