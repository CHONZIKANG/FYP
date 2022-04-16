<!DOCTYPE html> 
<?php include("dataconnection.php");?>
<html>
<?php
	session_start(); 

if(!isset($_SESSION['adminid']))
	{
		header("Location:admin login.php");
	}
	
$admin_ID=$_SESSION['adminid'];
	$error="";
	$valid=1;
	$success=0;
	
	if(isset($_POST["send"]))
	{
		$name = $_POST["name"];
		$Category=$_POST["Category"];
		$brand = $_POST["brand"];
		$price = $_POST["price"];
		$des = $_POST["des"];
		$qty = $_POST["qty"];
		
		$filename = $_FILES["myfile"]["name"];
		$tempname = $_FILES["myfile"]["tmp_name"];    
        $folder = '../User_Site/assets/images/'.$filename;
		
		if(empty($name))
		{
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
		
		echo $name;
		
		if(empty($brand))
		{
			$valid=0;
			
		}
		else
		{
			$error="";
			$valid=1;			
		}
		
		echo $brand;
		
		if(empty($price))
		{
			$valid=0;
			
		}
		else
		{
			$error="";
			$valid=1;			
		}
		
		echo $price;
		
		if(empty($des))
		{
			$valid=0;
			
		}
		else
		{
			$error="";
			$valid=1;			
		}
		
		echo $des;
		
		if(empty($qty))
		{
			$valid=0;
			
		}
		else
		{
			$error="";
			$valid=1;			
		}
		
		echo $qty;
		
		if($valid==1)
		{
			
			$success=mysqli_query($connect,"INSERT INTO product (product_name,product_brand,product_price,product_description,product_qty,product_image) VALUES ('$name','$brand','$price','$des','$qty','$filename')");
			
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
		
			alert("You product have been recorded.");

		</script>

		<?php
				header("refresh:0; url='Manage Product list.php'");
		}
	}
	
?>

<link rel="stylesheet" href="Add_product1.css">

<div class="add">
  <div class="add-header">
  <form id="add-form"  method="POST" action="" enctype="multipart/form-data">
    <h1>ADD PRODUCT</h1>
	<br>
  </div>
  <div class="add-form">
	<img src="username.PNG" width="160" height="160" align="center">
	<input type="file" id="myfile" name="myfile" value="">
	<hr>
  
	<div class="product">
<br>
    <h3>Product Name:</h3>
    <input type="text" name="name" placeholder="Enter the product name" required/><br>
	
	<h3>Product Brand:</h3>
    <input type="text" name="brand" placeholder="Enter the product brand" required/><br>
	
	<h3>Product Price:</h3>
    <input type="text" name="price" placeholder="Enter the product price" required/><br>

	<h3>Product Description:</h3>
    <input type="text" name="des" placeholder="Enter the product description" style="height:120px;" required/><br>
	
	<h3>Product Quantity:</h3>
    <input type="text" name="qty" placeholder="Enter the product quantity" required/><br>

<br>    
	<label>   
    <input type="submit" name="send" value="Save" class="save-button" >
<br>

</div>
	
</div>
</form>
</div>
</body>
</html> 