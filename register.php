<?php
$host = "localhost";  // Change if needed
$user = "root";       // Database username (default for XAMPP)
$pass = "";           // Database password (keep empty for XAMPP)
$dbname = "fitness_system"; // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        // Registration successful, show success message with button
        echo "<h2>Registration successful!</h2>";
        echo "<p>You can now log in.</p>";
        echo "<a href='signup.php'><button style='padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;'>Go to Login</button></a>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>