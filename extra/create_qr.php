<?php
// Set headers
header('Content-Type: application/json');

// Enable CORS if needed
header('Access-Control-Allow-Origin: *');

// Get raw POST body
$rawInput = file_get_contents('php://input');
$inputData = json_decode($rawInput, true);

// Validate input
if (!isset($inputData['data'])) {
    echo json_encode(['error' => 'Missing data']);
    exit;
}

$data = urlencode($inputData['data']);
$size = "{$raw_size}x{$raw_size}";

// Build QRServer API URL
$qr_url = "https://api.qrserver.com/v1/create-qr-code/?data=$data&size={$size}x{$size}";

// Fetch QR image
$qr_image = file_get_contents($qr_url);

if (!$qr_image) {
    echo json_encode(['error' => 'Failed to fetch QR']);
    exit;
}

// Encode to base64 and return
$base64 = 'data:image/png;base64,' . base64_encode($qr_image);
echo json_encode(['qr_code' => $base64]);
