<?php
include("dataconnection.php");
ob_start();
session_start(); 

if(!isset($_SESSION['adminid']))
	{
		header("Location:admin login.php");
	}
	
$admin_ID=$_SESSION['adminid'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Product | Electronic Gadget Store</title>
    
	
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
	
	<link rel="stylesheet" href="css/view_product_list.css">
	<script>
function confirmation()
{
	var option;
	option=confirm("Do you want to delete the record");
	return option;
	
}
</script>

<style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
}

</style>
	
</head>
<?php
   $product_list=mysqli_query($connect ,"SELECT * FROM product");

?>
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

<div class="product">	
	<br>
	<br>
<form>	
<div style="background-color:white; border-radius:30px; padding:50px;">
<div style="margin:auto; ">

<h1>View Product List</h1>
    <div class="outer-wrapper">
    <div class="table-wrapper">
    <table id="emp-table">
        <head>
            <th col-index = 1>No</th>
            <th col-index = 2>Product Name
            </th>
			<th col-index = 4>Product Brand
            </th>
			<th col-index = 5>Product price
            </th>
			<th col-index = 6>Product stock
            </th>
			<th col-index = 7>Edit
            </th>
			<th col-index = 8>Delete
            </th>
         
        </head>
        <body>
		<?php
	
		while($row=mysqli_fetch_assoc($product_list))
		{
		?>
            <tr>
                <td><?php echo $row["product_id"];?></td>
                <td><?php echo $row["product_name"];?></td>
                <td><?php echo $row["product_brand"];?></td>
                <td>RM<?php echo $row["product_price"];?></td>
				<td><?php echo $row["product_qty"];?></td>
				<td><a href="Update product.php?id=<?php echo $row ['product_id']?>">Edit</td>
				<td><a href="Manage Product list.php?delete&id=<?php echo $row ['product_id']?>" onclick="return confirmation()">Delete<td>
				
            </tr>
		<?php
		}
		?>
        </body>
    </table>
	<?php 
	if(isset($_GET['delete']))
	{
		$id=$_GET['id'];
		mysqli_query($connect,"DELETE from product WHERE product_id='$id'");		
	?>
	<script>
	alert("Record deleted!");
	</script>
	<?php 
	header("refresh:0; url='Manage Product list.php'");
	}
	mysqli_close($connect);
	?>
</div>
<a href="Add_product.php">Add Product</a>
</div>

</div>
</div>

<br>
<br>

</form>
</div>
		
		



    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>