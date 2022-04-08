<?php
include("dataconnection.php");
session_start();

$error="";


if(isset($_GET["sendbtn"]))
{
	if(empty($_GET["username"])||empty($_GET["upassword"]))
	{
		$error="username or password is empty";
	}
	else
	{
		$name=$_GET["username"];
		$pass=$_GET["upassword"];
	
		$name=mysqli_real_escape_string($connect,$name);
		$pass=mysqli_real_escape_string($connect,$pass);
		//escape those special characters
		
		$result=mysqli_query($connect, "SELECT * FROM user WHERE user_name='$name'AND user_pass='$pass'");
		
		//$sql="SELECT * FROM user WHERE user_name='$name'AND user_pass='$pass'";
	
		//$result=mysqli_query($connect,$sql);
		
		$count=mysqli_num_rows($result);
		
		if($count==1)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION["id"]=$row["user_id"];
			header("location:profile.php");
			
		}
		else
		{
			$error="Username and password is invalid";
		}
	}
	


}


?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<form name="login" method="get">
	<p>UserName: <input type="text" name="username" placeholder="Enter your name"></p>
	<p>Password: <input type="password" name="upassword"> </p>
		<input type="submit" name="sendbtn" value="Submit">
		<span> <?php echo $error; ?> </span>
		
</form>

</body>
</html>