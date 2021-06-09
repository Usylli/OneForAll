<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $get_posts = "select * from posts";
        
        $run_posts = mysqli_query($con,$get_posts);
        
        $count_posts = mysqli_num_rows($run_posts);
        
        $get_authors = "select * from authors";
        
        $run_authors = mysqli_query($con,$get_authors);
        
        $count_authors = mysqli_num_rows($run_authors);
        
        $get_p_categories = "select * from categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllForOne Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['insert_post'])){
                        
                        include("insert_post.php");
                        
                }   if(isset($_GET['view_post'])){
                        
                        include("view_post.php");
                        
                }   if(isset($_GET['delete_post'])){
                        
                        include("delete_post.php");
                        
                }   if(isset($_GET['edit_post'])){
                        
                        include("edit_post.php");
                        
                }   if(isset($_GET['insert_p_cat'])){
                        
                        include("insert_p_cat.php");
                        
                }   if(isset($_GET['view_p_cats'])){
                        
                        include("view_p_cats.php");
                        
                }   if(isset($_GET['delete_p_cat'])){
                        
                        include("delete_p_cat.php");
                        
                }   if(isset($_GET['edit_p_cat'])){
                        
                        include("edit_p_cat.php");    

                }   if(isset($_GET['view_authors'])){
                        
                        include("view_authors.php");
                        
                }   if(isset($_GET['insert_author'])){
                        
                        include("insert_author.php");  

                }    if(isset($_GET['edit_author'])){
                        
                        include("edit_author.php");

                }    if(isset($_GET['delete_author'])){
                        
                        include("delete_author.php");    

                }   
        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>


<?php } ?>