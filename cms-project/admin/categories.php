
<?php include "../includes/db.php" ?>
<?php include "includes/header.php"; ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>


                        <div class="col-xs-6">

                            <?php  // Inserting Categories in admin page.
                                if($_POST['submit']){
                                    
                                    
                                    $cat_title=$_POST['cat_title'];
                                    if($cat_title == "" || empty($cat_title)){
                                        echo "This field should not be empty";
                                    }else{

                                        $query="INSERT INTO category(cat_title) ";
                                        $query .= "VALUE('$cat_title') ";
                                       
                                        $create_category_query=mysqli_query($connection,$query);
                                        
                                        if(!$create_category_query){
                                            echo "Query is not perfect ";
                                        }

                                    }

                                }

                            ?>
                            <!--Form to add category in categories table-->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">

                                </div>

                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category">
                                
                                </div>
                            </form>

                            
                                <?php // Updating Categories after editing in admin area 
                                
                                if(isset($_GET['edit'])){
                                    $cat_id=$_GET['edit'];
                                    include "includes/update_categories.php";

                                }
                                
                                ?>


                        </div>


                        <div class="col-xs-6">


                            <!--Table for categories in admin area-->
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
<?php // Find All Categories

            $query = "SELECT * FROM category";

            //getting result of query
            $select_categories=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_categories)){

                $cat_id=$row["cat_id"];
                //Getting category titles and we will show them in navigation bar
                $cat_title=$row["cat_title"];

                //Showing all categories in navigation bar
                //{} use to write php in HTML
                    echo "<tr><td>{$cat_id}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                    echo "</tr>";

            }
?>


<?php  // To delete category

if(isset($_GET["delete"])){
$the_cat_id=$_GET['delete'];
$query_delete="DELETE FROM category WHERE cat_id={$the_cat_id} ";
$query_delete_result=mysqli_query($connection,$query_delete);
header("Location: categories.php");

}



?>

                                </tbody>
                            </table>


                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<!--Adding footer-->
<?php include "includes/footer.php" ?>