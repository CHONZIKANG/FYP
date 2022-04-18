<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Electronic Gadget Store</title>
	
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="assets/css/cart_CSS.css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
	
	<!--Font style from google-->
	<link href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Alex+Brush&family=Architects+Daughter&family=Birthstone&family=Birthstone+Bounce&family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Roboto&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/Change_Password_Css.css">
	
	<?php   

	include("dataconnection.php");

	session_start();
	
	$error="";
	
	if(!isset($_SESSION['userid']))
	{
		header("Location:Login.php");
	}

	$user_id=$_SESSION['userid'];

	$password_result=mysqli_query($connect,"SELECT user_password FROM account WHERE user_id='$user_id'");

	$row=mysqli_fetch_assoc($password_result);

	$valid=1;
	$new_pass_valid=1;


	
	
	
	if(isset($_POST['save']))
	{
		
		$current_pass=$_POST["useracc_pass"];
		$new_pass=$_POST["new_password"];
		$confirm_pass=$_POST["confirm_password"];

		$user_password=$row['user_password'];
		
		if($current_pass!=$user_password)
		{
			$valid=0;
			$error="Password not same.";
			


		}
		else if($current_pass==$user_password)
		{
			$valid=1;
		}
		

		
		
		if($new_pass!=$confirm_pass)
		{
			$new_pass_valid=0;
			$error="Please make sure re-type password is match.";
		}
		else if($new_pass==$confirm_pass)
		{
			$new_pass_valid=1;
		}
		
		if(empty($current_pass)||empty($new_pass)||empty($confirm_pass))
		{
			$error="Please fill up every field.";
			$valid=0;
		}
		
		if($valid==1 && $new_pass_valid==1)
		{
			mysqli_query($connect,"UPDATE account SET user_password='$confirm_pass' WHERE user_id='$user_id'");
			?>
			<script>
			alert("Password successfully changed.");
			</script>
			<?php
			header("refresh:0; url:Change_Password.php");
		}
			
			

	}

	?>

  </head>

  <body>
    
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <span>Official Website Electronic Gadget Online</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
       <a class="navbar-brand" href="#"><p style="font-family: 'Birthstone', cursive; color:#0000cd; font-size:3.25em;">Electronic Gadgets Online</p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="Main_Page.php">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="Product list.php">Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About us.php">About Us</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="Contact us.php">Contact Us</a>
            </li>
			<?php
			if(isset($_SESSION['userid']))
			{
			?>
			<li class="nav-item">
			  <a href="Shopping_Cart.php" > <i class="fas fa-shopping-cart" title="Shopping Cart" ></i> </a>
			  </li>
			<li class="nav-item">
			  <div class="dropdown">
			  <button class="dropbtn">
			  <a href="#.html" > <i class="far fa-user" title="User Account"></i> </a>
			  </button>
			  <div class="dropdown-content">
			  <a class="nav-link" href="User_Profile.php">My Account</a> 
              <a class="nav-link" href="Logout.php">Logout</a>
				</div>
			  
			  </div>
			  </li>
			<?php
			}
			?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- About Page Starts Here -->
    <div class="contact-page">
		<div class="change_pass"style="background-color:#f4f4f4; padding:25px 0px;">

		<div id="info">
		<div id="left">
			<p>Manage My Account</p>
			<br>
			<a href="User_Profile.php">My Profile</a>
			<br>
			<br>
			<a href="User_Address.php" id="sub">&emsp;Addresses</a>
			<br>
			<br>
			<a href="Change_Password.php" id="sub">&emsp;Change Password</a>
			<br>
			<br>
			<a href="User_Purchase.php">My Purchase</a>

			</div>

		<div id="right">
		<div id="title">
		<h3>Change Password</h3>
		</div>

		<form name="edit_password" id="form" method="POST">

		<span id="error" style="color:red; font-size:14px;"><?php echo $error;?></span>
		<p>
		Current Password<span style="color:red;">*</span>
		<br>
		<input type="password" name="useracc_pass" id="acc_password"  size="50" >
		<br>

		</p>

		<p>
		New Password<span style="color:red;">*</span>
		<br>
		<input type="password" id="new_password" name="new_password" size="50 "pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" >
		<br>
		<span style="color: grey; font-size:14px;">
		*Password must contain 8 or more characters, one number, one uppercase and lowercase letter. 
		</span>
		<br>
		

		</p>


		<p>
		Confirm Password<span style="color:red;">*</span>
		<br>
		<input type="password" id="confirm_password" name="confirm_password" size="50" >
		<br>

				
		<br>

		</p>

		<br>
		<input type="submit" name="save" id="save_btn" value="Save">

		</div>


		</form>


		</div>
		</div>
    </div>
    <!-- About Page Ends Here -->

     <!-- Subscribe Form Starts Here -->
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe on Rapid Grocery Store now!</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>Subscribe us now! We will notify you when our newest arrived product and we will giveaway the reward up to 45% discount ! </p>
              <div class="container">
                <form id="subscribe" action="" method="get">
                  <div class="row">
                    <div class="col-md-7">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" 
                        onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                    	onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                    	value="Your Email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-5">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe Form Ends Here -->


    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">How It Works ?</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
               <p>Copyright &copy; 2022 Electronic Gadgets Online (MLK) SDN.BHD. 
                
          
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/flex-slider.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
