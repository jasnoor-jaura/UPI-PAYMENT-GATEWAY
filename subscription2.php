<?php include "header.php"; ?>

<?php 
$query = $conn->query("SELECT * FROM `subscription_plan`");
?>

<style>
/* Modern Subscription Styles */
.subscription-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.subscription-header::before {
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

.subscription-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.subscription-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.subscription-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.subscription-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.subscription-header .breadcrumb-item.active {
    color: white;
}

/* Alert Banner */
.alert-banner {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
    color: white;
    padding: 20px 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 10px 25px rgba(255, 107, 107, 0.2);
    position: relative;
    overflow: hidden;
}

.alert-banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: rgba(255, 255, 255, 0.3);
}

.alert-banner .alert-icon {
    font-size: 1.5rem;
    margin-right: 15px;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.alert-banner .alert-content {
    display: flex;
    align-items: center;
}

.alert-banner .alert-text {
    font-weight: 500;
    font-size: 14px;
}

/* Subscription Plans Grid */
.subscription-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    margin-bottom: 30px;
}

.plan-card {
    background: white;
    border-radius: 20px;
    padding: 0;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: 2px solid transparent;
}

.plan-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    border-color: #667eea;
}

.plan-card.featured {
    border-color: #667eea;
    transform: scale(1.05);
}

.plan-card.featured::before {
    content: 'POPULAR';
    position: absolute;
    top: 20px;
    right: -30px;
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
    color: white;
    padding: 8px 40px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    transform: rotate(45deg);
    z-index: 10;
}

.plan-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 30px;
    text-align: center;
    position: relative;
}

.plan-header::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    border-top: 10px solid #764ba2;
}

.plan-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.plan-price {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 5px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.plan-duration {
    font-size: 1rem;
    opacity: 0.9;
    font-weight: 500;
}

.plan-body {
    padding: 30px;
}

.plan-features {
    margin-bottom: 30px;
}

.plan-features table {
    width: 100%;
    border-collapse: collapse;
}

.plan-features tr {
    border-bottom: 1px solid #f1f3f4;
    transition: all 0.3s ease;
}

.plan-features tr:hover {
    background: #f8f9fa;
}

.plan-features td {
    padding: 15px 8px;
    vertical-align: middle;
}

.plan-features td:first-child {
    width: 30px;
    text-align: center;
}

.feature-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
    margin: 0 auto;
}

.feature-included {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    color: white;
}

.feature-excluded {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    color: white;
}

.feature-text {
    font-size: 14px;
    color: #495057;
    font-weight: 500;
    margin: 0;
}

.feature-highlight {
    color: #e74c3c;
    font-weight: 600;
}

.plan-footer {
    padding: 0 30px 30px;
}

.btn-buy {
    width: 100%;
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    border: none;
    border-radius: 12px;
    padding: 15px 30px;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    font-size: 14px;
    position: relative;
    overflow: hidden;
}

.btn-buy::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-buy:hover::before {
    left: 100%;
}

.btn-buy:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(86, 171, 47, 0.3);
    color: white;
}

.btn-buy:focus {
    color: white;
    box-shadow: 0 0 0 0.2rem rgba(86, 171, 47, 0.25);
}

/* Current Plan Indicator */
.current-plan {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .subscription-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .subscription-header h1 {
        font-size: 1.8rem;
    }
    
    .subscription-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        margin: 15px;
    }
    
    .plan-card {
        margin: 0;
    }
    
    .plan-card.featured {
        transform: none;
    }
    
    .plan-price {
        font-size: 2.5rem;
    }
    
    .alert-banner {
        margin: 15px;
        padding: 15px 20px;
    }
    
    .alert-banner .alert-content {
        flex-direction: column;
        text-align: center;
    }
    
    .alert-banner .alert-icon {
        margin-right: 0;
        margin-bottom: 10px;
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

/* Plan Comparison */
.comparison-note {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 30px;
    text-align: center;
    border-left: 4px solid #667eea;
}

.comparison-note h5 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 10px;
}

.comparison-note p {
    color: #6c757d;
    margin: 0;
    font-size: 14px;
}
</style>

