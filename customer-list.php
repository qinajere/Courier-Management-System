<?php
session_start();
require_once('database.php');
require_once('library.php');

$off = $_SESSION['office'];

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
                         CUSTOMERS
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="table-responsive">
                            <script language="JavaScript">
                                function sure()
                                  {
                                    return confirm("are you sure you want to delete this customer");
                                  }
                            </script>
                                <form action="" method="post">
                                <label>Enter Customer Name:</label>
                                <input type="text" id="search">
                                </form>
                                
                                <div id="search_results" class="form-group"></div>
                                
                                
                                <script>
				
                            $(document).ready(function(){
                            
                            $("#search").keyup(function(){
                           
						    var value = $(this).val();
							if (value == "")
							    {
                               $("#search_results").html("Please input a search term");
                                 } 
							else {
                                $.post('customer-search.php',{value:value}, function(data){
                                $("#search_results").html(data);
                                       });
                                            return false;
                                 }
						   
						   
                                 });
                           });
							  
                 </script>
                 
                                
                                
                                
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>  
  
<!--<table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style="margin-left:200px; margin-top:40px">
  <tbody><tr>
    <td width="900">


	</td>
  </tr>
  
  <tr>
    <td bgcolor="#FFFFFF">
	<script language="JavaScript">

function sure()
{
	return confirm("are you sure you want to delete this customer");
}
</script>
<table border="0" align="center" width="80%" style="margin-left:50px" >
    <tbody><tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left"><div class="Partext1" align="center"><strong>CUSTOMERS </strong></div></td>
    </tr>
  </tbody></table>

 
  <table border="0" cellpadding="1" cellspacing="1" align="center" width="95%">
    <tbody>
	<tr>
    <td>
	</td>
    </tr>
  </tbody></table>
  <table class="blackbox" border="0" cellpadding="1" cellspacing="1" align="center" width="95%" style="margin-left:30px">
    <tbody><tr class="BoldRED" bgcolor="#FFFFFF" style="height:20px; color: #FFF">
     
      <td class="newtext" bgcolor="grey" width="10%">Name</td>
      <td  bgcolor="grey" width="11%">Physical Address</td>
       <td  bgcolor="grey" width="11%">Post Address</td>
      <td  bgcolor="grey" width="11%">Phone</td>
      <td  bgcolor="grey" width="9%">Email</td>
      <td  bgcolor="grey" width="6%"><div align="center">Edit</div></td>
      <td  bgcolor="grey" width="6%"><div align="center">Delete</div></td>
      <td  bgcolor="grey" width="6%"><div align="center">Statement</div></td>
    </tr>
    
	<?php
	
	while($data = dbFetchAssoc($result))
	{
	extract($data);	
	?>
      <tr style="cursor:pointer" onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF" onDblClick="window.location='customer_statements.php' ">
	
     
      <td ><?php echo $customer_name; ?></td>
      
      <td ><?php echo $address; ?></td>
      <td ><?php echo $post; ?></td>
      <td ><?php echo $phone; ?></td>
      <td ><?php echo $email; ?></td>
      <td  align="center">
	  <a href="edit-customer.php?cid=<?php echo $customer_id; ?>">
	  <img src="images/edit_icon.gif" border="0" height="20" width="20"></a>
	  </td>
      <td align="center">
	   <a style="color:red" href="process.php?cid=<?php echo $customer_id; ?>&amp;action=delete-cust" onClick="return sure();">delete</a>
	  </td>
      <td align="center">
	 <span style="color:blue" onClick =" window.open('customer-state.php?cid=<?php echo  $customer_id; ?>', '_blank')"> view</span>
	  </td>
    </tr>
    <?php
	}//while
	?>
	  </tbody></table>
  <br>
	
    </td>
  </tr>
  
</tbody></table>
</td>
  </tr>
</tbody></table>-->
	

</body></html>
