<?php include("dataconnection.php");?>
<html>
<?php
	
	$error="";
	$valid=1;
	$success=0;
	
	session_start();
	
	if(!isset($_SESSION['adminid']))
	{
		header("Location:admin login.php");
	}
	$admin_ID=$_SESSION['adminid'];
	
	if(isset($_POST["send"]))
	{
		$name = $_POST["name"];
		$phone = $_POST["phone"];
		$ICnumber = $_POST["ICnumber"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		$filename = $_FILES["myfile"]["name"];
		$tempname = $_FILES["myfile"]["tmp_name"];    
        $folder = "image/".$filename;
		
		if(empty($name))
		{
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}

		
		if(empty($phone))
		{
			$valid=0;
			
		}
		else
		{
			$error="";
			$valid=1;			
		}
		
		
		if(empty($ICnumber))
		{
			$valid=0;
			
		}
		else
		{
			$error="";
			$valid=1;			
		}
		
		echo $ICnumber;
		
		if(empty($email))
		{
			$valid=0;
			
		}
		else
		{
			$error="";
			$valid=1;			
		}

		
		if(empty($password))
		{
			$valid=0;
			
		}
		else
		{
			$error="";
			$valid=1;			
		}

		
		if($valid==1)
		{
			
			$success=mysqli_query($connect,"INSERT INTO admin (Name,Phone,IC_Number,Email,Password,profile_image) VALUES ('$name','$phone','$ICnumber','$email','$password','$filename')");
			
		}
		
		if (move_uploaded_file($tempname, $folder))  
		{
            $msg = "Image uploaded successfully";
        }else
		{
            $msg = "Failed to upload image";
        }
		
		if($success)
		{
		?>
		
		<script>
		
			alert("You profile have been recorded.");

		</script>
		
		<?php
		header( "refresh:0; url=profile.php" );
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts Page</title>
   

	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    
	
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	<link rel="stylesheet" href="css/profile.css">
	
<style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
}

.profile-form {
  background:#fff;
  border:.5px solid #fff;
  border-radius:10px;
  box-shadow:0px 0px 10px #000;
  width:600px;
  height:920px;
  text-align:center;
  margin:0 auto;
}

.user-edit h5
{
  text-align:left;
  margin-left:100px;
  font-style: italic;
  color: grey;
}

.profile-header
{
   color: black; 
   font-weight: bold;
}

</style>	
	
	
</head>

<body class="bg01">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                         <h1 class="tm-site-title mb-0">Electronic Gadget Store's<br> Admin Dashboard</h1>
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
        <!-- row -->
		<br>
		<br>
        <div class="profile">
  
  <div class="profile-form">
  <div class="profile-header">
  <form id="profile-form"  method="POST" action="" enctype="multipart/form-data">
  <br>
    <h1 style="font-weight: bold;">PROFILE</h1>
	<hr>
  </div>
	<img src="img/username.PNG" width="160" height="160" align="center">
	<input type="file" id="myfile" name="myfile" value="">
	<hr>
  
	<div class="user-edit">
<br>
    <h5>Name:</h5>
    <input type="text" name="name" placeholder="Enter your name" required/><br>
	<br>
	
	<h5>Password:</h5>
    <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="At least 8 character, 1 Upper case, 1 Lower case" placeholder="Enter your password" required/><br><br>
	
	<h5>Phone:</h5>
    <input type="text" name="phone" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{3}[0-9]{4}" title="Example: 01x-0000000" placeholder="Enter your phone number" required/><br><br>
	
	<h5>IC number:</h5>
    <input type="text" name="ICnumber" pattern="^\d{6}-\d{2}-\d{4}$" title="Example: 000000-00-0000" placeholder="Enter your IC number" required/><br><br>
	
	<h5>Email:</h5>
    <input type="text" name="email" placeholder="Enter your email" required/><br><br>


<br>    
	<label>   
    <input type="submit" name="send" value="Save" class="save-button" >
<br>

</div>
	
</div>
</form>
</div>
        
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>