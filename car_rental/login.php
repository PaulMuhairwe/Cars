<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Muhairwe'];
    $password = $_POST['Muhairwe100'];

    
    $sql = "SELECT user_id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
      
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        echo "Login successful!";
        
    } else {
        echo "Invalid username or password.";
    }
}
?>
