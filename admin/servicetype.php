<?php 
	session_start();
	include("bin/header.php");
	require_once('dbconfig/config.php');	
	if(!isset($_SESSION['ABFSFDSFDSF']) && empty($_SESSION['ABFSFDSFDSF'])){
		header("Location: admin.php");
	}

?>

<?php
	$flag = 0; 
	if(isset($_POST['addservicetype'])){

		$servicetype = $_POST['servicetype_'];
		$query = "INSERT INTO `servicetype` (`id`, `s_type`) VALUES (NULL, '$servicetype')";
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
				 		echo "<div class='alert alert-success'><h6>ServiceType Added Successfully</h6></div>";
				 	}
				?>          	
				<form action="servicetype.php" method="POST">
					<div class="p15">
						<div class="form-group">
						   <label>Service Type:</label>
						   <input type="text" name="servicetype_" class="form-control" required>
						</div>
						<button type="submit" name="addservicetype" class="btn btn-default">Save</button>
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