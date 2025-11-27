<?php include "header.php"; ?>

<style>
/* Modern Card Styles */
.merchant-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: none;
    transition: all 0.3s ease;
}

.merchant-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e1e5e9;
    padding: 12px 15px;
    transition: all 0.3s ease;
    background: #f8f9fa;
    font-size: 14px;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    background: white;
    transform: translateY(-1px);
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 10px;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
}

.btn-success {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    border: none;
    border-radius: 8px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
    font-size: 12px;
}

.btn-success:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(86, 171, 47, 0.3);
}

.btn-danger {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    border: none;
    border-radius: 8px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
    font-size: 12px;
}

.btn-danger:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(255, 65, 108, 0.3);
}

.table-modern {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: none;
}

.table-modern thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.table-modern th {
    border: none;
    padding: 18px 15px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 11px;
    letter-spacing: 1px;
}

.table-modern td {
    border: none;
    padding: 15px;
    vertical-align: middle;
    border-bottom: 1px solid #f1f3f4;
    font-size: 13px;
}

.table-modern tbody tr {
    transition: all 0.3s ease;
}

.table-modern tbody tr:hover {
    background: linear-gradient(135deg, #f8f9ff 0%, #f0f4ff 100%);
    transform: scale(1.01);
}

.status-active {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    color: white;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-inactive {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    color: white;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.page-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.page-header::before {
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

.page-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.page-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.page-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.page-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.page-header .breadcrumb-item.active {
    color: white;
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

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
    position: relative;
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

.merchant-table-section {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.merchant-table-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.merchant-type-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 8px 15px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.date-badge {
    background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
    color: #2d3436;
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
}

.action-buttons {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.table-responsive {
    border-radius: 15px;
    overflow: hidden;
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

/* Responsive Design */
@media (max-width: 768px) {
    .page-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .page-header h1 {
        font-size: 1.8rem;
    }
    
    .add-merchant-section,
    .merchant-table-section {
        padding: 25px 20px;
        margin: 15px;
    }
    
    .action-buttons {
        justify-content: center;
    }
    
    .table-responsive {
        font-size: 12px;
    }
}
</style>

<!-- START PAGE CONTENT-->
<div class="page-header">
    <h1><i class="fas fa-link mr-3"></i>Merchant Connect Setting</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Merchant Connect</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <div class="add-merchant-section">
        <h3 class="section-title">Add New Merchant</h3>
        
        <?php
        // All previous PHP processing code remains exactly the same
        if(isset($_POST['addmerchant'])){
            $bbbytemerchant = mysqli_real_escape_string($conn, $_POST['merchant_name']);
            
            if ($bbbytemerchant=="hdfc"){
                $no = mysqli_real_escape_string($conn, $_POST['c_mobile']);
                $data = "INSERT INTO hdfc(id, number, seassion, device_id, user_token, pin, upi_hdfc, UPI, tidlist, status, mobile) VALUES ('','$no','','','" . $userdata['user_token'] . "','','','','', 'Deactive','$mobile')";
                $insert = mysqli_query($conn, $data);
            }
            elseif ($bbbytemerchant=="phonepe"){
                $no = mysqli_real_escape_string($conn, $_POST['c_mobile']);
                $bbbytetokken=$userdata['user_token'];
                
                $data = "INSERT INTO phonepe_tokens (user_token, phoneNumber, userId, token, refreshToken, name, device_data)
                VALUES ('$bbbytetokken', '$no', '', '', '', '', '')";
                $insert = mysqli_query($conn, $data);
            }
            elseif ($bbbytemerchant=="paytm"){
                $no = mysqli_real_escape_string($conn, $_POST['c_mobile']);
                $bbbytetokken=$userdata['user_token'];
                
                $data = "INSERT INTO paytm_tokens (user_token, phoneNumber, MID, Upiid)
                VALUES ('$bbbytetokken', '$no', '','')";
                $insert = mysqli_query($conn, $data);
            }
            elseif ($bbbytemerchant=="bharatpe"){
                $no = mysqli_real_escape_string($conn, $_POST['c_mobile']);
                $bbbytetokken=$userdata['user_token'];
                
                $data = "INSERT INTO bharatpe_tokens (user_token, phoneNumber, token, cookie, merchantId)
                VALUES ('$bbbytetokken', '$no', '', '', '')";
                $insert = mysqli_query($conn, $data);
            }
            elseif ($bbbytemerchant=="amazonpay"){
                $no = mysqli_real_escape_string($conn, $_POST['c_mobile']);
                $bbbytetokken=$userdata['user_token'];
                
                $data = "INSERT INTO amazon_pay (user_token, phoneNumber, upi_id, cookie,status)
                VALUES ('$bbbytetokken', '$no', '', '', 'Deactive')";
                $insert = mysqli_query($conn, $data);
            }
            elseif ($bbbytemerchant=="sbi"){
                $no = mysqli_real_escape_string($conn, $_POST['c_mobile']);
                $bbbytetokken=$userdata['user_token'];
                
                $fcuser_id = $_SESSION['user_id'];
                $data = "INSERT INTO sbi_token (user_token, phoneNumber, user_id)
                VALUES ('$bbbytetokken', '$no', '$fcuser_id')";
                $insert = mysqli_query($conn, $data);
            }
            elseif ($bbbytemerchant=="freecharge"){
                $no = mysqli_real_escape_string($conn, $_POST['c_mobile']);
                $bbbytetokken=$userdata['user_token'];
                
                $fcuser_id = $_SESSION['user_id'];
                $data = "INSERT INTO freecharge_token (user_token, phoneNumber, user_id)
                VALUES ('$bbbytetokken', '$no', '$fcuser_id')";
                $insert = mysqli_query($conn, $data);
            }
            elseif ($bbbytemerchant=="mobikwik"){
                $no = mysqli_real_escape_string($conn, $_POST['c_mobile']);
                $bbbytetokken=$userdata['user_token'];
                
                $fcuser_id = $_SESSION['user_id'];
                $data = "INSERT INTO mobikwik_token (user_token, phoneNumber, user_id)
                VALUES ('$bbbytetokken', '$no', '$fcuser_id')";
                $insert = mysqli_query($conn, $data);
            }
            
            if($insert){
                echo '<script src="js/jquery-3.2.1.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
                echo '<script>
                    $("#loading_ajax").hide();
                    Swal.fire({
                        icon: "success",
                        title: "Congratulations! Your Merchant Has been Added Successfully!",
                        showConfirmButton: true,
                        confirmButtonText: "Ok!",
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "connect_merchant";
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
                        title: "Opps Sorry Merchant Adding Failure!",
                        showConfirmButton: true,
                        confirmButtonText: "Ok!",
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "dashboard";
                        }
                    });
                </script>';
                exit;
            }
        }

        if (isset($_POST['delete'])) {
            $merchant_type = mysqli_real_escape_string($conn, $_POST['merchant_type']);
            $token = $userdata['user_token'];

            $del = "";
            $update = "";

            if ($merchant_type == 'hdfc') {
                $del = "DELETE FROM hdfc WHERE user_token = '$token'";
                $update = "UPDATE users SET hdfc_connected = 'No' WHERE user_token = '$token'";
            } elseif ($merchant_type == 'phonepe') {
                $del = "DELETE FROM phonepe_tokens WHERE user_token = '$token'";
                $update = "UPDATE users SET phonepe_connected = 'No' WHERE user_token = '$token'";
                $del_store_id = "DELETE FROM store_id WHERE user_token = '$token'";
                mysqli_query($conn, $del_store_id);
            } elseif ($merchant_type == 'paytm') {
                $del = "DELETE FROM paytm_tokens WHERE user_token = '$token'";
                $update = "UPDATE users SET paytm_connected = 'No' WHERE user_token = '$token'";
            } elseif ($merchant_type == 'bharatpe') {
                $del = "DELETE FROM bharatpe_tokens WHERE user_token = '$token'";
                $update = "UPDATE users SET bharatpe_connected = 'No' WHERE user_token = '$token'";
            } elseif ($merchant_type == 'amazonpay') {
                $del = "DELETE FROM amazon_pay WHERE user_token = '$token'";
                $update = "UPDATE users SET amazonpay_connected = 'No' WHERE user_token = '$token'";
            } elseif ($merchant_type == 'freecharge') {
                $del = "DELETE FROM freecharge_token WHERE user_token = '$token'";
                $update = "UPDATE users SET freecharge_connected = 'No' WHERE user_token = '$token'";
            } elseif ($merchant_type == 'sbi') {
                $del = "DELETE FROM sbi_token WHERE user_token = '$token'";
                $update = "UPDATE users SET sbi_connected = 'No' WHERE user_token = '$token'";
            } elseif ($merchant_type == 'mobikwik') {
                $del = "DELETE FROM mobikwik_token WHERE user_token = '$token'";
                $update = "UPDATE users SET mobikwik_connected = 'No' WHERE user_token = '$token'";
            }

            $res_del = mysqli_query($conn, $del);
            $res_update = mysqli_query($conn, $update);

            if ($res_del && $res_update) {
                echo '<script src="js/jquery-3.2.1.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
                echo '<script>
                    $("#loading_ajax").hide();
                    Swal.fire({
                        icon: "success",
                        title: "Congratulations! Your Merchant Has been Deleted Successfully!",
                        showConfirmButton: true,
                        confirmButtonText: "Ok!",
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "connect_merchant";
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
                        title: "Merchant Not Deleted! Contact Admin",
                        showConfirmButton: true,
                        confirmButtonText: "Ok!",
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "connect_merchant";
                        }
                    });
                </script>';
                exit;
            }
        }
        ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mb-4">
            <div class="row" id="merchant">
                <div class="col-md-4 mb-3">
                    <label class="form-label"><i class="fas fa-store mr-2"></i>Merchant Name</label>
                    <select name="merchant_name" class="form-control">
                        <option value="hdfc">HDFC Vyapar</option>
                        <option value="sbi">SBI Merchant</option>
                        <option value="phonepe">PhonePe</option>
                        <option value="paytm">Paytm</option>
                        <option value="bharatpe">BharatPe</option>
                        <option value="mobikwik">Mobikwik</option>
                        <option value="amazonpay">Amazon Pay</option>
                        <option value="freecharge">Freecharge UPI</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label"><i class="fas fa-mobile-alt mr-2"></i>Cashier Mobile Number</label>
                    <input type="number" name="c_mobile" placeholder="Enter Mobile Number" class="form-control" onkeypress="if(this.value.length==10) return false;" required="">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" name="addmerchant" class="btn btn-primary btn-block">
                        <i class="fas fa-plus mr-2"></i>Add Merchant
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="merchant-table-section">
        <h3 class="section-title">All Merchants</h3>
        <div class="table-responsive">
            <table class="table table-modern" id="dataTable" width="100%">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag mr-2"></i>#</th>
                        <th><i class="fas fa-store mr-2"></i>Merchant Type</th>
                        <th><i class="fas fa-user mr-2"></i>Username</th>
                        <th><i class="fas fa-sync mr-2"></i>Last Sync</th>
                        <th><i class="fas fa-signal mr-2"></i>Status</th>
                        <th><i class="fas fa-cogs mr-2"></i>Action</th>
                        <th><i class="fas fa-trash mr-2"></i>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kayupirrrtoken = $userdata['user_token'];
                    $fetchData = "
                        SELECT 'hdfc' AS merchant_type, id, number, date, status FROM hdfc WHERE user_token = '$kayupirrrtoken' 
                        UNION ALL 
                        SELECT 'phonepe' AS merchant_type, sl AS id, phoneNumber AS number, date, status FROM phonepe_tokens WHERE user_token = '$kayupirrrtoken'
                        UNION ALL
                        SELECT 'paytm' AS merchant_type, id, phoneNumber AS number, date, status FROM paytm_tokens WHERE user_token = '$kayupirrrtoken'
                        UNION ALL
                        SELECT 'bharatpe' AS merchant_type, id, phoneNumber AS number, date, status FROM bharatpe_tokens WHERE user_token = '$kayupirrrtoken'
                        UNION ALL
                        SELECT 'googlepay' AS merchant_type, id, phoneNumber AS number, date, status FROM googlepay_tokens WHERE user_token = '$kayupirrrtoken'
                        UNION ALL
                        SELECT 'freecharge' AS merchant_type, id, phoneNumber AS number, date, status FROM freecharge_token WHERE user_token = '$kayupirrrtoken'
                        UNION ALL
                        SELECT 'sbi' AS merchant_type, id, phoneNumber AS number, date, status FROM sbi_token WHERE user_token = '$kayupirrrtoken'
                        UNION ALL
                        SELECT 'mobikwik' AS merchant_type, id, phoneNumber AS number, date, status FROM mobikwik_token WHERE user_token = '$kayupirrrtoken'
                        UNION ALL
                        SELECT 'amazonpay' AS merchant_type, id, phoneNumber AS number, date, status FROM amazon_pay WHERE user_token = '$kayupirrrtoken'
                    ";

                    $ssData = mysqli_query($conn, $fetchData);

                    if ($ssData) {
                        $counter = 1;
                        while ($merchant = mysqli_fetch_array($ssData)) {
                            $statusClass = ($merchant['status'] == 'Active') ? 'status-active' : 'status-inactive';
                            ?>
                            <tr>
                                <td><strong><?php echo $counter++; ?></strong></td>
                                <td>
                                    <span class="merchant-type-badge">
                                        <?php echo !empty($merchant['merchant_type']) ? strtoupper(htmlspecialchars($merchant['merchant_type'], ENT_QUOTES, 'UTF-8')) : ''; ?>
                                    </span>
                                </td>
                                <td>
                                    <i class="fas fa-mobile-alt mr-2 text-muted"></i>
                                    <?php echo !empty($merchant['number']) ? htmlspecialchars($merchant['number'], ENT_QUOTES, 'UTF-8') : ''; ?>
                                </td>
                                <td>
                                    <span class="date-badge">
                                        <?php echo !empty($merchant['date']) ? htmlspecialchars($merchant['date'], ENT_QUOTES, 'UTF-8') : 'Never'; ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="<?php echo $statusClass; ?>">
                                        <?php echo htmlspecialchars($merchant['status'], ENT_QUOTES, 'UTF-8'); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <?php
                                        if ($merchant['merchant_type'] == 'hdfc') {
                                            ?>
                                            <form action="send_hdfcotp" method="post" style="display: inline;">
                                                <input type="hidden" name="hdfc_mobile" value="<?php echo $merchant['number']; ?>">
                                                <button class="btn btn-success" name="Verify">
                                                    <i class="fas fa-check mr-1"></i>Verify
                                                </button>
                                            </form>
                                            <?php
                                        } elseif ($merchant['merchant_type'] == 'phonepe') {
                                            ?>
                                            <form action="send_phonepeotp" method="post" style="display: inline;">
                                                <input type="hidden" name="phonepe_mobile" value="<?php echo $merchant['number']; ?>">
                                                <button class="btn btn-success" name="Verify">
                                                    <i class="fas fa-check mr-1"></i>Verify
                                                </button>
                                            </form>
                                            <form action="updatepupi" method="post" style="display: inline;">
                                                <button class="btn btn-success mt-1" name="Verify">
                                                    <i class="fas fa-qrcode mr-1"></i>Verify UPI
                                                </button>
                                            </form>
                                            <?php
                                        } elseif ($merchant['merchant_type'] == 'paytm') {
                                            ?>
                                            <form action="send_paytmotp" method="post" style="display: inline;">
                                                <input type="hidden" name="paytm_mobile" value="<?php echo $merchant['number']; ?>">
                                                <button class="btn btn-success" name="Verify">
                                                    <i class="fas fa-check mr-1"></i>Verify
                                                </button>
                                            </form>
                                            <?php
                                        } elseif ($merchant['merchant_type'] == 'bharatpe') {
                                            ?>
                                            <form action="send_bharatpeotp" method="post" style="display: inline;">
                                                <input type="hidden" name="bharatpe_mobile" value="<?php echo $merchant['number']; ?>">
                                                <button class="btn btn-success" name="Verify">
                                                    <i class="fas fa-check mr-1"></i>Verify
                                                </button>
                                            </form>
                                            <?php
                                        } elseif ($merchant['merchant_type'] == 'amazonpay') {
                                            ?>
                                            <form action="send_amazonpayotp" method="post" style="display: inline;">
                                                <input type="hidden" name="amazonpay_mobile" value="<?php echo $merchant['number']; ?>">
                                                <button class="btn btn-success" name="Verify">
                                                    <i class="fas fa-check mr-1"></i>Verify
                                                </button>
                                            </form>
                                            <?php
                                        } elseif ($merchant['merchant_type'] == 'freecharge') {
                                            ?>
                                            <form action="send_freechargeotp" method="post" style="display: inline;">
                                                <input type="hidden" name="freecharge_mobile" value="<?php echo $merchant['number']; ?>">
                                                <button class="btn btn-success" name="Verify">
                                                    <i class="fas fa-check mr-1"></i>Verify
                                                </button>
                                            </form>
                                            <?php
                                        } elseif ($merchant['merchant_type'] == 'sbi') {
                                            ?>
                                            <form action="send_sbiotp" method="post" style="display: inline;">
                                                <input type="hidden" name="sbi_mobile" value="<?php echo $merchant['number']; ?>">
                                                <button class="btn btn-success" name="Verify">
                                                    <i class="fas fa-check mr-1"></i>Verify
                                                </button>
                                            </form>
                                            <?php
                                        } elseif ($merchant['merchant_type'] == 'mobikwik') {
                                            ?>
                                            <form action="send_mobikwikotp" method="post" style="display: inline;">
                                                <input type="hidden" name="mobikwik_mobile" value="<?php echo $merchant['number']; ?>">
                                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                                                <button class="btn btn-success" name="Verify">
                                                    <i class="fas fa-check mr-1"></i>Verify
                                                </button>
                                            </form>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    if ($merchant['merchant_type'] == 'hdfc') {
                                        ?>
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: inline;">
                                            <input type="hidden" name="hdfc_mobile" value="<?php echo $merchant['number']; ?>">
                                            <input type="hidden" name="merchant_type" value="hdfc">
                                            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this merchant?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                        <?php
                                    } elseif ($merchant['merchant_type'] == 'phonepe') {
                                        ?>
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: inline;">
                                            <input type="hidden" name="phonepe_mobile" value="<?php echo $merchant['number']; ?>">
                                            <input type="hidden" name="merchant_type" value="phonepe">
                                            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this merchant?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                        <?php
                                    } elseif ($merchant['merchant_type'] == 'paytm') {
                                        ?>
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: inline;">
                                            <input type="hidden" name="paytm_mobile" value="<?php echo $merchant['number']; ?>">
                                            <input type="hidden" name="merchant_type" value="paytm">
                                            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this merchant?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                        <?php
                                    } elseif ($merchant['merchant_type'] == 'bharatpe') {
                                        ?>
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: inline;">
                                            <input type="hidden" name="bharatpe_mobile" value="<?php echo $merchant['number']; ?>">
                                            <input type="hidden" name="merchant_type" value="bharatpe">
                                            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this merchant?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                        <?php
                                    } elseif ($merchant['merchant_type'] == 'amazonpay') {
                                        ?>
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: inline;">
                                            <input type="hidden" name="amazonpay_mobile" value="<?php echo $merchant['number']; ?>">
                                            <input type="hidden" name="merchant_type" value="amazonpay">
                                            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this merchant?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                        <?php
                                    } elseif ($merchant['merchant_type'] == 'freecharge') {
                                        ?>
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: inline;">
                                            <input type="hidden" name="freecharge_mobile" value="<?php echo $merchant['number']; ?>">
                                            <input type="hidden" name="merchant_type" value="freecharge">
                                            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this merchant?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                        <?php
                                    } elseif ($merchant['merchant_type'] == 'sbi') {
                                        ?>
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: inline;">
                                            <input type="hidden" name="sbi_mobile" value="<?php echo $merchant['number']; ?>">
                                            <input type="hidden" name="merchant_type" value="sbi">
                                            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this merchant?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                        <?php
                                    } elseif ($merchant['merchant_type'] == 'mobikwik') {
                                        ?>
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: inline;">
                                            <input type="hidden" name="mobikwik_mobile" value="<?php echo $merchant['number']; ?>">
                                            <input type="hidden" name="merchant_type" value="mobikwik">
                                            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this merchant?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        responsive: true,
        pageLength: 10,
        order: [[0, 'desc']],
        language: {
            search: "Search merchants:",
            lengthMenu: "Show _MENU_ merchants per page",
            info: "Showing _START_ to _END_ of _TOTAL_ merchants",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });
});

function showInvalidPasswordAlert(id) {
    Swal.fire({
        icon: 'error',
        title: 'Invalid Password',
        text: 'Invalid Password for merchant with ID: ' + id,
        confirmButtonText: 'OK'
    });
}
</script>

</body>
</html>