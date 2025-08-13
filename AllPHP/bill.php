<?php
include("conn.php");
session_start();
$api_key = 'rzp_test_Inr1Lu5WMZuWiy';
$today = date("Y-m-d");
if(isset($_SESSION['customer'])){
  $CustomerId=$_SESSION['customer'];
}else{
  ?>
  <script>window.location.href = "customerLogin.php";</script>
<?php  
}
if(isset($_POST['submit'])){
  $qauntity=$_POST['qauntity'];
  if($qauntity>1){
    $qauntity=$qauntity-1;
  }
  $FarmerId=$_POST['FarmerId'];
  $ProductId=$_POST['ProductId'];
  $ProductName='';
  $ProductPrice='';
  $FarmerName='';
   $FarmerEmail='';
   $FarmerMobile='';
   $FarmerAdd='';

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
   $QrCode=base64_encode($row['QrCode']); 


}}
$total_bill =$qauntity* $ProductPrice;
$amount_in_paise = $total_bill * 100;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
.blur-background {
            filter: blur(5px);
        }
.popup{
    width: 400px;
    background: #e3c9e8;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.1);
    text-align: center;
    padding: 0 30px 60px;
    color: #333;
    visibility: hidden;
    transition: all 0.4s ease-in-out;
}

.open-popup{
    visibility: visible;
    top: 50%;
    transform: translate(-50%, -50%) scale(1);
}

.popup img{
    width: 200px;
    height:200px ;

   
    
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.popup h2{
    font-size: 38px;
    font-weight: 500;
    margin: 30px 0 10px;
}

.popup button{
  width: 50%;
    margin-top: 30px;
    padding: 10px 0;
    background-color: #e02189;
    color: #fff;
    border: 0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    box-shadow: 0 5px 5px rgba(0,0,0,0.2);
}

/******** */
        * {
  box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
  font-size: 18px;
/*   border: 1px solid black; */
  margin: 0;
  padding: 0;
}

body {
  margin: 0;
  padding: 1% 0;
  position: relative;
  min-height: 100vh;
  background: #34495e;
  display: flex;
  justify-content: center;
    animation: fadein 5s;
  animation-fill-mode: forwards;
}

.fadeIn {
  animation: fadein 5s;
  animation-fill-mode: forwards;
}

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

label {
  display: block;
}
/* Model Container */

.model {
  width: 900px;
  height: 700px;
  background: white;
/*   font-size: 0; */
  color: white;
  position: relative;
/*   animation: slideInFromLeft 1s cubic-bezier(0.68, -0.55, 0.265, 1.55); */
  animation-fill-mode: forwards;
}


@keyframes slideInFromLeft {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateX(0);
  }
}

.room {
  width: 50%;
  height: 100%;
  background: url(images/billgrains.jpg) no-repeat center center;
  background-size: cover;
  display: inline-block;
  vertical-align: top;
  position: relative;
}

.text-cover {
  position: absolute;
  bottom: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.7);
  padding: 20px
}

.text-cover > * {
  margin: 10px 0;
}

.text-cover h1 {
  font-size: 1.8rem;
}

.text-cover .price {
  color: #e67e22;
}

.text-cover .price span {
  font-size: 1.4rem;
  font-weight: 700;
}

.payment {
  width: 50%;
  height: 100%;
  color: #34495e;
  display: inline-block;
}

.receipt-box {
  padding: 20px 20px;
  border-bottom: 1px solid #34495e;
}

.receipt-box h3,
.payment-info h3 {
  margin-bottom: 2rem;
}

.payment-info {
  padding: 20px;
}


input[type=text]{
    width: 100%;
    padding: 8px 10px 10px;
    margin: 15px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn {
  padding: 15px 25px;
  border: none;
  color: white;
  /*width: 100%;*/
  display: block;
  background: #9b59b6;
  text-transform: uppercase;
}

.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}
 
.table td {
  font-size: 0.8rem;
  font-style: italic;
  padding: .25rem;
  vertical-align: top;
    
}


.table td:nth-child(2) {
  text-align: right;
}

    </style>
