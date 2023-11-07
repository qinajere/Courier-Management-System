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
<link rel="stylesheet" type="text/css" href="style/style.css" title="style">
<link rel="stylesheet" type="text/css" href="style/divstyle.css" title="style">
<style type="text/css">
}
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
                         ADMIN PANEL
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table dash-table">
                                    <tbody>
                                        <tr>
                                            <td><img  src="images/registered_user-512.png" width="52" height="45"/></td>
                                            <td><img  src="images/46028.svg" width="52" height="45"/></td>
                                            <td><img  src="images/registered_user-512.png" width="52" height="45"/></td>
                                            <td><img  src="images/46007.svg" width="52" height="45"/></td>
                                        </tr>
                                        <tr>
                                            <td><a href="new_manager.php">ADD MANAGER</a></td>
                                            <td><a href="add-office.php">ADD OFFICE</a></td>
                                            <td><a href="add-driver.php">ADD DRIVER</a></td>
                                            <td><a href="add-vehicle.php">ADD VEHICLE</a></td>
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
   
 
</body></html>
