<!DOCTYPE html>
<?php include("dataconnection.php");?>
<html>
<?php
	session_start();

	$user_id=$_SESSION['userid'];
	$error_msg="";
	$valid=1;
	$success=0;
	
	if(isset($_POST["send"]))
	{
		$new_password = $_POST['new_password'];  
		$reenter_password = $_POST['reenter_password'];  
		
		if(empty($new_password)||empty($reenter_password)) 
		{
			$error_msg="Please fill up the field.";	
			$valid=0;
		}
		else
		{
			$error_msg="";
			$valid=1;			
		}
		
		
		if($new_password!=$reenter_password)
		{
			$error_msg="Please make sure your password match.";
			$valid=0;
		}
		
		if($valid)
		{
			
			$success=mysqli_query($connect,"UPDATE account SET user_password='$reenter_password' WHERE user_id='$user_id'");
			
			if($success)
			{
			?>
		
		<script>
		
			alert("Password reset successfully.");

		</script>
		
		<?php
			}
			header("refresh:0; url=Login.php");
		}
        

	}
?>
  <head>

	<link rel="stylesheet" href="reset_password.css">
  </head>
  <body>
  <br>
  <br>
  <br>
    <div class="reset">
      <div class="header">
    <h1>Reset Password</h1>
	<hr color="red">
  </div>
    <div class="reset-password-form">
	<form id="password_form" method="post">	  
	<span id="error_msg" style="color:red; font-size:14px;"><?php echo $error_msg; ?> </span>
    <h2 style="color:#1A3B86;">Enter your new password:</h2>
    <input type="text" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/><br>
	
	<br>
		
    <h2 style="color:#1A3B86;">Re-enter New Password:</h2>
    <input type="text" name="reenter_password" required/>
	
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