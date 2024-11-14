<?php
// Start the session
session_start();

// Placeholder for email and password validation
$email = $password = "";
$errorMessage = "";

// Define a simple users array for demonstration
$users = [
    "user@example.com" => "password123"  // Email => Password
];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $email = $_POST['inputEmail'] ?? '';
    $password = $_POST['inputPassword'] ?? '';
    $remember = isset($_POST['remember-me']);  // Check if remember-me checkbox is checked

    // Basic validation
    if (empty($email) || empty($password)) {
        $errorMessage = "Please enter both email and password.";
    } elseif (isset($users[$email]) && $users[$email] === $password) {
        // Valid credentials: Set session and possibly remember the user
        $_SESSION['user'] = $email;  // Set session for logged in user

        // Handle "Remember Me"
        if ($remember) {
            // In a real scenario, you might set a persistent cookie here (for example, using setcookie)
            setcookie("userEmail", $email, time() + 3600 * 24 * 30, "/");  // Example cookie for 30 days
        }

        // Redirect to a protected page or dashboard (for example)
        header("Location: dashboard.php");  // Redirect after successful login
        exit();
    } else {
        $errorMessage = "Invalid email or password.";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/custom-login.css">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" alt="User Profile Image" />

            <!-- Login Form -->
            <form class="form-signin" method="POST" action="">
                <span id="reauth-email" class="reauth-email"></span>

                <!-- Display error message if exists -->
                <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Error:</strong> <?= htmlspecialchars($errorMessage); ?>
                    </div>
                <?php endif; ?>

                <!-- Email input field -->
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" value="<?= htmlspecialchars($email); ?>" required autofocus>

                <!-- Password input field -->
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

                <!-- Remember Me checkbox -->
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" name="remember-me" value="remember-me" <?= isset($remember) && $remember ? 'checked' : ''; ?>> Remember me
                    </label>
                </div>

                <!-- Sign In Button -->
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>

            <!-- Forgot password link -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->

    <!-- jQuery and Bootstrap JS -->
    <script type="text/javascript" src="js/jquery-4.0.0.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
