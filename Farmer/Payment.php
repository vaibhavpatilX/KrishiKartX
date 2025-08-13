<?php
include("../conn.php");
session_start();

if(isset($_SESSION['farmer'])){
  $FarmerId=$_SESSION['farmer'];

}
else{
  ?>
  <script>window.location.href = "farmerLogin.php";</script>
<?php   
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Payments</title>
    <style>
    .mode_refund{
    background-color:#FA2962;
}

</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../Admin/css/productRequest.css">
<style>
</style>
</head>

<body>
<?php include_once "farmerSidebar.php"; ?>
<div class="container p-30" style="margin-left:300px;margin-top:50px;">
<h2>My Payments</h2>        
<div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        
                        <div class="col-sm-8 add_flex">
                            <div class="form-group searchInput">
                                <label for="email">Search:</label>
                                <input type="search" class="form-control" id="filterbox" placeholder=" ">
                            </div>
                        </div> 
                    </div>
                    <div class="overflow-x">
                        <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                            <thead>
                                <tr>
                                <th style="min-width:50px;">Payment ID</th>
                                    <th style="min-width:50px;">From</th>
                                    <th style="min-width:50px;">Product Name</th>
                                   
                                    <th style="min-width:50px;">Quantity</th>
                                    <th style="min-width:50px;">Amount</th>
                                    <th style="min-width:50px;">Date</th>
                                    <th style="min-width:50px;">Payment Status</th>

                                    <th style="min-width:50px;">PaymentMethod</th>
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php $result = $conn->query("SELECT * FROM `order` WHERE FarmerId='$FarmerId'"); 
 if($result){
   
  while($row = $result->fetch_assoc()){
    $OrderId=$row['OrderId'];
    $ProductId=$row['ProductId'];
    $CustomerId=$row['CustomerId'];
    $OrderDate=$row['OrderDate'];

    $FarmerId=$row['FarmerId'];
    $Quantity=$row['Quantity'];
    $TotalBill=$row['TotalBill'];
    $PaymentMethod=$row['PaymentMethod'];
    $PaymentStatus=$row['PaymentStatus'];
    $color1='';
    if($PaymentStatus=="Refund"){
        $color1='class="mode mode_refund"';
    }

    if($PaymentMethod=="Qr Code"){
   $color='class="mode mode_done"';
    }else if($PaymentMethod=="Razorpay"){
        $color='class="mode mode_process"';
    }
    $FarmerName='';
    //$ProductImg='';
  
    $result1 = $conn->query("SELECT * FROM customer WHERE CustomerId='$CustomerId'"); 
 if($result1){
  while($row1 = $result1->fetch_assoc()){
    $CustomerName=$row1['CustomerName'];
  }}

    
    $result1 = $conn->query("SELECT * FROM product WHERE ProductId='$ProductId'"); 
    if($result1){
    
     while($row1 = $result1->fetch_assoc()){
       $ProductName=$row1['ProductName'];
      

    }}


    ?> <tr> <?php
 ?>
                              
                                    <td><?php echo $OrderId;?></td>
                                    <td><?php echo $CustomerName;?></td>
                                    <td><?php echo $ProductName;?></td>
                                    
                                    <td><?php echo $Quantity;?></td>
                                    <td><?php echo $TotalBill;?>₹</td>
                                    <td><?php echo $OrderDate;?></td>
                                    <td><span <?php echo $color1;?> ><?php echo $PaymentStatus;?></span></td>

                                    <td><span <?php echo $color;?> ><?php echo $PaymentMethod;?></span></td>
                                   
                                    
                                   
                                </tr><?php }}?>
                                
                                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
<script>
    $(document).ready(function() {
    var dataTable = $('#filtertable').DataTable({
        "pageLength":5,
        'aoColumnDefs':[{
            'bSortable':false,
            'aTargets':['nosort'],
        }],
        columnDefs:[
            {type:'date-dd-mm-yyyy',aTargets:[5]}
        ],
        "aoColumns":[
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null
        ],
        "order":false,
        "bLengthChange":false,
        "dom":'<"top">ct<"top"p><"clear">'
    });
    $("#filterbox").keyup(function(){
        dataTable.search(this.value).draw();
    });
} );

</script>