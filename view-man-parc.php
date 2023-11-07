<?php
session_start();
require_once('library.php');


$off = $_SESSION['office'];
$man = $_GET['mid'];

$sql = "SELECT waybill_no, consignor_name, consignee_name, description, destination, quantity, total_charged, status 
	          FROM waybill
	          WHERE manifest_no= '$man'	
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
                         PARCELS IN MANIFEST <?php echo $man;?>
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
                                        <tr onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF"  onDblClick="window.location='recr_way_pdf.php?wbn=<?php echo $waybill_no; ?>'">
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
	    

	
</body></html>
