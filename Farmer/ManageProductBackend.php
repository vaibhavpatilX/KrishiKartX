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

<?php 

//session_start();
if(isset($_GET['submit']) && $_GET['submit'] == "accept"){
    $ProductId=$_GET['id'];
     $result = $conn->query("SELECT * FROM product WHERE ProductId='$ProductId'"); 
 if($result){
   
  while($row = $result->fetch_assoc()){
    $ProductId=$row['ProductId'];
    $ProductName=$row['ProductName'];
    $ProductPrice=$row['ProductPrice'];
    $ProductStock=$row['ProductStock'];
    $ProductCategory=$row['ProductCategory'];
    $ProductDesc=$row['ProductDesc'];

    $ProductStatus=$row['ProductStatus'];
    $ProductImg=base64_encode($row['ProductImg']); 
    if($ProductStatus=="True"){
        $color='class="mode mode_done"';
        $ProductStatus="Verified";
         }else if($ProductStatus=="False"){
             $color='class="mode mode_process"';
             $ProductStatus="Not Verified";
         }
   
        }}
    /*$status="True";
    $productId=$_GET['id'];
    $stmt = $conn->prepare("UPDATE product SET ProductStatus = ? WHERE ProductId = ?");
    $stmt->bind_param("si", $status, $productId);
    $stmt->execute();
    
    // Check if the update was successful
    if($stmt->affected_rows > 0) {?>
      <script> alert("Product status updated successfully");
            window.location.href = "MyProducts.php";

    </script>
      <?php

    } else {
        echo "Failed to update product status.";
    }
    
    // Close the statement
    $stmt->close();*/

?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

body {
  /*min-height: 100vh;*/
   background: #eef5fe !important;

    margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
/* Pre css */
.flex {
  display: flex;
  align-items: center;
}
.nav_image {
  display: flex;
  min-width: 55px;
  justify-content: center;
}
.nav_image img {
  height: 35px;
  width: 35px;
  border-radius: 50%;
  object-fit: cover;
}

/* Sidebar */
.sidebar {
  position: fixed;
  z-index: 1000;
  top: 0;
  left: 0;
  height: 100%;
  width: 270px;
  background: #fff;
  padding: 15px 10px;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
  transition: all 0.4s ease;
}
.sidebar.close {
  width: calc(55px + 20px);
}
.logo_items {
  gap: 8px;
}
.logo_name {
  font-size: 22px;
  color: #333;
  font-weight: 500px;
  transition: all 0.3s ease;
}
.sidebar.close .logo_name,
.sidebar.close #lock-icon,
.sidebar.close #sidebar-close {
  opacity: 0;
  pointer-events: none;
}
#lock-icon,
#sidebar-close {
  padding: 10px;
  color: #4070f4;
  font-size: 25px;
  cursor: pointer;
  margin-left: -4px;
  transition: all 0.3s ease;
}
#sidebar-close {
  display: none;
  color: #333;
}
.menu_container {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-top: 40px;
  overflow-y: auto;
  height: calc(100% - 82px);
}
.menu_container::-webkit-scrollbar {
  display: none;
}
.menu_title {
  position: relative;
  height: 50px;
  width: 55px;
}
.menu_title .title {
  margin-left: 15px;
  transition: all 0.3s ease;
}
.sidebar.close .title {
  opacity: 0;
}
.menu_title .line {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  height: 3px;
  width: 20px;
  border-radius: 25px;
  background: #aaa;
  transition: all 0.3s ease;
}
.menu_title .line {
  opacity: 0;
}
.sidebar.close .line {
  opacity: 1;
}
.item {
  list-style: none;
}
.link {
  text-decoration: none;
  border-radius: 8px;
  margin-bottom: 8px;
  color: #707070;
}
.link:hover {
  color: #fff;
  background-color: #4070f4;
}
.link span {
  white-space: nowrap;
}
.link i {
  height: 50px;
  min-width: 55px;
  display: flex;
  font-size: 22px;
  align-items: center;
  justify-content: center;
  border-radius: 4px;
}

.sidebar_profile {
  padding-top: 15px;
  margin-top: 15px;
  gap: 15px;
  border-top: 2px solid rgba(0, 0, 0, 0.1);
}
.sidebar_profile .name {
  font-size: 18px;
  color: #333;
}
.sidebar_profile .email {
  font-size: 15px;
  color: #333;
}

/* Navbar */
.navbar {
 /* max-width: 500px;*/
  width: 100%;
  position: fixed;
  top: 0;
  left: 60%;
  transform: translateX(-50%);
  background: #fff;
  padding: 10px 20px;
  border-radius: 0 0 8px 8px;
  justify-content: space-between;
}
#sidebar-open {
  font-size: 30px;
  color: #333;
  cursor: pointer;
  margin-right: 20px;
  display: none;
}
.search_box {
  height: 46px;
  max-width: 500px;
  width: 100%;
  border: 1px solid #aaa;
  outline: none;
  border-radius: 8px;
  padding: 0 15px;
  font-size: 18px;
  color: #333;
}
.navbar img {
  height: 40px;
  width: 40px;
  margin-left: 20px;
}

