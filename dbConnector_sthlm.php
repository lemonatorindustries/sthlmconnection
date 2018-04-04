<?php
/* 2018-04-04, JJE
** Databas connector!
*/

function db_connect_sthlm()
{

$host 		= "localhost";
$dbname		= 'sthlmconnection';
$user 		= "sthlm_user";
$pass 		= "GvWSVsaJVCzEAY0V";

$dsn = "mysql:host=$host;dbname=$dbname";	
	
	try 
	{
	  # MySQL with PDO_MYSQL
	  //$DBH = new PDO("mysql:host='MYSQLPDO_HOST';dbname='MYSQLPDO_DB'", MYSQLPDO_USER, MYSQLPDO_PASS);
	  $DBH = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	  
	  	  
	  //$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	//Error level: Skarp drift!
	  $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 		//Error level: Debug	  
	  $DBH->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
	  //$DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	  	  
	  return $DBH; //Returns the connection object so that it may be used from the outside.
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		# Eventuellt: Dölj felmeddelanden för användare och skriv dom istället till fil		
	}
}
?>
