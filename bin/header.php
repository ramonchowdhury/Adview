 <nav class="navbar navbar-light navbar-expand-lg fixed-top py-3 ">
    <div class="container">
      <a  class="navbar-brand" href="index.php">
        <img src="img/home.png" alt="pic" class="img-fluid" width="50" height="50">
        <h3 class="d-inline align-middle">AdView</h3>
      </a>
      <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
     <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
       <li class="nav-item "><a class="nav-link" href="allads.php">All-Ads</a>
         </li>
        <li class="nav-item"><a class="nav-link" href="postyourads.php">Post Your Ads</a>
          </li>

          <?php 
            if(isset($_SESSION['usernameewxyn']) && !empty($_SESSION['usernameewxyn'])) {
                $name = $_SESSION['ewxynopqaname'];
                echo "<li class='nav-item'><a class='nav-link' href='myprofile.php'>".$name."</a>
           </li>
          <li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a>
           </li>
           ";
            }
            else{
              echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a>
           </li>
          <li class='nav-item'><a class='nav-link' href='register.php'>Register</a>
           </li>
           ";              
            }
          ?>
     </ul>
   </div>
    </div>
  </nav>