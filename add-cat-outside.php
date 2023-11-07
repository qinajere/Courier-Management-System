<?php
session_start();
require_once('database.php');

$off = $_SESSION['office'];


$sql = "SELECT category_id FROM `rate_table` WHERE type = 'outside city' GROUP BY category_id ORDER BY category_id DESC limit 1";
				
$result = dbQuery($sql);

$sql2 = "SELECT DISTINCT(location)
		FROM office
		
		";
$result2 = dbQuery($sql2);
$sql3 = "SELECT DISTINCT(location)
		FROM office
		
		";
$result3 = dbQuery($sql3);

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
     
        <script>
		
		function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
	 
	
	
      if (val) { nm=val.name; if ((val=val.value)!="") {
		  
		  if(val =="...choose...") errors+='- '+nm+' must not be  ...choose...\n';
		  
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
		   
        }
		
		 else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='-  Rate for range '+nm+'kg must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- Rate for range '+nm+'kg is missing.\n'; }
    } 
	
	if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }

//-->

</script>
		
		
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


<div class="col-md-8 col-md-offset-3 mydash">
                    <div class="panel panel-default new">
                        <div class="panel-heading new-panel">
                          <label class="user-job">
                          ADD NEW CATEGORY TO DOOR TO DOOR OUTSIDE CITY RATES
                        </label>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="col-md-12">
                                    <form role="form" name="frmShipment" method="post"  action="new-category-out.php">

                                     <div class="form-group col-md-10">
                                      <label class="mini-label color">ADD CATEGORY NUMBER: </label> 
                                        <?php       
                                        $no =  dbNumRows($result);
      
                                         if ($no == 0 )
                                          {
                                       ?>
                                      <input name="categoryid" style="width:10px; height:18px; border:none; color:#900"  readonly type="text" value="1">  
                                      <?php
                                          }
                                          
                                           while($data = dbFetchAssoc($result))
                                           {
      
                                         ?>
                                         <input name="categoryid" class="mini-title in-line2 myinput" readonly type="text" value="<?php  echo $data['category_id'] + 1;  ?>">  
        
                                         <?php
                                           } 
                                         ?>
                                    </div>
                                    <br><br>
                                    <hr>
                                    <div class="col-md-12">
                                       
                                    

    <div class="form-group col-md-12">
     <label>ADD SOURCES</label>
    </div>
    <div class="form-group col-md-12">
    <div class="form-group col-md-4">
       
        <select id="Features" name="Features" class="form-control" MULTIPLE>
            
            <?php 
      
                    while($data2 = dbFetchAssoc($result2)  ){
                   ?>
                 <option value="<?php echo $data2['location']; ?>" > <?php echo $data2['location']; ?></option>
      <?php 
      } //while
      ?>
            </select>
    </div>



    <div class="form-group col-md-2">
        <input type="Button" class="btn btn-success" value="Add >>" style="width:100px;" onClick="SelectMoveRows('Features','FeatureCodes')"><br>
            <br>
            <input type="Button" class="btn btn-danger" value="<< Remove" style="width:100px; " onClick="SelectMoveRows('FeatureCodes','Features')">
    </div>



    <div class="form-group col-md-4">
        <select name="FeatureCodes[]" id="FeatureCodes" class="mymultiple form-control" MULTIPLE>
               
            </select>
    </div>
    </div>



    <div class="form-group col-md-12">
     <label>ADD DESTINATIONS</label>
    </div>
    <div class="form-group col-md-12">
    <div class="form-group col-md-4">
       
        <select name="Features2" id="Features2" class="form-control" MULTIPLE>
            
            <?php 
      
                    while($data3 = dbFetchAssoc($result3)  ){
                   ?>
                 <option value="<?php echo $data3['location']; ?>" > <?php echo $data3['location']; ?></option>
      <?php 
      } //while
      ?>
            </select>
    </div>




    <div class="form-group col-md-2">
        <input class="btn btn-success" type="Button" value="Add >>" style="width:100px;  " onClick="SelectMoveRows('Features2','FeatureCodes2')"><br>
        <br>
        <input type="Button" class="btn btn-danger" value="<< Remove" style="width:100px;" onClick="SelectMoveRows('FeatureCodes2','Features2')">
    </div>


    <div class="form-group col-md-4">
         <select name="FeatureCodes2[]" id="FeatureCodes2"  class="mymultiple form-control" MULTIPLE>
               
            </select>
    </div>
    </div>



