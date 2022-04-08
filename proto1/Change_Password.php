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


		}
		else if($current_pass==$user_password)
		{
			$valid=1;
		}
		

		
		
		if($new_pass!=$confirm_pass)
		{
			$new_pass_valid=0;
		}
		else if($new_pass==$confirm_pass)
		{
			$new_pass_valid=1;
		}
		
		if($valid==1 && $new_pass_valid==1)
		{
			mysqli_query($connect,"UPDATE account SET user_password='$confirm_pass' WHERE user_id='$user_id'");
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
          <span>Official Webside Electronic Gadget Store</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
       <a class="navbar-brand" href="#"><p style="font-family: 'Birthstone', cursive; color:#0000cd; font-size:3.25em;">Rapid Grocery Store</p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.html">Products
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.html">Contact Us</a>
              <span class="sr-only">(current)</span>
            </li>
			<li class="nav-item">
			  <a href="Shopping Cart.html" > <i class="fas fa-shopping-cart" title="Shopping Cart" ></i> </a>
			  </li>
			  
			  <li class="nav-item">
			  <div class="dropdown">
			  <button class="dropbtn">
			  <a href="#.html" > <i class="far fa-user" title="User Account"></i> </a>
			  </button>
			  <div class="dropdown-content">
			   <a class="nav-link" href="user edit.html">My Account</a> 
              <a class="nav-link" href="login_form.html">Logout</a>
				</div>
			  
			  </div>
			  </li>
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

		<p>
		Current Password 
		<br>
		<input type="password" name="useracc_pass" id="acc_password"  size="50" >
		<br>
		<?php if(isset($_GET['save']))
				{
					if(empty($current_pass)){  ?><span id="alert_msg"><?php  echo "Please fill up your current password! "?> </span><?php }
					else if($valid==0){?><span id="alert_msg"><?php  echo "Password is incorrect!"?> </span>
								<?php }
				}?>
		</p>

		<p>
		New Password
		<br>
		<input type="password" id="new_password" name="new_password" size="50 "pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" >
		<br>
		<span style="color: grey; font-size:14px;">
		Password must contain 8 or more characters, one number, one uppercase and lowercase letter. 
		</span>
		<br>
		<?php if(isset($_GET['save']))
				{
					if(empty($new_pass)){  ?><span id="alert_msg"><?php  echo "Please fill up your new password! "?> </span><?php }}?> 

		</p>


		<p>
		Confirm Password
		<br>
		<input type="password" id="confirm_password" name="confirm_password" size="50" >
		<br>
		<?php if(isset($_GET['save']))
				{
					if(empty($confirm_pass)){  ?><span id="alert_msg"><?php  echo "Please recomfirm your new password! "?> </span><?php }?> 
					<?php if($new_pass_valid==0){?><span id="alert_msg"><?php  echo "Password entered is different!"?> </span>
								<?php }
				}?>
				
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
              <p>Copyright &copy; 2021 RAPID GROCERY STORE(MLK) SDN.BHD. 
                
          
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