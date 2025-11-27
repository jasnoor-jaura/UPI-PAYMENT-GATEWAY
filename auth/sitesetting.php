<?php
ob_start();
include "header.php";
include "config.php";

$message = "";

// Fetch existing settings from the database
$query = "SELECT * FROM site_settings LIMIT 1";
$result = mysqli_query($conn, $query);
$settings = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand_name = $_POST['brand_name'];
    $logo_url = $_POST['logo_url'];
    $site_link = $_POST['site_link'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $copyright_text = $_POST['copyright_text'];

    if ($settings) {
        $update_query = "UPDATE site_settings SET brand_name='$brand_name', logo_url='$logo_url', site_link='$site_link', whatsapp_number='$whatsapp_number', copyright_text='$copyright_text' WHERE id=".$settings['id'];
        if (mysqli_query($conn, $update_query)) {
            $message = "Settings updated successfully.";
        } else {
            $message = "Error updating settings: " . mysqli_error($conn);
        }
    } else {
        $insert_query = "INSERT INTO site_settings (brand_name, logo_url, site_link, whatsapp_number, copyright_text) VALUES ('$brand_name', '$logo_url', '$site_link', '$whatsapp_number', '$copyright_text')";
        if (mysqli_query($conn, $insert_query)) {
            $message = "Settings saved successfully.";
        } else {
            $message = "Error saving settings: " . mysqli_error($conn);
        }
    }

    header("Location: sitesetting.php?message=" . urlencode($message));
    exit();
}

if($userdata["role"] != 'Admin'){
    echo '<script>
    window.location.href = "dashboard";
    </script>';
    exit;
}

ob_end_flush();
?>

