<?php include "header.php"; ?>

<style>
/* Modern API Details Styles */
.api-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.api-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.api-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.api-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.api-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.api-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.api-header .breadcrumb-item.active {
    color: white;
}

/* API Token Section */
.api-token-section {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.api-token-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.section-title {
    color: #2c3e50;
    font-weight: 700;
    font-size: 1.8rem;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
}

.section-title::before {
    content: '';
    width: 4px;
    height: 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    margin-right: 15px;
    border-radius: 2px;
}

.form-control {
    border-radius: 12px;
    border: 2px solid #e1e5e9;
    padding: 15px 20px;
    transition: all 0.3s ease;
    background: #f8f9fa;
    font-size: 14px;
    font-weight: 500;
    width: 325px;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    background: white;
    transform: translateY(-1px);
}

.form-control[readonly] {
    background: #e9ecef;
    cursor: not-allowed;
    font-family: 'Courier New', monospace;
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 10px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
}

.form-label i {
    margin-right: 8px;
    color: #667eea;
}

.btn-generate {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 12px;
    padding: 15px 40px;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    font-size: 14px;
    width: 100%;
}

.btn-generate:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    color: white;
}

.btn-update {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    border: none;
    border-radius: 12px;
    padding: 15px 40px;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    font-size: 14px;
    width: 100%;
}

.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(86, 171, 47, 0.3);
    color: white;
}

/* API Documentation Section */
.api-docs-section {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.api-docs-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.api-endpoint {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    border-left: 4px solid #667eea;
    position: relative;
}

.api-endpoint h6 {
    color: #2c3e50;
    font-weight: 700;
    font-size: 1.2rem;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
}

.api-endpoint h6 i {
    margin-right: 10px;
    color: #667eea;
}

.code-block {
    background: #2c3e50;
    color: #ecf0f1;
    border-radius: 10px;
    padding: 20px;
    font-family: 'Courier New', monospace;
    font-size: 13px;
    line-height: 1.6;
    overflow-x: auto;
    position: relative;
}

.code-block::before {
    content: 'JSON';
    position: absolute;
    top: 10px;
    right: 15px;
    background: #667eea;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 10px;
    font-weight: 600;
}

.response-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-top: 20px;
}

.response-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border-left: 4px solid #56ab2f;
}

.response-card.error {
    border-left-color: #ff416c;
}

.response-card h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.response-card.success h6 i {
    color: #56ab2f;
    margin-right: 8px;
}

.response-card.error h6 i {
    color: #ff416c;
    margin-right: 8px;
}

.note-box {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    border: 1px solid #ffc107;
    border-radius: 10px;
    padding: 15px;
    margin-top: 15px;
    color: #856404;
}

.note-box i {
    color: #ffc107;
    margin-right: 8px;
}

/* Copy Button */
.copy-btn {
    position: absolute;
    top: 10px;
    right: 50px;
    background: #56ab2f;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 6px 12px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.copy-btn:hover {
    background: #4a9025;
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 768px) {
    .api-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .api-header h1 {
        font-size: 1.8rem;
    }
    
    .api-token-section,
    .api-docs-section {
        padding: 25px 20px;
        margin: 15px;
    }
    
    .response-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .code-block {
        font-size: 12px;
        padding: 15px;
    }
}

