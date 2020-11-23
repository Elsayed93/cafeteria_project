<!-- 

    
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_post['submit'])){
        
    $name=$_POST['name'];
    $email=$_POST['email'];
    $room=$_POST['room'];
    $ext=$_POST['ext'];
    $profile=$_POST['image'];
}

#1- set the credentionals 
$dbinfo="mysql:dbname=cafeteria;host=127.0.0.1;port=3306";
$username="root";
$password="";

try {
    $conn = new PDO($dbinfo, $username, $password);
    // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sql = "CREATE DATABASE cafeteria";
    // $sql2=  " CREATE TABLE users (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     username VARCHAR(30) NOT NULL,
    //     email VARCHAR(30) NOT NULL,
    //     room INT ,
    //     ext VARCHAR(20),
    //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    //     )";
      
        
    //     $conn->exec($sql);
    //     echo "Table MyGuests created successfully";
    //     echo "Database created successfully<br>";
  } catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
  }
  
  $conn = null;


  //uniqid() is a function generates a unique ID based on the microtime (the current time in microseconds).
  //used with md5() to ensure uniqueness


  try {
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $room=$_POST['room'];
    $ext=$_POST['ext'];
    $profile=$_POST['image'];
    $conn = new PDO($dbinfo, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (name, email, room_number,EXT,profile_picture)
            VALUES ('$name', '$email', '$room','$ext','$profile')";
    $conn->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;



        echo "<table style='border: solid 2px black;'>";
        echo "<tr><th>username</th><th>email</th><th>room</th><th>ext</th><th>picture</th</tr>";
        echo "<tr><td>$name</td><td>$email</td><td>$room</td><td>$ext</td><td>$profile</td></tr>";
        
        class TableRows extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }
        
          function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
          }
        
          function beginChildren() {
            echo "<tr>";
          }
        
          function endChildren() {
            echo "</tr>" . "\n";
          }
        }
        
       
        
        try {
          $conn  = new PDO($dbinfo, $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT id, username, email FROM users");
          $stmt->execute();
        
          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
          }
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>"; -->
        <?php
       
        session_start();
        
        // initializing variables
        $username = "";
        $email    = "";
        $errors = array(); 
        
        // connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'cafeteria');
        
        // REGISTER USER
        if (isset($_POST['reg_user'])) {
          // receive all input values from the form
          $username = mysqli_real_escape_string($db, $_POST['username']);
          $email = mysqli_real_escape_string($db, $_POST['email']);
          $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
          $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        
          // form validation: ensure that the form is correctly filled ...
          // by adding (array_push()) corresponding error unto $errors array
          if (empty($username)) { array_push($errors, "Username is required"); }
          if (empty($email)) { array_push($errors, "Email is required"); }
          if (empty($password_1)) { array_push($errors, "Password is required"); }
          if ($password_1 != $password_2) {
          array_push($errors, "The two passwords do not match");
          }
        
          // first check the database to make sure 
          // a user does not already exist with the same username and/or email
          $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
          $result = mysqli_query($db, $user_check_query);
          $user = mysqli_fetch_assoc($result);
          
          if ($user) { // if user exists
            if ($user['username'] === $username) {
              array_push($errors, "Username already exists");
            }
        
            if ($user['email'] === $email) {
              array_push($errors, "email already exists");
            }
          }
        
          // Finally, register user if there are no errors in the form
          if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
        
            $query = "INSERT INTO users (username, email, password) 
                  VALUES('$username', '$email', '$password')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
          }
        }
        ?>
        

        <!DOCTYPE html>
        <head>
          <meta charset="UTF-8">
          <title>Registration Form</title>
        
        </head>
        <body  >
        
          <div style="text-align:center">
        
            <h1>Add user</h1>
            <form  method="POST" action="user.php" enctype="multipart/form-data">
              <ul style="list-style-type:none">
                <li id="li_1" >
                  <label > Name </label>
                  <div>
                    <input  name="name"  type="text" />
                  </div>
                </li>
                <li id="li_2" >
                  <label >Email </label>
                  <div>
                    <input  name="email" type="email" />
                  </div>
                </li>
                        <li id="li_3" >
                  <label >Password </label>
                  <div>
                    <input  name="password_1"  type="password" />
                  </div>
                </li>
                <li id="li_4" >
                  <label >Confirm password </label>
                  <div>
                    <input  name="password_2" type="password" />
                  </div>
                </li>
                        <li id="li_5" >
                  <label >Room no. </label>
                  <div>
                    <select  name="room">
                      <option  value="" selected="selected"></option>
                      <option  value="1" >App1</option>
                      <option  value="2" >App2</option>
                      <option  value="3" >Cloud</option>
                    </select>
                  </div>
                </li>
                        <li id="li_6" >
                  <label >Ext. </label>
                  <div>
                    <input  name="ext" type="text" />
                  </div>
                        </li>
                        <li id="li_7" >
                  <label >Profile picture </label>
                  <div>
                    <input  name="image" type="file" />
                  </div>
                        </li>
        
                    
                <li class="buttons">
                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Save" />
                    <input id="resetForm" class="button_text" type="reset" name="reset" value="Reset" />
                </li>
              </ul>
            </form>
          </div>
          </body>
        </html>