<?php
global $con,$username,$password,$database;
/* Local */
$username="root";
$password="";
$database="employees";

/* Server */



$con=mysqli_connect("localhost",$username,$password);
//Connection Checking
if(!$con)
{
die("Could not connected:".mysqli_error());
}

 else
 {
// echo "Connected<br/>";
 }

//Databasse Checking
$db_found=mysqli_select_db($con,$database);
if(!$db_found)
{
print "Database not found<br/>";
}

/*
else
{
print "Database  found<br/>";
}
*/
?>