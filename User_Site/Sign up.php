<?php
include("dataconnection.php");

    $error="";
	$valid=1;
	$success=0;
if(isset($_GET["submitbtn"]))
{
	$User_ID=$_GET["User_ID"];
	$Uname=$_GET["username"];
	$Password=$_GET["password"];
	$Pnumber=$_GET["phone_number"];
	$D_O_Birth=$_GET["D_O_Birth"];
	$Email=$_GET["email"];
	$Gender=$_GET["Gender"];
	
	
	
	
	if(empty($Uname))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if(empty($Password))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if(empty($Pnumber))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if(empty($D_O_Birth))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if(empty($Email))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if($valid==1)
		{
			$success=mysqli_query($connect,"INSERT INTO account (user_id,user_name,user_password,user_phone,D_O_Birth,email,user_gender) VALUES('User_ID','$Uname','$Password','$Pnumber','$D_O_Birth','$Email','$Gender')");
		}
		
		if($success)
		{
			
		?>

		<script>
		
			alert("You Have Succesfully Create Sign Up Form.Thank You!");

		</script>
		
		<?php
		header( "refresh:0; url=Regirstration or sign up.php" );
		
		}
}
?>
<!DOCTYPE html>   
<html>
<head>

<title>Electronic Gadget Store </title>

<link rel="stylesheet" href="assets/css/register form.css">
<link rel="stylesheet" href="title.css">
<link href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Alex+Brush&family=Architects+Daughter&family=Birthstone&family=Birthstone+Bounce&family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

<script>
function myFunction() 
{
  alert("You have successfully register your account !");
}
</script>
</head>
<body>


<p id="title">Electronic Gadget Store <span style="font-family: 'Ubuntu', sans-serif; font-size:24px;">Register</span></p>

<head>
<h1> Sign Up</h1>
</head>
<body>
<form name="user_form" method="GET" action="" >
<div class="register">
  <div class="register-form">
    <h3 style="color:black;">User ID</h3>
    <input type="text" name="User_ID" placeholder="User_ID" required ><br>
	<br>
    <h3 style="color:black;">Username:</h3>
    <input type="text" name="username" placeholder="Username" required ><br>

	<br>
    <h3 style="color:black;">Password:</h3>
    <input type="password" name="password" placeholder="Password" required>

	<br>
	<h3 style="color:black;">Phone Number:</h3>
    <input type="text" name="phone_number" placeholder="Phone Number" required>
    
	<br>
	<h3 style="color:black;">Email:</h3>
    <input type="Email" name="email" placeholder="Enter email" required><br>

    <br>
	<h3 style="color:black;">Birthday:</h3>
    <input type="date" name="D_O_Birth" placeholder="Enter yr date" required >

	<br>
	<br>
	<label>   
	<h3 style="color:black;">Gender :</h3>  
	<br>  
	<input type="radio" value="Male" name="Gender"/> Male <br>  
	<input type="radio" value="Female" name="Gender"/> Female <br>  
	<br>	
	<br>
	<br>
    <input type="submit" name= "submitbtn" value="Register">
    <br>
	<a href="Login.php">Back</a>
 
  </div>
</div>
</form>
</body> 
</html>  