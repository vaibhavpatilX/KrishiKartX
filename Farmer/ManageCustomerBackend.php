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
}
if(isset($_GET['submit'])=='view'){
    $CustomerId=$_GET['id'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style> 
.mode_cancel{
    background-color: #ed4c4c;
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
<h2>Customer All Orders</h2>        
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
                                <th style="min-width:50px;">Order ID</th>
                                    <th style="min-width:50px;">Farmer Name</th>
                                    <th style="min-width:50px;">Product Name</th>
                                    <th style="min-width:50px;">Image</th>
                                   
                                    <th style="min-width:50px;">Quantity</th>
                                    <th style="min-width:50px;">Total Bill</th>
                                    
                                    <th style="min-width:50px;">Order Date</th>
                                    <th style="min-width:50px;">Status</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $result = $conn->query("SELECT * FROM `order` WHERE CustomerId='$CustomerId' AND FarmerId='$FarmerId'"); 
 if($result){
   
  while($row = $result->fetch_assoc()){
    $OrderId=$row['OrderId'];
    $ProductId=$row['ProductId'];
    $FarmerId=$row['FarmerId'];
    $Quantity=$row['Quantity'];
    $TotalBill=$row['TotalBill'];
    $OrderDate=$row['OrderDate'];
    $OrderStatus=$row['OrderStatus'];
    if($OrderStatus=="Pending"){
   $color='class="mode mode_done"';
    }else if($OrderStatus=="Delivered"){
        $color='class="mode mode_process"';
    }else if($OrderStatus=="Canceled"){
        $color='class="mode mode_cancel"';

    }
    $FarmerName='';
    //$ProductImg='';
  
    $result1 = $conn->query("SELECT * FROM farmer WHERE FarmerId='$FarmerId'"); 
 if($result1){
  while($row1 = $result1->fetch_assoc()){
    $FarmerName=$row1['FarmerName'];
  }}

    
    $result1 = $conn->query("SELECT * FROM product WHERE ProductId='$ProductId'"); 
    if($result1){
    
     while($row1 = $result1->fetch_assoc()){
       $ProductName=$row1['ProductName'];
       $ProductImg=base64_encode($row1['ProductImg']); 

    }}


    ?> <tr> <?php
 ?>
                              
                                    <td><?php echo $OrderId;?></td>
                                    <td><?php echo $FarmerName;?></td>
                                    <td><?php echo $ProductName;?></td>
                                    <td><img src="data:image/PNG;base64,<?php echo $ProductImg;?>" style="width:60px; height:50px;"></img></td>
                                    <td><?php echo $Quantity;?></td>
                                    <td><?php echo $TotalBill;?>₹</td>
                                    <td><?php echo $OrderDate;?></td>
                                    <td><span <?php echo $color;?> ><?php echo $OrderStatus;?></span></td>
                                   
                                    
                                   
                                </tr><?php }}}?>
                                
                                            
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