<?php
include("dataconnection.php");

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
	
	<link rel="stylesheet" href="css/Product.css">
	
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">


<link href="css/Add_Category_css.css" rel="stylesheet">
<?php

	$errormsg="";
	
	$product_list=mysqli_query($connect,"SELECT * FROM product");
		



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
                                        <a class="dropdown-item" href="Member.html">Member's Account</a>
										<a class="dropdown-item" href="Staff.html">Staff's Account</a>
										<a class="dropdown-item" href="accounts.html">Update Staff's Account</a>
										<a class="dropdown-item" href="accounts.html">Update Member's Account</a>

                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Product/Category
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="Manage_Product.html">View Product</a>
                                        <a class="dropdown-item" href="Add_Product.html">Add Product</a>
										<a class="dropdown-item" href="Update_Product.html">Update Product</a>
										<a class="dropdown-item" href="Manage_Category.html">Category</a>
										

                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="Manage_Order.html">Order</a>
                                </li>
								
								<li class="nav-item">
                                    <a class="nav-link" href="Sales_Report.html">Sales Report</a>
                                </li>
								
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="login.html">
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
		
		<br>
		<div style="background-color:#f4f4f4; padding:20px; margin:15px;">
		<form name="add_category" class="addcat_frm" method="post">
		<h3> Add Category </h3>
		<p>
		*Type of category:
		<br>
		<br>
		<input type="text" name="category_name" size="50" maxlength="45" required>
		</p>

		<p>
		*Product list:
		</p>
		<span style="color:red; font-size:14px;"><?php	echo $errormsg ?></span> 
		<br>
		<select name="add_product[]" size="10" multiple>
		<?php
		while($prod_row=mysqli_fetch_assoc($product_list))
		{
		?>
		<option value=<?php  echo $prod_row['product_id'];?>><?php  echo $prod_row['product_name'];?> </option>
		<?php
		}

		?>


		</select>
		</p>


		<br>
		<div id="button_row">
		<input type="submit" id="add_category" name="add_category" value="ADD">
		<input type="reset" id="reset_btn" name="reset_btn" value="Clear"> 
		</div>



		</form>
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
				$category_name=$_POST["category_name"];
				$product=$_POST['add_product'];
				
				
				mysqli_query($connect,"INSERT INTO category (category_name) VALUES ('$category_name')");
				
				$categoryid=mysqli_insert_id($connect);
				
				if(empty($_POST['add_product']))
				{
					$errormsg="*Please select the product to be add in the category  ";
					
				}
				
				
				for($i=0; $i<count($product);$i++)
				{
					$success=mysqli_query($connect,"UPDATE product SET product_category_id='$categoryid' WHERE product_id='$product[$i]'");
				}
				
				//if($success)
				//{
				//	?>
				
					<script> alert("Category update sucessfully.");</script>
				<?php
				//}
			}
			
		}





		?>


		</div>
		



    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>