/* Loading Animation */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.loading-spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<!-- START PAGE CONTENT-->
<div class="api-header">
    <h1><i class="fas fa-code mr-3"></i>API Details</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">API Details</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <!-- API Token Section -->
    <div class="api-token-section">
        <h3 class="section-title">API Token Management</h3>
        
        <form class="row" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            
            <div class="col-md-8 mb-3">
                <label class="form-label"><i class="fas fa-key"></i>API Token</label>
                <input type="text" placeholder="Click Generate Button for API Token" value="<?php echo htmlspecialchars($userdata['user_token'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" readonly>
            </div>
            
            <div class="col-md-4 mb-3">
                <label class="form-label">&nbsp;</label>
                <button type="submit" name="get_api_token" class="btn-generate">
                    <i class="fas fa-sync-alt mr-2"></i>Generate New Token
                </button>
            </div>
        </form>
    </div>

    <!-- Webhook URL Section -->
    <div class="api-token-section">
        <h3 class="section-title">Webhook Configuration</h3>
        
        <form class="row" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            
            <div class="col-md-8 mb-3">
                <label class="form-label"><i class="fas fa-link"></i>Webhook URL</label>
                <input type="url" name="webhook_url" placeholder="Enter Your Webhook URL" value="<?php echo htmlspecialchars($userdata['callback_url'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" required pattern="https?://[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/?[a-zA-Z0-9.-]*\??[a-zA-Z0-9.-]*" title="Enter a valid URL">
                <div class="note-box">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Note:</strong> URL must include protocol (http / https)
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <label class="form-label">&nbsp;</label>
                <button type="submit" name="update_webhook" class="btn-update">
                    <i class="fas fa-save mr-2"></i>Update URL
                </button>
            </div>
        </form>
    </div>

    <!-- API Documentation -->
    <div class="api-docs-section">
        <h3 class="section-title">API Documentation</h3>
        
        <!-- Create Order API -->
        <div class="api-endpoint">
            <h6><i class="fas fa-plus-circle"></i>Create Order API</h6>
            
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-globe"></i>Endpoint URL</label>
                <input type="text" value="https://<?php echo htmlspecialchars($_SERVER["SERVER_NAME"], ENT_QUOTES, 'UTF-8'); ?>/api/create-order" class="form-control" readonly>
                <div class="note-box">
                    <i class="fas fa-clock"></i>
                    <strong>Timeout:</strong> Order will automatically fail after 30 minutes
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-code"></i>Request Payload (application/x-www-form-urlencoded)</label>
                <div class="code-block">
                    <button class="copy-btn" onclick="copyToClipboard(this.nextElementSibling)">
                        <i class="fas fa-copy"></i>
                    </button>
<pre>{
  "customer_mobile": "8145344963",
  "user_token": "<?php echo htmlspecialchars($userdata['user_token'], ENT_QUOTES, 'UTF-8'); ?>",
  "amount": "1",
  "order_id": "8787772321800",
  "redirect_url": "your website url",
  "remark1": "testremark",
  "remark2": "testremark2"
}</pre>
                </div>
            </div>
            
            <div class="response-grid">
                <div class="response-card success">
                    <h6><i class="fas fa-check-circle"></i>Success Response</h6>
                    <div class="code-block">
<pre>{
  "status": true,
  "message": "Order Created Successfully",
  "result": {
    "orderId": "1234561705047510",
    "payment_url": "https://yourwebsite.com/payment/pay.php?data=MTIzNDU2MTcwNTA0NzUxMkyNTIy"
  }
}</pre>
                    </div>
                </div>
                
                <div class="response-card error">
                    <h6><i class="fas fa-times-circle"></i>Error Response</h6>
                    <div class="code-block">
<pre>{
  "status": false,
  "message": "Order_id Already Exist"
}</pre>
                    </div>
                </div>
            </div>
        </div>

        <!-- Check Order Status API -->
        <div class="api-endpoint">
            <h6><i class="fas fa-search"></i>Check Order Status API</h6>
            
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-globe"></i>Endpoint URL</label>
                <input type="text" value="https://<?php echo htmlspecialchars($_SERVER["SERVER_NAME"], ENT_QUOTES, 'UTF-8'); ?>/api/check-order-status" class="form-control" readonly>
            </div>
            
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-code"></i>Request Payload (application/x-www-form-urlencoded)</label>
                <div class="code-block">
                    <button class="copy-btn" onclick="copyToClipboard(this.nextElementSibling)">
                        <i class="fas fa-copy"></i>
                    </button>
<pre>{
  "user_token": "<?php echo htmlspecialchars($userdata['user_token'], ENT_QUOTES, 'UTF-8'); ?>",
  "order_id": "8052313697"
}</pre>
                </div>
            </div>
            
            <div class="response-grid">
                <div class="response-card success">
                    <h6><i class="fas fa-check-circle"></i>Success Response</h6>
                    <div class="code-block">
<pre>{
  "status": "COMPLETED",
  "message": "Transaction Successfully",
  "result": {
    "txnStatus": "COMPLETED",
    "resultInfo": "Transaction Success",
    "orderId": "784525sdD",
    "status": "SUCCESS",
    "amount": "1",
    "date": "2024-01-12 13:22:08",
    "utr": "454525454245"
  }
}</pre>
                    </div>
                </div>
                
                <div class="response-card error">
                    <h6><i class="fas fa-times-circle"></i>Error Response</h6>
                    <div class="code-block">
