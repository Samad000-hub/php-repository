<?php 

        // Connecting with database for communication => portOfDatabase, username, password, databaseName
        $connection=mysqli_connect('localhost:3307','root','root','login');

    
        //query to insert username and password in database
        //username must same as name of column in database as we type column-name=username in database 
        //password must same as name of column in database as we type column-name=password in database
      $query_read="SELECT * FROM users";
  
      // running query 
      $result_read= mysqli_query($connection,$query_read);
  
      //checking user is created or not
      if(!$result_read){
          //Stop program
          die("Query is failed" . mysqli_error($connection));
      }else{
          echo "readed";
      }


      //Whether update button is clicked or not
    if(isset($_POST["update"])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $id=$_POST['id'];

        echo "update clicked";        

        //Query for update
        $query_update = " UPDATE users SET username = '$username' , password ='$password' WHERE id = $id ";
        
        
        //Making connection
        $result_update = mysqli_query($connection,$query_update);

        //Whether update is done or not
        if($result_update){
            echo " Record is updated ";
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
<form action="how-to-update-data-in-database.php" method="post">
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
  <button type="submit" name="update" class="btn btn-primary">Update Record</button>
</form>
</div>
</body>
</html>