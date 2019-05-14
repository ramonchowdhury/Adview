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


  <!--CAROUSEL-SLIDER-->




<div class="container py-5">
  <div class="row">
          <div class="col-md-3">
             <div class="mb-0 lead">
                 <h1>Services</h1>
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
                <h1>Locations</h1>
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
               <h1>Service-Types</h1>
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

    <div class="col-md-8">
      <div class="card-columns">
			<?php
				
        	$couunt = 0;
        	$str = "";

				if(isset($_GET['search']) && !empty($_GET['search']) && strlen($_GET['search']) >= 2){
					$get_value = $_GET['search'];
					$str = "title like '%$get_value%'";
					$couunt++;
					
				}
				if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] != "Category"){
					$get_value = $_GET['category'];
					if($couunt != 0){
					 $str = $str." AND category like '%$get_value%'";
					}
					else{
						$str = $str."category like '%$get_value%'";
					}
					$couunt++;
				}
				if(isset($_GET['location']) && !empty($_GET['category']) && $_GET['location'] != "Location"){
					$get_value = $_GET['location'];
					if($couunt != 0){
					 $str = $str." AND location like '%$get_value%'";
					}
					else{
						$str = $str."location like '%$get_value%'";
					}
					$couunt++;
				}		
				if(empty($str)){
					$teststrng="fajdsklfjslfsdfdfjlsdjfds";
					$str = "type like '%$teststrng%'";
				}	
				
				$query = "SELECT * FROM `ads` WHERE ".$str;			
				$query_run = mysqli_query($con,$query);
				 
				if ($query_run) {
				if(mysqli_num_rows($query_run) > 0){
				while($result = $query_run->fetch_assoc()){
			?>

	        <div class="card">
	          <a href="single.php?id=<?php echo $result['id']?>" class="my-image"><img src="<?php echo $result['directory']?>/<?php echo $result['image1']?>" class="img-fluid rounded" alt=""></a>
	          <div class="card-body">
	            <h4 class="card-title"><?php echo $result['category']?></h4>
	            <p class="my-card-body card-body"><?php echo textShorten($result['discription']); ?></p>
	            <a href="single.php?id=<?php echo $result['id']?>" class="btn btn-info btn-end">Details</a>
	          </div>
	        </div>
		<?php
			  }
			}
			else{
		?>
		<h1 class="text-center">Not found</h1>
		<?php
			}
		  }
		 ?>

         </div>
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