<pre>{
  "status": "ERROR",
  "message": "Error Message"
}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// PHP processing logic remains exactly the same
if(isset($_POST['get_api_token'])){
    $bbbyteuserid = $_SESSION['user_id'];
    $sanitizedMobile = mysqli_real_escape_string($conn, $mobile);
    $uniqueNumber = mt_rand(1000000000, 9999999999);
    $uniqueNumber = str_pad($uniqueNumber, 10, '0', STR_PAD_LEFT); 
    $key = md5($uniqueNumber);
    
    $keyquery = "UPDATE `users` SET user_token='$key' WHERE mobile = '$sanitizedMobile'";
    $queryres = mysqli_query($conn, $keyquery);
    
    // Update token in other tables
    $keyqueryorders = "UPDATE `orders` SET user_token='$key' WHERE user_id = $bbbyteuserid";
    $queryorders = mysqli_query($conn, $keyqueryorders);
    
    $keyqueryordersreports = "UPDATE `reports` SET user_token='$key' WHERE user_id = $bbbyteuserid";
    $queryordersreports = mysqli_query($conn, $keyqueryordersreports);
    
    $keyqueryhdfc = "UPDATE `hdfc` SET user_token='$key' WHERE user_id = $bbbyteuserid";
    $queryreshdfc = mysqli_query($conn, $keyqueryhdfc);
    
    $keyquerybharatpe = "UPDATE `bharatpe_tokens` SET user_token='$key' WHERE user_id = '$bbbyteuserid'";
    $queryresbharatpe = mysqli_query($conn, $keyquerybharatpe);
    
    $keyqueryphonepetoken = "UPDATE `phonepe_tokens` SET user_token='$key' WHERE user_id = '$bbbyteuserid'";
    $queryresphonepetoken = mysqli_query($conn, $keyqueryphonepetoken);
    
    $keyqueryphonepetoken2 = "UPDATE `store_id` SET user_token='$key' WHERE user_id = '$bbbyteuserid'";
    $queryresphonepetoken2 = mysqli_query($conn, $keyqueryphonepetoken2);
    
    $keyquerypaytm2 = "UPDATE `paytm_tokens` SET user_token='$key' WHERE user_id = '$bbbyteuserid'";
    $queryrespaytm = mysqli_query($conn, $keyquerypaytm2);
    
    $keyquerygooglepay = "UPDATE `googlepay_transactions` SET user_token='$key' WHERE user_id = '$bbbyteuserid'";
    $queryresgooglepay = mysqli_query($conn, $keyquerygooglepay);
    
    $keyquerygooglepay1 = "UPDATE `googlepay_tokens` SET user_token='$key' WHERE user_id = '$bbbyteuserid'";
    $queryresgooglepay1 = mysqli_query($conn, $keyquerygooglepay1);
    
    if($queryres && $queryreshdfc){
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "New API Key generated!!",
                showConfirmButton: true,
                confirmButtonText: "Ok!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "apidetails";
                }
            });
        </script>';
        exit;
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "API Key Generating Failed!!",
                showConfirmButton: true,
                confirmButtonText: "Ok!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "apidetails";
                }
            });
        </script>';
        exit;
    }
}

function isValidUrl($url) {
    $parsed_url = parse_url($url);
    return isset($parsed_url['host']) && preg_match("/\.\w+$/", $parsed_url['host']);
}

if(isset($_POST['update_webhook'])){
    $bytecallbackurl = mysqli_real_escape_string($conn, $_POST['webhook_url']);
    
    if (!isValidUrl($bytecallbackurl)) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Invalid webhook url!!",
                showConfirmButton: true,
                confirmButtonText: "Ok!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "apidetails";
                }
            });
        </script>';
        exit();
    }
    
    $sanitizedMobile = mysqli_real_escape_string($conn, $mobile);
    $keyquery = "UPDATE `users` SET callback_url='$bytecallbackurl' WHERE mobile = '$sanitizedMobile'";
    $queryres = mysqli_query($conn, $keyquery);
    
    if($queryres){
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "Webhook Updated Successfully",
                showConfirmButton: true,
                confirmButtonText: "Ok!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "apidetails";
                }
            });
        </script>';
        exit;
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Error Updating Webhook Try again Later!!",
                showConfirmButton: true,
                confirmButtonText: "Ok!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "apidetails";
                }
            });
        </script>';
        exit;
    }
}
?>

<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/rechpay.js?1697765682"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function copyToClipboard(element) {
    const text = element.textContent;
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const btn = element.previousElementSibling;
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i>';
        btn.style.background = '#56ab2f';
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.style.background = '#56ab2f';
        }, 2000);
    });
}

$(document).ready(function() {
    // Add smooth animations
    $('.api-endpoint').each(function(index) {
        $(this).css('animation-delay', (index * 0.2) + 's');
        $(this).addClass('animate__animated animate__fadeInUp');
    });
});
</script>

</body>
</html>