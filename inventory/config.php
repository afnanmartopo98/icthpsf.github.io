<?php
/**********************************************************************
 *Contains all the basic Configuration
 *dbHost = Host of your MySQL DataBase Server... Usually it is localhost
 *dbUser = Username of your DataBase
 *dbPass = Password of your DataBase
 *dbName = Name of your DataBase
 **********************************************************************/
$hostname = 'localhost';
$user = 'root';
$password = '';
$mysql_database = 'inventori';
$connection = new mysqli($hostname, $user, $password, $mysql_database);
	if($connection->connect_error){
         die("Error Connecting to MySQL DataBase" .$connection->connect_error);
	}
?>