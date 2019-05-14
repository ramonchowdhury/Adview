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
  <?php
   include("bin/header.php");
  ?>
  <!--Header-end-->

  <!--Search-->

  <?php include("bin/searchbar.php"); ?>





<?php
    $id=$_GET['id'];

    $query = "select * from ads where id ='$id'";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {

      $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
      $title = $row['title'];
      $name = $row['name'];
      $category = $row['category'];
      $type = $row['type'];
      $location =  $row['location'];
      $contact  = $row['phone'];
      $price = $row['price'];
      $date = $row['date'];
      $discription = $row['discription'];
      $image1 = $row['image1'];
      $image2 = $row['image2'];
      $image3 = $row['image3'];
      $directory = $row['directory'];

    }
?>


<div class="container py-5">
  <div class="row">
    <div class="col-md-12">

<li class="">TITLE: <span style="text-transform: uppercase;"><?php echo $title?> </span></li>
<li class="">DATE: <span style="text-transform: uppercase;"><?php echo $date?> </span></li>
<li>NAME: <?php echo $name?> </li>

      <div class="card-deck">

      <?php if(!empty($image1) && $image1!= "Null"){ ?>
        <div class="card">
               <img src="<?php echo $directory ?>/<?php echo $image1 ?>" class="img-fluid img-responsive h-100"alt="">
        </div>
        <?php } ?>
         <?php if(!empty($image2) && $image2!= "Null"){ ?>
        <div class="card">
               <img src="<?php echo $directory ?>/<?php echo $image2 ?>" class="img-fluid img-responsive h-100"alt="">
        </div>
        <?php } ?>
        <?php if(!empty($image3) && $image3!= "Null"){ ?>
        <div class="card">
               <img src="<?php echo $directory ?>/<?php echo $image3 ?>" class="img-fluid img-responsive h-100"alt="">
        </div>
        <?php } ?>




      </div>

       <br>
      <ul>
          <li class="font-weight-italic">Category: <span style="text-transform: uppercase;"><?php echo $category?> </span></li>
          <li  class="font-weight-italic">Location: <?php echo $location?></li>
          <li  class="font-weight-italic">Type: <?php echo $type?></li>
          <li  class="font-weight-italic text-danger"> Price: <?php echo $price?></li>
           <li  class="font-weight-italic"> Contact: <?php echo $contact?></li>


      </ul>
      <br>
      <h5 class="bg-dark text-light p-1 rounded display-4">Discription</h5>
      <hr class="bg-primary">
      <br>
      <p class="lead text-justify"><?php echo $discription?> </p>
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
  bootstrapValidate('#email', 'email:Enter a valid email address!')
  bootstrapValidate('#name', 'min:4:Please enter at least 4 characters!')
  bootstrapValidate('#message', 'required:Please fill out this field!')
  </script>
</body>
</html>