</head>
<body>
<section>
  <div class="model">
    <div class="room">
      <div class="text-cover">
        <h1><?php echo $FarmerName; ?> </h1>
        <p class="price"> <?php echo $FarmerEmail; ?></p>
        <p class="price"> <?php echo $FarmerMobile; ?></p>
        <hr>
        <p><?php echo $FarmerAdd; ?></p>
        <p><?php echo $today; ?> </p>
      </div>
    </div><div class="payment">
      <div class="receipt-box">
        <h3>Reciept Summary</h3>
        <table class="table">
          <tr>
            <td><?php echo $ProductName; ?></td>
            <td><?php echo $ProductPrice; ?> ₹</td>
          </tr>
          <tr>
            <td>Quantity</td>
            <td><?php echo $qauntity; ?></td>
          </tr>
          
          <tfoot>
            <tr>
              <td>Total</td>
              <td><?php echo $total_bill; ?> ₹</td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="payment-info">
        <h3>Delivery Info</h3>
        
        <label>Delivery Address</label>
        <input type="text" name="addressInput" id="addressInput" onchange="copyInputValue1()" value="" required>
        <label>Mobile Number</label>
        <input type="text" name="mobileInput" id="mobileInput" onchange="copyInputValue2()" value="" required><hr>
        <br>
        <h3>Choose Payment Method :</h3>
        <input class="btn" type="submit" onclick="openPopup()" value="Qr Code">
        <br>
        <form action="successful.php" method="GET" id="razorpay-button" style="    width: 135px;">
    <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo $api_key; ?>"
            data-amount="<?php echo $amount_in_paise;?>"
            data-currency="INR"
            data-id="100"
            data-buttontext="Razorpay"
            data-name="KrishiKartX"
            data-description="Make Happy order!!"
            data-image="images/KrishiKartX.png"
            data-prefill.name="Vaibhav"
            data-prefill.email="email"
            data-prefill.contact="8784850525"
            data-theme.color="#F37254"
    ></script>

    <input type="hidden" name="address" id="hidden_address" value="" required style="display:none">
    <input type="hidden" name="mobile" id="hidden_mobile" value="" style="display:none" >
    <input type="hidden" name="ProductId" value="<?php echo $ProductId; ?>" style="display:none">
    <input type="hidden" name="FarmerId" value="<?php echo $FarmerId; ?>" style="display:none">
    <input type="hidden" name="CustomerId" value="<?php echo $CustomerId; ?>" style="display:none">
    <input type="hidden" name="Quantity" value="<?php echo $qauntity; ?>" style="display:none">
    <input type="hidden" name="TotalBill" value="<?php echo $total_bill; ?>" style="display:none">
    <input type="hidden" name="PaymentMethod" value="<?php echo "Razorpay"; ?>" style="display:none">
   



</form>

      
      </div>
    </div>
  </div>
</section>
  <div class="popup" id="popup">
  <br>
    <h4>Total Bill:<?php echo $total_bill;?>₹</h4><br>
    <img src="data:image/PNG;base64,<?php echo $QrCode;?>" alt="">
    <button type="button" onclick="submitForm('successful.php')">Payment Done</button>
    <button type="button" onclick="closePopup()">Cancel</button>
  </div>  

  <script>
    document.addEventListener("DOMContentLoaded", function () {
    // Select the Razorpay button element
    var razorpayButton = document.getElementById("razorpay-button");
    
    // Style the button
    razorpayButton.style.background = "#F37254";
    razorpayButton.style.color = "white";
    razorpayButton.style.border = "none";
    razorpayButton.style.padding = "10px 20px";
    // Add more styles as needed
});
    //
    function submitForm(destinationPage) {
    // Get the values of address and mobile fields
    var address = document.getElementById("addressInput").value;
    var mobile = document.getElementById("mobileInput").value;

    // Perform validations
    if (address.trim() === "") {
        alert("Please enter a valid address.");
        return; // Stop further execution
    }

    if (mobile.trim() === "" || !isValidMobileNumber(mobile)) {
        alert("Please enter a valid mobile number.");
        return; // Stop further execution
    }

    // Redirect to the destination page with parameters passed in URL
    window.location.href = destinationPage + "?address=" + address + "&mobile=" + mobile + "&ProductId=" + <?php echo $ProductId; ?> + "&FarmerId=" + <?php echo $FarmerId; ?> + "&CustomerId=" + <?php echo $CustomerId; ?> + "&Quantity=" + <?php echo $qauntity; ?> + "&TotalBill=" + <?php echo $total_bill; ?> + "&PaymentMethod=" + <?php echo "'Qr Code'"; ?>;
}

// Function to validate mobile number format
function isValidMobileNumber(mobile) {
    // Your mobile number validation logic here
    // For example, you can use regular expressions to check format
    var mobilePattern = /^[0-9]{10}$/;
    return mobilePattern.test(mobile);
}

    //
    var model = document.querySelector(".model");

function fadeIn () {
  console.log('fadein')
  model.className += " fadeIn";
}
//
let popup = document.getElementById('popup')

function openPopup(){
  
  var element = document.querySelector('.model'); // Select the element by class name
        element.classList.add('blur-background');
  popup.classList.add('open-popup')
}

function closePopup(){
  
  var element = document.querySelector('.model'); // Select the element by class name
        element.classList.remove('blur-background');
  popup.classList.remove('open-popup')
}
//copy input value
function copyInputValue1() {
        // Get the value of the first input element
        var input1Value = document.getElementById("addressInput").value;
        
        // Assign the value to the second input element
        document.getElementById("hidden_address").value = input1Value;
    }
function copyInputValue2() {
        // Get the value of the first input element
        var input1Value = document.getElementById("mobileInput").value;
        
        // Assign the value to the second input element
        document.getElementById("hidden_mobile").value = input1Value;
    }
  </script>
</body>
</html>
<?php } ?>