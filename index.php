<?php session_start(); 
      require('classes/author.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Blog</title>
    <?php include('includes/header.php');
          require_once('C:\xampp\htdocs\final_project\classes\entry.php');
          $entry = new Entry();
          if(isset($_SESSION['user_name'])){
              $author->createNew($_SESSION['user_name']);
          }
    ?>
    <!--LATEST NEWS-->
    <section class="section gray-bg" id="blog" style="margin:0; background-image: url('img/latestNews.jpg');background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center">
                        <div class="section-title">
                            <h2>Latest News</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $entry->getLatestEntries(); ?>
                </div>
            </div>
        </section>
        <!--BLOG LIST-->
        <section class="blog-listing gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <div class="row">
                        <?php $entry->getEntries();?>
                    </div>
                </div>

                <?php include('includes/sidebar.php'); ?>
            </div>
        </div>
    </section>
    <script>

    </script>
    <?php include('includes/footer.php'); ?>
  </body>
</html>