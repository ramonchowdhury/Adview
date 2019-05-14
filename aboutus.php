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
</head>
<body>
  <?php include("bin/header.php"); ?>


  <!--what we do section -->
      <section id="about-info" class="py-5 text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h3 class="display-4">What We Do</h3>
                <p class="lead pb-2 pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ex quaerat magnam obcaecati repellendus voluptatum quisquam architecto iure, aliquam labore.</p>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ex quaerat magnam obcaecati repellendus voluptatum quisquam architecto iure, aliquam labore.</p>
              </div>
              <div class="col-md-6 text-right">
                <img src="img/image4.jpeg" alt="doll" class="img-fluid rounded-circle">
              </div>
            </div>
          </div>
      </section>


   <!-- Footer -->
   <?php include("bin/footer.php"); ?>
  <!-- Footer -->



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
</body>
</html>
