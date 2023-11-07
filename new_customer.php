<?php
session_start();
require_once('library2.php');

$succesfull = "";




if(isset($_POST['customername']))
{

 $succesfull = add_new_customer( $_POST['customername'], $_POST['address'], $_POST['post_address'], $_POST['phone'], $_POST['email'],$_POST['regdate'],$_POST['office'] );
 
}
	
	 

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
                          REGISTER NEW CUSTOMER
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" method="post" name="frmShipment">
                                    <div class="form-group">
                                      <label class="mini-label">DATE: </label>
                                      <input type="text" name="regdate" class="mini-label2" readonly value="<?php echo date("Y/m/d")?>"/> 
                                      <label class="mini-label"> OFFICE: </label>
                                      <input type="text" name="office"  class="mini-label2" readonly value="<?php echo $_SESSION['office']?>"/>
                                    </div>
                                    <div class="form-group">
                                      <label class="manifest-label"> <?php echo $succesfull; ?></label>
                                    </div>
                                    <div class="form-group">
                                      <label class="mini-label color">CUSTOMER DETAILS: </label>                                     
                                    </div>
                                    <hr>
                                    <div class="col-md-6 div-space">
                                        <div class="form-group">
                                            <label>Customer Name:</label>
                                            <input type="text" name="customername" id="customername" class="form-control in-line2">
                                        </div>
                                        <div class="form-group">
                                           <label>Phone:</label>
                                           <input type="text" name="phone" id="phone" class="form-control in-line2"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Email: </label>
                                            <input type="text" name="email" id="email"  class="form-control in-line2"/>
                                          </div>                                        
                                      </div>

                                      <div class="col-md-6 div-space">
                                        <div class="form-group">
                                           <label>Phyical Address:</label>
                                           <textarea name="address" cols="27" rows="2" id="address" class="form-control in-line2"></textarea>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                           <label>Postal Address:</label>
                                           <textarea name="post_address" cols="27" rows="2" id="post_address" class="form-control in-line2"></textarea>
                                        </div>
                                        
                                       
                                      </div>

                                        <button type="submit" name="Submit" class="btn btn-success submit-space2" onClick="MM_validateForm('customername','','R','address','','R','phone','','R','email','','RisEmail');return document.MM_returnValue">
                                          REGISTER CUSTOMER  &raquo;</button>
                                    </form>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
          
      
</body></html>
