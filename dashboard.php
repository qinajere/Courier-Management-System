<?php
session_start();
require_once('library.php');
isUser();
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
                          <?php  
                            if ($_SESSION['user_type'] == 'clerk')
                            {
                              echo 'FRONT OFFICE';
                            }
                            elseif ($_SESSION['user_type'] == 'Manager')
                            {
                               echo 'OPERATIONS';
                            }
                            else
                            {
                                echo 'ACCOUNTS';
                            }
  
                          ?>  
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table dash-table">
                                    <tbody>
                                        <tr>
                                            <td><img  src="images/payment_card_credit-512.png" width="52" height="45"/></td>
                                            <td><img  src="images/registered_user-512.png" width="52" height="45"/></td>
                                            <td><img  src="images/45951.png" width="52" height="45"/></td>
                                            <td><img   src="images/46060.png" width="52" height="45"/></td>
                                        </tr>
                                        <tr>
                                            <td><a href="add_parcel.php">ADD CASH CUSTOMER CONSIGNMENT</a></td>
                                            <td><a href="credit_waybill.php">ADD CREDIT CUSTOMER CONSIGNMENT</a></td>
                                            <td><a href="create_manifest.php">CREATE MANIFEST</a></td>
                                            <td><a href="recieve_courier.php">RECIEVE COURIER</a></td>
                                        </tr>
                                        <tr>
                                            <td><img  src="images/46083.png" width="52" height="45"/></td>
                                            <td><img src="images/46030.png" width="52" height="45"/></td>
                                            <td><img  src="images/45802.svg" width="52" height="45"/></td>
                                            <td><img  src="images/46041.png" width="52" height="45"/></td>
                                        </tr>
                                        <tr>
                                            <td><a href="create_delivery note.php">CREATE DELIVERY NOTE</a></td>
                                            <td><a href="show_parcels.php">SHOW ADDED CONSIGNMENTS</a></td>
                                            <td><a href="recieved_parcels.php"> SHOW RECIEVED CONSIGNMENTS</a></td>
                                            <td><a href="show_delivered_parcels.php"> SHOW DELIVERED CONSIGNMENTS</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                

</body>
</html>
