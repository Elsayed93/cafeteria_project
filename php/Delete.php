<?php

$DB_HOST="localhost";
$DB_USER="root";
$DB_PASSWORD="";
$DB_NAME="cafeteria_project";
$conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME,3308);



if ($conn) {

    // echo "connected";
    $product_id = $_GET['product_id'];
    $delete_query="DELETE FROM products WHERE product_id=$product_id";
    if (mysqli_query($conn,$delete_query)){
        header("Location:AllProducts.php");
        
    }else{
        echo " #1451 - Cannot delete or update a parent row: a foreign key constraint fails (`cafeteria_project`.`orders_products`, CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`))";
    }
}
else{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?> 