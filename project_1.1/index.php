<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <h1 id="sms_header">Student Management System</h1>
    <p class="login_caption">Login</p>
    <div class="outer_container">
        <div class="login_form">
            <form action="login_config.php" method="post" name="login">
                <img id="login_logo" src="login.png" alt="Login Icon">
                <input type="text" placeholder="Enter Username" name="username" required="required" /><br>
                <input type="password" placeholder="Enter Password" name="password" required="required" /><br>
                <select class="role" name="role">
                    <option value="1" selected="selected">Administrator</option>
                    <option value="2">Student</option>
                </select>
                <input type="submit" name="login" value="Login" /><br>
                <p id="register_link">Not Register?<a href="registration.php"> Register Here</a></p>
            </form>
        </div>
    </div>
</body>
</html>