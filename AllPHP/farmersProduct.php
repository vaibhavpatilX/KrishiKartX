<?php
session_start();
include("conn.php");
if(isset($_GET['FarmerId'])){

$FarmerId=$_GET['FarmerId'];
$result = $conn->query("SELECT * FROM product WHERE ProductStatus='True' AND FarmerId=$FarmerId"); 
if($result){
    $rowCount=0;
    while($row = $result->fetch_assoc()){
        $rowCount++; 
    }

if($rowCount>0){
    $Title="Experience the joy of spreading happiness in an organic way with our range of health-enriching products.";

}else if($rowCount==0){
    $Title="No Data Found";
}
}
}else{
    ?>
    <script>window.location.href = "farmer.php";</script>
  <?php  
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Product</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="css/product.css">

</head>
<body>
<?php include_once "navbar.php"; ?>


     <div class="main">
  <h1><b><?php echo $Title;?></b></h1>
  <ul class="cards">
  <?php 
  $result = $conn->query("SELECT * FROM product WHERE ProductStatus='True' AND FarmerId=$FarmerId"); 
 if($result){
   
  while($row = $result->fetch_assoc()){
    $ProductId=$row['ProductId'];
    $FarmerId=$row['FarmerId'];

    $ProductName=$row['ProductName'];
    $ProductCategory=$row['ProductCategory'];
    $ProductDesc=$row['ProductDesc'];
    $ProductPrice=$row['ProductPrice'];

    $ProductImg=base64_encode($row['ProductImg']); 
    
    ?>
    <li class="cards_item">
      <div class="card">
        <div class="card_image"style="height: 250px;"><img src="data:image/PNG;base64,<?php echo $ProductImg;?>"></img></div>
        <div class="card_content">
          <h2 class="card_title">Product Name: <?php echo $ProductName;?></h2>
          <p class="card_text"><b>Product Price:</b> <?php echo $ProductPrice;?></p>
          <p class="card_text"><b>Product Category:</b> <?php echo $ProductCategory;?></p>
        
         <br>
         
            <a style="text-decoration:none;"href="ProductDeatail.php?ProductId=<?php echo $ProductId;?>&FarmerId=<?php echo $FarmerId;?>"><button class="btn card_btn" name="book_btn">Buy Now</button></a>
          
        </div>
      </div>
    </li><?php }} ?>
    <!-- Repeat the above block for each hall -->
  
  </ul>
</div>




</body>
</html>