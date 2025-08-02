<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "fitness_system";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $phone_number = trim($_POST['phone_number']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (!preg_match('/^\d{10}$/', $phone_number)) {
        die("Phone number must be exactly 10 digits.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $stmt = $conn->prepare("INSERT INTO feedback (name, phone_number, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone_number, $email, $message);

    if ($stmt->execute()) {
        echo "<script>
            alert('Feedback submitted successfully!');
            window.location.href = 'feedback.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>