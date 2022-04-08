<!DOCTYPE html>
<html>
<head>
<?php 

include("dataconnection.php");
session_start();

$error_msg="";
$error="";
$pass_error="";
if(isset($_POST["sendbtn"]))
{
	
	$pass_count=0;
	$email=$_POST["signin_email"];
	$password=$_POST["signin_pass"];
	
	
	$result=mysqli_query($connect, "SELECT * FROM account WHERE email='$email' AND user_password='$password'");
	
	$count=mysqli_num_rows($result);

	$row = mysqli_fetch_assoc($result);

	if(empty($email)) 
	{
		$error="Please enter this field.";	
	}
	else
	{
		$error="";	
	}
	

	if(empty($password)) 
	{
		$error="Please enter this field.";	
	}
	else
	{
		$error="";	
	}
	

	if($count==1)
	{
		
		$_SESSION['userid']=$row['user_id'];  
		header("location:Main_Page.php");
	}
	else
	{
		$error_msg="Your account email and/or password is incorrect, please try again";
	}

}		


?>



<title> Sign In</title>

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/css/login_css.css">



</head>
<body style="background-color:#f4f4f4;">

<div class="signin">
<form name="signin_frm" method="post" id="form">
<h1 style="text-align : center;"> Sign In</h1>
<span id="error_msg" style="color:red; font-size:14px;"><?php echo $error_msg; ?> </span>
<p>
Email <span style="color:red;">*</span>
<br>
<br>
<input type="text" name="signin_email" size="80" maxlength="50" required>
<span id="error" style="color:red; font-size:14px;"><?php echo $error; ?> </span>
</p>




<p>
Password <span style="color:red;">*</span>
<br>
<br>
<input type="password" name="signin_pass" id="login_password"  size="50" required>
<span id="error_pass" style="color:red; font-size:14px;"><?php echo $pass_error; ?> </span>
<br>

</p>

<a href="forget_password.php" id="link">Forgot Password ?</a>
<br>
<br>
<a href="Sign up.php" id="link">Create an Account</a>
<br>
<br>

<div style="display: block; width:45%;margin:auto;">
<input type="submit" name="sendbtn" value="Sign In" style="height:40px;" id="submit_btn" onclick="verification()">
</div>





</form>
</div>
</body>



</html>