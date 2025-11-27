
<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_settings['brand_name']; ?> - UPI Payment Solutions</title>
    <meta name='robots' content='max-image-preview:large' />
    <link rel="icon" href="<?php echo $site_settings['logo_url']; ?>" sizes="32x32" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #1f2937;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        /* Header Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: #1f2937;
        }
        
        .logo-icon {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        .logo-text {
            font-size: 1.25rem;
            font-weight: 700;
        }
        
        .nav-desktop {
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        
        .nav-link {
            color: #4b5563;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: #3b82f6;
        }
        
        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-ghost {
            color: #4b5563;
            background: transparent;
        }
        
        .btn-ghost:hover {
            background: #f3f4f6;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            transform: translateY(-1px);
        }
        
        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        .mobile-menu {
            display: none;
            padding: 1rem 0;
            border-top: 1px solid #e5e7eb;
        }
        
        .mobile-nav {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        /* Hero Section */
        .hero {
            padding: 8rem 0 4rem;
            background: linear-gradient(135deg, #dbeafe 0%, #ffffff 50%, #f3e8ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        
        .hero-content {
            space-y: 2rem;
        }
        
        .hero-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1rem;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            color: #6b7280;
            margin-bottom: 2rem;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
        }
        
        .hero-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            text-align: center;
        }
        
        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
        }
        
        .stat-label {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .hero-image {
            position: relative;
        }
        
        .hero-image img {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            display: block;
        }
        
        .floating-card {
            position: absolute;
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            animation: float 3s ease-in-out infinite;
        }
        
        .floating-card-1 {
            top: 2.5rem;
            left: -1rem;
        }
        
        .floating-card-2 {
            bottom: 2.5rem;
            right: -1rem;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* Section Styles */
        .section {
            padding: 5rem 0;
        }
        
        .section-gray {
            background: #f9fafb;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        
        .section-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        .section-subtitle {
            font-size: 1.125rem;
            color: #6b7280;
            max-width: 48rem;
            margin: 0 auto;
        }
        
        /* Card Styles */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .card:hover .card-icon {
            transform: scale(1.1);
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        
        .card-subtitle {
            color: #3b82f6;
            font-weight: 500;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .card-description {
            color: #6b7280;
            line-height: 1.6;
            text-align: center;
        }
        
        /* Gradient Cards */
        .gradient-card {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
        }
        
        .gradient-card .card-description {
            color: #dbeafe;
        }
        
        /* About Section */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }
        
        .about-image {
            position: relative;
        }
        
        .about-image img {
            width: 100%;
            border-radius: 1rem;
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.1);
        }
        
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 4rem;
            height: 4rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b82f6;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .play-button:hover {
            background: white;
            transform: translate(-50%, -50%) scale(1.1);
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .stat-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .stat-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        .stat-content .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
        }
        
        .stat-content .stat-label {
            color: #6b7280;
        }
        
        /* Process Section */
        .process-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            position: relative;
        }
        
        .process-card {
            position: relative;
            text-align: center;
        }
        
        .process-number {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 2rem;
            height: 2rem;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.875rem;
            font-weight: 600;
        }
        
        .process-arrow {
            position: absolute;
            top: 50%;
            right: -1rem;
            transform: translateY(-50%);
            color: #93c5fd;
            font-size: 2rem;
        }
        
        .process-card:last-child .process-arrow {
            display: none;
        }
        
        /* Partners Section */
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 2rem;
            align-items: center;
        }
        
        .partner-logo {
            height: 2rem;
            opacity: 0.6;
            transition: opacity 0.3s ease;
            filter: grayscale(100%);
        }
        
        .partner-logo:hover {
            opacity: 1;
            filter: grayscale(0%);
        }
        
        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 4rem 0 2rem;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h4 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-link {
            width: 2.5rem;
            height: 2.5rem;
            background: #374151;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        }
        
        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 2rem;
            text-align: center;
            color: #9ca3af;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-desktop, .auth-buttons {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .mobile-menu.active {
                display: block;
            }
            
            .hero-grid, .about-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .hero-stats {
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }
            
            .card-grid {
                grid-template-columns: 1fr;
            }
            
            .process-grid {
                grid-template-columns: 1fr;
            }
            
            .process-arrow {
                display: none;
            }
            
            .partners-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 0.5rem;
            }
            
            .hero {
                padding: 6rem 0 2rem;
            }
            
            .section {
                padding: 3rem 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .partners-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <span class="logo-text"><?php echo $site_settings['brand_name']; ?></span>
                </a>

                <nav class="nav-desktop">
                    <a href="/" class="nav-link">Home</a>
                    <a href="/panel" class="nav-link">Panel</a>
                    <a href="/about" class="nav-link">About Us</a>
                </nav>

                <div class="auth-buttons">
                    <a href="auth/index" class="btn btn-ghost">Login</a>
                    <a href="Register" class="btn btn-primary">Sign Up</a>
                </div>

                <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div class="mobile-menu" id="mobileMenu">
                <nav class="mobile-nav">
                    <a href="/" class="nav-link">Home</a>
                    <a href="/panel" class="nav-link">Panel</a>
                    <a href="/about" class="nav-link">About Us</a>
                    <div style="padding-top: 1rem;">
                        <a href="auth/index" class="btn btn-ghost" style="width: 100%; margin-bottom: 0.5rem;">Login</a>
                        <a href="Register" class="btn btn-primary" style="width: 100%;">Sign Up</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-bolt" style="margin-right: 0.5rem;"></i>
                        <?php echo $site_settings['brand_name']; ?>. For. Every #Indian
                    </div>
                    <h1 class="hero-title">
                        The Smart Way for <span class="gradient-text">Online Payment</span> Solution.
                    </h1>
                    <p class="hero-subtitle">
                        Collect UPI Payments Easy & Fastest Solutions || Payment Link || UPI QR
                    </p>
                    <div class="hero-buttons">
                        <a href="Register" class="btn btn-primary btn-lg">
                            Register Now
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="auth/index" class="btn btn-ghost btn-lg">Log In</a>
                    </div>
                    <div class="hero-stats">
                        <div>
                            <div class="stat-number">15k+</div>
                            <div class="stat-label">Happy Customers</div>
                        </div>
                        <div>
                            <div class="stat-number">260+</div>
                            <div class="stat-label">Live API Merchants</div>
                        </div>
                        <div>
                            <div class="stat-number">99.9%</div>
                            <div class="stat-label">Uptime</div>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="/placeholder.svg?height=600&width=400" alt="UPI Payment Interface">
                    <div class="floating-card floating-card-1">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-shield-alt" style="color: #10b981; font-size: 1.5rem;"></i>
                            <div>
                                <div style="font-weight: 600; font-size: 0.875rem;">Secure Payment</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Bank Grade Security</div>
                            </div>
                        </div>
                    </div>
                    <div class="floating-card floating-card-2">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-users" style="color: #3b82f6; font-size: 1.5rem;"></i>
                            <div>
                                <div style="font-weight: 600; font-size: 0.875rem;">24/7 Support</div>
                                <div style="font-size: 0.75rem; color: #6b7280;">Always Available</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section section-gray">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">What We Do</div>
                <h2 class="section-title">Get Ready To Have Best Smart Payments in The World</h2>
            </div>

            <div class="card-grid" style="margin-bottom: 4rem;">
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3 class="card-title">Payment Solution</h3>
                    <p class="card-subtitle">UPI QR || UPI Apps || Payments Links</p>
                    <p class="card-description">Connect Your Offline Business QR & Start Accepting Online Payments in Websites/Apps</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="card-title">Growth Business</h3>
                    <p class="card-subtitle">Seamless Payments Flow Help Every Business to Grow smoothly</p>
                    <p class="card-description"><?php echo $site_settings['brand_name']; ?> offers safe, seamless and reliable payment solutions designed to grow you omnichannel business.</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="card-title">Connected People</h3>
                    <p class="card-subtitle">Manage Your Customers Payments || Create Payment Links & Collect Instantly</p>
                    <p class="card-description">Create Payments Links and Collects Payments Instantly without Any QR Limits & Manager Your Customers in Single Place.</p>
                </div>
            </div>

            <div class="card-grid">
                <div class="card gradient-card">
                    <div style="display: flex; align-items: flex-start; gap: 1rem;">
                        <div style="width: 3rem; height: 3rem; background: rgba(255,255,255,0.2); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-mobile-alt" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">PERSONAL ACCOUNT</h3>
                            <p class="card-description">You Can Connect Your Savings/Current Bank Accounts to Get Directs Payments</p>
                        </div>
                    </div>
                </div>
                <div class="card gradient-card">
                    <div style="display: flex; align-items: flex-start; gap: 1rem;">
                        <div style="width: 3rem; height: 3rem; background: rgba(255,255,255,0.2); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-building" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">BUSINESS ACCOUNT</h3>
                            <p class="card-description">Handle Your Business Payments Without Any Limits Connect Your Business Account</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section">
        <div class="container">
            <div class="about-grid">
                <div class="about-image">
                    <img src="/placeholder.svg?height=600&width=500" alt="Payment Dashboard">
                    <div class="play-button">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
                <div>
                    <div class="section-badge" style="margin-bottom: 1rem;">About Us</div>
                    <h2 class="section-title" style="text-align: left; margin-bottom: 1rem;">We Have The Most Users All Over The World.</h2>
                    <p class="section-subtitle" style="text-align: left; margin-bottom: 1rem;"><?php echo $site_settings['brand_name']; ?> UPI Payment solutions that are easy to understand, and simple to use</p>
                    <p style="color: #6b7280; margin-bottom: 2rem;">Plug-and-play APIs || Quick onboarding || Min KYC Docs || 24*7 technical support || Multiple UPI Payments Routes</p>
                    
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-number">15k+</div>
                                <div class="stat-label">Happy Customers</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-number">260+</div>
                                <div class="stat-label">Live API Merchants</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section section-gray">
        <div class="container">
            <div class="about-grid" style="margin-bottom: 5rem;">
                <div>
                    <h2 class="section-title" style="text-align: left;">Manage Everything in Your Hand</h2>
                    <div style="margin-top: 2rem;">
                        <div style="display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 2rem;">
                            <div style="width: 3rem; height: 3rem; background: linear-gradient(135deg, #3b82f6, #8b5cf6); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fas fa-mobile-alt" style="color: white;"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">User Friendly</h3>
                                <p style="color: #6b7280;">User Friendly Interface that Helps to Manage Easily</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 2rem;">
                            <div style="width: 3rem; height: 3rem; background: linear-gradient(135deg, #3b82f6, #8b5cf6); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fas fa-headset" style="color: white;"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Best Support</h3>
                                <p style="color: #6b7280;">You Manage Your Business || We support in Every Single Payments || 24X7 WhatsApp Support</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 1rem;">
                            <div style="width: 3rem; height: 3rem; background: linear-gradient(135deg, #3b82f6, #8b5cf6); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fas fa-shield-alt" style="color: white;"></i>
                            </div>
                            <div>
                                <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Secure</h3>
                                <p style="color: #6b7280;">All Payments & API's Call Process Through a Safe & Secure Strong Backends Routes in Every payments Session</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="position: relative;">
                    <img src="/placeholder.svg?height=600&width=400" alt="Payment Management" style="width: 100%; max-width: 400px; margin: 0 auto; display: block;">
                </div>
            </div>

            <div class="section-header">
                <div class="section-badge">Our Services</div>
                <h2 class="section-title">Smart Solution for Your Payment</h2>
                <p class="section-subtitle">Businesses can integrate <?php echo $site_settings['brand_name']; ?> on their website and offer their customers the ability to pay through different UPI apps to customers.</p>
            </div>

            <div class="card-grid">
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3 class="card-title">All Business Sized</h3>
                    <p class="card-description">Digitise your online payments and financial operations by easily integrating plug-and-play, developer-friendly APIs into your own tech stack, website, apps, ERPs and CRMs.</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="card-title">Personal Dashboard</h3>
                    <p class="card-description">Unified dashboard that gives you real-time view about transaction data and reports</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="card-title">Integrated Payments</h3>
                    <p class="card-description">We offer easy to integrate and developer-friendly plug-and-play APIs that comes with detailed API docs</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="card-title">Business Tracking</h3>
                    <p class="card-description">Track your business performance with detailed analytics and reporting tools</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h3 class="card-title">Subscription Billing</h3>
                    <p class="card-description">Manage recurring payments and subscription billing with ease</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="card-title">Instant Settlement</h3>
                    <p class="card-description">Get your payments settled instantly to your bank account</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">Plan and Pricing</div>
                <h2 class="section-title">Helping You Make Smart Financial Choices</h2>
            </div>

            <div style="max-width: 64rem; margin: 0 auto;">
                <div class="card gradient-card">
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-bottom: 2rem;">
                        <div style="text-align: center;">
                            <div style="width: 4rem; height: 4rem; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                <i class="fas fa-credit-card" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">UPI Payments</h3>
                            <p style="color: #dbeafe;">*Free</p>
                        </div>
                        <div style="text-align: center;">
                            <div style="width: 4rem; height: 4rem; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                <i class="fas fa-mobile-alt" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">Payment Modes</h3>
                            <p style="color: #dbeafe;">UPI QR || UPI Apps || Payment Links</p>
                        </div>
                        <div style="text-align: center;">
                            <div style="width: 4rem; height: 4rem; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                <i class="fas fa-university" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">Settlements</h3>
                            <p style="color: #dbeafe;">Directly To Your Bank Accounts</p>
                        </div>
                    </div>

                    <div style="text-align: center; margin-bottom: 2rem;">
                        <img src="/placeholder.svg?height=50&width=300" alt="Payment Gateways" style="opacity: 0.8;">
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-check" style="color: #10b981; flex-shrink: 0;"></i>
                            <span style="color: #dbeafe;">Free Registration</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-check" style="color: #10b981; flex-shrink: 0;"></i>
                            <span style="color: #dbeafe;">Monthly Subscriptions</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-check" style="color: #10b981; flex-shrink: 0;"></i>
                            <span style="color: #dbeafe;">No Setup Cost</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-check" style="color: #10b981; flex-shrink: 0;"></i>
                            <span style="color: #dbeafe;">Easy to Setup</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-check" style="color: #10b981; flex-shrink: 0;"></i>
                            <span style="color: #dbeafe;">Integration KITS</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-check" style="color: #10b981; flex-shrink: 0;"></i>
                            <span style="color: #dbeafe;">Custom Price Available</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="section section-gray">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">Need more help?</div>
                <h2 class="section-title">Leading, Trusted. Enabling growth.</h2>
                <p class="section-subtitle">India's leading brands have trusted <?php echo $site_settings['brand_name']; ?> payments platform to manage online payment collections, vendor payouts and financial operations.</p>
            </div>

            <div class="process-grid">
                <div class="card process-card">
                    <div class="process-number">1</div>
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3 class="card-title">Register</h3>
                    <p class="card-description">Register in Few Mins to Collect Online Payments</p>
                    <a href="Register" class="btn btn-primary" style="width: 100%; margin-top: 1.5rem;">
                        Register Now
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="process-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
                <div class="card process-card">
                    <div class="process-number">2</div>
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-link"></i>
                    </div>
                    <h3 class="card-title">Connect Merchant Account</h3>
                    <p class="card-description">Connect Your Merchant Accounts & Verify With OTP</p>
                    <a href="auth/connect_merchant" class="btn btn-primary" style="width: 100%; margin-top: 1.5rem;">
                        Connect Merchants
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="process-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
                <div class="card process-card">
                    <div class="process-number">3</div>
                    <div class="card-icon" style="background: linear-gradient(135deg, #3b82f6, #8b5cf6);">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="card-title">Start Integration</h3>
                    <p class="card-description">Generate API KEYS & Token || Integrate In Your Website/Apps</p>
                    <a href="#" class="btn btn-primary" style="width: 100%; margin-top: 1.5rem;">
                        Read API Docs
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h3 style="font-size: 1.125rem; font-weight: 600; color: #6b7280; margin-bottom: 2rem;">Trusted by leading payment providers and banks</h3>
            </div>
            <div class="partners-grid">
                <img src="/placeholder.svg?height=40&width=120" alt="PhonePe" class="partner-logo">
                <img src="/placeholder.svg?height=40&width=120" alt="Paytm" class="partner-logo">
                <img src="/placeholder.svg?height=40&width=120" alt="BharatPe" class="partner-logo">
                <img src="/placeholder.svg?height=40&width=120" alt="Yes Bank" class="partner-logo">
                <img src="/placeholder.svg?height=40&width=120" alt="PNB" class="partner-logo">
                <img src="/placeholder.svg?height=40&width=120" alt="RBL Bank" class="partner-logo">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <a href="/" class="logo" style="margin-bottom: 1.5rem; display: flex;">
                        <div class="logo-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <span class="logo-text"><?php echo $site_settings['brand_name']; ?></span>
                    </a>
                    <p style="color: #9ca3af; line-height: 1.6; margin-bottom: 1.5rem;">
                        Accept Payments Directly to your Bank Account At 0% Transaction Fee for businesses <?php echo $site_settings['brand_name']; ?>, QR code checkout, deep linking APIs, API for bulk UPI payments
                    </p>
                    <p style="color: #9ca3af; line-height: 1.6; margin-bottom: 1.5rem;">
                        To accept payments via UPI Apps like PhonePe, Google Pay, Paytm etc, you can integrate with a payment gateway that supports UPI flow
                    </p>
                    <img src="/placeholder.svg?height=40&width=200" alt="Payment Gateways" style="opacity: 0.8;">
                </div>

                <div class="footer-section">
                    <h4>Important Links</h4>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/terms">Terms Conditions</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                        <li><a href="/refund">Refund Policy</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Support</h4>
                    <ul class="footer-links">
                        <li><a href="/support">Support</a></li>
                        <li><a href="/dispute">Transaction Dispute</a></li>
                        <li><a href="/complaints">Complaints</a></li>
                        <li><a href="/faq">FAQ</a></li>
                        <li><a href="/feedback">Review & Feedback</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Get in Touch</h4>
                    <div style="margin-bottom: 1rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                            <i class="fas fa-envelope" style="color: #3b82f6;"></i>
                            <a href="mailto:info@<?php
$host = $_SERVER['HTTP_HOST'];
$cleanHost = preg_replace('/^www\./', '', $host);
echo $cleanHost;
?>" style="color: #9ca3af; text-decoration: none;">
                                info@<?php
$host = $_SERVER['HTTP_HOST'];
$cleanHost = preg_replace('/^www\./', '', $host);
echo $cleanHost;
?>
                            </a>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <i class="fas fa-phone" style="color: #3b82f6;"></i>
                            <a href="tel:+91<?php echo $site_settings['whatsapp_number']; ?>" style="color: #9ca3af; text-decoration: none;">
                                +91 <?php echo $site_settings['whatsapp_number']; ?>
                            </a>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>Copyright © <?php echo $site_settings['copyright_text']; ?> 2024. All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            
            if (!mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                mobileMenu.classList.remove('active');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
                header.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.05)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = 'none';
            }
        });

        // Animate cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all cards
        document.querySelectorAll('.card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

        // Add loading animation
        window.addEventListener('load', function() {
            document.body.style.opacity = '1';
        });

        document.body.style.opacity = '0';
        document.body.style.transition = 'opacity 0.3s ease';
    </script>
</body>
</html>
