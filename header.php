<?php 
//session_start();

require_once('library.php');
isUser();
?>
<script type="text/javascript" src="libs/jquery/jquery.js"></script>

<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery init -->
<script type="text/javascript">
  $(function() {
    $('#main-menu').smartmenus({
      subMenusSubOffsetX: 1,
      subMenusSubOffsetY: -8
    });
  });
</script>




<!-- SmartMenus core CSS (required) -->
<link href="css/sm-core-css.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

<link href="css/toggle.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />


<!-- YOU DO NOT NEED THIS - demo page content styles -->
<link href="libs/demo-assets/demo.css" rel="stylesheet" type="text/css" />


<link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <script src="bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="bootstrap/new.css" title="style">




    
    
      
     <?php
	 // Clerk and Manager Menu
	 
if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'Manager') )
 {
?> 
  <nav class="navbar navbar-inner" role="navigation">
    <div class="container-fluid">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="logo"></span></a>
        </div>
         <span class="newtitle">COURIER MANAGEMENT INFORMATION SYSTEM</span>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
          <ul id="main-menu" class="sm sm-blue">
            <li><a href="dashboard.php">HOME</a></li>      
            <li>
               <a href="#" >CONSIGNMENTS </a>
              <ul>
                <li>
                    <a href="#">Add</a>
                    <ul>
                      <li><a  href="add_parcel.php">Spot Cash</a></li>
                      <li><a href="door-waybill.php">Door to Door</a></li>
                      <li><a href="credit_waybill.php">Credit</a></li>
                    </ul>
                </li>
                 <li>
                    <a  href="#">View</a>
                    <ul>
                      <li><a  href="show_parcels.php">Added</a></li>
                      <li><a href="parcels-intransit.php">Intransit</a></li>
                      <li><a href="recieved_parcels.php">Recieved</a></li>
                      <li><a href="show_delivered_parcels.php">Delivered</a></li>
                    </ul>
                </li>                         
                <li><a href="deliver_parcel.php">Deliver</a></li>
               <li><a href="search-waybill.php">Search</a></li>
              </ul>
            </li> <!-- .dropdown -->   
             <li>
               <a href="#" >MANIFESTS </a>
              <ul>
               <li><a href="create_manifest.php">Create</a></li>
                 <li>
                    <a  href="#">View</a>
                    <ul>
                        <li><a href="view-man-intransit.php">Intransit</a></li>
                        <li><a href="view-man.php">At destination</a></li>
                        <li>
                            <a  href="#">Recieved</a>
                            <ul class="dropdown-menu">
                               <li><a href="view-man-all.php">All</a></li>
                               <li><a href="view-man-pen.php">Pending</a></li>
                            </ul>
                        </li> 
                    </ul>
                </li>                         
                <li><a href="recieve_courier.php">Recieve</a></li>
                <li><a href="search-manifest.php">Search</a></li>
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >DELIVERY SHEET </a>
              <ul>
               <li><a href="create_delivery note.php">Create</a></li>
                 <li>
                    <a  href="#">View</a>
                    <ul>
                        <li><a href="view-del-out.php">Out for delivery</a></li>
                        <li><a href="view-del-clear.php">Cleared</a></li>
                    </ul>
                </li>                         
                <li><a href="clear_delivery.php">Clear</a></li>
                <li><a href="search-delivery.php">Search</a></li>
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >REPORTS </a>
              <ul>
                <li><a href="view-consignments.php">Consignments report</a></li>
                <li><a href="view-delivery.php">Delivery report</a></li>
                <li><a href="sales_report.php">Sales report</a></li>
                <li><a href="view-recievers.php">Recievers report</a></li>
              </ul>
            </li> <!-- .dropdown -->    
          
   

    <?php 
}
// clerk and manager menu ends here
?>



<?php
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Manager') {
?>
      
    
    <link href="dist/styles/metro/notify-metro.css" rel="stylesheet" />
	<script src="dist/notify.js"></script>
	<script src="dist/styles/metro/notify-metro.js"></script>
   <link href="bootstrap/alert.css" rel="stylesheet" />

    
      
    <script>
setInterval(function() {
	
	$.ajax(
                      {
                          type : 'post',
                          url : 'fetch_test.php',	  
						  success: function(data) 
						  {
							 
							 if(data == '1')
							 {
							    notify('error');
								notify('warning');
							 }
							 
							 
							 if (data == '2')
							 {
								 notify('warning');
							 }
							 
							  if (data == '3')
							 {
								 notify('error');
							 }

	                      }
						  
					  }
                      
                    );
		
}, 5000);
</script>