<label>ADD RATES</label>
<div class="table-responsive">

<table class="table">
  <thead>
   <tr  class="bg-color">
      <th>WEIGHT(KGS)</th>
       <th>RATE</th>
       <th>VAT</th>
       <th>TOTAL</th>
   </tr>
  </thead>
 <tbody>
 <tr style="cursor:pointer">
    <td style="font-size:14px;">350g-1</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE1" style="width:70px;" id="350g-1" type="text" ></td>
  <td id="vat350g-1" style="font-size:14px;">0.00</td>
  <td id="total350g-1" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">1.1-2.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE2" style="width:70px;" id="1.1-2.0" type="text" ></td>
  <td id="vat1.1-2.0" style="font-size:14px;">0.00</td>
  <td id="total1.1-2.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">2.1-3.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE3"style="width:70px;" id= "2.1-3.0" type="text" ></td>
  <td id="vat2.1-3.0" style="font-size:14px;">0.00</td>
    <td id="total2.1-3.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">3.1-4.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE4" style="width:70px;" id= "3.1-4.0" type="text" ></td>
  <td id="vat3.1-4.0" style="font-size:14px;">0.00</td>
  <td id="total3.1-4.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">4.1-5.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE5" style="width:70px;" id= "4.1-5.0" type="text" ></td>
  <td id="vat4.1-5.0" style="font-size:14px;">0.00</td>
  <td id="total4.1-5.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">5.1-6.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE6" style="width:70px;" id= "5.1-6.0" type="text" ></td>
  <td id="vat5.1-6.0" style="font-size:14px;">0.00</td>
  <td id="total5.1-6.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">6.1-7.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE7" style="width:70px;" id= "6.1-7.0" type="text" ></td>
  <td id="vat6.1-7.0" style="font-size:14px;">0.00</td>
  <td id="total6.1-7.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">7.1-8.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE8" style="width:70px;" id= "7.1-8.0" type="text" ></td>
  <td id="vat7.1-8.0" style="font-size:14px;">0.00</td>
  <td id="total7.1-8.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">8.1-9.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE9" style="width:70px;" id= "8.1-9.0" type="text" ></td>
  <td id="vat8.1-9.0" style="font-size:14px;">0.00</td>
  <td id="total8.1-9.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">9.1-10.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE10" style="width:70px;" id= "9.1-10.0" type="text" ></td>
  <td id="vat9.1-10.0" style="font-size:14px;">0.00</td>
  <td id="total9.1-10.0" style="font-size:14px;">0.00</td>
  </tr>
                                      
                                       

 </tbody>
</table>

<script>
    function changevalues(obj){
      
    var rate = obj.value;
     var id = obj.id;
     
     var vat = parseFloat(rate * 0.165).toFixed(2) ;
     
     var total  =  parseFloat(rate) + parseFloat(vat)
     
     
     document.getElementById('vat'+id).innerHTML= vat
     
     if (isNaN(vat) || isNaN(total))
     { 
     document.getElementById(id).style.borderColor="#FF0000"
     document.getElementById('vat'+id).innerHTML= parseFloat(0).toFixed(2)
     document.getElementById('total'+id).innerHTML= parseFloat(0).toFixed(2)  
     }
     else
     {
       document.getElementById(id).style.borderColor="#999"
        document.getElementById('vat'+id).innerHTML= vat
        document.getElementById('total'+id).innerHTML= parseFloat(total).toFixed(2)
     }
         
     
         }
</script>
<button type="submit" class="btn btn-success submit-space3" onclick="selectAll();">SUBMIT &raquo; </button> </div>

                
                                        
   </div>

                                       
 </form>
</div>
 </div>
