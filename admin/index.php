<?php 
	session_start();
	include("bin/header.php");
	require_once('dbconfig/config.php');
	if(!isset($_SESSION['ABFSFDSFDSF']) || empty($_SESSION['ABFSFDSFDSF'])){
		header("Location: admin.php");
	}	
?>

<div class="container-fluid">
    <div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead class="text-center">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Category</th>
						<th scope="col">Type</th>
						<th scope="col">Date</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody class="text-center">

					<?php
						$limit = 10;
						$couunt = 1;
						if(isset($_GET["setpage"])){
							$pageno = $_GET["setpage"];
							$start = ($pageno * $limit) - $limit;
						}else{
							$start = 0;
						}
						
						$query = "select * from ads LIMIT $start,$limit";	
						$query_run = mysqli_query($con,$query);
						 
						if ($query_run) {
						while($result = $query_run->fetch_assoc()){

					?>					
					<tr>
						<th scope="row"><?php echo $couunt; ?></th>
						<td style="width: 400px"><?php echo $result['title']?></td>
						<td><?php echo $result['category']?></td>
						<td><?php echo $result['type']?></td>
						<td><?php echo $result['date']?></td>
						<td><a href="delete.php?id=<?php echo $result['id']?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
					</tr>

					<?php 
							$couunt++;
						}
					 }
				    ?>
				</tbody>
			</table>			
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<?php 
						$query = "SELECT * FROM ads";
						$run_query = mysqli_query($con,$query);
						$count = mysqli_num_rows($run_query);
						$pageno = ceil($count/10);

						for($i=1;$i<=$pageno;$i++){
							if(isset($_GET["setpage"])){
								if($_GET['setpage']==$i){
									echo "<li class='page-item active'><a class='page-link' href='index.php?setpage=".$i."'>$i</a></li>";
									
								}
								else{
									echo "<li class='page-item'><a class='page-link' href='index.php?setpage=".$i."'>$i</a></li>";
								}
							}
							else{
								echo "<li class='page-item'><a class='page-link' href='index.php?setpage=".$i."'>$i</a></li>";
							}
						}
					?>
				</ul>
			</nav>

		</div>	
		
    </div>
</div>			
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
