<?php
session_start();
require_once('library.php');


$off = $_SESSION['office'];


$sql = "SELECT manifest.manifest_no, manifest.destination, manifest.driver, manifest.vehicle, manifest.status , manifest.comment,manifest.recieved_by, manifest.manifest_date, manifest.recieve_date
	          FROM manifest, waybill
	          WHERE(waybill.manifest_no = manifest.manifest_no) 
			  AND (waybill.status = 'in transit') 
			  AND (manifest.status = 'at destination')
			  GROUP BY manifest.manifest_no
			 
			 
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
                         RECIEVED MANIFEST
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="checking.php" method="post" name="check">
                         
                          <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="mycenter">                                  
                                            <th>Manifest Number</th>
                                            <th>Destination</th>
                                            <th>Driver</th>
                                            <th>Vehicle</th>
                                            <th>Recieved by</th>
                                            <th>Date</th>
                                            <th>Recieved date</th>
                                            <th>Consignments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php  
                                        while($data = dbFetchAssoc($result))
                                        {
                                          extract($data); 
                                      ?>
                                       <tr class="mycenter2" style="cursor:pointer"  onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF" onDblClick="window.location='recr_man_pdf.php?man=<?php echo $manifest_no; ?>'">
  
                                        <td ><?php echo $manifest_no; ?></td>                                       
                                        <td ><?php echo $destination; ?></td>
                                        <td ><?php echo $driver; ?></td>
                                        <td ><?php echo $vehicle; ?></td>
                                        <td> <?php echo $recieved_by; ?> </td>
                                         <td> <?php echo $manifest_date; ?> </td>
                                         <td> <?php echo $recieve_date; ?> </td>
                                        <td class="chechcheck"> <a href="check_parc.php?mid=<?php echo $manifest_no ?>"><span class=" fa fa-check-square-o"></span> Check</a> </td>
                                      </tr>

                                         <?php
                                          }//while
                                        ?>
                                        <tr><td>  </td></tr>
                                    </tbody>

                                </table>
                              
                            </div>
                            <!-- /.table-responsive -->
                          </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>  
	    

	

</body></html>
