<?php
ob_start();
include("dataconnection.php");
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
	
	
	<link rel="stylesheet" href="assets/css/Add_To_Cart_css.css">
	
	<?php 
session_start();

$u_id=$_SESSION['userid'];


	$atc_list=mysqli_query($connect,"SELECT * FROM cart WHERE user_id='$u_id'");//

	$count=mysqli_num_rows($atc_list);//

	$selected_count=0;//
	
	$finaltotal=0;//
	
	$x=0;
	
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
      <div style="background-color:#f4f4f4; padding:20px;">
		<div class="addtocart">
		<form name="addtocart" method="post" id="form">
		<span style="font-size:30px;"> Shopping Cart</span>

		<?php
		if($count<1)
		{
			?>
			<span style="text-align:center; padding:60px; font-size:20px; color:grey"><?php echo "Cart is empty.";?></span>
			<?php
		}
		else
		{
		?>


		<div style="display: flex; justify-content: center;">


			
			
			<div style="padding: 27px 20px;  width: 480px;">
				<p>
					Product
				</p>
			</div>
			
			<div style="padding: 27px 20px;">
				<p>
					Unit Price
				</p>
			</div>
			
			<div style="padding: 27px 10px;">
				<p>
					Quantity
				</p>
			</div>
			
			<div style="padding: 27px 20px;">
				<p>
					Total Price
				</p>
			</div>
			
			<div style="padding: 27px 20px;">
				<p>
					Action
				</p>
			</div>
			
			
		</div>



		<?php
			while($atc_row=mysqli_fetch_assoc($atc_list))
			{
				$prod_id=$atc_row['product_id'];
				
				$product_list=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$prod_id'");
				
				while($prod_row=mysqli_fetch_assoc($product_list))
				{					
					$product_picture="assets/images/".$prod_row['product_image'];
					//$product_picture="assets/images/".$prod_row['product_image'];
					
					

		?>

		<div class="container1">
			<div id="box">
				<div id="section">

					
					
					<div style="padding: 0px 20px;">
						<p>
							<img src="<?php echo $product_picture;?>" width="80px" height="80px";>
						</p>
					</div>
					
					<div style="padding: 0px 20px; width: 350px; height: 62px; overflow: hidden">
						<p>
							<span id="title"><p><?php  echo $prod_row['product_name']; ?></p>
						</p>
					</div>
					
					<div style="padding: 0px 20px;">	
						<p>
							<span><p><?php  echo "RM ".$prod_row['product_price']; ?></p></span>
						
						</p>
					</div>
					
					<div style="padding: 0px 10px;">	
						<p>									
							<span><input type="number" name="item_quantity[]" min="1" max="<?php echo $prod_row['product_qty']; ?>" value="<?php  echo $atc_row['cart_quantity']; ?>" onchange="updatetotal(this.value,id=<?php echo $atc_row['cart_id'];?>,price=<?php echo $prod_row['product_price'];?>),display_total()" > </span>
							<input type="hidden" id="proid" name="proid[]" value=<?php echo $atc_row['cart_id']; ?>>
						</p>
					</div>
					
					<div style="padding: 0px 20px;">
						<p>
							<span><p id="ID<?php echo $atc_row['cart_id'];?>" ><?php  $total=$prod_row['product_price']*$atc_row['cart_quantity'];	echo "RM".number_format($total,2,'.','');?></p> </span>
							<input type="hidden" id="HID<?php echo $atc_row['cart_id'];?>" name="hide[]" value=<?php echo $total ?>>
						</p>
					</div>
					
					<div style="padding: 0px 20px;">
						<p>
							<span><a style="color:red; text-decoration: none;" href="Shopping_Cart.php?delete&id=<?php echo $atc_row['cart_id']?>">Delete</a> </span>
									
						
						</p>
					</div>
					
				</div>
				
				

			</div>

		</div>


		<?php
					$finaltotal+=$total;
					$x++;//dunno
				
				}
				
			}
			

		?>

		<script>
		function updatetotal(qty, id, price)
		{
			var total;
			
			
			total=price*qty;
			
			
			document.getElementById("ID"+id).innerHTML="RM "+total.toFixed(2);
			
			
			
			var hidden=document.getElementById("HID"+id);
			hidden.value=total;


		}
		
		function display_total()
		{
			var hide=document.getElementsByName('hide[]')
			
			var grandtotal=0;
			
			for(var i=0;i<hide.length;i++)
			{
				grandtotal += parseFloat(hide[i].value);

			}
			
			document.getElementById("total").innerHTML="Total ("+<?php echo $x; ?>+" item): RM "+grandtotal.toFixed(2);
		}

	
</script>





			




		<div style="display: flex; padding: 20px 10px; margin-left:60%">
			<div style="padding: 0px 20px;">
				<p id="total">Total (<?php echo $x; ?> item): RM <?php echo number_format($finaltotal,2,'.','') ?></p>  
			</div>

			
			<div >
				<input type="submit" id="checkout_btn" name="checkout_btn" value="Checkout"></input>
			</div>

		</div>

		<?php
				
		}
		?>


		</form>
		</div>
		</div>
    </div>
	
	<?php
	if(isset($_GET["delete"]))
	{
		$delete_cart_id=$_GET["id"];
		
		mysqli_query($connect,"DELETE FROM cart WHERE cart_id='$delete_cart_id'");
		header("refresh:0; url=Shopping_Cart.php"); 
	}
		
		
?>

<?php
if(isset($_POST['checkout_btn']))
{
	$grandtotal=0;
	$total=$_POST['hide'];
	$proid=$_POST['proid'];
	$qty=$_POST['item_quantity'];


	
	for($i=0; $i<count($total);$i++)
	{
		$grandtotal += $total[$i];
		$quantity = $qty[$i];
		$prodid=$proid[$i];
		
		
		mysqli_query($connect,"UPDATE cart SET cart_quantity='$quantity' WHERE cart_id='$prodid'");
	}

	header("Location:Payment type.php?checkout&total=$grandtotal");
	
	
}


?>

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