<!-- /.panel-body -->
</div>
 <!-- /.panel -->
  </div>
  
<!--<form  class="register" name="frmShipment" method="post"  action="new-category-out.php"  > 


 <h1>ADD NEW CATEGORY TO DOOR TO DOOR OUTSIDE CITY RATES</h1>
            <p>&nbsp;</p>
            
                    
            
            <fieldset class="row1">
            <label style="width:150px; color:#900; margin-left:50px">ADD CATEGORY NUMBER  </label>            
			
			<?php 
			
			$no =  dbNumRows($result);
			
			if ($no == 0 )
			{
				?>
				<input name="categoryid" style="width:10px; height:18px; border:none; color:#900"  readonly type="text" value="1">	
           <?php
			}
			
			while($data = dbFetchAssoc($result))
			{
			
			?>
            <input name="categoryid" style="width:10px; height:18px; border:none; color:#900"  readonly type="text" value="<?php  echo $data['category_id'] + 1;  ?>">	
				
			 <?php
			} 
			
			?>
           
            
               
              <p>&nbsp;</p>
              
              
              
              <p>
              <table width="623" border="0" cellpadding="3" cellspacing="0"  style="margin-left:150px">
              <tr>
                <td colspan="2"> ADD SOURCES</td></tr>
              <tr><td colspan="2">&nbsp; </td></tr>
    <tr>
        <td>
            <select id="Features" name="Features" size="9" style=" height:60px"  MULTIPLE>
            
            <?php 
			
			              while($data2 = dbFetchAssoc($result2)  ){
			             ?>
			           <option value="<?php echo $data2['location']; ?>" > <?php echo $data2['location']; ?></option>
			<?php 
			} //while
			?>
            </select>
        </td>
        <td align="center" valign="middle">
            <input type="Button" class="button" value="Add >>" style="width:100px;" onClick="SelectMoveRows('Features','FeatureCodes')"><br>
            <br>
            <input type="Button" class="button" value="<< Remove" style="width:100px; " onClick="SelectMoveRows('FeatureCodes','Features')">
        </td>
        <td>
            <select name="FeatureCodes[]" id="FeatureCodes" size="9" style=" height:60px" MULTIPLE>
               
            </select>
        </td>
    </tr>
    
    <tr><td colspan="2">&nbsp; </td></tr>
    <tr><td colspan="2">&nbsp; </td></tr>
    
    <tr><td colspan="2"> ADD DESTINATIONS</td></tr>
      <tr><td colspan="2">&nbsp; </td></tr>
      
      
      <tr>
        <td>
            <select name="Features2" id="Features2" size="9" style=" height:60px" MULTIPLE>
            
            <?php 
			
			              while($data3 = dbFetchAssoc($result3)  ){
			             ?>
			           <option value="<?php echo $data3['location']; ?>" > <?php echo $data3['location']; ?></option>
			<?php 
			} //while
			?>
            </select>
        </td>
        <td align="center" valign="middle">
            <input class="button" type="Button" value="Add >>" style="width:100px;  " onClick="SelectMoveRows('Features2','FeatureCodes2')"><br>
            <br>
            <input type="Button" class="button" value="<< Remove" style="width:100px;" onClick="SelectMoveRows('FeatureCodes2','Features2')">
        </td>
        <td>
            <select name="FeatureCodes2[]" id="FeatureCodes2" size="9" style=" height:60px" MULTIPLE>
               
            </select>
        </td>
    </tr>
    
    <tr><td colspan="2">&nbsp; </td></tr>
    <tr><td colspan="2">&nbsp; </td></tr>
    
    <tr><td colspan="2"> ADD RATES</td></tr>
              
