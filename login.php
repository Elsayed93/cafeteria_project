
 <?php

        if (isset($_GET['email'])&& isset($_GET["password"])) {
  $email = mysqli_real_escape_string($db, $_GET['email']);
  $password = mysqli_real_escape_string($db, $_GET['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Registration Form</title>

</head>
<body id="main_body" >

	<div style="text-align:center">

		<h1>Cafeteria</h1>
		<form  method="GET" action="login.php" enctype="multipart/form-data">
			<ul style="list-style-type:none">
				<li id="li_1" >
					<label >Email </label>
					<div>
						<input  name="email" type="email" />
					</div>
				</li>
                <li id="li_2" >
					<label >Password </label>
					<div>
                        <input  name="pass"  type="password" />
					</div>
				</li>    	
				<li class="buttons">
			    	<input id="log"  type="submit" name="submit" value="login" />
				</li>		
	
			</ul>
        </form>
        <a href="forgetPass.php"  >Forget Password?</a>
	</div>
	</body>
</html>