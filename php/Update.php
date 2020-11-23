<?php
    $DB_HOST="localhost";
    $DB_USER="root";
    $DB_PASSWORD="";
    $DB_NAME="cafeteria_project";
    $conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME,3308);
    //to select and display the data of that id only ... "using the variable name .. ?product_id"
    $product_id=$_GET['product_id'];  
    $select_query="SELECT * FROM `products` WHERE `product_id`=$product_id";
    $result=mysqli_query($conn,$select_query);


    //fetch record and after edit...
    //for category selection 
    $category_query="SELECT * FROM `categories`";
    $category_result=mysqli_query($conn,$category_query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" href="../css/AddProduct.css">       <!-- CSS edited css-->
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
                
                    <img src="../images/admin-avatar.png" alt="Avatar" class="avatar">    <!--Images edited images-->
                

            </ul>
        </div>
<?php

while($row=mysqli_fetch_array($result)){

?>
<h1><center><font color=darkgoldenrod>Update Product</font></center></h1>
        <form action="Update.php?product_id=<?php echo $product_id ?>" method="POST" enctype="multipart/form-data">
            <label>Product</label>
            <input type="text" name="product-name" value="<?php echo $row['product_name']; ?>"></br></br>
            <label>Price</label>
            <input type="text" name="product-price" value="<?php echo $row['price']; ?>">
            <label>EGP</label></br></br>
            <label>Category</label>
            <select name="product-category" value="<?php echo $row['category'];?>">
                <option>Choose The category</option>
            <?php
                if($result){
                    while($row=mysqli_fetch_array($category_result)){
                        $category_name=$row['category'];
                        echo "<option>".$category_name."</option>";
                    }
                }
            ?>
            </select><a href="AddCategory.php" color=red> Add Category</a></br></br>
            <label>Picture</label>
            <input type="file" name="image"></br>  </br> 
            <input type="submit"  name="update" value="Update">
            <input type="reset" value="Reset">            
        </form>



        <!-- i want when i click on update button data updated & display the data updated in the table -->
<?php
}
if(isset($_POST['update'])){
    //submit --> update --> get the values
    if(isset($_GET['product_id'])){
        $product_id=$_GET['product_id'];  
    }
    if(isset($_POST['product-name'])){
        $product_name=$_POST['product-name'];
    }
    if(isset($_POST['product-price'])){
        $product_price=$_POST['product-price'];
    }
    if(isset($_FILES['image']['name'])){
        $Product_image=$_FILES['image']['name']; 
    }
    if(isset($_POST['product-category']))
    $product_category=$_POST['product-category'];
    $DB_HOST="localhost";
    $DB_USER="root";
    $DB_PASSWORD="";
    $DB_NAME="cafeteria_project";
    $conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME,3308);
    $update_query="UPDATE `products` 
                   SET    `product_name`='$product_name',
                          `price`='$product_price',
                          `product_profile`='$Product_image',
                          `category`='$product_category'
                   WHERE   `product_id`='$product_id'";


    $query_result=mysqli_query($conn,$update_query);  
    if($query_result){
        header("location:AllProducts.php");
    }else{
        echo "Please check your query!";
    }
                                
}
