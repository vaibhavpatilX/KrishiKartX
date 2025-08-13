<?php 
session_start();
include("../conn.php");


if(isset($_SESSION['admin'])){
  $AdminId=$_SESSION['admin'];
}else{
  ?>
  <script>window.location.href = "../adminLogin.php";</script>
<?php  
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Farmers</title>
    <style> 
.mode_cancel{
    background-color: #ed4c4c;
}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/productRequest.css">

</head>
<body>
<?php include_once "adminSidebar.php"; ?>
<div class="container p-30" style="margin-left:300px;margin-top:50px;">
<h2>Verified Farmers</h2>        
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
                                <th style="min-width:50px;">Farmer ID</th>
                                <th style="min-width:50px;">Photo</th>

                                    <th style="min-width:50px;">Farmer Name</th>
                                    <th style="min-width:50px;">Email</th>
                                    <th style="min-width:50px;">Mobile No</th>
                                    <th style="min-width:50px;">Address</th>
                                    

                                    <th style="min-width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $result = $conn->query("SELECT * FROM farmer WHERE FarmerAccount='True'"); 
                            if($result){
                              
                             while($row1 = $result->fetch_assoc()){
                              
                            
    $FarmerName=$row1['FarmerName'];

    $FarmerEmail=$row1['FarmerEmail'];
    $FarmerId=$row1['FarmerId'];
    $FarmerMobile=$row1['FarmerMobile'];
    $FarmerAddress=$row1['FarmerAdd'];
    $profilePic=base64_encode($row1['profilePic']); 

    
    ?> <tr> <?php
 ?>
                              
                                    <td><?php echo $FarmerId;?></td>
                                    <td><img src="data:image/PNG;base64,<?php echo $profilePic;?>" style="width:60px; height:50px;"></img></td>

                                    <td><?php echo $FarmerName;?></td>

                                    <td><?php echo $FarmerEmail;?></td>
                                    <td><?php echo $FarmerMobile;?></td>
                                    <td><?php echo $FarmerAddress;?></td>
                                   
                                    
                                    <td>
                                        
                                        
                                        <div class="btn-group">
                                            <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown_more">
                                            <li>
                                                    <a href="ViewFarmerProduct.php?submit=view&id=<?php echo $FarmerId;?>" target="_black">
                                                        <i class="fa fa-clone"></i>View Products
                                                    </a>
                                                </li>    
                                            <li>
                                                    <a href="ViewFarmerOrder.php?submit=view&id=<?php echo $FarmerId;?>" target="_black">
                                                        <i class="fa fa-clone"></i>View Orders
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="ViewFarmerPayment.php?submit=view&id=<?php echo $FarmerId;?>" target="_black">
                                                        <i class="fa fa-clone"></i>View Payments
                                                    </a>
                                                </li>
                                                
                                                <li>
                                                    <a href="DeleteFarmer.php?submit=reject&id=<?php echo $FarmerId;?>" target="_black">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </td>
                                </tr><?php   
 }}?>
                                
                                            
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