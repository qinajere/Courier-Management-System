<?php
session_start();
require_once('database.php');

$off = $_SESSION['office'];

$sql = "SELECT DISTINCT(location)
		FROM office
		WHERE location != '$off'
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




function total1()
{

 var weight = $("#weight").val()
var destination =$("#destination option:selected").val()
var service = '1'
var type = 'branch'

if (destination != "...choose..." & weight > 0.00 )
{

$.ajax(
                      {
                         type : 'post',
                         url : 'total.php',
                         data : {weight:weight, destination:destination, service:service, type:type},
						  
						  success: function(data) 
						  {
							 if (data == 1)
							 {
								 $("#total").val('0.00')
								 alert("ERROR! Source and destination does not belong to any category")
								 
							 }
							 else if (data == 2)
							 {
								 $("#total").val('0.00')
							  alert("ERROR! Source and destination belongs to more than one category")
							  
							 }
							 else 
							 {
								  $("#total").val(data)
							 }
	                      }
						  
					  }
                      
                    );
					
}

else
{
	$("#total").val('0.00')
}
					
}

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
                          SPOT CASH CONSIGNMENT
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" action="create_waybill_pdf.php" method="post" name="frmShipment" target="_blank">

                                    <div class="form-group">
                                      <label class="mini-label">DATE: </label>
                                      <input type="text" name="consignmentdate" class="mini-label2" readonly value="<?php echo date("Y/m/d")?>"/> 
                                      <label class="mini-label"> SERVICE TYPE: </label>
                                      <input type="text" name="servicetype"  class="mini-label2" readonly value="spotcash"/>
                                    </div>
                                    <div class="col-md-6 div-space">
                                        <label class="mini-title">Consigner</label>
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="consignername" id="consignername" class="form-control in-line">
                                        </div>
                                        <div class="form-group">
                                           <label>Phone:</label>
                                           <input type="text" name="consignerphone" id="consignerphone" class="form-control in-line"/>
                                        </div>
                                        <div class="form-group">
                                           <label>Address:</label>
                                           <textarea name="consigneraddress" cols="27" rows="2" id="consigneraddress" class="form-control in-line"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-6 div-space">
                                        <label class="mini-title">Consignee</label>
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="consigneename" id="consigneename" class="form-control in-line">
                                        </div>
                                        <div class="form-group">
                                           <label>Phone:</label>
                                           <input type="text" name="consigneephone" id="consigneephone" class="form-control in-line"/>
                                        </div>
                                        <div class="form-group">
                                           <label>Address:</label>
                                           <textarea name="consigneeaddress" cols="27" rows="2" id="consigneeaddress" class="form-control in-line"></textarea>
                                        </div>
                                      </div>

                                        <div class="col-md-6">
                                          <label class="mini-title">Parcel Details</label>
                                          <div class="form-group">
                                            <label>Description : </label>
                                            <input type="text" id="description" name="description"  class="form-control in-line"/>
                                          </div>
                                          <div class="form-group">
                                            <label>Weight : </label>
                                            <input type="text" id="weight" name="weight" value="0.00"  onChange="total1();" class="form-control in-line"/>
                                          </div>
                                          <div class="form-group">
                                            <label>Quantity : </label>
                                            <input type="text" name="quantity" id="quantity" class="form-control in-line"/>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <label class="mini-title">Charge Details</label>
                                          <div class="form-group">
                                            <label>Destination: </label>
                                            <select name="destination" id="destination" onChange="total1();" class="form-control in-line">
                                                <option selected="selected">...choose...</option>
                                                  <?php 
                                                     while($data = dbFetchAssoc($result)){
                                                  ?>
                                                <option value="<?php echo $data['location']; ?>" > <?php echo $data['location']; ?></option>
                                                 <?php 
                                                    } //while
                                                 ?>
                                          </select>
                                          </div>
                                          <div class="form-group">
                                            <label class="bold total">TOTAL:</label>
                                            <input id="total" readonly name="total" type="text" value="0.00" style=" border:none; height:22px; font-size:18px; font-weight:bold">
                                          </div>
                                        </div>

                                        <button type="submit" name="Submit" class="btn btn-success submit-space spaced-out" onClick="MM_validateForm('consignername','','R','consignerphone','','R','consigneraddress','','R','consigneename','','R','consigneephone','','R','consigneeaddress','','R','description','','R','weight','','RisNum','quantity','','RisNum','servicetype','','R','destination','','R');return document.MM_returnValue">
                                          ADD PARCEL &raquo;</button>
                                        <button type="reset" name="clear" class="btn btn-danger">CLEAR &raquo;</button>
                                    </form>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

</body>
</html>
