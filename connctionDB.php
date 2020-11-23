<?php

$serverName = "localhost";
$userName = "root";
$password = "";

$conn = new PDO("mysql:host=$serverName;dbname=cafeteria_project", $userName, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
