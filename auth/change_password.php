<?php include "header.php"; ?>

<style>
/* Modern Change Password Styles */
.password-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.password-header::before {
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

.password-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.password-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.password-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.password-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.password-header .breadcrumb-item.active {
    color: white;
}

/* Password Form Section */
.password-form-section {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.password-form-section::before {
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
    justify-content: center;
    text-align: center;
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
    position: relative;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    background: white;
    transform: translateY(-1px);
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

.btn-change-password {
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

.btn-change-password:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    color: white;
}

/* Password Strength Indicator */
.password-strength {
    margin-top: 10px;
    height: 4px;
    border-radius: 2px;
    background: #e1e5e9;
    overflow: hidden;
}

.password-strength-bar {
    height: 100%;
    width: 0%;
    transition: all 0.3s ease;
    border-radius: 2px;
}

.strength-weak { background: #ff416c; width: 25%; }
.strength-fair { background: #ffa726; width: 50%; }
.strength-good { background: #42a5f5; width: 75%; }
.strength-strong { background: #66bb6a; width: 100%; }

.password-requirements {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
    border-left: 4px solid #667eea;
}

.password-requirements h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 15px;
}

.requirement-item {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    font-size: 14px;
}

.requirement-item i {
    margin-right: 10px;
    width: 16px;
}

.requirement-met {
    color: #56ab2f;
}

.requirement-unmet {
    color: #ff416c;
}

/* Security Tips */
.security-tips {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 25px;
    margin-top: 30px;
    border-left: 4px solid #667eea;
}

.security-tips h5 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.security-tips h5 i {
    margin-right: 10px;
    color: #667eea;
}

.security-tips ul {
    margin: 0;
    padding-left: 20px;
}

.security-tips li {
    color: #6c757d;
    margin-bottom: 8px;
    font-size: 14px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .password-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .password-header h1 {
        font-size: 1.8rem;
    }
    
    .password-form-section {
        padding: 25px 20px;
        margin: 15px;
    }
    
    .security-tips {
        margin: 15px;
        padding: 20px;
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

/* Input Group with Eye Icon */
.password-input-group {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #667eea;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.3s ease;
}

.password-toggle:hover {
    color: #764ba2;
    transform: translateY(-50%) scale(1.1);
}
</style>

<!-- START PAGE CONTENT-->
<div class="password-header">
    <h1><i class="fas fa-lock mr-3"></i>Change Password</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Change Password</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="password-form-section">
        <h3 class="section-title">Update Your Password</h3>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            
            <div class="mb-4">
                <label class="form-label"><i class="fas fa-key"></i>Current Password</label>
                <div class="password-input-group">
                    <input type="password" name="current_password" id="currentPassword" placeholder="Enter your current password" class="form-control" required>
                    <button type="button" class="password-toggle" onclick="togglePassword('currentPassword', this)">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="form-label"><i class="fas fa-lock"></i>New Password</label>
                <div class="password-input-group">
                    <input type="password" name="new_password" id="newPassword" placeholder="Enter your new password" class="form-control" required onkeyup="checkPasswordStrength(this.value)">
                    <button type="button" class="password-toggle" onclick="togglePassword('newPassword', this)">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="password-strength">
                    <div class="password-strength-bar" id="strengthBar"></div>
                </div>
                <small id="strengthText" class="text-muted"></small>
            </div>
            
            <div class="mb-4">
                <label class="form-label"><i class="fas fa-check-circle"></i>Confirm New Password</label>
                <div class="password-input-group">
                    <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm your new password" class="form-control" required onkeyup="checkPasswordMatch()">
                    <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword', this)">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <small id="matchText" class="text-muted"></small>
            </div>
            
            <div class="password-requirements">
                <h6><i class="fas fa-info-circle mr-2"></i>Password Requirements</h6>
                <div class="requirement-item" id="req-length">
                    <i class="fas fa-times requirement-unmet"></i>
                    <span>At least 8 characters long</span>
                </div>
                <div class="requirement-item" id="req-uppercase">
                    <i class="fas fa-times requirement-unmet"></i>
                    <span>Contains uppercase letter</span>
                </div>
                <div class="requirement-item" id="req-lowercase">
                    <i class="fas fa-times requirement-unmet"></i>
                    <span>Contains lowercase letter</span>
                </div>
                <div class="requirement-item" id="req-number">
                    <i class="fas fa-times requirement-unmet"></i>
                    <span>Contains at least one number</span>
                </div>
                <div class="requirement-item" id="req-special">
                    <i class="fas fa-times requirement-unmet"></i>
                    <span>Contains special character</span>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" name="update" class="btn-change-password" id="submitBtn" disabled>
                    <i class="fas fa-shield-alt mr-2"></i>Change Password
                </button>
            </div>
        </form>
    </div>

    <!-- Security Tips -->
    <div class="security-tips">
        <h5><i class="fas fa-shield-alt"></i>Security Tips</h5>
        <ul>
            <li>Use a unique password that you don't use for other accounts</li>
            <li>Include a mix of letters, numbers, and special characters</li>
            <li>Avoid using personal information like names or birthdays</li>
            <li>Consider using a password manager for better security</li>
            <li>Change your password regularly for enhanced security</li>
        </ul>
    </div>
</div>

<?php
// PHP processing logic remains exactly the same
if (isset($_REQUEST['update'])) {
    $sanitizedMobile = $mobile;
    $current_password = $_REQUEST['current_password'];
    $new_password = $_REQUEST['new_password'];
    $confirm_password = $_REQUEST['confirm_password'];

    $query = "SELECT `password` FROM `users` WHERE `mobile` = '$sanitizedMobile'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hashedPasswordFromDB = $row['password'];
        
        if (password_verify($current_password, $hashedPasswordFromDB)) {
            if ($new_password === $confirm_password) {
                $newpass = password_hash($new_password, PASSWORD_DEFAULT);
                $passwor = "UPDATE `users` SET `password` = '$newpass' WHERE `mobile` = '$sanitizedMobile'";
                $up = mysqli_query($conn, $passwor);
                
                if ($up) {
                    echo '<script src="js/jquery-3.2.1.min.js"></script>';
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
                    echo '<script>
                        $("#loading_ajax").hide();
                        Swal.fire({
                            icon: "success",
                            title: "Password Changed Successfully",
                            text: "Your password has been updated.",
                            showConfirmButton: true,
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "dashboard";
                            }
                        });
                    </script>';
                    exit;
                } else {
                    echo '<script src="js/jquery-3.2.1.min.js"></script>';
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
                    echo '<script>
                        $("#loading_ajax").hide();
                        Swal.fire({
                            icon: "error",
                            title: "Password Update Failed",
                            text: "Please try again later.",
                            showConfirmButton: true,
                            confirmButtonText: "Try Again",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "change_password";
                            }
                        });
                    </script>';
                    exit;
                }
            } else {
                echo '<script src="js/jquery-3.2.1.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
                echo '<script>
                    $("#loading_ajax").hide();
                    Swal.fire({
                        icon: "error",
                        title: "New Password and Confirm Password Do Not Match",
                        showConfirmButton: true,
                        confirmButtonText: "Try Again",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "change_password";
                        }
                    });
                </script>';
                exit;
            }
        } else {
            echo '<script src="js/jquery-3.2.1.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
            echo '<script>
                $("#loading_ajax").hide();
                Swal.fire({
                    icon: "error",
                    title: "Current Password Does Not Match",
                    showConfirmButton: true,
                    confirmButtonText: "Try Again",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "change_password";
                    }
                });
            </script>';
            exit;
        }
    } else {
        echo '<script src="js/jquery-3.2.1.min.js"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
            $("#loading_ajax").hide();
            Swal.fire({
                icon: "error",
                title: "Please try again later.",
                text: "Please try again later.",
                showConfirmButton: true,
                confirmButtonText: "Try Again",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "change_password";
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
function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function checkPasswordStrength(password) {
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    const submitBtn = document.getElementById('submitBtn');
    
    // Reset classes
    strengthBar.className = 'password-strength-bar';
    
    // Check requirements
    const requirements = {
        length: password.length >= 8,
        uppercase: /[A-Z]/.test(password),
        lowercase: /[a-z]/.test(password),
        number: /\d/.test(password),
        special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
    };
    
    // Update requirement indicators
    updateRequirement('req-length', requirements.length);
    updateRequirement('req-uppercase', requirements.uppercase);
    updateRequirement('req-lowercase', requirements.lowercase);
    updateRequirement('req-number', requirements.number);
    updateRequirement('req-special', requirements.special);
    
    // Calculate strength
    const metRequirements = Object.values(requirements).filter(Boolean).length;
    
    if (metRequirements < 2) {
        strengthBar.classList.add('strength-weak');
        strengthText.textContent = 'Weak password';
        strengthText.style.color = '#ff416c';
    } else if (metRequirements < 4) {
        strengthBar.classList.add('strength-fair');
        strengthText.textContent = 'Fair password';
        strengthText.style.color = '#ffa726';
    } else if (metRequirements < 5) {
        strengthBar.classList.add('strength-good');
        strengthText.textContent = 'Good password';
        strengthText.style.color = '#42a5f5';
    } else {
        strengthBar.classList.add('strength-strong');
        strengthText.textContent = 'Strong password';
        strengthText.style.color = '#66bb6a';
    }
    
    // Enable submit button only if password is strong enough
    const isStrong = metRequirements >= 4;
    submitBtn.disabled = !isStrong;
    
    if (isStrong) {
        submitBtn.style.opacity = '1';
        submitBtn.style.cursor = 'pointer';
    } else {
        submitBtn.style.opacity = '0.6';
        submitBtn.style.cursor = 'not-allowed';
    }
}

function updateRequirement(elementId, isMet) {
    const element = document.getElementById(elementId);
    const icon = element.querySelector('i');
    
    if (isMet) {
        icon.classList.remove('fa-times', 'requirement-unmet');
        icon.classList.add('fa-check', 'requirement-met');
    } else {
        icon.classList.remove('fa-check', 'requirement-met');
        icon.classList.add('fa-times', 'requirement-unmet');
    }
}

function checkPasswordMatch() {
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const matchText = document.getElementById('matchText');
    
    if (confirmPassword.length > 0) {
        if (newPassword === confirmPassword) {
            matchText.textContent = 'Passwords match';
            matchText.style.color = '#66bb6a';
        } else {
            matchText.textContent = 'Passwords do not match';
            matchText.style.color = '#ff416c';
        }
    } else {
        matchText.textContent = '';
    }
}

$(document).ready(function() {
    // Add smooth animations
    $('.password-form-section').addClass('animate__animated animate__fadeInUp');
});
</script>

</body>
</html>