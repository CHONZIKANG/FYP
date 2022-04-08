<?php 
ob_start();
include("dataconnection.php");

?>
<!DOCTYPE html>
<html lang="en">
<style>
body {
	  
  background-image: url('img/dash-bg-03.jpg');
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	
	

    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
	
	
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="css/Manage_Category_css.css">

<?php 

$category_list=mysqli_query($connect,"SELECT * FROM category");

$count=mysqli_num_rows($category_list);

?>

<?php
if(isset($_POST['delete']))
{
	$checkbox=$_POST['category'];
	
	for($i=0; $i<count($checkbox);$i++)
	{
		$del_id = $checkbox[$i];
		mysqli_query($connect,"DELETE FROM category WHERE category_id='$del_id'");
	}
	
	header( "refresh:0; url=Manage_Category.php" );
}

?>
</head>

<body id="Members" class="bg03">
    <div class="member" id="home">
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
            <!-- row -->
            <br>
			<br>
			
				<div class="manage_category" style="background-color:#f4f4f4; padding: 30px;">
<form method="post" name="category">
<div id="container1">
	
	<h3>Category </h3>
	<div id="row">
	
	<?php  
	if($count<1)
	{
		echo "No category";
	}
	else
	{
	while($row=mysqli_fetch_assoc($category_list))
	{
		$cat_id=$row['category_id'];
		$prod_list=mysqli_query($connect,"SELECT *FROM product WHERE product_category_id='$cat_id'");
	?>
	<div id="sub_container">
	<input type="checkbox" id="category1" name="category[]" value="<?php echo $row['category_id']; ?>">
	<span id="title"><?php  echo $row['category_name']; ?></span>
		<ul>
			<?php
			
			
			while($prod_row=mysqli_fetch_assoc($prod_list))
			{
			?>
			<li><?php echo $prod_row['product_name']; ?></li>
			
			<?php
			}
			
			?>
		</ul>
	</div>
	<?php

	}
	
	?>

	

	


	
	
	</div>


<div style="margin:auto; display:flex; justify-content: space-between;">
	<input type="submit" id="add_category" style="background-color:#102b4e; border:none; color:white;" name="add" value="ADD"> 
	<input type="submit" id="update_category" style="background-color:white; color:black;" name="update" value="UPDATE">
	<input type="submit" id="del_category" style="background-color:red; border:none;color:white;" name="delete" value="DELETE">
	
</div>
	
<?php
	}

?>
	

</div>

</form>





</div>

				
             
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Members Page
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
<?php

if(isset($_POST["add"]))
{
	header("location: Add_Category.php");

}

if(isset($_POST["update"]))
{
	if(empty($_POST['category']))
	{
		?>
		<script>
		alert("Please choose a category for update.");
		</script>
		<?php
	}
	else
	{
		$ids=$_POST['category'];
		
		if(count($ids)>1)
		{
			?>
			<script>
			alert("Please choose only one category for update.");
			</script>
			<?php
			header( "refresh:0; url=Manage_Category.php" );
		}
		
		else
		{
			for($i=0; $i<count($ids);$i++)
			{
				header("Location: Update_Category.php?update&id=$ids[$i]");
				
			}
		
		}
	}


	


}


?>

</html>