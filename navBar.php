<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="/cafeteria_project/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
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
    <!----------------------- start of navbar -------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar1">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="user_home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">My Orders</a>
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
                    $userImageQuery = "SELECT profile_picture FROM users WHERE is_admin=0 LIMIT 1 ";
                    // $adminImageQuery = "SELECT profile_picture FROM users WHERE is_admin=1 LIMIT 1 ";
                    $queryStmt = $conn->prepare($userImageQuery);
                    $resul = $queryStmt->execute();
                    $userImg = $queryStmt->fetch(PDO::FETCH_OBJ);
                    echo "<img src='images/" . $userImg->profile_picture . "' width='50' height= '50' style='border-radius: 30px;' >";
                    // $conn = null;


                } catch (PDOException $th) {
                    echo "Connection failed: " . $th->getMessage();
                }


                ?>
            </span>
            <span>user name</span>
        </div>
    </nav>
    <!----------------- end of navbar ---------------------->