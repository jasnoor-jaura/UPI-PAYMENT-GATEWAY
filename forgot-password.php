<?php
include "config.php";
include 'auth/function.php';
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../common/assets/" data-template="vertical-menu-template" data-style="light">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title><?php echo $site_settings['brand_name']; ?> | Login</title>
<link rel="icon" type="image/x-icon" href="<?php echo $site_settings['logo_url']; ?>" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../common/assets/vendor/fonts/remixicon/remixicon.css" />
<link rel="stylesheet" href="../common/assets/vendor/fonts/flag-icons.css" />
<link rel="stylesheet" href="../common/assets/vendor/libs/node-waves/node-waves.css" />
<link rel="stylesheet" href="../common/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../common/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../common/assets/css/demo.css" />
<link rel="stylesheet" href="../common/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../common/assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../common/assets/vendor/libs/@form-validation/form-validation.css" />
<link rel="stylesheet" href="../common/assets/vendor/css/pages/page-auth.css">
<script src="../common/assets/vendor/js/template-customizer.js"></script>
<script src="../common/assets/js/config.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<div class="authentication-wrapper authentication-cover">
<div class="authentication-inner row m-0">
<!-- /Left Section -->
<div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2">
<div>
<img src="../common/img/auth-v2-login-illustration.Cx3OW7g8.png" class="authentication-image-model d-none d-lg-block" alt="auth-model" data-app-light-img="illustrations/auth-cover-login-illustration-light.png" data-app-dark-img="illustrations/auth-cover-login-illustration-dark.png">
</div>
<img src="../common/assets/img/illustrations/tree.png" alt="tree" class="authentication-image-tree z-n1">
<img src="../common/assets/img/illustrations/auth-cover-mask-light.png" class="scaleX-n1-rtl authentication-image d-none d-lg-block w-75" alt="triangle-bg" height="362" data-app-light-img="illustrations/auth-cover-mask-light.png" data-app-dark-img="illustrations/auth-cover-mask-dark.png">
</div>
<!-- /Left Section -->

            <!-- Login -->
<div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-12 py-4">
<div class="w-px-400 mx-auto pt-5 pt-lg-0">
<div class="mb-4">
<img src="<?php echo $site_settings['logo_url']; ?>" alt="Logo" class="img-fluid" style="max-width: 150px; height: auto;">
</div>
                    <h4 class="mb-1">Forgot Password? 🔒</h4>
                    <p class="mb-5">Enter your email and we'll send you instructions to reset your password</p>
                    
                    <?php
include "auth/config.php";
if(isset($_POST['submit'])){
    // Sanitize input using mysqli_real_escape_string
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pan = mysqli_real_escape_string($conn, $_POST['pan']);

    $pass = rand(000000,999999);
    $password = password_hash($pass, PASSWORD_BCRYPT);


    $fetch = "SELECT * FROM users WHERE mobile='$username'";
    $res = mysqli_query($conn, $fetch);
    $row = mysqli_fetch_array($res);

    if(mysqli_num_rows($res) > 0){
        if($pan == $row['pan']){
            $update = "UPDATE users SET password='$password' WHERE mobile='$username'";
            $quer = mysqli_query($conn, $update);

            if($quer){
                $msg = "Dear " . $row['name'] . " Your New Password Below
                Your Password = $pass
                Thanks & Regards
                kayupt pay";
                $encodedMsg = urlencode($msg);
                
                //file_get_contents("https://wamsg.tk/wa.php?api_key=Wn62PIQ09X8BiY7iOtnEmgBCFFTDM3&sender=918145511275&number=91$username&message=$encodedMsg");

                echo '
    <script>
        Swal.fire({
            title: "Congratulations! Your New Password Sent to Your WhatsApp!!",
            text: "Your new password is: ' . $pass . '. Please Click Ok Button to proceed.",
            confirmButtonText: "Ok",
            icon: "success"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "auth/index"; // Replace with your desired redirect URL
            }
        });
    </script>
';
exit;
            } else {
                echo '
                <script>
                    Swal.fire({
                        title: "Opps! Something went wrong Please try again Later!!",
                        text: "Please Click Ok Button!!",
                        confirmButtonText: "Ok",
                        icon: "error"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "forgot-password"; // Replace with your desired redirect URL
                        }
                    });
                </script>
                ';
                exit;
            }
        } else {
            echo '
            <script>
                Swal.fire({
                    title: "Provided Pan Does Not Match Or Exist!!",
                    text: "Please Click Ok Button!!",
                    confirmButtonText: "Ok",
                    icon: "error"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "forgot-password"; // Replace with your desired redirect URL
                    }
                });
            </script>
            ';
            exit;
        }
    } else {
        echo '
        <script>
            Swal.fire({
                title: "Opps! Sorry Your Mobile Number Does Not Exist In Our Record!!",
                text: "Please Click Ok Button!!",
                confirmButtonText: "Ok",
                icon: "error"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "forgot-password"; // Replace with your desired redirect URL
                }
            });
        </script>
        ';
        exit;
    }
} 
?>

                    
                    <form class="mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Mobile" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" required>
                            <label for="email">Mobile Number</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control" id="pan" name="pan" placeholder="Enter PAN Number" pattern="[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}" title="Enter PAN number in the format: AAAAANNNNA"
         oninput="this.value = this.value.toUpperCase();" maxlength="10" required>
                            <label for="email">PAN Number</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary d-grid w-100 mb-5">Forgot Password</button>
                    </form>
                    <div class="text-center">
                        <a href="auth/index" class="d-flex align-items-center justify-content-center">
            <i class="ri-arrow-left-s-line scaleX-n1-rtl ri-20px me-1_5"></i>
            Back to login
          </a>
                    </div>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>

    <!-- / Content -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="common/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="common/assets/vendor/libs/popper/popper.js"></script>
    <script src="common/assets/vendor/js/bootstrap.js"></script>
    <script src="common/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="common/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="common/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="common/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="common/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="common/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="common/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="common/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="common/assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="common/assets/js/main.js"></script>


    <!-- Page JS -->
    <script src="common/assets/js/pages-auth.js"></script>

</body>

</html>

<!-- beautify ignore:end -->