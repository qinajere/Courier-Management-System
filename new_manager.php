<?php
session_start();
require_once('library2.php');

$succesfull = "";

$sql = "SELECT DISTINCT(location)
		FROM office
		";
$result = dbQuery($sql);

if(isset($_POST['firstname']))
{

 $succesfull = add_new_manager( $_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['phone'], $_POST['address'], $_POST['email'], $_POST['office'], $_POST['password'],$_POST['regdate']);
 
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

function check() {
    if(document.getElementById('password').value == document.getElementById('confirmpassword').value) {
        document.getElementById('message').innerHTML = "match";
    } else {
        document.getElementById('message').innerHTML = "no match";
    }
}

function check_legnth()
{
	if(document.getElementById('password').value.length < 8) 
	
	{ 
	
	alert("Password must contain at least 8 characters!"); 
	
	form.pwd1.focus(); 
	
	return false;
	}
}

</script>

 	
        
</head>

<body>

  <?php
include("admin-header.php");
?>

<div class="col-md-8 col-md-offset-3 mydash2">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                         ADD NEW MANAGER
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" method="post" name="frmShipment">
                                      <div class="form-group">
                                      <label class="color"><?php  echo $succesfull;?></label>                                     
                                    </div>
                                    <div class="form-group">
                                      <label class="mini-label">DATE: </label>
                                      <input type="text" name="regdate" class="mini-label2" readonly value="<?php echo date("Y/m/d")?>"/>                                       
                                    </div>                                    
                                    <div class="form-group">
                                      <label class="mini-label color">MANAGER DETAILS: </label>                                     
                                    </div>
                                    <hr>
                                    <div class="col-md-6 div-space">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" name="firstname" id="firstname" class="form-control in-line2">
                                        </div>
                                        <div class="form-group">
                                           <label>Last Name:</label>
                                           <input type="text" name="lastname" id="lastname" class="form-control in-line2"/>
                                        </div>
                                        <div class="form-group">
                                           <label>Username:</label>
                                           <input type="text" name="username" id="username" class="form-control in-line2"/>
                                        </div>
                                        <div class="form-group">
                                           <label>Phone:</label>
                                           <input type="text" name="phone" id="phone" class="form-control in-line2"/>
                                        </div>
                                         <div class="form-group">
                                           <label>Address:</label>
                                           <textarea name="address" cols="27" rows="2" id="address" class="form-control in-line2"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-6 div-space">
                                         <div class="form-group">
                                            <label>Email: </label>
                                            <input type="text" name="email" id="email"  class="form-control in-line2"/>
                                          </div>
                                          <div class="form-group">
                                            <label>Location: </label>
                                            <select name="office" id="office" class="form-control in-line2">
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
                                           <label>Password:</label>
                                           <input type="password" name="password" id="password" onchange="check_legnth()" class="form-control in-line2"/>
                                        </div>
                                        <div class="form-group">
                                           <label>Confirm Password:</label>
                                           <input type="password" name="confirmpassword" id="confirmpassword" onKeyUp="check()" class="form-control in-line2"/>
                                        </div>
                                       
                                      </div>

                                        <button type="submit" name="Submit" class="btn btn-success submit-space2" onClick="MM_validateForm('firstname','','R','lastname','','R','username','','R','phone','','R','address','','R','email','','R','office','','R','password','','R','confirmpassword','','R');return document.MM_returnValue">
                                          ADD MANAGER  &raquo;</button>
                                    </form>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
  
    
      
  
</body></html>
