<?php include "header.php"; ?>

<?php
if (isset($_POST['delete'])) {
    $mb = mysqli_real_escape_string($conn,$_POST['mobileno']);
    $del = "DELETE FROM `users` WHERE mobile='$mb'";
    $rpt = mysqli_query($conn, $del);

    if ($rpt) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "User Deleted Successfully!!",
                showConfirmButton: true,
                confirmButtonText: "Ok!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "merchant_list";
                }
            });
        </script>';
        exit;
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "User Delete Failure!!",
                showConfirmButton: true,
                confirmButtonText: "Ok!",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "merchant_list";
                }
            });
        </script>';
        exit;
    }
}

if($userdata["role"] != 'Admin'){
   echo '<script>
 window.location.href = "dashboard";
</script>';
    exit;
}
?>

<style>
/* Modern Merchant List Styles */
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

/* Merchant Table Section */
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

/* User Type Badge */
.user-type-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 8px 15px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    justify-content: center;
}

.btn-edit {
    background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    border: none;
    border-radius: 8px;
    padding: 8px 15px;
    color: white;
    font-weight: 500;
    font-size: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-edit:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(86, 171, 47, 0.3);
    color: white;
    text-decoration: none;
}

.btn-delete {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    border: none;
    border-radius: 8px;
    padding: 8px 15px;
    color: white;
    font-weight: 500;
    font-size: 12px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-delete:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(255, 65, 108, 0.3);
    color: white;
}

/* User Info Styling */
.user-info {
    display: flex;
    align-items: center;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    margin-right: 12px;
    font-size: 14px;
}

.user-details h6 {
    margin: 0;
    font-weight: 600;
    color: #2c3e50;
    font-size: 14px;
}

.user-details small {
    color: #7f8c8d;
    font-size: 12px;
}

/* Contact Info */
.contact-info {
    display: flex;
    align-items: center;
    color: #495057;
}

.contact-info i {
    margin-right: 8px;
    color: #667eea;
    width: 16px;
}

/* Expiry Date Styling */
.expiry-date {
    background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
    color: #2d3436;
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    display: inline-block;
}

.expiry-soon {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    color: white;
}

/* Stats Cards */
.stats-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.12);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 5px;
}

