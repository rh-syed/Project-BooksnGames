<?php
$connect = mysql_connect('localhost','booksnga_mesuser','Keep6own!');

if (!$connect){
	die('Connection was not successful'.mysql_error() );
}

$db_selected = mysql_select_db("booksnga_mes");

if (!$db_selected){
	die('Connection was not successful to the database'.mysql_error() );
}
?>