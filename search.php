<?php session_start(); 
      require('classes/author.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Blog</title>
    <?php include('includes/header.php');
          $post_title = "";
          require_once('C:\xampp\htdocs\final_project\classes\entry.php');
          if (isset($_GET['title'])) {
            $post_title = $_GET['title'];
            $entry = new Entry();
          }
    ?>
        <!--BLOG LIST-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
        <section class="blog-listing gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <div class="row">
                        <?php 
                            $entry->searchEntries($post_title);
                        ?>
                    </div>
                </div>
                <?php include('includes/sidebar.php') ?>
            </div>
        </div>
    </section>
    <script>

    </script>
    <?php include('includes/footer.php'); ?>
  </body>
</html>