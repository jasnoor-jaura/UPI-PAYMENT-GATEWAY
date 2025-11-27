<?php

define('ABSPATH', dirname(__FILE__) . '/');
// Include the database connection file
require_once(ABSPATH . 'header.php');


?>

<?php

include "../pages/dbFunctions.php";
include "../pages/dbInfo.php";
include "../phnpe/index.php";

// error_reporting(E_ALL);
// ini_set("display_errors",true);

if(isset($_POST['verifyotp'])){
    $upi = sanitizeInput($_POST['upi']);
    $user_token = $userdata["user_token"];
    
     $sql = "UPDATE users SET upi_id='$upi' WHERE user_token='$user_token'";
        if(setXbyY($sql)){
            
            echo '<script src="js/jquery-3.2.1.min.js"></script>';echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';echo '<script>$("#loading_ajax").hide();
    Swal.fire({
        icon: "success",
        title: "Upi Id Updated Successfully",
        showConfirmButton: true, // Show the confirm button
        confirmButtonText: "Ok!", // Set text for the confirm button
        allowOutsideClick: false, // Prevent the user from closing the popup by clicking outside
        allowEscapeKey: false // Prevent the user from closing the popup by pressing Escape key
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "connect_merchant"; // Redirect to "connect_merchant" when the user clicks the confirm button
        }
    });
</script>';
exit;
            
        }else{
            echo '<script src="js/jquery-3.2.1.min.js"></script>';echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';echo '<script>$("#loading_ajax").hide();
    Swal.fire({
        icon: "error",
        title: "Failed to Update UPI Id!!",
        showConfirmButton: true, // Show the confirm button
        confirmButtonText: "Ok!", // Set text for the confirm button
        allowOutsideClick: false, // Prevent the user from closing the popup by clicking outside
        allowEscapeKey: false // Prevent the user from closing the popup by pressing Escape key
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "connect_merchant"; // Redirect to "connect_merchant" when the user clicks the confirm button
        }
    });
</script>';
exit;
        }
        
        
}

    echo '<script src="js/jquery-3.2.1.min.js"></script>';echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';echo '<script>$("#loading_ajax").hide();
    
            Swal.fire({
                title: "PhonePe UPI Settings",
                html: `
                    <form id="phonepeForm" method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" class="mb-2">
                    
                        <div class="row" id="merchant">
                            <div class="col-md-12 mb-2">
                                <label for="otp">Enter Your UPI</label>
                                <input type="text" name="upi" id="upi" placeholder="Enter UPI Id" class="form-control" required>
                            </div>
                        
                            <div class="col-md-12 mb-2">
                                <button type="submit" name="verifyotp" class="btn btn-primary btn-block mt-2">Verify UPI</button>
                            </div>
                        </div>
                    </form>
                `,
                showCancelButton: false,
                showConfirmButton: false,
                customClass: {
                    popup: "swal2-custom-popup",
                    title: "swal2-title",
                    content: "swal2-content"
                },
                allowOutsideClick: false,
                allowEscapeKey: false
            });
    </script>';

?>


