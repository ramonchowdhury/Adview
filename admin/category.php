<?php 
	session_start();
	include("bin/header.php");
	require_once('dbconfig/config.php');
	if(!isset($_SESSION['ABFSFDSFDSF']) || empty($_SESSION['ABFSFDSFDSF'])){
		header("Location: admin.php");
	}	
?>

<?php
	$flag = 0; 
	if(isset($_POST['addcategory'])){

		$category = $_POST['category_'];
		$query = "INSERT INTO `category` (`id`, `c_titile`) VALUES (NULL, '$category')";
		$query_run = mysqli_query($con,$query);

		if($query_run){
			$flag = 1;
		}
	}
?>

<div class="container">
    <div class="row">
            <div class="login-form">	
            	<?php 
				 	if($flag==1){
				 		echo "<div class='alert alert-success'><h6>Category Added Successfully</h6></div>";
				 	}
				?>          	
				<form action="category.php" method="POST">
					<div class="p15">
						<div class="form-group">
						   <label>Title:</label>
						   <input type="text" name="category_" class="form-control" required>
						</div>
						<button type="submit" name="addcategory" class="btn btn-default">Save</button>
					</div>
				</form>
            </div>  
        </div>
    </div>
</div>			
		
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>