<?php
session_start();
require_once('database.php');

$off = $_SESSION['office'];


$sql = "SELECT distinct category.id, category.category FROM category, rate_table WHERE ((category.id= rate_table.category_id) AND (rate_table.service_id = 2) AND rate_table.type = 'outside city' )";
				
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


<script>
function SelectMoveRows(id1,id2)
{
	
	SS1 = document.getElementById(id1);
	SS2= document.getElementById(id2);
	
	
    var SelID='';
    var SelText='';
    // Move rows from SS1 to SS2 from bottom to top
    for (i=SS1.options.length - 1; i>=0; i--)
    {
        if (SS1.options[i].selected == true)
        {
            SelID=SS1.options[i].value;
            SelText=SS1.options[i].text;
            var newRow = new Option(SelText,SelID);
            SS2.options[SS2.length]=newRow;
            SS1.options[i]=null;
			
			
		
        }
    }
	
	
    SelectSort(SS2);
}
function SelectSort(SelList)
{
    var ID='';
    var Text='';
    for (x=0; x < SelList.length - 1; x++)
    {
        for (y=x + 1; y < SelList.length; y++)
        {
            if (SelList[x].text > SelList[y].text)
            {
                // Swap rows
                ID=SelList[x].value;
                Text=SelList[x].text;
                SelList[x].value=SelList[y].value;
                SelList[x].text=SelList[y].text;
                SelList[y].value=ID;
                SelList[y].text=Text;
            }
        }
    }
}




</script>
<script type="text/javascript">
    function selectAll() 
    { 
        selectBox = document.getElementById("FeatureCodes");
		selectBox2 = document.getElementById("FeatureCodes2");

        for (var i = 0; i < selectBox.options.length; i++) 
        { 
             selectBox.options[i].selected = true; 
        } 
		
		for (var i = 0; i < selectBox2.options.length; i++) 
        { 
             selectBox2.options[i].selected = true; 
        } 
    }
</script>   
 

  <?php
include("header.php");
?>
    
 <div class="col-md-8 col-md-offset-3 mydash">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                          EDIT DOOR TO DOOR OUTSIDE CITY RATES
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" id="lets_save" name="frmShipment" onsubmit="return false;">

                                     <div class="form-group col-md-10">
                                      <label class="mini-label color">CHOOSE CATEGORY TO EDIT: </label> 
                                      <select name="category" id="category" class="form-control form-width" >
                  						<option value="0" selected="selected">Select...</option>
										<?php 
											while($data = dbFetchAssoc($result))
											{
										?>
										<option value="<?php echo $data['id']; ?>" > <?php echo $data['category']; ?></option>
										<?php 
											} //while
										?>
            						  </select>                                    
                                    </div>
                                    <br><br>
                                    <hr>
                                    <div class="col-md-12">
                                       <div id="search_results" class="form-group"></div>
                 
                
              
                
                 <script>
				
                            $("#category").on("change", function(){
                            var value = $(this).val();
							var type = "outside city";
							if (value === "0")
							    {
                               $("#search_results").html("please select a category");
                                 } 
							else {
                                $.post('results2.php',{value:value,type:type}, function(data){
                                $("#search_results").html(data);
                                       });
                                            return false;
                                 }
								 
                    
                              })
							  
                 </script>
                 
                 
                 
       <script>
            
        $("#lets_save").on("submit",function() {
		
		
		
		var category = ''
         var myid = 1
		 var t = 'branch'
		 
		 category = $("#category option:selected").val()
		
		 
	    var sources = [];
        $.each($("#FeatureCodes option:selected"), function(){            
            sources.push($(this).val());
        });
		
		
		var destinations = [];
        $.each($("#FeatureCodes2 option:selected"), function(){            
            destinations.push($(this).val());
        });
            
			   
        var values = {};
		 
        $('input.rate').each(function(n, el)
		{
        values[ $(el).attr('id') ] = $(el).val();
           });  
				
				
				
				
	$.ajax(
                      {
                         type : 'post',
                         url : 'update.php',
                         data : {edays: values, sources:sources, destinations:destinations, myid:myid, t:t, category:category},
						  
						  success: function(data) 
						  {
							  alert(data);
							  

	                      }
						  
					  }
                      
                    );
					
					 
      });
    </script>
    
    
    <script>
    function changevalues(obj){
		
		
		
		var rate = obj.value;
		 var id = obj.id;
		 
		 var vat = parseFloat(rate * 0.165).toFixed(2) ;
		 
		 var total  =  parseFloat(rate) + parseFloat(vat)
		 
		 
		 document.getElementById('vat'+id).innerHTML= vat
		 document.getElementById('total'+id).innerHTML= parseFloat(total).toFixed(2)
		
		 
		
		
		
	
	 
		
    }
</script>
                                        
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
