<?php
    $conn = mysqli_connect("localhost","root","","panel") or die("Database Not Connected".mysqli_connect_error($con));
    $host = 'localhost'; // Your host
$dbname = 'panel'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Optionally, you can set the default fetch mode to associative array
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>