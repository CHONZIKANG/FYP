<?php
include("dataconnection.php");

    $error="";
	$valid=1;
	$success=0;
if(isset($_GET["submitbtn"]))
{
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
		header( "refresh:0; url=Login.php" );
		
		}
}
?>
<!DOCTYPE html>   
<html>
<head>

<title>Electronic Gadget Store </title>


<link rel="stylesheet" href="assets/css/Sign up1.css">
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

<title> Sign Up</title>

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">



</head>
<body style="background-color:#f4f4f4;">

<div class="signin">
<form name="signin_frm" method="GET" id="form">
<h1 style="text-align : center;"> Sign UP</h1>

<p>
Username:<span style="color:red;">*</span>
<br>
<br>
<input type="text" name="username"  size="50" required>
<br>

<p>
Password <span style="color:red;">*</span>
<br>
<br>
<input type="password" name="password" size="50" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="At least 8 character, 1 Upper case, 1 Lower case"  required>
<br>
<p>
Phone Number: <span style="color:red;">*</span>
<br>
<br>
<input type="text" name="phone_number"  placeholder="Phone Number" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{3}[0-9]{4}" title="Enter 01X-XXX-XXXX"  size="50" required>
<br>
<p>
Email <span style="color:red;">*</span>
<br>
<br>
<input type="Email" name="email" placeholder="Enter email" required>
<br>
<p>
Birthday <span style="color:red;">*</span>
<br>
<br>
<input type="date" name="D_O_Birth" placeholder="Enter yr date" required>
<br>

</p>
Gender <span style="color:red;">*</span>
<br>
<br>
<input type="radio" value="Male" name="Gender"/> Male <br>  
<input type="radio" value="Female" name="Gender"/> Female <br> 
<br>

</p>


<div style="display: block; width:45%;margin:auto;">
<input type="submit" name="submitbtn" value="Sign up" style="height:40px;" id="submit_btn" onclick="verification()">
<br><br>
<a href="Login.php">Back</a>
</div>





</form>
</div>
</body>



</html>

</form>
</div>
</body>
