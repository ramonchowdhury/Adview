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
  <!-- // Header Section // -->
  <?php
   include("bin/header.php");
  ?>
  <!--Header-end-->

  <!--Search-->

  <?php include("bin/searchbar.php"); ?>


  <!--CAROUSEL-SLIDER-->

  <section id="showcase"class="bg-dark">
      <div id="mycarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-slide-to="0" data-target="#mycarousel" class="active"></li>
            <li data-slide-to="1" data-target="#mycarousel"></li>
              <li data-slide-to="2" data-target="#mycarousel"></li>
        </ol>
      <div class="carousel-inner">
        <div class="carousel-item carousel-img-1 active">
          <div class="container">
            <div class="carousel-caption mb-3 pb-3 mb-sm-5 pb-sm-5">
              <h2 class="display-4">Family</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis at esse, voluptatibus tenetur ab obcaecati. Voluptatem expedita fugit minima sapiente!</p>
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-img-2">
          <div class="container">
            <div class="carousel-caption mb-3 pb-3 mb-sm-5 pb-sm-5">
              <h2 class="display-4">Bachelor</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis at esse, voluptatibus tenetur ab obcaecati. Voluptatem expedita fugit minima sapiente!</p>
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-img-3">
          <div class="container">
            <div class="carousel-caption mb-3 pb-3 mb-sm-5 pb-sm-5">
              <h2 class="display-4">Family</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis at esse, voluptatibus tenetur ab obcaecati. Voluptatem expedita fugit minima sapiente!</p>
            </div>
          </div>
        </div>
      </div>
      <a href="#mycarousel" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a href="#mycarousel" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
      </div>
    </section>


    <!--//Left Sidebar //-->
    <section class="py-5">
      <div class="container">
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
               <h4>Sub-Category</h4>
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
                  <h5><i class="fa fa-list"></i>  <?php echo $result['s_type']; ?></a></h5>
                </li>

                <?php
                  }
                }
                 ?>
            </ul>
          </div>
          </div>

            <!--// Right Sidebar //-->
             <!--cardcolum-->
             <div class="col-md-9">
               <h3 class="display-4 text-center">Recent posts..</h3>
               <hr>
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
                 <div class="card bg-secondary text-light">
                   <a href="single.php?id=<?php echo $result['id']?>" class="my-image"><img class="img-fluid img-responsive" style="hover{color:red;}" src="<?php echo $result['directory']?>/<?php echo $result['image1']?>" alt="NO Image Found"></a>
                   <div class="card-body effects">
                     <h4 class=" card-title text-light bg-dark text-uppercase text-center p-2 rounded"><?php echo $result['title']?></h4>

                     <ul class="list-group list-group-flush">
                       <li class="list-group-item bg-info text-center"><h5 class="mb-1"><h4>Service:</h4> <?php echo $result['category']?></h5></li>
                       <li class="list-group-item bg-info text-center"><h4>Type:</h4> <?php echo $result['type']?></h5></li>
                       <li class="list-group-item bg-info text-center"><h4>Location:</h4> <?php echo $result['location']?></h5></li>
                       <li class="list-group-item bg-info text-center"><h4>Posted:</h4> <?php echo $result['date']?></h5></p></li>
                     </ul>
                     <a href="single.php?id=<?php echo $result['id']?>" class="btn btn-warning btn-end mt-4 btn-block btn-lg">Details</a>
                   </div>
                 </div>
               <?php }
                 }else{
                 header("Location:404.php");
               }?>

                </div>
             <!--cardcolum end-->



              <!--// table //>



               <!-// table //-->

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
                          echo "<li class='page-item'><a href='index.php?setpage=".$i."' class ='active page-link'>$i</a></li> ";

                        }
                        else{
                          echo "<li class='page-item'><a href='index.php?setpage=".$i."' class='page-link'>$i</a></li> ";
                        }
                      }
                      else{
                        echo "<li class='page-item'><a href='index.php?setpage=".$i."' class='page-link'>$i</a></li> ";
                      }
                    }
                  ?>
              </ul>
            </nav>
            </div>
            </div>
        </div>
      </div>
    </section>


   <!-- Footer -->
<?php include("bin/footer.php"); ?>
   <!-- EndFooter -->



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
