<?php
include("dataconnection.php");
$total=0;
if(isset($_GET["submitbtn"]))
{
	$Yourname=$_GET["firstname"];
	$email=$_GET["email"];
	$address=$_GET["address"];
	$city=$_GET["city"];
	$card_type=$_GET["Type"];
	$Cardnumber=$_GET["cardnumber"];
	$Years=$_GET["expyear"];
	$Month=$_GET["expmonth"];
	$Cvv=$_GET["cvv"];
	
	
	mysqli_query($connect,"INSERT INTO transaction(your_name,email,address,city,card_type,card_number,user_cvv,card_month,card_year)
	VALUES('$Yourname','$email','$address','$city','$card_type','$Cardnumber','$Cvv','$Month','$Years')");
	$cart_query = mysqli_query($connect, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['product_name'] .' ('. $product_item['product_quantity'] .') ';
         $product_price = number_format($product_item['product_price'] * $product_item['product_quantity']);
         $price_total += $product_price;
      };
   };
   header( "refresh:0; url=Payment type.php" );
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Electronice Gadgets Store | Free shipping across Malaysia</title>
<link rel="stylesheet" href="assets/css/payment_CSS.css">
</head>
<?php
	if(isset($_GET["view_product"]))
	{
		$product_id=$_GET["id"];
		$single_product=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$product_id'" );
		$row=mysqli_fetch_assoc($single_product);
		$product_list=mysqli_query($connect ,"SELECT * FROM product WHERE product_isDelete=0");
		
	}
	
	if(isset($_GET["checkout"]))
	{
		$grandtotal=$_GET['total'];
		$total=$grandtotal;
		
	}

?>
<body bgcolor="#fbf9f1">
<fieldset>
<h1><b>Secure Payment Page</b></h1>
<p>Please key in your card details to complete your purchase. All fields are mandatory and must be complete before your payment can be 
processed. All information exchange is secured.</p>
</fieldset>
<h2> Payment </h2>
<div class="display-order">
	 
	  <?php
	  $select_cart = mysqli_query($connect, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart))
			{
				$productid=$fetch_cart['product_id'];
				$selected_product=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$productid'");
				//$product_row=mysqli_fetch_assoc($selected_product);
				while($product_row=mysqli_fetch_assoc($selected_product))
				{
					echo $product_row['product_name']; 
					echo "(x".$fetch_cart['cart_quantity'].")	";
				}
			
				
			}
		 }
	  ?>
	  
     <span class="grand-total"> Grand total : RM<?php echo number_format($total,2,'.',''); ?> </span>
   </div>
<div class="add_prod">
<form name="add_product_form" style="padding:10px" method="GET" action="">
<p>Please enter you card details:</p>


<p> Full Name:
<input type="text" id="fname" name="firstname" placeholder="Your Name"></p>
<p>Email:
<input type="text" id="email" name="email" placeholder="Your Email"></p>
<p>Address:
<input type="text" id="adr" name="address" placeholder="Your Address"></p>
<p>City:
<input type="text" id="city" name="city" placeholder="City"></p>
Card Type :
<p>
<input type="radio" name="Type" value="Mastercard"><img src="assets/images/payment/Master card smaller size.jpg"width="50px" height="25px"title="Mastercard" Alt= "Masrter card" >
<input type="radio" name="Type" value="Visa"><img src="assets/images/payment/Visa smaller size.jpg"width="50px" height="25pxtitle="Visa" Alt= "Visa" >
</p>
<p>

<p>
Credit card number:
<input type="text" id="ccnum" name="cardnumber" placeholder="####-####-####-####"></p>

<p>
Exp Month:
<input type="text" id="expmonth" name="expmonth" placeholder="Month"></p>
  
<p>  
Exp Year:
<input type="text" id="expyear" name="expyear" placeholder="Year"></p>

<p>
CVV:
<input type="text" id="cvv" name="cvv" placeholder="Behind card of code"></p>

<input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
</div>

<br>
<br>
<div style="width:150px; margin:auto;">

<input type="submit" name="submitbtn" value="Continue to checkout" class="btn" >
</div>
<br>
<br>
<br>
</form>
</body>
</html>