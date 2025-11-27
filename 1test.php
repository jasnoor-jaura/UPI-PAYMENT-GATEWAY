<?php
// Mobile number aur token set kariye
$mobile = '9956607011';
$token = 'kwXQPZjvOmkHkl02w52ZCS8OaegHbhgHbqWm8K8s';

// cURL request setup with headers
function curl_request($url, $postFields, $cookieFile) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true, // Headers ko include karenge
        CURLOPT_FOLLOWLOCATION => false, // Redirect ko manually handle karenge
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 5,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => http_build_query($postFields), // POST data
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded",
            "User-Agent: Mozilla/5.0",
        ),
        CURLOPT_COOKIEJAR => $cookieFile,
        CURLOPT_COOKIEFILE => $cookieFile,
    ));

    $response = curl_exec($curl); 
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
    $err = curl_error($curl); 

    curl_close($curl);

    return array('response' => $response, 'httpCode' => $httpCode, 'error' => $err);
}

// Temporary cookie file for session
$cookieFile = tempnam("/tmp", "cookies");

// Starting cURL request
$url = "https://enterprise.bharatpe.in/v1/api/user/requestotp";
$postFields = array('mobile' => $mobile, '_token' => $token);

// Execute request
$result = curl_request($url, $postFields, $cookieFile);

if ($result['error']) {
    echo "cURL Error: " . $result['error'];
} else {
    echo "Full Response: \n" . $result['response'];

    // Check for redirect in headers
    if ($result['httpCode'] == 302 || $result['httpCode'] == 301) {
        // Extract the redirect URL
        if (preg_match('/Location:\s*(.*)\s*/i', $result['response'], $matches)) {
            $redirectUrl = trim($matches[1]);
            echo "\nRedirecting to: " . $redirectUrl;
        } else {
            echo "\nNo redirect location found.";
        }
    } else {
        echo "\nResponse Code: " . $result['httpCode'];
        echo "\nResponse Body: " . $result['response'];
    }
}
?>
