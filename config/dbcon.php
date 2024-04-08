<?php

$host = "localhost";
$username ="root";
$password ="";
$database ="hyper";

//creating database connection
$con = mysql_connect($host,$username,$password,$database);

//check database connection
if(!$con){
	die("Connection Failed: ". mysqli_connect_error());
}
else{
	echo "Connected Successfully";
}


?>