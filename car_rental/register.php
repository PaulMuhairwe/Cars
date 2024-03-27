<?php
require 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form data
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $email = $_POST['email'];

    // Insert the new user into the database
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$username, $password, $email]);

    echo "User registered successfully!";
    // Redirect to login page or home page here
}
?>
