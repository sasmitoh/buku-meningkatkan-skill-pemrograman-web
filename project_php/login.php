<?php
error_reporting(E_ALL); 
include_once 'include/koneksi.php';

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password, email, is_admin ";
        $sql .= "FROM user WHERE username = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password, $email, $is_admin);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;            
                            $_SESSION['email'] = $email;      
                            $_SESSION['is_admin'] = $is_admin;      
                            $_SESSION['id'] = $id;        
                            if ($is_admin)   
                                header("location: admin/index.php");
                            else
                                header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $conn->close();
} 
 ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/sas.png" rel="icon">
    <meta name="description" content="Project final ngoding study club">
    <meta name="author" content="Sasmitoh Rahmad Riady, S.Kom">

  <title>NSC - Log-in</title>

  <!-- <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'> -->

    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <img class="admin"  src = "img/nsc.png" alt="">
    <h1><b>Log-in</b> </h1><br>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
    <span class="help-block"><?php echo $username_err; ?></span>

    <input type="password" name="password" placeholder="Password">
    <span class="help-block"><?php echo $password_err; ?></span>
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>
   

  <div class="login-help">
    <a href="register.php">Register</a>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <!-- <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>
 -->
</body>

</html>