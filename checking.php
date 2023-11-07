<?php
session_start();
require_once('database.php');

include('trigger_sms.php');
require_once('AfricasTalkingGateway.php');

$man = $_POST['manifest'];
$emp = $_SESSION['employee'];
$off = $_SESSION['office'];
$currdate = date("Y/m/d");

if (!empty($_POST['checkit']))
         {
			
			
			$way  = implode("','" , $_POST['checkit']);
			
	         
			  
			  
			  $sql = "SELECT consignor_name, consignor_phone, consignee_name, consignee_phone, waybill_no 
			          FROM waybill
                      WHERE manifest_no = '$man'
		              AND
		              waybill_no IN ('$way')
		
		              ";
        
              $result = dbQuery($sql);

       while($data2 = dbFetchAssoc($result))
	     {
         $wb  = $data2['waybill_no']; 
		 $crn = $data2['consignor_name'];
         $crp = $data2['consignor_phone']; 
		 $cen = $data2['consignee_name'];
         $cep = $data2['consignee_phone']; 
		 
		 
		  $sql11 = "UPDATE waybill
				         SET status = 'at destination', recieved_date = '$currdate', recieved_by = '$emp'
				         WHERE waybill_no = '$wb'
				   ";
						 
	      dbQuery($sql11);
		 
		 /* sms starts here*/
         
         $msg = "Parcel ". $wb. " sent by ". $crn. " to ". $cen." is at destination. Please collect the parcel within 3 working days, after that there will be a charge of K1000 per day." ;
         
		$sql4 = "INSERT INTO sms( sms_id, senderno, recieverno, waybill_no, message) VALUES ('NULL','$crp','$cep','$wb','$msg')";
		dbQuery($sql4);
		
		
		$sql5 = "SELECT senderno,recieverno, message, waybill_no
		         FROM sms 
				 WHERE status = 'to send'";
				 
		$result5 = dbQuery($sql5);
		 while($data5 = dbFetchAssoc($result5))
		 {
			 $sendor = $data5['senderno'];
			 $reciever =$data5['recieverno'];
			 $messege = $data5['message'];
			 $wayb = $data5['waybill_no'];
			 
			 sendSMS($sendor,$messege);
			  sendSMS($reciever,$messege);
			  
			   $sql6 = "UPDATE sms SET  status = 'sent'
		    
                     WHERE status  = 'to send'";
				 
		      $result6 = dbQuery($sql6);
			  
			  
			 
			 
			 
		 }
		 
		/*sms ends here */
		  }
		 
		 $sql12 = "SELECT manifest.manifest_no
	          FROM manifest, waybill
	          WHERE manifest.destination = '$off'
			  AND (waybill.manifest_no = manifest.manifest_no) 
			  AND (waybill.status = 'in transit') 
			  AND (manifest.manifest_no = '$man')
			  GROUP BY manifest.manifest_no
			  ";
			  
        $result12 = dbQuery($sql12);

        $rows = dbnumrows($result12);
		
		
		if ($rows == 1)
		{
			 $sql13 =  "UPDATE manifest
				   SET comment = 'pending'
				   WHERE manifest_no = '$man'
				  "; 
						 
	         dbQuery($sql13);
		}
		
		else
		{
			 $sql13 =  "UPDATE manifest
				   SET comment = 'checked'
				   WHERE manifest_no = '$man'
				  "; 
						 
	         dbQuery($sql13);
		}


		 
		 header('location: check_parc.php?mid='.$man);
		 
	
         }
		
	 

 




?>