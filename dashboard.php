<?php
include "db.php";
session_start();
echo "Welcome to the dashboard!";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <a href="logout.php?user_id=<?php echo $user_id; ?>">Logout</a>
</body>
</html>