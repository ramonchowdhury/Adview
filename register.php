<?php
  session_start();
  require_once('dbconfig/config.php');
  if(isset( $_SESSION['usernameewxyn']) && !empty($_SESSION['usernameewxyn'])){
    header("Location: index.php");
  }



  if(isset($_POST['registration'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];


    //if($password==$repassword){
      $query = "select * from user where username ='$username'";
        //echo $query;
      $query_run = mysqli_query($con,$query);
      //echo mysql_num_rows($query_run);
      if($query_run){

          if(mysqli_num_rows($query_run)>0)
          {
            echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
          }
          else
          {
            $query = "insert into user values(Null,'$name', '$mobile', '$username', '$password', '$email', '0')";
            $query_run = mysqli_query($con,$query);
            if($query_run)
            {
              $_SESSION['registrationMessage'] = "Successfully Registration Complete";
              header( "Location: login.php");
              //header( "Location: login.php");
            }
          }
        }
    //}

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
      <h1 class="text-center display-4"> Member Registration </h1>
      <hr class="bg-light">
      <br>
      <div class="card card-body">
        <form action="register.php" method="post">

            <div class="form-group">
              <label>Name</label>
              <input class="form-control form-control-lg" name="name" id="myfirstname" required="">
            </div>
            <div class="form-group">
              <label>User Name</label>
              <input class="form-control form-control-lg" name="username" id="myusername" required="">
            </div>
           <div class="form-group">
              <label>Email</label>
              <input class="form-control form-control-lg" name="email" id="myemail" required="Email">
            </div>
           <div class="form-group">
              <label>Phone</label>
              <input class="form-control form-control-lg" type="number" name="mobile" id="myusername" required="">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input class="form-control form-control-lg" name="password" id="mypassword" required="">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input class="form-control form-control-lg" name="repassword" id="myconfirmpassword" required="">
            </div>
             <button name="registration" class="btn btn-warning btn-lg btn-block">
              <h4>Registration</h4>
            </button>
             <br>
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
    bootstrapValidate('#myemail', 'email:Enter a valid email address!')
    bootstrapValidate('#myfirstname', 'min:4:Please enter at least 4 characters!')
    bootstrapValidate('#mylastname', 'max:10:Please do not enter more than 10 characters!')
    bootstrapValidate('#myusername', 'min:5:Please enter at least 5 characters!')
    bootstrapValidate('#myconfirmpassword', 'matches:#mypassword:Your Password should match!')

    bootstrapValidate('#email', 'email:Enter a valid email address!')
    bootstrapValidate('#name', 'min:4:Please enter at least 4 characters!')
    bootstrapValidate('#message', 'required:Please fill out this field!')

  </script>
</body>
</html>
