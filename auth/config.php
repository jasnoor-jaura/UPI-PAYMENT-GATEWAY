<?php
// error_reporting(E_ALL);
// ini_set("display_errors", true);

$conn = new mysqli('localhost', 'u243595787_gateway', 'Kavish2004$', 'u243595787_gateway');
$server = $_SERVER["SERVER_NAME"];

// Fetch site settings from the database
$query = "SELECT * FROM site_settings LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $site_settings = mysqli_fetch_assoc($result);
} else {
    // Default values in case settings are not found
    $site_settings = [
        'brand_name' => 'Default Brand Name',
        'logo_url' => 'default_logo.png',
        'site_link' => 'https://example.com',
        'whatsapp_number' => '0000000000',
        'copyright_text' => '© Default Copyright'
    ];
}
?>