<?php

//command to connect with database
$connection=mysqli_connect('localhost:3307','root','root','cms');

//Whether connected or not
if(!$connection){

    echo "Database is not connected";
}

?>