<?php 
  ob_start();
  require_once('C:\xampp\htdocs\final_project\classes\author.php');
  require_once('C:\xampp\htdocs\final_project\classes\dbh.php');
  $dbh = new Dbh();
  $author = new Author();
  if(isset($_SESSION['user_name'])){
    $author->createNew($_SESSION['user_name']);
  }
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5a29ad32f7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
  </head>
  <body>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="img/logo.svg" width="40" height="40" alt="">
    </a>
    <a class="navbar-brand" href="index.php"><span style="color:rgb(211, 191, 101);">One</span>For<span style="color:rgb(72, 165, 49);">All</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php   
              $get_p_cats = "select * from categories";
              $run_p_cats = mysqli_query($dbh->conn, $get_p_cats);
              
              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                  
                  $p_cat_id = $row_p_cats['category_id'];
                  $p_cat_title = $row_p_cats['category_name'];
                  
                  echo "
                  
                  <a class='dropdown-item' href='category.php?cat=$p_cat_id'>$p_cat_title</a>
                  
                  ";
                  
              }
              
              ?>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
        <input class="form-control mr-sm-2" type="search" id="searchInp" placeholder="Search" aria-label="Search">
        <button name="title" value="" id="search" class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="document.getElementById('search').value = document.getElementById('searchInp').value;"><i class="fas fa-search"></i></a></button>
      </form>
      <?php
        if (empty($_SESSION['user_name'])) {
            echo '<button class="btn btn-outline-success my-2 my-sm-0 mx-lg-1" type="submit" data-toggle="modal" data-target="#signIn "><i class="fas fa-sign-in-alt"></i> Sign In</button>';
        } else { 
            echo '<button class="btn btn-outline-success my-2 my-sm-0 mx-lg-1" type="submit""><a href="personal.php" style="text-decoration: none; color: inherit"><i class="fas fa-user"></i> '.$author->getAuthorName().'</a></button>';
        }      
        ?>
    </div>
    </nav>
    <div class="container-fluid" style="padding:0">
      <!--MODAL-->
      <div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <section>
        <div class="containerr">
        <div class="user signinBx">
          <div class="imgBx"><img src="img/signIn.jpg" alt=""></div>
          <div class="formBx">
            <form action="actions/login.php" method="POST">
              <h2>Sign In</h2>
              <input type="text" name="username" id="username" placeholder="username">
              <input type="password" name="password" id="password" placeholder="password">
              <input type="submit" name="login" id="login" value="Sign In">
              <p class="signup">don't have an account? <a href="#" onclick="toggleForm();">Sign Up.</a></p>
            </form>
          </div>
        </div>
        <div class="user signupBx">
          <div class="formBx">
            <form action="actions/register.php" method="POST">
              <h2>Create an account</h2>
              <input type="text" name="username" id="username" placeholder="username">
              <input type="text" name="email" id="email" placeholder="email address">
              <input type="password" name="password" id="password" placeholder="password">
              <input type="password" name="password2" id="password2" placeholder="confirm password">
              <input type="submit" name="signup" id="signup" value="Sign Up">
              <p class="signup">Already have an account? <a href="#" onclick="toggleForm();">Sign In.</a></p>
            </form>
          </div>
          <div class="imgBx"><img src="img/signUp.jpg" alt=""></div>
        </div>
      </div>
    </section>
    </div>
    </div>
    </div>