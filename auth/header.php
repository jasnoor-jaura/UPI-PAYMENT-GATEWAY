<?php
session_start();
include "config.php";

// error_reporting(E_ALL);
// ini_set("display_errors",true);
// error_reporting(0);

if (isset($_SESSION['username'])) {
    $mobile = $_SESSION['username'];
    $user = "SELECT * FROM users WHERE mobile = '$mobile'";
    $uu = mysqli_query($conn, $user);
    $userdata = mysqli_fetch_array($uu);
    
    $tdate = date("Y-m-d");
    $todayallpayment = $conn->query("SELECT COUNT(`id`) as amt FROM `orders` WHERE `user_id` = '{$userdata["id"]}' AND `status` = 'SUCCESS' AND DATE(`create_date`) = '$tdate' ")->fetch_assoc();
    $todaysuccesspayment = $conn->query("SELECT SUM(`amount`) as amt FROM `orders` WHERE `user_id` = '{$userdata["id"]}' AND `status` = 'SUCCESS' AND DATE(`create_date`) = '$tdate' ")->fetch_assoc();
    $todaypendingpayment = $conn->query("SELECT SUM(`amount`) as amt FROM `orders` WHERE `user_id` = '{$userdata["id"]}' AND `status` = 'PENDING' AND DATE(`create_date`) = '$tdate' ")->fetch_assoc();
    $todayfail = $conn->query("SELECT SUM(`amount`) as amt FROM `orders` WHERE `user_id` = '{$userdata["id"]}' AND `status` = 'FAILURE' AND DATE(`create_date`) = '$tdate' ")->fetch_assoc();
    
    $fixednavbar = $userdata["fixed_navbar"];
    $fixedlayout = $userdata["fixed_layout"];
    $fixedsidebar = $userdata["sidebar_layout"];
    $boxstyle = $userdata["box_style"];
    $themecolor = $userdata["theme_color"];
    
    $class = '';
    if($fixednavbar == 1){
        $class .= 'fixed-navbar';
    }
    if($fixedlayout == 1){
        $class .= ' fixed-layout';
    }
    if($fixedsidebar == 1){
        $class .= ' sidebar-mini';
    }
    if($boxstyle == 1){
        $class .= ' boxed-layout';
    }
    
    $server = $_SERVER["SERVER_NAME"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_settings['brand_name'] ?? ''; ?> | Dashboard</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1f2937;
            line-height: 1.6;
        }
        
        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        .loading-overlay.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loading-spinner {
            display: flex;
            gap: 0.5rem;
        }
        
        .loading-dot {
            width: 12px;
            height: 12px;
            background: white;
            border-radius: 50%;
            animation: loadingPulse 1.5s ease-in-out infinite;
        }
        
        .loading-dot:nth-child(1) { animation-delay: 0s; }
        .loading-dot:nth-child(2) { animation-delay: 0.5s; }
        .loading-dot:nth-child(3) { animation-delay: 1s; }
        
        @keyframes loadingPulse {
            0%, 100% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 1; }
        }
        
        /* Layout */
        .app-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid #e5e7eb;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100%;
            padding: 0 2rem;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: #1f2937;
        }
        
        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .brand-text {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .sidebar-toggle {
            background: none;
            border: none;
            padding: 0.75rem;
            border-radius: 12px;
            cursor: pointer;
            color: #6b7280;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar-toggle:hover {
            background: #f3f4f6;
            color: #667eea;
        }
        
        .search-container {
            position: relative;
            margin-left: 1rem;
        }
        
        .search-input {
            width: 300px;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            background: white;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .header-action {
            position: relative;
            background: none;
            border: none;
            padding: 0.75rem;
            border-radius: 12px;
            cursor: pointer;
            color: #6b7280;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .header-action:hover {
            background: #f3f4f6;
            color: #667eea;
        }
        
        .notification-badge {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: #ef4444;
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #1f2937;
        }
        
        .user-menu:hover {
            background: #f3f4f6;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 0.875rem;
        }
        
        .user-role {
            font-size: 0.75rem;
            color: #6b7280;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            width: 280px;
            height: calc(100vh - 70px);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-right: 1px solid #e5e7eb;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 999;
        }
        
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        
        .sidebar-content {
            padding: 2rem 0;
        }
        
        .admin-block {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0 2rem 2rem;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 2rem;
        }
        
        .admin-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .admin-info h4 {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }
        
        .admin-info small {
            color: #6b7280;
        }
        
        .nav-section {
            margin-bottom: 2rem;
        }
        
        .nav-heading {
            padding: 0 2rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #9ca3af;
        }
        
        .nav-item {
            margin-bottom: 0.25rem;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 2rem;
            color: #6b7280;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover,
        .nav-link.active {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            color: #667eea;
        }
        
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
        
        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .nav-text {
            font-weight: 500;
        }
        
        /* Dropdown Menus */
        .dropdown {
            position: relative;
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid #e5e7eb;
            min-width: 300px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1001;
        }
        
        .dropdown:hover .dropdown-menu,
        .dropdown.active .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .dropdown-header h4 {
            font-weight: 600;
            color: #1f2937;
        }
        
        .dropdown-header a {
            color: #667eea;
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .dropdown-list {
            max-height: 300px;
            overflow-y: auto;
        }
        
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            text-decoration: none;
            color: #1f2937;
            transition: background 0.3s ease;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .dropdown-item:hover {
            background: #f8fafc;
        }
        
        .dropdown-item:last-child {
            border-bottom: none;
        }
        
        .dropdown-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .dropdown-content h5 {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .dropdown-content p {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .dropdown-time {
            font-size: 0.75rem;
            color: #9ca3af;
            margin-left: auto;
        }
        
        /* User Dropdown */
        .user-dropdown-menu {
            min-width: 200px;
        }
        
        .user-dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            color: #1f2937;
            transition: background 0.3s ease;
        }
        
        .user-dropdown-item:hover {
            background: #f8fafc;
        }
        
        .user-dropdown-divider {
            height: 1px;
            background: #e5e7eb;
            margin: 0.5rem 0;
        }
        
        /* Theme Config Panel */
        .theme-config {
            position: fixed;
            top: 50%;
            right: -350px;
            transform: translateY(-50%);
            width: 350px;
            background: white;
            border-radius: 20px 0 0 20px;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            z-index: 1002;
        }
        
        .theme-config.active {
            right: 0;
        }
        
        .theme-config-toggle {
            position: absolute;
            left: -50px;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 12px 0 0 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            font-size: 1.2rem;
        }
        
        .theme-config-content {
            padding: 2rem;
            max-height: 80vh;
            overflow-y: auto;
        }
        
        .config-section {
            margin-bottom: 2rem;
        }
        
        .config-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        .config-options {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .config-option {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .config-checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .config-checkbox:checked {
            background: #667eea;
            border-color: #667eea;
        }
        
        .color-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        
        .color-option {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }
        
        .color-preview {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            border: 3px solid transparent;
            transition: all 0.3s ease;
        }
        
        .color-option input:checked + .color-preview {
            border-color: #667eea;
            transform: scale(1.1);
        }
        
        /* Content Area */
        .content-wrapper {
            margin-left: 280px;
            margin-top: 70px;
            padding: 2rem;
            min-height: calc(100vh - 70px);
            transition: margin-left 0.3s ease;
        }
        
        .sidebar.collapsed + .content-wrapper {
            margin-left: 0;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .header-content {
                padding: 0 1rem;
            }
            
            .search-container {
                display: none;
            }
            
            .sidebar {
                width: 100%;
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .content-wrapper {
                margin-left: 0;
                padding: 1rem;
            }
            
            .dropdown-menu {
                min-width: 250px;
            }
            
            .theme-config {
                width: 100%;
                right: -100%;
                border-radius: 0;
            }
            
            .theme-config-toggle {
                left: -40px;
                width: 40px;
                height: 40px;
            }
        }
        
        /* Utility Classes */
        .d-none { display: none; }
        .text-center { text-align: center; }
        .font-strong { font-weight: 600; }
        
        /* Status Classes */
        .Success { background: #10b981; color: white; }
        .Failed { background: #ef4444; color: white; }
        .Pending { background: #f59e0b; color: white; }
        
        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>
</head>

<body class="<?= $class ?>">
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner">
            <div class="loading-dot"></div>
            <div class="loading-dot"></div>
            <div class="loading-dot"></div>
        </div>
    </div>

    <div class="app-container">
        <!-- Header -->
        <header class="header">
            <div class="header-content">
                <div class="header-left">
                    <button class="sidebar-toggle" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <a href="dashboard" class="brand">
                        <div class="brand-icon">
                            <?php echo substr($site_settings['brand_name'] ?? 'AC', 0, 2); ?>
                        </div>
                        <span class="brand-text"><?php echo $site_settings['brand_name'] ?? 'Dashboard'; ?></span>
                    </a>
                    
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Search here...">
                    </div>
                </div>
                
                <div class="header-right">
                    <!-- Messages Dropdown -->
                    <div class="dropdown">
                        <button class="header-action">
                            <i class="fas fa-envelope"></i>
                            <span class="notification-badge">9</span>
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-header">
                                <h4>Messages</h4>
                                <a href="#">View All</a>
                            </div>
                            <div class="dropdown-list">
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="dropdown-content">
                                        <h5>Jeanne Gonzalez</h5>
                                        <p>Your proposal interested me.</p>
                                    </div>
                                    <span class="dropdown-time">Just now</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="dropdown-content">
                                        <h5>Becky Brooks</h5>
                                        <p>Lorem Ipsum is simply.</p>
                                    </div>
                                    <span class="dropdown-time">18 mins</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notifications Dropdown -->
                    <div class="dropdown">
                        <button class="header-action">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">5</span>
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-header">
                                <h4>Notifications</h4>
                                <a href="#">View All</a>
                            </div>
                            <div class="dropdown-list">
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-avatar" style="background: #10b981;">
                                        <i class="fas fa-check" style="color: white;"></i>
                                    </div>
                                    <div class="dropdown-content">
                                        <h5>4 task compiled</h5>
                                        <p>Your tasks have been completed</p>
                                    </div>
                                    <span class="dropdown-time">22 mins</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-avatar" style="background: #3b82f6;">
                                        <i class="fas fa-shopping-basket" style="color: white;"></i>
                                    </div>
                                    <div class="dropdown-content">
                                        <h5>12 new orders</h5>
                                        <p>You have new orders to process</p>
                                    </div>
                                    <span class="dropdown-time">40 mins</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="dropdown">
                        <div class="user-menu">
                            <div class="user-avatar">
                                <?php echo substr($userdata['name'], 0, 2); ?>
                            </div>
                            <div class="user-info">
                                <span class="user-name"><?php echo $userdata['name']; ?></span>
                                <span class="user-role"><?php echo $userdata['role']; ?></span>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="dropdown-menu user-dropdown-menu">
                            <a href="profile" class="user-dropdown-item">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </a>
                            <a href="#" class="user-dropdown-item">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#" class="user-dropdown-item">
                                <i class="fas fa-question-circle"></i>
                                <span>Support</span>
                            </a>
                            <div class="user-dropdown-divider"></div>
                            <a href="logout" class="user-dropdown-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-content">
                <div class="admin-block">
                    <div class="admin-avatar">
                        <?php echo substr($userdata['name'], 0, 2); ?>
                    </div>
                    <div class="admin-info">
                        <h4><?php echo $userdata['name']; ?></h4>
                        <small>API Partner</small>
                    </div>
                </div>
                
                <div class="nav-section">
                    <div class="nav-item">
                        <a href="dashboard" class="nav-link active">
                            <div class="nav-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </div>
                </div>
                
                <?php if($userdata['role'] == 'Admin'){ ?>
                <div class="nav-section">
                    <div class="nav-heading">Admin Management</div>
                    
                    <div class="nav-item">
                        <a href="sitesetting" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <span class="nav-text">Website Manage</span>
                        </a>
                    </div>
                    
                    <!--<div class="nav-item">-->
                    <!--    <a href="add_popupalert" class="nav-link">-->
                    <!--        <div class="nav-icon">-->
                    <!--            <i class="fas fa-sliders-h"></i>-->
                    <!--        </div>-->
                    <!--        <span class="nav-text">Slider Manage</span>-->
                    <!--    </a>-->
                    <!--</div>-->
                    
                    <!--<div class="nav-item">-->
                    <!--    <a href="add_api" class="nav-link">-->
                    <!--        <div class="nav-icon">-->
                    <!--            <i class="fas fa-envelope"></i>-->
                    <!--        </div>-->
                    <!--        <span class="nav-text">SMTP / WhatsApp</span>-->
                    <!--    </a>-->
                    <!--</div>-->
                    
                    <div class="nav-item">
                        <a href="manage_subscription" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-store"></i>
                            </div>
                            <span class="nav-text">Manage Subscription</span>
                        </a>
                    </div>
                    
                    <div class="nav-item">
                        <a href="add_merchant" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <span class="nav-text">Create New User</span>
                        </a>
                    </div>
                    
                    <div class="nav-item">
                        <a href="merchant_list" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="nav-text">API User List</span>
                        </a>
                    </div>
                </div>
                <?php } ?>
                
                <div class="nav-section">
                    <div class="nav-heading">Merchant Setting</div>
                    
                    <div class="nav-item">
                        <a href="connect_merchant" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-link"></i>
                            </div>
                            <span class="nav-text">Connect Merchant</span>
                        </a>
                    </div>
                    
                    <div class="nav-item">
                        <a href="payment_link" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-share"></i>
                            </div>
                            <span class="nav-text">Payment Link</span>
                        </a>
                    </div>
                    
                    <div class="nav-item">
                        <a href="transactions" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-list"></i>
                            </div>
                            <span class="nav-text">Transactions</span>
                        </a>
                    </div>
                    
                    <div class="nav-item">
                        <a href="subscription" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <span class="nav-text">Subscription</span>
                        </a>
                    </div>
                </div>
                
                <div class="nav-section">
                    <div class="nav-heading">Account Setting</div>
                    
                    <div class="nav-item">
                        <a href="profile" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <span class="nav-text">Manage Profile</span>
                        </a>
                    </div>
                    
                    <div class="nav-item">
                        <a href="change_password" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <span class="nav-text">Change Password</span>
                        </a>
                    </div>
                    
                    <div class="nav-item">
                        <a href="apidetails" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <span class="nav-text">API Details</span>
                        </a>
                    </div>
                    
                    <div class="nav-item">
                        <a href="simple_code" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-download"></i>
                            </div>
                            <span class="nav-text">Simple Code</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Theme Config Panel -->
        <div class="theme-config" id="themeConfig">
            <!--<div class="theme-config-toggle" onclick="toggleThemeConfig()">-->
            <!--    <i class="fas fa-cog"></i>-->
            <!--</div>-->
            <div class="theme-config-content">
                <h3 class="text-center" style="margin-bottom: 2rem;">Settings</h3>
                
                <div class="config-section">
                    <div class="config-title">Layout Options</div>
                    <div class="config-options">
                        <label class="config-option">
                            <input type="checkbox" class="config-checkbox" id="fixedNavbar" <?php if($fixednavbar == 1){ echo "checked"; } ?>>
                            <span>Fixed navbar</span>
                        </label>
                        <label class="config-option">
                            <input type="checkbox" class="config-checkbox" id="fixedLayout" <?php if($fixedlayout == 1){ echo "checked"; } ?>>
                            <span>Fixed layout</span>
                        </label>
                        <label class="config-option">
                            <input type="checkbox" class="config-checkbox" id="collapseSidebar" <?php if($fixedsidebar == 1){ echo "checked"; } ?>>
                            <span>Collapse sidebar</span>
                        </label>
                    </div>
                </div>
                
                <div class="config-section">
                    <div class="config-title">Layout Style</div>
                    <div class="config-options">
                        <label class="config-option">
                            <input type="radio" name="layout-style" value="0" <?php if($boxstyle == '' || $boxstyle == 0){ echo "checked"; } ?>>
                            <span>Fluid</span>
                        </label>
                        <label class="config-option">
                            <input type="radio" name="layout-style" value="1" <?php if($boxstyle == 1){ echo "checked"; } ?>>
                            <span>Boxed</span>
                        </label>
                    </div>
                </div>
                
                <div class="config-section">
                    <div class="config-title">Theme Colors</div>
                    <div class="color-options">
                        <label class="color-option">
                            <input type="radio" name="theme-color" value="default" <?php if($themecolor == 'default'){ echo "checked"; } ?> style="display: none;">
                            <div class="color-preview" style="background: linear-gradient(135deg, #667eea, #764ba2);"></div>
                            <span>Default</span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="theme-color" value="blue" <?php if($themecolor == 'blue'){ echo "checked"; } ?> style="display: none;">
                            <div class="color-preview" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);"></div>
                            <span>Blue</span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="theme-color" value="green" <?php if($themecolor == 'green'){ echo "checked"; } ?> style="display: none;">
                            <div class="color-preview" style="background: linear-gradient(135deg, #10b981, #059669);"></div>
                            <span>Green</span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="theme-color" value="purple" <?php if($themecolor == 'purple'){ echo "checked"; } ?> style="display: none;">
                            <div class="color-preview" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);"></div>
                            <span>Purple</span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="theme-color" value="orange" <?php if($themecolor == 'orange'){ echo "checked"; } ?> style="display: none;">
                            <div class="color-preview" style="background: linear-gradient(135deg, #f59e0b, #d97706);"></div>
                            <span>Orange</span>
                        </label>
                        <label class="color-option">
                            <input type="radio" name="theme-color" value="pink" <?php if($themecolor == 'pink'){ echo "checked"; } ?> style="display: none;">
                            <div class="color-preview" style="background: linear-gradient(135deg, #ec4899, #db2777);"></div>
                            <span>Pink</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-wrapper">
            <!-- Content will be loaded here -->

<script>
// Hide loading overlay when page loads
window.addEventListener('load', function() {
    setTimeout(() => {
        document.getElementById('loadingOverlay').classList.add('hidden');
    }, 500);
});

// Sidebar toggle
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
}

// Theme config toggle
function toggleThemeConfig() {
    const themeConfig = document.getElementById('themeConfig');
    themeConfig.classList.toggle('active');
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove('active');
        }
    });
});

// Mobile sidebar handling
if (window.innerWidth <= 768) {
    document.getElementById('sidebar').classList.add('collapsed');
}

window.addEventListener('resize', function() {
    if (window.innerWidth <= 768) {
        document.getElementById('sidebar').classList.add('collapsed');
    } else {
        document.getElementById('sidebar').classList.remove('collapsed');
    }
});

// Search functionality
document.querySelector('.search-input').addEventListener('input', function(e) {
    // Add your search logic here
    console.log('Searching for:', e.target.value);
});

// Active nav link highlighting
const currentPage = window.location.pathname.split('/').pop();
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
    link.classList.remove('active');
    if (link.getAttribute('href') === currentPage) {
        link.classList.add('active');
    }
});

// Theme configuration handlers
document.getElementById('fixedNavbar').addEventListener('change', function() {
    // Handle fixed navbar toggle
    console.log('Fixed navbar:', this.checked);
});

document.getElementById('fixedLayout').addEventListener('change', function() {
    // Handle fixed layout toggle
    console.log('Fixed layout:', this.checked);
});

document.getElementById('collapseSidebar').addEventListener('change', function() {
    // Handle sidebar collapse toggle
    console.log('Collapse sidebar:', this.checked);
});

// Theme color handlers
document.querySelectorAll('input[name="theme-color"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.checked) {
            console.log('Theme color changed to:', this.value);
            // Apply theme color changes here
        }
    });
});

// Layout style handlers
document.querySelectorAll('input[name="layout-style"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.checked) {
            console.log('Layout style changed to:', this.value);
            // Apply layout style changes here
        }
    });
});
</script>

<?php
} else {
    header("location:index");
}
?>