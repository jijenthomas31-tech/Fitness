<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user["username"];
            
            // Redirect to home page after successful login
            echo "<script>
                    sessionStorage.setItem('loggedIn', 'true');
                    window.location.href = './home.html';
                  </script>";
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with this email.";
    }
    $stmt->close();
    $conn->close();
}
?>
