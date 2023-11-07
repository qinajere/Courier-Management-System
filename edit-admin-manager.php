<?php
session_start();
require_once('database.php');
require_once('library.php');
require_once('library2.php');


$eid= (int)$_GET['eid'];

$succesfull = "";


if(isset($_POST['fname']))
{

 $succesfull = edit_clerk($_POST['empid'], $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['phone'], $_POST['email']);
 
}

$sql = "SELECT *
		FROM employee
		WHERE emp_id = $eid";
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

<?php
include("admin-header.php");
?>


  <div class="col-md-8 col-md-offset-3 mydash2">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                          EDIT CUSTOMER DETAILS
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-6">
                                    <form role="form" method="post" name="frmShipment">
                                    <div class="form-group">
                                      <label class="manifest-label"> <?php echo $succesfull; ?></label>
                                    </div>
                                    <div class="form-group">
                                      <label class="mini-label">Customer ID: </label>
                                      <input type="text" name="empid" id="empid" readonly value="<?php echo $eid; ?>" class="mini-label2 bold"/> 
                                    </div>
                                    
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>" class="form-control in-line">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" name="lname" id="lname" value="<?php echo $lname; ?>" class="form-control in-line">
                                        </div>
                                        <div class="form-group">
                                           <label>Address:</label>
                                           <input type="text" name="address" id="address" value="<?php echo $address; ?>" class="form-control in-line"/>
                                        </div>
                                        <div class="form-group">
                                           <label>Phone:</label>
                                           <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" class="form-control in-line"/>
                                        </div>
                                        <div class="form-group">
                                           <label>Email:</label>
                                           <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="form-control in-line"/>
                                        </div>
                                        
                                        <button type="submit" name="Submit" class="btn btn-success submit-space5 upper-space " onClick="MM_validateForm('fname','','R','lname','','R','address','','R','phone','','R','email','','RisEmail');return document.MM_returnValue">
                                          EDIT &raquo;</button>
                                    </form>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
          
  
       
   
    <?php } 
?>
  
</body></html>
