<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/log.jpg" type="image/x-icon">
    <style>
        .usersImg{
            width: 50px;
            height: 50px;
            border-radius:20px ;
        }
        #adminImage{
          width: 50px;
          height: 50px;
        }
    </style>
</head>
               <!-- header -->
<body class="text-center">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <img class="navbar-brand" src="iimages/" aria-placeholder="logoImage" href="#">Logo</img>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="users.php">Users <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Manual Users<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Checks<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="navbar-text">
                <img src="images/admin.png" id="adminImage" class="mr-3" alt="adminImage">
                <a href="">adminName</a>
            </span>
        </div>
    </nav>


           <!-- Connect With DB -->
     <?php include'DataBase file/configDB/config.php'; ?>

           <!-- Selection For Users -->
    
 </div>
<div class="d-flex justify-content-center m-5 ">
  <div class="alert alert-light " role="alert">
  <form class="needs-validation" action="addUser.php" method="POST">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">UserID</label>
      <input type="text" class="form-control" id="validationCustom01" name="user_id" placeholder="ex:1020"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Name</label>
      <input type="text" class="form-control" id="validationCustom02" name="name" placeholder="ex:Omar" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Email</label>
      <input type="email" class="form-control" id="validationCustom02" name="email" placeholder="examp@caf.com" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
       
  <div class="col-md-4 mb-3">
      <label for="validationCustom02">Password</label>
      <input type="password" class="form-control" id="validationCustom02" name="password" placeholder="*******" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Room Num</label>
      <input type="text" class="form-control" id="validationCustom02" name="room_number" placeholder="gh123" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">EXT</label>
      <input type="text" class="form-control" id="validationCustom02" name="EXT" placeholder="+0212345" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
 <div class="col-md-6 mb-3">
      <label for="validationCustom02">Profile Image</label>
      <input type="text" class="form-control" id="validationCustom02" name="profile_picture" placeholder="iti.png" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Admin Permission</label>
      <input type="text" class="form-control" id="validationCustom02" name="is_admin" placeholder="0 Or 1" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
        </div>
</div>
<div>
<?php
// $data = $_POST;
// print_r($data) ;
if ($_POST) {
  $id=$_POST['user_id'];  
  $name=$_POST['name'];
  $email=$_POST['email'];
  $passWord=sha1($_POST['password']);
  $room_num=$_POST['room_number'];
  $ext=$_POST['EXT'];
  $img=$_POST['profile_picture'];
  $isAdmin=$_POST['is_admin'];
}else{
  echo "<h3>Please Insert Data</h3>"; 
}
// var_dump($_POST);
// exit;

// var_dump($id);
// var_dump($name);
// var_dump($email);
// var_dump($passWord);
// var_dump($room_num);
// var_dump($img);
// var_dump($isAdmin);
// exit;

$insertQuery = "INSERT INTO `users`(`user_id`, `name`, `email`, `password`, `room_number`, `EXT`, `profile_picture`, `is_admin`) 
            VALUES (:id,:namee,:mail,:pass,:rmno,:ext,:img,:isadmin)";

        $queryStatmentInsert = $conn->prepare($insertQuery);
        
        // var_dump($queryStatmentInsert);
        $queryStatmentInsert->bindParam("id",$id);
        $queryStatmentInsert->bindParam("namee",$name);
        $queryStatmentInsert->bindParam("mail",$email);
        $queryStatmentInsert->bindParam("pass",$passWord);
        $queryStatmentInsert->bindParam("rmno",$room_num);
        $queryStatmentInsert->bindParam("ext",$ext);
        $queryStatmentInsert->bindParam("img",$img);
        $queryStatmentInsert->bindParam("isadmin",$isAdmin);

        //query execution 
        $result0 = $queryStatmentInsert->execute()or die(print_r($queryStatmentInsert->errorInfo(), true));
               var_dump($result0);
 ?>
</div>


  
 

 
  <script src="js/fontawesome.min.js"></script>  
  <script src="js/jquery.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
<!-- INSERT INTO `users`(`user_id`, `name`, `email`, `password`, `room_number`, `EXT`, `profile_picture`, `is_admin`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8]) -->