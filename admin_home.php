<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #aaaaaa;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light" id="adminNav">
        <a class="navbar-brand" href="admin_home.php"><img src="images/logo3.jpg" alt="" width="70px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Manual Order</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Checks</a>
                </li>
            </ul>
        </div>
        <div class="col-auto ml-auto text-white" id="righNavbar">
            <span>
                <?php
                // connection with Data Base
                require('./connctionDB.php');

                try {
                    /**
                     * if user {
                     *      userImageQuery
                     * }else if admin {
                     *      adminImageQuery
                     *      $adminImageQuery = "SELECT profile_picture FROM users WHERE is_admin=1 LIMIT 1 ";
                     * }
                     * 
                     */
                    // $userImageQuery = "SELECT profile_picture FROM users WHERE is_admin=0 LIMIT 1 ";
                    $adminImageQuery = "SELECT profile_picture FROM users WHERE is_admin=1 LIMIT 1 ";
                    $queryStmt = $conn->prepare($adminImageQuery);
                    $resul = $queryStmt->execute();
                    $userImg = $queryStmt->fetch(PDO::FETCH_OBJ);
                    echo "<img src='images/" . $userImg->profile_picture . "' width='50' height= '50' style='border-radius: 30px;' >";
                    // $conn = null;


                } catch (PDOException $th) {
                    echo "Connection failed: " . $th->getMessage();
                }


                ?>
            </span>
            <span>Admin name</span>
        </div>

    </nav>

    <!-- start of fluid container -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <!------- my order, total price, Notes, Room Number  and confirm order ------->
            <div class="col-12 col-md-4" style="border: solid blue 1px;">

                <form class="orderForm">
                    <!-- first nested row  -->
                    <div class="row mt-3 mx-1" style="min-height: 100px; border: 1px solid;" id="myOrder">

                    </div>
                    <br><br>
                    <h4>Notes</h4>
                    <textarea name="notes" id="notesId" cols="27" rows="5"></textarea>
                    <br><br>
                    <label for="rooms">Room</label>
                    <select name="rooms" id="rooms">
                        <?php
                        require('./connctionDB.php');
                        try {
                            $roomQuery = "SELECT room_number 
                                    FROM users";

                            $roomStmt = $conn->prepare($roomQuery);
                            $excuteQuery = $roomStmt->execute();
                            while ($roomNo = $roomStmt->fetch(PDO::FETCH_OBJ)) {
                                echo "<option value='" . $roomNo->room_number . "'> " . $roomNo->room_number . "</option>";
                            }
                        ?>
                    </select>
                    <hr style="border-top: 1px solid rgba(0, 0, 0, 0.5);">

                <?php
                        } catch (PDOException $th) {
                            echo "Connection failed: " . $th->getMessage();
                        }
                ?>

                <!-- second nested row  -->
                <div class="row">
                    <div class="col-12 col-md-auto ml-md-auto" id='orderPrice'><strong>EGP </strong> </div>
                </div>

                <!-- third nested row  -->
                <div class="row">
                    <div class="col-12 col-md-auto ml-md-auto mt-5 mb-2">
                        <button type="button" id="confirmBtn">Confirm</button>
                    </div>
                </div>

                </form>
            </div>
            <!-- add to user and all products  -->
            <div class="col-12 col-md-8" style="border: solid blue 1px;">
                <div class="container-fluid">
                    <!-- first row  -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <h3>Add to user</h3>
                            <select class=" form-control col-12 col-md-6">
                                <?php
                                try {
                                    $userQuery = "SELECT `name` FROM users";

                                    $userStmt = $conn->prepare($userQuery);
                                    $excuteQuery = $userStmt->execute();
                                    while ($user = $userStmt->fetch(PDO::FETCH_OBJ)) {
                                        echo "<option value='" . $user->name . "'> " . $user->name . "</option>";
                                    }
                                ?>
                            </select>
                        <?php
                                } catch (PDOException $th) {
                                    echo "Connection failed: " . $th->getMessage();
                                }
                        ?>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid rgba(0, 0, 0, 0.5);">

                    <!-- second row, show all product -->
                    <div class="row mb-3">
                        <?php

                        try {
                            // show all products 
                            $selectQuery = "SELECT * FROM products";
                            $queryStatment = $conn->prepare($selectQuery);
                            $result = $queryStatment->execute();
                            $row = $queryStatment->rowCount(); // return int(number of rows)

                            while ($products = $queryStatment->fetch(PDO::FETCH_OBJ)) {

                                $allProducts[] = $products;
                            }
                            echo "
                                    <table border='1' cellpadding='10px'>
                                        <tr>
                                            <th>product_name</th>
                                            <th>price (EGP)</th>
                                            <th>category</th>
                                            <th>product_profile</th>
                                        </tr>";

                            foreach ($allProducts as $item) {
                                echo "<tr><td style='text-align:center' class='prodName'>" . $item->product_name . "</td>" .
                                    "<td>" . $item->price . " EGP</td>" .
                                    "<td>" . $item->category . "</td>" .
                                    "<td><img value=" . $item->product_id . " src='images/" . $item->product_profile . "' width='100px' height='100px' class='prodImg'></td></tr>";
                            }
                            echo "</table>";
                            // $conn = null;
                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }
                        ?>
                    </div>

                </div>
            </div>

        </div>
    </div>










    <script src="js/jQuery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>