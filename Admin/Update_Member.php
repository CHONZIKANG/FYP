<?php
include("dataconnection.php");
session_start();


if(!isset($_SESSION['adminid']))
	{
		header("Location:admin login.php");
	}
	
$admin_ID=$_SESSION['adminid'];

	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category | Electronic Gadgets Online</title>
    
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	

    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	
	<link rel="stylesheet" href="css/Product.css">
	
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

<link href="css/Update_Members_css.css" rel="stylesheet">
<?php

if(isset($_GET["update"]))
{
	$u_id=$_GET["account_id"];
	
	$account_info=mysqli_query($connect, "SELECT * FROM account WHERE user_id='$u_id'");
	
	$row=mysqli_fetch_assoc($account_info);
	
	
}
$error="";
$invalid=0;
$password_valid=1;
?>

<?php
if(isset($_POST['save']))
{

	
	if(empty($_POST['u_name']) ||empty($_POST['u_gender']) ||empty($_POST['date_of_birth']) ||empty($_POST['phone_no']) ||empty($_POST['u_email']) ||empty($_POST['u_password']) ||empty($_POST['u_retypepass']))
	{
		$error="Please fill up the required fields";
		$invalid=1;

	}
	else
	{
		$name=$_POST['u_name'];
		$gender=$_POST['u_gender'];
		$dob=date('Y-m-d', strtotime($_POST['date_of_birth']));
		$phone_number=$_POST['phone_no'];
		$email=$_POST['u_email'];
		$password=$_POST['u_password'];
		$retype_password=$_POST['u_retypepass'];
		
		if($password==$retype_password)
		{
			$password_valid=1;
		}
		else
		{
			$error_pass="Retype password is not same";
			$password_valid=0;
		}
		
		
		if($invalid==0 && $password_valid==1)
		{
			$success=mysqli_query($connect,"UPDATE account SET user_password='$password', user_phone='$phone_number', email='$email',user_name='$name', user_gender='$gender', D_O_Birth='$dob' WHERE user_id='$u_id' ");
			
			if($success)
			{
				?>
				<script>
				alert("Member's info update successfully.");
				
				</script>
				<?php
				header("refresh:0; url=Manage_Members.php");
				
				
			}
		}
			
		
	}
	
	
}
?>	


<style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
}
</style>
	
</head>

<body class="bg03">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                         <h1 class="tm-site-title mb-0">Electronic Gadgets Online<br> Admin Dashboard</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="Manage_Members.php">Member's Account</a>
										<a class="dropdown-item" href="staff.php">Staff's Account</a>
										<a class="dropdown-item" href="profile.php">Update Staff's Account</a>

                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Product/Category
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="Manage Product list.php">View Product</a>
                                        <a class="dropdown-item" href="Add_Product.php">Add Product</a>
										<a class="dropdown-item" href="Update Product.php">Update Product</a>
										<a class="dropdown-item" href="Manage_Category.php">Category</a>
										

                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="Manage Order list.php">Order</a>
                                </li>
								
								<li class="nav-item">
                                    <a class="nav-link" href="Sales Report.php">Sales Report</a>
                                </li>
								
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="Logout.php">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
		</div>

		<div style="background-color:#f4f4f4; padding:20px; margin: 15px;">

<form id="add_form" method="post">
<h3>Update Member's Information </h3>
<?php
if($invalid)
{
	?>
	<p style="color:red; font-size:14px;"> <?php echo $error; ?> </p>
	<?php
}
?>
<p>
User Name <span id="asterisk">*</span>
<br>
<input type="text" name="u_name" size="50" maxlength="50" value=<?php  echo $row['user_name']; ?> required>
</p>

<p>
Gender <span id="asterisk">*</span>
<br>
<select name="u_gender" id="u_gender">
	<option value="Male" <?php if($row['user_gender']=="Male"){?> selected <?php } ?>>Male </option>
	<option value="Female" <?php if($row['user_gender']=="Female"){?> selected <?php } ?>>Female </option>
</select>
</p>




<p>
Date of Birth <span id="asterisk">*</span>
<br>
<input type="date" name="date_of_birth" min="1915-01-01" max="2008-12-31" value=<?php echo $row['D_O_Birth']; ?>>
</p>


<p>
Phone Number <span id="asterisk">*</span>
<br>
<input type="tel" name="phone_no" id="p_number" placeholder="Eg. 012-xxx-xxxx" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{3}[0-9]{4}" value=<?php echo $row['user_phone']; ?> required>
</p>

<p>
Email address <span id="asterisk">*</span>
<br>
<input type="email" id="email" name="u_email" value="<?php  echo $row['email']; ?>">
</p>


<p>
Password <span id="asterisk">*</span>
<br>
<input type="text" id="password" name="u_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value=<?php echo $row['user_password']; ?>>
<br>
<span style="color:grey; font-size:13px;">Password must contain 8 or more characters, one number, one uppercase and lowercase letter. </span>

</p>

<?php
if($password_valid==0)
{
?>
<p style="color:red; font-size:14px;"> <?php echo $error_pass; ?> </p>
<?php
}
?>

<p>
Retype Password <span id="asterisk">*</span>
<br>
<input type="text" id="retype_pass" name="u_retypepass">
</p>

<input type="submit" name="save" id="save_btn" value="Save">




</form>



</div>
		



    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>