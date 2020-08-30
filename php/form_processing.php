<?php 
if(isset($_POST["Submit"])){
    $names=array("Samad", "Ahmed","Mahmood","Ali");
    $username=$_POST["username"];
    $password=$_POST["password"];
    if(in_array($username,$names)){
        echo "Hello" . $username;
        echo $password;
    }
    else{
        echo "Sorry this username is not allowed";
    }
}



?>