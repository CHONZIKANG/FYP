<?php 
include("connection.php");
session_start();
?>
<html>
<?php
	
	$error="";
	$valid=1;
	$success=0;
	
	if(isset($_POST["send"]))
	{
		$Name = $_POST['username'];  
		$Password = $_POST['password'];  

        $Name = stripcslashes($Name);  
        $Password = stripcslashes($Password);  
        $Name = mysqli_real_escape_string($con, $Name);  
        $Password = mysqli_real_escape_string($con, $Password);  
      
        $sql = "select *from admin where Name = '$Name' and Password = '$Password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
		
		if($count == 1)
		{  
            ?>
		
		<script type="text/javascript">
		
			alert("You are login successfully");
			window.location.href = "receive.php";

		</script>
		
		<?php
		$_SESSION['adminid']=$row['admin_ID'];
		header( "refresh:0; url=admin login.php" );
		
        }  
        else
		{  
            ?>
		
		<script>
		
			alert("You are login failed.Please enter again.");
			
		</script>
		
		<?php
		header( "refresh:0; url=admin login.php" );
        }  

	}
?>
  <head>
  <style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
}
 
.login-form input[type="submit"] {
  height:30px;
  width:100px;
  background:black;
  border:1px solid #f2f2f2;
  border-radius:20px;
  color: slategrey;
  text-transform:uppercase;
  font-family: 'Ubuntu', sans-serif;
  cursor:pointer;
}

.header
{
  border:1px solid #black;
  background-color:#fff;
}

</style>
	<link rel="stylesheet" href="css/login.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  </head>
  <body style="background-image: url('img/dash-bg-03.jpg');">
    <div class="login">
      <div class="login-header">
	  <br>
    <h2 id="header" style="color:#DAE4FB; background-color: rgba(0, 0, 0, 0.5);">Electronic Gadget Store Admin Login</h2>
  </div>
    <div class="login-form">
	<form id="Login-form" method="post">	  
		  
	<img src="img/username.PNG" width="60" height="60" align="left">
    <h3 style="color:grey;">Username:</h3>
    <input type="text" name="username" placeholder="Username" required/><br>
	
	<img src="img/p.PNG" width="60" height="40" align="left">	
    <h3 style="color:grey;">Password:</h3>
    <input type="password" name="password" placeholder="Password" required/>
	
    <br>
	<br>
    <input id="myButton" type="submit" name="send" value="Login" class="login-button ">
    <br>

	</form>
  </div>
</div>
      </div>

  </body>
</html>