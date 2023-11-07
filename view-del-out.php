<?php
session_start();
require_once('library.php');


$off = $_SESSION['office'];


$sql = "SELECT delivery_no, date, driver, vehicle, created_by, status
	          FROM delivery_note
	          WHERE office = '$off'
			  AND status = ' '
			 
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
                         DELIVERY SHEETS OUT FOR DELIVERY
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Note Number</th>
                                            <th>Driver</th>
                                            <th>Vehicle</th>
                                            <th>Created by</th>
                                            <th>Date</th>
                                            <th>Consignments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php  
                                        while($data = dbFetchAssoc($result))
                                        {
                                          extract($data); 
                                      ?>
                                        <tr style="cursor:pointer"  onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF" onDblClick="window.location='recr_deli_pdf.php?deli=<?php echo $delivery_no; ?>'">
                                            <td><?php echo $delivery_no; ?></td>
                                            <td><?php echo $driver; ?></td>
                                            <td><?php echo $vehicle; ?></td>
                                            <td><?php echo $created_by; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td class="mylink"><a href="view-deli-parc.php?deli=<?php echo $delivery_no ?>">Show..</a></td>
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
