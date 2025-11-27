<?php include "header.php"; ?>

<style>
/* Modern Payment Link Styles */
.payment-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.payment-header::before {
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

.payment-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.payment-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.payment-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.payment-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.payment-header .breadcrumb-item.active {
    color: white;
}

/* Create Payment Link Form */
.create-link-section {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.create-link-section::before {
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

.btn-create {
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
}

.btn-create:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    color: white;
}

/* Payment Links Table */
.links-table-section {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.links-table-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.table-modern {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
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

.status-success {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    color: white;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-failed {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    color: white;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-pending {
    background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
    color: #2d3436;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Copy Link Modal */
.modal-modern .modal-content {
    border-radius: 20px;
    border: none;
    box-shadow: 0 25px 50px rgba(0,0,0,0.2);
}

.modal-modern .modal-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 20px 20px 0 0;
    padding: 25px 30px;
    border: none;
}

.modal-modern .modal-title {
    font-weight: 700;
    font-size: 1.3rem;
}

.modal-modern .modal-body {
    padding: 30px;
}

.clipboard {
    position: relative;
    margin-bottom: 20px;
}

.copy-input {
    width: 100%;
    padding: 15px 60px 15px 20px;
    border: 2px solid #e1e5e9;
    border-radius: 12px;
    background: #f8f9fa;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.copy-input:focus {
    outline: none;
    border-color: #667eea;
    background: white;
}

.copy-btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 14px;
}

.copy-btn:hover {
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.copied {
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    color: white;
    padding: 15px 25px;
    border-radius: 25px;
    font-weight: 600;
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 10000;
    box-shadow: 0 10px 25px rgba(86, 171, 47, 0.3);
}

.modal-modern .modal-footer {
    padding: 20px 30px 30px;
    border: none;
    justify-content: center;
}

.btn-secondary {
    background: #6c757d;
    border: none;
    border-radius: 10px;
    padding: 12px 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 10px;
    padding: 12px 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .payment-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .payment-header h1 {
        font-size: 1.8rem;
    }
    
    .create-link-section,
    .links-table-section {
        padding: 25px 20px;
        margin: 15px;
    }
    
    .table-responsive {
        font-size: 12px;
    }
    
    .modal-modern .modal-body {
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
</style>

<?php
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $remark = $_POST['remark'];
    $amount = $_POST['amount'];
    
    if($remark == ''){
        $remark = 'Your Payment Link is Created';
    }
    
    $orderid = mt_rand(10000000000,9999999999999);
    
    $data = array(
        'customer_mobile' => $mobile,
        'user_token' => $userdata["user_token"],
        'amount' => $amount,
        'order_id' => $orderid,
        'redirect_url' => 'https://'.$_SERVER["SERVER_NAME"].'/success',
        'remark1' => $remark,
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
       CURLOPT_URL => 'https://'.$_SERVER["SERVER_NAME"].'/api/create-order',
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => '',
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 0,
       CURLOPT_FOLLOWLOCATION => true,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => 'POST',
       CURLOPT_POSTFIELDS => http_build_query($data),
       CURLOPT_HTTPHEADER => array(
          'User-Agent: Apidog/1.0.0 (https://apidog.com)'
       ),
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    
    $jsondatares = json_decode($response,true);
    
    $paymentlink = '';
    if($jsondatares["status"] == true){
        $paymentlink = $jsondatares["result"]["payment_url"];
    }else{
        echo '
        <script>
            Swal.fire({
                title: "Opps! Failed To Create Payment Link!",
                text: "'.$jsondatares["message"].'",
                confirmButtonText: "Ok",
                icon: "error"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "payment_link";
                }
            });
        </script>
        ';
        exit;
    }
}
?>

<!-- START PAGE CONTENT-->
<div class="payment-header">
    <h1><i class="fas fa-link mr-3"></i>Create Payment Link</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Payment Link</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <?php if($userdata["role"] == 'User'){ ?>
        <div class="create-link-section">
            <h3 class="section-title">Create New Payment Link</h3>
            
            <form class="row" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="fas fa-user"></i>Customer Name</label>
                    <input type="text" name="name" placeholder="Enter customer name" class="form-control" required />
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="fas fa-mobile-alt"></i>Mobile Number</label>
                    <input type="number" name="mobile" placeholder="Enter mobile number" class="form-control" required />
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="fas fa-rupee-sign"></i>Amount (INR)</label>
                    <input type="number" name="amount" placeholder="₹0.00" class="form-control" required />
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label"><i class="fas fa-comment"></i>Remark</label>
                    <input type="text" name="remark" placeholder="Payment description" class="form-control" />
                </div>
                
                <div class="col-md-12 mb-3">
                    <button type="submit" name="create" class="btn btn-create">
                        <i class="fas fa-plus mr-2"></i>Create Payment Link
                    </button>
                </div>
            </form>
        </div>

        <div class="links-table-section">
            <h3 class="section-title">Recent Payment Links</h3>
            <div class="table-responsive">
                <table class="table table-modern" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag mr-2"></i>#</th>
                            <th><i class="fas fa-mobile-alt mr-2"></i>Customer Mobile</th>
                            <th><i class="fas fa-rupee-sign mr-2"></i>Amount</th>
                            <th><i class="fas fa-receipt mr-2"></i>Order ID</th>
                            <th><i class="fas fa-signal mr-2"></i>Status</th>
                            <th><i class="fas fa-comment mr-2"></i>Remarks</th>
                            <th><i class="fas fa-calendar mr-2"></i>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `orders` WHERE user_id='{$userdata["id"]}' ORDER BY `id` DESC LIMIT 25";
                        $query_run = mysqli_query($conn, $query);

                        if ($query_run) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                if($row['status'] == 'SUCCESS'){
                                    $st = '<span class="status-success">Success</span>';
                                }else if($row['status'] == 'FAILURE'){
                                    $st = '<span class="status-failed">Failed</span>';
                                }else{
                                    $st = '<span class="status-pending">Pending</span>';
                                }
                                
                                echo "<tr>";
                                echo "<td><strong>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</strong></td>";
                                echo "<td><i class='fas fa-mobile-alt mr-2 text-muted'></i>" . htmlspecialchars($row['customer_mobile'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td><strong>₹" . number_format($row['amount'], 2) . "</strong></td>";
                                echo "<td><code>" . htmlspecialchars($row['order_id'], ENT_QUOTES, 'UTF-8') . "</code></td>";
                                echo "<td>" . $st . "</td>";
                                echo "<td>" . htmlspecialchars($row['remark1'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td><small>" . date('d M Y, h:i A', strtotime($row['create_date'])) . "</small></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No payment links found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    <?php } else { ?>
        <div class="links-table-section">
            <h3 class="section-title">All Payment Links</h3>
            <div class="table-responsive">
                <table class="table table-modern" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag mr-2"></i>#</th>
                            <th><i class="fas fa-user mr-2"></i>User</th>
                            <th><i class="fas fa-rupee-sign mr-2"></i>Amount</th>
                            <th><i class="fas fa-receipt mr-2"></i>UTR Number</th>
                            <th><i class="fas fa-signal mr-2"></i>Status</th>
                            <th><i class="fas fa-comment mr-2"></i>Remarks</th>
                            <th><i class="fas fa-calendar mr-2"></i>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getst = $_GET["getfundst"];
                        $query = "SELECT * FROM `settlement` WHERE status='$getst'";
                        $query_run = mysqli_query($conn, $query);

                        if ($query_run) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                $fetchuser = $conn->query("SELECT * FROM `users` WHERE id = '{$row["userid"]}'")->fetch_assoc();
                                if($row['status'] == 1){
                                    $st = '<span class="status-success">Success</span>';
                                }else if($row['status'] == 0){
                                    $st = '<span class="status-failed">Rejected</span>';
                                }else{
                                    $st = '<span class="status-pending">Pending</span>';
                                }
                                
                                echo "<tr>";
                                echo "<td><strong>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</strong></td>";
                                echo "<td>" . htmlspecialchars($fetchuser['name'], ENT_QUOTES, 'UTF-8') . "<br><small>Mobile: ".htmlspecialchars($fetchuser['mobile'], ENT_QUOTES, 'UTF-8'). "</small></td>";
                                echo "<td><strong>₹" . number_format($row['amount'], 2) . "</strong></td>";
                                echo "<td><code>" . htmlspecialchars($row['utr_no'], ENT_QUOTES, 'UTF-8') . "</code></td>";
                                echo "<td>" . $st . "</td>";
                                echo "<td>" . htmlspecialchars($row['remark'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td><small>" . date('d M Y, h:i A', strtotime($row['date'])) . "</small></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>

<?php if(isset($paymentlink) && $paymentlink != ''){ ?>
<!-- Payment Link Modal -->
<div class="modal fade modal-modern" id="copypaymentlinkmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block; opacity: 1;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-check-circle mr-2"></i>Payment Link Created Successfully</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="clipboard">
                    <input onclick="copy()" class="copy-input" value="<?php echo $paymentlink ?>" id="copyClipboard" readonly>
                    <button class="copy-btn" id="copyButton" onclick="copy()">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
                <div id="copied-success" class="copied">
                    <i class="fas fa-check mr-2"></i>Link Copied Successfully!
                </div>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Note:</strong> This Payment Link is valid for only 10 minutes.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary" onclick="copy()">
                    <i class="fas fa-copy mr-2"></i>Copy Link
                </button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function(){
    $("#dataTable").DataTable({
        responsive: true,
        pageLength: 10,
        order: [[0, 'desc']],
        language: {
            search: "Search payment links:",
            lengthMenu: "Show _MENU_ links per page",
            info: "Showing _START_ to _END_ of _TOTAL_ links",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });

    $("#frubtn").click(function(){
        $("#changefrform").slideToggle();
    });
});

function copy() {
    let copyText = document.getElementById("copyClipboard");
    let copySuccess = document.getElementById("copied-success");
    copyText.select();
    copyText.setSelectionRange(0, 99999); 
    navigator.clipboard.writeText(copyText.value);
    
    copySuccess.style.opacity = "1";
    setTimeout(function(){ 
        copySuccess.style.opacity = "0";
    }, 2000);
}

// Auto-hide modal on outside click
$(document).ready(function() {
    $('.modal').on('click', function(e) {
        if (e.target === this) {
            $(this).fadeOut();
        }
    });
    
    $('.close, .btn-secondary').on('click', function() {
        $('.modal').fadeOut();
    });
});
</script>

</body>
</html>