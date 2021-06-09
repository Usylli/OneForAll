<?php session_start(); 
      require('classes/author.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Blog</title>
    <?php include('includes/header.php');
          $author_name = "Noname";
          require_once('C:\xampp\htdocs\final_project\classes\entry.php');
          if (isset($_SESSION['user_name'])) {
            $author_name = $_SESSION['user_name'];
            $entry = new Entry();
          }
          $con = mysqli_connect('localhost', 'root', '','blog');
    ?>
        <!--BLOG LIST-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
        <section class="blog-listing gray-bg">
        <div class="container">
        <div class="row d-flex"><!-- row Begin -->
    
            <div class="col-lg-12 "><!-- col-lg-12 Begin -->
                
                <div class="panel panel-default"><!-- panel panel-default Begin -->
                    
                <div class="panel-heading"><!-- panel-heading Begin -->
                    
                    <h3 class="panel-title"><!-- panel-title Begin -->
                        
                        <i class="fa fa-money fa-fw"></i> Write Post 
                        
                    </h3><!-- panel-title Finish -->
                    
                </div> <!-- panel-heading Finish -->
                
                <div class="panel-body" ><!-- panel-body Begin -->
                    
                <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                        
                        <div class="form-group"><!-- form-group Begin -->
                            
                            <label class="col-md-3 control-label"> Post Title </label> 
                            
                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                
                                <input name="post_title" type="text" class="form-control" required >
                                
                            </div><!-- col-md-6 Finish -->
                            
                        </div><!-- form-group Finish -->
                        
                        <div class="form-group"><!-- form-group Begin -->
                            
                            <label class="col-md-3 control-label"> Post Category </label> 
                            
                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                
                                <select name="category_id" class="form-control"><!-- form-control Begin -->
                                    
                                    <?php 
                                    
                                    $get_p_cats = "select * from categories";
                                    $run_p_cats = mysqli_query($con,$get_p_cats);
                                    
                                    while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                        
                                        $p_cat_id = $row_p_cats['category_id'];
                                        $p_cat_title = $row_p_cats['category_name'];
                                        
                                        echo "
                                        
                                        <option value='$p_cat_id'> $p_cat_title </option>
                                        
                                        ";
                                        
                                    }
                                    
                                    ?>
                                    
                                </select><!-- form-control Finish -->
                                
                            </div><!-- col-md-6 Finish -->
                            
                        </div><!-- form-group Finish -->
                        
                        <div class="form-group"><!-- form-group Begin -->
                            
                            <label class="col-md-3 control-label"> Post Image </label> 
                            
                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                
                                <input name="post_img1" type="text" class="form-control" required >
                                
                            </div><!-- col-md-6 Finish -->
                            
                        </div><!-- form-group Finish -->
                        
                        <div class="form-group"><!-- form-group Begin -->
                            
                            <label class="col-md-3 control-label"> Post author </label> 
                            
                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                
                                <input name="author_name" type="text" class="form-control" value="<?php echo $author_name ?>" required >
                                
                            </div><!-- col-md-6 Finish -->
                            
                        </div><!-- form-group Finish -->
                        
                        <div class="form-group"><!-- form-group Begin -->
                            
                            <label class="col-md-3 control-label"> Post excerpt </label> 
                            
                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                
                                <input name="excerpt" type="text" class="form-control" required >
                                
                            </div><!-- col-md-6 Finish -->
                            
                        </div><!-- form-group Finish -->
                        
                        <div class="form-group"><!-- form-group Begin -->
                            
                            <label class="col-md-3 control-label"> Post Content </label> 
                            
                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                
                                <textarea name="post_content" cols="19" rows="6" class="form-control">
                                    
                                </textarea>
                                
                            </div><!-- col-md-6 Finish -->
                            
                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->
                            
                            <label class="col-md-3 control-label"></label> 
                            
                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                
                                <input name="submit" value="Submit Post" type="submit" class="btn btn-primary form-control">
                                
                            </div><!-- col-md-6 Finish -->
                            
                        </div><!-- form-group Finish -->
                        
                    </form><!-- form-horizontal Finish -->
                    
                </div><!-- panel-body Finish -->
                    
                </div><!-- canel panel-default Finish -->
                
            </div><!-- col-lg-12 Finish -->
            
        </div><!-- row Finish -->
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
        </div>
    </section>
    <script>

    </script>
    <?php include('includes/footer.php'); ?>
  </body>
</html>
<?php 

if(isset($_POST['submit'])){
    
    $post_title = $_POST['post_title'];
    $post_cat = $_POST['category_id'];
    $author_name = $_POST['author_name'];
    $post_excerpt = $_POST['excerpt'];
    $post_content = $_POST['post_content'];
    $post_img1 = $_POST['post_img1'];

    $get_author = "select * from authors where author_name='$author_name'";
        
    $run_author = mysqli_query($con,$get_author);
    
    $row_author = mysqli_fetch_array($run_author);
    
    $author_id = $row_author['author_id'];

    $insert_post = "insert into posts (category_id,date,title,picture,author_id,excerpt,content) values ('$post_cat',NOW(),'$post_title','$post_img1','$author_id','$post_excerpt', '$post_content')";
    
    $run_post = mysqli_query($con,$insert_post);
    
    if($run_post){
        
        echo "<script>alert('Post has been written sucessfully')</script>";
        echo "<script>window.open('index.php?view_post','_self')</script>";
        
    }
    
}

?>

