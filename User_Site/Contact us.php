<?php 
include("dataconnection.php");
session_start();

$u_id=$_SESSION['userid'];

if(!isset($_SESSION['userid']))
{
	header("Location:Login.php");
}


$error="";
	$valid=1;
	$success=0;
	
	if(isset($_POST["send"]))
	{
		if(isset($_SESSION['userid']))
		{
			$username = $_POST["username"];
			$email = $_POST["email"];
			$message = $_POST["message"];
			
			if(empty($username))
			{
				$valid=0;		
			}
			else
			{
				$error="";
				$valid=1;			
			}
			
			
			if(empty($email))
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
				$success=mysqli_query($connect,"INSERT INTO contact_us (username,email,message) VALUES ('$username','$email','$message')");
			}
			
			if($success)
			{
			?>
			
			<script>
			
				alert("Thanks for your contact,we will try our best to improve");

			</script>
			
			<?php
			header( "refresh:0; url=Contact us.php" );
			}
		}
		else
		{
			?>
			<script> alert("You need to Login before continuing!"); </script>
			<?php
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Electronic Gadgets Online</title>
	
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="assets/css/contact us.css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
	<link rel="stylesheet" href="Contact us/contact us.css">
	
	<!--Font style from google-->
	<link href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Alex+Brush&family=Architects+Daughter&family=Birthstone&family=Birthstone+Bounce&family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Roboto&display=swap" rel="stylesheet">
	
	

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
            <li class="nav-item active">
              <a class="nav-link" href="Contact us.php">Contact Us</a>
              <span class="sr-only">(current)</span>
            </li>
			<?php
			
			if(!isset($_SESSION['userid']))
			{
			?>
			<li class="nav-item">
              <a class="nav-link" href="Sign up.php">Sign Up</a>  
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Login.php">Login</a>  
            </li>
			<?php	
			}
			?>
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
      <div class="container">
        <div class="container">
			<div class="contact">
  <div class="contact-header">
  <br>
    <h1 style="color:#ffe4c4;">Contact us</h1>
	<hr>
  </div>
  <div class="contact-form">
  <form id="Contact-form" method="post">
  
    <h3>Username:</h3>
    <input type="text" name="username" placeholder="Username" required/><br>
	
    <h3>Email:</h3>
    <input type="Email" name="email" placeholder="Email" required/>
	
	<h3 style="color:	#black;">Message :</h3>
    <input type="text" name="message"   placeholder="Messages" required/><br>
    <br>
    <input type="submit" name="send"  value="sumbit" class="submit-button">
	
	
  </form>
  </div>
</div>

</body>
</html> 
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
              <h1>Subscribe on Electronic Gadget Store now!</h1>
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
