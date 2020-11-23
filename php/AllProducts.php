<!DOCTYPE html>
<html>
    <head>
        <title>All Products</title>
        <link rel="stylesheet" href="../css/AllProducts.css">
    </head>
    <body>
        <div class="nav">
            <ul>
                <li><a href="#" class="nav-element">
                    Home
                </a></li>
                <li><a href="AllProducts.php" class="nav-element">
                    Products
                </a></li>
                <li><a href="#" class="nav-element">
                    Users
                </a></li>
                <li><a href="#" class="nav-element">
                    Manual Order
                </a></li>
                <li><a href="#" class="nav-element">
                    Checks
                </a></li>
                <li><a href="#" class="nav-element">
                    Admin
                </a></li>
                
                    <img src="../images/admin-avatar.png" alt="Avatar" class="avatar">
              

            </ul>
        </div>
        <h1><font color=darkgoldenrod>All Products</font></h1>
        <h4><font color=darkgoldenrod><a href="AddProduct.php">Add Product</a></font></h4>
        <table border='1px solid black' width='500px' id='products'><tr><td align='center'>Product</td>
                     <td align='center'>Price</td>
                     <td align='center'>Image</td>
                     <td align='center'>Action</td><tr>

        <script src="../jS/Product.js"></script>
    </body>
</html>

<?php

$DB_HOST="localhost";
$DB_USER="root";
$DB_PASSWORD="";
$DB_NAME="cafeteria_project";
$conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME,3308);

if($conn){
  
    $select_query="SELECT * FROM `products`";
    $result=mysqli_query($conn,$select_query);  
    
    while($row=mysqli_fetch_array($result)){

      ?>
  <tr>
    <td align='center'><?php echo $row['product_name']; ?></td>
    <td align='center'><?php echo $row['price']; ?></td>
    <?php 
          echo "<td align='center'><img src='../images/".$row['product_profile']."' width='100px' height='100px' border-radius='50%'></td>";             
          echo"<td align='center'><a href='update.php?product_id=".$row['product_id']."'>Edit|</a><a href='Delete.php?product_id=".$row['product_id']."'>|Delete</a></td></tr>";
          echo "</tr>"; ?>
  <?php
      }
      ?>
      </table>
      <?php 
      mysqli_free_result($result);
 }
 else{
     echo "Can't connected to a database,Please check your credentials!";
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

mysqli_close($conn); ?>

