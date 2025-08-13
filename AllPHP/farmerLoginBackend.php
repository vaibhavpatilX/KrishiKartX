<?php
// Retrieving form data
include 'conn.php';
session_start();

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

// Database credentials

try {
    // Create connection
    
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("SELECT FarmerId FROM farmer WHERE FarmerEmail=? AND FarmerPass=?");
    $stmt->bind_param("ss", $email, $password);

    // Execute SQL statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // User authenticated, redirect to dashboard or another page
        $row = $result->fetch_assoc();
        $farmerID = $row['FarmerId'];
        $_SESSION['farmer']=$farmerID;
       // echo  $_SESSION['farmer'];
        header("Location: Farmer/index.php");
        exit();
    } else {
        // Authentication failed, display error message
        echo "<script>alert('Invalid email or password. Please try again.'); window.location.href = 'farmerLogin.php';</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
