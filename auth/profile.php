<?php include "header.php"; ?>

<style>
/* Modern Profile Styles */
.profile-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.profile-header::before {
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

.profile-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.profile-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.profile-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.profile-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.profile-header .breadcrumb-item.active {
    color: white;
}

/* Profile Form Section */
.profile-form-section {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.profile-form-section::before {
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

.btn-save {
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

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(86, 171, 47, 0.3);
    color: white;
}

/* Profile Info Cards */
.profile-info-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.info-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.12);
}

.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.info-card-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    color: white;
    font-size: 24px;
}

.info-card-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 5px;
}

.info-card-value {
    color: #7f8c8d;
    font-size: 14px;
    font-weight: 500;
}

/* Settings Toggle Section */
.settings-section {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.settings-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.setting-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
    border-bottom: 1px solid #f1f3f4;
}

.setting-item:last-child {
    border-bottom: none;
}

.setting-info h6 {
    margin: 0;
    font-weight: 600;
    color: #2c3e50;
    font-size: 16px;
}

.setting-info p {
    margin: 5px 0 0;
    color: #7f8c8d;
    font-size: 14px;
}

.custom-select {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 2px solid #e1e5e9;
    border-radius: 10px;
    padding: 10px 15px;
    font-weight: 500;
    color: #495057;
    transition: all 0.3s ease;
    min-width: 100px;
}

.custom-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    background: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .profile-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .profile-header h1 {
        font-size: 1.8rem;
    }
    
    .profile-form-section,
    .settings-section {
        padding: 25px 20px;
        margin: 15px;
    }
    
    .profile-info-cards {
        grid-template-columns: 1fr;
        gap: 15px;
        margin: 15px;
    }
    
    .setting-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .custom-select {
        width: 100%;
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
<div class="profile-header">
    <h1><i class="fas fa-user-circle mr-3"></i>Manage My Profile</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <!-- Profile Info Cards -->
    <div class="profile-info-cards">
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-id-card"></i>
            </div>
            <div class="info-card-title">Instance ID</div>
            <div class="info-card-value"><?php echo htmlspecialchars($userdata['instance_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="info-card-title">Account Type</div>
            <div class="info-card-value"><?php echo htmlspecialchars($userdata['role'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="info-card-title">Plan Expiry</div>
            <div class="info-card-value"><?php echo htmlspecialchars($userdata['expiry'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-building"></i>
            </div>
            <div class="info-card-title">Company</div>
            <div class="info-card-value"><?php echo htmlspecialchars($userdata['company'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
    </div>

    <!-- Profile Form Section -->
    <div class="profile-form-section">
        <h3 class="section-title">Profile Information</h3>
        
        <form class="row" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-id-card"></i>Instance ID</label>
                <input type="text" value="<?php echo htmlspecialchars($userdata['instance_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-mobile-alt"></i>Mobile Number</label>
                <input type="text" name="mobile" value="<?php echo htmlspecialchars($userdata['mobile'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" required>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-envelope"></i>Email Address</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($userdata['email'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-user"></i>Full Name</label>
                <input type="text" value="<?php echo htmlspecialchars($userdata['name'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-building"></i>Company Name</label>
                <input type="text" value="<?php echo htmlspecialchars($userdata['company'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-credit-card"></i>PAN Number</label>
                <input type="text" value="<?php echo htmlspecialchars($userdata['pan'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-id-card-alt"></i>Aadhaar Number</label>
                <input type="text" value="<?php echo htmlspecialchars($userdata['aadhaar'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-map-marker-alt"></i>Location</label>
                <input type="text" value="<?php echo htmlspecialchars($userdata['location'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" readonly>
            </div>
        </form>
    </div>

    <!-- Settings Section -->
    <div class="settings-section">
        <h3 class="section-title">Account Settings</h3>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="hidden" name="mobile" value="<?php echo htmlspecialchars($userdata['mobile'], ENT_QUOTES, 'UTF-8'); ?>">
            
            <div class="setting-item">
                <div class="setting-info">
                    <h6><i class="fas fa-shield-alt mr-2"></i>OTP Verification</h6>
                    <p>Require OTP verification for transactions</p>
                </div>
                <select name="is_otp" class="custom-select">
                    <option value="YES" <?php echo ($userdata['is_otp'] === 'YES') ? 'selected' : ''; ?>>Enabled</option>
                    <option value="NO" <?php echo ($userdata['is_otp'] === 'NO') ? 'selected' : ''; ?>>Disabled</option>
                </select>
            </div>
            
            <div class="setting-item">
                <div class="setting-info">
                    <h6><i class="fab fa-whatsapp mr-2"></i>WhatsApp Alerts</h6>
                    <p>Receive transaction notifications via WhatsApp</p>
                </div>
                <select name="whatsapp_alert" class="custom-select">
                    <option value="YES" <?php echo ($userdata['whatsapp_alert'] === 'YES') ? 'selected' : ''; ?>>Enabled</option>
                    <option value="NO" <?php echo ($userdata['whatsapp_alert'] === 'NO') ? 'selected' : ''; ?>>Disabled</option>
                </select>
            </div>
            
            <div class="setting-item">
                <div class="setting-info">
                    <h6><i class="fas fa-envelope mr-2"></i>Email Alerts</h6>
                    <p>Receive transaction notifications via email</p>
                </div>
                <select name="email_alert" class="custom-select">
                    <option value="YES" <?php echo ($userdata['email_alert'] === 'YES') ? 'selected' : ''; ?>>Enabled</option>
                    <option value="NO" <?php echo ($userdata['email_alert'] === 'NO') ? 'selected' : ''; ?>>Disabled</option>
                </select>
            </div>
            
            <div class="mt-4">
                <button type="submit" name="update" class="btn-save">
                    <i class="fas fa-save mr-2"></i>Save Settings
                </button>
            </div>
        </form>
    </div>
</div>

<?php
// PHP processing logic remains exactly the same
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $is_otp = $_POST['is_otp'];
    $whatsapp_alert = $_POST['whatsapp_alert'];
    $email_alert = $_POST['email_alert'];
    $mobile = $_POST['mobile'];

    $query = "UPDATE users SET is_otp = ?, whatsapp_alert = ?, email_alert = ? WHERE mobile = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $is_otp, $whatsapp_alert, $email_alert, $mobile);

    if ($stmt->execute()) {
        echo "<script>
        Swal.fire({
        title: 'Success!',
        text: 'Profile updated successfully!',
        icon: 'success',
        confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'profile';
        });
          </script>";
    } else {
        echo "<script>
        Swal.fire({
        title: 'Error!',
        text: 'Error updating profile',
        icon: 'error',
        confirmButtonText: 'OK'
        });
          </script>";
    }
    $stmt->close();
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
<script src="assets/js/rechpay.js?1697765827"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // Add smooth animations
    $('.info-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
        $(this).addClass('animate__animated animate__fadeInUp');
    });
});
</script>

</body>
</html>