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
	$order=$_GET["id"];
	$result=mysqli_query($connect,"SELECT * from order_list WHERE order_id='$order'");
	$row=mysqli_fetch_assoc($result);
}
if(isset($_POST["update_button"]))
{
	$Uorder_id=$_POST["Uorder_id"];
	$Ucustomer_ID=$_POST["Ucustomer_ID"];
	$Uproduct_name=$_POST["Uproduct_name"];
	$Uproduct_stock=$_POST["Uproduct_stock"];
	$Uunit_price=$_POST["Uunit_price"];
	$Utotal=$_POST["Utotal"];
	$Ucustomer_address=$_POST["Ucustomer_address"];
	$Ustatus=$_POST["Ustatus"];
	$Utracking=$_POST["Utracking"];
	$Uorder_date=date('Y-m-d', strtotime($_POST["Uorder_date"]));
	$Payment_method=$_POST["Payment_method"];
	$Shipping_option=$_POST["Shipping_option"];
	

	$success=mysqli_query($connect,"UPDATE order_list SET 
	customer_id='$Ucustomer_ID',
	order_product_name='$Uproduct_name',
	order_quantity='$Uproduct_stock',
	order_unit_price=$Uunit_price,
	order_Total='$Utotal',
	order_Customer='$Ucustomer_address',
	order_Status='$Ustatus',
	order_tracking='$Utracking',
	order_Date='$Uorder_date',
	order_payment_method='$Payment_method',
	order_Shipping='$Shipping_option'
	WHERE order_id='$order'");
	
	if($success)
	{
		header("refresh:0; url=Manage Order list.php");
	}
}

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
	
		<br>
		<br>
		
		<div class="update">
		
<form name="add_product_form" method="POST">
<div class="updt_box">
<div id="title">
<h2> Update Order detail </h2>
</div>
<hr>
<p>
Customer ID:<br>
<input type="text" name="Uorder_id" value="<?php echo $row["order_id"];?>"required  >
</p>
<p>
Update Customer ID:<br>
<input type="text" name="Ucustomer_ID" size="50" maxlength="45" value="<?php echo $row["customer_id"];?>"required >
</p>
<p>
<p>
Update Product Name:<br>
<input type="text" name="Uproduct_name" size="50" maxlength="45"value="<?php echo $row["order_product_name"];?>"required >
</p>

<p>
Update Quantity<br>
<input type="number" name="Uproduct_stock" id="Uproduct_stock"  min="1" max="999" value="<?php echo $row["order_quantity"];?>"value="1"">
</p>
Update Unit Price:<br>
<input type="text" name="Uunit_price" size="50" maxlength="45" value="<?php echo $row["order_unit_price"];?>"required >
</p>

<p>
Update Total:<br>
<input type="text" name="Utotal" size="50" maxlength="45"value="<?php echo $row["order_Total"];?>"required >
</p>

<p>
Update Customer Address:<br>
<input type="text" name="Ucustomer_address" size="100" maxlength="100" value="<?php echo $row["order_Customer"];?>"required >
</p>



<p>
Update Status:<br>
<input type="text" name="Ustatus" size="50" maxlength="45" value="<?php echo $row["order_Status"];?>"required >
</p>

<p>
Update tracking:<br>
<input type="text" name="Utracking" size="50" maxlength="45" value="<?php echo $row["order_tracking"];?>"required >
</p>

<p>
Update Order date:<br>
<input type="date" name="Uorder_date" value="<?php echo $row["order_Date"];?>">
</p>

<p>
Update Payment Method:<br>
<input type="text" name="Payment_method" size="50" maxlength="45" value="<?php echo $row["order_payment_method"];?>"required >
</p>

<p>
Update Shipping:<br>
<input type="text" name="Shipping_option" size="50" maxlength="45" value="<?php echo $row["order_Shipping"];?>"required >
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