<?php 
//start session
session_start();

require_once('database.php');
	

$action = $_GET['action'];




switch($action) {
	case 'add-cons':
		addCons();
	break;
	
	case 'delete-emp':
		deletemp();
	break;
	
	case 'delete-cust':
		deletecust();
	break;
	
	case 'delete-driver':
		deletedriver();
	break;
	
	case 'delete-office':
		deleteoffice();
	break;
	
	case 'delete-vehicle':
		deletevehicle();
	break;
	
	case 'change-pass':
		changePass();
	break;
			
	case 'logOut':
		logOut();
	break;		
	
}//switch

function addCons(){
	
	 $consignername = $_POST['consignername'];
	$consignerphone = $_POST['consignerphone'];
	$consigneraddress = $_POST['consigneraddress'];
	
	$consigneename = $_POST['consigneename'];
	$consigneephone = $_POST['consigneephone'];
	$consigneeaddress = $_POST['consigneeaddress'];
	
	$consignmentNo = $_POST['consignmentNo'];
	$description = $_POST['description'];
	$weight = $_POST['weight'];
	$quantity = $_POST['quantity'];
	$destination = $_POST['destination'];
	$servicetype = $_POST['servicetype'];

		
	$consignmentdate = $_POST['consignmentdate'];
	
	$source =  $_SESSION['office'];

$rate = get_rate();

if ($servicetype == 'door to door')
{
	$rate = $rate + 2000;
	
	$sql = "INSERT INTO waybill (waybill_id, waybill_no, consignor_name, consignor_phone, consignor_add, consignee_name, consignee_phone, consignee_add, description, weight, quantity, source, destination, service_type, total_charged, way_date, status)
	
			VALUES('NULL', '$consignmentNo', '$consignername', '$consignerphone','$consigneraddress', '$consigneename', '$consigneephone','$consigneeaddress','$description','$weight','$quantity','$source','$destination','$servicetype','$rate', '$consignmentdate','at source')";	
	
	
}

else 
{
	$sql = "INSERT INTO waybill(waybill_id, waybill_no, consignor_name, consignor_phone, consignor_add, consignee_name, consignee_phone, consignee_add, description, weight, quantity, destination, service_type, total_charged, way_date, status)
	
			VALUES('NULL', '$consignmentNo', '$consignername', '$consignerphone','$consigneraddress', '$consigneename', '$consigneephone','$consigneeaddress','$description','$weight','$quantity','$destination','$servicetype','$rate', '$consignmentdate','at source')";	
	
}

//echo $sql;
	dbQuery($sql);
	header('Location: add_parcel.php'); 
	
}//addCons


function deletemp() {
	if ($_SESSION['user_name']== 'ADMIN')
	{
	$eid = (int)$_GET['eid'];
	$sql = "DELETE FROM employee
			
			WHERE emp_id= $eid";
	dbQuery($sql);
	header('Location: view-managers.php'); 
	}
	
	else
	{
		$eid = (int)$_GET['eid'];
	$sql = "DELETE FROM employee
			
			WHERE emp_id= $eid";
	dbQuery($sql);
	header('Location: employee-list.php'); 
	}
			
}

function deletecust() {
	
	
	$cid = (int)$_GET['cid'];
	$sql = "DELETE FROM reg_customer
			
			WHERE customer_id= $cid";
	dbQuery($sql);
	header('Location: customer-list.php'); 
	
			
}

function deletedriver() {
	$did = (int)$_GET['did'];
	$sql = "DELETE FROM driver
			
			WHERE driver_id= $did";
	dbQuery($sql);
	header('Location: view-drivers.php'); 
			
}

function deleteoffice() {
	$oid = (int)$_GET['oid'];
	$sql = "DELETE FROM office
			
			WHERE office_id= $oid";
	dbQuery($sql);
	header('Location: view-offices.php'); 
			
}

function deletevehicle() {
	$vid = (int)$_GET['vid'];
	$sql = "DELETE FROM vehicle
			
			WHERE vehicle_id= $vid";
	dbQuery($sql);
	header('Location: view-vehicles.php'); 
			
}





function logOut(){

	if(isset($_SESSION['user_name'])){
		unset($_SESSION['user_name']);
	}
	if(isset($_SESSION['user_type'])){
		unset($_SESSION['user_type']);
	}
	
	if(isset( $_SESSION['region'])){
		unset($_SESSION['region']);
	}
	
	if(isset($_SESSION['office'])){
		unset($_SESSION['office']);
	}
	if(isset($_SESSION['employee'])){
		unset($_SESSION['employee']);
	}
	
	if(isset($_SESSION['user_code'])){
		unset($_SESSION['user_code']);
	}
	session_destroy();
	header('Location: index.php');
}//logOut



?>