<?php include("dataconnection.php");?>
<?php
	session_start();
	
	if(!isset($_SESSION['adminid']))
	{
		header("Location:admin login.php");
	}
	$admin_ID=$_SESSION['adminid'];
	
	$profile=mysqli_query($connect,"SELECT * FROM admin");
?>
<!DOCTYPE html>
<html lang="en">
<style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
}

.staff2 {
  background:#fff;
  text-align:left;
  border-radius:10px;
  box-shadow:0px 0px 10px #000;
  height: 700px;
  width:880px;
  margin:0 auto;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staffs</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	
	
	
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	<link rel="stylesheet" href="css/staff.css">
</head>

<body id="Staff" class="bg03">
<div class="staff" id="home">
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
            <!-- row -->
            <div class="staff2">
  <div class="staff-header">
    <h2>Staffs</h2>
	<label>   
    <a href="profile.php" value="Add New Staff" class="add" style="float:right" >Add New Staff</a>
  </div>
  
  <?php
  while($row=mysqli_fetch_assoc($profile))
  {
	   
  ?>
  <div ol class="staff1">
	<img src="<?php echo $profile_image="image/".$row['profile_image']; ?>" width="230" height="200">
	<h5>&ensp;Name :</h5>
	<h6>&ensp;<?php echo $row["Name"]; ?></h6>
	<br>
    <h5>&ensp;Phone :</h5>
	<h6>&ensp;<?php echo $row["Phone"]; ?></h6>
	<br>
	<h5>&ensp;IC Number :</h5>
	<h6>&ensp;<?php echo $row["IC_Number"]; ?></h6>
	<br>
	<h5>&ensp;Email :</h5>
	<h6>&ensp;<?php echo $row["Email"]; ?></h6>
  </div>
	<?php
  }
	?>
	
  </div>
  <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Staff Page
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