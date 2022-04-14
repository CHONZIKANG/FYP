<?php include("dataconnection.php");?>
<?php
	
	session_start();
	
	if(!isset($_SESSION['adminid']))
	{
		header("Location:admin login.php");
	}
	$admin_ID=$_SESSION['adminid'];

	$receive2=mysqli_query($connect,"SELECT * FROM feedback");
	$receive=mysqli_query($connect,"SELECT * FROM contact_us");
?>
<!DOCTYPE html>
<html lang="en">
<style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
}

.receive_contact {
  text-align:left;
  border-radius:10px;
  box-shadow:0px 0px 10px #000;
  height: 650px;
  width:750px;
  margin:0 auto;
  background:#fff;
  margin-top:20px;
}

.receive1 {
  background:#fff;
  text-align:left;
  box-shadow:0px 0px 1px #000;
  height: 200px;
  width:250px;
  margin:10 px;
  float:left;
}

.receive_feedback {
  text-align:left;
  border-radius:10px;
  box-shadow:0px 0px 10px #000;
  height: 650px;
  width:750px;
  margin:0 auto;
  background:#fff;
  margin-top:20px;
}

.receive2 {
  background:#fff;
  text-align:left;
  box-shadow:0px 0px 1px #000;
  height: 250px;
  width:250px;
  margin:10 px;
  float:left;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receiver</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	
	
	
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="Staff" class="bg03">
<div class="staff" id="home">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                         <h1 class="tm-site-title mb-0">Electronic Gadget Store's<br> Admin Dashboard</h1>
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
            <!-- row -->
            <div class="receive_contact">
  <div class="receive-header">
    <h2>All Receive for Contact Us</h2>   

  </div>
  
  <?php
  while($row=mysqli_fetch_assoc($receive))
  {
	   
  ?>
  <div ol class="receive1">
	<h5>&ensp;Name :</h5>
	<h6>&ensp;<?php echo $row["username"]; ?></h6>
    <h5>&ensp;Email :</h5>
	<h6>&ensp;<?php echo $row["email"]; ?></h6>
	<h5>&ensp;Message :</h5>
	<h6>&ensp;<?php echo $row["message"]; ?></h6>
	<br>
  </div>
 
	<?php
  }
	?>
	</div>
	<br>
	<div class="receive_feedback">
	  <div class="receive-header">
    <h2>All Receive for Feeback and comments</h2>   

  </div>
	<?php
	
  while($row=mysqli_fetch_assoc($receive2))
  {
	   
  ?>
  <div ol class="receive1">
	<div ol class="receive2">
	<h5>&ensp;Rating :</h5>
	<h6>&ensp;<?php echo $row["rating"]; ?></h6>
    <h5>&ensp;Suggestions :</h5>
	<h6>&ensp;<?php echo $row["Suggestions"]; ?></h6>
	<br>
  </div>
  </div>
 
	<?php
  }
	?>
	
  </div>
  <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light" >
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Receive
                </p>
            </div>
        </footer>
 </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>
</html>