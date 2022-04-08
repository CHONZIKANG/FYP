<?php
include("dataconnection.php");
session_start();

if(!isset($_SESSION['id']))
{
	?>
	<script>
	alert("Please log in!");
	
	
	</script>
	
	<?php
	header("refresh:0.5; url=login.php");
	exit();
}



$user_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT * FROM user WHERE user_id='$user_id'");

$row=mysqli_fetch_assoc($result);


echo "<h1>HOME PAGE </h1>";

echo "<br>Welcome " .$row["user_name"];

echo "<br><a href='logout.php'>LOGOUT </a>";

?>