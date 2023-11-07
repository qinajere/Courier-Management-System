<?php
session_start();


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
<style type="text/css">

.ds_box {
	background-color: #FFF;
	border: 1px solid #000;
	position: absolute;
	z-index: 32767;
}

.ds_tbl {
	background-color: #FFF;
}

.ds_head {
	background-color: #333;
	color: #FFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	text-align: center;
	letter-spacing: 2px;
}

.ds_subhead {
	background-color: #CCC;
	color: #000;
	font-size: 12px;
	font-weight: bold;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	width: 32px;
}

.ds_cell {
	background-color: #EEE;
	color: #000;
	font-size: 13px;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	padding: 5px;
	cursor: pointer;
}

.ds_cell:hover {
	background-color: #F3F3F3;
} /* This hover code won't work for IE */

</style>
</head>

<body>

  <?php
include("header.php");
?>

<div class="col-md-8 col-md-offset-3 mydash">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                          MONTHLY REVENUE ANALYSIS REPORT
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" action="monthly_pdf.php" method="post" name="frmShipment" target="_blank">

                                     <div class="form-group">
                                      <label class="mini-label color">SELECT MONTH AND YEAR: </label>                                     
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>MONTH:</label>
                                            <?php
                                                $monthArray = range(1, 12);
                                            ?>
                                            <select name="month" class="form-control in-line2">
                                                <option value="">Select Month</option>
                                           <?php
                                               foreach ($monthArray as $month)
                                               {
                                                // padding the month with extra zero
                                                $monthPadding = str_pad($month, 2, "0", STR_PAD_LEFT);
                                                // you can use whatever year you want
                                                // you can use 'M' or 'F' as per your month formatting preference
                                                $fdate = date("F", strtotime("2015-$monthPadding-01"));
                                                echo '<option value="'.$fdate.'">'.$fdate.'</option>';
                                              }
                     
                                           ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>YEAR:</label>
                                            <?php
                                              // set start and end year range
                                              $yearArray = range(2000, 2050);
                                            ?>
                                             <!-- displaying the dropdown list -->
                                            <select name="year" class="form-control in-line2">
                                               <option value="">Select Year</option>
                                           <?php
                                              foreach ($yearArray as $year)
                                              {
                                               // if you want to select a particular year
                                                $selected = ($year == 2017) ? 'selected' : '';
                                                echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                              }
                                           ?>
                                            </select>
                                        </div>
                                         <button type="submit" class="btn btn-success submit-space3" onClick="MM_validateForm('destination','','R','drivername','','R','vehicle','','R');return document.MM_returnValue">VIEW &raquo;</button>
                                      </div>

                                       
                                    </form>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
  <?php
  
     
  ?>        
    
</body></html>
