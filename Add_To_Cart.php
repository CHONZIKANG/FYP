<!---hi--->


<?php

include("dataconnection.php");
?>
<!DOCTYPE html>
<html>
<head><title> Shopping Cart</title>
<link rel="stylesheet" href="CSS/Add_To_Cart_css.css">

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

<?php 
session_start();

$u_id=$_SESSION['userid'];

	$atc_list=mysqli_query($connect,"SELECT * FROM add_to_cart WHERE user_id='$u_id' AND isDelete=0");

	$count=mysqli_num_rows($atc_list);

	$selected_count=0;
	
	$finaltotal=0;
	
	//$add_prodid=array();
?>





</head>
<body style="background-color:#f4f4f4;">
<div class="addtocart">
<form name="addtocart" method="post" id="form">
<h1> Shopping Cart</h1>

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
		//echo $atc_row['product_id'];  0,4
		$prod_id=$atc_row['product_id'];
		
		$product_list=mysqli_query($connect,"SELECT * FROM product WHERE product_id='$prod_id'");
		
		while($prod_row=mysqli_fetch_assoc($product_list))
		{
			$product_picture="image/".$prod_row['product_pic'];
			
			

?>

<div class="container">
	<div id="box">
		<div id="section">

			
			
			<div style="padding: 0px 20px;">
				<p>
					<img src=<?php echo $product_picture;?> width="80px" height="80px";>
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
					<span><input type="number" id="item_qty" name="item_quantity" min="1" max="<?php echo $prod_row['product_stock']; ?>" value="<?php  echo $atc_row['product_qty']; ?>" disabled> </span>
				
				</p>
			</div>
			
			<div style="padding: 0px 20px;">
				<p>
					<span><p><?php  $total=$prod_row['product_price']*$atc_row['product_qty'];	echo "RM ".number_format($total,2,'.','');?></p> </span>
				
				</p>
			</div>
			
			<div style="padding: 0px 20px;">
				<p>
					<span><a style="color:red; text-decoration: none;" href="Add_To_Cart.php?delete&id=<?php echo $atc_row['add_to_cart_id']?>">Delete</a> </span>
							
				
				</p>
			</div>
			
		</div>
		
		

	</div>

</div>


<?php
			$finaltotal+=$total;
			
		
		}
		
		//array_push($add_prodid,$prod_id);
	}
	
	

?>



	




<div style="display: flex; padding: 20px 10px; margin-left:60%">
	<div style="padding: 0px 20px;">
		<p id="total">Total (<?php echo $count ?> item): RM <?php echo number_format($finaltotal,2,'.',''); ?></p>  
	</div>

	
	<div >
		<a href="payment.php?checkout&finaltotal=<?php  echo $finaltotal?>" id="checkout_btn">Checkout</a>
	</div>

</div>

<?php
		
}
?>


</form>
</div>
</body>


</html>
<?php
	

	if(isset($_GET["delete"]))
	{
		$delete_cart_id=$_GET["id"];
		echo $delete_cart_id;
		
		mysqli_query($connect,"UPDATE add_to_cart SET isDelete=1 WHERE add_to_cart_id='$delete_cart_id'");
		header("refresh:0; url=Add_To_Cart.php");
	}
		
		
?>