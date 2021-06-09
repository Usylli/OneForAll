<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Posts
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Posts
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Post ID: </th>
                                <th> Post Title: </th>
                                <th> Post Image: </th>
                                <th> Post author_id: </th>
                                <th> Post excerpt: </th>
                                <th> Post date: </th>
                                <th> Post content: </th>
                                <th> Post category_id: </th>
                                <th> Post views: </th>
                                <th> Post delete: </th>
                                <th> Post edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from posts";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $post_id = $row_pro['post_id'];
                                    
                                    $post_title = $row_pro['title'];
                                    
                                    $post_img1 = $row_pro['picture'];
                                    
                                    $post_author_id = $row_pro['author_id'];

                                    $post_excerpt = $row_pro['excerpt'];
                                    
                                    $post_content = $row_pro['content'];
                                    
                                    $post_date = $row_pro['date'];
                                    
                                    $post_category = $row_pro['category_id'];

                                    $post_views = $row_pro['views'];

                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $post_title; ?> </td>
                                <td> <img src="<?php echo $post_img1; ?>" width="60" height="60"></td>
                                <td> <?php echo $post_author_id; ?> </td>
                                <td> <?php echo $post_excerpt;?> 
                                </td>
                                
                                <td> <?php echo $post_date ?> </td>
                                <td> <?php echo $post_content; ?> </td>
                                <td> <?php echo $post_category; ?> </td>
                                <td> <?php echo $post_views; ?> </td>
        
                                <td> 
                                     
                                     <a href="index.php?delete_post=<?php echo $post_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?edit_post=<?php echo $post_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>