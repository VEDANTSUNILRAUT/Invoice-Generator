<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service | Invoice Simple</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 100px 0 50px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f0f5ff 0%, #e6f0ff 100%);
        }

        .hero::before {
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

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--dark);
        }

        .hero h1 span {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--gray);
            max-width: 500px;
        }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            padding: 14px 32px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3);
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: none;
        }

        .cta-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(67, 97, 238, 0.4);
        }

        .cta-btn i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .hero-image {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            width: 45%;
            max-width: 600px;
            z-index: 1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.1);
        }

        .hero-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px;
            transition: transform 0.5s ease;
        }

        .hero-image:hover img {
            transform: scale(1.03);
        }

        /* Features Section */
        .features {
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
        }

        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            border: 1px solid rgba(67, 97, 238, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .feature-icon i {
            font-size: 30px;
            color: var(--primary);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .feature-card p {
            color: var(--gray);
        }

        /* How It Works */
        .how-it-works {
            padding: 100px 0;
            background-color: #f5f9ff;
            position: relative;
            overflow: hidden;
        }

        .how-it-works::before {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(67, 97, 238, 0.1) 0%, rgba(67, 97, 238, 0) 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .steps {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            position: relative;
            z-index: 1;
        }

        .step {
            flex: 1;
            min-width: 300px;
            max-width: 350px;
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
            transition: var(--transition);
        }

        .step:hover {
            transform: translateY(-10px);
        }

        .step-number {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .step-icon {
            font-size: 50px;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .step h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .step p {
            color: var(--gray);
        }

        /* Testimonials */
        .testimonials {
            padding: 100px 0;
            background-color: white;
        }

        .testimonials-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .testimonial {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: var(--shadow);
            margin: 30px 0;
            position: relative;
            border: 1px solid rgba(67, 97, 238, 0.1);
        }

        .testimonial::before {
            content: '"';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 80px;
            color: rgba(67, 97, 238, 0.1);
            font-family: Georgia, serif;
            line-height: 1;
        }

        .testimonial-content {
            font-size: 1.1rem;
            color: var(--gray);
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            margin-right: 15px;
        }

        .author-info h4 {
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .author-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Pricing */
        .pricing {
            padding: 100px 0;
            background-color: #f5f9ff;
        }

        .pricing-plans {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .pricing-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: var(--shadow);
            text-align: center;
            flex: 1;
            min-width: 300px;
            max-width: 350px;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(67, 97, 238, 0.1);
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .pricing-card.popular {
            border: 2px solid var(--primary);
            transform: scale(1.05);
        }

        .pricing-card.popular:hover {
            transform: scale(1.05) translateY(-10px);
        }

        .popular-badge {
            position: absolute;
            top: 15px;
            right: -30px;
            background: var(--primary);
            color: white;
            padding: 5px 30px;
            transform: rotate(45deg);
            font-size: 0.8rem;
            font-weight: 600;
        }

        .pricing-header {
            margin-bottom: 30px;
        }

        .pricing-name {
            font-size: 1.5rem;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .pricing-price {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .pricing-period {
            color: var(--gray);
        }

        .pricing-features {
            margin: 30px 0;
            text-align: left;
        }

        .pricing-feature {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .pricing-feature i {
            color: var(--primary);
            margin-right: 10px;
        }

        .pricing-feature span {
            color: var(--dark);
        }

        .pricing-btn {
            display: inline-block;
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: var(--transition);
            border: 2px solid var(--primary);
        }

        .pricing-btn:hover {
            background: transparent;
            color: var(--primary);
        }

        .pricing-card.popular .pricing-btn {
            background: var(--secondary);
            border-color: var(--secondary);
        }

        .pricing-card.popular .pricing-btn:hover {
            background: transparent;
            color: var(--secondary);
        }

        /* CTA Section */
        .cta-banner {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-align: center;
        }

        .cta-content {
            max-width: 700px;
            margin: 0 auto;
        }

        .cta-banner h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .cta-banner p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            padding: 14px 40px;
            background: white;
            color: var(--primary);
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
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
            .hero h1 {
                font-size: 3rem;
            }

            .hero-image {
                position: relative;
                width: 100%;
                max-width: 600px;
                margin: 50px auto 0;
                top: 0;
                right: 0;
                transform: none;
            }

            .hero {
                padding: 120px 0 80px;
                text-align: center;
            }

            .hero-content {
                max-width: 100%;
                margin: 0 auto;
            }

            .hero p {
                margin: 0 auto 30px;
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

            .hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .cta-banner h2 {
                font-size: 2.2rem;
            }

            .pricing-card.popular {
                transform: scale(1);
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
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

            .pricing-card {
                min-width: 100%;
                max-width: 100%;
                margin-bottom: 30px;
                transform: none !important;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                padding: 30px 20px;
            }

            .pricing-card.popular {
                transform: none !important;
            }

            .pricing-card:hover {
                transform: none !important;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }

            .cta-button {
                width: 100%;
                text-align: center;
                justify-content: center;
            }
        }

        /* New styles for Terms of Service */
        .terms-page {
            padding: 100px 0;
            background-color: white;
        }

        .terms-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .terms-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .terms-title h1 {
            font-size: 2.8rem;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .terms-title p {
            color: var(--gray);
            font-size: 1.1rem;
        }

        .last-updated {
            text-align: center;
            margin-bottom: 40px;
            font-style: italic;
            color: var(--gray);
        }

        .terms-content {
            background: #f9fbfd;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .terms-section {
            margin-bottom: 40px;
        }

        .terms-section h2 {
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(67, 97, 238, 0.2);
        }

        .terms-section h3 {
            font-size: 1.4rem;
            color: var(--dark);
            margin: 25px 0 15px;
        }

        .terms-section p {
            color: var(--gray);
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .terms-section ul {
            margin: 20px 0;
            padding-left: 20px;
        }

        .terms-section li {
            margin-bottom: 10px;
            color: var(--gray);
            line-height: 1.6;
        }

        .accept-section {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }

        .accept-section p {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-container">
                <a href="index.php" class="logo">
                    <svg width="24" height="24" viewBox="0 0 21 19" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.5257 0.366943L9.18097 10.1489L8.86262 10.3805L8.70634 10.4673L8.60794 10.502L8.49218 10.5425L8.4343 10.5599L8.36484 10.5715L8.27802 10.5772H8.11595H7.91915L7.82075 10.5715L7.73393 10.5599L7.6529 10.5425L7.58923 10.5252L0.730264 7.89154L0.579773 7.85681L0.504526 7.87997L0.429281 7.95521L0.406128 8.00731V8.07676L0.429281 8.18674L0.730264 8.57455L7.78602 18.3392L7.86127 18.4028L7.95388 18.4781L8.09858 18.5186L8.2375 18.5244L8.3822 18.4897L8.50954 18.4144L8.60794 18.3218L8.74107 18.1771L20.6589 0.505859V0.436401L20.6241 0.366943H20.5257Z" />
                    </svg>
                    <span class="logo-text">Invoice Simple</span>
                </a>

                <nav class="navbar">
                    <a href="../index.php">Home</a>
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

    <!-- Terms of Service Content -->
    <section class="terms-page">
        <div class="container">
            <div class="terms-container">
                <div class="terms-title">
                    <h1>Terms of Service</h1>
                    <p>Last Updated: June 11, 2025</p>
                </div>

                <div class="last-updated">
                    These Terms of Service govern your use of Invoice Simple. Please read them carefully.
                </div>

                <div class="terms-content">
                    <div class="terms-section">
                        <h2>1. Acceptance of Terms</h2>
                        <p>By accessing or using the Invoice Simple website, applications, or services (collectively, the "Service"), you agree to be bound by these Terms of Service ("Terms"). If you do not agree to these Terms, you may not use the Service.</p>
                    </div>

                    <div class="terms-section">
                        <h2>2. Description of Service</h2>
                        <p>Invoice Simple provides online invoicing and billing services through its web-based platform. The Service allows users to create, send, and manage invoices and related business documents.</p>
                    </div>

                    <div class="terms-section">
                        <h2>3. User Accounts</h2>
                        <h3>3.1 Account Creation</h3>
                        <p>To access certain features of the Service, you must create an account. You agree to provide accurate, current, and complete information during registration and to update such information to keep it accurate, current, and complete.</p>

                        <h3>3.2 Account Security</h3>
                        <p>You are responsible for safeguarding your account password and for any activities or actions under your account. Invoice Simple will not be liable for any loss or damage arising from your failure to comply with this security obligation.</p>
                    </div>

                    <div class="terms-section">
                        <h2>4. Fees and Payments</h2>
                        <h3>4.1 Free Services</h3>
                        <p>Invoice Simple offers a free tier of service with limited features. You are not required to pay to use these free services.</p>

                        <h3>4.2 Paid Services</h3>
                        <p>For access to premium features, you must pay applicable fees. Fees are non-refundable except as required by law or as otherwise specifically permitted in these Terms.</p>

                        <h3>4.3 Payment Authorization</h3>
                        <p>By providing a payment method, you authorize us to charge the payment method for all charges due to Invoice Simple.</p>
                    </div>

                    <div class="terms-section">
                        <h2>5. User Responsibilities</h2>
                        <p>You agree not to use the Service to:</p>
                        <ul>
                            <li>Violate any applicable law or regulation</li>
                            <li>Infringe upon the intellectual property rights of others</li>
                            <li>Transmit any viruses, malware, or other malicious code</li>
                            <li>Harass, abuse, or harm another person</li>
                            <li>Interfere with or disrupt the integrity or performance of the Service</li>
                        </ul>
                    </div>

                    <div class="terms-section">
                        <h2>6. Intellectual Property</h2>
                        <p>All rights, title, and interest in and to the Service (excluding content provided by users) are and will remain the exclusive property of Invoice Simple and its licensors. The Service is protected by copyright, trademark, and other laws of both the India and foreign countries.</p>
                    </div>

                    <div class="terms-section">
                        <h2>7. Limitation of Liability</h2>
                        <p>To the maximum extent permitted by applicable law, in no event shall Invoice Simple be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from:</p>
                        <ul>
                            <li>Your access to or use of or inability to access or use the Service</li>
                            <li>Any conduct or content of any third party on the Service</li>
                            <li>Unauthorized access, use, or alteration of your transmissions or content</li>
                        </ul>
                    </div>

                    <div class="terms-section">
                        <h2>8. Termination</h2>
                        <p>We may terminate or suspend your access to the Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach these Terms. Upon termination, your right to use the Service will immediately cease.</p>
                    </div>

                    <div class="terms-section">
                        <h2>9. Changes to Terms</h2>
                        <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. We will provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                    </div>

                    <div class="accept-section">
                        <p>By using Invoice Simple, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service.</p>
                    </div>
                </div>
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
        // Header scroll effect (same as index.php)
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
    </script>
</body>

</html>