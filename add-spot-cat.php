<?php
session_start();
require_once('database.php');

$off = $_SESSION['office'];


$sql = "SELECT distinct category.category FROM category, rate_table WHERE ((category.id= rate_table.category_id) AND (rate_table.service_id = 1))";
				
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
<link rel="stylesheet" type="text/css" href="style/style.css" title="style">
<link rel="stylesheet" type="text/css" href="style/divstyle.css" title="style">
<link rel="stylesheet" type="text/css" href="style/default.css" title="style">
<style type="text/css">

.ds_box {
	background-color: #FFF;
	border: 1px solid #000;
	position: absolute;
	z-index: 32767;
}

.ds_tbl {
	background-color: #FFF;
}

.ds_head {
	background-color: #333;
	color: #FFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	text-align: center;
	letter-spacing: 2px;
}

.ds_subhead {
	background-color: #CCC;
	color: #000;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	width: 32px;
}

.ds_cell {
	background-color: #EEE;
	color: #000;
	font-size: 13px;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	padding: 5px;
	cursor: pointer;
}

.ds_cell:hover {
	background-color: #F3F3F3;
} /* This hover code won't work for IE */

</style>


 
		
        
</head>

<body>

  <div id="main">
  <?php
include("header.php");
?>
    
    <div id="site_content">
          <div id="content">
         
</br>
  
<form action="sales_pdf.php"  class="register" method="post" name="frmShipment" target="_blank" > 


 <h1>EDIT SPOT CASH RATES</h1>
            <p>&nbsp;</p>
            
                    
            
            <fieldset class="row1">
            <legend>ENTER FIELDS:
                </legend>
              <p>&nbsp;</p>
              
             
                
             <p>&nbsp;</p>
             
                <p>
                 <label style="margin-left:105px" >CHOOSE CATEGORY TO EDIT: 
                    </label>
                   <select name="category" id="category"  >
                   
			<?php 
			while($data = dbFetchAssoc($result))
			{
			?>
			<option value="<?php echo $data['category']." ".$data['category']; ?>" > <?php echo $data['category']; ?></option>
			<?php 
			} //while
			?>
            </select>
               
                   
                </p>
                 <p>&nbsp;</p>
                  
                 
                    
                <p>
                   
                </p>
                 <p>&nbsp;</p>
                 <p>
            <div><button class="button" name="Submit" type="submit" onClick="MM_validateForm('destination','','R','drivername','','R','vehicle','','R');return document.MM_returnValue">GENERATE &raquo;</button></div>
            </p>
                
            </fieldset>
           
            
           

  </form>
  <?php
  
     
  ?>        
          
      </div>
    </div>
  </div>
</body></html>
