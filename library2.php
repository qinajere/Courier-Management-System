<?php
require_once('database.php');


function updateStatus($man) {
	
	$off = $_SESSION['office'];
	$recievedby = $_SESSION['employee'];
	$currdate = date("Y/m/d");

$sql1 = "select manifest_no, destination, status, recieved_by, recieve_date  from manifest where manifest_no = '$man'";

$result = dbQuery($sql1);

 $no = dbNumRows($result);
 if($no == 1) 
		{
		   $row = dbFetchAssoc($result);
             
           $dest = $row['destination'];
		   $state = $row['status'];
		   $recby = $row['recieved_by'];
		   $recdate = $row['recieve_date'];
		   
		   if ($dest == $off)
		   {
			   if ($state == "at destination")
			   {
				   
				    return "Manifest ". $man. " and waybills are already at destination and recieved by " .$recby. " on ". $recdate;
			   }
			   else
			   {
				   
		 $sql10 =  "UPDATE manifest
				   SET status = 'at destination', comment = 'checking', recieved_by = '$recievedby', recieve_date = '$currdate'
				   WHERE manifest_no = '$man'
				   AND destination = '$dest'"; 
						 
	         dbQuery($sql10);
				
				
				 header('location: check_man_parc.php?number='.$man);
			   }
		   }
		   else
		   {
			  return "Manifest ".$man. " does not belong to this destination. it belongs to: ".$dest; 
			  header('recieve_courier.php');
		   }
		}
 else             
  {			 
	  return "Manifest ". $man ." does not exist"; 
	 header('recieve_courier.php'); 		
  }
 
}//addNewOffice


 function add_new_clerk($fname, $lname, $uname, $phoneno, $address, $email, $password, $regdate, $off)
 {
	  
	
$sql1 = "select office_id from office where location ='$off' ";
 
$result = dbQuery($sql1); 

 $row = dbFetchAssoc($result);
 $offid = $row['office_id'];


$sql2 = "INSERT INTO employee (emp_id, fname, lname, address, phone, email, reg_date, type , office_id, user_name, password)
			VALUES (NULL, '$fname', '$lname', '$address', '$phoneno', '$email','$regdate','clerk' , '$offid', '$uname', '$password')";
			
	dbQuery($sql2);
	
	return "Clerk added succesfully";
	header('new_clerk.php');
 }


 function add_new_manager($fname, $lname, $uname, $phoneno, $address, $email, $off, $password, $regdate)
 {
	 	
$sql1 = "select office_id from office where location ='$off' ";
 
$result = dbQuery($sql1); 

 $row = dbFetchAssoc($result);
 $offid = $row['office_id'];


$sql2 = "INSERT INTO employee (emp_id, fname, lname, address, phone, email, reg_date, type , office_id, user_name, password)
			VALUES (NULL, '$fname', '$lname', '$address', '$phoneno', '$email','$regdate','Manager' , '$offid', '$uname', '$password')";
			
	dbQuery($sql2);
	
	return "Manager added succesfully";
	header('new_manager.php');
 }

function add_new_office( $location, $code, $region)
{


$sql1 = "INSERT INTO office(office_id, location, code, region)
			VALUES (NULL, '$location','$code', '$region')";
			
	dbQuery($sql1);
	
	$sql2 = "INSERT INTO seq_note(id, code)
			VALUES (NULL, '$code')";
	dbQuery($sql2);
	
	return "office added succesfully";
	header('add-office.php');
	
}

function add_new_driver( $drivername, $phone, $regdate)
{
	$sql1 = "INSERT INTO driver(driver_id, driver_name, phone, reg_date)
			VALUES (NULL, '$drivername','$phone', '$regdate')";
	dbQuery($sql1);
	return "driver added succesfully";
	header('add-driver.php');
}