<script type="text/javascript">

    function notify(style) {
        $.notify({
            title: 'ALERT',
            text: 'Some issues require your attention!',
            
        }, {
            style: 'metro',
            className: style,
            autoHide: true,
            clickToHide: true
        });
    }
</script>  

      
            <li>
               <a href="#" >CLERK </a>
              <ul>                         
               <li ><a href="new_clerk.php"> New </a></li>
              <li><a href="employee-list.php"> View </a></li>
              </ul>
            </li> <!-- .dropdown -->   
             <li>
               <a href="#" >CUSTOMER </a>
              <ul>                         
                <li><a  href="new_customer.php"> New </a></li>
              <li><a href="customer-list.php">View</a></li>
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >REVERSE TRANSACTIONS </a>
              <ul>
                <li><a href="reverse-waybill.php">Waybill</a></li>
                <li><a href="reverse-reciept.php">reciept</a></li>
                 <li>
                    <a  href="#">View</a>
                    <ul>
                        <li><a href="reg-reversal.php">registered</a></li>
                        <li><a href="reversals.php">non-registered</a></li>
                    </ul>
                </li>      
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >OTHER REPORTS </a>
              <ul>
                <li><a href="debtors_report.php">Customer</a></li>
               <li><a href="monthly_report.php">Monthly Revenue</a></li>
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >RATES </a>
              <ul>
                 <li>
                    <a  href="#">View rates</a>
                    <ul>
                         <li ><a href="view-spot.php" target="_blank"> Spot Cash </a></li>
                         <li ><a href="view-door.php" target="_blank"> Door to Door </a></li>
                         <li ><a href="view-credit.php" target="_blank"> Credit </a></li>
                    </ul>
                </li> 
                 <li>
                    <a  href="#">Edit rates</a>
                    <ul>
                         <li ><a href="edit-rates.php"> Spot Cash </a></li>
                         <li>
                          <a  href="#">Door to Door</i> </a>
                          <ul>
                            <li ><a href="edit-within.php">Within City</a></li>
                            <li ><a href="edit-outside.php"> Outside City </a></li>
                          </ul>                            
                         </li>
                         <li ><a href="edit-credit.php"> Credit </a></li>
                    </ul>
                </li> 
                 <li>
                    <a  href="#">Add Rates</a>
                    <ul>
                         <li ><a href="add-cat-spot.php"> Spot Cash </a></li>
                         <li>
                          <a  href="#">Door to Door</i> </a>
                          <ul>
                            <li ><a href="add-cat-within.php">Within City</a></li>
                            <li ><a href="add-cat-outside.php"> Outside City </a></li>
                          </ul>                            
                         </li>
                         <li ><a href="add-cat-credit.php"> Credit </a></li>
                    </ul>
                </li>      
              </ul>
            </li> <!-- .dropdown -->

          </ul> <!-- .nav .navbar-nav -->     
    
      </div><!-- /.navbar-collapse -->
        
    </div><!-- /.container-fluid -->
</nav>




     <?php 
}
?>


<?php

// accountant menu

