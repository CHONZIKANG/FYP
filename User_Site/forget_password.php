<!DOCTYPE html>
<?php include("dataconnection.php");
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
		$Email = $_POST['email'];  

        $Name = stripcslashes($Name);  
        $Email = stripcslashes($Email);  
        $Name = mysqli_real_escape_string($connect, $Name);  
        $Email = mysqli_real_escape_string($connect, $Email);  
      
        $sql = "select *from account where user_name = '$Name' and email = '$Email'";  
        $result = mysqli_query($connect, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
		
		if($count == 1)
		{  
            ?>
		
		<script>
		
			alert("Please proceed next step to create new password.");

		</script>
		
		<?php
		$_SESSION["userid"]=$row["user_id"];
		header( "refresh:0; url=reset_password.php" );
		
        }  
        else
		{  
            ?>
		
		<script>
		
			alert("Your username or email are error, please enter again.");

		</script>
		
		<?php
		header( "refresh:0; url=forget_password.php" );
        }  

	}
?>
  <head>

	<link rel="stylesheet" href="password.css">
  </head>
  <body>
  <br>
  <br>
  <br>
    <div class="forget">
      <div class="header">
    <h1>Forget password ?</h1>
	<hr color="red">
  </div>
    <div class="password-form">
	<form id="Login-form" method="post">	  
		  
    <h2 style="color:#1A3B86;">Username:</h2>
    <input type="text" name="username" placeholder="Username" required/><br>
	
	<br>
		
    <h2 style="color:#1A3B86;">Email:</h2>
    <input type="email" name="email" placeholder="Email" required/>
	
    <br>
	<br>
    <input type="submit" name="send" value="Submit" class="submit-button ">
    <br>
	
	</form>
  </div>
</div>
      </div>

  </body>
</html>