function add_new_vehicle( $vehiclenumber, $type)
{
	$sql1 = "INSERT INTO vehicle(vehicle_id, vehicle_reg_no, vehicle_type)
			VALUES (NULL, '$vehiclenumber','$type')";
	dbQuery($sql1);
	return "Vehicle added succesfully";
	header('add-vehicle.php');
}

function add_new_customer($cname, $address, $post, $phoneno, $email, $regdate, $off)
 {
	  
	
/*$sql1 = "select office_id from office where location ='$off' ";
 
$result = dbQuery($sql1); 

 $row = dbFetchAssoc($result);
 $offid = $row['office_id'];
*/

$sql2 = "INSERT INTO reg_customer (customer_id, customer_name, address, post, phone, email, location, reg_date)
         VALUES (NULL , '$cname', '$address', '$post', '$phoneno', '$email', '$off','$regdate')";
			
	dbQuery($sql2);
	
	return "Customer added succesfully";
	header('new_customer.php');
 }

function edit_clerk($empid, $fname, $lname, $address, $phone, $email)
 {
	  
	if ($_SESSION['user_name'] == 'ADMIN')
	{
                         $sql = "UPDATE employee
				         SET fname = '$fname', lname = '$lname', address = '$address', phone = '$phone' ,email = '$email'
				         WHERE emp_id = '$empid'
				         ";
						 
			    dbQuery($sql);
	
	
	header('location: view-managers.php');
	}
	
	else
	{
		  $sql = "UPDATE employee
				         SET fname = '$fname', lname = '$lname', address = '$address', phone = '$phone' ,email = '$email'
				         WHERE emp_id = '$empid'
				         ";
						 
			    dbQuery($sql);

	header('location: employee-list.php');
	}
 }
 
 function edit_customer($custid, $name, $address, $phone, $email)
 {
	  
	
                         $sql = "UPDATE reg_customer
				         SET customer_name = '$name', address = '$address', phone = '$phone' ,email = '$email'
				         WHERE customer_id = '$custid'
				         ";
						 
			    dbQuery($sql);
	
	
	header('location: customer-list.php');
 }
 
  function edit_driver($driverid, $drivername, $phone)
 {
	  
	
                         $sql = "UPDATE driver
				         SET driver_name = '$drivername', phone = '$phone'
				         WHERE driver_id = '$driverid'
				         ";
						 
			    dbQuery($sql);
	
	
	header('location: view-drivers.php');
 }
 
 function edit_office($officeid,$location, $code, $region)
 {
	 
	  $sql = "UPDATE office
				         SET location = '$location', code = '$code', region = '$region'
				         WHERE office_id = '$officeid'
				         ";
						 
			    dbQuery($sql);
				
	
	
	header('location: view-offices.php');
	 
 }
 
 function edit_vehicle($vehicleid,$vehicleregistration, $vehicletype)
 {
	 
	  $sql = "UPDATE vehicle
				         SET vehicle_reg_no = '$vehicleregistration', vehicle_type= '$vehicletype'
				         WHERE vehicle_id = '$vehicleid'
				         ";
						 
			    dbQuery($sql);
	
	
	header('location: view-vehicles.php');
	 
 }
 
 
  function  edit_parcel($consignmentNo, $consignername, $consignerphone, $consigneraddress,$consigneename, $consigneephone,$consigneeaddress, $description,$weight,$quantity,$destination,$servicetype)
 {
	
	 
	 include("get_rate.php");
	 
	 $rate = get_rate();
	 
	  $sql = "UPDATE waybill
				         SET consignor_name = '$consignername', consignor_phone =  '$consignerphone', consignor_add = '$consigneraddress', consignee_name = '$consigneename' , consignee_phone = '$consigneephone', consignee_add = '$consigneeaddress', description = '$description', weight = $weight, quantity = $quantity, destination = '$destination' , service_type = '$servicetype', total_charged = $rate
				         WHERE waybill_no = '$consignmentNo'
				         ";
						 
			    dbQuery($sql);
				
				
	 header('show_parcels.php');
	
	
	 
 }
 
 
