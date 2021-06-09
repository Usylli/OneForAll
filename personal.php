<?php  
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Personal account</title>
    <?php include('includes/header.php');
          require_once('C:\xampp\htdocs\final_project\classes\author.php');
          $author = new Author();
          if(isset($_SESSION['user_name'])){
              $author->createNew($_SESSION['user_name']);
          }
    ?>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row py-5">
            <div class="col-lg-2 col-md-2 col-sm-0"></div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                        <a class="list-group-item list-group-item-action" id="list-Posts-list" data-toggle="list" href="#list-Posts" role="tab" aria-controls="Posts">Posts</a>
                        <a class="list-group-item list-group-item-action" id="list-exit-list" data-toggle="list" href="#list-exit" role="tab" aria-controls="exit">Exit</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="title py-2">Personal Information</div> 
                            <div class="setting">
                                <form action="personal.php">
                                <div class="form-group">
                                    <label for="email-input" class="form-control-placeholder">E-mail</label> 
                                    <input id="email-input" maxlength="64" type="email" class="form-control" placeholder="" value="<?php echo $author->getEmail(); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name-input" class="form-control-placeholder">Username</label> 
                                    <input id="name-input" maxlength="32" type="text" class="form-control" value="<?php echo $author->getAuthorName(); ?>">
                                </div> 
                                <div class="form-group ">
                                    <label for="resume-input" class="form-control-placeholder ">Password</label> 
                                    <input id="resume-input" maxlength="128" type="text" class=" form-control" value="<?php echo $author->getPassword();?>">
                                </div>
                                <div class="form-group ">
                                    <label for="contact-input" class="form-control-placeholder">Confirm Password</label> 
                                    <input id="contact-input" maxlength="64" type="text" class="form-control">
                                </div> 
                                <div class="right-button">
                                    <input type="submit" name="save" value="Save" class="form-control">
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list-Posts" role="tabpanel" aria-labelledby="list-Posts-list">
                        <div class="container">
                            <div class="setting ">
                                <div class="container">
                                    <div class="container">
                                        <h2 class="">Hello!</h2> 
                                        <span class="">Now you can become a part of <span style="color:rgb(211, 191, 101);">One</span>For<span style="color:rgb(72, 165, 49);">All</span> and make your posts on the site. To do this, read <a class="" href="" onclick="alert('Just write good post. Good Luck!');">publication rules</a>, write the material and submit it for moderation.</span> <br>
                                        <button type="button" class="btn btn-success my-2" onclick="window.open('write_post.php','_self')"><i class="fas fa-pencil-alt"></i> Write</button><br>
                                        <span class="">If you don't have any ideas or don't know where to start, write to <a class="" href="mailto:usylli@gmail.com">Usylli@gmail.com</a>, we will help.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="list-exit" role="tabpanel" aria-labelledby="list-exit-list">
                            <form action="actions/logout.php" method="POST">
                                <input type="submit" name="logout" value="logout" class="btn btn-danger">
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  <?php include('includes/footer.php');?>
  </body>
</html>
