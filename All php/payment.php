<?php

// Replace with your actual Razorpay API credentials (obtained from your Razorpay account)
$api_key = 'rzp_test_Inr1Lu5WMZuWiy';
$api_secret = 'YOUR_TEST_API_SECRET_HERE';

// Access total_bill from your application logic (ensure it's a valid amount)
$total_bill = 299.35; // Replace with the actual amount (e.g., from user input)

// Convert the amount to paise (100 paise = ₹1)
$amount_in_paise = $total_bill * 100;

// Create a Razorpay instance using the API credentials
//use Razorpay\Api\Api;
//$api = new Api($api_key, $api_secret);

// Create an order using the Razorpay API (replace with your actual order data)
try {
  $orderData = [
    'receipt' => uniqid(), // Generate a unique receipt ID
    'amount' => $amount_in_paise,
    'currency' => 'INR',
    'payment_capture' => 1 // Auto-capture payment (optional)
  ];
  //$razorpayOrder = $api->order->create($orderData);
 // $razorpayOrderId = $razorpayOrder['id'];
} catch (Exception $e) {
  echo "Error creating Razorpay order: " . $e->getMessage();
  exit;
}

?>

<form action="successful.jsp" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $api_key; ?>"
    data-amount="<?php echo $amount_in_paise; ?>"
    data-currency="INR"
    data-id="100"
    data-buttontext="Accept Request"
    data-name="Gir Organics"
    data-description="Make Happy order!!"
    data-image="images/girOrganicsLogo.gif"
    data-prefill.name="vaibhav"
    data-prefill.email="email"
    data-prefill.contact="9607286981"
    data-theme.color="#F37254"
  ></script>
</form>

