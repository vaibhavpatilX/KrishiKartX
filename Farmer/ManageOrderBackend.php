<?php 
include '../conn.php';
//session_start();
if(isset($_GET['submit']) && $_GET['submit'] =="Pending"){
    $status="Pending";
    $OrderId=$_GET['id'];
    $result1 = $conn->query("UPDATE `order` SET OrderStatus='$status',PaymentStatus='Done' WHERE OrderId =$OrderId"); 
    
    if($result1) {?>
      <script> alert("Order status updated successfully");
            window.location.href = "ManageOrders.php";

    </script>
      <?php

    } else {
        echo "Failed to update order status.";
    }
    
}else if(isset($_GET['submit']) && $_GET['submit'] =="Delivered"){
    $status="Delivered";
    $OrderId=$_GET['id'];
    $result1 = $conn->query("UPDATE `order` SET OrderStatus='$status',PaymentStatus='Done' WHERE OrderId =$OrderId"); 
    
    if($result1) {?>
      <script> alert("Order status updated successfully");
            window.location.href = "ManageOrders.php";

    </script>
      <?php

    } else {
        echo "Failed to update order status.";
    }
    
}else {

    $status="Canceled";
    $OrderId=$_GET['id'];
    $result1 = $conn->query("UPDATE `order` SET OrderStatus='$status',PaymentStatus='Refund' WHERE OrderId =$OrderId"); 
    
    if($result1) {?>
      <script> alert("Order Canceled And Money Refunded");
            window.location.href = "ManageOrders.php";

    </script>
      <?php

    } else {
        echo "Failed to update order status.";
    }
}
?>
