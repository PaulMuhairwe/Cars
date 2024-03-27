<?php
require 'db.php'; // Assume you have a db.php file for database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Registration logic here
    // Hash the password and store user into the database
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="register.php" method="post">
        <h2>Register</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <p>Already registered? <a href="index.php">Login here</a></p>
    </form>
</body>
</html>
