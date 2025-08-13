<?php
include("conn.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Product</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
<style>
body {
  font-family: tahoma;
  
  background-image: url(https://picsum.photos/g/3000/2000);
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
}

.our-team {
  padding: 30px 0 40px;
  margin-bottom: 30px;
  background-color: #f7f5ec;
  text-align: center;
  overflow: hidden;
  position: relative;
}

.our-team .picture {
  display: inline-block;
  height: 130px;
  width: 130px;
  margin-bottom: 50px;
  z-index: 1;
  position: relative;
}

.our-team .picture::before {
  content: "";
  width: 100%;
  height: 0;
  border-radius: 50%;
  background-color: #1369ce;
  position: absolute;
  bottom: 135%;
  right: 0;
  left: 0;
  opacity: 0.9;
  transform: scale(3);
  transition: all 0.3s linear 0s;
}

.our-team:hover .picture::before {
  height: 100%;
}

.our-team .picture::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #1369ce;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
}

.our-team .picture img {
  width: 100%;
  height: auto;
  border-radius: 50%;
  transform: scale(1);
  transition: all 0.9s ease 0s;
}

.our-team:hover .picture img {
  box-shadow: 0 0 0 14px #f7f5ec;
  transform: scale(0.7);
}

.our-team .title {
  display: block;
  font-size: 15px;
  color: #4e5052;
  text-transform: capitalize;
}

.our-team .social {
  width: 100%;
  padding: 0;
  margin: 0;
  background-color: #1369ce;
  position: absolute;
  bottom: -100px;
  left: 0;
  transition: all 0.5s ease 0s;
}

.our-team:hover .social {
  bottom: 0;
}

.our-team .social li {
  display: inline-block;
}

.our-team .social li a {
  display: block;
  padding: 10px;
  font-size: 17px;
  color: white;
  transition: all 0.3s ease 0s;
  text-decoration: none;
}

.our-team .social li a:hover {
  color: #1369ce;
  background-color: #f7f5ec;
}

</style>
</head>
<body>
<?php include_once "navbar.php"; ?>
<div class="container">
  <div class="row">
  <?php $result = $conn->query("SELECT * FROM farmer WHERE FarmerAccount='True'"); 
if($result){
  
 while($row = $result->fetch_assoc()){
  $FarmerId=$row['FarmerId'];

   $FarmerName=$row['FarmerName'];
   $FarmerEmail=$row['FarmerEmail'];
   $FarmerMobile=$row['FarmerMobile'];
   $FarmerAdd=$row['FarmerAdd'];
   $profilePic=base64_encode($row['profilePic']); 

?>

     <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="data:image/PNG;base64,<?php echo $profilePic;?>" alt="">
        </div>
        <div class="team-content">
          <h3 class="name"><?php echo $FarmerName;?></h3>
          <h4 class="title"><?php echo $FarmerEmail;?></h4>
        </div>
        <ul class="social">
          <li><a href="farmersProduct.php?FarmerId=<?php echo $FarmerId;?>" aria-hidden="false">View Products</a></li>
          
        </ul>
      </div>  
    </div> 
    <?php }}?>
  </div>
</div>
  </body>
</html>