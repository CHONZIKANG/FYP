<?php

include("dataconnection.php");
session_start();
   $product_list=mysqli_query($connect ,"SELECT * FROM product WHERE product_isDelete=0");
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


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

	
	
	
	<!--Font style from google-->
	<link href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Alex+Brush&family=Architects+Daughter&family=Birthstone&family=Birthstone+Bounce&family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Roboto&display=swap" rel="stylesheet">
<style>
.promote
{
	background-color: #102b4e;

	padding:50px;
}
	 
.promote iframe
{
	border: 3px solid #6bb9ff;
	margin-top: 20px;
} 
.promote .onlinegrocery
 {
	float: right;
	position: relative;
	bottom: 280px;
	margin-right: 100px;
 }
.promote .grocerydelivery
 {
	margin-left: 100px;
 }
.promote .quotes
{	
	text-align: center;
	font-family: 'Roboto', sans-serif;
	border: 10px;
	float: left;
}
.promote .container
{
	width: 730px;
	margin: 20px auto;
}
.promote .scroll
{
	 margin: auto;
	 width: 1200px;
	 height: 800px;
	 overflow-x: hidden;
	 overflow-y: auto;
	 border: 5px solid;
	 border-color: #6bb9ff;
	 text-align:justify;
	 background-image: url('image/background.jpg');
	 font-weight: bold;
	 box-shadow: 0 10px 10px 0 rgb(0 0 0 / 10%);
}
.promote h2
{
	border: 5px;
	background-color: #F4F6EC;
	color:#2a6049;
	box-shadow: 0 10px 10px 0 rgb(0 0 0 / 10%);

}

</style>

<script>
function alrt()
{
	alert("You need to Login or Register before continuing!")
}
</script>
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
            <li class="nav-item active">
             <a class="nav-link" href="Main_Page.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Product list.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About us.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contact us.php">Contact Us</a>
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
    <!-- Banner Starts Here -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="caption">
              <h2>Electronic Gadget Store</h2>
              <div class="line-dec"></div>
              <p>Electronic Gadget Store is the best online gadget shop in Malaysia. We will deliver <strong>everything you need</strong> and you will be satisfied with our services.
              <br><br>We provide the cable, power bank and more. <strong>You name it, we've got it !</p>
              <div class="main-button">
                <a href="#">Start order now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
	
	<!--Promote Starts Here-->
	<div class="promote">
	<div class="background">
	<div class="grocerydelivery">
	<p>
		<iframe width="500" height="255" src="https://www.youtube.com/embed/TfopZWqEM_o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</p>
	</div>

	<div class="onlinegrocery">
	<iframe width="500" height="255" src="https://www.youtube.com/embed/cNOKQIw81SE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	</div>

	<div class="scroll">
		<div style="background-image: url('image/background.jpg');">
			<div class="container">
				<div class="quotes">
					<h2>MORE CONVENIENT AND CONFORTABLE.</h2>
					<p>It's much more easier for you to sit at home, find what you like and have it delivered to your front door. </p>
					<img src="image/convenience.jpg" alt="Convenience" width="248px" height="203px">
					<p>Grab your gadget anywhere or anytime!</p>
					
					<h2>YOU GET TO AVOID PEOPLE.</h2>
					<img src="image/crowdppl.jpg" alt="Variety">
					<p>To avoid the crowd and the salespeople when shopping, 
					you can stay home and shop without having to wait in long lines and babies who won't stop crying.</p>

					<h2>BEST DEAL</h2>
					<p>Online shopping gives you cheaper deals and even discount codes that you can apply.</p>
					<img src="image/BestDeal.jpg" alt="Food quality" width="248px" height="203px">
					<p> You can select "low to high" and save tons of money if you know what you're doing.</p>

					<h2>YOU HAVE MORE OPTIONS ONLINE THAN IN STORE</h2>
					<p>Online shopping gives you a much better variety than in-store. </p>
					<img src="image/Reviewing.jpg" alt="Cashback" width="248px" height="203px">
					<p> Most of the things you find online might not be available in stores.</p>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	<!--Promote Ends Here-->

    <!-- Featured Starts Here -->
     <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>You May Also Like</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
			<?php
	
			while($row=mysqli_fetch_assoc($product_list))
			{
			?>
              <a href="Product.php?view_product&id=<?php echo $row["product_id"];?>">
                <div class="featured-item">
                <?php echo "<img style='width:100%; height:55%; float:left; margin-right:10px;' src='assets/images/".$row['product_image']."' >";  ?>
                  <h4><?php echo $row["product_name"]; ?></h4>
                  <h6>RM<?php echo $row["product_price"];?></h6>
                </div>
              </a>
			  <?php
			}
			?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Ends Here -->
	

    <!-- Subscribe Form Starts Here -->
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe on Electronic Gadget Store  now!</h1>
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
