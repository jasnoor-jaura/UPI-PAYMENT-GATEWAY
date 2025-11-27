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

// Define the base directory constant
define('ROOT_DIR', realpath(dirname(__FILE__)) . '/../');

// Securely include files using the ROOT_DIR constant
include ROOT_DIR . 'pages/dbFunctions.php';
include ROOT_DIR . 'pages/dbInfo.php';

$link_token = sanitizeInput($_GET["token"]);

// Fetch order_id based on the token from the payment_links table
$sql_fetch_order_id = "SELECT order_id, created_at FROM payment_links WHERE link_token = '$link_token'";
$result = getXbyY($sql_fetch_order_id);

if (count($result) === 0) {
    // Token not found or expired
    echo "Token not found or expired";
    exit;
}

$order_id = $result[0]['order_id'];
$created_at = strtotime($result[0]['created_at']);
$current_time = time();

// Check if the token has expired (more than 5 minutes)
if (($current_time - $created_at) > (5 * 60)) {
    echo "Token has expired";
    exit;
}

$slq_p = "SELECT * FROM orders where order_id='$order_id'";
$res_p = getXbyY($slq_p);    
$amount = $res_p[0]['amount'];
$user_token = $res_p[0]['user_token'];
$redirect_url = $res_p[0]['redirect_url'];
$kayupikalwaremark = $res_p[0]['byteTransactionId'];  //remark
$kayupibytectxnref = $res_p[0]['paytm_txn_ref'];

if ($redirect_url == '') {
    $redirect_url = 'https://' . $_SERVER["SERVER_NAME"] . '/';    
}

// Fetch UPI ID
$slq_p = "SELECT * FROM paytm_tokens where user_token='$user_token'";
$res_p = getXbyY($slq_p);    
$upi_id = $res_p[0]['Upiid']; // UPI ID from Paytm tokens

// Fetch user information
$slq_p = "SELECT * FROM users where user_token='$user_token'";
$res_p = getXbyY($slq_p);    
$unitId = $res_p[0]['name'];

// Generate a unique transaction remark
$asdasd23 = "TXN" . rand(111, 999) . time() . rand(1, 100);
$orders = "upi://pay?pa=$upi_id&am=$amount&pn=$unitId&tn=$asdasd23&tr=$kayupibytectxnref";

//------kavishpreet QR Code End-------//
$paytmintent = "paytmmp://cash_wallet?pa=$upi_id&pn=$unitId&am=$amount&cu=INR&tn=$kayupibytectxnref&tr=$kayupibytectxnref&mc=4722&&sign=AAuN7izDWN5cb8A5scnUiNME+LkZqI2DWgkXlN1McoP6WZABa/KkFTiLvuPRP6/nWK8BPg/rPhb+u4QMrUEX10UsANTDbJaALcSM9b8Wk218X+55T/zOzb7xoiB+BcX8yYuYayELImXJHIgL/c7nkAnHrwUCmbM97nRbCVVRvU0ku3Tr&featuretype=money_transfer";

// Your custom QR code API URL
$url = 'https://imbx.in/secret/create_qr.php';

// Data to be sent in the POST request
$data = [
    'data' => $orders, // The data to encode
    'ecc' => 'M', // Error correction level ('L', 'M', 'Q', 'H')
    'size' => 8  // Size of the QR code
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

    <div id="countdown" class="countdown">
      <span></span>
    </div>

    <div class="qr-by">
      <span>QR by</span>
      <img src="https://kavishpreet.com/extra/logo.png" alt="Logo" />
    </div>
  </div>


    <script>
        // Flag to track whether payment status has already been processed
        var paymentProcessed = false;

        function payViaUPI() {
            // This function will be called when the user clicks the button
            window.location.href = "<?php echo $orders; ?>";
        }

        function upiCountdown(elm, minute, second, url) {
            document.getElementById(elm).innerHTML = minute + ":" + second;
            startTimer();

            function startTimer() {
                var presentTime = document.getElementById(elm).innerHTML;
                var timeArray = presentTime.split(/[:]+/);
                var m = timeArray[0];
                var s = checkSecond((timeArray[1] - 1));
                if (s == 59) {
                    m = m - 1;
                }
                if (m < 0) {
                    Swal.fire({
                        title: 'Oops',
                        text: 'Transaction Timeout!',
                        icon: 'error'
                    });
                    window.location.href = "https://<?php echo $_SERVER["SERVER_NAME"] ?>";
                }
                document.getElementById(elm).innerHTML = m + ":" + s;
                setTimeout(startTimer, 1000);
            }

            function checkSecond(sec) {
                if (sec < 10 && sec >= 0) { 
                    sec = "0" + sec;
                }
                if (sec < 0) { 
                    sec = "59"; 
                }
                return sec;
            }
        }

        upiCountdown("countdown", 5, 0, location.href);
        

        function checkPaymentStatus() {
            $.ajax({
                type: 'post',
                url: 'https://<?php echo $_SERVER["SERVER_NAME"] ?>/order3/payment-status',
                data: 'byte_order_status=<?php echo $kayupikalwaremark?>',
                success: function (data) {
                    if (!paymentProcessed) {
                        if (data == 'success') {
                            paymentProcessed = true;
                            Swal.fire({
                                title: '',
                                text: 'Your Payment Received Successfully 👍 Please Wait',
                                icon: 'success'
                            });
                            window.location.href = "<?php echo $redirect_url?>";
                        } else if (data == 'FAILURE') {
                            paymentProcessed = true;
                            Swal.fire({
                                title: '',
                                text: 'Your Payment Was Failed',
                                icon: 'error'
                            });
                            window.location.href = "<?php echo $redirect_url?>";
                        }
                    }
                }
            });    
        }

        setInterval(checkPaymentStatus, 5000);
    </script>
</body>
</html>