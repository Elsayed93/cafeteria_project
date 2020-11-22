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
                    <a class="nav-link active" href="orders.php">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="orders.php">Users <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="orders.php">Manual Users<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="orders.php">Checks<span class="sr-only">(current)</span></a>
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
    <?php
     $selectUsers = "SELECT * FROM `users` ";
            $queryStatment1= $conn->prepare($selectUsers);
            $result = $queryStatment1->execute();
            $row = $queryStatment1->rowCount();
            // var_dump($row);

            while ($users = $queryStatment1->fetch(PDO::FETCH_OBJ)) {
                $usersData[]=$users;
            } 
            
            
            ?>
     




 <div class="d-flex justify-content-center m-5">
        <div class="alert alert-light" role="alert">
            <h3 class="display-5"> All Users</h3>
             <table class="table table-hover">
                        <tbody>
                            <tr class="">                
                                <th>User Name</th>
                                <th>Room</th>
                                <th>Image</th>
                                <th>Ext</th>
                                <th>Action</th>
                            </tr>
                            <?php
                             foreach ($usersData as $user) {
                                    echo "<tr>
                                            <td>$user->name</td>".
                                            "<td>" . $user->room_number . "</td>".
                                            "<td><img  src='images/".  $user->profile_picture ." ' class='usersImg'></td>".
                                            "<td>" . $user->EXT     . "</td>" .
                                            "<td> <div class='d-inline-flex' ><form action='editRow.php' method='POST'> <button class='btn btn-default btn-lg'><i class='fas fa-pen mr-2'></i></button></form>
                                             <form action='deleteRow.php' method='GET'> <button class='btn btn-default btn-lg' id='delete'> <i class='fas fa-trash'></i></button></form></div> </td>".
                                        "</tr>";
                                } ?>
                        </tbody>
                        
                    </table>
        </div>
 </div>
<div class="d-flex justify-content-center m-5">
        <div class="alert alert-light" role="alert">
        <a href="addUser.php"> <button class="badge-dark border-light border-secondary" > Add User  </button></a>
        </div>
</div>

                  <!-- Footer -->
    <footer class="page-footer font-small indigo">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 border-info bg-light">© 2020 Copyright:
            <a href="#" class=" light"> Cafeteria.com</a>

        </div>
        <!-- Copyright -->

    </footer>
                <!-- Footer -->

  <script src="js/main.js"></script>
  <script src="js/fontawesome.min.js"></script>  
  <script src="js/jquery.js"></script>
</body>
</html>