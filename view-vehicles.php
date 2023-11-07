<?php
session_start();
require_once('database.php');
require_once('library.php');




$sql = "SELECT vehicle_id, vehicle_reg_no, vehicle_type
        FROM vehicle
		
		
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
<link rel="stylesheet" type="text/css" href="style/style.css" title="style">
<link rel="stylesheet" type="text/css" href="style/divstyle.css" title="style">
<link rel="stylesheet" type="text/css" href="style/default.css" title="style">
<style type="text/css">

</style>       
</head>

<body>

<?php
include("admin-header.php");
?>


<div class="col-md-8 col-md-offset-3 mydash2">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                         VEHICLES
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="table-responsive">
                            <script language="JavaScript">
                                function are_u_sure()
                                {
                                   return confirm("are you sure you want to delete this vehicle");
                                }
                            </script>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Vehicle Registration</th>
                                            <th>Type</th>
                                            <th align="center">Edit</th>
                                            <th align="center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php  
                                        while($data = dbFetchAssoc($result))
                                        {
                                          extract($data); 
                                      ?>
                                        <tr onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF">
                                            <td><?php echo $vehicle_reg_no; ?></td>
                                            <td><?php echo $vehicle_type; ?></td>
                                            <td align="center"><a href="edit-vehicle.php?vid=<?php echo $vehicle_id ?>" title="Edit">
                                                <img src="images/edit_icon.gif" border="0" height="20" width="20"></a>
                                            </td>
                                            <td align="center">
                                                <a href="process.php?vid=<?php echo $vehicle_id ?>&amp;action=delete-vehicle" onClick="return are_u_sure();" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                            </td>
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
