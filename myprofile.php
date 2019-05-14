<?php
session_start();
require_once('dbconfig/config.php');

if(!isset($_SESSION['usernameewxyn']) || empty($_SESSION['usernameewxyn'])) {
   header( "Location: login.php");
}

$updatemessage = "";

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

<?php
  if(isset($_POST['update'])){

    $username = $_SESSION['usernameewxyn'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];

    $query = "UPDATE user SET name='$name', mobile='$phone', email='$email' WHERE username ='$username'";

    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
      $_SESSION['ewxynopqaname'] = $_POST['name'];

      $updatemessage = "Update Successfully";
      //header("Location: myprofile.php");
    }
  }
?>

<?php
    $username = $_SESSION['usernameewxyn'];

    $query = "select * from user where username ='$username'";

    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
      if(mysqli_num_rows($query_run)>0)
      {
        $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);

        $email = $row['email'];
        $phone = $row['mobile'];
        $id = $row['id'];

      }

    }
?>


<div class="container py-5 bg-secondary">
  <div class="row">
    <div class="col-md-4 bg-dark offset-md-1 ">
      <h3 class="display-4 text-light text-center">My profile</h3>
      <hr class="bg-warning">
      <br>
      <h4 class="text-light">Name: <?php echo $_SESSION['ewxynopqaname']; ?></h4>
      <br>
      <h4 class="text-light">User Name: <?php echo $username; ?></h4>
      <br>
      <h4 class="text-light">Email:  <?php echo $email; ?></h4>
      <br>
      <h4 class="text-light">Phone Number: <?php echo $phone; ?></h4>
      <br><br>
      <a href="changepassword.php" class="btn btn-warning btn-lg btn-block"><h2>Change Password</h2></a>
    </div>


    <div class="col-md-4 bg-dark offset-md-1">
       <h1 class="text-center display-4 text-light p-1 rounded"> Update Your Profile</h1>


       <hr class="bg-warning">
          <?php
            if(!empty($updatemessage)){
              echo "<h3>".$updatemessage."</h3>";
              $updatemessage = "";

            }
          ?>

          <form action="myprofile.php" method="post" class="form form-group">
          <input class="form-control form-control-lg" type="text" name="name" value="<?php echo $_SESSION['ewxynopqaname']; ?>" placeholder="Name">
          <br>
          <input class="form-control form-control-lg" type="text" name="email" value="<?php echo $email; ?>" placeholder="Email">
          <br>
          <input class="form-control form-control-lg" type="Number" name="phone" value="<?php echo $phone; ?>" placeholder="Name">
          <br>
           <button name="update" class="btn btn-warning btn-block btn-lg"><h3>Update</h3></button>
           <br>
        </form>
    </div>
  </div>
  <br><br>

  <div class="row">
    <div class="col-12 text-center">
      <h1 class="display-4 text-light">My Ads</h1>
      <hr class="bg-warning">
    </div>
  </div>
  <br><br>

  <div class="row">
  <?php
      $query = "select * from ads where username ='$username'";
      $query_run = mysqli_query($con,$query);
      if(mysqli_num_rows($query_run)>0){
        if ($query_run) {
          //Your Add
          while($result = $query_run->fetch_assoc()){



    ?>
          <div class="col-md-4">
            <div class="card">
              <a href="familydetails.html"><img src="<?php echo $result['directory']?>/<?php echo $result['image1']?>" class="img-fluid rounded" alt=""></a>
              <div class="card-body">
                <h4 class="card-title"><?php echo $result['type']?></h4>
                <p class="card-body">Great Location. It's Located at Banani Enjoy living in the center of one of the Dhaka cities,....</p>
                <a href="single.php?id=<?php echo $result['id']?>" class="btn btn-info ml-5 mr-5">Details</a>
                <a href="delete.php?id=<?php echo $result['id']?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
            <?php
                    }
                  }
                    else{
                    header("Location:404.php");
                    }
                  }
                else{
                  echo "<h2 style='color:#000;text-align:center'> YOU have no add</h2>";
                }
            ?>

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
  bootstrapValidate('#email', 'email:Enter a valid email address!')
  bootstrapValidate('#name', 'min:4:Please enter at least 4 characters!')
  bootstrapValidate('#message', 'required:Please fill out this field!')
  </script>
</body>
</html>
