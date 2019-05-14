<?php
session_start();
require_once('dbconfig/config.php');

if(!isset($_SESSION['usernameewxyn']) || empty($_SESSION['usernameewxyn'])) {
   header( "Location: login.php");
}

  if(isset($_POST['post'])){
  
  $image1 = $_FILES['image1']['name'];
  $image2 = $_FILES['image2']['name'];
  $image3 = $_FILES['image3']['name'];
    
  $username = $_SESSION['usernameewxyn'];
  $name_ = $_SESSION['ewxynopqaname'];
  
  $category = "To-Let";
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $adtype =  $_POST['adtype'];
  $location = $_POST['location'];
  $phone = $_POST['phone'];
  $price = $_POST['price'];
  $message = mysqli_real_escape_string($con, $_POST['message']);

  $str = date("Y"."m"."d").time();
  $str1 = "upload/".$category.'/'.$username.'/'.$str;
  mkdir($str1, 0777, true);
  
  $target1 = $str1.'/'.basename($image1);
  $target2 = $str1.'/'.basename($image2);
  $target3 = $str1.'/'.basename($image3);
  
    move_uploaded_file($_FILES['image1']['tmp_name'], $target1);
    move_uploaded_file($_FILES['image2']['tmp_name'], $target2);
    move_uploaded_file($_FILES['image3']['tmp_name'], $target3);
  
  $query = "INSERT INTO ads (username, category, title, name, type, location, phone, price, image1, image2, image3, discription, directory) VALUES ('$username', '$category', '$title', '$name_', '$adtype', '$location', '$phone', '$price', '$image1', '$image2', '$image3', '$message', '$str1')";
  
  $query_run = mysqli_query($con,$query);
  
  
      if($query_run)
      {
        $_SESSION['postSucessfully'] ="Post Done!";
        header( "Location: postyourads.php");
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
</br>
<!-- postyourads -->



  <div class="contact1">
    <div class="container-contact1">
      <div class="contact1-pic js-tilt" data-tilt>
        <img src="images/recent_works.png" alt="IMG">
      </div>

      <form action="adtolet.php" method="post" enctype="multipart/form-data" class="contact1-form validate-form">
        <span class="contact1-form-title">
          Fill Up the from to publish your post
        </span>
        <div class="wrap-input1 validate-input">
          <input class="input1" type="text" name="title" placeholder="Title">
          <span class="shadow-input1"></span>
        </div>

        <div class="wrap-input1 validate-input">
          <select class="input1" name="adtype">
                   <option selected calss="default">Select Type</option>
                      <?php
                      $query = "SELECT * FROM `servicetype`";  
                      $query_run = mysqli_query($con,$query);
                      if ($query_run) {
                      while($result = $query_run->fetch_assoc()){
                          echo "<option>".$result['s_type']."</option>";
                        }
                      }
                    ?>
                </select>
          <span class="shadow-input1"></span>
        </div>

        <div class="wrap-input1 validate-input">
          <select class="input1" name="location">
                   <option selected calss="default">Location</option>
                      <?php
                      $query = "SELECT * FROM `location`";  
                      $query_run = mysqli_query($con,$query);
                      if ($query_run) {
                      while($result = $query_run->fetch_assoc()){
                          echo "<option>".$result['location_n']."</option>";
                        }
                      }
                    ?>

                </select>
          <span class="shadow-input1"></span>
        </div>

        <div class="wrap-input1 validate-input">
          <input class="input1" type="Number" name="phone" placeholder="Contact Number">
          <span class="shadow-input1"></span>
        </div>
        <div class="wrap-input1 validate-input">
          <input class="input1" type="text" name="price" placeholder="Price">
          <span class="shadow-input1"></span>
        </div>
        
        <div class="wrap-input1 validate-input">
          <input class="input1" type="file" name="image1" required="">
          <span class="shadow-input1"></span>
        </div>
        <div class="wrap-input1 validate-input">
          <input class="input1" type="file" name="image2">
          <span class="shadow-input1"></span>
        </div>
        <div class="wrap-input1 validate-input">
          <input class="input1" type="file" name="image3">
          <span class="shadow-input1"></span>
        </div>
        <div class="wrap-input1 validate-input" data-validate = "Message is required">
          <textarea class="input1" name="message" placeholder="Discription"></textarea>
          <span class="shadow-input1"></span>
        </div>

        <div class="container-contact1-form-btn">
          <button name="post"  class="contact1-form-btn">
            <span>
              Post
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </form>
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
