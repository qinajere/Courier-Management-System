<?php
session_start();
require_once('database.php');

$off = $_SESSION['office'];

$sql_driver = "SELECT DISTINCT(driver_name)
		FROM driver";
$result_driver = dbQuery($sql_driver);



$sql_vehicle = "SELECT DISTINCT(vehicle_reg_no)
		FROM vehicle";
$result_vehicle = dbQuery($sql_vehicle);

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
		  
		  if(val =="...choose...") errors+='- '+nm+' must not be  ...choose...\n';
		  
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
		   
        }
		
		 else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } 
	
	if (errors) alert('The following error(s) occurred:\n'+errors);
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
                          CREATE DELIVERY NOTE
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" action="create_delivery_pdf.php" method="post" name="frmShipment" target="_blank" >

                                     <div class="form-group">
                                      <label class="mini-label color">DELIVERY NOTE DETAILS: </label>                                     
                                    </div>
                                    <hr>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                        <?php
                                     $sql_2 = " SELECT waybill_no, consignor_name, consignee_name, description, quantity,                                                consignor_add, consignee_add
	                                            FROM waybill
	                                            WHERE destination = '$off'
			                                    AND   status = 'at destination'
			                                    AND  service_type != 'spotcash'
			  
	                                          ";
                                      $result = dbQuery($sql_2);
	 
	                                 $no = dbNumRows($result);
	 
	 
	                                 if($no >= 1) 
		                                  {
											  echo "<p style='color:green'> There are Parcels to be delivered </p>"; 
										  }
										  {
											   echo "<p style='color:red'> There are NO Parcels to be delivered </p>"; 
											  }
										  
										  ?>
                                        </div>
                                        <div class="form-group">
                                            <label>DATE:</label>
                                            <input type="text" name="deliverydate" class="mini-label2"  value= "<?php echo date("Y/m/d")?>" readonly/>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label>Office:</label>
                                            <input type="text" class="myinput" name="source" id="source" value="<?php echo $_SESSION['office'];?> " readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Driver:</label>
                                            <select name="drivername" id="drivername" class="form-control in-line">
                                              <option selected="selected">...choose...</option>
                                              <?php 
                                                while($data = dbFetchAssoc($result_driver)){
                                              ?>
                                              <option value="<?php echo $data['driver_name']; ?>" > <?php echo $data['driver_name']; ?></option>
                                              <?php 
                                                } //while
                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Vehicle:</label>
                                            <select name="vehicle" id="vehicle"  class="form-control in-line">
                                              <option selected="selected">...choose...</option>
                                              <?php 
                                                while($data = dbFetchAssoc($result_vehicle)){
                                              ?>
                                              <option value="<?php echo $data['vehicle_reg_no']; ?>" > <?php echo $data['vehicle_reg_no']; ?></option>
                                              <?php 
                                                } //while
                                              ?>
                                            </select>
                                        </div>

                                         <button type="submit" name="Submit" class="btn btn-success submit-space3" onClick="MM_validateForm('drivername','','R','vehicle','','R');return document.MM_returnValue">
                                          CREATE DELIVERY NOTE &raquo;</button>                                         
                                      </div>

                                       
                                    </form>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
    
</body>
</html>
