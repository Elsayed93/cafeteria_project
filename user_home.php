<?php
require('./navBar.php');
?>
<!-- start of fluid container -->
<div class="container mt-5 mb-5">
    <div class="row">
        <!------- my order, total price, Notes, Room Number  and confirm order ------->
        <div class="col-12 col-md-4" style="border: solid blue 1px;">

            <form class="orderForm">
                <!-- first nested row  -->
                <!---------------------- my Order --------------- -->
                <div class="row mt-3 mx-1" style="min-height: 100px; border: 1px solid;" id="myOrder">

                </div>
                <br><br>
                <h4>Notes</h4>
                <textarea name="notes" id="notesId" cols="27" rows="5"></textarea>
                <br><br>
                <label for="rooms">Room</label>
                <select name="rooms" id="rooms">
                    <?php
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
                <div class="col-12 col-md-auto ml-md-auto mt-5">
                    <button type="button" id="confirmBtn">Confirm</button>
                </div>
            </div>

            </form>

        </div>


        <!------ latest order and MENU ------->
        <div class="col-12 col-md-8">
            <h3>Latest Order</h3>
            <?php

            try {

                $latestOrderQuery = "SELECT o.order_id, product_name, product_quantity
                        FROM orders o, orders_products op
                        WHERE o.order_id = op.order_id 
                        AND o.order_date = (SELECT MAX(order_date) FROM orders)
                        GROUP BY op.product_name";

                $queryStatment1 = $conn->prepare($latestOrderQuery);
                $result1 = $queryStatment1->execute();

                while ($order = $queryStatment1->fetch(PDO::FETCH_OBJ)) {

                    $lastOrder[] = $order;
                }

                echo "<table border='1' cellpadding='5px'>
                        <tr>
                            <th>order_Id</th>
                            <th>product_name</th>
                            <th>product_quantity</th>
                        </tr>";

                foreach ($lastOrder as $item) {
                    echo "<tr><td>" . $item->order_id . "</td>" .
                        "<td>" . $item->product_name . "</td>" .
                        "<td>" . $item->product_quantity . "</td></tr>";
                }
                echo "</table>";
                // $conn = null;
            } catch (PDOException $th) {
                echo "Connection failed: " . $th->getMessage();
            }
            ?>

            <hr style="border-top: 1px solid rgba(0, 0, 0, 0.5);">

            <!----------------------- showing all products ---------------------------->
            <h3>MENU</h3>
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
                        <table border='1' cellpadding='10px' id='allProducts'>
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


<?php /* 
        function showOrder() {
            $serverName = "localhost";
            $userName = "root";
            $password = "";
    
            $conn = new PDO("mysql:host=$serverName;dbname=cafeteria_project", $userName, $password); // PDO object 
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT product_name FROM products";
            $stmt = $conn->prepare($query); // PDO statment object { ["queryString"] => ...}
            // var_dump($stmt);
            // exit;
            $excute = $stmt->execute(); // return true or false
            // var_dump($stmt);
            // exit;
             // return stdClass object 
            // var_dump($result);
            // exit;

            while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                echo $result->product_name . '<br>';
            }

        }*/

?>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/main.js"></script> -->
<script src="js/main2.js"></script>
</body>

</html>