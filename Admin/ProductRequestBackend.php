<?php 
include '../conn.php';
//session_start();
if(isset($_GET['submit']) && $_GET['submit'] == "accept"){
    $status="True";
    $productId=$_GET['id'];
    $stmt = $conn->prepare("UPDATE product SET ProductStatus = ? WHERE ProductId = ?");
    $stmt->bind_param("si", $status, $productId);
    $stmt->execute();
    
    // Check if the update was successful
    if($stmt->affected_rows > 0) {?>
      <script> alert("Product status updated successfully");
            window.location.href = "ProductRequest.php";

    </script>
      <?php

    } else {
        echo "Failed to update product status.";
    }
    
    // Close the statement
    $stmt->close();
}else if(isset($_GET['submit']) && $_GET['submit'] == "reject"){
    $status="False";
    $productId=$_GET['id'];
    $stmt = $conn->prepare("DELETE FROM product WHERE ProductId = ?");
    $stmt->bind_param("i", $productId); // Assuming ProductId is an integer
    $stmt->execute();
    
    // Check if the update was successful
    if($stmt->affected_rows > 0) {?>
      <script> alert("Product deleted successfully");
            window.location.href = "ProductRequest.php";

    </script>
      <?php

    } else {
        echo "Failed to update product status.";
    }
    
    // Close the statement
    $stmt->close();
}
?>
