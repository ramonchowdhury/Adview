<?php
session_start();
require_once('dbconfig/config.php');
  if(isset( $_SESSION['usernameewxyn']) && !empty($_SESSION['usernameewxyn'])){
    header("Location: index.php");
  }

  if(isset($_POST['login'])){

    $username=$_POST['username'];
    $password=$_POST['password'];
    $query = "select * from user where username='$username' and password='$password' ";
    //echo $query;
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
      if(mysqli_num_rows($query_run)>0)
      {
        $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
        if($row['status'] == '0'){
          $_SESSION['usernameewxyn'] = $row['username'];
          $_SESSION['ewxynopqaname'] = $row['name'];
          header( "Location: index.php");

        }
        else{
          echo '<script type="text/javascript">alert("This Account is Banned")</script>';
        }
      }
    else
    {
      echo '<script type="text/javascript">alert("User not Found")</script>';
    }
    }
    else
    {
      echo '<script type="text/javascript">alert("Database Error")</script>';
    }
  }
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
<?php include("bin/header.php") ?>



<div class="container py-5">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h1 class="text-center">Member Login</h1>
      <hr class="bg-warning">
      <br>
      <?php
        if(isset($_SESSION['registrationMessage'])){
          echo "<h3>Successfully Registration Complete</h3>";
          unset($_SESSION['registrationMessage']);
        }
      ?>
      <div class="card card-body">

        <form action="login.php" method="post">
          <div class="form-group">
            <label>User Name</label>
            <input class="form-control form-control-lg" name="username" id="myusername" type="text">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control form-control-lg" name="password" id="mypassword">
          </div>
           <button name="login" class="btn btn-warning btn-lg btn-block">
              <h4>Login</h4>
            </button>


      </form>
    </div>
       </div>
  </div>
</div>



   <!-- Footer -->
<footer class="page-footer font-small indigo bg-dark text-light">

    <!-- Footer Links -->
    <div class="container">

      <!-- Grid row-->
      <div class="row text-center d-flex justify-content-center pt-5 mb-3">

        <!-- Grid column -->
        <div class="col-md-4 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="aboutus.php" class="nav-link text-light">About us</a>
          </h6>
        </div>
        <!-- Grid column -->
        <div class="col-md-4 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="termsandconditions.php" class="nav-link text-light">Terms and conditions</a>
          </h6>
        </div>
        <!-- Grid column -->
        <div class="col-md-4 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="contact.php" class="nav-link text-light">Be a member</a>
          </h6>
        </div>

      </div>
      <!-- Grid row-->
      <hr class="bg-primary" style="margin: 0 15%;">

      <!-- Grid row-->
      <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

        <!-- Grid column -->
        <div class="col-md-8 col-12 mt-5">
          <a href="index.php" class="nav-link text-light">
            <img src="img/home.png" alt="pic" class="img-fluid img-light" width="50" height="50">
             <h3 class="display-4">AdView</h3>
          </a>
        </div>
      </div>
      <!-- Grid row-->
        <hr class="bg-primary">

      <!-- Grid row-->

    </div>

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
      <p class="mb-0">Copyright &copy; 2018</p>
      <span> Designed By : Anik & Ramon</span>
      <br><br>
    </div>
    <!-- Copyright -->


  </footer>
  <!-- Footer -->



  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/bootstrap-validate.js"></script>
  <script>
    bootstrapValidate('#myemail', 'email:Enter a valid email address!')
    bootstrapValidate('#mypassword', 'matches:#myconfirmpassword:Your Password should match!')
    bootstrapValidate('#myusername', 'min:5:Please enter at least 5 characters!')
    bootstrapValidate('#email', 'email:Enter a valid email address!')
    bootstrapValidate('#name', 'min:4:Please enter at least 4 characters!')
    bootstrapValidate('#message', 'required:Please fill out this field!')

      </script>
</body>
</html>
