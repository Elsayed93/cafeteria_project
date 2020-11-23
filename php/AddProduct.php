
<?php
$conn=mysqli_connect('localhost','root','','cafeteria_project',3308);
$query="SELECT * FROM `categories`";
$result=mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" href="../css/AddProduct.css">
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
        <div class="form">
        <h1><font color=darkgoldenrod>Add Product</font></h1>
        <form action="AddProduct.php" method="POST" enctype="multipart/form-data">
            <label>Product</label>
            <input type="text" name="product-name" placeholder="Type The Product Name"></br></br>
            <label>Price</label>
            <input type="number" name="product-price" step="1" placeholder="Type The Price">
            <label>EGP</label></br></br>
            <label>Category</label>
            <select name="product-category">
                <option>Choose The category</option>
            <?php
                if($result){
                    while($row=mysqli_fetch_array($result)){
                        $category_name=$row['category'];
                        echo "<option>".$category_name."</option>";
                    }
                }
            ?>
            </select><a href="AddCategory.php"> Add Category</a></br></br>
            <label>Picture</label>
            <input type="file" name="image"></br>  </br>  
            <input type="submit" value="Save">
            <input type="reset" value="Reset"> 
        </form>
        </div>
    </body>
</html>


<?php

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_NAME","cafeteria_project");
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,3308);
if($conn){
//   echo "db connected";
    $insert_query="INSERT INTO `products` (`product_name`,`price`,`category`,`product_profile`)
    VALUES(?,?,?,?)";                                                  //send a template of the query
if(isset($_POST['product-name'])){
    $product_name= $_POST['product-name'];
}

if(isset($_POST['product-price'])){
    $product_price= $_POST['product-price'];                    //didn't send the data to tha database!!

}
if(isset($_POST['product-category'])){
    $product_category=$_POST['product-category'];

}
if(isset($_FILES['image']['name'])){
    $Product_image=$_FILES['image']['name']; 
}


$stmt=mysqli_prepare($conn,$insert_query);   //prepare statment.
mysqli_stmt_bind_param($stmt,"ssss",$product_name,$product_price,$product_category,$Product_image);  //pass param to the statement! 
$result=mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
if($result){
    header("location:AllProducts.php");
}
    }
else
{
  echo "Can't connected to a database,Please check your credentials!";
}
mysqli_close($conn);

