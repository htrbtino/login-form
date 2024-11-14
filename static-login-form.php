<?php
// Define users and their credentials
$users = [
    "admin" => [
        ["username" => "Admin", "password" => "Pass1234"],
        ["username" => "Renmark", "password" => "Pogi1234"]
    ],
    "contentManager" => [
        ["username" => "pepito", "password" => "manaloto"],
        ["username" => "juan", "password" => "delacruz"]
    ],
    "systemUser" => [
        ["username" => "pedro", "password" => "penduko"]
    ]
];

// Initialize variables for error and success messages
$errorMessage = '';
$successMessage = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['roleSelect'] ?? '';
    $username = $_POST['inputUsername'] ?? '';
    $password = $_POST['inputPassword'] ?? '';

    // Validate input
    if (!$role) {
        $errorMessage = 'Please select a role.';
    } elseif (!$username || !$password) {
        $errorMessage = 'Please enter both username and password.';
    } else {
        // Check if the username and password match for the selected role
        if (isset($users[$role])) {
            $isValid = false;
            foreach ($users[$role] as $user) {
                if ($user['username'] === $username && $user['password'] === $password) {
                    $isValid = true;
                    break;
                }
            }
            
            if ($isValid) {
                $successMessage = "Welcome to the system, $username!";
            } else {
                $errorMessage = 'Invalid username / password.';
            }
        } else {
            $errorMessage = 'Invalid role selected.';
        }
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
    <style>
        .alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            width: 300px;
            padding: 15px;
            font-size: 16px;
            text-align: center;
        }
        .alert .close {
            position: absolute;
            top: 5px;
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Display error message if any -->
        <?php if ($errorMessage): ?>
        <div id="error-message" class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> <?= $errorMessage; ?>
            <button type="button" class="close" aria-label="Close" onclick="this.parentElement.style.display='none';">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <!-- Display success message if any -->
        <?php if ($successMessage): ?>
        <div id="success-message" class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> <?= $successMessage; ?>
            <button type="button" class="close" aria-label="Close" onclick="this.parentElement.style.display='none';">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <div class="card card-container" style="margin-top: 100px;">
            <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
            <form class="form-signin" method="POST" action="">
                <select class="form-control mb-3" name="roleSelect">
                    <option value="">-- Select Role --</option>
                    <option value="admin" <?= isset($role) && $role === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="contentManager" <?= isset($role) && $role === 'contentManager' ? 'selected' : ''; ?>>Content Manager</option>
                    <option value="systemUser" <?= isset($role) && $role === 'systemUser' ? 'selected' : ''; ?>>System User</option>
                </select>

                <input type="text" name="inputUsername" class="form-control" placeholder="Username" value="<?= htmlspecialchars($username ?? '') ?>" required>

                <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
