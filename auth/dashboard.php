<?php include "header.php";

// SQL query to count rows
$sql = "SELECT COUNT(*) AS count FROM reports WHERE mobile = '$mobile'";

// Execute the query
$result = $conn->query($sql);

if ($result === false) {
    $rowCount=0;
}
else{
    // Fetch the result
    $row = $result->fetch_assoc();
    
    // Get the count from the result
    $rowCount = $row['count'];
}

$expiryDate = $userdata['expiry'];
$today = date('Y-m-d');

if (strtotime($expiryDate) >= strtotime($today)) {
    $status = "Active";
} else {
    $status = "Expired";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Payment Analytics</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }
        
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .dashboard-header {
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
        
        .welcome-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }
        
        .welcome-section p {
            color: #6b7280;
            font-size: 1.1rem;
        }
        
        .header-stats {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        
        .quick-stat {
            text-align: center;
        }
        
        .quick-stat .value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
        }
        
        .quick-stat .label {
            font-size: 0.875rem;
            color: #6b7280;
            margin-top: 0.25rem;
        }
        
        /* Banner Slider */
        .banner-slider {
            position: relative;
            width: 100%;
            margin-bottom: 2rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        
        .slide {
            min-width: 100%;
            position: relative;
        }
        
        .slide img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 20px;
        }
        
        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #333;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .slider-nav:hover {
            background: white;
            transform: translateY(-50%) scale(1.1);
        }
        
        .prev { left: 20px; }
        .next { right: 20px; }
        
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient);
        }
        
        .stat-card.success { --gradient: linear-gradient(135deg, #10b981, #059669); }
        .stat-card.info { --gradient: linear-gradient(135deg, #3b82f6, #1d4ed8); }
        .stat-card.warning { --gradient: linear-gradient(135deg, #f59e0b, #d97706); }
        .stat-card.danger { --gradient: linear-gradient(135deg, #ef4444, #dc2626); }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            background: var(--gradient);
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #6b7280;
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }
        
        .stat-trend {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }
        
        .trend-up { color: #10b981; }
        .trend-down { color: #ef4444; }
        
        /* Chart Section */
        .chart-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .chart-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .chart-stats {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        
        .chart-stat {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .chart-stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .chart-stat-info h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .chart-stat-info p {
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            margin-top: 1rem;
        }
        
        /* Help Button */
        .help-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .help-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
        }
        
        /* Chat Modal */
        .chat-modal {
            display: none;
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 350px;
            height: 450px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            z-index: 1001;
            overflow: hidden;
        }
        
        .chat-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .chat-header h3 {
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .chat-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.3s ease;
        }
        
        .chat-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .chat-body {
            padding: 1.5rem;
            height: calc(100% - 140px);
            overflow-y: auto;
        }
        
        .chat-input-container {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem 1.5rem;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }
        
        .chat-input {
            display: flex;
            gap: 0.5rem;
        }
        
        .chat-input textarea {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            resize: none;
            font-family: inherit;
            font-size: 0.875rem;
        }
        
        .chat-send {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            cursor: pointer;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }
        
        .chat-send:hover {
            transform: translateY(-1px);
        }
        
        /* Footer */
        .dashboard-footer {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            color: #6b7280;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }
            
            .dashboard-header {
                padding: 1.5rem;
            }
            
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            .welcome-section h1 {
                font-size: 2rem;
            }
            
            .header-stats {
                flex-direction: column;
                gap: 1rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .chart-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .chart-stats {
                flex-direction: column;
                gap: 1rem;
                width: 100%;
            }
            
            .chat-modal {
                width: calc(100vw - 2rem);
                right: 1rem;
                left: 1rem;
            }
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
        
        .stat-card {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
        .stat-card:nth-child(5) { animation-delay: 0.5s; }
        .stat-card:nth-child(6) { animation-delay: 0.6s; }
        .stat-card:nth-child(7) { animation-delay: 0.7s; }
        .stat-card:nth-child(8) { animation-delay: 0.8s; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="header-content">
                <div class="welcome-section">
                    <h1>Welcome Back!</h1>
                    <p>Here's what's happening with your payments today</p>
                </div>
                <div class="header-stats">
                    <div class="quick-stat">
                        <div class="value">₹<?php echo number_format($todayallpayment["amt"]); ?></div>
                        <div class="label">Today's Revenue</div>
                    </div>
                    <div class="quick-stat">
                        <div class="value"><?php echo $status; ?></div>
                        <div class="label">Account Status</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Slider -->
        <?php
        $sliders = $conn->query("SELECT * FROM `popup_alert` ORDER BY id DESC");
        if($sliders->num_rows > 0){
        ?>
        <div class="banner-slider">
            <div class="slides">
                <?php while($row = $sliders->fetch_assoc()){ ?>
                <div class="slide">
                        <img src="<?= $row["img"] ?>" alt="Banner">
                    </a>
                </div>
                <?php } ?>
            </div>
            <button class="slider-nav prev" onclick="moveSlide(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-nav next" onclick="moveSlide(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <?php } ?>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card success">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                </div>
                <div class="stat-value">₹<?php echo number_format($todaysuccesspayment["amt"],2); ?></div>
                <div class="stat-label">Today Received Payment</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>100% higher</span>
                </div>
            </div>

            <div class="stat-card info">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-value"><?php echo number_format($todayallpayment["amt"]); ?></div>
                <div class="stat-label">Today Success Transaction</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>99.9% higher</span>
                </div>
            </div>

            <div class="stat-card warning">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value">₹<?php echo number_format($todaypendingpayment["amt"],2); ?></div>
                <div class="stat-label">Today Pending Payment</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>12% higher</span>
                </div>
            </div>

            <div class="stat-card danger">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                </div>
                <div class="stat-value">₹<?php echo number_format($todaysuccesspayment["amt"],2); ?></div>
                <div class="stat-label">Today Settlement</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>99.9% higher</span>
                </div>
            </div>

            <div class="stat-card danger">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
                <div class="stat-value"><?php echo htmlspecialchars($userdata['expiry'], ENT_QUOTES, 'UTF-8'); ?></div>
                <div class="stat-label">Plan Expire Date</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>45% higher</span>
                </div>
            </div>

            <div class="stat-card warning">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                </div>
                <div class="stat-value"><?php echo $rowCount; ?></div>
                <div class="stat-label">Used Transaction</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>18% higher</span>
                </div>
            </div>

            <div class="stat-card info">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
                <div class="stat-value"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></div>
                <div class="stat-label">Account Status</div>
                <div class="stat-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span>99% higher</span>
                </div>
            </div>

            <div class="stat-card success">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
                <div class="stat-value">₹<?php echo number_format($todayfail["amt"],2); ?></div>
                <div class="stat-label">Today Failed Payment</div>
                <div class="stat-trend trend-down">
                    <i class="fas fa-arrow-down"></i>
                    <span>-12% Lower</span>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-section">
            <div class="chart-header">
                <div>
                    <h2 class="chart-title">Revenue Analytics</h2>
                    <p style="color: #6b7280; margin-top: 0.5rem;">Track your payment performance over time</p>
                </div>
                <div class="chart-stats">
                    <div class="chart-stat">
                        <div class="chart-stat-icon" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                            📈
                        </div>
                        <div class="chart-stat-info">
                            <h3>₹<?php echo number_format($todayallpayment["amt"]); ?></h3>
                            <p>Total Sales</p>
                        </div>
                    </div>
                    <div class="chart-stat">
                        <div class="chart-stat-icon" style="background: linear-gradient(135deg, #10b981, #059669); color: white;">
                            💰
                        </div>
                        <div class="chart-stat-info">
                            <h3>₹<?php echo number_format($todayallpayment["amt"]); ?></h3>
                            <p>Total Profit</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Footer -->
    <!--    <div class="dashboard-footer">-->
    <!--        <p>&copy; 2025 Made By Kavish Preet Singh. All rights reserved.</p>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- Help Button -->
    <!--<button class="help-btn" onclick="toggleChat()">-->
    <!--    <i class="fas fa-question"></i>-->
    <!--</button>-->

    <!-- Chat Modal -->
    <div class="chat-modal" id="chatModal">
        <div class="chat-header">
            <h3>Help & Support</h3>
            <button class="chat-close" onclick="toggleChat()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="chat-body">
            <p>Welcome to our support chat! How can we help you today?</p>
            <div class="pending-message">
                <p style="color: #ef4444; margin-top: 1rem;">
                    <i class="fas fa-info-circle"></i> 
                    Please note: You have pending queries that need attention.
                </p>
            </div>
        </div>
        <div class="chat-input-container">
            <div class="chat-input">
                <textarea placeholder="Type your message..." rows="2"></textarea>
                <button class="chat-send">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js Configuration
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['4', '8', '12', '16', '20', '24', '28', '32', '36', '40'],
                datasets: [{
                    label: 'Total Sales',
                    data: [30, 25, 35, 40, 38, 50, 45, 60, 55, 65],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointBackgroundColor: '#667eea',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6
                },
                {
                    label: 'Total Profit',
                    data: [15, 12, 22, 20, 18, 25, 28, 32, 30, 35],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointBackgroundColor: '#10b981',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: 12,
                                weight: '500'
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 8
                    }
                }
            }
        });

        // Banner Slider
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.slide');

        function moveSlide(direction) {
            if (slides.length === 0) return;
            
            const totalSlides = slides.length;
            currentSlideIndex = (currentSlideIndex + direction + totalSlides) % totalSlides;
            document.querySelector('.slides').style.transform = `translateX(${-currentSlideIndex * 100}%)`;
        }

        // Auto-slide every 5 seconds
        if (slides.length > 0) {
            setInterval(() => {
                moveSlide(1);
            }, 5000);
        }

        // Chat functionality
        function toggleChat() {
            const chatModal = document.getElementById('chatModal');
            chatModal.style.display = chatModal.style.display === 'block' ? 'none' : 'block';
        }

        // Close chat when clicking outside
        document.addEventListener('click', function(event) {
            const chatModal = document.getElementById('chatModal');
            const helpBtn = document.querySelector('.help-btn');
            
            if (!chatModal.contains(event.target) && !helpBtn.contains(event.target)) {
                chatModal.style.display = 'none';
            }
        });

        // Smooth animations on scroll
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

        // Observe stat cards for animation
        document.querySelectorAll('.stat-card').forEach(card => {
            observer.observe(card);
        });

        // Add loading state
        window.addEventListener('load', function() {
            document.body.style.opacity = '1';
        });

        document.body.style.opacity = '0';
        document.body.style.transition = 'opacity 0.3s ease';
    </script>

    <!-- Include existing scripts -->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>
</html>