<?php 
  $host="localhost";
  $username="root";
  $password="";
  $db="projectphp";

    ## create an object from PDO class
 $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password); 


    if($conn) {
 
                
        
    }else {
        echo "Failed connection";
    }