<?php include "header.php"; ?>

<style>

body {
  line-height: 1.2;
}

a{
	text-decoration: none !important;
}	

.hand { 
	cursor: pointer; 
}

.table-sm td, .table th {
    font-size: 0.98458em;
    border-color: #ebedf2 !important;
    padding: 0.4375rem !important;
}

.bg-brown {
  background: brown !important;	
}

.d-none {
    display: none;
}

.m-primary {
 background:#285d29 !important;
 color: white !important;
}

[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
    position: unset !important;
    left: unset !important;
}


.form-check {
    display: block;
    min-height: 1.3125rem;
    padding-left: 1.8em;
    margin-bottom: 0.125rem;
}

.form-check .form-check-input {
    float: left;
    margin-left: -1.8em;
}

.form-check-input {
    width: 1em;
    height: 1em;
    margin-top: 0.1em;
    vertical-align: top;
    background-color: #fff;
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    border: 1px solid rgba(0, 0, 0, 0.25);
    appearance: none;
    color-adjust: exact;
}

.form-check-input[type=checkbox] {
    border-radius: 0.15em;
}

.form-check-input[type=radio] {
    border-radius: 50%;
}

.form-check-input:active {
    filter: brightness(90%);
}

.form-check-input:focus {
    border-color: #cbd1db;
    outline: 0;
    box-shadow: none;
}

.form-check-input:checked {
    background-color: #42bb37;
    border-color: #42bb37;
}

.form-check-input:checked[type=checkbox] {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
}

.form-check-input:checked[type=radio] {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
}

.form-check-input[type=checkbox]:indeterminate {
    background-color: #42bb37;
    border-color: #42bb37;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10h8'/%3e%3c/svg%3e");
}

.form-check-input:disabled {
    pointer-events: none;
    filter: none;
    opacity: 0.5;
}

.form-check-input[disabled] ~ .form-check-label, .form-check-input:disabled ~ .form-check-label {
    opacity: 0.5;
}

.form-switch {
    padding-left: 2.5em;
}

.form-switch .form-check-input {
    width: 2em;
    margin-left: -2.5em;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%280, 0, 0, 0.25%29'/%3e%3c/svg%3e");
    background-position: left center;
    border-radius: 2em;
    transition: background-position 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
    .form-switch .form-check-input {
        transition: none;
    }
}

.form-switch .form-check-input:focus {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23cbd1db'/%3e%3c/svg%3e");
}

.form-switch .form-check-input:checked {
    background-position: right center;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
}

.form-check-inline {
    display: inline-block;
    margin-right: 1rem;
}

.btn-check {
    position: absolute;
    clip: rect(0, 0, 0, 0);
    pointer-events: none;
}

.btn-check[disabled] + .btn, .wizard > .actions .btn-check[disabled] + a, div.tox .btn-check[disabled] + .tox-button, .swal2-popup .swal2-actions .btn-check[disabled] + button, .fc .btn-check[disabled] + .fc-button-primary, .btn-check:disabled + .btn, .wizard > .actions .btn-check:disabled + a, div.tox .btn-check:disabled + .tox-button, .swal2-popup .swal2-actions .btn-check:disabled + button, .fc .btn-check:disabled + .fc-button-primary {
    pointer-events: none;
    filter: none;
    opacity: 0.65;
}

.card .card-category {
    font-size: 14px;
    font-weight: 600;
}
.card {
    border-radius: 5px !important;
}

.card .card-title {
    font-size: 15px;
    font-weight: 400;
    line-height: 1.6;
}

.Success {
    color: #ffffff;
    background-color: #59d05d;
}

.Failed {
    color: #ffffff;
    background-color: #ff646d;
}

.Pending {
    color: #ffffff;
    background: #fbad4c;
}

.rl-loading-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
}

div#loading_ajax {
    
    background: rgba(0, 0, 0, 0.4);
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    z-index: 9998;
}

.rl-loading-thumb {
    width: 10px;
    height: 40px;
    background-color: #41f3fd;
    margin: 4px;
    box-shadow: 0 0 12px 3px #0882ff;
    animation: rl-loading 1.5s ease-in-out infinite;
}

.rl-loading-thumb-1 {
    animation-delay: 0s;
}

.rl-loading-thumb-2 {
    animation-delay: 0.5s;
}

.rl-loading-thumb-3 {
    animation-delay: 1s;
}

@keyframes rl-loading {
    0% {}
    20% {
        background: white;
        transform: scale(1.5);
    }
    40% {
        background: #41f3fd;
        transform: scale(1);
    }
}

.new-badge {
    background-color: #28a745; /* Green color */
    color: white;
    padding: 0px 0px;
    border-radius: 0px;
    font-size: 0px;
    font-weight: bold;
    display: inline-block;
    margin-left: 0x; /* Add spacing from text */
}



