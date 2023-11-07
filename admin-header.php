<?php 
//session_start();

require_once('library.php');

//isUser();
?>

<script src="jquery/jquery-3.2.0.js"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="bootstrap/style.css" title="style">
 <script src="bootstrap/vendor/jquery/jquery.min.js"></script>
 <script src="bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>

   
    
   
  <nav class="navbar navbar-default navbar-inner" role="navigation">
    <div class="container-fluid">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="logo"></span></a>
        </div>
         <span class="title">COURIER MANAGEMENT INFORMATION SYSTEM</span>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="admin-menu">
          <ul class="nav navbar-nav nav-upper">
            <li><a href="admin.php">HOME</a> <span class="sr-only">(current)</span></a></li>      
            <li><a href="add-office.php" > New Office</a></li>                       
            <li><a href="new_manager.php" >New Manager</a></li>
            <li><a href="add-driver.php"> New Driver</a></li>
            <li><a href="add-vehicle.php"> New Vehicle</a></li>
            <li><a href="view-managers.php"> View Manager</a></li>
            <li><a href="view-offices.php"> View Offices</a></li>
            <li><a href="view-drivers.php"> View Drivers</a></li>
            <li><a href="view-vehicles.php">View Vehicles</a></li>
            

          </ul> <!-- .nav .navbar-nav -->    
    
      </div><!-- /.navbar-collapse -->
        
    </div><!-- /.container-fluid -->
</nav>


<div class = "user-log"> 

  
  <script language="JavaScript">
function are_u_sure()
{
  return confirm("are you sure you want to logout");
}
</script>

 <div class="new-table">
  <ul class="ul-one first-ul">
    <li ><img src="style/pic.png" alt="user" class="img-user" />
    <span class="td-width"><?php echo  $_SESSION['user_name'] ; ?></span></li>
  </ul>
</div>
<div class="myaccount">
        <ul id="MenuBar1" class="MenuBarHorizontal">
          <li><a class="MenuBarItemSubmenu" href="#"><label>My Account</label></a>
            <ul>
              <li><a href="process.php?action=logOut" onClick="return are_u_sure();">
                <img src="images/logout.png" width="30" height="32"/> Logout
              </a></li>
                
              <li><a href="change_admin_pass.php" >
                <img  src="images/changepassword.png" width="30" height="32"/> Change password
                <a></li>
                
 
        </ul>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
        </script>
    


</div>

  
  
  </div> 





  


