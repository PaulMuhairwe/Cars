<?php
require 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['Muhairwe'];
    $password = password_hash($_POST['Muhairwe100'], PASSWORD_DEFAULT); 
    $email = $_POST['email'];

    
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$username, $password, $email]);

    echo "User registered successfully!";
    
}
?>
