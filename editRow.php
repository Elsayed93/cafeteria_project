<?php

  if (isset($_POST[''])) {
  	 $id=$_POST['user_id'];  
  $name=$_POST['name'];
  $email=$_POST['email'];
  $passWord=sha1($_POST['password']);
  $room_num=$_POST['room_number'];
  $ext=$_POST['EXT'];
  $img=$_POST['profile_picture'];
  $isAdmin=$_POST['is_admin'];
  	$sql = "UPDATE comments SET `user_id`='{$id}', `name`='{$name}', `email`='{$email}', `password`='{$passWord}' , `room_number`='{$room_num}', `EXT`='{$ext}', `profile_picture`='{$img}', `is_admin`='{$isAdmin}' WHERE user_id=".$id;
  	if (mysqli_query($conn, $sql)) {
  		$id = mysqli_insert_id($conn);
  		$saved = '<div class="comment_box">
  		  <span class="delete" data-id="' . $id . '" >delete</span>
  		  <span class="edit" data-id="' . $id . '">edit</span>
  		  <div class="display_name">'. $name .'</div>
  	  </div>';
  	  echo $saved;
  	}else {
  	  echo "Error: ". mysqli_error($conn);
  	}
  	exit();
  }


?>