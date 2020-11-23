<?php 
$DB_HOST="localhost";
$DB_USER="root";
$DB_PASSWORD="";
$DB_NAME="cafeteria_project";
$conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME,3308);
if($conn){
    $Add_query="INSERT INTO `categories` (`category`) 
                VALUES(?)"; 
    if(isset($_POST['new-category'])){
        $new_category=$_POST['new-category']; 
        $stmt=mysqli_prepare($conn,$Add_query); 
        mysqli_stmt_bind_param($stmt,"s",$new_category);  //pass param to the statement! 
        $result=mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);                                                //send a template of the query
    }
    if($Add_query){
        // header("location:AddProduct.php");     // it didn't go to addcategory page redirect !!!!! 
    }
}
mysqli_close($conn);

 
?>  
<!DocTYPE html>
<html>
    <head>
        <title>Add Category</title>
        <link rel="stylesheet" href="../css/AddProduct"  >    <!--CSS edited css-->
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
                
                    <img src="../images/admin-avatar.png" alt="Avatar" class="avatar">  <!--Images edited images-->
                

            </ul>
        </div>
        <h1><center><font color="darkgoldenrod">Add New Category</font></center></h1>
        <form  action="AddCategory.php" method="POST"  enctype="multipart/form-data">
               <input type="text" class="new-cat" name="new-category" placeholder="Type New Category Name..">
               <input type="submit" class="new-cat" name="add-new-cat" value="Add">
        </form>
    
    </body> 
    
</html> 

