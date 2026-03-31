<?php
include "db.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $sql = "insert into users(name, email, password, role) values('$name', '$email', '$password', '$role')";

        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo "Error!: " . mysqli_error($conn); 
        }else{
            echo "you have registered successfully";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register">
        <form action="register.php" method="post">
            <input type="text" name="name" placeholder="Enter Name"> <br>
            <input type="email" name="email" placeholder="Enter Email"> <br>
            <input type="password" name="password" placeholder="Enter Password"> <br>   <br> 

            <!-- this is hidden from the browser/user, but it will be sent to the server when the form is submitted -->
            <input type="text" name="role" value="user" hidden>
            <button type="submit">sign up</button>  
    </form>
    </div>
</body>
</html>