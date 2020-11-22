<?php 
     include'DataBase file/configDB/config.php';
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }
  // delete comment fromd database
  if (isset($_GET['delete'])) {
  	$id = $_GET['id'];
  	$sql = "DELETE FROM users WHERE user_id=" . $id;
  	mysqli_query($conn, $sql);
  	exit();
  }

?>