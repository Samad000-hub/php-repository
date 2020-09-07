<form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>

                                    <?php // Show category when we click on edit 
                                    
                                    if(isset($_GET['edit'])){
                                       
                                       $cat_id=$_GET['edit'];
                                        
                                        $query="SELECT * FROM category WHERE cat_id=$cat_id ";
                                        
                                        $query_edit=mysqli_query($connection,$query);

                                        

                                        // Feting all rows from database
                                        while($row=mysqli_fetch_assoc($query_edit)){
                                            $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];

                                        ?>
                                        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                                    
                                        <?php }} ?>

                                        
                                        <?php // Updating categories after editing
                                        
                                        if(isset($_POST["update_category"])){
                                            $the_cat_title=$_POST['cat_title'];
                                            $query_delete="UPDATE category SET cat_title= '{$the_cat_title}' WHERE cat_id={$cat_id} ";
                                            $query_delete_result=mysqli_query($connection,$query_delete);
                                            header("Location: categories.php");
                                            
                                        }
                                        
                                        
                                        ?>




                                </div>

                                <div class="form-group">
                                    <input type="submit" name="update_category" value="Update Category">
                                
                                </div>
                            </form>