<?php
session_start();
session_destroy(); // Destroy PHP session

// Clear sessionStorage and redirect to login page
echo "<script>
        sessionStorage.removeItem('loggedIn');
        window.location.href = 'signup.php';
      </script>";
exit();
?>
