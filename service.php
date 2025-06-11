<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Invoice Simple</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Consistent variables and base styles from previous pages */
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --dark: #1e1e2c;
            --light: #f8f9fa;
            --gray: #6c757d;
            --success: #4cc9f0;
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9fbfd;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: white;
            box-shadow: var(--shadow);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--dark);
            text-decoration: none;
        }

        .logo svg {
            width: 32px;
            height: 32px;
            margin-right: 10px;
            fill: var(--primary);
        }

        .logo-text {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .navbar {
            display: flex;
            gap: 30px;
        }

        .navbar a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .navbar a:hover {
            color: var(--primary);
        }

        .navbar a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }

        .navbar a:hover::after {
            width: 100%;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .login-btn,
        .signup-btn {
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
        }

        .login-btn {
            color: var(--dark);
            border: 1px solid var(--gray);
        }

        .login-btn:hover {
            background-color: #f1f1f1;
        }

        .signup-btn {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
        }

        .signup-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.3);
        }

        /* Hero Section for Services Page */
        .services-hero {
            min-height: 70vh;
            display: flex;
            align-items: center;
            padding: 150px 0 80px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f0f5ff 0%, #e6f0ff 100%);
        }

        .services-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(67, 97, 238, 0.1) 0%, rgba(67, 97, 238, 0) 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .services-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .services-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--dark);
        }

        .services-hero h1 span {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .services-hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--gray);
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 40px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--gray);
            font-weight: 500;
        }

        /* Services Section */
        .services-section {
            padding: 100px 0;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }

        .section-title p {
            color: var(--gray);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid rgba(67, 97, 238, 0.1);
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .service-icon i {
            font-size: 36px;
            color: var(--primary);
        }

        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .service-card p {
            color: var(--gray);
            margin-bottom: 20px;
        }

        .service-features {
            text-align: left;
            margin-top: 20px;
        }

        .service-feature {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .service-feature i {
            color: var(--primary);
            margin-right: 10px;
        }

        /* Benefits Section */
        .benefits {
            padding: 100px 0;
            background-color: #f5f9ff;
        }

        .benefits-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .benefits-content {
            flex: 1;
            min-width: 300px;
        }

        .benefits-image {
            flex: 1;
            min-width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .benefits-image img {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .benefit-item {
            display: flex;
            margin-bottom: 30px;
        }

        .benefit-icon {
            width: 60px;
            height: 60px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .benefit-icon i {
            font-size: 24px;
            color: var(--primary);
        }

        .benefit-text h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .benefit-text p {
            color: var(--gray);
        }

        /* Stats Section */
        .stats {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            text-align: center;
        }

        .stat-item {
            padding: 20px;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.2rem;
            font-weight: 500;
            opacity: 0.9;
        }

        /* CTA Section */
        .cta-banner {
            padding: 100px 0;
            background: white;
            text-align: center;
        }

        .cta-content {
            max-width: 700px;
            margin: 0 auto;
        }

        .cta-banner h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .cta-banner p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--gray);
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            padding: 14px 40px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(67, 97, 238, 0.4);
        }

        .cta-button i {
            margin-right: 10px;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 80px 0 0;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary);
        }

        .footer-section p {
            color: #aaa;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #aaa;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .contact-info {
            color: #aaa;
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .contact-info i {
            margin-right: 10px;
            color: var(--primary);
            margin-top: 5px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: var(--transition);
        }

        .social-icons a:hover {
            background: var(--primary);
            transform: translateY(-5px);
        }

        .footer-bottom {
            text-align: center;
            padding: 20px 0;
            margin-top: 60px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .services-hero h1 {
                font-size: 3rem;
            }

            .benefits-container {
                flex-direction: column;
            }

            .benefits-image {
                order: -1;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
            }

            .navbar {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .services-hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .cta-banner h2 {
                font-size: 2.2rem;
            }

            .hero-stats {
                flex-direction: column;
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .services-hero h1 {
                font-size: 2rem;
            }

            .auth-buttons {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
            }

            .login-btn,
            .signup-btn {
                width: 100%;
                text-align: center;
            }

            .cta-button {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-container">
                <a href="index.html" class="logo">
                    <svg width="24" height="24" viewBox="0 0 21 19" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.5257 0.366943L9.18097 10.1489L8.86262 10.3805L8.70634 10.4673L8.60794 10.502L8.49218 10.5425L8.4343 10.5599L8.36484 10.5715L8.27802 10.5772H8.11595H7.91915L7.82075 10.5715L7.73393 10.5599L7.6529 10.5425L7.58923 10.5252L0.730264 7.89154L0.579773 7.85681L0.504526 7.87997L0.429281 7.95521L0.406128 8.00731V8.07676L0.429281 8.18674L0.730264 8.57455L7.78602 18.3392L7.86127 18.4028L7.95388 18.4781L8.09858 18.5186L8.2375 18.5244L8.3822 18.4897L8.50954 18.4144L8.60794 18.3218L8.74107 18.1771L20.6589 0.505859V0.436401L20.6241 0.366943H20.5257Z" />
                    </svg>
                    <span class="logo-text">Invoice Simple</span>
                </a>

                <nav class="navbar">
                    <a href="./index.php">Home</a>
                    <a href="./about.php">About</a>
                    <a href="./working.php">How It Works</a>
                    <a href="./service.php">services</a>
                    <a href="./contact.php">Contact</a>
                </nav>

                <div class="auth-buttons">
                    <a href="#" class="login-btn">Login</a>
                    <a href="#" class="signup-btn">Sign Up</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="services-hero">
        <div class="container">
            <div class="services-hero-content">
                <h1>Powerful <span>Invoice Solutions</span> for Your Business</h1>
                <p>Streamline your billing process, get paid faster, and focus on growing your business with our comprehensive invoice services.</p>

                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Faster Payments</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">15M+</div>
                        <div class="stat-label">Invoices Generated</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">99.9%</div>
                        <div class="stat-label">Uptime Guarantee</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Our Professional Services</h2>
                <p>Everything you need to create, manage, and track invoices efficiently</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3>Custom Invoice Creation</h3>
                    <p>Create professional, branded invoices tailored to your business needs in seconds.</p>
                    <div class="service-features">
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Multiple professional templates</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Custom branding and colors</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Automated calculations</span>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <h3>Payment Processing</h3>
                    <p>Accept payments faster with integrated payment gateways and automatic reminders.</p>
                    <div class="service-features">
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Credit card & bank transfer options</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Recurring billing support</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Late payment reminders</span>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Financial Reporting</h3>
                    <p>Gain valuable insights into your business finances with comprehensive reports.</p>
                    <div class="service-features">
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Real-time cash flow analysis</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Tax-ready financial statements</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Client payment history</span>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <h3>Recurring Billing</h3>
                    <p>Automate recurring invoices for subscription-based services and retainers.</p>
                    <div class="service-features">
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Flexible billing schedules</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Auto-charge clients</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Proration for mid-cycle changes</span>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Mobile Invoicing</h3>
                    <p>Create and send invoices on the go with our powerful mobile applications.</p>
                    <div class="service-features">
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>iOS and Android apps</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Offline invoice creation</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Photo receipt capture</span>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Secure Data Management</h3>
                    <p>Enterprise-grade security to protect your financial data and client information.</p>
                    <div class="service-features">
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Bank-level encryption</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Regular security audits</span>
                        </div>
                        <div class="service-feature">
                            <i class="fas fa-check-circle"></i>
                            <span>GDPR & CCPA compliance</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Our Services</h2>
                <p>Experience the difference with our comprehensive invoice solutions</p>
            </div>

            <div class="benefits-container">
                <div class="benefits-content">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="benefit-text">
                            <h3>Save Time & Effort</h3>
                            <p>Automate repetitive tasks and reduce manual work by up to 80%. What used to take hours now takes minutes.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="benefit-text">
                            <h3>Improve Cash Flow</h3>
                            <p>Get paid faster with automated reminders and online payment options. Our users see payments 2x faster on average.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="benefit-text">
                            <h3>Professional Branding</h3>
                            <p>Impress clients with polished, branded invoices that reflect your business's professionalism.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="benefit-text">
                            <h3>Seamless Integration</h3>
                            <p>Connect with popular accounting software and payment gateways for a unified workflow.</p>
                        </div>
                    </div>
                </div>

                <div class="benefits-image">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=1000" alt="Invoice Dashboard" style="max-height: 500px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">250K+</div>
                    <div class="stat-label">Businesses Trust Us</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Customer Satisfaction</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number">15M+</div>
                    <div class="stat-label">Invoices Created</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number">120</div>
                    <div class="stat-label">Countries Served</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Transform Your Invoicing?</h2>
                <p>Join thousands of satisfied businesses that have streamlined their billing with Invoice Simple</p>
                <a href="./invoice.php" class="cta-button">
                    <i class="fas fa-bolt"></i>Start Creating Invoices Now
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-section about">
                    <h3>About Us</h3>
                    <p>Invoice Simple helps freelancers and small businesses create professional invoices easily.
                        Trusted by thousands worldwide.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="footer-section links">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./about.php">about</a></li>
                        <li><a href="./working.php">How It Works</a></li>
                        <li><a href="./service.php">Services</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-section support">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="./support//help-center.php">Help Center</a></li>
                        <li><a href="./support//faqs.php">FAQs</a></li>
                        <li><a href="./support//terms-of-services.php">Terms of Service</a></li>
                        <li><a href="./support//privacy-policy.php">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="footer-section contact">
                    <h3>Contact Us</h3>
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Amravati, Maharashtra, India</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <span>+91 98765 43210</span>
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <span>support@invoicesimple.com</span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Invoice Simple. All rights reserved.</p>
            </div>
        </div>
    </footer>


    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.boxShadow = '0 5px 20px rgba(0, 0, 0, 0.1)';
                header.style.background = 'rgba(255, 255, 255, 0.95)';
            } else {
                header.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
                header.style.background = 'white';
            }
        });

        // Animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        const hiddenElements = document.querySelectorAll('.service-card, .benefit-item');
        hiddenElements.forEach((el) => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>

</html>