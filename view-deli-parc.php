<?php
session_start();
require_once('library.php');


$off = $_SESSION['office'];
$deli = $_GET['deli'];

			  
			  $sql = "SELECT waybill.waybill_no, waybill.consignor_name,  waybill.consignee_name, waybill.description, waybill.destination, waybill.quantity, waybill.total_charged, waybill.status 
	          FROM waybill, delivery_details
	          WHERE waybill.waybill_no = delivery_details.waybill_no AND delivery_details.delivery_no = '$deli'";
			  
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
#main #header #adminbar table {
	color: #333333;
}
</style>



 
		
        
</head>

<body>

  <?php
include("header.php");
?>

<div class="col-md-8 col-md-offset-3 mydash">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                         PARCELS IN DELIVERY SHEET <?php echo $deli;?>
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="table-responsive">
                                <table class="table">
                                  <script language="JavaScript">

                                  function are_u_sure()
                                  {
                                    return confirm("are you sure you want to delete this employee");
                                  }
                                  </script>
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
                                            <td ><?php echo $waybill_no ?></td>                                            
                                            <td ><?php echo $consignor_name; ?></td>
                                            <td ><?php echo $consignee_name; ?></td>
                                            <td ><?php echo $description; ?></td>
                                            <td> <?php echo $quantity; ?> </td>
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
     
	  


</body></html>
