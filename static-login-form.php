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

                // Check if the selected role is valid
                if (!role || !users[role]) {
                    alert("Please select a valid role.");
                    return;
                }

                // Check if the username and password match for the selected role
                var isValid = users[role].some(function(user) {
                    return user.username === username && user.password === password;
                });

                // Display appropriate message
                if (isValid) {
                    alert("Login successful!");
                } else {
                    alert("Invalid username or password.");
                }
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
                <form class="form-signin" onsubmit="validateLogin(event)">
                    <span id="reauth-email" class="reauth-email"></span>
                    
                    <!-- Role Dropdown at the top -->
                    <select class="form-control mb-3" id="roleSelect" required>
                        <option value="">-- Select Role --</option>
                        <option value="admin">Admin</option>
                        <option value="contentManager">Content Manager</option>
                        <option value="systemUser">System User</option>
                    </select>

                    <!-- Change Email to Username -->
                    <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>

                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                </form><!-- /form -->
            </div><!-- /card-container -->
        </div><!-- /container -->
        
        <script type="text/javascript" src="js/jquery-4.0.0.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
