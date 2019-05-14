<?php
session_start();
require_once('dbconfig/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/navbar-fixed.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="shortcut icon" href="img/home.png">
  <link rel="stylesheet" href="css/style.css">
  <title>Adview</title>

  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>
   <?php 
   include("bin/header.php");
  ?>
  <!--Header-end-->

</br>
<!-- postyourads -->
      <?php 
        if(isset($_SESSION['postSucessfully'])){
          echo "<h3 class='text-center mt-5'>Post Added Successfully</h3>";
          unset($_SESSION['postSucessfully']);
        }
      ?>
<div class="break"></div>
	<div class="limiter">
		<div class="breaker container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/recent_works.png" alt="IMG">
					<span class="login100-form-title">
						Post an Ad
					</span>
				</div>
				<div class="login100-form validate-form">
					<span class="login100-form-title">
						Select Category
					</span>


						<div class="container-login100-form-btn">

							<a href="adtolet.php" class="login100-form-btn" role="button">
								To-Let
							</a>
					</div>

					<div class="container-login100-form-btn">

							<a href="adhometutor.php" class="login100-form-btn" role="button">
								Home Tutor
							</a>
					</div>

					<div class="container-login100-form-btn">
						<a href="adothers.php" class="login100-form-btn" role="button">
								Others
							</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

</br>
   <!-- Footer -->
<?php include("bin/footer.php"); ?>
  <!-- Footer

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/bootstrap-validate.js"></script>
  <script>
  bootstrapValidate('#email', 'email:Enter a valid email address!')
  bootstrapValidate('#name', 'min:4:Please enter at least 4 characters!')
  bootstrapValidate('#message', 'required:Please fill out this field!')
  </script>
