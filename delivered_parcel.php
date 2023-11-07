<?php
session_start();
require_once('database.php');


$waybill_no = $_POST['waybillno'];
$employee =  $_SESSION['employee'];
$curr_date = date("Y/m/d");
$reciever = $_POST['reciever'];
$recieverID = $_POST['recieverID'];

 
 $sql11 = "SELECT waybill_no, consignor_name, consignee_name, description, destination, quantity, total_charged, status, delivered_by, delivered_date 
	          FROM waybill
	          WHERE waybill_no = '$waybill_no'
			  AND service_type = 'spotcash'
			  "
			  ;
			  
			  
 $result11 = dbQuery($sql11);
 
 $no = dbNumRows($result11);

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
                         DELIVERED PARCEL
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="deliver_parcel.php">
                          <div class="table-responsive">
                          	<?php 
	
	if($no == 1)
	{
		$data = dbFetchAssoc($result11);
		
		$dest = $data['destination'];
		$state = $data['status'];
		$off = $_SESSION['office'];
		$dby = $data['delivered_by'];
		$ddate = $data['delivered_date'];
	
			   
			   if($dest == $off)
		          {
					  if ($state == "at source")
					  {
					  ?>
                   <p> the parcel is still at it source: <?php echo $source ?> </p> 
                   <?php
					  }
					  elseif ($state == "in transit")
					  {
				   ?>
                   
                    <p> the parcel is still in transit</p> 
                   
                     <?php
					  }
					  elseif ($state == "delivered" )
						 {
						 ?>
                         <?php
                         $sql14 = "SELECT waybill_no, name, id_no                    
	                              FROM recievers
	                              WHERE waybill_no = '$waybill_no'
			                      ";
						$result14 =	dbQuery($sql14);
						$row = dbFetchAssoc($result14);
						$rcvr = $row['name'] ;
						$rcvrID = $row['id_no']  
			  ?>
                         <label class="color2"> parcel was already delivered by  <?php echo $dby . " on " . $ddate . " to " . $rcvr . " with ID: ". $rcvrID ?> </label>
                         <?php
						 }
					 
				
					     else
					      {
                            echo'    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Waybill Number</th>
                                            <th>Consigner</th>
                                            <th>Consignee</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Charges</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                      
                                         echo "<tr>";
		                        echo "<td>" . $data['waybill_no'] . "</td>";
		                        echo "<td>" . $data['consignor_name'] . "</td>";
		                        echo "<td>" . $data['consignee_name'] . "</td>";
		                        echo "<td>" . $data['description'] . "</td>";
		                        echo "<td>" . $data['quantity'] . "</td>";
		                        echo "<td>" . $data['total_charged'] . "</td>";
		                        echo "</tr>
                                    </tbody>

                                </table>";
                             
                            $sql12 = "UPDATE waybill 
	                            SET status = 'delivered', delivered_by = '$employee', delivered_date = '$curr_date'
			                    WHERE waybill_no = '$waybill_no'
			                    AND   destination = '$off'
			                    AND   status = 'at destination'
	                            ";
								
								dbQuery($sql12);
								
								$sql13 = "INSERT INTO recievers (waybill_no, name, id_no, rec_date)
										 VALUES ('$waybill_no', '$reciever', '$recieverID','$curr_date')
										 ";
								dbQuery($sql13);		 
					       
						      }
					 

	           }
			   
			   else 
			   {
		?>	
        
        <label class="color2">the parcel does not belong to this destination. it belongs to:  <?php echo $dest ?> </label>
           
	<?php		   
	           }
			   
			   
    }
	else
	{
		
	
    ?>	
   
<label class="color2"> parcel with waybill number  <?php echo $waybill_no ?>  does not exist</label>

   <?php
	}
   
   ?>    
  <div><button class="btn btn-success"><span class="fa fa-angle-double-left "></span> Back  </button></div>
                            <!-- /.table-responsive -->
                          </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div> 
  
  
  
  
   
    
   
</body></html>
