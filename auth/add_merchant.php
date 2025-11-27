<?php include "header.php"; ?>

<style>
/* Modern Add Merchant Styles */
.merchant-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.merchant-header::before {
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

.merchant-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.merchant-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.merchant-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.merchant-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.merchant-header .breadcrumb-item.active {
    color: white;
}

/* Add Merchant Form Section */
.add-merchant-section {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.add-merchant-section::before {
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

.btn-add-merchant {
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

.btn-add-merchant:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(86, 171, 47, 0.3);
    color: white;
}

/* Form Steps */
.form-steps {
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
    position: relative;
}

.form-steps::before {
    content: '';
    position: absolute;
    top: 20px;
    left: 25%;
    right: 25%;
    height: 2px;
    background: #e1e5e9;
    z-index: 1;
}

.step {
    background: white;
    border: 3px solid #e1e5e9;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #7f8c8d;
    position: relative;
    z-index: 2;
}

.step.active {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-color: #667eea;
    color: white;
}

.step.completed {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    border-color: #56ab2f;
    color: white;
}

/* Input Validation Styling */
.form-control.valid {
    border-color: #56ab2f;
    background: #f8fff8;
}

.form-control.invalid {
    border-color: #ff416c;
    background: #fff8f8;
}

.validation-message {
    font-size: 12px;
    margin-top: 5px;
    font-weight: 500;
}

.validation-message.success {
    color: #56ab2f;
}

.validation-message.error {
    color: #ff416c;
}

/* Info Cards */
.info-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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

.info-card-text {
    color: #7f8c8d;
    font-size: 14px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .merchant-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .merchant-header h1 {
        font-size: 1.8rem;
    }
    
    .add-merchant-section {
        padding: 25px 20px;
        margin: 15px;
    }
    
    .info-cards {
        grid-template-columns: 1fr;
        gap: 15px;
        margin: 15px;
    }
    
    .form-steps {
        margin-bottom: 30px;
    }
    
    .form-steps::before {
        left: 20%;
        right: 20%;
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
<div class="merchant-header">
    <h1><i class="fas fa-user-plus mr-3"></i>Create New Merchant</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Merchant</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <!-- Info Cards -->
    <div class="info-cards">
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="info-card-title">Secure Registration</div>
            <div class="info-card-text">All data is encrypted and secure</div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-rocket"></i>
            </div>
            <div class="info-card-title">Quick Setup</div>
            <div class="info-card-text">Get started in minutes</div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-headset"></i>
            </div>
            <div class="info-card-title">24/7 Support</div>
            <div class="info-card-text">Always here to help</div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="info-card-title">Growth Ready</div>
            <div class="info-card-text">Scale your business</div>
        </div>
    </div>

    <!-- Form Steps -->
    <div class="form-steps">
        <div class="step active">1</div>
        <div class="step">2</div>
        <div class="step">3</div>
    </div>

    <!-- Add Merchant Form -->
    <div class="add-merchant-section">
        <h3 class="section-title">Merchant Registration Form</h3>
        
        <form class="row" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-mobile-alt"></i>Mobile Number</label>
                <input type="text" name="mobile" placeholder="Enter 10-digit mobile number" class="form-control" 
                       oninput="validateMobile(this)" maxlength="10" required />
                <div class="validation-message" id="mobile-validation"></div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-lock"></i>Password</label>
                <input type="password" name="password" placeholder="Enter secure password" class="form-control" 
                       oninput="validatePassword(this)" required />
                <div class="validation-message" id="password-validation"></div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-envelope"></i>Email Address</label>
                <input type="email" name="email" placeholder="Enter valid email address" class="form-control" 
                       oninput="validateEmail(this)" required />
                <div class="validation-message" id="email-validation"></div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-user"></i>Full Name</label>
                <input type="text" name="name" placeholder="Enter full name" class="form-control" 
                       oninput="validateName(this)" required />
                <div class="validation-message" id="name-validation"></div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-building"></i>Company Name</label>
                <input type="text" name="company" placeholder="Enter company name" class="form-control" 
                       oninput="validateCompany(this)" required />
                <div class="validation-message" id="company-validation"></div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-map-pin"></i>Area PIN Code</label>
                <input type="text" name="pin" placeholder="Enter 6-digit PIN code" class="form-control" 
                       oninput="validatePin(this)" maxlength="6" required />
                <div class="validation-message" id="pin-validation"></div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-credit-card"></i>PAN Number</label>
                <input type="text" name="pan" placeholder="Enter PAN number (e.g., ABCDE1234F)" class="form-control" 
                       oninput="validatePan(this)" maxlength="10" style="text-transform: uppercase;" required />
                <div class="validation-message" id="pan-validation"></div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label"><i class="fas fa-id-card"></i>Aadhaar Number</label>
                <input type="text" name="aadhaar" placeholder="Enter 12-digit Aadhaar number" class="form-control" 
                       oninput="validateAadhaar(this)" maxlength="12" required />
                <div class="validation-message" id="aadhaar-validation"></div>
            </div>
            
            <div class="col-md-12 mb-3">
                <label class="form-label"><i class="fas fa-map-marker-alt"></i>Complete Address</label>
                <textarea name="location" placeholder="Enter complete address with city, state" class="form-control" 
                          rows="3" oninput="validateLocation(this)" required></textarea>
                <div class="validation-message" id="location-validation"></div>
            </div>
            
            <div class="col-md-12 mb-3">
                <div class="form-check" style="padding: 15px; background: #f8f9fa; border-radius: 10px; border: 2px solid #e1e5e9;">
                    <input class="form-check-input" type="checkbox" id="termsCheck" required>
                    <label class="form-check-label" for="termsCheck" style="margin-left: 10px; color: #495057;">
                        <i class="fas fa-shield-alt mr-2" style="color: #667eea;"></i>
                        I agree to the <a href="#" style="color: #667eea; font-weight: 600;">Terms & Conditions</a> and <a href="#" style="color: #667eea; font-weight: 600;">Privacy Policy</a>
                    </label>
                </div>
            </div>
            
            <div class="col-md-12 mb-3">
                <button type="submit" name="create" class="btn-add-merchant" id="submitBtn" disabled>
                    <i class="fas fa-user-plus mr-2"></i>Create Merchant Account
                </button>
            </div>
        </form>
    </div>
</div>

<?php
// PHP processing logic remains exactly the same
  include "config.php";
if (isset($_POST['create'])) {
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $checkMobileQuery = "SELECT * FROM `users` WHERE `mobile` = '$mobile'";
    $checkMobileResult = mysqli_query($conn, $checkMobileQuery);

    $checkEmailQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkMobileResult) > 0) {
        echo '
        <script>
            Swal.fire({
                title: "Opps! Your Mobile no Already Exist!",
                text: "Please Click Ok Button!!",
                confirmButtonText: "Ok",
                icon: "error"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "add_merchant";
                }
            });
        </script>';
    } elseif (mysqli_num_rows($checkEmailResult) > 0) {
        echo '
        <script>
            Swal.fire({
                title: "Opps! Your Email no Already Exist!",
                text: "Please Click Ok Button!!",
                confirmButtonText: "Ok",
                icon: "error"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "add_merchant";
                }
            });
        </script>';
        exit;
    } else {
        $password = $_POST['password'];
        $name = $_POST['name'];
        $company = $_POST['company'];
        $pin = $_POST['pin'];
        $pan = $_POST['pan'];
        $aadhaar = $_POST['aadhaar'];
        $location = $_POST['location'];
        $key = md5(rand(00000000, 99999999));
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $today = (date("Y-m-d") + 3);

        $register = "INSERT INTO `users`(`name`, `mobile`, `role`, `password`, `email`, `company`, `pin`, `pan`, `aadhaar`, `location`, `user_token`, `expiry`) VALUES ('$name','$mobile','User','$pass','$email','$company','$pin','$pan','$aadhaar','$location','$key','$today')";
        $result = mysqli_query($conn, $register);

        if($result){
            echo '
            <script>
                Swal.fire({
                    title: "Congratulations! User Added!",
                    text: "Please Click Ok Button!!",
                    confirmButtonText: "Ok",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "dashboard";
                    }
                });
            </script>';
            exit;
        } else {
            echo '
            <script>
                Swal.fire({
                    title: "Opps! Something Went Wrong!",
                    text: "Please Click Ok Button!!",
                    confirmButtonText: "Ok",
                    icon: "error"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "add_merchant";
                    }
                });
            </script>';
            exit;
        }
    }
}

