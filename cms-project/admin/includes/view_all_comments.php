<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Content</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>In Response to</th>
                                    <th>Approve</th>
                                    <th>UnApprove</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
<?php
$query_comments="SELECT * FROM comments";
$result_comments=mysqli_query($connection,$query_comments);

while($row=mysqli_fetch_assoc($result_comments)){
    $comment_id=$row['comment_id'];
    $comment_post_id=$row['comment_post_id'];
    $comment_author=$row['comment_author'];
    $comment_content=$row['comment_content'];
    $comment_email=$row['comment_email'];
    $comment_status=$row['comment_status'];
    $comment_date=$row['comment_date'];


    echo "<tr>";
    echo "<td>$comment_id</td>";
    echo "<td>$comment_author</td>";
    echo "<td>$comment_content</td>";


    // $query_category="SELECT * FROM category WHERE cat_id={$post_category_id} ";
    // $category_result=mysqli_query($connection,$query_category);
    // while($row_category=mysqli_fetch_assoc($category_result)){
    //     $cat_id=$row_category['cat_id'];
    //     $cat_title=$row_category['cat_title'];
        
    //     echo "<td>{$cat_title}</td>";
    // }

    






    echo "<td>$comment_email</td>";
    echo "<td>$comment_status</td>";
    echo "<td>$comment_date</td>";


    $query_title="SELECT * FROM posts WHERE post_id=$comment_post_id ";
    $query_title_result=mysqli_query($connection,$query_title);
    while($row=mysqli_fetch_assoc($query_title_result))
    {
        $post_id=$row['post_id'];
        $post_title=$row['post_title'];
        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";


    }

    

    echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
    echo "<td><a href='comments.php?unapprove={$comment_id}'>UnApprove</a></td>";
    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
    echo "</tr>";

}

?>

                                
                            </tbody>
                        </table>

<?php // For Deleting posts in admin
if(isset($_GET['delete'])){
 $the_post_id=$_GET['delete'];
 $query="DELETE FROM posts WHERE post_id={$the_post_id}";
 $query_result=mysqli_query($connection,$query);

 //Must redirect after delete query
 header("Location: posts.php");
}


// For deleting comments in admin
if(isset($_GET['delete'])){
    $the_comment_id=$_GET['delete'];
    $query="DELETE FROM comments WHERE comment_id={$the_comment_id}";
    $query_resul_comment=mysqli_query($connection,$query);
   
    //Must redirect after delete query
    header("Location: comments.php");
}

// If admin wants to unapprove comment, When admin click on it and update that comment_status 
if(isset($_GET['unapprove'])){
    $the_comment_id=$_GET['unapprove'];
    $query="UPDATE comments SET comment_status='UnApproved' WHERE comment_id={$the_comment_id} ";
    $query_resul_comment=mysqli_query($connection,$query);
   
    //Must redirect after delete query
    header("Location: comments.php");
}


// If admin wants to unapprove comment, When admin click on it and update that comment_status 
if(isset($_GET['approve'])){
    $the_comment_id=$_GET['approve'];
    $query="UPDATE comments SET comment_status='Approved' WHERE comment_id={$the_comment_id} ";
    $query_resul_comment=mysqli_query($connection,$query);
   
    //Must redirect after delete query
    header("Location: comments.php");
}

?>