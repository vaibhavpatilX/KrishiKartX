<?php 
session_start();
include("../conn.php");


if(isset($_SESSION['farmer'])){
  $FarmerId=$_SESSION['farmer'];
}else{
  ?>
  <script>window.location.href = "../farmerLogin.php";</script>
<?php  
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Reports</title>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>.icon {
    color: #666;
    margin-right: 5px;
  }</style>

</head>
<body>
<?php include_once "farmerSidebar.php";
include_once "reportNav.php"; ?>
<div style="
    margin-left: 300px;
    margin-top: 25px;

">
<h3>Order Reports</h3><br>
    <table border="0" cellspacing="5" cellpadding="5">
    <tbody>
    <tr>
      <td><i class="icon fas fa-calendar-alt"></i> Start date:</td>
      <td><input type="text" id="min" name="min" fdprocessedid="6chvze"></td>
    </tr>
    <tr>
      <td><i class="icon fas fa-calendar-alt"></i> End date:</td>
      <td><input type="text" id="max" name="max" fdprocessedid="gp9n4e"></td>
    </tr>
  </tbody></table>
    <table id="example" class="table table-striped" style="width:100%" >
        <thead>
        
            <tr>
                <th>Order ID</th>
                <th>Customer ID </th>
                <th>Customer Name</th>
                <th>Product</th>

                <th>Catergory</th>
                <th>Quantity</th>
                <th>Total Bill</th>
                <th>Order Date</th>
                <th>Order Status</th>


            </tr>
        </thead>
        <tbody>
        <?php $result = $conn->query("SELECT * FROM `order` WHERE FarmerId='$FarmerId'"); 
 if($result){
   
  while($row = $result->fetch_assoc()){
    $OrderId=$row['OrderId'];
    $ProductId=$row['ProductId'];
    $CustomerId=$row['CustomerId'];
    $Quantity=$row['Quantity'];
    $TotalBill=$row['TotalBill'];
    $OrderDate=$row['OrderDate'];
    $OrderStatus=$row['OrderStatus'];
    $FarmerName='';
    //$ProductImg='';
   // $OrderDate = date('Y-m-d', strtotime($OrderDate)); // Convert to YYYY-MM-DD format

  
    $result1 = $conn->query("SELECT * FROM customer WHERE CustomerId='$CustomerId'"); 
 if($result1){
  while($row1 = $result1->fetch_assoc()){
    $CustomerName=$row1['CustomerName'];
  }}

  $result1 = $conn->query("SELECT * FROM product WHERE ProductId='$ProductId'"); 
  if($result1){
  
   while($row1 = $result1->fetch_assoc()){
     $ProductName=$row1['ProductName'];
     $ProductImg=base64_encode($row1['ProductImg']); 
     $ProductCat=$row1['ProductCategory'];


  }}
   
    ?> 
            <tr>
                <td><?php echo $OrderId;?></td>
                <td><?php echo $CustomerId;?></td>
                <td><?php echo $CustomerName;?></td>
                <td><?php echo $ProductName;?></td>
                <td><?php echo $ProductCat;?></td>
                <td><?php echo $Quantity;?></td>
                <td><?php echo $TotalBill;?></td>
                <td><?php echo $OrderDate;?></td>
                <td><?php echo $OrderStatus;?></td>

            </tr>
            
            <?php }}?>
          
        </tbody>
        <tfoot>
            <tr>
            <th>Order ID</th>
                <th>Farmer ID </th>
                <th>Farmer Name</th>
                <th>Product</th>
                <th>Catergory</th>
                <th>Quantity</th>
                <th>Total Bill</th>
                <th>Order Date</th>
                <th>Order Status</th>

            </tr>
        </tfoot>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>


</body>
</html>
<script>
    new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        }
    }
});

// Date JavaScript
let minDate, maxDate;

// Custom filtering function which will search data in column four between two values
DataTable.ext.search.push(function (settings, data, dataIndex) {
    let min = minDate.val();
    let max = maxDate.val();
    let date = new Date(data[7]); // Assuming Order Date is in the 8th column (index 7)

    if (
        (min === "" && max === "") ||
        (min === "" && date <= max) ||
        (min <= date && max === "") ||
        (min <= date && date <= max)
    ) {
        return true;
    }
    return false;
});

// Create date inputs
minDate = new DateTime('#min', {
    format: 'YYYY-MM-DD' // Use the format compatible with the database date format
});
maxDate = new DateTime('#max', {
    format: 'YYYY-MM-DD' // Use the format compatible with the database date format
});

// DataTables initialization
let table = new DataTable('#example');

// Refilter the table
document.querySelectorAll('#min, #max').forEach((el) => {
    el.addEventListener('change', () => table.draw());
});

</script>
