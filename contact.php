<?php
session_start();
require_once('dbconfig/config.php');
  $contactUpdate = "";
  if(isset($_POST['contact'])){

    $name = $_POST['name'];
    $message = $_POST['message'];
    $email = $_POST['email'];


    //if($password==$repassword){
      $query = "INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES (NULL, '$name', '$email', '$message')";
        //echo $query;
      $query_run = mysqli_query($con,$query);

      if($query_run){
        	$contactUpdate = "Message Send Sucessfully";
      		//header("Location: login.php");
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

  <?php
   include("bin/header.php");
  ?>


  <!--Contact -->
  <div class="container py-5 bg-secondary">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center bg-danger text-light p-2 rounded">Contract Us</h1>
        <hr class="bg-light">
        <br>
        <?php
        	if(!empty($contactUpdate)){
        		echo "<h4 class='text-center'> Message Send Sucessfully</h4>";
        		$contactUpdate ="";
        	}
        ?>
        <div class="card card-body">
          <form action="contact.php" method="POST">
            <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" id="myname" class="form-control" required="">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input name="email" type="email" class="form-control form-control-lg" id="myemail" required="">
            </div>

            <div class="form-group">
              <label>Message</label>
              <textarea name="message" class="form-control form-control-lg" id="mymessage" required=""></textarea>
            </div>
           <button type="submit" name="contact" class="btn btn-danger btn-lg btn-block">Send</button>
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
    bootstrapValidate('#myname', 'min:4:Please enter at least 4 characters!')
    bootstrapValidate('#mymessage', 'required:Please fill out this field!')

    bootstrapValidate('#email', 'email:Enter a valid email address!')
    bootstrapValidate('#name', 'min:4:Please enter at least 4 characters!')
    bootstrapValidate('#message', 'required:Please fill out this field!')

  </script>
</body>
</html>
