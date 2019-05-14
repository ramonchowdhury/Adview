<?php
	session_start();
	$message = "";
	if(isset($_POST['adminlogin'])){
		
		$username=$_POST['user'];
		$password=$_POST['password'];

		if($username  == "admin" && $password == "admin"){
			$_SESSION['ABFSFDSFDSF'] = "FKSFDKJLFSFSDF";
			header("Location: index.php");
		}
		else
		{
			$message = "Username and Password Wrong";
		}
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
	
</head>
<body>
	
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="login-form">
            	<?php 
            	if(!empty($message)){
					echo "<div class='alert alert-danger'><p>$message</p></div>";
				}
				?>		
				<form action="admin.php" method="POST">
					<div class="p15">
						<div class="form-group">
						   <label>Username:</label>
						   <input type="text" name="user" class="form-control">
						</div>
						<div class="form-group">
						   <label>Password:</label>
						   <input type="password" name="password" class="form-control">
						</div>
						<button type="submit" name="adminlogin" class="btn btn-default">Login</button>
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