/* Responsive */
@media screen and (max-width: 1100px) {
  .navbar {
    left: 65%;
  }
}
@media screen and (max-width: 800px) {
  .sidebar {
    left: 0;
    z-index: 1000;
  }
  .sidebar.close {
    left: -100%;
  }
  #sidebar-close {
    display: block;
  }
  #lock-icon {
    display: none;
  }
  .navbar {
    left: 0;
    max-width: 100%;
    transform: translateX(0%);
  }
  #sidebar-open {
    display: block;
  }
}
       


.container {
    max-width: 800px;
    margin: 0 auto;
   /* margin-top: 10%;*/
   margin-left: 30%;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   /* height: 500px;*/
    overflow-y: auto;
}

h1 {
    text-align: center;
    color: #333;
    font-size: 25px;
}

/* Form Styles */
.form-group {
    margin-bottom: 10px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea,
select {
    width: 90%;
    padding: 5px;
    border: none; /* Remove all borders */
    border-bottom: 1px solid #ccc; /* Add bottom border only */
    box-sizing: none;
    font-size: 16px;
    transition: border-bottom-color 0.3s ease; 

}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
textarea:focus,
select:focus {
    border-bottom: 2px solid #4070f4; 
                outline: none;/* Change border color on focus */
}

input[type="text"]:hover,
input[type="email"]:hover,
input[type="tel"]:hover,
textarea:hover,
select:hover {
    border-bottom: 2px solid #4070f4; /* Change border color on hover */
}


textarea {
    resize: vertical;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
   h4 {
            color: blue;
            font-size: 20px;
            margin-bottom: 10px;
            padding-bottom: 5px; 
        }

/* Responsive Styles */
@media (max-width: 600px) {
    .container {
        padding: 10px;
    }
}
        .navbar2 {
    width: 100%;
  /*  position: fixed;*/
    top: 30px; /* Adjust as needed based on your existing navbar height */
    background: #fff;
    
    border-radius: 0 0 8px 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav-links {
    list-style-type: none;
    margin-left: 22%;
    padding: 0;
    display: flex;
}

.nav-links li {
    margin-right: 20px;
}

/* Style for button property */
.button {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    color: Black;
 
 
    transition: background-color 0.3s ease;
    border: 2px solid;
    border-image: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5) 1;
    /* Ensure the border image slices evenly */
    border-image-slice: 1;
    /* Set border radius */
    border-radius: 10px; /* Adjust the value as needed */
    /* Set border color */
    border-color: #333; 
}

.button:hover {
  color: #7F7FD5;
}




    </style>
</head>
<body>


<?php include_once "farmerSidebar.php"; ?>


    <div class="container">
      <h1><i class="fas fa-plus"></i>Update Product</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    	<h4>Product info</h4>
      <label for="pname"> Product Name</label>
      <input type="text" id="pname" name="pname" value="<?php echo $ProductName;?>
" required>
    </div>
    <div class="form-group">
      <label for="Catergory">Catergory</label>
      <input type="text" id="Catergory" name="Catergory" value="<?php echo $ProductCategory;?>
" required>
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <input type="text" id="Description" name="Description" value="<?php echo $ProductDesc;?>
" required>
    </div>
    <div class="form-group">
      <label for="Price">Price</label>
      <input type="number" id="Price" name="Price" min="10" value="<?php echo $ProductPrice;?>" required>
    </div>
    <div class="form-group">
      <label for="stock">Add Stock </label>
      <input type="number" id="stock" name="stock" min="1" value="<?php echo $ProductStock;?>
"required>
    </div>
   
                <input type="hidden" value="<?php echo $ProductId;?>" name="product_id"/>
    <input type="submit" value="Update" name="update">      
        
        </form>
    </div>

 
</body>
</html> <?php
}else if(isset($_GET['submit']) && $_GET['submit'] == "reject"){
    $status="False";
    $productId=$_GET['id'];
    $stmt = $conn->prepare("DELETE FROM product WHERE ProductId = ?");
    $stmt->bind_param("i", $productId); // Assuming ProductId is an integer
    $stmt->execute();
    
    // Check if the update was successful
    if($stmt->affected_rows > 0) {?>
      <script> alert("Product deleted successfully");
            window.location.href = "MyProducts.php";

    </script>
      <?php

    } else {
        echo "Failed to update product status.";
    }
    
    // Close the statement
    $stmt->close();
}
?>
<?php



if(isset($_POST['update'])) {
    $pname=$_POST["pname"];
    $Catergory=$_POST["Catergory"];
    $Description=$_POST["Description"];
    $Price=$_POST["Price"];
    $stock=$_POST["stock"]; 
   
    // Assuming you have a variable $productId containing the ID of the product to be updated
    $productId = $_POST["product_id"];

    $sql = "UPDATE `product` SET 
            `ProductName`='$pname',
            `ProductCategory`='$Catergory',
            `ProductDesc`='$Description',
            `ProductPrice`='$Price',
            `ProductStock`='$stock',
            `ProductStatus`='False'
            WHERE `ProductId`='$productId'";

    if ($conn->query($sql) === TRUE) {
        ?><script>alert('Data Updated');</script><?php
    } else {
        ?><script>alert('Something went wrong');</script><?php
    }

    $conn->close();
}
