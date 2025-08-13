<?php
include 'conn.php';
session_start();

// Getting email and password from request parameters
$email = $_POST["email"];
$password = $_POST["password"];

// Prepare SQL statement
$sql = "SELECT * FROM admin WHERE AdminEmail=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['AdminPass'];
    $AdminId = $row['AdminId'];
    
    // Verify the password
    if ($password==$hashedPassword) {
        // User authenticated, set session and redirect to dashboard
        $_SESSION['admin'] = $AdminId;
        header("Location: Admin/index.php");
        exit();
    } else {
        // Invalid password, redirect to login page with error message
        header("Location: adminLogin.php");
        exit();
    }
} else {
    // User not found, redirect to login page with error message
    header("Location: adminLogin.php");
    exit();
}
?>
