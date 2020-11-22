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
                    <a class="nav-link active" href="#">My Orders <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="navbar-text">
                <img src="images/admin.png" id="adminImage" class="mr-3" alt="adminImage">
                <a href="">adminName</a>
            </span>
        </div>
    </nav>
                     <!-- End header -->


                    <!-- Form Of Date -->

    <?php
        $s_date = 'startDate';
        $e_date = 'endDate';
    ?>

    <form class="d-flex justify-content-center m-5" index.php" method="POST">
        <div class="form-row " id="formDate">
            <div class="col">
                <input type="date" class="form-control" placeholder="dateFrom" name="<?php echo $s_date;?>">
            </div>
            <div class="col">
                <input type="date" class="form-control" placeholder="dateTo"  name="<?php echo $e_date;?>">
            </div>
            <div class="col">
                <input type="submit" class="form-control"  value="GetData">
            </div> 
            <div class="col" >
                <input type="reset" class="form-control"  value="Reset">
            </div>
            
        </div>
    </form>
                     
                     <!-- End Form -->

                     <!-- include DataBase Config -->
    <?php
    $getStartDate = $_POST[$s_date]; 
    $getEndDate = $_POST[$e_date];
            
         
    

        if (empty ($getStartDate&&  $getEndDate)) {
            ?>
            <?php
                echo '<h5 class="display-3">choose the start date and the end date</h5>';
            ?>
            
        <?php
        }else {
            
            $dataBaseConnection = include 'DataBase file\configDB\config.php';
            $selectQuery = "SELECT * FROM `orders` WHERE order_date BETWEEN '$getStartDate' AND '$getEndDate'";
            $queryStatment= $conn->prepare($selectQuery);
            $result2 = $queryStatment->execute();
            $row = $queryStatment->rowCount();

            while ($orders = $queryStatment->fetch(PDO::FETCH_OBJ)) {
                $ordersData[]=$orders;
            } ?>
            <!-- Display Data -->
            <div class="d-flex justify-content-center m-5">
                <div class="alert alert-light" role="alert">
                    Orders From <?php if ($getStartDate) {
                echo'<font color=purple >'. $getStartDate.'</font>';
            } else {
                echo 'Start Date';
            } ?>
                                        To  
                                <?php if ($getEndDate) {
                echo'<font color=purple >'. $getEndDate.'</font>';
            } else {
                echo 'end Date';
            } ?>
                    <table class="table table-hover">
                        <tbody>
                            <tr class="">                
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            //   <!-- selection Data From DataBase -->
                                foreach ($ordersData as $order) {
                                    echo "<tr>
                                            <td><button class='btn bg-transparent ' type='submit' name='date'>" . $order->order_date . "</button></td>".
                                            "<td>" . $order->status     . "</td>".
                                            "<td>" . $order->amount     . "</td>".
                                            "<td>" . $order->action     . "</td>
                                        </tr>";
                                } ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        <?php
        }
        ?>
        
     
    <div class="d-flex justify-content-center m-5">
        <div class="alert alert-light" role="alert">
            Order You Display It.
            <?php echo $_GET['date'] ;?>


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

   
  <script src="js/fontawesome.min.js"></script>  
  <script src="js/jquery.js"></script>
  <script src="js/main.js"></script>
</body>
</html>