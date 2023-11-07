<?php
session_start();
require_once('database.php');
require_once('library.php');


	 

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
                         CLERKS
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="table-responsive">
                            <script language="JavaScript">
                                function are_u_sure()
                                {
                                   return confirm("are you sure you want to delete this employee");
                                }
                            </script>
                                <form action="" method="post">
                                <label>Enter Clerk Name:</label>
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
                                $.post('clerk-search.php',{value:value}, function(data){
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
function are_u_sure()
{
	return confirm("are you sure you want to delete this employee");
}
</script>
<table border="0" align="center" width="80%" style="margin-left:50px" >
    <tbody><tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td class="LargeBlue" bgcolor="#FFFFFF" align="left"><div class="Partext1" align="center"><strong>CLERKS </strong></div></td>
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
      <td  bgcolor="grey" width="11%">Address</td>
      <td  bgcolor="grey" width="11%">Phone</td>
      <td  bgcolor="grey" width="9%">Email</td>
      <td  bgcolor="grey" width="6%"><div align="center">Edit</div></td>
      <td  bgcolor="grey" width="6%"><div align="center">Delete</div></td>
    </tr>
    
	<?php
	
	while($data = dbFetchAssoc($result))
	{
	extract($data);	
	?>
      <tr onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';" bgcolor="#FFFFFF">
	
      
      <td ><?php echo $fname. " ".$lname;; ?></td>
      
      <td ><?php echo $address; ?></td>
      <td ><?php echo $phone; ?></td>
      <td ><?php echo $email; ?></td>
      <td  align="center">
	  <a href="edit-employee.php?eid=<?php echo $emp_id; ?>">
	  <img src="images/edit_icon.gif" border="0" height="20" width="20"></a>
	  </td>
      <td align="center">
	   <a href="process.php?eid=<?php echo $emp_id; ?>&amp;action=delete-emp" onClick="return are_u_sure();">delete</a>
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
