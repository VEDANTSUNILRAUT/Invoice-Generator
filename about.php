<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Invoice Simple</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reused styles from home page */
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

        /* Header Styles (same as home page) */
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

        /* Hero Section for About Page */
        .about-hero {
            min-height: 60vh;
            display: flex;
            align-items: center;
            padding: 150px 0 80px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f0f5ff 0%, #e6f0ff 100%);
            text-align: center;
        }

        .about-hero::before {
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

        .about-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .about-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--dark);
        }

        .about-hero h1 span {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .about-hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--gray);
        }

        /* Mission Section */
        .mission {
            padding: 100px 0;
            background-color: white;
        }

        .mission-content {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .mission-text {
            flex: 1;
        }

        .mission-image {
            flex: 1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .mission-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .mission-image:hover img {
            transform: scale(1.03);
        }

        .section-title {
            text-align: left;
            margin-bottom: 30px;
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
            left: 0;
            width: 70px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }

        .section-title p {
            color: var(--gray);
            font-size: 1.1rem;
        }

        /* Values Section */
        .values {
            padding: 100px 0;
            background-color: #f5f9ff;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .value-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            border: 1px solid rgba(67, 97, 238, 0.1);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .value-icon i {
            font-size: 30px;
            color: var(--primary);
        }

        .value-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .value-card p {
            color: var(--gray);
        }

        /* Team Section */
        .team {
            padding: 100px 0;
            background-color: white;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .team-member {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            border: 1px solid rgba(67, 97, 238, 0.1);
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .member-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 5px solid rgba(67, 97, 238, 0.1);
        }

        .member-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-member h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .team-member .position {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .team-member p {
            color: var(--gray);
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            color: var(--primary);
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            color: white;
        }

        .timeline {
            padding: 100px 0;
            background-color: #f5f9ff;
            position: relative;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 4px;
            background: rgba(67, 97, 238, 0.2);
            transform: translateX(-50%);
            z-index: 1;
        }

        .timeline-container {
            display: flex;
            flex-direction: column;
            gap: 60px;
            position: relative;
            z-index: 2;
        }

        .timeline-item {
            position: relative;
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
            width: 100%;
            padding: 0 15px;
        }

        .timeline-item:nth-child(even) {
            justify-content: flex-start;
        }

        .timeline-content {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            width: 45%;
            border: 1px solid rgba(67, 97, 238, 0.1);
            position: relative;
            z-index: 2;
            text-align: left;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: var(--primary);
            border-radius: 50%;
            top: 30px;
            z-index: 3;
        }

        .timeline-item:nth-child(odd)::before {
            right: calc(50% - 10px);
        }

        .timeline-item:nth-child(even)::before {
            left: calc(50% - 10px);
        }

        .timeline-year {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .timeline-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .timeline-desc {
            color: var(--gray);
        }

        /* Responsive Fix */
        @media (max-width: 768px) {
            .timeline::before {
                left: 8px;
                transform: none;
            }

            .timeline-item {
                flex-direction: row;
                justify-content: flex-start !important;
                padding-left: 30px;
            }

            .timeline-content {
                width: calc(100% - 40px);
            }

            .timeline-item::before {
                left: 0;
            }
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

        /* Footer (same as home page) */
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
            .mission-content {
                flex-direction: column;
                gap: 40px;
            }

            .timeline::before {
                left: 30px;
            }

            .timeline-item,
            .timeline-item:nth-child(even) {
                justify-content: flex-start;
                padding-left: 70px;
                padding-right: 0;
            }

            .timeline-content {
                width: 100%;
            }

            .timeline-item::before,
            .timeline-item:nth-child(even)::before {
                left: 20px;
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

            .about-hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .cta-banner h2 {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 480px) {
            .about-hero h1 {
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
    <!-- Header (same as home page) -->
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
                    <a href="index.html">Home</a>
                    <a href="about.html" class="active">About</a>
                    <a href="#features">Features</a>
                    <a href="#pricing">Pricing</a>
                    <a href="#contact">Contact</a>
                </nav>

                <div class="auth-buttons">
                    <a href="#" class="login-btn">Login</a>
                    <a href="#" class="signup-btn">Sign Up</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <div class="about-hero-content">
                <h1>Our <span>Story</span> Behind Invoice Simple</h1>
                <p>Discover the passion, values, and people that drive our mission to simplify invoicing for businesses worldwide.</p>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission">
        <div class="container">
            <div class="mission-content">
                <div class="mission-text">
                    <div class="section-title">
                        <h2>Our Mission</h2>
                        <p>Empowering businesses with simple financial tools</p>
                    </div>
                    <p>At Invoice Simple, we believe that managing finances should be straightforward, accessible, and efficient for everyone. Founded in 2018 by a team of finance professionals and tech enthusiasts, our mission is to eliminate the complexity and frustration from business invoicing.</p>
                    <p>We started with a simple observation: small business owners and freelancers were spending countless hours creating invoices, tracking payments, and managing cash flow. This time could be better spent growing their business or serving their customers.</p>
                    <p>Today, we serve over 250,000 businesses across 120 countries, helping them create professional invoices in seconds, track payments automatically, and gain valuable insights into their cash flow.</p>
                </div>
                <div class="mission-image">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1000" alt="Our Team Working">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <div class="section-title" style="text-align: center;">
                <h2>Our Core Values</h2>
                <p>The principles that guide everything we do</p>
            </div>

            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Simplicity</h3>
                    <p>We believe complexity is the enemy of productivity. Our tools are designed to be intuitive and easy to use from day one.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Integrity</h3>
                    <p>We maintain the highest standards of security and ethical practices, ensuring your financial data is always protected.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Empowerment</h3>
                    <p>Our tools give businesses the insights they need to make smart financial decisions and grow sustainably.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We continuously evolve our platform to anticipate and meet the changing needs of modern businesses.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community</h3>
                    <p>We actively support the entrepreneurial ecosystem through education, resources, and partnerships.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Passion</h3>
                    <p>We're driven by a genuine desire to solve real problems for business owners and freelancers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <div class="section-title" style="text-align: center;">
                <h2>Meet Our Leadership</h2>
                <p>The passionate team behind Invoice Simple</p>
            </div>

            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Raj Sharma">
                    </div>
                    <h3>Raj Sharma</h3>
                    <div class="position">Founder & CEO</div>
                    <p>Former finance executive with 15+ years in fintech and business automation.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Priya Patel">
                    </div>
                    <h3>Priya Patel</h3>
                    <div class="position">Chief Product Officer</div>
                    <p>Product design expert focused on creating intuitive user experiences.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Amit Kumar">
                    </div>
                    <h3>Amit Kumar</h3>
                    <div class="position">CTO</div>
                    <p>Tech visionary with expertise in scalable cloud infrastructure and security.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Neha Gupta">
                    </div>
                    <h3>Neha Gupta</h3>
                    <div class="position">Customer Success Director</div>
                    <p>Dedicated to ensuring every customer gets maximum value from our platform.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <div class="section-title" style="text-align: center;">
        <h2>Our Journey</h2>
        <p>Key milestones in our company history</p>
    </div>
    <section class="timeline">

        <div class="container">


            <div class="timeline-container">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2018</div>
                        <h3 class="timeline-title">Company Founded</h3>
                        <p class="timeline-desc">Launched with a vision to simplify invoicing for freelancers and small businesses.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2019</div>
                        <h3 class="timeline-title">Mobile App Launch</h3>
                        <p class="timeline-desc">Released our iOS and Android apps, allowing users to invoice from anywhere.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2020</div>
                        <h3 class="timeline-title">Payment Integration</h3>
                        <p class="timeline-desc">Added secure payment processing with multiple gateway options.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2021</div>
                        <h3 class="timeline-title">100K Users</h3>
                        <p class="timeline-desc">Reached the milestone of 100,000 active users across 80 countries.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2023</div>
                        <h3 class="timeline-title">AI-Powered Insights</h3>
                        <p class="timeline-desc">Introduced predictive analytics to help businesses forecast cash flow.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2024</div>
                        <h3 class="timeline-title">Global Expansion</h3>
                        <p class="timeline-desc">Expanded our services to support businesses in 120 countries worldwide.</p>
                    </div>
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
                    <div class="stat-label">Happy Users</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number">120</div>
                    <div class="stat-label">Countries Served</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number">15M+</div>
                    <div class="stat-label">Invoices Created</div>
                </div>

                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Customer Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content">
                <h2>Join Thousands of Satisfied Users</h2>
                <p>Experience the simplicity of professional invoicing with our powerful tools</p>
                <a href="./invoice.php" class="cta-button">
                    <i class="fas fa-bolt"></i>Create Your First Invoice
                </a>
            </div>
        </div>
    </section>

    <!-- Footer (same as home page) -->
    <footer id="contact">
        <div class="container">
            <div class="footer-container">
                <div class="footer-section about">
                    <h3>About Us</h3>
                    <p>Invoice Simple helps freelancers and small businesses create professional invoices easily. Trusted by thousands worldwide.</p>
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-section support">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
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
                }
            });
        });

        const hiddenElements = document.querySelectorAll('.value-card, .team-member, .timeline-content, .mission-image');
        hiddenElements.forEach((el) => {
            el.classList.add('hidden');
            observer.observe(el);
        });
    </script>
</body>

</html>