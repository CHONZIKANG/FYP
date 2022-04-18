<?php
include("dataconnection.php");
$total=0;
session_start();

$user_id=$_SESSION['userid'];


if(isset($_GET["checkout"]))
	{
		$grandtotal=$_GET['total'];
		$total=$grandtotal;
		
	}
	
if(isset($_GET["submitbtn"]))
{
	$Yourname=$_GET["name_on_card"];
	$email=$_GET["email"];
	$address=$_GET["address"];
	$city=$_GET["city"];
	$card_type=$_GET["Type"];
	$Cardnumber=$_GET["cardnumber"];
	$Years=$_GET["expyear"];
	$Month=$_GET["expmonth"];
	$Cvv=$_GET["cvv"];
	$date=date("Y-m-d");

   $cart_query = mysqli_query($connect, "SELECT * FROM `cart` WHERE user_id='$user_id'");
   $price_total = 0;
   $x=0;
   if(mysqli_num_rows($cart_query) > 0)
   { 
      while($product_item = mysqli_fetch_assoc($cart_query)) 
	  {
		  $id=$product_item['product_id'];
		  $product_list=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$id'");
		  
		  $product_row=mysqli_fetch_assoc($product_list);
		  $product_name = $product_row['product_name'];
		  $product_price = $product_row['product_price'];
		  $product_quantity = $product_item['cart_quantity'];
		  $grand_total=$product_price * $product_quantity; 
		  $product_image=$product_row['product_image'];
		  
		  $success=mysqli_query($connect,"INSERT INTO transaction(name_on_card,email,address,city,card_type,card_number,user_cvv,card_month,card_year,user_id,product_name,product_price,product_image)VALUES('$Yourname','$email','$address','$city','$card_type','$Cardnumber','$Cvv','$Month','$Years', '$user_id','$product_name','$product_price','$product_image')");

		  
		  $balance =  $product_row["product_qty"] - $product_quantity; 
			
		if($balance>=0)
		{
			mysqli_query($connect,"UPDATE product SET product_qty='$balance' WHERE product_id='$id' ");// update product table
		}
		  $success=mysqli_query($connect,"INSERT INTO order_list(order_product_name,order_payment_method,order_Total,order_image,order_unit_price,order_Customer, order_Date,order_quantity,customer_id)
															VALUES('$product_name','$card_type','$grand_total','$product_image','$product_price','$address', '$date','$product_quantity','$user_id')");
											
											
			header("location:feedback.php");
		 
      }

	
	
   }

    $error="";
	$valid=1;
	if(empty($Yourname))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if(empty($email))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if(empty($address))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if(empty($city))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	if(empty($card_type))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
		if(empty($Cardnumber))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
		if(empty($Years))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
		if(empty($Month))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
		if(empty($Cvv))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
	//if($valid==1)
	//	{
	//		$success=mysqli_query($connect,"INSERT INTO transaction(name_on_card,email,address,city,card_type,card_number,user_cvv,card_month,card_year)
	//						VALUES('$Yourname','$email','$address','$city','$card_type','$Cardnumber','$Cvv','$Month','$Years')");
	//	}
		
		if($success)
		{
			
		?>

		<script>
		
			alert("You Have Succesfully Make Full Payment.Thank You!");

		</script>
		
		<?php
		
		header("refresh:0; url=Payment type.php"); 
		}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Electronice Gadgets Store | Free shipping across Malaysia</title>

</script>
<link rel="stylesheet" href="assets/css/payment_CSS1.css">
</head>
<?php
	if(isset($_GET["view_product"]))
	{
		$product_id=$_GET["id"];
		$single_product=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$product_id'" );
		$row=mysqli_fetch_assoc($single_product);
		$product_list=mysqli_query($connect ,"SELECT * FROM product WHERE product_isDelete=0");
		
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
	  
	  $select_cart = mysqli_query($connect, "SELECT * FROM `cart` WHERE user_id='$user_id'");
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


<p> Name On Card:
<input type="text" id="fname" name="name_on_card" placeholder="Name on card"required></p>
<p>Email:
<input type="email" id="email" name="email" placeholder="Your Email" required></p>
<p>Address:
<input type="text" id="adr" name="address" placeholder="Your Address"required></p>
<p>City:
<input type="text" id="city" name="city" placeholder="City" required></p>
Card Type :
<p>
<input type="radio" name="Type" value="Mastercard"><img src="assets/images/payment/Master card smaller size.jpg"width="50px" height="25px"title="Mastercard" Alt= "Masrter card" >
<input type="radio" name="Type" value="Visa"><img src="assets/images/payment/Visa smaller size.jpg"width="50px" height="25pxtitle="Visa" Alt= "Visa" >
</p>
<p>

<p>
Credit card number:
<input type="text" id="ccnum" name="cardnumber" placeholder="####-####-####-####"  type="tel"
                pattern="^\d{4}-\d{4}-\d{4}-\d{4}$" required></p>

<p>
Exp Month:
<input type="text" id="expmonth" name="expmonth" placeholder="Month" maxlength="2" required></p>
  
<p>  
Exp Year:
<input type="text" id="expyear" name="expyear" placeholder="Year" maxlength="2" required></p>

<p>
CVV:
<input id="cvv" name="cvv" placeholder="Behind card of code" maxlength="3" type="text" pattern="[0-9]{3}" title="3 numeric characters only"required></p>

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