</style>
    

    
    <script>
        // Show content when the page is fully loaded
        window.onload = function() {
            document.getElementById("loading_ajax").style.display = "none";
        };
    </script>
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title>Brand Settings</title>-->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0px;
        }
        .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
            gap: 20px;
            flex-wrap: wrap;
        }
        .settings-box, .preview-section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            width: 100%; /* Make the boxes full width */
            transition: all 0.3s ease; /* Smooth transition */
        }
        @media (min-width: 768px) {
            .settings-box, .preview-section {
                width: 48%; /* Responsive layout for larger screens */
            }
        }
        h1, h3, h4 {
            color: #333;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
            display: block;
        }
        input[type="text"],
        input[type="color"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .save-btn {
            background-color: #528FF0;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .save-btn:hover {
            background-color: #4179D5;
        }

        /* PREVIEW SECTION STYLING */
        .preview-box {
            max-width: 350px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
            padding-bottom: 20px;
        }
        .preview-header {
            background-color: #528FF0;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            color: white;
        }
        .preview-header img {
            width: 50px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .preview-header h2 {
            font-size: 18px;
            margin: 0;
        }
        .total-amount {
            margin: 20px 0;
        }
        .total-amount h3 {
            color: #333;
            font-size: 18px;
            margin: 5px 0;
        }
        .total-amount h2 {
            color: #28a745;
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .qr-code {
            padding: 15px;
        }
        .qr-code img {
            max-width: 160px;
        }
        .payment-options {
            margin: 15px 0;
        }
        .payment-options img {
            width: 40px;
            margin: 0 10px;
        }
        .save-qr-btn {
            background-color: #2e60e5;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin: 15px 0;
        }
        .validity {
            font-size: 14px;
            color: #666;
        }

        /* Centering the Preview Heading */
        .preview-section h3 {
            text-align: center; /* Centers the 'Preview' heading */
            font-size: 20px;
            margin-bottom: 15px;
        }

        /* Popup Container */
        .popup-container {
            display: none; /* Initially hidden */
            position: fixed;
            z-index: 1000; /* Ensure it's on top of other elements */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
        }

        /* Popup Content */
        .popup-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: popupFadeIn 0.3s ease-in-out;
        }

        /* Close Button */
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Popup Heading */
        .popup-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Popup Message */
        .popup-content p {
            font-size: 16px;
        }

        /* Fade In Animation */
        @keyframes popupFadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        <!-- Existing head content -->
    <style>
        /* Popup Container Styling */
        .popup-container {
            display: none; /* Initially hidden */
            position: fixed;
            z-index: 1000; /* Ensure it's on top of other elements */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Darker background for a more premium look */
        }

        /* Popup Content Box */
        .popup-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3); /* Deeper shadow */
            animation: popupFadeIn 0.3s ease-in-out;
        }

        /* Close Button */
        .close-btn {
            color: #aaa;
            font-size: 30px;
            font-weight: bold;
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }

        /* Onboarding Content Styling */
        .onboarding-page img {
            width: 80%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px; /* Rounded images */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .onboarding-page h2 {
            font-size: 26px;
            color: #333;
            margin-bottom: 10px;
        }

        .onboarding-page p {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Button Styling */
        .onboarding-page button {
            background-color: #528FF0;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .onboarding-page button:hover {
            background-color: #4179D5;
        }

        /* Fade In Animation */
        @keyframes popupFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

    <script>
        // Update preview dynamically
        function updatePreview() {
            const brandName = document.getElementById('brand_name').value;
            const themeColor = document.getElementById('theme_color').value;
            const language = document.getElementById('default_language').value;
            const collectEmail = document.getElementById('collect_email').value;

            document.getElementById('previewBrandName').innerText = brandName;
            document.getElementById('previewThemeColor').style.backgroundColor = themeColor;
            document.getElementById('previewLanguage').innerText = language;
            document.getElementById('previewCollectEmail').innerText = collectEmail;
        }

        // Attach event listeners for real-time preview updates
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('brand_name').addEventListener('input', updatePreview);
            document.getElementById('theme_color').addEventListener('input', updatePreview);
            document.getElementById('default_language').addEventListener('change', updatePreview);
            document.getElementById('collect_email').addEventListener('change', updatePreview);
        });

        // Show the popup
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        // Close the popup
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        // Close popup if clicked outside of it
        window.onclick = function(event) {
            var popup = document.getElementById('popup');
            if (event.target == popup) {
                popup.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <!-- Onboarding Modal -->
    <div id="onboardingModal" class="popup-container">
        <div class="popup-content">
            <!-- Close Button for the Onboarding Modal -->
            <span class="close-btn" onclick="closeOnboarding()">&times;</span>
            
            <!-- Onboarding Pages -->
            <div class="onboarding-page" id="page1">
                <img src="https://business.tascostudio.com/common/img/introductions/image1.png" alt="Intro Image 1">
                <h2>Welcome to Our Platform!</h2>
                <p>This New Section you can change your gateway interface and update your brand name </p>
                <button onclick="nextPage(2)">Next</button>
            </div>
            
            <div class="onboarding-page" id="page2" style="display:none;">
                <img src="https://business.tascostudio.com/common/img/introductions/image2.png" alt="Intro Image 2">
                <h2>Easy to Change Color</h2>
                <p>This Section you can change your gateway background interface Color.</p>
                <button onclick="nextPage(3)">Next</button>
            </div>

            <div class="onboarding-page" id="page3" style="display:none;">
                <img src="https://business.tascostudio.com/common/img/introductions/image3.png" alt="Intro Image 3">
                <h2>Get Started Now!</h2>
                <p>Lets Select Your Brand Logo And Save it Now !</p>
                <button onclick="closeOnboarding()">Let's Start</button>
            </div>
        </div>
    </div>

<div class="container">
    <div class="settings-box">
        <h1>Brand Settings</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="brand_name">Brand Name:</label>
            <input type="text" id="brand_name" name="brand_name" value="" required>

            <label for="theme_color">Theme Color:</label>
            <input type="color" id="theme_color" name="theme_color" value="#528FF0" required>

            <label for="brand_logo">Brand Logo:</label>
            <input type="file" id="brand_logo" name="brand_logo" accept="image/*">

            <label for="default_language">Default Language:</label>
            <select id="default_language" name="default_language" required>
                <option value="English" selected>English</option>
                <option value="Spanish" >Spanish</option>
                <option value="French" >French</option>
            </select>

            <label for="collect_email">Collect Emails:</label>
            <select id="collect_email" name="collect_email">
                <option value="Yes" >Yes</option>
                <option value="No" selected>No</option>
            </select>

            <button type="submit" class="save-btn">Save Settings</button>
        </form>
    </div>

    <!-- Preview Section Starts Here -->
    <div class="preview-section">
        <h3>Preview</h3>
        <div class="preview-box">
            <!-- Header with Logo and Brand Name -->
            <div class="preview-header" id="previewThemeColor">
                                    <img src="path-to-placeholder-logo.png" alt="Brand Logo">
                                <h2 id="previewBrandName"></h2>
            </div>

            <!-- Total Amount Section -->
            <div class="total-amount">
                <h3>Total Amount</h3>
                <h2>₹1.00</h2>
            </div>

            <!-- QR Code Section -->
            <div class="qr-code">
                <img src="https://business.tascostudio.com/qr-code.png" alt="QR Code">
            </div>

            <!-- Payment Options Section -->
            <div class="payment-options">
                <img src="https://imgstatic.phonepe.com/images/app-icons-ia-1/payment-method/80/80/PHONEPE_WEB.png" alt="PPay">
                <img src="https://imgstatic.phonepe.com/images/app-icons-ia-1/payment-method/80/80/GPAY_WEB.png" alt="GPay">
                <img src="https://imgstatic.phonepe.com/images/app-icons-ia-1/payment-method/80/80/PYTM_WEB.png" alt="Paytm">
                <img src="https://imgstatic.phonepe.com/images/app-icons-ia-1/payment-method/48/48/BHIM_WEB.png" alt="Other Payment">
            </div>

            <!-- Save QR Code Button -->
            <div style="text-align: center; margin-top: 20px;">
                <button class="save-qr-btn" onclick="showPopup()">Save QR Code</button>
            </div>

            <!-- Validity Period Section -->
            <div class="validity">
                <p>Valid until: 02:18</p>
            </div>
        </div>
    </div>
    <!-- Preview Section Ends Here -->
</div>
<!-- Include Bootstrap JS at the bottom of your body (if not already included in header.php) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- CORE PLUGINS-->
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->

<!-- Popup HTML -->
<div id="popup" class="popup-container">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <h2>Coming Soon</h2>
        <p>This function will be available soon in our system.</p>
    </div>
</div>
    <script>
        // Show the onboarding modal if first time
        document.addEventListener('DOMContentLoaded', function() {
            if (!localStorage.getItem('onboardingSeen')) {
                document.getElementById('onboardingModal').style.display = 'block';
            }
        });

        // Move to the next page in the onboarding
        function nextPage(pageNumber) {
            const pages = document.querySelectorAll('.onboarding-page');
            pages.forEach((page, index) => {
                page.style.display = (index + 1 === pageNumber) ? 'block' : 'none';
            });
        }

        // Close the onboarding modal and mark it as seen
        function closeOnboarding() {
            document.getElementById('onboardingModal').style.display = 'none';
            localStorage.setItem('onboardingSeen', 'true');
        }
    </script>

</body>
</html>

