<?php
// Dynamically get the host and protocol
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST']; // Gets the current domain or IP

// Construct the base URL dynamically
$url = $protocol . $host . '/api/create-order';
$orderid = rand(123456789, 999999999);
$token = '663ed69ea33f7c8a20d779e4312e12ee';

// Data to be sent in the POST request
$data = array(
    'customer_mobile' => '1234567890',
    'user_token' => $token,
    'amount' => '1',
    'order_id' => $orderid,
    'redirect_url' => $protocol . $host . '/success',
    'remark1' => 'hello',
    'remark2' => 'hello1',
);

// 'redirect_url' => $protocol . $host . '/Receipt?orderid=' . $orderid . '&token=' . $token,

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session and store the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

echo $response;

// Decode the JSON response
$jsonResponse = json_decode($response, true);

// Check if decoding was successful
if ($jsonResponse !== null) {
    // Redirect the user to the payment URL
    $paymentUrl = $jsonResponse['result']['payment_url'];
    header('Location: ' . $paymentUrl);
    exit;
} else {
    echo 'Failed to decode JSON response.';
}
?>