if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'clerk') {
?>
    
     <!-- Navigation -->
   <nav class="navbar navbar-inner" role="navigation">
    <div class="container-fluid">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="logo"></span></a>
        </div>
         <span class="newtitle">COURIER MANAGEMENT INFORMATION SYSTEM</span>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
          <ul id="main-menu" class="sm sm-blue">
            <li><a href="dashboard.php">HOME </a></li>      
            <li>
               <a href="#" >CONSIGNMENTS </a>
              <ul>
                <li>
                    <a  href="#">Add</a>
                    <ul>
                      <li><a  href="add_parcel.php">Spot Cash</a></li>
                      <li><a href="door-waybill.php">Door to Door</a></li>
                      <li><a href="credit_waybill.php">Credit</a></li>
                    </ul>
                </li>
                 <li>
                    <a  href="#">View</a>
                    <ul>
                      <li><a  href="show_parcels.php">Added</a></li>
                      <li><a href="parcels-intransit.php">Intransit</a></li>
                      <li><a href="recieved_parcels.php">Recieved</a></li>
                      <li><a href="show_delivered_parcels.php">Delivered</a></li>
                    </ul>
                </li>                         
                <li><a href="deliver_parcel.php">Deliver</a></li>
               <li><a href="search-waybill.php">Search</a></li>
              </ul>
            </li> <!-- .dropdown -->   
             <li>
               <a href="#" >MANIFESTS </a>
              <ul>
               <li><a href="create_manifest.php">Create</a></li>
                 <li>
                    <a  href="#">View</a>
                    <ul>
                        <li><a href="view-man-intransit.php">Intransit</a></li>
                        <li><a href="view-man.php">At destination</a></li>
                        <li>
                            <a  href="#">Recieved</a>
                            <ul class="dropdown-menu">
                               <li><a href="view-man-all.php">All</a></li>
                               <li><a href="view-man-pen.php">Pending</a></li>
                            </ul>
                        </li> 
                    </ul>
                </li>                         
                <li><a href="recieve_courier.php">Recieve</a></li>
                <li><a href="search-manifest.php">Search</a></li>
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >DELIVERY SHEET </a>
              <ul>
               <li><a href="create_delivery note.php">Create</a></li>
                 <li>
                    <a  href="#">View</a>
                    <ul>
                        <li><a href="view-del-out.php">Out for delivery</a></li>
                        <li><a href="view-del-clear.php">Cleared</a></li>
                    </ul>
                </li>                         
                <li><a href="clear_delivery.php">Clear</a></li>
                <li><a href="search-delivery.php">Search</a></li>
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >REPORTS </a>
              <ul>
                <li><a href="view-consignments.php">Consignments report</a></li>
                <li><a href="view-delivery.php">Delivery report</a></li>
                <li><a href="sales_report.php">Sales report</a></li>
                <li><a href="view-recievers.php">Recievers report</a></li>
              </ul>
            </li> <!-- .dropdown -->

          </ul> <!-- .nav .navbar-nav -->         
        </div><!-- /.navbar-collapse -->
        
    </div><!-- /.container-fluid -->
</nav>

 
     <?php 
   
}

// clerk menu ends here
?>


<?php

// accountant menu

if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Accountant') {
?>
    
     <!-- Navigation -->
   <nav class="navbar navbar-inner" role="navigation">
    <div class="container-fluid">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="logo"></span></a>
        </div>
         <span class="title">COURIER MANAGEMENT INFORMATION SYSTEM</span>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
          <ul id="main-menu" class="sm sm-blue">
            <li><a href="dashboard.php">ACCOUNTS</a></li>         
            <li>
               <a href="#" >CUSTOMERS </a>
                <ul>                          
                  <li><a href="monthly_report.php">View</a></li>
                </ul>
            </li> <!-- .dropdown -->   
             <li>
               <a href="#" >PAYMENTS </a>
              <ul>
                <li><a href="payments.php">Create</a></li>
                 <li>
                    <a  href="#">Reciepts</a>
                    <ul>
                        <li><a href="monthly_report.php">View</a></li>
                        <li><a href="search_reciepts.php">Search</a></li>
                    </ul>
                </li>      
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >REVERSALS </a>
              <ul>
                <li><a href="reverse-reciept.php">Create</a></li>
                 <li>
                    <a  href="#">View</a>
                    <ul>
                        <li><a href="reg-reversal.php">Registered</a></li>
                        <li><a href="reversals.php">Non-Registered</a></li>
                    </ul>
                </li>      
              </ul>
            </li> <!-- .dropdown -->
            <li>
               <a href="#" >REPORTS </a>
              <ul>
                <li><a href="monthly_report.php">Monthly Revenue</a></li>     
              </ul>
            </li> <!-- .dropdown -->



          </ul> <!-- .nav .navbar-nav -->        
        </div><!-- /.navbar-collapse -->
        
    </div><!-- /.container-fluid -->
</nav>

 
     <?php 
	 
}

// accountant menu ends here
?>

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
  <ul class="ul-one sec-ul">
    <li class="td-width bold">OFFICE: 
    <span class="td-width"><?php echo $_SESSION['user_code'];?></span></li>
  </ul>
</div>

<div class="myaccount">
        <ul id="MenuBar1" class="MenuBarHorizontal">
          <li><a class="MenuBarItemSubmenu" href="#"><label>My Account</label></a>
            <ul>
              <li><a href="process.php?action=logOut" onClick="return are_u_sure();">
                <img src="images/logout.png" width="30" height="32"/> Logout
              </a></li>
                
              <li><a href="change_password.php" >
                <img  src="images/changepassword.png" width="30" height="32"/> Change password
                <a></li>
 
        </ul>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
        </script>

</div>

  
  
  </div> 




  


