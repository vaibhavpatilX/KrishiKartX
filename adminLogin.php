
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/login.css">
   <style>
    body{ background: url(images/farmerback.jpg) no-repeat;
    background-position: absolute;
    background-size: cover;}
    
</style>
</head>

<body>
    <div class="container">
        <div class="box-2">
            <h2 style="font-size: 30px; text-align: center; margin-bottom: 40px; margin-top:5px; font-weight: bold;">Admin Login</h2>
            <form action="adminLoginBackend.php" method="post">
                <div class="role-buttons" role="group" aria-label="Role selection">
                     <a href="adminLogin.php" class="btn btn-secondary" role="button" style="  background:linear-gradient(to right, #1e3c72, #2a5298);">Admin</a>
                    <a href="farmerLogin.php" class="btn btn-secondary" role="button" >Farmer</a>
                    <a href="customerLogin.php" class="btn btn-secondary" role="button" >Customer</a>
                </div>

                <label style="font-size: 14px;margin-bottom: 3px; margin-top: 10px;font-family: Helvetica; color : #fff">EMAIL:</label><br>
                <input type="text" id="email" name="email" placeholder="Enter the Email" required>
                <br>

                <label style="font-size: 14px;margin-bottom: 3px; margin-top: 10px;font-family: Helvetica; color : #fff">PASSWORD: </label><br>
                <input type="password" id="password" name="password" placeholder="Enter the password" required>
                <br>

                <button type="submit" class="login-button" name="login_user">Login</button>
                <!-- <p> <a href="" onclick="forgotPassword()" style="font-weight: bold; color: #007BFF; text-decoration:none;">Forgotten Password?</a></p> -->
            </form>
        </div>
    </div>
</body>

</html>
