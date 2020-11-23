<?php

    require('./connctionDB.php');
    try {
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';
        $myOrder = $_POST['myOrder'];
        $userNotes = $_POST['userNotes'];
        $roomNo = $_POST['roomNo'];
        $orderPrice = $_POST['orderPrice'];

        $insertQuery = "BEGIN;
            INSERT INTO orders (notes, amount)
            VALUES('{$userNotes}', {$orderPrice});
            INSERT INTO users (room_number) 
            VALUES(114);
            COMMIT;";

            $stmt = $conn->prepare($selectQuery);
            $result = $stmt->execute();
            $row = $stmt->rowCount();
            $result = $stmt->fetchAll();

        
    } catch (PDOException $th) {
        echo "Connection failed: " . $th->getMessage();
    }
// 


