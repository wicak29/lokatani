<?php

$hostname = "128.199.127.175";
$username = "dev";
$password = "lokatanijuara";
$database = "lokatani";

$mysqli = new mysqli($hostname, $username, $password, $database);

if(mysqli_connect_errno()) 
{
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}

?>	