<?php 
session_start();
include("../conn.php");


if(isset($_SESSION['admin'])){
  $AdminId=$_SESSION['admin'];
}else{
  ?>
  <script>window.location.href = "../adminLogin.php";</script>
<?php  
}
 $PendingCount=0;
$DeliverdCount=0;
$PaymentCount=0;
$Canceled=0;
$farmerCount=0;
$TotalOrder=0;
$ProductCount=0;
$CustomerCount=0;
$ProductReqCount=0;
$FarmerReqCount=0;
$result = $conn->query("SELECT * FROM `order` WHERE OrderStatus='Pending'"); 
if($result){
	
	while($row = $result->fetch_assoc()){
		$PendingCount=$PendingCount+1; 
	   
	}}
	$result = $conn->query("SELECT * FROM `order` WHERE  OrderStatus='Delivered'"); 
	if($result){
		
		while($row = $result->fetch_assoc()){
			$DeliverdCount++; 
		}}
	  
		$result = $conn->query("SELECT * FROM `order` WHERE  OrderStatus='Canceled'"); 
		if($result){
			
			while($row = $result->fetch_assoc()){
				$Canceled++; 
			}} 
	$result = $conn->query("SELECT * FROM product WHERE  ProductStatus='False'"); 
			if($result){
				
				while($row = $result->fetch_assoc()){
					$ProductReqCount++; 
				}} 

				$result = $conn->query("SELECT * FROM farmer WHERE  FarmerAccount='False'"); 
				if($result){
					
					while($row = $result->fetch_assoc()){
						$FarmerReqCount++; 
					}} 

   $result = $conn->query("SELECT * FROM `order`"); 
		if($result){
			
			while($row = $result->fetch_assoc()){
				$PaymentCount=$PaymentCount+$row['TotalBill'];
				$TotalOrder++;
			}}
			$result = $conn->query("SELECT * FROM farmer"); 
			if($result){
				
				while($row = $result->fetch_assoc()){
					
					$farmerCount++;
				}}
  $result = $conn->query("SELECT * FROM product"); 
			if($result){
				
				while($row = $result->fetch_assoc()){
					
				  $ProductCount++;
				}}
