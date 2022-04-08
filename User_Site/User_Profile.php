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

	<link rel="stylesheet" href="assets/css/User_Profile.css">
	
	<?php
	include("dataconnection.php");

	session_start();
	
	if(!isset($_SESSION['userid']))
	{
		header("Location:Login.php");
	}
	
	$u_id=$_SESSION['userid'];

	$info=mysqli_query($connect, "SELECT * FROM account WHERE user_id='$u_id'");

	$row = mysqli_fetch_assoc($info);

	$gender=$row['user_gender'];

	$complete=0;

	$error_name="";

	$error_email="";

	$error_phone="";

	$name_valid=1;
	$email_valid=1;
	$user_phone_valid=1; 


	if(isset($_GET['save']))
	{
		
		$updated_name = $_GET["updated_name"];
		$updated_email = $_GET["updated_email"];
		$updated_phone_no = $_GET["phone_no"];
		$updated_gender = $_GET["updated_gender"];
		$updated_birthday = date('Y-m-d', strtotime($_GET["updated_birthday"]));
		
		

		if($row["user_name"] && empty($updated_name))
		{
			$error_name="Please fill up your name";
			$name_valid=0;
		}
		else
		{
			$name_valid=1;
			$error_name="";
		}
		
		if($row["email"] && empty($updated_email))
		{
			$error_email="Please fill up your email address";
			$email_valid=0;
		}
		else
		{
			$email_valid=1;
			$error_email="";
		}
		
		if($row["user_phone"] && empty($updated_phone_no))
		{
			$error_phone="Please fill up your phone number";
			$user_phone_valid=0;
		}
		else
		{
			$user_phone_valid=1;
			$error_phone="";
		}
		
		
		if($name_valid==1 && $email_valid==1 && $user_phone_valid==1)
		{
			$complete=mysqli_query($connect,"UPDATE account SET user_name='$updated_name', email='$updated_email', user_phone='$updated_phone_no', user_gender='$updated_gender', D_O_Birth='$updated_birthday' WHERE user_id='$u_id'");
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
              <a class="nav-link" href="products.php">Products
                <span class="sr-only">(current)</span>
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
      
			<div style="background-color:#f4f4f4; padding:25px 0px;" class="u_profile">

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
			<h3>My Profile</h3>
			</div>

			<form name="edit_profile" id="form" method="get">
			<p>
			Username
			<br>	
			<input type="text" name="updated_name" size="50" maxlength="100" <?php if($name_valid==1 && $row['user_name'])
																				{?>value="<?php echo $row['user_name']; }?>">

			<span id="error" style="color:red; font-size:14px;"><?php echo $error_name; ?> </span>																
			</p>

			<p>
			Email address
			<br>	
			<input type="email" name="updated_email" size="50" maxlength="50" <?php if($email_valid==1 && $row["email"])
																				{?>value="<?php echo $row["email"]; }?>">

			<span id="error" style="color:red; font-size:14px;"><?php echo $error_email; ?> </span>
			</p>


			<p>
			Phone Number
			<br> 
			<input type="tel" name="phone_no" id="p_number" pattern="[0]{1}[1]{1}[0-9]{1}-[0-9]{3}[0-9]{4}" <?php if($user_phone_valid==1 && $row["user_phone"])
																													{
																													?> value= <?php echo $row["user_phone"]; }?> >
			<span id="error" style="color:red; font-size:14px;"><?php echo $error_phone; ?> </span>
			</p>



			<p>
			Gender
			<br>
			<input type="radio" name="updated_gender" value="Male" <?php  if($gender=="Male")
																			echo "checked"; ?> >Male
			<input type="radio" name="updated_gender" value="Female" <?php  if($gender=="Female")
																			echo "checked"; ?> >Female
																
			</p>

			<p>
			Date of Birth
			<br>
			<input type="date" name="updated_birthday" <?php if($row["D_O_Birth"])
														{?>value="<?php echo $row["D_O_Birth"]; }?>">
			</p>
						
			<br>
			<input type="submit" name="save" id="save_btn" value="Save">



			</div>

			</form>

			</div>

			<?php 
				
			if($complete)
			{
				
				header( "refresh:0; url=User_Profile.php" );
			}

			?>

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
