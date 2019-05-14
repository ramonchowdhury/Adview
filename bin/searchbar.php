 <section id="search" class="py-5 bg-dark">
    <div class="container">
      <form action="search.php" method="GET">
        <div class="row mx-auto">
          <div class="col-lg-2">
            <div class="form-group mb-0">
              <input type="text" name="search" placeholder="Search" class="form-control form-control-lg">
            </div>
           
          </div>
          <div class="col-lg-2 ">
              <div class="form-group mb-0 my-2 my-lg-0 ">
  	            <select class="form-control mb-0 form-control-lg" name = "category">
  	               <option class="form-control-item" selected disabled>Category</option>
                    <?php
                      $query = "SELECT * FROM `category`";  
                      $query_run = mysqli_query($con,$query);
                      if ($query_run) {
                      while($result = $query_run->fetch_assoc()){
                          echo "<option class='form-control-item'>".$result['c_titile']."</option>";
                        }
                      }
                    ?>
  	            </select>
              </div>
          </div>
          <div class="col-lg-2 ">
            <div class="form-group mb-0 my-2 my-lg-0 ">
              <select class="form-control mb-0 form-control-lg" name="location">
                 <option class="form-control-item" selected disabled>Location</option>
                  <?php
                    $query = "SELECT * FROM `location`";  
                    $query_run = mysqli_query($con,$query);
                     
                    if ($query_run) {
                    while($result = $query_run->fetch_assoc()){
                        echo "<option class='form-control-item'>".$result['location_n']."</option>";
                      }
                    }
                  ?>                 
              </select>
            </div>
          </div>

          <div class="col-lg-2">
            <button type="submit" class="btn btn-info btn-lg btn-block" name="">
              <i class="fa fa-search" aria-hidden="true"> Search</i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>