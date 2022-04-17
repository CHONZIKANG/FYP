<!DOCTYPE html>   
<?php include("dataconnection.php");?>
<html>
<?php
	
	$error="";
	$valid=1;
	$success=0;
	
	if(isset($_POST["send"]))
	{
		$rating = $_POST["rating"];
		$Suggestions = $_POST["commentText"];
		
		if(empty($rating))
		{
			$error="Please enter this field.";
			$valid=0;		
		}
		else
		{
			$error="";
			$valid=1;			
		}
		
		echo $rating;
		
		if($valid==1)
		{
			$success=mysqli_query($connect,"INSERT INTO feedback (rating,Suggestions) VALUES ('$rating','$Suggestions')");
		}
		
		if($success)
		{
		?>
		
		<script>
		
			alert("We have received your feedback. Thank You!");

		</script>
		
		<?php
		header( "refresh:0; url=Main_Page.php" );
		}
	}
?>
<style>
.feedback-form input[type="submit"] {
  height:30px;
  width:100px;
  background:black;
  border:1px solid #f2f2f2;
  border-radius:20px;
  color: slategrey;
  text-transform:uppercase;
  font-family: 'Ubuntu', sans-serif;
  cursor:pointer;
}

</style>
<link rel="stylesheet" href="assets/css/feedback.css">

<div class="feedback">
  <div class="feedback-header">
    <h1>Feedback and comment</h1>
  </div>
  <div class="feedback-form">
  <form id="Feedback-form" method="post">

<div class="feedback-title">
	<label><h2>1. Please give a rating for what you think the user experience is  </h2></label>
</div>
  <div style="color:grey">
    <span style="float:left">
     <h2> POOR </h2>
    </span>
    <span style="float:right">
     <h2> BEST </h2>
    </span>
    
  </div>
<span class="scale-rating" >
  <label value="1">
  <input type="radio" name="rating" value="1">
  <label style="width:100%;"></label>
  </label>
  <label value="2">
  <input type="radio" name="rating" value="2">
  <label style="width:100%;"></label>
  </label>
  <label value="3">
  <input type="radio" name="rating" value="3">
  <label style="width:100%;"></label>
  </label>
  <label value="4">
  <input type="radio" name="rating" value="4">
  <label style="width:100%;"></label>
  </label>
  <label value="5">
  <input type="radio" name="rating" value="5">
  <label style="width:100%;"></label>
  </label>
  <label value="6">
  <input type="radio" name="rating" value="6">
  <label style="width:100%;"></label>
  </label>
  <label value="7">
  <input type="radio" name="rating" value="7">
  <label style="width:100%;"></label>
  </label>
  <label value="8">
  <input type="radio" name="rating" value="8">
  <label style="width:100%;"></label>
  </label>
  <label value="9">
  <input type="radio" name="rating" value="9">
  <label style="width:100%;"></label>
  </label>
  <label value="10">
  <input type="radio" name="rating" value="10">
  <label style="width:100%;"></label>
  </label>
</span>


<h2 style="color:black;">2. Any Other suggestions:</h2>
<textarea cols="75" name="commentText" rows="10" style="100%"></textarea><br>

<br>    
	<label>   
    <input type="submit" name="send" value="Review" class="submit-button"/>
    <br>
	<br></br>

</form>
</div>


