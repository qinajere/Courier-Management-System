<?php
session_start();
require_once('database.php');

$off = $_SESSION['office'];

$code = $_SESSION['user_code'];







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
		  
		  if(val =="...choose...") errors+='- Please choose '+nm+'\n';
		  
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
		   
        }
		
		 else if (test!='R') { num = parseFloat(val);
		 
		  if(num == 0.00) errors+='- '+nm+' value must not be 0.\n';
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
                          CUSTOMER PAYMENTS
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" action="reciept.php" method="post" name="frmShipment" target="_blank" >
                                    <div class="form-group">
                                      <label class="mini-label color">PAYMENT DETAILS: </label>                                     
                                    </div>
                                    <div class="form-group">
                                      <label class="mini-label">DATE: </label>
                                      <input type="text" name="Paydate" style="border: solid 0px"  value= "<?php echo date("Y/m/d")?>"  id="manifestdate" readonly/> 
                                      <label class="mini-label"> OFFICE: </label>
                                      <input type="text" name="office"  class="mini-label2" readonly value="<?php echo $_SESSION['office']?>"/>
                                    </div>
                                    
                                    <hr>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>CUSTOMER:</label>
                                            <input type="text" name="Customername" id="Customername" class="form-control in-line">                    
                                               
                                             
                                        </div>
                                        <div class="form-group">
                                            <label>MODE OF PAY:</label>
                                            <select name="Mode" id="Mode" class="form-control in-line3">
                                              <option selected="selected">...choose...</option>
                                              <option value="Cash">Cash</option>
                                              <option value="Cheque">Cheque</option>
                                           </select>
                                        </div>
                                        <div class="form-group">
                                            <label>TRANSACTION DETAILS:</label>
                                            <input type="text" name="Transaction" id="Transaction" class="form-control in-line"/>
                                        </div>
                                        <div class="form-group">
                                            <label>AMOUNT PAID:</label>
                                            <input type="text" name="Amount" id="Amount" value="0.00" class="form-control in-line3"/>
                                        </div>
                                         <button type="submit" class="btn btn-success submit-space3" onClick="MM_validateForm('Customername','','R','Mode','','R','Transaction','','R','Amount','','RisNum');return document.MM_returnValue">PAY &raquo;</button>
                                      </div>
                                    </form>
                                    
                                    
<script type="text/javascript" src="jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="jquery/jquery-ui.css">

<script>

  
    $( "#Customername" ).autocomplete({
      source: "search-con.php",
	  minLength:2
    });
 

</script>
                                    
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
   
        
   
</body></html>
