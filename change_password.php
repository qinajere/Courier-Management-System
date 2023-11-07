<?php
session_start();
require_once('database.php');
require_once('library.php');
require_once('library2.php');


$eid= $_SESSION['emp_id'];

$succesfull = "";


if(isset($_POST['oldpassword']))
{

 $succesfull = change_password($_POST['empid'],$_POST['oldpassword'], $_POST['newpassword']);
 
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
	
	
} 


}
//-->

function check() {
    if(document.getElementById('newpassword').value == document.getElementById('confirmpassword').value) {
        document.getElementById('message').innerHTML = "match";
    } else {
        document.getElementById('message').innerHTML = "no match";
    }
}

function check_legnth()
{
	if(document.getElementById('newpassword').value.length < 8) 
	
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
include("header.php");
?>
    
 <div class="col-md-8 col-md-offset-3 mydash">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                          CHANGE PASSWORD
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" method="post" name="frmShipment">
                                    <div class="form-group">
                                      <label class="manifest-label"> <?php echo $succesfull; ?></label>
                                    </div>
                                    <div class="form-group">
                                      <label class="mini-label color">Employee ID: </label>  
                                      <input type="text" name="empid" id="empid" value="<?php echo $eid; ?>" class="mini-label2" readonly/>                                   
                                    </div>
                                    <hr>
                                    <div class="col-md-7 div-space">
                                        <div class="form-group">
                                            <label>Enter old password:</label>
                                            <input type="password" name="oldpassword" id="oldpassword" class="form-control in-line2">
                                        </div>
                                        <div class="form-group">
                                           <label>Enter new password:</label>
                                           <input type="password" name="newpassword" id="newpassword" onchange="check_legnth()" class="form-control in-line2"/>
                                        </div>
                                        <div class="form-group">
                                           <label>Confirm new password:</label>
                                           <input type="password" name="confirmpassword" id="confirmpassword" onKeyUp="check()" class="form-control in-line2"/>
                                        </div>
                                         <div class="form-group">
                                            <button type="submit" name="Submit" class="btn btn-success submit-space3" onClick="MM_validateForm('oldpassword','','R','newpassword','','R','confirmpassword','','R');return document.MM_returnValue">
                                            CHANGE  &raquo;</button>
                                       </div>
                                      </div>
                                     

                                        
                                    </form>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
   
 
     
</body></html>
