<?php
include 'conn.php';
session_start();
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];



// Prepare and execute SQL query
$sql = "SELECT CustomerId FROM customer WHERE CustomerEmail=? AND CustomerPass=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $CustomerId = $row['CustomerId'];
    $_SESSION["customer"]="$CustomerId";
    header("Location: index.php");
    exit();
} else {
    // Authentication failed, display error message
    echo "<script>alert('Invalid email or password. Please try again.'); window.location.href = 'customerLogin.php';</script>";
}

// Clean-up environment
$stmt->close();
$conn->close();
?>
