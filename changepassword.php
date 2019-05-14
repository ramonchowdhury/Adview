<?php
session_start();
require_once('dbconfig/config.php');

if(!isset($_SESSION['usernameewxyn']) || empty($_SESSION['usernameewxyn'])) {
   header( "Location: login.php");
}
  if(isset($_POST['resetpassword'])){
    
    $username = $_SESSION['usernameewxyn'];
    
    $password = $_POST['current-pass'];
    $newpassword = $_POST['new-pass'];
    
    $query = "select * from user where username = '$username' and password='$password' ";

    $query_run = mysqli_query($con,$query);
    
    if($query_run)
    {
      $query = "UPDATE user SET password='$newpassword' WHERE username ='$username'";
      $query_run = mysqli_query($con,$query);
      if($query_run)
      {
        header("Location: myprofile.php");
      }
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
<?php include("bin/header.php"); ?>


  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center display-">Change Your Password</h1>
        <hr class="bg-info">
        <br>
        <div class="card card-body">
          <form action="changepassword.php" method="post">
            <div class="form-group">
              <label>Current-Password</label>
              <input class="form-control form-control-lg" type="password" name="current-pass" id="mycurrentpassword" required="">
            </div>
            <div class="form-group">
              <label> New-Password</label>
              <input class="form-control form-control-lg" type="password" name="new-pass" id="mynewpassword" required="">
            </div>
            <div class="form-group">
              <label>Retype-Password</label>
              <input class="form-control form-control-lg" type="password" name="re-pass" id="myretypepassword" required="">
            </div>
           <button  class="btn btn-info btn-block" name="resetpassword"><h2>Change</h2></button>
        </form>
      </div>
         </div>
    </div>
  </div>



   <!-- Footer -->
<?php include("bin/footer.php"); ?>
  <!-- Footer -->



  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/bootstrap-validate.js"></script>

  <script>
    bootstrapValidate('#myretypepassword', 'matches:#mynewpassword:Your Password should match!')

  </script>
</body>
</html>
