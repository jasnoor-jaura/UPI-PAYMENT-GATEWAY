<?php include "header.php"; ?>

<?php 
$query = $conn->query("SELECT * FROM `subscription_plan`");

if($userdata["role"] != 'Admin'){
   echo '<script>
 window.location.href = "dashboard";
</script>';
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatesub"])) {
    // Capture the POST data
    $srno = $_POST['srno'];
    $planname = $_POST['plan_name'];
    $amount = $_POST['amount'];
    $expiry = $_POST['expiry'];

    // Prepare the update statement
    $update_query = "UPDATE subscription_plan SET plan_name = ?, amount = ?, expiry = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssi", $planname, $amount, $expiry, $srno);

    if ($update_stmt->execute()) {
        // Success message
        echo "<script>
        Swal.fire({
        title: 'Success!',
        text: 'Subscription updated successfully!',
        icon: 'success',
        confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'manage_subscription';
        });
          </script>";
    } else {
        // Error during update
        echo "<script>
        Swal.fire({
        title: 'Error!',
        text: 'Error updating Subscription',
        icon: 'error',
        confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'manage_subscription';
        });
          </script>";
    }
    $update_stmt->close();
}
?>

<style>
/* Modern Admin Panel Styles */
.admin-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.admin-header::before {
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

.admin-header h1 {
    margin: 0;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.admin-header .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 15px 0 0 0;
}

.admin-header .breadcrumb-item a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
}

.admin-header .breadcrumb-item a:hover {
    color: white;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.admin-header .breadcrumb-item.active {
    color: white;
}

/* Subscription Plan Cards */
.subscription-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 30px;
}

.plan-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
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

.plan-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.plan-header {
    text-align: center;
    margin-bottom: 25px;
}

.plan-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 10px;
}

.plan-price {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 5px;
}

.plan-duration {
    color: #7f8c8d;
    font-weight: 500;
    font-size: 1rem;
}

.plan-features {
    margin: 25px 0;
}

.plan-features table {
    width: 100%;
    border-collapse: collapse;
}

.plan-features tr {
    border-bottom: 1px solid #f1f3f4;
}

.plan-features td {
    padding: 12px 8px;
    vertical-align: middle;
}

.plan-features td:first-child {
    width: 30px;
    text-align: center;
}

.plan-features .feature-icon {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
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
}

.feature-highlight {
    color: #e74c3c;
    font-weight: 600;
}

.plan-footer {
    text-align: center;
    margin-top: 25px;
}

.btn-edit {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 12px;
    padding: 12px 30px;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    width: 100%;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    color: white;
}

/* Edit Form Styles */
.edit-form-container {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.edit-form-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.form-title {
    color: #2c3e50;
    font-weight: 700;
    font-size: 1.8rem;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
}

.form-title::before {
    content: '';
    width: 4px;
    height: 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    margin-right: 15px;
    border-radius: 2px;
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

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-save {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    border: none;
    border-radius: 10px;
    padding: 12px 30px;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(86, 171, 47, 0.3);
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .admin-header {
        padding: 25px 20px;
        text-align: center;
    }
    
    .admin-header h1 {
        font-size: 1.8rem;
    }
    
    .subscription-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        margin: 15px;
    }
    
    .plan-card,
    .edit-form-container {
        padding: 25px 20px;
        margin: 0;
    }
    
    .plan-price {
        font-size: 2rem;
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
<div class="admin-header">
    <h1><i class="fas fa-crown mr-3"></i>Update Subscription & Plans</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Manage Subscription</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <?php if(isset($_GET["srno"]) && $_GET["srno"] != ''){ 
        $fetchdata = $conn->query("SELECT * FROM `subscription_plan` WHERE id = '{$_GET["srno"]}'")->fetch_assoc();
    ?>
        <div class="edit-form-container">
            <h3 class="form-title">Edit Subscription Plan</h3>
            <form method="POST" action="">
                <input type="hidden" name="srno" value="<?php echo htmlspecialchars($fetchdata["id"]); ?>" class="form-control" required>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label"><i class="fas fa-tag mr-2"></i>Plan Name</label>
                        <input type="text" name="plan_name" value="<?php echo htmlspecialchars($fetchdata["plan_name"]); ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label"><i class="fas fa-rupee-sign mr-2"></i>Amount</label>
                        <input type="text" name="amount" value="<?php echo htmlspecialchars($fetchdata["amount"]); ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label"><i class="fas fa-calendar mr-2"></i>Expiry (Months)</label>
                        <input type="text" name="expiry" value="<?php echo htmlspecialchars($fetchdata["expiry"]); ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" name="updatesub" class="btn btn-save">
                            <i class="fas fa-save mr-2"></i>Save Changes
                        </button>
                        <a href="manage_subscription" class="btn btn-secondary ml-3">
                            <i class="fas fa-arrow-left mr-2"></i>Back to Plans
                        </a>
                    </div>
                </div>
            </form>
        </div>
    <?php } else { ?>
        <div class="subscription-grid">
            <?php while($row = $query->fetch_assoc()){ ?>
                <div class="plan-card">
                    <div class="plan-header">
                        <h4 class="plan-title"><?= htmlspecialchars($row["plan_name"]) ?></h4>
                        <div class="plan-price">₹<?= number_format($row["amount"]) ?></div>
                        <p class="plan-duration"><?= htmlspecialchars($row["expiry"]) ?> Month<?= $row["expiry"] > 1 ? 's' : '' ?></p>
                    </div>
                    
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
                    
                    <div class="plan-footer">
                        <button onclick="window.location.href = 'manage_subscription?srno=<?= $row["id"] ?>'" class="btn btn-edit">
                            <i class="fas fa-edit mr-2"></i>Edit Plan
                        </button>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
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