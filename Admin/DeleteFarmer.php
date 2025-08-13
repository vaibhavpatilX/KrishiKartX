<?php 
include '../conn.php';
if(isset($_GET['submit'])){
    $status="False";
    $productId=$_GET['id'];
    $stmt = $conn->prepare("DELETE FROM farmer WHERE FarmerId = ?");
    $stmt->bind_param("i", $productId); // Assuming ProductId is an integer
    $stmt->execute();
    
    // Check if the update was successful
    if($stmt->affected_rows > 0) {?>
      <script> alert("Farmer Request deleted successfully");
       window.location.href = "ManageFarmers.php";
    </script>
      <?php

    } else {
        echo "Failed to update product status.";
    }
    
    // Close the statement
    $stmt->close();
}
?>
