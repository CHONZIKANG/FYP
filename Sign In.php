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
	$name=$_POST["signin_name"];
	$password=$_POST["signin_pass"];
	
	
	$result=mysqli_query($connect, "SELECT * FROM account WHERE user_name='$name' AND user_password='$password'");
	
	$count=mysqli_num_rows($result);

	$row = mysqli_fetch_assoc($result);

	if(empty($name)) 
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
		echo "test".$_SESSION['userid']=$row['user_id'];
		header("location:User_Profile.php");
	}
	else
	{
		$error_msg="Your account and/or password is incorrect, please try again";
	}
	
	/*
	if($count==1)
	{
		$error=" ";
		$user_pass=$row['user_password'];
	}
	else if($count!=1)
	{
		$error="Account not found!";
	}
	
	
	if($count==1 && $password!=$user_pass)
	{
		$pass_error="Incorrect Password.";
		$pass_count=0;
	}
	else if($count==1 && $password==$user_pass)
	{
		$pass_error="";
		$pass_count=1;
	}
	
		
	
	if($count==1 && $pass_count==1)
	{
		header("location:#");
	}
		
	*/
}		


?>



<title> Sign In</title>

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

<link rel="stylesheet" href="sign_in_css.css">



</head>
<body style="background-color:#f4f4f4;">

<div class="signin">
<form name="signin_frm" method="post" id="form"> <!--change form name-->
<h1 style="text-align : center;"> Sign In</h1>
<span id="error_msg" style="color:red; font-size:14px;"><?php echo $error_msg; ?> </span>
<p>
Name <span style="color:red;">*</span>
<br>
<br>
<input type="text" name="signin_name" size="80" maxlength="50" required>
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

<a href="#" id="link">Forgot Password ?</a>
<br>
<br>
<a href="#" id="link">Create an Account</a>
<br>
<br>

<div style="display: block; width:45%;margin:auto;">
<input type="submit" name="sendbtn" value="Sign In" style="height:40px;" id="submit_btn" onclick="verification()">
</div>





</form>
</div>
</body>








</html>