<?php
    
    // Connecting with database for communication => portOfDatabase, username, password, databaseName
      $connection=mysqli_connect('localhost:3307','root','root','login');

    
      //query to insert username and password in database
      //username must same as name of column in database as we type column-name=username in database 
      //password must same as name of column in database as we type column-name=password in database
    $query="SELECT * FROM users";
    

    // running query 
    $result= mysqli_query($connection,$query);

    //checking data has been read from database or not
    if(!$result){
        //Stop program
        die("Query is failed" . mysqli_error($connection));
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
<?php    

    // Fetching rows from database one by one and storing in $row variable 
    while($row=mysqli_fetch_array($result)){

?>
        <pre>
        // printing one record in associated row format
        <?php
        print_r($row);
    }
?>
        </pre>
</div>
</body>
</html>