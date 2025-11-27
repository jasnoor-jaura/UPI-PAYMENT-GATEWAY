<?php
// Set headers
header('Content-Type: application/json');

// Read the raw POST body
$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

// Check if JSON is valid
if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

// Log or store the data for debugging (optional)
// file_put_contents('logs.txt', print_r($data, true), FILE_APPEND);

// Extract required fields
$paymentStatus = $data['success'] ?? false;
$paymentId     = $data['payment_id'] ?? null;
$remark        = $data['remark'] ?? null;

// Do something only if payment is successful
if ($paymentStatus && $paymentId) {
    // Example: Update database, confirm order, etc.
    // update_payment_status($paymentId, $remark); // Your custom function

    http_response_code(200);
    echo json_encode(['status' => 'Payment recorded']);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid or failed payment']);
}
?>
