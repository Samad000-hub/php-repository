<?php include "includes/header.php"; ?>
<?php include "includes/db.php" ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


            <?php

                if(isset($_GET['category'])){
                    $post_category_id=$_GET['category'];

                }

                //query to get all data from post table in databse "cms"
                $query = "SELECT * FROM posts WHERE post_category_id=$post_category_id ";

                //getting result of query
                $query_result_all_posts=mysqli_query($connection,$query);

                //Reading one by one row from all result
                while($row=mysqli_fetch_assoc($query_result_all_posts)){

                    $post_id=$row["post_id"];

                    //Getting post title one by one
                    $post_title=$row["post_title"];

                    //Getting post author
                    $post_author=$row["post_author"];

                    //Getting date of post
                    $post_date=$row["post_date"];

                    //Getting image of every post
                    $post_image=$row["post_image"];

                    //Getting content of every post
                    $post_content=substr($row["post_content"],0,100);
                ?>
                    
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <!-- Ending while loop -->
                <?php } ?>
            
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php"; ?>