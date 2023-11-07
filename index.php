<?php
session_start();
require_once('database.php');
require_once('library.php');
$error = "";
if(isset($_POST['txtusername'])){
	$error = checkUser($_POST['txtusername'],$_POST['txtpassword'],$_POST['OfficeName']);
}//if

require_once('database.php');
$sql = "SELECT DISTINCT(location)
		FROM office";
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
<link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap/new.css" title="style">

<script language="javascript">
<!--
function memloginvalidate()
{
   if(document.form1.txtusername.value == "")
     {
        alert("Please enter  Username.");
        document.form1.txtusername.focus();
        return false;
     }
   if(document.form1.txtpassword.value == "")
     {
        alert("Please enter Password.");
        document.form1.txtpassword.focus();
        return false;
     }
   }

//-->
</script>
</head>

<body>

   <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><span class="logo"></span></a>
          </div><span class="newtitle">COURIER MANAGEMENT INFORMATION SYSTEM</span>
        </div><!--/.container-fluid -->
      </div>

      <div class="col-md-4 col-md-offset-4 log-form">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading mypanel">
                        <h3 class="panel-title">LOG IN</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name="form1" method="post" onSubmit="return memloginvalidate()">
                            <fieldset>
                              <font color="#FF0000" style="font-size:14px;">
                                  <center> <?php echo $error; ?> </center>
                              </font>
                                <div class="form-group">
                                    <input class="form-control log-input" placeholder="Username" name="txtusername" id="txtusername" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="txtpassword" id="txtpassword" type="password">
                                </div>
                                <div class="form-group">
                                    <label>OFFICE:</label>
                                    <select class="form-control" name="OfficeName">
                                      <?php 
                                        while($data = dbFetchAssoc($result)){
                                      ?>
                                    <option value="<?php echo $data['location']; ?>" > <?php echo $data['location']; ?></option>
                                    <?php 
                                       } //while
                                    ?>
                                    </select>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login Now">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

    </div> <!-- /container -->

</body>
</html>
