<?php 

    // var_dump($_GET);
    // exit;
    
    // try {
    
        
    //     function showOrder() {
    //         $serverName = "localhost";
    //         $userName = "root";
    //         $password = "";
    
    //         $conn = new PDO("mysql:host=$serverName;dbname=cafeteria_project", $userName, $password); // PDO object 
    //         // set the PDO error mode to exception
    //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         $query = "SELECT product_name FROM products";
    //         $stmt = $conn->prepare($query); // PDO statment object { ["queryString"] => ...}
    //         // var_dump($stmt);
    //         // exit;
    //         $excute = $stmt->execute(); // return true or false
    //         // var_dump($stmt);
    //         // exit;
    //          // return stdClass object 
    //         // var_dump($result);
    //         // exit;

    //         while($result = $stmt->fetch(PDO::FETCH_OBJ)){
    //             echo $result->product_name . '<br>';
    //         }

    //     }

    //     // showOrder();

    // } catch(PDOException $th){
    //     echo "Connection failed: " . $th->getMessage();
    // }

    /**************************************************************** */
    require('./connctionDB.php');
    require('./htmlStructure.php');
    $id = $_GET['id'];
    // $counter = $_GET['counter'];
    
    

    try {
        
        $query = "SELECT product_name, price FROM products
        WHERE product_id = ?";

        $stmt = $conn->prepare($query);
        $excute = $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        foreach($result as $product) {
            echo "
            <div class='col-12 col-md-3'>" . $product['product_name'] ."</div>
            <div class='col-12 col-md-2' id='counter'> </div>
            <div class='col-12 col-md-3'>
                <div class='row'>
                <i class='fas fa-chevron-up' onclick='upOrder()'> </i>
                </div>
                <div class='row'>
                <i class='fas fa-chevron-down' onclick='downOrder()'> </i>
                </div>

            </div>
            <div class='col-12 col-md-4' id='productPrice' data-target=" . $product['price']. ">EGP </div>";
        }



    } catch (PDOException $th) {
        echo "Connection failed: " . $th->getMessage();
    }

