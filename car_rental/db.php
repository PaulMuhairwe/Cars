<?php
// Database connection
$host = 'localhost';
$dbname = 'car_rental';
$username = 'Muhairwe';
$password = 'Muhairwe100';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO($dsn, $username, $password, $options);

    // Query to select all records from the cars table
    $stmt = $conn->query('SELECT * FROM cars');

    // Fetch all records
    $cars = $stmt->fetchAll();

    // Output the results
    foreach ($cars as $car) {
        print_r($car); // You can format this output as needed
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
