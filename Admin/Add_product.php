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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category | Electronic Gadgets Online</title>
    
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	

    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">

	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	
    <link rel="stylesheet" href="css/Add_product1.css">
<style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
	}
.add-form
{
	background-color: #fff;
}
</style>
</head>
<body class="bg03">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="dashboard.php">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                         <h1 class="tm-site-title mb-0">Electronic Gadgets Online<br> Admin Dashboard</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="Manage_Members.php">Member's Account</a>
										<a class="dropdown-item" href="staff.php">Staff's Account</a>
										<a class="dropdown-item" href="profile.php">Update Staff's Account</a>

                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Product/Category
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="Manage Product list.php">View Product</a>
                                        <a class="dropdown-item" href="Add_Product.php">Add Product</a>
										<a class="dropdown-item" href="Manage_Category.php">Category</a>
										

                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="Manage Order list.php">Order</a>
                                </li>
								
								<li class="nav-item">
                                    <a class="nav-link" href="Sales Report.php">Sales Report</a>
                                </li>
								
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="Logout.php">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
		</div>
		
	
<div class="add">
 <br>
  <div class="add-form">
   <div class="add-header">
  <form id="add-form"  method="POST" action="" enctype="multipart/form-data">
  <br>
    <h1>ADD PRODUCT</h1>
	<hr>
  </div>
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>
</html> 