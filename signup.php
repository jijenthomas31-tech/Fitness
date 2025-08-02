<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: black; }
        .container { width: 350px; padding: 20px; background: black; box-shadow: 0 0 1.6rem #45FFCA;; border-radius: 5px; text-align: center; border: 1px solid #45FFCA;}
        h2 { color:white; }
        .form-container { display: none; }
        .form-container.active { display: block; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #218838; }
        .toggle-link { margin-top: 10px; display: block; color: #007bff; cursor: pointer; }
    </style>
</head>
<body>

    <div class="container">
        <!-- Login Form -->
        <div id="login-form" class="form-container active">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p class="toggle-link" onclick="toggleForms()">Don't have an account? Register</p>
        </div>

        <!-- Registration Form -->
        <div id="register-form" class="form-container">
            <h2>Register</h2>
            <form action="register.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
            <p class="toggle-link" onclick="toggleForms()">Already have an account? Login</p>
        </div>
    </div>

    <script>
        function toggleForms() {
            document.getElementById('login-form').classList.toggle('active');
            document.getElementById('register-form').classList.toggle('active');
        }
    </script>
</body>
</html>
