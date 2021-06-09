<div class="col-lg-4 m-15px-tb blog-aside">
    <!-- Author -->
    <div class="widget widget-author">
        <div class="widget-title">
            <h3>Hello, user!</h3>
        </div>
        <div class="widget-body">
            <div class="media align-items-center justify-content-center">
                <div class="avatar">
                    <img src="img/typewriter.svg" title="" alt="">
                </div>
            </div>
            <p>Do you want to talk about your project or interesting experience? Publish the material on <span style="color:rgb(211, 191, 101);">One</span>For<span style="color:rgb(72, 165, 49);">All</span></p>
            <center><a class="form-control my-2" href="write_post.php">I want to try it!</a></center>
        </div>
    </div>
    <!-- End Author -->

    <!-- Trending Post -->
    <div class="widget widget-latest-post">
        <div class="widget-title">
            <h3>Trending Now</h3>
        </div>
        <div class="widget-body">
            <?php $entry->getPopularEntries();?>
        </div>
    </div>
    <!-- End Trending Post -->
</div>