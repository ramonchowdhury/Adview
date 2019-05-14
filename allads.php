<?php
session_start();
require_once('dbconfig/config.php');
  function textShorten($text){
    $text = substr($text, 0, 100);
    $text = substr($text, 0, strrpos($text, ' '));
    return $text;
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
  <!--Header-end-->

  <!--Search-->

  <?php include("bin/searchbar.php"); ?>



<div class="container py-5">
  <div class="row">
 <div class="col-md-3">
             <div class="mb-0 lead">
                 <h3>Category</h3>
               <hr class="bg-primary">
            </div>
            <div>
              <ul class="list-group">
                <?php
                  $query = "SELECT * FROM `category`";
                  $query_run = mysqli_query($con,$query);

                  if ($query_run) {
                  while($result = $query_run->fetch_assoc()){

                ?>
                    <li  class="list-group-item effect "><a class="list-group-item-action outline-primary effect" href="category.php?category=<?php echo $result['c_titile'];?>">
                    <h5><i class="fa fa-cubes"></i> <?php echo $result['c_titile']; ?></a></h5>
                  </li>

                  <?php
                    }
                  }
                   ?>
              </ul>
            </div>
            <div class="mt-2 lead">
                <h3>Locations</h3>
              <hr class="bg-primary">
           </div>
           <div>
             <ul class="list-group">
                <?php
                  $query = "SELECT * FROM `location`";
                  $query_run = mysqli_query($con,$query);

                  if ($query_run) {
                  while($result = $query_run->fetch_assoc()){

                ?>
                  <li  class="list-group-item effect "><a class="list-group-item-action outline-primary effect" href="location.php?location=<?php echo $result['location_n'];?>">
                             <h5><i class="fa fa-map-marker"></i> <?php echo $result['location_n']; ?></a></h5>
                           </li>

                  <?php
                    }
                  }
                   ?>
             </ul>
           </div>
           <div class="mt-2 lead">
               <h3>Sub-Category</h3>
             <hr class="bg-primary">
          </div>
          <div>
            <ul class="list-group">

          <?php
                $query = "SELECT * FROM `servicetype`";
                $query_run = mysqli_query($con,$query);

                if ($query_run) {
                while($result = $query_run->fetch_assoc()){

              ?>

                <li  class="list-group-item effect "><a class="list-group-item-action outline-primary effect" href="servicetype.php?type=<?php echo $result['s_type'];?>">
                  <h5><i class="fa fa-map-marker"></i>  <?php echo $result['s_type']; ?></a></h5>
                </li>

                <?php
                  }
                }
                 ?>
            </ul>
          </div>
          </div>

      <!--// Right Sidebar //-->



    <div class="col-md-9">
      <div class="card-columns">
          <?php
            $limit = 12;
            if(isset($_GET["setpage"])){
              $pageno = $_GET["setpage"];
              $start = ($pageno * $limit) - $limit;
            }else{
              $start = 0;
            }

            $query = "select * from ads ORDER BY id DESC LIMIT $start,$limit";
            $query_run = mysqli_query($con,$query);

            if ($query_run) {
            while($result = $query_run->fetch_assoc()){
          ?>
          <div class="card bg-secondary">
                        <a href="single.php?id=<?php echo $result['id']?>" class="my-image"><img class="img-fluid img-responsive" src="<?php echo $result['directory']?>/<?php echo $result['image1']?>" alt=""></a>
            <div class="card-body effect">
              <h4 class="card-title bg-dark text-light text-center text-uppercase rounded p-2"><?php echo $result['title']?></h4>
              <p class="my-card-body card-body text-light text-justify"><?php echo textShorten($result['discription']);?></p>
              <a href="single.php?id=<?php echo $result['id']?>" class="btn btn-warning text-muted btn-block btn-lg ">Details</a>
            </div>
          </div>
        <?php }
          }else{
          header("Location:404.php");
        }?>

         </div>
    <!--// pagination //-->
            <nav class="mt-5 pt-3">
              <ul class="pagination justify-content-center">
                  <?php
                    $query = "SELECT * FROM ads";
                    $run_query = mysqli_query($con,$query);
                    $count = mysqli_num_rows($run_query);
                    $pageno = ceil($count/12);
                    for($i=1;$i<=$pageno;$i++){
                      if(isset($_GET["setpage"])){
                        if($_GET['setpage']==$i){
                          echo "<li class='page-item'><a href='allads.php?setpage=".$i."' class ='active page-link'>$i</a></li> ";

                        }
                        else{
                          echo "<li class='page-item'><a href='allads.php?setpage=".$i."' class='page-link'>$i</a></li> ";
                        }
                      }
                      else{
                        echo "<li class='page-item'><a href='allads.php?setpage=".$i."' class='page-link'>$i</a></li> ";
                      }
                    }
                  ?>
              </ul>
            </nav>

      </div>

    </div>
  </div>
<br><br>




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
