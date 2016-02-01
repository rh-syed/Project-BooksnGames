<?php
//$connect = mysqli'localhost', "root" , "0000"); //change this before deployment
$extensionFile = 'php_mysqli.dll'; // why do i have to load this manually????????
			//database setup 
		if(extension_loaded('mysql')){
			//printf("Mysql is avalaible <br/>");
		}
		else{
			if(strtoupper(substr(PHP_OS , 0 , 3)) === "WIN" ){
				dl('php_mysql.dll');
			}
			else{
				echo "error loading sql library in windows";
			}
		}
		$connect = new mysqli("localhost" , "root" , "0000" , "booksandgames");
		if($connect->connect_errno){
			echo "Failed to connect to mysql";
			echo $db->connect_errno . "<br/>";
			echo $db->connect_err . "<br/>";
			die('Connection was not successful to the database user'.mysql_error() );
		}
	
?>