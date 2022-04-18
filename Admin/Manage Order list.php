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
    <title>Manage Order | Electronic Gadget Store</title>
    
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
		
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	
	
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">

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
   $order_list=mysqli_query($connect ,"SELECT * FROM order_list");

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

<div style="background-color:white; border-radius:30px; padding:50px;margin:auto;">

<h2>View Order Detail</h2>
    <div class="outer-wrapper">
    <div class="table-wrapper">
    <table id="emp-table">
        <head>
            <th col-index = 1>No</th>
            <th col-index = 3>Customer ID
            </th>
			<th col-index = 4>Product Name
            </th>
			<th col-index = 5>Quantity
            </th>
            <th col-index = 6>Unit Price(RM)
            </th>
            <th col-index = 7>Payment Method
            </th>
			<th col-index = 8>Total (included shipping fee)
            </th>
			<th col-index = 9>Customer Address
            </th>
			<th col-index = 10>Order Date 
            </th>
			<th col-index = 11>Status 
            </th>
			<th col-index = 12>Shipping option 
            </th>
			<th col-index = 13>tracking  
            </th>
			<th col-index = 14>Edit
			</th>
			<th col-index = 15>Delete 
            </th>
            
        </head>
        <body>
		<?php
	
		while($row=mysqli_fetch_assoc($order_list))
		{
		?>
            <tr>
                <td><?php echo $row["order_id"];?></td>
				<td><?php echo $row["customer_id"];?></td>
                <td><?php echo $row["order_product_name"];?></td>
                <td><?php echo $row["order_quantity"];?></td>
                <td><?php echo $row["order_unit_price"];?></td>
				<td><?php echo $row["order_payment_method"];?></td>
                <td><?php echo $row["order_Total"];?></td>
				<td><?php echo $row["order_Customer"];?></td>
				<td><?php echo $row["order_Date"];?></td>
				<td><?php echo $row["order_Status"];?></td>
				<td><?php echo $row["order_Shipping"];?></td>
				<td><?php echo $row["order_tracking"];?></td>
				<td><a href="Update Order list.php?id=<?php echo $row ['order_id']?>">Edit</td>
				<td><a href="Manage Order list.php?delete&id=<?php echo $row ['order_id']?>" onclick="return confirmation()">Delete<td>
				
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
		mysqli_query($connect,"DELETE from order_list WHERE order_id='$id'");	
	?>
	<script>
	alert("Record deleted!");
	</script>
	<?php 
	header("refresh:0; url='Manage order list.php'");
	}
	mysqli_close($connect);
	?>
</div>
</div>


<div style="width:1000px; margin:auto;">
		</div>
		



    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>