.stat-label {
    color: #7f8c8d;
    font-weight: 500;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
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
    
    .merchant-table-section {
        padding: 25px 20px;
        margin: 15px;
    }
    
    .action-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .table-responsive {
        font-size: 12px;
    }
    
    .user-info {
        flex-direction: column;
        text-align: center;
    }
    
    .user-avatar {
        margin-right: 0;
        margin-bottom: 8px;
    }
    
    .stats-cards {
        grid-template-columns: 1fr;
        gap: 15px;
        margin: 15px;
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

/* Table Enhancements */
.table-responsive {
    border-radius: 15px;
    overflow: hidden;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #7f8c8d;
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 20px;
    color: #bdc3c7;
}

.empty-state h4 {
    margin-bottom: 10px;
    color: #2c3e50;
}
</style>

<link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
<link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
<link href="assets/css/main.min.css" rel="stylesheet" />

<!-- START PAGE CONTENT-->
<div class="merchant-header">
    <h1><i class="fas fa-users mr-3"></i>Merchant List</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Merchant List</li>
    </ol>
</div>

<div class="page-content fade-in-up">
    <!-- Stats Cards -->
    <div class="stats-cards">
        <?php
        $totalUsers = $conn->query("SELECT COUNT(*) as count FROM users WHERE role='User'")->fetch_assoc()['count'];
        $activeUsers = $conn->query("SELECT COUNT(*) as count FROM users WHERE role='User' AND expiry >= CURDATE()")->fetch_assoc()['count'];
        $expiredUsers = $totalUsers - $activeUsers;
        ?>
        <div class="stat-card">
            <div class="stat-number"><?php echo $totalUsers; ?></div>
            <div class="stat-label">Total Merchants</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $activeUsers; ?></div>
            <div class="stat-label">Active Merchants</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $expiredUsers; ?></div>
            <div class="stat-label">Expired Merchants</div>
        </div>
    </div>

    <div class="merchant-table-section">
        <h3 class="section-title">All Merchants</h3>
        <div class="table-responsive">
            <table class="table table-modern" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag mr-2"></i>#</th>
                        <th><i class="fas fa-user mr-2"></i>User Details</th>
                        <th><i class="fas fa-tag mr-2"></i>User Type</th>
                        <th><i class="fas fa-store mr-2"></i>Shop Name</th>
                        <th><i class="fas fa-mobile-alt mr-2"></i>Contact</th>
                        <th><i class="fas fa-id-card mr-2"></i>PAN No</th>
                        <th><i class="fas fa-id-card mr-2"></i>Aadhaar No</th>
                        <th><i class="fas fa-map-marker-alt mr-2"></i>Address</th>
                        <th><i class="fas fa-calendar mr-2"></i>Expire Date</th>
                        <th><i class="fas fa-cogs mr-2"></i>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT `id`, `name`, `mobile`, `role`, `password`,`company`, `pin`, `pan`, `aadhaar`, `location`, `user_token`, `expiry`, `callback_url` FROM `users` WHERE role='User' ORDER BY id DESC";
                    $query_run = mysqli_query($conn, $query);

                    if ($query_run && mysqli_num_rows($query_run) > 0) {
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            $isExpired = (strtotime($row['expiry']) < time());
                            $expiryClass = $isExpired ? 'expiry-date expiry-soon' : 'expiry-date';
                            $userInitial = strtoupper(substr($row['name'], 0, 1));
                            
                            echo "<tr>";
                            echo "<td><strong>" . $counter++ . "</strong></td>";
                            
                            // User Details with Avatar
                            echo "<td>";
                            echo "<div class='user-info'>";
                            echo "<div class='user-avatar'>" . $userInitial . "</div>";
                            echo "<div class='user-details'>";
                            echo "<h6>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</h6>";
                            echo "<small>ID: " . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</small>";
                            echo "</div>";
                            echo "</div>";
                            echo "</td>";
                            
                            echo "<td><span class='user-type-badge'>" . htmlspecialchars($row['role'], ENT_QUOTES, 'UTF-8') . "</span></td>";
                            echo "<td><i class='fas fa-store mr-2 text-muted'></i>" . htmlspecialchars($row['company'], ENT_QUOTES, 'UTF-8') . "</td>";
                            
                            // Contact Info
                            echo "<td>";
                            echo "<div class='contact-info'>";
                            echo "<i class='fas fa-mobile-alt'></i>";
                            echo htmlspecialchars($row['mobile'], ENT_QUOTES, 'UTF-8');
                            echo "</div>";
                            echo "</td>";
                            
                            echo "<td><code>" . htmlspecialchars($row['pan'], ENT_QUOTES, 'UTF-8') . "</code></td>";
                            echo "<td><code>" . htmlspecialchars($row['aadhaar'], ENT_QUOTES, 'UTF-8') . "</code></td>";
                            echo "<td><i class='fas fa-map-marker-alt mr-2 text-muted'></i>" . htmlspecialchars($row['location'], ENT_QUOTES, 'UTF-8') . "</td>";
                            echo "<td><span class='" . $expiryClass . "'>" . date('d M Y', strtotime($row['expiry'])) . "</span></td>";
                            
                            // Action Buttons
                            echo "<td>";
                            echo "<div class='action-buttons'>";
                            echo "<form action='edituser.php' method='post' style='display: inline;'>";
                            echo "<input type='hidden' name='csrf_token' value='" . $_SESSION['csrf_token'] . "'>";
                            echo "<input type='hidden' name='mobileno' value='" . $row['mobile'] . "'>";
                            echo "<button class='btn-edit' name='edituser' type='submit'>";
                            echo "<i class='fas fa-edit mr-1'></i>Edit";
                            echo "</button>";
                            echo "</form>";
                            
                            echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST' style='display: inline;'>";
                            echo "<input type='hidden' name='csrf_token' value='" . $_SESSION['csrf_token'] . "'>";
                            echo "<input type='hidden' name='mobileno' value='" . $row['mobile'] . "'>";
                            echo "<button class='btn-delete' name='delete' type='submit' onclick='return confirm(\"Are you sure you want to delete this merchant?\")'>";
                            echo "<i class='fas fa-trash mr-1'></i>Delete";
                            echo "</button>";
                            echo "</form>";
                            echo "</div>";
                            echo "</td>";
                            
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>";
                        echo "<div class='empty-state'>";
                        echo "<i class='fas fa-users'></i>";
                        echo "<h4>No Merchants Found</h4>";
                        echo "<p>There are no merchants registered in the system yet.</p>";
                        echo "</div>";
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
$(function() {
    $('#example-table').DataTable({
        pageLength: 10,
        responsive: true,
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
            },
            emptyTable: "No merchants found in the system",
            zeroRecords: "No matching merchants found"
        },
        columnDefs: [
            { orderable: false, targets: [9] } // Disable sorting on Action column
        ]
    });
    
    // Add smooth animations
    $('.stat-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
        $(this).addClass('animate__animated animate__fadeInUp');
    });
});

// Enhanced delete confirmation
function confirmDelete(merchantName) {
    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete merchant: ${merchantName}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff416c',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            return true;
        }
        return false;
    });
}
</script>

</body>
</html>