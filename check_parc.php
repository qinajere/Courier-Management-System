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
                            <form action="checking.php" method="post" name="check">
                          <label class="user-job">
                         PARCELS IN MANIFEST: <input name="manifest" type="text"  value="<?php echo $man;?>" class="myinput form-bg">
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                  <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Check</th>
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
                                        <tr style="cursor:pointer; <?php if ($status != 'in transit') echo 'color:green' ; if ($status == 'in transit') echo 'color:red'?> "  onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF" onDblClick="window.location='recr_way_pdf.php?wbn=<?php echo $waybill_no; ?>'">
  
                                      <td ><?php if ($status != 'in transit') echo '<img src="images/tick.png" width="16" height="16" alt="at destination">';
  
                                   if ($status == 'in transit') echo '<input name="checkit[]" align="middle" type="checkbox" value="'.$waybill_no.'" > <img src="images/exclamation-red.png" width="16" height="16" alt="at destination">';
  
  
                                         ?>
                                      </td>
                                            <td><?php echo $waybill_no; ?></td>
                                            <td><?php echo $consignor_name; ?></td>
                                            <td><?php echo $consignee_name; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $quantity; ?></td>

                                         <?php
                                          }//while
                                        ?>
                                        <tr><td>  </td></tr>
                                    </tbody>

                                </table>
                                <input name="" type="submit" class="btn btn-success" value="Recieve parcels">
                            </div>
	
    </form>
                          </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>     
  

  
  
</body></html>
