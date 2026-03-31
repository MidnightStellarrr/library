<?php
include "db.php";
session_start();

$error = ""; // Initialize error variable

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        
        if($row['password'] == $password){ 
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_role'] = $row['role'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <?php if($error): ?>
            <p style="color: red; text-align: center;"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Enter Email" required> <br>
            <input type="password" name="password" placeholder="Enter Password" required> <br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>