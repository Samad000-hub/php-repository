<?php include "db.php" ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Front</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                <?php

                //query to get all data from category table in databse "cms" 
                $query = "SELECT * FROM category";

                //getting result of query
                $query_result=mysqli_query($connection,$query);

                //Reading one by one row from all result
                while($row=mysqli_fetch_assoc($query_result)){

                    //Getting category titles and we will show them in navigation bar
                    $cat_title=$row["cat_title"];

                    //Showing all categories in navigation bar
                    //{} use to write php in HTML
                    echo "<li><a href='#'>{$cat_title}</a></li>";

                }
                ?>

            <li><a href='admin'>Admin</a></li>

                </ul>

            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container -->
    
</nav>