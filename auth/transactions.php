<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - Payment Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }
        
        .transactions-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Page Header */
        .page-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6b7280;
            font-size: 0.95rem;
        }
        
        .breadcrumb a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb a:hover {
            color: #764ba2;
        }
        
        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid #667eea;
            color: #667eea;
        }
        
        .btn-outline:hover {
            background: #667eea;
            color: white;
        }
        
        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        /* Table Container */
        .table-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .table-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .table-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .table-filters {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .filter-input {
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            background: white;
        }
        
        .filter-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        /* Custom DataTable Styling */
        .dataTables_wrapper {
            font-family: 'Inter', sans-serif;
        }
        
        .dataTables_length,
        .dataTables_filter,
        .dataTables_info,
        .dataTables_paginate {
            margin: 1rem 0;
        }
        
        .dataTables_length select,
        .dataTables_filter input {
            padding: 0.5rem 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: border-color 0.3s ease;
        }
        
        .dataTables_filter input:focus,
        .dataTables_length select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .dataTables_paginate .paginate_button {
            padding: 0.5rem 0.75rem;
            margin: 0 0.25rem;
            border-radius: 8px;
            border: none;
            background: #f3f4f6;
            color: #374151;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dataTables_paginate .paginate_button:hover {
            background: #667eea;
            color: white;
        }
        
        .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        /* Table Styling */
        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .modern-table thead {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
        
        .modern-table thead th {
            padding: 1.25rem 1rem;
            text-align: left;
            font-weight: 600;
            color: white;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: none;
        }
        
        .modern-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .modern-table tbody tr:hover {
            background: #f8fafc;
            transform: scale(1.01);
        }
        
        .modern-table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border: none;
            font-size: 0.875rem;
        }
        
        .modern-table tbody tr:last-child {
            border-bottom: none;
        }
        
        /* Status Badges */
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: none;
            cursor: default;
        }
        
        .badge-success {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }
        
        .badge-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }
        
        .badge-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }
        
        .badge-info {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .transactions-container {
                padding: 1rem;
            }
            
            .page-header {
                padding: 1.5rem;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .table-container {
                padding: 1rem;
                overflow-x: auto;
            }
            
            .modern-table {
                min-width: 800px;
            }
            
            .table-filters {
                flex-direction: column;
                width: 100%;
            }
            
            .filter-input {
                width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .stats-row {
                grid-template-columns: 1fr;
            }
            
            .header-actions {
                flex-direction: column;
                width: 100%;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f4f6;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    <div class="transactions-container">
        <!-- Page Header -->
        <div class="page-header fade-in-up">
            <div class="header-content">
                <div>
                    <h1 class="page-title">Transaction History</h1>
                    <div class="breadcrumb">
                        <a href="dashboard.php"><i class="fas fa-home"></i></a>
                        <span>/</span>
                        <span>Transactions</span>
                    </div>
                </div>
                <div class="header-actions">
                    <button class="btn btn-outline" onclick="exportTransactions()">
                        <i class="fas fa-download"></i>
                        Export
                    </button>
                    <button class="btn btn-primary" onclick="refreshData()">
                        <i class="fas fa-sync-alt"></i>
                        Refresh
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="stats-row">
            <?php
            // Calculate stats
            $token = $userdata['user_token'];
            $role = $userdata['role'];
            
            if($role == 'User') {
                $stats_query = "SELECT 
                    COUNT(*) as total_transactions,
                    SUM(CASE WHEN status = 'SUCCESS' THEN 1 ELSE 0 END) as success_count,
                    SUM(CASE WHEN status = 'SUCCESS' THEN amount ELSE 0 END) as success_amount,
                    SUM(CASE WHEN status != 'SUCCESS' THEN 1 ELSE 0 END) as pending_count
                    FROM orders WHERE user_token = '$token'";
            } else {
                $stats_query = "SELECT 
                    COUNT(*) as total_transactions,
                    SUM(CASE WHEN status = 'SUCCESS' THEN 1 ELSE 0 END) as success_count,
                    SUM(CASE WHEN status = 'SUCCESS' THEN amount ELSE 0 END) as success_amount,
                    SUM(CASE WHEN status != 'SUCCESS' THEN 1 ELSE 0 END) as pending_count
                    FROM orders";
            }
            
            $stats_result = mysqli_query($conn, $stats_query);
            $stats = mysqli_fetch_assoc($stats_result);
            ?>
            
            <div class="stat-card fade-in-up">
                <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                    <i class="fas fa-list"></i>
                </div>
                <div class="stat-value"><?php echo number_format($stats['total_transactions']); ?></div>
                <div class="stat-label">Total Transactions</div>
            </div>
            
            <div class="stat-card fade-in-up">
                <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-value"><?php echo number_format($stats['success_count']); ?></div>
                <div class="stat-label">Successful</div>
            </div>
            
            <div class="stat-card fade-in-up">
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                    <i class="fas fa-rupee-sign"></i>
                </div>
                <div class="stat-value">₹<?php echo number_format($stats['success_amount'], 2); ?></div>
                <div class="stat-label">Total Amount</div>
            </div>
            
            <div class="stat-card fade-in-up">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-value"><?php echo number_format($stats['pending_count']); ?></div>
                <div class="stat-label">Pending</div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container fade-in-up">
            <div class="table-header">
                <h2 class="table-title">All Transactions</h2>
                <div class="table-filters">
                    <select class="filter-input" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="SUCCESS">Success</option>
                        <option value="PENDING">Pending</option>
                        <option value="FAILED">Failed</option>
                    </select>
                    <input type="date" class="filter-input" id="dateFilter" placeholder="Filter by date">
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="modern-table" id="transactionsTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mobile</th>
                            <th>Date Time</th>
                            <th>Gateway</th>
                            <th>Gateway Txn</th>
                            <th>Bank RRN</th>
                            <th>Order ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($userdata['role'] == 'User'){
                            $token = $userdata['user_token'];
                            $query = "SELECT `id`, `create_date`, `gateway_txn`, `customer_mobile`, `method`, `utr`, `byteTransactionId`, `order_id`, `amount`, `status` FROM `orders` WHERE user_token = '$token' ORDER BY `create_date` DESC";
                        } else {
                            $query = "SELECT `id`, `create_date`, `gateway_txn`, `customer_mobile`, `method`, `utr`, `byteTransactionId`, `order_id`, `amount`, `status` FROM `orders` ORDER BY `create_date` DESC";
                        }
                        
                        $query_run = mysqli_query($conn, $query);
                        
                        if ($query_run) {
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                echo "<tr>";
                                echo "<td><strong>" . $counter . "</strong></td>";
                                echo "<td><i class='fas fa-mobile-alt' style='color: #667eea; margin-right: 0.5rem;'></i>" . htmlspecialchars($row['customer_mobile'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td><i class='fas fa-calendar' style='color: #6b7280; margin-right: 0.5rem;'></i>" . date('M d, Y H:i', strtotime($row['create_date'])) . "</td>";
                                echo "<td><span style='background: #f3f4f6; padding: 0.25rem 0.75rem; border-radius: 6px; font-size: 0.75rem; font-weight: 500;'>" . htmlspecialchars($row['method'], ENT_QUOTES, 'UTF-8') . "</span></td>";
                                echo "<td><code style='background: #f1f5f9; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem;'>" . htmlspecialchars($row['gateway_txn'], ENT_QUOTES, 'UTF-8') . "</code></td>";
                                echo "<td><code style='background: #f1f5f9; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem;'>" . htmlspecialchars($row['utr'], ENT_QUOTES, 'UTF-8') . "</code></td>";
                                echo "<td><strong>" . htmlspecialchars($row['order_id'], ENT_QUOTES, 'UTF-8') . "</strong></td>";
                                echo "<td><strong style='color: #059669; font-size: 1rem;'>₹" . number_format($row['amount'], 2) . "</strong></td>";
                                
                                if($row['status'] == "SUCCESS"){
                                    $sts = 'Success';
                                    $cls = "status-badge badge-success";
                                } elseif($row['status'] == "FAILED") {
                                    $sts = 'Failed';
                                    $cls = "status-badge badge-danger";
                                } else {
                                    $sts = 'Pending';
                                    $cls = "status-badge badge-warning";
                                }
                                
                                echo "<td><span class='$cls'>" . $sts . "</span></td>";
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "<tr><td colspan='9' style='text-align: center; padding: 2rem; color: #6b7280;'>No transactions found</td></tr>";
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
    <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script src="assets/js/app.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            // Hide loading overlay
            setTimeout(() => {
                document.getElementById('loadingOverlay').classList.remove('active');
            }, 500);

            // Initialize DataTable with custom styling
            var table = $('#transactionsTable').DataTable({
                pageLength: 25,
                responsive: true,
                order: [[0, 'desc']],
                language: {
                    search: "Search transactions:",
                    lengthMenu: "Show _MENU_ transactions per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ transactions",
                    infoEmpty: "No transactions available",
                    infoFiltered: "(filtered from _MAX_ total transactions)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                },
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                     '<"row"<"col-sm-12"tr>>' +
                     '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                drawCallback: function() {
                    // Add animation to new rows
                    $('#transactionsTable tbody tr').each(function(index) {
                        $(this).css('animation-delay', (index * 0.05) + 's');
                        $(this).addClass('fade-in-up');
                    });
                }
            });

            // Custom filters
            $('#statusFilter').on('change', function() {
                var status = $(this).val();
                if (status === '') {
                    table.column(8).search('').draw();
                } else {
                    table.column(8).search(status).draw();
                }
            });

            $('#dateFilter').on('change', function() {
                var date = $(this).val();
                if (date === '') {
                    table.column(2).search('').draw();
                } else {
                    table.column(2).search(date).draw();
                }
            });

            // Add hover effects to table rows
            $('#transactionsTable tbody').on('mouseenter', 'tr', function() {
                $(this).addClass('table-hover-effect');
            }).on('mouseleave', 'tr', function() {
                $(this).removeClass('table-hover-effect');
            });
        });

        // Export functionality
        function exportTransactions() {
            // Show loading
            document.getElementById('loadingOverlay').classList.add('active');
            
            // Simulate export process
            setTimeout(() => {
                // Create CSV content
                var csv = 'ID,Mobile,Date Time,Gateway,Gateway Txn,Bank RRN,Order ID,Amount,Status\n';
                
                $('#transactionsTable tbody tr').each(function() {
                    var row = [];
                    $(this).find('td').each(function() {
                        var text = $(this).text().replace(/,/g, ';');
                        row.push('"' + text + '"');
                    });
                    csv += row.join(',') + '\n';
                });
                
                // Download CSV
                var blob = new Blob([csv], { type: 'text/csv' });
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = 'transactions_' + new Date().toISOString().split('T')[0] + '.csv';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
                
                // Hide loading
                document.getElementById('loadingOverlay').classList.remove('active');
                
                // Show success message
                showNotification('Transactions exported successfully!', 'success');
            }, 1000);
        }

        // Refresh functionality
        function refreshData() {
            document.getElementById('loadingOverlay').classList.add('active');
            setTimeout(() => {
                location.reload();
            }, 500);
        }

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
                <span>${message}</span>
            `;
            
            // Add notification styles
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? '#10b981' : '#3b82f6'};
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                z-index: 10000;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                animation: slideInRight 0.3s ease;
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Add CSS for notifications
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
            .table-hover-effect {
                background: linear-gradient(135deg, #f8fafc, #f1f5f9) !important;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
            }
        `;
        document.head.appendChild(style);

        // Add loading animation on page load
        window.addEventListener('load', function() {
            document.body.style.opacity = '1';
        });

        document.body.style.opacity = '0';
        document.body.style.transition = 'opacity 0.3s ease';
    </script>
</body>
</html>