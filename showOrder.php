<?php 

    require('./connctionDB.php');
    require('./htmlStructure.php');
    $id = $_GET['id'];
    // $counter = $_GET['counter'];

    try {
        
        $query = "SELECT product_name, price FROM products
        WHERE product_id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam("id", $id);
        $excute = $stmt->execute();
        $result = $stmt->fetchAll();

        foreach($result as $product) {
            echo "
            <div class='col-12 col-md-3'>" . $product['product_name'] ."</div>
            <div class='col-12 col-md-2' id='counter'> 1</div>
            <div class='col-12 col-md-3'>
                <div class='row'>
                <i class='fas fa-chevron-up fa-lg' onclick='upOrder()'> </i>
                </div>
                <div class='row'>
                <i class='fas fa-chevron-down fa-lg' onclick='downOrder()'> </i>
                </div>

            </div>
            <div class='col-12 col-md-4' id='productPrice' data-target=" . $product['price']. ">EGP " . $product['price'] . "</div>";
        }



    } catch (PDOException $th) {
        echo "Connection failed: " . $th->getMessage();
    }

