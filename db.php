<?php
$host = "localhost";  // Change if needed
$user = "root";       // Database username (default for XAMPP)
$pass = "";           // Database password (keep empty for XAMPP)
$dbname = "fitness_system"; // Corrected database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