$result = $conn->query("SELECT * FROM customer"); 
				if($result){
					
					while($row = $result->fetch_assoc()){
						$CustomerId=$row['CustomerId'];
						$result1 = $conn->query("SELECT * FROM `order` WHERE CustomerId='$CustomerId'"); 
				if($result1){
					
					while($row1 = $result1->fetch_assoc()){
					  $CustomerCount++;
					  break;
					}}
				  }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
      <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="css/index.css">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
</head>
<body style="overflow-y: scroll; ">
    <!-- Include the navigation bar -->
    <?php include_once "adminSidebar.php"; ?>

    
    <script src="js/index.js"></script>
        <script src="js/chart.js"></script>
    
    <!-- Main content of the page -->
    <div class="dash" style="    margin-left: 20%;overflow: auto;">
<div class="content">
			<section class="info-boxes">
				<div class="info-box">
					<div class="box-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 20V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1zm-2-1H5V5h14v14z"/><path d="M10.381 12.309l3.172 1.586a1 1 0 0 0 1.305-.38l3-5-1.715-1.029-2.523 4.206-3.172-1.586a1.002 1.002 0 0 0-1.305.38l-3 5 1.715 1.029 2.523-4.206z"/></svg>
					</div>
					
					<div class="box-content">
						<span class="big"><?php echo $TotalOrder; ?></span>
						Total Orders
					</div>
				</div>
				
				<div class="info-box">
					<div class="box-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 10H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V11a1 1 0 0 0-1-1zm-1 10H5v-8h14v8zM5 6h14v2H5zM7 2h10v2H7z"/></svg>
					</div>
					
					<div class="box-content">
						<span class="big"><?php echo $PendingCount; ?></span>
						Pending Orders
					</div>
				</div>
				
				<div class="info-box active">
					<div class="box-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3,21c0,0.553,0.448,1,1,1h16c0.553,0,1-0.447,1-1v-1c0-3.714-2.261-6.907-5.478-8.281C16.729,10.709,17.5,9.193,17.5,7.5 C17.5,4.468,15.032,2,12,2C8.967,2,6.5,4.468,6.5,7.5c0,1.693,0.771,3.209,1.978,4.219C5.261,13.093,3,16.287,3,20V21z M8.5,7.5 C8.5,5.57,10.07,4,12,4s3.5,1.57,3.5,3.5S13.93,11,12,11S8.5,9.43,8.5,7.5z M12,13c3.859,0,7,3.141,7,7H5C5,16.141,8.14,13,12,13z"/></svg>
					</div>
					
					<div class="box-content">
						<span class="big"><?php echo $DeliverdCount; ?></span>
						Deliverd Orders
					</div>
				</div>
				<div class="info-box active">
					<div class="box-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3,21c0,0.553,0.448,1,1,1h16c0.553,0,1-0.447,1-1v-1c0-3.714-2.261-6.907-5.478-8.281C16.729,10.709,17.5,9.193,17.5,7.5 C17.5,4.468,15.032,2,12,2C8.967,2,6.5,4.468,6.5,7.5c0,1.693,0.771,3.209,1.978,4.219C5.261,13.093,3,16.287,3,20V21z M8.5,7.5 C8.5,5.57,10.07,4,12,4s3.5,1.57,3.5,3.5S13.93,11,12,11S8.5,9.43,8.5,7.5z M12,13c3.859,0,7,3.141,7,7H5C5,16.141,8.14,13,12,13z"/></svg>
					</div>
					
					<div class="box-content">
						<span class="big"><?php echo $Canceled; ?></span>
						Canceled Orders
					</div>
				</div>
				
				<div class="info-box">
					<div class="box-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 3C6.486 3 2 6.364 2 10.5c0 2.742 1.982 5.354 5 6.678V21a.999.999 0 0 0 1.707.707l3.714-3.714C17.74 17.827 22 14.529 22 10.5 22 6.364 17.514 3 12 3zm0 13a.996.996 0 0 0-.707.293L9 18.586V16.5a1 1 0 0 0-.663-.941C5.743 14.629 4 12.596 4 10.5 4 7.468 7.589 5 12 5s8 2.468 8 5.5-3.589 5.5-8 5.5z"/></svg>
					</div>
					
					<div class="box-content">
						<span class="big"><?php echo $FarmerReqCount; ?></span>
						Registartion Reqests
					</div>
				</div>
				
				<div class="info-box">
					<div class="box-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 3C6.486 3 2 6.364 2 10.5c0 2.742 1.982 5.354 5 6.678V21a.999.999 0 0 0 1.707.707l3.714-3.714C17.74 17.827 22 14.529 22 10.5 22 6.364 17.514 3 12 3zm0 13a.996.996 0 0 0-.707.293L9 18.586V16.5a1 1 0 0 0-.663-.941C5.743 14.629 4 12.596 4 10.5 4 7.468 7.589 5 12 5s8 2.468 8 5.5-3.589 5.5-8 5.5z"/></svg>
					</div>
					
					<div class="box-content">
						<span class="big"><?php echo $ProductReqCount; ?></span>
						Product Requests
					</div>
				</div>
				
				<div class="info-box">
					<div class="box-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 3C6.486 3 2 6.364 2 10.5c0 2.742 1.982 5.354 5 6.678V21a.999.999 0 0 0 1.707.707l3.714-3.714C17.74 17.827 22 14.529 22 10.5 22 6.364 17.514 3 12 3zm0 13a.996.996 0 0 0-.707.293L9 18.586V16.5a1 1 0 0 0-.663-.941C5.743 14.629 4 12.596 4 10.5 4 7.468 7.589 5 12 5s8 2.468 8 5.5-3.589 5.5-8 5.5z"/></svg>
					</div>
					
					<div class="box-content">
						<span class="big"><?php echo $farmerCount; ?></span>
						Total Farmers
					</div>
				</div>
				<div class="info-box">
					<div class="box-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 3C6.486 3 2 6.364 2 10.5c0 2.742 1.982 5.354 5 6.678V21a.999.999 0 0 0 1.707.707l3.714-3.714C17.74 17.827 22 14.529 22 10.5 22 6.364 17.514 3 12 3zm0 13a.996.996 0 0 0-.707.293L9 18.586V16.5a1 1 0 0 0-.663-.941C5.743 14.629 4 12.596 4 10.5 4 7.468 7.589 5 12 5s8 2.468 8 5.5-3.589 5.5-8 5.5z"/></svg>
					</div>
					
					<div class="box-content">
						<span class="big"><?php echo $CustomerCount; ?></span>
						Total Customers
					</div>
			
					</div>
				
				
			</section>
		
			<section class="person-boxes">
				<div class="person-box">
					    <div id="chart_div"></div>
					
					</div>	
	</section>
</div></div>
</body>
</html>
