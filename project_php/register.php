<?php 
error_reporting(E_ALL); 
include_once 'include/koneksi.php';

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "input username";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_user FROM user WHERE username = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "username sudah ada";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "password kosong";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "password minimal harus 6 karakter.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'confirm password kosong';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password tidak sesuai';
        }
    }
    
    
    // Validate email
    if(empty(trim($_POST['email']))){
        $email_err = "email kosong";   
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $email_err = "email tidak valid";
    } else{
        $email = trim($_POST['email']);
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)
    && empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (username, password, email) ";
        $sql .= "VALUES (?, ?, ?)";
         
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", 
                $param_username, 
                $param_password,  
                $param_email);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
}

// Close connection
$conn->close();
 ?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/sas.png" rel="icon">
    <meta name="description" content="Project final ngoding study club">
    <meta name="author" content="Sasmitoh Rahmad Riady, S.Kom">

  <title>NSC - Register</title>

  <!-- <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'> -->

    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <img class="admin"  src = "img/nsc.png" alt="">
    <h1><b>Sign Up</b> </h1><br>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
    <span class="help-block"><?php echo $username_err; ?></span>

    <input type="text" name="email" placeholder="example@ngodingstudyclub.org" value="<?php echo $email; ?>">
    <span class="help-block"><?php echo $email_err; ?></span>

    <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
    <span class="help-block"><?php echo $password_err; ?></span>

    <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
    <span class="help-block"><?php echo $confirm_password_err; ?></span>

    <input type="submit" name="sign-up" class="login login-submit" value="Register">
  </form>

  <div class="login-help">
    <a href="login.php">Login</a>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <!-- <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>
 -->
</body>

</html>