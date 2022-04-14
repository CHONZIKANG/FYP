<?php
$connect=mysqli_connect("localhost","root","","fyp 2022");

if($connect)
{
	echo" ";
}
else
{
	die("Could not connect".mysql_error());
}
?>