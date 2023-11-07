<?php
session_start();
require_once('library.php');

$num= $_GET['number'];

$off = $_SESSION['office'];


$sql = "SELECT manifest_no, destination, driver, vehicle, status , comment,created_by, manifest_date, recieve_date
	          FROM manifest
	          WHERE destination = '$off'
			  AND manifest_no = '$num'
			 
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

  <div id="main">
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
                          <div class="table-responsive">
                            <script language="JavaScript">
                                function sure()
                                  {
                                    return confirm("are you sure you want to delete this customer");
                                  }
                            </script>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Manifest Number</th>
											  <th>Destination</th>
											  <th>Driver</th>
											  <th>Vehicle</th>
											  <th>Created by</th>
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
                                         <tr style="cursor:pointer"  onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF" onDblClick="window.location='recr_man_pdf.php?man=<?php echo $manifest_no; ?>'">
	
      
										  <td ><?php echo $manifest_no; ?></td>										 
										  <td ><?php echo $destination; ?></td>
										  <td ><?php echo $driver; ?></td>
										  <td ><?php echo $vehicle; ?></td>
										  <td> <?php echo $created_by; ?> </td>
										   <td> <?php echo $manifest_date; ?> </td>
										   <td> <?php echo $recieve_date; ?> </td>
										  <td class="chechcheck"> <a href="check_parc.php?mid=<?php echo $manifest_no ?>"><span class=" fa fa-check-square-o"></span> Check</a> </td>
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