<?php
include("dataconnection.php");


session_start(); 

if(!isset($_SESSION['adminid']))
	{
		header("Location:admin login.php");
	}
	
$admin_ID=$_SESSION['adminid'];

if(isset($_GET["id"]))
{
	$product_list=$_GET["id"];
	$result=mysqli_query($connect,"SELECT * from product WHERE product_id='$product_list'");
	$row=mysqli_fetch_assoc($result);
}
if(isset($_Post["update_button"]))
{
	$Uproduct_name=$_POST["Uproduct_name"];
	$Uproduct_Brand=$_POST["Uproduct_Brand"];
	$Uproduct_price=$_POST["Uproduct_price"];
	$Uproduct_quantity=$_POST["Uproduct_quantity"];
	mysqli_query($connect,"UPDATE product SET  
	product_name='$Uproduct_name',
	product_brand='$Uproduct_Brand',
	product_price='$Uproduct_price',
	product_qty='$Uproduct_quantity'");
	
	
}
header("refresh:0; location:Update Product.php");
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update_Product | Electronic Gadget Store</title>
    
	

	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	
	<link rel="stylesheet" href="css/Update.css">

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
										<a class="dropdown-item" href="Update Product.php">Update Product</a>
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
	
		<br>
		<br>
		
		<div class="update">
		
<form name="add_product_form" method="POST">
<div class="updt_box">
<div id="title">
<h2> Update Product detail </h2>
</div>
<hr>
<p>
Update Product Name:<br>
<input type="text" name="Uproduct_name"  size="50" maxlength="45"value="<?php echo $row["product_name"];?>"required  >
</p>
<p>
Update Product Brand:<br>
<input type="text" name="Uproduct_Brand" size="50" maxlength="45" value="<?php echo $row["product_brand"];?>"required >
</p>
<p>
<p>
Update Product Price:<br>
<input type="text" name="Uproduct_price" size="50" maxlength="45"value="<?php echo $row["product_price"];?>"required >
</p>

<p>
Update Quantity<br>
<input type="number" name="Uproduct_quantity" value="<?php echo $row["product_quantity"];?>" min="1" max="<?php echo $row["product_quantity"];?>">
</p>

</div>
<br>
<br>
<div style="width:500px; margin:auto;">
<div id="btn_update"><input type="submit" name="update_button" value="Update Order"></div>
</div>

</form>
</div>


			<br>
			<br>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>