<?php 
	session_start();
	require_once('dbconfig/config.php');
	if(!isset($_SESSION['ABFSFDSFDSF']) || empty($_SESSION['ABFSFDSFDSF'])){
		header("Location: admin.php");
	}
	include("bin/header.php");	
?>


<div class="container-fluid">
    <div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead class="text-center">
					<tr>
						<th scope="col">#</th>
						<th scope="col">UserName</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Mobile</th>
						<th scope="col">Banned</th>
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
						
						$query = "select * from user LIMIT $start,$limit";	
						$query_run = mysqli_query($con,$query);
						 
						if ($query_run) {
						while($result = $query_run->fetch_assoc()){

					?>					
					<tr>
						<th scope="row"><?php echo $couunt; ?></th>
						<td style="width: 400px"><?php echo $result['username']?></td>
						<td><?php echo $result['name']?></td>
						<td><?php echo $result['email']?></td>
						<td><?php echo $result['mobile']?></td>
						<?php if($result['status'] != '1'){?>
						<td><a href="delete.php?bannedid=<?php echo $result['id']?>" class="btn btn-danger"><i class="fa fa-ban"></i></a></td>					
						<?php }else{ ?>
						<td> </td>
						<?php } ?>

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
						$query = "SELECT * FROM user";
						$run_query = mysqli_query($con,$query);
						$count = mysqli_num_rows($run_query);
						$pageno = ceil($count/10);

						for($i=1;$i<=$pageno;$i++){
							if(isset($_GET["setpage"])){
								if($_GET['setpage']==$i){
									echo "<li class='page-item active'><a class='page-link' href='userlist.php?setpage=".$i."'>$i</a></li>";
									
								}
								else{
									echo "<li class='page-item'><a class='page-link' href='userlist.php?setpage=".$i."'>$i</a></li>";
								}
							}
							else{
								echo "<li class='page-item'><a class='page-link' href='userlist.php?setpage=".$i."'>$i</a></li>";
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
