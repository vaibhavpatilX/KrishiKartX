<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/home1.css">

<style>
    .full-width-photo {
        background-image: url('images/hand-7330658_1920.jpg');
        background-size: cover;
        background-position: center;
        height: 600px;
    }
</style>

</head>
<body>

<?php include_once "navbar.php"; ?>

<!-- Full Width Photo -->
<div class="full-width-photo"></div>

<div class="container">
   <div class="row" style="margin-top:-150px;">
     <!-- card1 -->
      <div class="card card-circle">
         <div class="card-icon">
            <i class="fas fa-apple-alt"></i>
         </div>
         <div class="card-body">
            <h5 class="card-title">Farmers</h5>
            <p class="card-text">KrishiKartX provides a dedicated platform for farmers to showcase and sell their organic and fresh grains.</p><p class="card-text"> Register now on KrishiKartX' website to kickstart your business journey today!</p>
            <a href="farmerReg.php" class="btn btn-primary">Register</a>
         </div>
      </div>
      <!-- card2 -->
      <div class="card card-circle">
         <div class="card-icon">
            <i class="fas fa-cookie"></i>
         </div>
         <div class="card-body">
            <h5 class="card-title">Our Aim</h5>
            <p class="card-text">May All Be Healthy</p>
            <p class="card-text">Our Products To Be Health Enriching</p>
            <p class="card-text">Excellence In Providing Organic Products</p>
            <p class="card-text">Spread Happiness In An Organic Way</p>
            <p class="card-text">To Be A Global Leader In Creating Healthy Environment</p>
            <a href="about.php" class="btn btn-primary">Read More</a>
         </div>
      </div>
      <!-- card3 -->
      <div class="card card-circle ">
         <div class="card-icon">
            <i class="fas fa-carrot"></i>
         </div>
         <div class="card-body">
            <h5 class="card-title">Products</h5>
            <p class="card-text">Discover excellence in organic products that are carefully crafted to nourish and support your healthy lifestyle.</p>
            <a href="product.php" class="btn btn-primary">Our Products</a>
         </div>
      </div>
   </div>
</div>
<?php include_once "footer.php"; ?>

</body>
</html>