</table>
                   
    
              </p>
          <p>&nbsp;</p>
                <table  border="1" cellpadding="1" cellspacing="1" style="margin-left:100px">
		<tr>
		 <td bgcolor="grey" width="2%" style="font-size:18px; color: white;">WEIGHT(KGS)</td>
    <td bgcolor="grey" width="4%"style="font-size:18px;  color: white;">RATE</td>
	<td bgcolor="grey" width="4%" style="font-size:18px;  color: white;">VAT</td>
	<td bgcolor="grey" width="4%" style="font-size:18px;  color: white;">TOTAL</td>
		</tr>
	
  <tr style="cursor:pointer">
    <td style="font-size:14px;">350g-1</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE1" style="width:70px;" id="350g-1" type="text" ></td>
	<td id="vat350g-1" style="font-size:14px;">0.00</td>
	<td id="total350g-1" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">1.1-2.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE2" style="width:70px;" id="1.1-2.0" type="text" ></td>
	<td id="vat1.1-2.0" style="font-size:14px;">0.00</td>
	<td id="total1.1-2.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">2.1-3.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE3"style="width:70px;" id= "2.1-3.0" type="text" ></td>
	<td id="vat2.1-3.0" style="font-size:14px;">0.00</td>
    <td id="total2.1-3.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">3.1-4.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE4" style="width:70px;" id= "3.1-4.0" type="text" ></td>
	<td id="vat3.1-4.0" style="font-size:14px;">0.00</td>
	<td id="total3.1-4.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">4.1-5.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE5" style="width:70px;" id= "4.1-5.0" type="text" ></td>
	<td id="vat4.1-5.0" style="font-size:14px;">0.00</td>
	<td id="total4.1-5.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">5.1-6.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE6" style="width:70px;" id= "5.1-6.0" type="text" ></td>
	<td id="vat5.1-6.0" style="font-size:14px;">0.00</td>
	<td id="total5.1-6.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">6.1-7.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE7" style="width:70px;" id= "6.1-7.0" type="text" ></td>
	<td id="vat6.1-7.0" style="font-size:14px;">0.00</td>
	<td id="total6.1-7.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">7.1-8.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE8" style="width:70px;" id= "7.1-8.0" type="text" ></td>
	<td id="vat7.1-8.0" style="font-size:14px;">0.00</td>
	<td id="total7.1-8.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">8.1-9.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE9" style="width:70px;" id= "8.1-9.0" type="text" ></td>
	<td id="vat8.1-9.0" style="font-size:14px;">0.00</td>
	<td id="total8.1-9.0" style="font-size:14px;">0.00</td>
  </tr>
  
  <tr style="cursor:pointer">
    <td style="font-size:14px;">9.1-10.0</td>
    <td style="font-size:14px;"> <input onchange=" changevalues(this); " name="RATE10" style="width:70px;" id= "9.1-10.0" type="text" ></td>
	<td id="vat9.1-10.0" style="font-size:14px;">0.00</td>
	<td id="total9.1-10.0" style="font-size:14px;">0.00</td>
  </tr>


</table>


<p>


</p>


<script>
    function changevalues(obj){
			
		var rate = obj.value;
		 var id = obj.id;
		 
		 var vat = parseFloat(rate * 0.165).toFixed(2) ;
		 
		 var total  =  parseFloat(rate) + parseFloat(vat)
		 
		 
		 document.getElementById('vat'+id).innerHTML= vat
		 
		 if (isNaN(vat) || isNaN(total))
		 { 
		 document.getElementById(id).style.borderColor="#FF0000"
		 document.getElementById('vat'+id).innerHTML= parseFloat(0).toFixed(2)
		 document.getElementById('total'+id).innerHTML= parseFloat(0).toFixed(2)  
		 }
		 else
		 {
			 document.getElementById(id).style.borderColor="#999"
			  document.getElementById('vat'+id).innerHTML= vat
			  document.getElementById('total'+id).innerHTML= parseFloat(total).toFixed(2)
		 }
		     
		 
		     }
</script>






<p>
            <div><button style="margin-left:100px" class="button" name="Submit" type="submit" onclick="selectAll();"> SUBMIT &raquo;</button></div>
            </p>'
                  
                 
                    
                
                
                
                 
                
               

                   
               
                
                
            </fieldset>
           
            
           

  </form>-->
  <?php
  
     
  ?>        
          
      </div>
    </div>
  </div>
</body></html>
