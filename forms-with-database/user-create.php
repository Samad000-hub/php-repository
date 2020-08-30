<?php
//Check whether user click on submit buttonn or not
if(isset($_POST["submit"])){

    //get username which user is entered
      $username=$_POST["username"];
  
      // get password which user is entered
      $password=$_POST["password"];


      // To avoid attack on this form attackers(SQL injection)
      $username=mysqli_real_escape_string($connection,$username);
      $password=mysqli_real_escape_string($connection,$password);
  
    // Connecting with database for communication => portOfDatabase, username, password, databaseName
      $connection=mysqli_connect('localhost:3307','root','root','login');


      //Password encryption
      $hashFormat="$2y$10$";
      $salt="isamadmahmoodsamad";
      $hashFormat_and_salt=$hashFormat . $salt;
      $password=crypt($password,$hashFormat_and_salt);

    
      //query to insert username and password in database
      //username must same as name of column in database as we type column-name=username in database 
      //password must same as name of column in database as we type column-name=password in database
    $query="INSERT INTO users(username,password)";
    $query .= " VALUES ('$username','$password') ";

    // running query 
    $result= mysqli_query($connection,$query);

    //checking user is created or not
    if($result){
        echo "New User is created";
    }else{
        //Stop program
        die("Query is failed" . mysqli_error($connection));
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
<form action="user-create.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Enter your username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter your Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>