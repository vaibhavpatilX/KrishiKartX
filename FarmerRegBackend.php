<?php
include("conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Retrieving form data
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $address = $_POST['addr'];
    
    // Retrieving and handling uploaded file
    $QrCode = $_FILES['photo']['name'];   
    $QrCode = addslashes(file_get_contents($_FILES['photo']['tmp_name'])); 

    $profilephoto = $_FILES['profilephoto']['name'];   
    $profilephoto = addslashes(file_get_contents($_FILES['profilephoto']['tmp_name'])); 
    
    
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $accountStatus = "False";
    
    // Check if passwords match
    if($password == $confirmPassword){
        // SQL query to insert data into the database
        $sql = "INSERT INTO `farmer`(`FarmerName`, `FarmerEmail`, `FarmerMobile`, `FarmerAdd`, `QrCode`, `FarmerPass`, `FarmerAccount`, `profilePic`) VALUES ('$fullName','$email','$phoneNumber','$address','$QrCode','$password','$accountStatus','$profilephoto')";
        
        // Executing the query
        $insert = $conn->query($sql);
        
        // Checking if the insertion was successful
        if($insert){
            echo "<script>alert('Registration Success');</script>";
           header("Location: farmerLogin.php");
          // echo"success";
    exit();
        } else {
            echo "<script>alert('Registration Fail');</script>";
            header("Location: farmerLogin.php");
          // echo"error";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
        header("Location: farmerLogin.php");
    }
    
    // Close the database connection
    $conn->close();
}
?>
