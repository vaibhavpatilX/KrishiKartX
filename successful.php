
<?php
include("conn.php");
session_start();

$today = date("Y-m-d");
if(isset($_SESSION['customer'])){
  $CustomerId=$_SESSION['customer'];
}else{
  ?>
  <script>window.location.href = "customerLogin.php";</script>
<?php  
}
  
if(isset($_GET['address'])){
$address=$_GET['address'];
$mobile=$_GET['mobile'];
$ProductId=$_GET['ProductId'];
$FarmerId=$_GET['FarmerId'];
$CustomerId=$_GET['CustomerId'];
$Quantity=$_GET['Quantity'];
$TotalBill=$_GET['TotalBill'];
$PaymentMethod=$_GET['PaymentMethod'];

$result = $conn->query("INSERT INTO `order`(`ProductId`, `FarmerId`, `CustomerId`, `DeliveryAddress`, `MobNo`, `Quantity`, `TotalBill`, `OrderDate`, `PaymentStatus`, `PaymentMethod`, `OrderStatus`)VALUES ('$ProductId','$FarmerId','$CustomerId','$address','$mobile','$Quantity','$TotalBill','$today','Done','$PaymentMethod','Pending')"); 
if($result){
  ?>
  <script>alert("Order Confirmed!!");</script>
<?php 
}

$result = $conn->query("SELECT * FROM product WHERE ProductId='$ProductId'"); 
   if($result){
     
    while($row = $result->fetch_assoc()){
      $ProductName=$row['ProductName'];
      $ProductPrice=$row['ProductPrice'];

}}
$result = $conn->query("SELECT * FROM farmer WHERE FarmerId='$FarmerId'"); 
if($result){
  
 while($row = $result->fetch_assoc()){
   $FarmerName=$row['FarmerName'];
   $FarmerEmail=$row['FarmerEmail'];
   $FarmerMobile=$row['FarmerMobile'];
   $FarmerAdd=$row['FarmerAdd'];
   

}}

$result = $conn->query("SELECT * FROM customer WHERE CustomerId='$CustomerId'"); 
if($result){
  
 while($row = $result->fetch_assoc()){
   $CustomerName=$row['CustomerName'];
   

}}

}

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Payment Receipt </title>
    <link rel="stylesheet" href="css/hall_owner_reg.css">
    <link rel="stylesheet" href="css/nav.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
 /* height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;*/
 /* background: linear-gradient(135deg, #71b7e6, #9b59b6);*/
}
.container{
    margin-top: 2%;
    margin-left: 0%;
  max-width: 1000px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow:0 5px 20px rgb(0 0 0);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
 
  text-align: center;
}
.container .sub_title{
    font-size: 20px;
    font-weight: 500;
    position: relative;
   
  }
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100%/3 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input,textarea{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input,textarea:focus,
.user-details .input-box input,textarea:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
     </style>
   </head>
<body>

  <div class="container"style="
    margin-left: 10%;
"><!--<img style="height:150px; width: 150px; margin: auto;" src="images/girOrganics.png" alt="logo_img" />-->
    <div class="title"><b>INVOICE</b></div>
    <div class="sub_title">Customer Details:</div>
    <div class="content">

      <form action="receipt.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Customer Name:    <?php echo $CustomerName;?></span>
          </div>
          <div class="input-box">
            <span class="details">Customer Mobile:   <?php echo $mobile;?></span>
          </div>
          <div class="input-box">
            <span class="details" style="display: flex;">Delivery Address:    <?php echo $address;?>
</span>
          </div>
          
          <div class="input-box">
            <span class="details">Order Date:    <?php echo $today;?>
</span>
          </div>
         
          
        </div>
        <hr>
        <!-- Farmer Details-->
        <div class="sub_title">Farmer Details:</div>
    <div class="content">

      <form action="receipt.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Farmer Name:   <?php echo $FarmerName;?>
</span>
          </div>
          <div class="input-box">
            <span class="details" c>Farmer Email:    <?php echo $FarmerEmail;?>
</span>
          </div>
          <div class="input-box">
            <span class="details">Farmer Mobile :    <?php echo $FarmerMobile;?>
</span>
          </div>
          
          
          <div class="input-box">
            <span class="details">Farmer Address:    <?php echo $FarmerAdd;?>
</span>
          </div>
          
          
        </div>
        <hr>
<!--   Product Detail section -->
        <div class="sub_title">Order Details:</div>
        <div class="content"style="margin-top: -25px;">
      
        <div class="user-details" >
          <table><tr><th style="width:500px;" >
          <div class="input-box">
            <span class="details"><b></b></span>
          </div></th>
          <th style="width:250px">
          <div class="input-box">
            <span class="details"><b></b></span>
          </div></th>
</tr>


          <tr style="background-color:#ebebeb;"><td>
          <div class="input-box">
            <span class="details">Product Id</span>
          </div></td>
          <td>
          <div class="input-box" style=" width: max-content;">
            <span class="details">   <?php echo $ProductId;?>
 </span>
          </div></td>
          </tr>
          <tr><td>
          <div class="input-box">
            <span class="details">Product Name</span>
          </div></td>
          <td>
          <div class="input-box" style=" width: max-content;">
            <span class="details">   <?php echo $ProductName;?>
</span>
          </div></td>
          </tr><tr style="background-color:#ebebeb;"><td>
          <div class="input-box">
            <span class="details">Price</span>
          </div></td>
          <td>
          <div class="input-box" style=" width: max-content;">
            <span class="details">   <?php echo $ProductPrice;?>
 ₹</span>
          </div></td>
          </tr>
          </tr><tr><td>
          <div class="input-box">
            <span class="details">Payment Method</span>
          </div></td>
          <td>
          <div class="input-box"   style=" width: max-content;">
            <span class="details">   <?php echo $PaymentMethod;?>
</span>
          </div></td>
          </tr>
          
</table>
          
         
        </div></div><hr>
<div class="total" style="margin-left:400px;">

<span><b>Price:</b>    <?php echo $ProductPrice;?>
 ₹</span><br><br>
<span><b>Quantity:</b>    <?php echo $Quantity;?>
</span><br><br><hr>
<span><b>Total Bill:</b>    <?php echo $TotalBill;?>
 ₹</span>

</div><br>

<div class="button"> 
    <a href="javascript:void(0)" onclick="printAndRedirect()" class="btn btn-success me-1" style="margin-left:40px;">
        <img src="images/print.png" style="height: -webkit-fill-available;" />
    </a>
</div>

        </div></div></div></div>
            </form>
           
    </div>
  </div>
  <script>
    function printAndRedirect() {
        // Perform printing
        window.print({ filename: 'Payment Receipt.pdf' });

        // Redirect to a new page after printing successfully
        window.location.href = "customerDashboard.php";
    }
</script>

</body>
</html>