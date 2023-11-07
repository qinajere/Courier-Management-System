
<?php 

require_once('database.php');


// gets weight input range
function get_weght()
	
	{
		$weight = $_POST['weight'];
		
	
	
	if( $weight <= 1)
	{
		$range = '0.35-1';
	}
	elseif($weight >= 1.1 and $weight < 2.1)
	{
		$range = '1.1-2.0';
	}
	elseif($weight >= 2.1 and $weight < 3.1)
	{
		$range = '2.1-3.0';
	}
	elseif($weight >= 3.1 and $weight < 4.1)
	{
		$range = '3.1-4.0';
	}
	elseif($weight >= 4.1 and $weight < 5.1)
	{
		$range = '4.1-5.0';
	}
	elseif($weight >= 5.1 and $weight < 6.1)
	{
		$range = '5.1-6.0';
	}
	elseif($weight >= 6.1 and $weight < 7.1)
	{
		$range = '6.1-7.0';
	}
	elseif($weight >= 7.1 and $weight < 8.1)
	{
		$range = '7.1-8.0';
	}
	elseif($weight >= 8.1 and $weight < 9.1)
	{
		$range = '8.1-9.0';
	}
	else
	{
		$range = '9.1-10.0';
	}
	
	return $range;
	}
	
	

	