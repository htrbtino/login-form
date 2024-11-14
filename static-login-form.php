<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/custom-login.css">
        <title>Login Form</title>
        <script type="text/javascript">
            function validateLogin(event) {
                event.preventDefault(); // Prevent form submission

                // Get the selected role, username, and password
                var role = document.getElementById("roleSelect").value;
                var username = document.getElementById("inputUsername").value;
                var password = document.getElementById("inputPassword").value;

                // Define the users and their credentials
                var users = {
                    "admin": [
                        { username: "Admin", password: "Pass1234" },
                        { username: "Renmark", password: "Pogi1234" }
                    ],
                    "contentManager": [
                        { username: "pepito", password: "manaloto" },
                        { username: "juan", password: "delacruz" }
                    ],
                    "systemUser": [
                        { username: "pedro", password: "penduko" }
                    ]
                };

                // Error message container
                var errorMessage = document.getElementById("error-message");
                errorMessage.style.display = "none"; // Hide error message initially

                // Success message container
                var successMessage = document.getElementById("success-message");
                successMessage.style.display = "none"; // Hide success message initially

                // Check if the selected role is valid
                if (!role) {
                    showErrorMessage("Please select a role.");
                    return;
                }

                // Check if the username or password fields are empty
                if (!username || !password) {
                    showErrorMessage("Please enter both username and password.");
                    return;
                }

                // Check if the username and password match for the selected role
                var isValid = users[role] && users[role].some(function(user) {
                    return user.username === username && user.password === password;
                });

                // If credentials are invalid
                if (!isValid) {
                    showErrorMessage("Invalid username / password.");
                } else {
                    // If valid, show success message
                    showSuccessMessage(role);
                }
            }

            // Function to show the error message at the top
            function showErrorMessage(message) {
                var errorMessage = document.getElementById("error-message");
                errorMessage.textContent = message;
                errorMessage.style.display = "block"; // Show the error message
            }

            // Function to show the success message at the top
            function showSuccessMessage(role) {
                var successMessage = document.getElementById("success-message");
                successMessage.textContent = "Welcome to the system, " + role + "!";
                successMessage.style.display = "block"; // Show the success message
            }
        </script>
    </head>
    <body>
        <div class="container">
            <!-- Error Message at the top, sized like the login form -->
            <div id="error-message" class="alert alert-danger alert-dismissible fade show" style="display:none; 
                position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; 
                width: 300px; padding: 15px 25px; font-size: 16px; text-align: center;">
                <strong>Error!</strong> <span id="modal-error-message">Invalid username / password.</span>
            </div>

            <!-- Success Message at the top, sized like the login form -->
            <div id="success-message" class="alert alert-success alert-dismissible fade show" style="display:none; 
                position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; 
                width: 300px; padding: 15px 25px; font-size: 16px; text-align: center;">
                <strong>Success!</strong> <span id="modal-success-message">Welcome to the system, [role]!</span>
            </div>

            <div class="card card-container" style="margin-top: 100px;"> <!-- Adjust for error/success message -->
                <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />

                <form class="form-signin" onsubmit="validateLogin(event)">
                    <span id="reauth-email" class="reauth-email"></span>

                    <!-- Role Dropdown at the top -->
                    <select class="form-control mb-3" id="roleSelect">
                        <option value="">-- Select Role --</option>
                        <option value="admin">Admin</option>
                        <option value="contentManager">Content Manager</option>
                        <option value="systemUser">System User</option>
                    </select>

                    <!-- Username Input -->
                    <input type="text" id="inputUsername" class="form-control" placeholder="Username">

                    <!-- Password Input -->
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password">

                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                </form><!-- /form -->
            </div><!-- /card-container -->
        </div><!-- /container -->

        <!-- Include Bootstrap JS and jQuery (required for modal functionality) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
