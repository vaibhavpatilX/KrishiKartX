<?php 
session_start();
include("../conn.php");


if(isset($_SESSION['admin'])){
  $adminId=$_SESSION['admin'];
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
    <title>Product Requests</title>
    <style> 

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
<h2>Farmers Registration Requests</h2>        
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
                                    <th style="min-width:150px;"> Name</th>
                                    <th style="min-width:150px;"> Image </th>
                                    <th style="min-width:150px;">Email</th>
                                   
                                    <th style="min-width:100px;">Mobile</th>
                                    <th style="min-width:150px;">Address</th>
                                    

                                    <th style="min-width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $result = $conn->query("SELECT * FROM farmer WHERE FarmerAccount='False'"); 
 if($result){
   
  while($row = $result->fetch_assoc()){
    $FarmerId=$row['FarmerId'];
    $FarmerName=$row['FarmerName'];
    $FarmerEmail=$row['FarmerEmail'];
    $FarmerMobile=$row['FarmerMobile'];
    $FarmerAdd=$row['FarmerAdd'];
    $profilePic=base64_encode($row['profilePic']); 
    
    ?> <tr> <?php
 ?>
                              
                                    <td><?php echo $FarmerId;?></td>
                                    <td><?php echo $FarmerName;?></td>
                                    <td><img src="data:image/PNG;base64,<?php echo $profilePic;?>" style="width:60px; height:50px;"></img></td>
                                    <td><?php echo $FarmerEmail;?></td>
                                    <td><?php echo $FarmerMobile;?></td>
                                    <td><?php echo $FarmerAdd;?></td>
                                   
                                    
                                    <td>
                                        
                                        
                                        <div class="btn-group">
                                            <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown_more">
                                                <li>
                                                    <a href="RegRequestBackend.php?submit=accept&id=<?php echo $FarmerId;?>" target="_black">
                                                        <i class="fa fa-clone"></i>Accept
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="RegRequestBackend.php?submit=reject&id=<?php echo $FarmerId;?>" target="_black">
                                                        <i class="fa fa-trash"></i> Reject
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </td>
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