<!-- START PAGE CONTENT-->
<div class="subscription-header">
    <h1><i class="fas fa-crown mr-3"></i>Subscription & Plans</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Subscription</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <!-- Alert Banner -->
    <div class="alert-banner">
        <div class="alert-content">
            <i class="fas fa-exclamation-triangle alert-icon"></i>
            <div class="alert-text">
                <strong>Important Notice:</strong> Your old plan will be automatically deactivated after purchasing the new plan and is non-refundable.
            </div>
        </div>
    </div>

    <!-- Comparison Note -->
    <div class="comparison-note">
        <h5><i class="fas fa-info-circle mr-2"></i>Choose Your Perfect Plan</h5>
        <p>Select the subscription plan that best fits your business needs. All plans include our core features with varying levels of access and support.</p>
    </div>

    <!-- Subscription Plans Grid -->
    <div class="subscription-grid">
        <?php 
        $planCount = 0;
        while($row = $query->fetch_assoc()){ 
            $planCount++;
            $isFeatured = ($planCount == 2); // Make second plan featured
        ?>
            <div class="plan-card <?php echo $isFeatured ? 'featured' : ''; ?>">
                <?php if($isFeatured) { ?>
                    <div class="current-plan">Most Popular</div>
                <?php } ?>
                
                <div class="plan-header">
                    <h4 class="plan-title"><?= htmlspecialchars($row["plan_name"]) ?></h4>
                    <div class="plan-price">₹<?= number_format($row["amount"]) ?></div>
                    <p class="plan-duration"><?= htmlspecialchars($row["expiry"]) ?> Month<?= $row["expiry"] > 1 ? 's' : '' ?></p>
                </div>
                
                <div class="plan-body">
                    <div class="plan-features">
                        <table>
                            <tbody>
                                <tr>
                                    <td><div class="feature-icon feature-included">✓</div></td>
                                    <td><p class="feature-text">0 Transaction Fee</p></td>
                                </tr>
                                <tr>
                                    <td><div class="feature-icon feature-included">✓</div></td>
                                    <td><p class="feature-text">Realtime Transaction</p></td>
                                </tr>
                                <tr>
                                    <td><div class="feature-icon feature-included">✓</div></td>
                                    <td><p class="feature-text">No Amount Limit</p></td>
                                </tr>
                                <tr>
                                    <td><div class="feature-icon feature-included">✓</div></td>
                                    <td><p class="feature-text feature-highlight">HDFC Vyapar</p></td>
                                </tr>
                                <tr>
                                    <td><div class="feature-icon feature-excluded">✗</div></td>
                                    <td><p class="feature-text">Dynamic QR Code</p></td>
                                </tr>
                                <tr>
                                    <td><div class="feature-icon feature-excluded">✗</div></td>
                                    <td><p class="feature-text">Direct UPI Intent</p></td>
                                </tr>
                                <tr>
                                    <td><div class="feature-icon feature-excluded">✗</div></td>
                                    <td><p class="feature-text">Accept All UPI Apps</p></td>
                                </tr>
                                <tr>
                                    <td><div class="feature-icon feature-included">✓</div></td>
                                    <td><p class="feature-text">24*7 WhatsApp Support</p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="plan-footer">
                    <form method="POST" action="lib/pay">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <input type="hidden" name="amount" value="<?= $row["amount"] ?>">
                        <input type="hidden" name="planid" value="<?= $row["id"] ?>">
                        <button name="upigate" class="btn btn-buy">
                            <i class="fas fa-shopping-cart mr-2"></i>Buy Now
                        </button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Additional Information -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="text-center p-4">
                <i class="fas fa-shield-alt text-primary" style="font-size: 3rem; margin-bottom: 15px;"></i>
                <h5>Secure Payments</h5>
                <p class="text-muted">All transactions are secured with bank-level encryption</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center p-4">
                <i class="fas fa-headset text-success" style="font-size: 3rem; margin-bottom: 15px;"></i>
                <h5>24/7 Support</h5>
                <p class="text-muted">Get help whenever you need it with our dedicated support team</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center p-4">
                <i class="fas fa-sync-alt text-info" style="font-size: 3rem; margin-bottom: 15px;"></i>
                <h5>Instant Activation</h5>
                <p class="text-muted">Your plan activates immediately after successful payment</p>
            </div>
        </div>
    </div>
</div>

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
<script src="assets/js/rechpay.js?1697835127"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
function utr_search(utr_number){
    if(getCurentFileName()=="transactions"){	
        if(utr_number.length==12){
            search_txn('2023-10-01','2023-10-21','',utr_number);
        }else{
            Swal.fire('Enter Valid UTR Number!');	
        }
    }else{
        location.href ='transactions';
    }
}

// Add smooth animations
$(document).ready(function() {
    $('.plan-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
        $(this).addClass('animate__animated animate__fadeInUp');
    });
    
    // Enhanced buy button interaction
    $('.btn-buy').on('click', function(e) {
        const button = $(this);
        const originalText = button.html();
        
        button.html('<i class="fas fa-spinner fa-spin mr-2"></i>Processing...');
        button.prop('disabled', true);
        
        // Re-enable after form submission
        setTimeout(() => {
            button.html(originalText);
            button.prop('disabled', false);
        }, 3000);
    });
});
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $("#dataTable").DataTable();
});
</script>
<script src="assets/js/bharatpe.js?1697835127"></script>

</body>
</html>