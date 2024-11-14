<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/custom-login.css">
        <title>Login Form</title>
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
                <form class="form-signin">
                    <span id="reauth-email" class="reauth-email"></span>
                    
                    
                    <select class="form-control mb-3" id="roleSelect" required>
                        <option value="admin">Admin</option>
                        <option value="contentManager">Content Manager</option>
                        <option value="systemUser">System User</option>
                    </select>

                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                </form><!-- /form -->
            </div><!-- /card-container -->
        </div><!-- /container -->
        
        <script type="text/javascript" src="js/jquery-4.0.0.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>