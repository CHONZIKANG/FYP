<?php
ob_start();
include("dataconnection.php");
session_start(); 

if(!isset($_SESSION['adminid']))
	{
		header("Location:admin login.php");
	}
	
$admin_ID=$_SESSION['adminid'];


?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Category | Electronic Gadgets Online</title>
    
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	

    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	
	<link rel="stylesheet" href="css/Product.css">
	
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">


<link href="css/Update_Category_css.css" rel="stylesheet">
<?php
	if(isset($_GET['update']))
	{
		$id=$_GET['id'];
		echo $id;
		
		$category=mysqli_query($connect,"SELECT * FROM category WHERE category_id='$id'");
		
		$cat_row=mysqli_fetch_assoc($category);
		
		$product_list=mysqli_query($connect,"SELECT * FROM product");
	}



?>

<style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
}
</style>
	
</head>

<body class="bg03">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
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
                                    <a class="nav-link" href="dashboard.php">Dashboard
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

		<div style="background-color:#f4f4f4; padding:20px; margin:15px;">
			<form name="add_category" class="addcat_frm" method="post">
			<h3> Update Category </h3>
			<p>
			Type of category:
			<br>
			<br>
			<input type="text" name="category_name" size="50" maxlength="45" value=<?php echo $cat_row['category_name']; ?> required>
			</p>

			<p>
			Please select the product to be add in the category:
			<br>
			<br>
			<select name="add_product[]" size="10" multiple>
			<?php
			while($row=mysqli_fetch_assoc($product_list))
			{
			?>
			<option value=<?php  echo $row['product_id'];?> <?php if($row['product_category_id']==$id){?> selected <?php }?>><?php  echo $row['product_name'];?> </option>
			<?php
			}

			?>


			</select>
			</p>


			<br>
			<div id="button_row">
			<input type="submit" id="add_category" name="add_category" value="UPDATE">
			<input type="submit" id="cancel_btn" name="cancel_btn" value="CANCEL">
			</div>

			<?php

			if(isset($_POST["add_category"]))
			{
				if(empty($_POST['add_product']))
				{
					?>
					<script>
						alert("Please choose atleast one item for the category.");
					</script>
					<?php
				}
				else
				{

					mysqli_query($connect,"UPDATE product SET product_category_id= NULL WHERE product_category_id='$id'");
					
					$product=$_POST['add_product'];
					
					for($i=0; $i<count($product);$i++)
					{
						$success=mysqli_query($connect,"UPDATE product SET product_category_id='$id' WHERE product_id='$product[$i]'");
					}
					
					if($success)
					{
						header("refresh:0; url=Manage_Category.php" );
					}
				}
				
				
				
			}


			if(isset($_POST["cancel_btn"]))
			{
				header("Location: Manage_Category.php");
				
				
			}

			?>

			</form>

		</div>
		



    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>