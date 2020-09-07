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

                if(isset($_GET['p_id'])){

                    $post_id=$_GET['p_id'];

                }

                //query to get all data from post table in databse "cms"
                $query = "SELECT * FROM posts WHERE post_id=$post_id ";

                //getting result of query
                $query_result_all_posts=mysqli_query($connection,$query);

                //Reading one by one row from all result
                while($row=mysqli_fetch_assoc($query_result_all_posts)){

                    //Getting post title one by one
                    $post_title=$row["post_title"];

                    //Getting post author
                    $post_author=$row["post_author"];

                    //Getting date of post
                    $post_date=$row["post_date"];

                    //Getting image of every post
                    $post_image=$row["post_image"];

                    //Getting content of every post
                    $post_content=$row["post_content"];
                ?>
                    
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
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

                


                <!-- Blog Comments -->

                    <?php
                        if(isset($_POST['create_comment'])){
                            $post_id=$_GET['p_id'];
                            $comment_author=$_POST['comment_author'];
                            $comment_email=$_POST['comment_email'];
                            $comment_content=$_POST['comment_content'];

                            $query = "INSERT INTO comments (comment_post_id, comment_author, 
                                    comment_email, comment_content, comment_status, comment_date) " ;

                            $query .= " VALUES ($post_id, '{$comment_author}', '{$comment_email}',
                                    '{$comment_content}', 'unapproved', now() ) " ;

                            $create_comment_query=mysqli_query($connection,$query);


                            $query_comment_count  = "UPDATE posts SET post_comment_count=post_comment_count +1 " ;
                            $query_comment_count .= "WHERE post_id=$post_id ";
                            $query_comment_count_result= mysqli_query($connection,$query_comment_count);

                        }
                    ?>


                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">

                        <div class="form-group">
                            <label for="comment_author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

<?php
$query = "SELECT * FROM comments WHERE comment_post_id=$post_id ";
$query .= "AND comment_status = 'Approved' ";
$query .= "ORDER BY comment_id DESC ";
$select_comment_query= mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_comment_query)){
$comment_content=$row['comment_content'];
$comment_date=$row['comment_date'];
$comment_author=$row['comment_author'];

?>

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author; ?>
            <small><?php echo $comment_date; ?></small>
        </h4>
        <?php echo $comment_content; ?>
    </div>
</div>

<?php } ?>

                
            
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php"; ?>