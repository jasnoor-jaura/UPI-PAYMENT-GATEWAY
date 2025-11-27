
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Payment Page</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #1b1b33;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .payment-container {
      background-color: #fff;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 400px;
      text-align: center;
      transition: all 0.3s ease;
    }
    .payment-container:hover {
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }
    .payment-container h2 {
      margin-bottom: 25px;
      font-size: 26px;
      color: #333;
    }
    .qr-code {
      margin: 20px 0;
    }
    .details {
      margin-bottom: 20px;
      text-align: left;
    }
    .details-item {
      margin-bottom: 12px;
      display: flex;
      justify-content: space-between;
      font-size: 16px;
    }
    .details-item label {
      font-weight: bold;
      color: #555;
    }
    .details-item span {
      color: #333;
    }
    .qr-by {
      margin-top: 25px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 14px;
      color: #666;
    }
    .qr-by img {
      margin-left: 5px;
      width: 140px;
    }
    /* Countdown Timer */
    .countdown {
      margin-top: 20px;
      font-size: 18px;
      color: #d9534f;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .countdown span {
      background-color: #f5f5f5;
      padding: 5px 10px;
      border-radius: 10px;
      font-size: 20px;
      color: #d9534f;
      font-weight: bold;
      letter-spacing: 1px;
    }
    /* Responsive */
    @media (max-width: 600px) {
      .payment-container {
        width: 95%;
        padding: 20px;
      }
      .payment-container h2 {
        font-size: 22px;
      }
      .qr-code img {
        width: 130px;
        height: 130px;
      }
      .details-item {
        font-size: 15px;
      }
      .qr-by img {
        width: 120px;
      }
    }
  </style>
</head>

<?php

date_default_timezone_set("Asia/Kolkata");

define('ROOT_DIR', realpath(dirname(__FILE__)) . '/../');
include ROOT_DIR . 'pages/dbFunctions.php';
include ROOT_DIR . 'pages/dbInfo.php';
include ROOT_DIR . 'auth/config.php';

$link_token = ($_GET["token"]);

// Fetch order_id based on the token from the payment_links table
$sql_fetch_order_id = "SELECT order_id, created_at FROM payment_links WHERE link_token = '$link_token'";
$result = getXbyY($sql_fetch_order_id);

if (count($result) === 0) {
    echo "Token not found or expired";
    exit;
}

$order_id = $result[0]['order_id'];
$created_at = strtotime($result[0]['created_at']);
$current_time = time();

if (($current_time - $created_at) > (5 * 60)) {
    echo "Token has expired";
    exit;
}

$slq_p = "SELECT * FROM orders where order_id='$order_id'";
$res_p = getXbyY($slq_p);    
$amount = $res_p[0]['amount'];
$user_token = $res_p[0]['user_token'];
$redirect_url = $res_p[0]['redirect_url'];
$kayupikalwaremark = $res_p[0]['byteTransactionId'];
$kayupibytectxnref = $res_p[0]['paytm_txn_ref'];
$kayupiuser_id = $res_p[0]['user_id'];

if ($redirect_url == '') {
    $redirect_url = 'https://'.$_SERVER["SERVER_NAME"].'/';
}

$slq_p = "SELECT * FROM mobikwik_token where user_token='$user_token'";
$res_p = getXbyY($slq_p);
$upi_id = $res_p[0]['merchant_upi'];

$slq_p = "SELECT * FROM users where user_token='$user_token'";
$res_p = getXbyY($slq_p);
$unitId = $res_p[0]['name'];

$asdasd23 = "ARC" . rand(111, 999) . time() . rand(1, 100);

$orders = "upi://pay?pa=$upi_id&am=$amount&pn=$unitId&tn=$kayupibytectxnref&tr=$kayupikalwaremark";

// Redirect URL for payment confirmation
$payment_verification_url = "https://".$_SERVER["SERVER_NAME"]."/payment8/verify/" . ($link_token);

// Your custom QR code API URL
$url = 'https://imbx.in/secret/create_qr.php';

// Data to be sent in the POST request
$data = [
    'data' => $orders, // The data to encode in the QR
    'ecc' => 'M',      // Error correction level ('L', 'M', 'Q', 'H')
    'size' => 8        // Size of the QR code
];

// Convert the data array into a JSON string
$jsonData = json_encode($data);

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_POST, true);  // Set method to POST
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return the response as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);  // Set content type to JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);  // Send data as JSON

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Decode the JSON response
    $result = json_decode($response, true);

    // Check if there is an error in the response
    if (isset($result['error'])) {
        echo 'Error: ' . $result['error'];
    } else {
        // Success! The QR code is in base64 format.
        $qrCodeBase64 = $result['qr_code'];

        // Display the QR code image in the browser
        // echo '<img src="' . $qrCodeBase64 . '" alt="QR Code" />';
    }
}

// Close the cURL session
curl_close($ch);

?>
<body>
  <div class="payment-container">
    <h2>Complete Your Payment</h2>

    <div class="qr-code">
      <img src="<?php echo $qrCodeBase64; ?>" alt="QR Code" width="150" height="150" />
    </div>

    <div class="details">
      <div class="details-item">
        <label>Order ID:</label>
        <span><?php echo $order_id; ?></span>
      </div>
      <div class="details-item">
        <label>Amount:</label>
        <span>₹ <?php echo $amount; ?>.00</span>
      </div>
    </div>
    
          <?php
$timestamp = time();
$unique_filename = "qr_code_" . $timestamp . ".png";
?>

<div class="button-section" style="text-align: center; margin-top: 20px;">
        <a class="pay-button"  onclick="payViaUPI()">Confirm Payment</a>
    </div>
    
    

    <div id="countdown" class="countdown">
      <span></span>
    </div>

   <div class="qr-by">
        <span>QR by</span>
        <img src="https://imbpayment.com/assets/imb_logo/imb_X.png" alt="Logo" />
    </div>
</div>

       
<style>
    .pay-button {
        display: inline-block;
        background-color: #161f87;
        color: white;
        padding: 12px 25px;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .pay-button:hover {
        background-color: #0f1464;
        transform: scale(1.05);
    }

    .pay-button:active {
        background-color: #0c104b;
        transform: scale(0.98);
    }
</style>



    <script>
        function payViaUPI() {
            window.location.href = "<?php echo $payment_verification_url; ?>";
        }

        window.onload = function () {
            var fiveMinutes = 60 * 5,
                display = document.querySelector('#countdown');
            startTimer(fiveMinutes, display);
        };

        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(this);
                }
            }, 1000);
        }
    </script>
    <script disable-devtool-auto="" src="https://pay.imb.org.in/Qrcode/disable-devtool.js" data-url="https://www.google.com/"></script> 
</body>
</html>
