<?php
session_start();

if (!isset($_SESSION["user"])) {
    echo "<script>
            window.location.href = 'signup.php';
          </script>";
    exit();
}
?>
