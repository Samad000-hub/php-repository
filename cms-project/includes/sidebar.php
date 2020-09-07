

<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>

    <form action="search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" name="submit" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        <!-- /.input-group -->

    </form>

</div>

<?php 

                $query = "SELECT * FROM category";

                //getting result of query
                $query_result=mysqli_query($connection,$query);


?>


<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php
            while($row=mysqli_fetch_assoc($query_result)){

                //Getting category titles and we will show them in navigation bar
                $cat_title=$row["cat_title"];
                $cat_id=$row["cat_id"];

                //Showing all categories in navigation bar
                //{} use to write php in HTML
                echo "<li><a href='./category.php?category=$cat_id'>{$cat_title}</a></li>";

            }
            ?>

            </ul>

        </div>
        <!-- /.col-lg-12 -->
        
        
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widget.php";  ?>

</div>