function deliver($dno)
 {
	 $off = $_SESSION['office'];
	 $emp = $_SESSION['employee'];
	 $curr_date = date("Y/m/d");
	 
	 
	 
	  
	$sql = "SELECT delivery_details.delivery_no, delivery_details.waybill_no, waybill.waybill_no
	          FROM waybill,delivery_details
	          WHERE delivery_details.delivery_no = '$dno'
			  AND   waybill.destination = '$off'
			  AND   delivery_details.waybill_no = waybill.waybill_no";
			  
			  $result = dbQuery($sql);
			  
		
			  
			while ($row = dbFetchAssoc($result)) 
			{
				$wbno = $row['waybill_no'];
				
				$sql2 = "UPDATE waybill
				         SET status = 'delivered', delivered_date = '$curr_date', delivered_by ='$emp'
				         WHERE waybill_no = '$wbno'
				         ";
						 
			    dbQuery($sql2);
				
				$sql3 = "UPDATE delivery_details
				         SET status = 'delivered'
				         WHERE waybill_no = '$wbno'
				         ";
						 
			    dbQuery($sql3);
			}
			
			 $sql3 = "UPDATE delivery_note
				         SET status = 'delivered', cleared_by = '$emp'
				         WHERE delivery_no = '$dno'
				         ";
						 
			    dbQuery($sql3); 
	
	return "delivery note cleared succesfully";
	header('clear_delivery.php');
	
			  }
			  
 

  function change_password($empid,$opwd, $npwd)
  {
	 $sql1 = "select password from employee where emp_id ='$empid' ";
 
     $result = dbQuery($sql1);
	 
	 $no = dbNumRows($result);
          if($no == 1)
		  {
		    $row = dbFetchAssoc($result);
             
           $pswrd = $row['password'];
		   
		   if ( $pswrd != $opwd)
		   {
			   return "incorrect password";
	          header('change_password.php');
		   }
		   else
		   {
			   $sql2 = "UPDATE employee
				         SET  employee_password= '$npwd'
				         WHERE employee_id ='$empid'
				         ";
						 
			    dbQuery($sql2);
				return "password changed successfully";
	          header('change_password.php');
		   }
		   
			   
		  }
	   
	  
  }
  
  function change_admin_password($opwd, $npwd)
  {
	  $sql1 = "select password from adminstrator where password ='$opwd' ";
 
     $result = dbQuery($sql1);
	 
	 $no = dbNumRows($result);
          if($no == 1)
		  {
		    $row = dbFetchAssoc($result);
             
           $pswrd = $row['password'];
		   
		   $sql2 = "UPDATE adminstrator
				         SET password= '$npwd'
				         
				         ";
						 
			    dbQuery($sql2);
				return "password changed successfully";
	          header('change_admin_pass.php');
		   
		  }
		   else
		   {
			   
			  
			  return "incorrect password";
	          header('change_admin_pass.php');
		   }
		   
			   
		  
	  
	  
  }
  
  
 function cancel_waybill($waybillno)
  {
	  $code = $_SESSION['user_code'];
	  $source =  $_SESSION['office'];
	  $emp = $_SESSION['employee'];
	  $curr_date = date("Y/m/d");
	  
	  
	  
	  $sql = "SELECT consignor_name, source, service_type, total_charged, comment, status FROM waybill
        where waybill_no = '$waybillno'";
		
		
	 $result = dbQuery($sql);
	 
	 $no = dbNumRows($result);
	 
          if($no == 1)
		{
			
			 $data = dbFetchAssoc($result);
		 
			 $consigner = $data['consignor_name'];
			 $type = $data['service_type'];
			 $charges = $data['total_charged'];
			 $comm = $data['comment'];
			 $status = $data['status'];
			 $soff =  $data['source'];
			 
			 if( $soff != $source)
			 {
				  return  "Wabill ". $waybillno . " is does not belong to this office";
	              header('reverse-waybill.php');
			 }
			 
			 
			 else if ($status != 'at source')
			 {
				 return  "Wabill ". $waybillno . " is not at the source office";
	              header('reverse-waybill.php');
			 }
			 
			 
			else if ($comm == 'cancelled')
			 {
				 return  "Wabill ". $waybillno . " is already cancelled";
	              header('reverse-waybill.php');
				
				 
			 }
			 else
			 {
			 
			 
			 if ($type == 'Credit')
			 {
				             $sql2 = "SELECT customer_id FROM reg_transactions
                                      where details = '$waybillno'";
		
		                     $result2 = dbQuery($sql2);
		
		                     $data2 = dbFetchAssoc($result2);
		
		                      $cust = $data2['customer_id'];
							  
							  
							  
							  $sqlc = "SELECT  credit
		                                FROM seq_note
		                                WHERE code = '$code' 
		
		                               ";

							  $resultc = dbQuery($sqlc);

                              $datac = dbFetchAssoc($resultc);

                              $last_code = $datac['credit'];

                              $cr_code = (int)$last_code + 1;

                               $creditno  = "CR-".$code.str_pad($cr_code,6, "0", STR_PAD_LEFT);
							
							$desc = "REVERSAL OF: ". $waybillno;
							
           $sql3 ="INSERT INTO reg_creditnotes (credit_no, customer_id, transaction, description, amount, office, date, done_by)
                    VALUES ('$creditno' , '$cust', '$waybillno', '$desc', $charges, '$source', '$curr_date','$emp')";
				dbQuery($sql3);
				
		$sql4 ="INSERT INTO reg_transactions (id, transaction_date,  customer_id, type, details, credit, office, done_by)
                    VALUES (NULL , '$curr_date','$cust' ,'$desc', '$creditno', -$charges, '$source','$emp')";
				dbQuery($sql4);
				
				$sql6= "UPDATE seq_note
	          SET credit = '$cr_code'
			  WHERE code = '$code'
	         ";
	        dbQuery($sql6);
				
				
				
		       $sql5 = "UPDATE waybill
				         SET comment = 'cancelled'
				         WHERE waybill_no = '$waybillno'
				         ";		 
				dbQuery($sql5);	
				
				$sql7 = "UPDATE cust_invoice
				         SET status = 'cancelled'
				         WHERE waybill_no = '$waybillno'
				         ";	 
						dbQuery($sql7);	
						
						return "waybill ". $waybillno ." has been successfully reversed";
						header('reverse-waybill.php');
					
					
							   
							   

				 
				 
			 }
			 else
			 {
				 
							  
							  
							  
							  $sqlc = "SELECT  credit
		                                FROM seq_note
		                                WHERE code = '$code' 
		
		                               ";

							  $resultc = dbQuery($sqlc);

                              $datac = dbFetchAssoc($resultc);

                              $last_code = $datac['credit'];

                              $cr_code = (int)$last_code + 1;

                               $creditno  = "CR-".$code.str_pad($cr_code,6, "0", STR_PAD_LEFT);
							
							$desc = "REVERSAL OF: ". $waybillno;
							
           $sql3 ="INSERT INTO waybill_creditnotes (credit_no, waybill_no, description, amount, office, date, done_by)
                    VALUES ('$creditno', '$waybillno', '$desc', $charges, '$source', '$curr_date','$emp')";
				dbQuery($sql3);
				
		$sql4 ="INSERT INTO transactions (id, transaction_date, consigner_name, type, details, credit, office, created_by)
                    VALUES (NULL , '$curr_date','$consigner' ,'CREDIT NOTE', '$creditno', -$charges, '$source','$emp')";
				dbQuery($sql4);
				
				
				$sql6= "UPDATE seq_note
	          SET credit = '$cr_code'
			  WHERE code = '$code'
	         ";
	        dbQuery($sql6);
				
		       $sql5 = "UPDATE waybill
				         SET comment = 'cancelled'
				         WHERE waybill_no = '$waybillno'
				         ";
						 
				dbQuery($sql5);		 
						
						return "waybill ". $waybillno ." has been successfully reversed";
						header('reverse-waybill.php');
				 
			 }
			 
			 
			 }
		 
			
		}
		else
		{
		return "waybill ". $waybillno. " does not exist";
		header('reverse-waybill.php');
			
		}
		
		
		
		
	  
  }
  
  
  function cancel_reciept($recieptno)
 {
	 
	  $code = $_SESSION['user_code'];
	  $off =  $_SESSION['office'];
	  $emp = $_SESSION['employee'];
	  $curr_date = date("Y/m/d");
	  $source =  $_SESSION['office'];
	  
	   $sql = "SELECT  customer_id, amount, comment, office FROM payments
        where reciept_no = '$recieptno'";
	 
	 $result = dbQuery($sql);
	 $no = dbNumRows($result);
	 
	 //result = 1
	 if($no == 1)
		{
			$data = dbFetchAssoc($result);
		 
			 $custid = $data['customer_id'];
			 $amnt = $data['amount'];
			 $comm = $data['comment'];
			
			 if ($comm == 'cancelled')
			 {
				 return  "Reciept ". $recieptno . " is already cancelled";
	              header('reverse-reciept.php');
			 }
			 else
			 {
				 
				 $sqlc = "SELECT  debit
		                 FROM seq_note
		                 WHERE code = '$code' 
		
		                 ";

							  $resultc = dbQuery($sqlc);

                              $datac = dbFetchAssoc($resultc);

                              $last_code = $datac['debit'];

                              $cr_code = (int)$last_code + 1;

                               $debitno  = "DB-".$code.str_pad($cr_code,6, "0", STR_PAD_LEFT);
							
							$desc = "REVERSAL OF: ". $recieptno;
							
           $sql3 ="INSERT INTO reg_creditnotes (credit_no, type, customer_id, transaction, description, amount, office, date, done_by)VALUES ('$debitno' , 'DEBIT NOTE', '$custid', '$recieptno', '$desc', $amnt, '$source', '$curr_date','$emp')";
				dbQuery($sql3); 
				
				
				$sql4 ="INSERT INTO reg_transactions (id, transaction_date,  customer_id, type, details, debit, office, done_by)
                    VALUES (NULL , '$curr_date','$custid' ,'$desc', '$debitno', $amnt, '$source','$emp')";
				dbQuery($sql4);
				
				$sql6= "UPDATE seq_note
	          SET debit = '$cr_code'
			  WHERE code = '$code'
	         ";
	        dbQuery($sql6);
				
				
				
		       $sql5 = "UPDATE payments
				         SET comment = 'cancelled'
				         WHERE reciept_no = '$recieptno'
				         ";		 
				dbQuery($sql5);	
				
                   $sql7 = "INSERT INTO cust_invoice (invoice_id, waybill_no, type , customer_id, amount_due, balance, date, office, status)VALUES('NULL', '$debitno', 'DEBIT NOTE' , '$custid', $amnt, $amnt, '$curr_date', '$source', 'active')
				         ";	 
						
				dbQuery($sql7);
				
				
			 return "reciept number ". $recieptno ." has been successfully reversed";
			 header('reverse-reciept.php');
				
				 
				 
			 }
			 
		
		
			
		}
		
		
	// no results found	
	 else
	   {
		   
		 return "reciept number does not exist";
			 header('reverse-reciept.php');  
		   
		   
	   }
		
	 
 }
 
 
 function edit_price($rateid, $price)
 {
	 $sql = "UPDATE rate_table SET price = $price WHERE rate_id = $rateid ";
	 dbQuery($sql);
	 
	 header( 'location: view-rates.php'); 
 }
  
 
?>