<style>
/* Modern Site Settings Styles */
.settings-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.settings-header::before {
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

.settings-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.settings-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.settings-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.settings-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.settings-header .breadcrumb-item.active {
    color: white;
}

/* Settings Form Section */
.settings-form-section {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.settings-form-section::before {
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

.btn-save-settings {
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

.btn-save-settings:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    color: white;
}

/* Settings Preview */
.settings-preview {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 30px;
    border-left: 4px solid #667eea;
}

.settings-preview h5 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
}

.settings-preview h5 i {
    margin-right: 10px;
    color: #667eea;
}

.preview-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #dee2e6;
}

.preview-item:last-child {
    border-bottom: none;
}

.preview-label {
    font-weight: 600;
    color: #495057;
    font-size: 14px;
}

.preview-value {
    color: #6c757d;
    font-size: 14px;
    max-width: 60%;
    text-align: right;
    word-break: break-all;
}

.logo-preview {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    object-fit: cover;
    border: 2px solid #e1e5e9;
}

/* Success Alert */
.success-alert {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    color: white;
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 10px 25px rgba(86, 171, 47, 0.2);
    display: flex;
    align-items: center;
    animation: slideInDown 0.5s ease;
}

@keyframes slideInDown {
    from { transform: translateY(-100%); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.success-alert i {
    font-size: 24px;
    margin-right: 15px;
}

/* Input Groups */
.input-group-modern {
    position: relative;
    margin-bottom: 20px;
}

.input-group-modern .form-control {
    padding-left: 50px;
}

.input-group-modern .input-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #667eea;
    font-size: 16px;
    z-index: 3;
}

/* Responsive Design */
@media (max-width: 768px) {
    .settings-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .settings-header h1 {
        font-size: 1.8rem;
    }
    
    .settings-form-section {
        padding: 25px 20px;
        margin: 15px;
    }
    
    .settings-preview {
        margin: 15px;
        padding: 20px;
    }
    
    .preview-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .preview-value {
        max-width: 100%;
        text-align: left;
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

/* Form Validation */
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
</style>

<?php if($userdata["role"] == 'Admin'){ ?>

<!-- START PAGE CONTENT-->
<div class="settings-header">
    <h1><i class="fas fa-cogs mr-3"></i>Site Settings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Site Settings</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <!-- Success Message -->
    <?php if (isset($_GET['message'])): ?>
        <div class="success-alert">
            <i class="fas fa-check-circle"></i>
            <div>
                <strong>Success!</strong> <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location = "sitesetting.php";
            }, 2000);
        </script>
    <?php endif; ?>

    <!-- Current Settings Preview -->
    <?php if ($settings): ?>
    <div class="settings-preview">
        <h5><i class="fas fa-eye"></i>Current Settings Preview</h5>
        <div class="preview-item">
            <span class="preview-label">Brand Name:</span>
            <span class="preview-value"><?php echo htmlspecialchars($settings['brand_name'] ?? 'Not Set'); ?></span>
        </div>
        <div class="preview-item">
            <span class="preview-label">Logo:</span>
            <span class="preview-value">
                <?php if (!empty($settings['logo_url'])): ?>
                    <img src="<?php echo htmlspecialchars($settings['logo_url']); ?>" alt="Logo" class="logo-preview">
                <?php else: ?>
                    Not Set
                <?php endif; ?>
            </span>
        </div>
        <div class="preview-item">
            <span class="preview-label">Site Link:</span>
            <span class="preview-value"><?php echo htmlspecialchars($settings['site_link'] ?? 'Not Set'); ?></span>
        </div>
        <div class="preview-item">
            <span class="preview-label">WhatsApp:</span>
            <span class="preview-value"><?php echo htmlspecialchars($settings['whatsapp_number'] ?? 'Not Set'); ?></span>
        </div>
        <div class="preview-item">
            <span class="preview-label">Copyright:</span>
            <span class="preview-value"><?php echo htmlspecialchars($settings['copyright_text'] ?? 'Not Set'); ?></span>
        </div>
    </div>
    <?php endif; ?>

    <!-- Settings Form -->
    <div class="settings-form-section">
        <h3 class="section-title">Website Configuration</h3>
        
        <form method="post" action="sitesetting.php">
            <div class="input-group-modern">
                <i class="fas fa-tag input-icon"></i>
                <label class="form-label">Brand Name</label>
                <input class="form-control" type="text" name="brand_name" 
                       value="<?php echo htmlspecialchars($settings['brand_name'] ?? ''); ?>" 
                       placeholder="Enter your brand name" 
                       oninput="validateBrandName(this)" required>
                <div class="validation-message" id="brand-validation"></div>
            </div>

            <div class="input-group-modern">
                <i class="fas fa-image input-icon"></i>
                <label class="form-label">Logo URL</label>
                <input class="form-control" type="url" name="logo_url" 
                       value="<?php echo htmlspecialchars($settings['logo_url'] ?? ''); ?>" 
                       placeholder="https://example.com/logo.png" 
                       oninput="validateLogoUrl(this)" required>
                <div class="validation-message" id="logo-validation"></div>
            </div>

            <div class="input-group-modern">
                <i class="fas fa-link input-icon"></i>
                <label class="form-label">Site Link</label>
                <input class="form-control" type="url" name="site_link" 
                       value="<?php echo htmlspecialchars($settings['site_link'] ?? ''); ?>" 
                       placeholder="https://yourwebsite.com" 
                       oninput="validateSiteLink(this)" required>
                <div class="validation-message" id="site-validation"></div>
            </div>

            <div class="input-group-modern">
                <i class="fab fa-whatsapp input-icon"></i>
                <label class="form-label">WhatsApp Number</label>
                <input class="form-control" type="text" name="whatsapp_number" 
                       value="<?php echo htmlspecialchars($settings['whatsapp_number'] ?? ''); ?>" 
                       placeholder="Enter WhatsApp number (without +91)" 
                       oninput="validateWhatsApp(this)" maxlength="10" required>
                <div class="validation-message" id="whatsapp-validation"></div>
            </div>

            <div class="input-group-modern">
                <i class="fas fa-copyright input-icon"></i>
                <label class="form-label">Copyright Text</label>
                <input class="form-control" type="text" name="copyright_text" 
                       value="<?php echo htmlspecialchars($settings['copyright_text'] ?? ''); ?>" 
                       placeholder="© 2024 Your Company Name" 
                       oninput="validateCopyright(this)" required>
                <div class="validation-message" id="copyright-validation"></div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn-save-settings" id="submitBtn" disabled>
                    <i class="fas fa-save mr-2"></i>Save Settings
                </button>
            </div>
        </form>
    </div>

    <!-- Settings Help -->
    <div class="settings-preview">
        <h5><i class="fas fa-info-circle"></i>Configuration Help</h5>
        <div class="preview-item">
            <span class="preview-label">Brand Name:</span>
            <span class="preview-value">This will appear in your website header and emails</span>
        </div>
        <div class="preview-item">
            <span class="preview-label">Logo URL:</span>
            <span class="preview-value">Direct link to your logo image (PNG, JPG, SVG)</span>
        </div>
        <div class="preview-item">
            <span class="preview-label">Site Link:</span>
            <span class="preview-value">Your main website URL for redirects</span>
        </div>
        <div class="preview-item">
            <span class="preview-label">WhatsApp:</span>
            <span class="preview-value">Customer support WhatsApp number</span>
        </div>
        <div class="preview-item">
            <span class="preview-label">Copyright:</span>
            <span class="preview-value">Footer copyright text for your website</span>
        </div>
    </div>
</div>

<?php } ?>

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
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Validation functions
function validateBrandName(input) {
    const value = input.value.trim();
    const validation = document.getElementById('brand-validation');
    
    if (value.length >= 2) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid brand name';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Brand name must be at least 2 characters';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateLogoUrl(input) {
    const value = input.value.trim();
    const validation = document.getElementById('logo-validation');
    const urlRegex = /^https?:\/\/.+\.(jpg|jpeg|png|gif|svg)$/i;
    
    if (urlRegex.test(value)) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid logo URL';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Please enter a valid image URL';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateSiteLink(input) {
    const value = input.value.trim();
    const validation = document.getElementById('site-validation');
    const urlRegex = /^https?:\/\/.+\..+$/;
    
    if (urlRegex.test(value)) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid website URL';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Please enter a valid website URL';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateWhatsApp(input) {
    const value = input.value.replace(/[^0-9]/g, '').slice(0, 10);
    input.value = value;
    
    const validation = document.getElementById('whatsapp-validation');
    if (value.length === 10 && value.startsWith('6', '7', '8', '9')) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid WhatsApp number';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Enter valid 10-digit mobile number';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function validateCopyright(input) {
    const value = input.value.trim();
    const validation = document.getElementById('copyright-validation');
    
    if (value.length >= 5) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        validation.textContent = 'Valid copyright text';
        validation.className = 'validation-message success';
    } else {
        input.classList.add('invalid');
        input.classList.remove('valid');
        validation.textContent = 'Copyright text must be at least 5 characters';
        validation.className = 'validation-message error';
    }
    checkFormValidity();
}

function checkFormValidity() {
    const validInputs = document.querySelectorAll('.form-control.valid').length;
    const totalInputs = document.querySelectorAll('.form-control[required]').length;
    const submitBtn = document.getElementById('submitBtn');
    
    if (validInputs === totalInputs) {
        submitBtn.disabled = false;
        submitBtn.style.opacity = '1';
        submitBtn.style.cursor = 'pointer';
    } else {
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.6';
        submitBtn.style.cursor = 'not-allowed';
    }
}

$(document).ready(function() {
    // Add smooth animations
    $('.settings-form-section').addClass('animate__animated animate__fadeInUp');
    
    // Form submission animation
    $('form').on('submit', function() {
        const submitBtn = $('#submitBtn');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Saving Settings...');
        submitBtn.prop('disabled', true);
    });
    
    // Initial validation check
    $('input[required]').each(function() {
        if ($(this).val()) {
            const inputName = $(this).attr('name');
            switch(inputName) {
                case 'brand_name':
                    validateBrandName(this);
                    break;
                case 'logo_url':
                    validateLogoUrl(this);
                    break;
                case 'site_link':
                    validateSiteLink(this);
                    break;
                case 'whatsapp_number':
                    validateWhatsApp(this);
                    break;
                case 'copyright_text':
                    validateCopyright(this);
                    break;
            }
        }
    });
});
</script>

</body>
</html>