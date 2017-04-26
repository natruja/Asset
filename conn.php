<?php
$host = "10.11.22.33";
$username = "rxsys";
$password = "ssSS$$55";
$database = "asset";

$conn = mysqli_connect($host, $username, $password) or die ("Can not connect server");
$con_db = mysqli_select_db($conn, $database) or die ("Can not connect database".$database);
mysqli_query($conn, "SET NAMES 'utf8'") or die ("UTF-8: ".mysql_error());

 if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



?>