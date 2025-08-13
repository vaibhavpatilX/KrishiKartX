<?php
// Retrieving form data
include 'conn.php';
session_start();

$fullName = $_REQUEST["fullName"];
$phoneNumber = $_REQUEST["phoneNumber"];
$email = $_REQUEST["email"];
$address = $_REQUEST["addr"];
$password = $_REQUEST["password"];
$confirmPassword = $_REQUEST["confirmPassword"];

// Check if passwords match
if($password == $confirmPassword){
    // SQL query to insert data into the database
    $sql = "INSERT INTO `customer`(`CustomerName`, `CustomerEmail`, `CustomerMobile`, `CustomerAddress`, `CustomerPass`) VALUES ('$fullName','$email','$phoneNumber','$address','$password')";
    
    // Executing the query
    $insert = $conn->query($sql);
    
    // Checking if the insertion was successful
    if($insert){
        echo "<script>alert('Registration Success');</script>";
        header("Location: customerLogin.php");
        
    } else {
        echo "<script>alert('Registration Fail');</script>";
        header("Location: customerRegBackend.php");
    }
} else {
    echo "<script>alert('Passwords do not match');</script>";
}

// Close the database connection
$conn->close();

?>
