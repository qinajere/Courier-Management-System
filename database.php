<?php


// database connection config
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'ampexdatabase';

$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass,$dbName) or die ('MySQL connect failed. ' . mysqli_connect_error());


function dbQuery($sql)
{
	$dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'ampexdatabase';

$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass,$dbName) or die ('MySQL connect failed. ' . mysqli_connect_error());
	
	$result = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
	
	return $result;
}

function dbAffectedRows()
{
	global $dbConn;
	
	return mysql_affected_rows($dbConn);
}

function dbFetchArray($result, $resultType = MYSQL_NUM) {
	return mysql_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
	return mysqli_fetch_assoc($result);
}

function dbFetchRow($result) 
{
	return mysqli_fetch_row($result);
}

function dbFreeResult($result)
{
	return mysql_free_result($result);
}

function dbNumRows($result)
{
	return mysqli_num_rows($result);
}

function dbSelect($dbName)
{
	return mysql_select_db($dbName);
}

function dbInsertId()
{
	return mysql_insert_id();
}
?>