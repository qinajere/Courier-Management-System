<?php
session_start();
require_once('library.php');


$off = $_SESSION['office'];


$sql = "SELECT waybill_no, way_date, way_time,source,destination,manifest_no 
         FROM waybill 
		 WHERE status = 'at source'
		 OR status = 'in transit'
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
                        LATE PARCELS
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="checking.php" method="post" name="check">
                          
                          <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>  
                                            <th>Waybill Number</th>
                                            <th>Hours Late</th>
                                            <th>Source</th>
                                            <th>Destination</th>
                                            <th>Manifest</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $curr = date("Y-m-d"). " ". date("h:i:sa");
                                      while($data = dbFetchAssoc($result))
                                      {
                                      
                                      
                                      $wbdate = $data['way_date']. " ". $data['way_time'];
                                      $ts1 = strtotime(str_replace('/', '-', $wbdate));
                                        $ts2 = strtotime($curr);
                                      
                                        $diff = abs($ts1 - $ts2) / 3600;
                                      
                                      if ($diff > 24)
                                      {
                                        
                                        ?>
                                       <tr>  
                                        <td ><?php echo $data['waybill_no'] ?></td>
                                         <td ><?php echo number_format($diff-24, 0,'' ,'') ?></td>
                                          <td ><?php echo $data['source'] ?></td>
                                           <td ><?php echo $data['destination'] ?></td>
                                            <td  style="cursor:pointer" onDblClick=" window.open('recr_man_pdf.php?man=<?php echo $data['manifest_no'] ?>', '_blank')" ><?php echo $data['manifest_no'] ?></td>
            
                                      </tr>

                                        <?php
                                          }
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
