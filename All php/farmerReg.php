
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
   <style type="text/css">
    body{
         background: url(images/registration.jpg) no-repeat;
    background-position: center;
    background-size: cover;
}
    .main-user-info {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 0px 10px;
        margin-left: 10px;
    }

    .user-input-box {
        display: flex;
        flex-wrap: wrap;
        width: 50%;
        padding-bottom: 15px;
    }

    .user-input-box label {
        width: 95%;
        color: black;
        font-size: 16px;
        font-weight: 400;
        margin: 2px 0;
        font-family: 'Helvetica', sans-serif;
    }

    .user-input-box input {
        height: 40px;
        width: 90%;
        outline: none;
        border: none;
        box-shadow: none;
        padding: 0 8px;
        border-bottom: 1px solid #ccc;
        background-color: transparent;
    }

    .user-input-box input:focus {
        border-bottom: 2px solid grey;
    }

    .user-input-box input:focus,
        select:focus {
            border-bottom: 2px solid grey;
            outline: none;
    }

    .user-input-box select {
        border: none;
        border-bottom: 1px solid #ccc;
        background: transparent;
        width: 90%;
        padding: 5px;
        outline: none;
    }

    .user-input-box select:focus {
        border-bottom: 2px solid grey;
    }

    .form-submit-btn {
        margin-top: 15px;
        margin-right: 10px;
        /* justify-content: space-between; */
        display:flex;
    }

    .form-submit-btn input,
    .form-submit-btn button {
        width: 100%;
        font-size: 15px;
        padding: 6px;
        border: none;
    }

    .form-submit-btn button {
        width: 50%;
        font-size: 15px;
        border: none;
        border-radius: 17px;
        height: 35px;
        /* display:flex; */
    }

    .form-submit-btn input {
        background: linear-gradient(to right, #24C6DC, #514A9D);
        color: #fff;
        margin-left: 40px;
        border: none;
        border-radius: 17px;
        width: 125px;
        height: 35px;
        color: rgb(209, 209, 209);
    }

    .form-submit-btn button {
        background: linear-gradient(to right, #24C6DC, #514A9D);
        color: #fff;
        margin-left: 70px;
        width: 100px;
        height: 35px;
        color: rgb(209, 209, 209);
    }

    .form-submit-btn input:hover,
    .form-submit-btn button:hover {
        background: linear-gradient(to left, #24C6DC, #514A9D);
        color: rgb(255, 255, 255);
    }

    .form-submit-btn button:hover {
        background: linear-gradient(to left, #24C6DC, #514A9D);
        color: rgb(255, 255, 255);
    }



    .gender-details-box {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-left: 10px; 
    }

    .gender-title {
        color: black;
        font-size: 16px;
        font-family: 'Helvetica', sans-serif;
        border-bottom: 1px solid white;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .gender-category {
        display: flex;
        align-items: center;
        color: black;
    }

    .gender-category label {
        padding: 0 7px 0 5px;
    }

    .gender-category label,
    .gender-category input {
        cursor: pointer;
    }

    .gender-category input {
        transform: scale(0.9);
        margin-top: 3px;
        margin-right: 5px; 
    }


    .checkbox-container {
        display: flex;
        align-self:flex-start;
        margin-right: 1px;
        margin-top: 10px;
    }

        .checkbox-container input {
        align-self: flex-start; 
    }


</style>

</head>

<body>
    <div class="container"  style="max-height: 700px;">

        <div class="box-2">
            <h2 style="font-size: 27px; text-align: center; margin-bottom: 30px; margin-top:20px; font-weight: bold;">Farmer Registration</h2>
            <form id="registrationForm"   action="FarmerRegBackend.php" method="POST" enctype="multipart/form-data">
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" required placeholder="Enter Full Name" style="color:#000" />
                </div>

                <div class="user-input-box">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" required placeholder="Enter Phone Number" pattern="[0-9]{10}" style="color:#000" />
                </div>

                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter Email" style="color:#000" />
                </div>

               

                <div class="user-input-box">
                    <label for="addr">Address</label>
                    <input type="text" id="addr" name="addr" placeholder="Enter the address" required  style="color:#000"/>
                </div>
                
               
                <div class="user-input-box">
                    <label for="photo">Upload Payment Qr code</label>
                    <input type="file" id="photo" name="photo" accept="image/*" required>
                </div>
                <div class="user-input-box">
                    <label for="profilephoto">Upload Profile Picture</label>
                    <input type="file" id="profilephoto" name="profilephoto" accept="image/*" required>
                </div>
                <div class="user-input-box">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required  style="color:#000"/>
                </div>

                <div class="user-input-box">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword"
                        placeholder="Confirm Password" required style="color:#000"/>
                </div>
            </div>

               

                <div class="form-submit-btn">
                    <input type="submit" value="Register" name="submit">
                    <button class="back-button" type="button"
                    onclick="window.location.href='farmerLogin.php'">Back</button>
                </div>
                


             </form>
        </div>
    </div>
</body>

</html>
