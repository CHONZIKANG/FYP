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
<?php

$customer_acc_list=mysqli_query($connect, "SELECT * FROM account");

$count=mysqli_num_rows($customer_acc_list);
$i=0;

?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Members | Electronic Gadgets Online</title>
    
	
  
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	

    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	
	

<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

<link href="css/Manage_Members_css.css" rel="stylesheet">

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
		
		<div style="background-color:#f4f4f4; padding:20px; margin: 15px;">

		<div class="memberstable">
		<h3>Members</h3>
		<?php
		if($count)
		{

		?>
		<table>


		<tr>
			<th>No.</th>
			<th>ID</th>
			<th>Name</th>
			<th>Contact Number </th>
			<th>Email Address </th>
			<th>Action </th>

		</tr>

		<?php

			while($row=mysqli_fetch_assoc($customer_acc_list))
			{
			?>
			<tr>
				<td><?php echo $i+1 ?></td>
				<td><?php echo $row["user_id"];?> </td>
				<td><?php echo $row["user_name"];?> </td>
				<td><?php echo $row["user_phone"];?> </td>
				<td><?php echo $row["email"];?> </td>
				<td><a href="Manage_Members.php?delete&account_id=<?php echo $row["user_id"];?>"> Delete</a> <br>
				<br> <a href="Update_Member.php?update&account_id=<?php echo $row["user_id"];?>">Update</a> </td>

			</tr>
			<?php
				$i++;
			}

		?>



		</table>



		<div style="text-align:right; margin: 31px 0px 0px 0px;">
		<a href="Add_Member.php" id="add_btn">Add Member</a>
		</div>

		<?php
		}
		else
		{
			?>
			<p style="font-size:25px; color:grey; text-align:center;"> No records found </p>

			<?php	
		}
		?>

		</div>



		</div>
		



    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>
<?php
if(isset($_GET["delete"]))
{
	
	
	$user_account_id=$_GET["account_id"];
		
	mysqli_query($connect, "DELETE FROM account WHERE user_id='$user_account_id'");
		
	header("refresh:0; url=Manage_Members.php");
	
}


?>
</html>