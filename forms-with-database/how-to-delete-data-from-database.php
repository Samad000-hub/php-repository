<?php 

        // Connecting with database for communication => portOfDatabase, username, password, databaseName
        $connection=mysqli_connect('localhost:3307','root','root','login');

    
        //query to insert username and password in database
        //username must same as name of column in database as we type column-name=username in database 
        //password must same as name of column in database as we type column-name=password in database
      $query_read="SELECT * FROM users";
  
      // running query 
      $result_read= mysqli_query($connection,$query_read);
  
      //checking user is read or not
      if(!$result_read){
          //Stop program
          die("Query is failed" . mysqli_error($connection));
      }else{
          echo "readed";
      }

      // Whete button is clicked or not
    if(isset($_POST["delete"])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $id=$_POST['id'];

        echo "clicked";        

        // Delete query
        $query_delete = " DELETE FROM users WHERE id = $id ";
        //$query_update .= "  ";
        //$query_update .= "  ";
        //$query_update .= "  ";
        
        
      //Connection
        $result_delete = mysqli_query($connection,$query_delete);

        //Whether record is deleted or not
        if($result_delete){
            echo " Record is delete ";
        }else{
            echo "Query is failed. Try Again";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
<form action="how-to-delete-data-from-database.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Enter your username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter your Password">
  </div>

  <div class="form-group">
    <select name="id" >

<?php

// Fetching row one by one from database and storing in $row variable
while($row=mysqli_fetch_assoc($result_read)){
    
    // Getting id one by one from database and storing in $id variable
    $id=$row['id'];

    //Showing all id's in form
    echo "<option value='$id'>$id</option>";

}
?>

    </select>
  </div>
  <button type="submit" name="delete" class="btn btn-primary">Delete Record</button>
</form>
</div>
</body>
</html>