if($userdata["role"] != 'Admin'){
    echo '<script>
    window.location.href = "dashboard";
    </script>';
    exit;
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Validation functions
function validateMobile(input) {
    const value = input.value.replace(/[^0-9]/g, '').slice(0, 10);
    input.value = value;
    
    const validation = document.getElementById('mobile-validation');
    if (value.length === 10) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid mobile number';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Mobile number must be 10 digits';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validatePassword(input) {
    const value = input.value;
    const validation = document.getElementById('password-validation');
    
    if (value.length >= 6) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Password strength: Good';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Password must be at least 6 characters';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateEmail(input) {
    const value = input.value;
    const validation = document.getElementById('email-validation');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (emailRegex.test(value)) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid email address';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Please enter a valid email address';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateName(input) {
    const value = input.value;
    const validation = document.getElementById('name-validation');
    
    if (value.length >= 2) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid name';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Name must be at least 2 characters';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateCompany(input) {
    const value = input.value;
    const validation = document.getElementById('company-validation');
    
    if (value.length >= 2) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid company name';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Company name must be at least 2 characters';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validatePin(input) {
    const value = input.value.replace(/[^0-9]/g, '').slice(0, 6);
    input.value = value;
    
    const validation = document.getElementById('pin-validation');
    if (value.length === 6) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid PIN code';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'PIN code must be 6 digits';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validatePan(input) {
    const value = input.value.toUpperCase().slice(0, 10);
    input.value = value;
    
    const validation = document.getElementById('pan-validation');
    const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    
    if (panRegex.test(value)) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid PAN number';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'PAN format: ABCDE1234F';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateAadhaar(input) {
    const value = input.value.replace(/[^0-9]/g, '').slice(0, 12);
    input.value = value;
    
    const validation = document.getElementById('aadhaar-validation');
    if (value.length === 12) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid Aadhaar number';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Aadhaar number must be 12 digits';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateLocation(input) {
    const value = input.value;
    const validation = document.getElementById('location-validation');
    
    if (value.length >= 10) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid address';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Address must be at least 10 characters';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function checkFormValidity() {
    const validInputs = document.querySelectorAll('.form-control.valid').length;
    const totalInputs = document.querySelectorAll('.form-control[required]').length;
    const termsChecked = document.getElementById('termsCheck').checked;
    const submitBtn = document.getElementById('submitBtn');
    
    if (validInputs === totalInputs && termsChecked) {
        submitBtn.disabled = false;
        submitBtn.style.opacity = '1';
        submitBtn.style.cursor = 'pointer';
    } else {
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.6';
        submitBtn.style.cursor = 'not-allowed';
    }
}

// Terms checkbox validation
document.getElementById('termsCheck').addEventListener('change', checkFormValidity);

$(document).ready(function() {
    // Add smooth animations
    $('.info-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
        $(this).addClass('animate__animated animate__fadeInUp');
    });
    
    // Form submission animation
    $('form').on('submit', function() {
        const submitBtn = $('#submitBtn');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Creating Account...');
        submitBtn.prop('disabled', true);
    });
});
</script>

</body>
</html>