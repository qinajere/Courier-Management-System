<?php
session_start();
require_once('library.php');


$off = $_SESSION['office'];


$sql = "SELECT waybill_no, consignor_name, consignee_name, description, destination, quantity, total_charged, status 
	          FROM waybill
	          WHERE destination = '$off'
			  AND status = 'in transit'
			 
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
</head>

<body>

  <?php
include("header.php");
?>
       
  <div class="col-md-8 col-md-offset-3 mydash">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                         PARCELS IN TRANSIT
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Waybill Number</th>
                                            <th>Consigner</th>
                                            <th>Consignee</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php  
                                        while($data = dbFetchAssoc($result))
                                        {
                                          extract($data); 
                                      ?>
                                        <tr style="cursor:pointer" onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF" onDblClick="window.location='recr_way_pdf.php?wbn=<?php echo $waybill_no; ?>'">
                                            <td><?php echo $waybill_no; ?></td>
                                            <td><?php echo $consignor_name; ?></td>
                                            <td><?php echo $consignee_name; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $quantity; ?></td>
                                        </tr>
                                         <?php
                                          }//while
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div> 
	    
<!--<table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style="margin-left:200px; margin-top:40px">
  <tbody><tr>
    <td width="900">


	</td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF">
	
<table border="0" align="center" width="80%" style="margin-left:50px" >
    <tbody><tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left"><div class="Partext1" align="center"><strong>PARCELS IN TRANSIT </strong></div></td>
    </tr>
  </tbody></table>

 
  <table border="0" cellpadding="1" cellspacing="1" align="center" width="95%">
    <tbody>
	<tr>
    <td>
	</td>
    </tr>
  </tbody></table>
  <table class="blackbox" border="0" cellpadding="1" cellspacing="1" align="center" width="95%" style="margin-left:30px">
    <tbody><tr class="BoldRED" bgcolor="#FFFFFF" style="height:20px; color: #FFF">
     
     <td class="newtext" bgcolor="grey" width="10%">Waybill Number</td>
      <td  bgcolor="grey" width="11%">Consigner</td>
      <td  bgcolor="grey" width="11%">Consignee</td>
      <td  bgcolor="grey" width="9%">Description</td>
      <td  bgcolor="grey" width="6%">Quantity</td>
      
      
    </tr>
    
	<?php
	
	while($data = dbFetchAssoc($result))
	{
	extract($data);	
	?>
      <tr style="cursor:pointer" onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF" onDblClick="window.location='recr_way_pdf.php?wbn=<?php echo $waybill_no; ?>'">
	
      
      <td ><?php echo $waybill_no ?></td>
      
      <td ><?php echo $consignor_name; ?></td>
      <td ><?php echo $consignee_name; ?></td>
      <td ><?php echo $description; ?></td>
      <td> <?php echo $quantity; ?> </td>
      
    </tr>
    <?php
	}//while
	?>
	  </tbody></table>
  <br>
	
    </td>
  </tr>
  
</tbody></table>
</td>
  </tr>
</tbody></table>-->
	
</body></html>
