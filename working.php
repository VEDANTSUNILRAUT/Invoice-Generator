<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How It Works | Invoice Simple</title>
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

        /* Hero Section for How It Works Page */
        .how-hero {
            min-height: 60vh;
            display: flex;
            align-items: center;
            padding: 150px 0 80px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #f0f5ff 0%, #e6f0ff 100%);
            text-align: center;
        }

        .how-hero::before {
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

        .how-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .how-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--dark);
        }

        .how-hero h1 span {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .how-hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--gray);
        }

        /* Steps Section */
        .steps-section {
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

        .steps-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .steps-container::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            background: rgba(67, 97, 238, 0.1);
            z-index: 1;
        }

        .step-row {
            display: flex;
            margin-bottom: 60px;
            position: relative;
            z-index: 2;
        }

        .step-row:nth-child(even) {
            flex-direction: row-reverse;
        }

        .step-content {
            flex: 1;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(67, 97, 238, 0.1);
            position: relative;
            transition: var(--transition);
        }

        .step-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
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
            z-index: 3;
        }

        .step-content h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .step-content p {
            color: var(--gray);
            margin-bottom: 20px;
        }

        .step-image {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .step-image img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: transform 0.5s ease;
        }

        .step-image img:hover {
            transform: scale(1.03);
        }

        /* Preview Section */
        .preview-section {
            padding: 100px 0;
            background-color: #f5f9ff;
            text-align: center;
        }

        .invoice-preview {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid rgba(67, 97, 238, 0.1);
        }

        .invoice-header {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            padding: 30px;
            text-align: center;
        }

        .invoice-header h3 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .invoice-body {
            padding: 30px;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .from-to {
            display: flex;
            gap: 40px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .from,
        .to {
            flex: 1;
            min-width: 250px;
            text-align: left;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .invoice-table th {
            background: rgba(67, 97, 238, 0.1);
            padding: 15px;
            text-align: left;
        }

        .invoice-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .invoice-totals {
            text-align: right;
            margin-bottom: 30px;
        }

        .invoice-totals p {
            margin: 10px 0;
            font-size: 1.1rem;
        }

        .invoice-footer {
            border-top: 1px solid #eee;
            padding: 20px;
            text-align: center;
            color: var(--gray);
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
            .how-hero h1 {
                font-size: 3rem;
            }

            .steps-container::before {
                left: 30px;
            }

            .step-row,
            .step-row:nth-child(even) {
                flex-direction: column;
                margin-bottom: 80px;
            }

            .step-content {
                margin-top: 40px;
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

            .how-hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .cta-banner h2 {
                font-size: 2.2rem;
            }

            .step-number {
                top: -20px;
                left: 50%;
                transform: translateX(-50%);
            }
        }

        @media (max-width: 480px) {
            .how-hero h1 {
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
                    <a href="index.html">Home</a>
                    <a href="services.html">Services</a>
                    <a href="about.html">About</a>
                    <a href="how-it-works.html" class="active">How It Works</a>
                    <a href="contact.html">Contact</a>
                </nav>

                <div class="auth-buttons">
                    <a href="#" class="login-btn">Login</a>
                    <a href="#" class="signup-btn">Sign Up</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="how-hero">
        <div class="container">
            <div class="how-hero-content">
                <h1>How to Create <span>Professional Invoices</span> in Minutes</h1>
                <p>Follow our simple step-by-step process to create, customize, and download beautiful invoices that get you paid faster.</p>
            </div>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="steps-section">
        <div class="container">
            <div class="section-title">
                <h2>Simple 7-Step Process</h2>
                <p>Create professional invoices effortlessly with our intuitive workflow</p>
            </div>

            <div class="steps-container">
                <!-- Step 1 -->
                <div class="step-row">
                    <div class="step-content">
                        <div class="step-number">1</div>
                        <h3>Enter Business & Client Details</h3>
                        <p>Start by filling in your business information and your client's details. This includes names, addresses, contact information, and tax IDs if applicable.</p>
                        <p>Our system saves your business information for future invoices, so you only need to enter it once.</p>
                    </div>
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?q=80&w=500" alt="Enter Details">
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step-row">
                    <div class="step-content">
                        <div class="step-number">2</div>
                        <h3>Add Line Items</h3>
                        <p>List all products or services you're billing for. For each item, include:</p>
                        <ul style="list-style: none; padding-left: 0;">
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Detailed description</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Quantity</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Unit price</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Any applicable discounts</li>
                        </ul>
                        <p>The system automatically calculates totals for each line item.</p>
                    </div>
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=500" alt="Add Line Items">
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step-row">
                    <div class="step-content">
                        <div class="step-number">3</div>
                        <h3>Apply Taxes & Discounts</h3>
                        <p>Set up tax rates that apply to your invoice. Our system supports multiple tax rates and automatically calculates taxes based on your location and business type.</p>
                        <p>Apply discounts at the invoice level or to specific items. Choose between percentage-based or fixed-amount discounts.</p>
                    </div>
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1604594849809-dfedbc827105?q=80&w=500" alt="Taxes & Discounts">
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step-row">
                    <div class="step-content">
                        <div class="step-number">4</div>
                        <h3>Add Notes & Payment Terms</h3>
                        <p>Include important notes for your client, such as payment instructions, project details, or thank you messages.</p>
                        <p>Set clear payment terms including due date, late payment fees, and accepted payment methods. Our system will automatically track payment status.</p>
                    </div>
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=500" alt="Notes & Terms">
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="step-row">
                    <div class="step-content">
                        <div class="step-number">5</div>
                        <h3>Customize Appearance</h3>
                        <p>Personalize your invoice with our customization options:</p>
                        <ul style="list-style: none; padding-left: 0;">
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Upload your logo for branding</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Choose from professional color themes</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Add your digital signature</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Select from multiple templates</li>
                        </ul>
                    </div>
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?q=80&w=500" alt="Customize Appearance">
                    </div>
                </div>

                <!-- Step 6 -->
                <div class="step-row">
                    <div class="step-content">
                        <div class="step-number">6</div>
                        <h3>Preview Your Invoice</h3>
                        <p>Before finalizing, preview your invoice exactly as your client will see it. Check all details including:</p>
                        <ul style="list-style: none; padding-left: 0;">
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Company and client information</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Itemized list with calculations</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Taxes and discounts applied</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Payment terms and notes</li>
                        </ul>
                        <p>Make any necessary adjustments at this stage.</p>
                    </div>
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=500" alt="Preview Invoice">
                    </div>
                </div>

                <!-- Step 7 -->
                <div class="step-row">
                    <div class="step-content">
                        <div class="step-number">7</div>
                        <h3>Download & Send</h3>
                        <p>Once satisfied with your invoice, download it as a PDF for printing or email directly to your client.</p>
                        <p>Additional options include:</p>
                        <ul style="list-style: none; padding-left: 0;">
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Save as template for future use</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Duplicate for recurring invoices</li>
                            <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Track payment status online</li>
                        </ul>
                    </div>
                    <div class="step-image">
                        <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?q=80&w=500" alt="Download & Send">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Section -->
    <section class="preview-section">
        <div class="container">
            <div class="section-title">
                <h2>Professional Invoice Preview</h2>
                <p>See what your clients will receive with our beautiful templates</p>
            </div>

            <div class="invoice-preview">
                <div class="invoice-header">
                    <h3>INVOICE</h3>
                    <p>#INV-2023-001</p>
                </div>

                <div class="invoice-body">
                    <div class="invoice-details">
                        <div>
                            <p><strong>Date:</strong> October 15, 2023</p>
                            <p><strong>Due Date:</strong> October 30, 2023</p>
                        </div>
                        <div>
                            <p><strong>Status:</strong> Unpaid</p>
                        </div>
                    </div>

                    <div class="from-to">
                        <div class="from">
                            <h4>From:</h4>
                            <p>Your Business Name</p>
                            <p>123 Business Street</p>
                            <p>Amravati, Maharashtra, India</p>
                            <p>support@yourbusiness.com</p>
                            <p>+91 98765 43210</p>
                        </div>

                        <div class="to">
                            <h4>To:</h4>
                            <p>Client Company Name</p>
                            <p>456 Client Avenue</p>
                            <p>Mumbai, Maharashtra, India</p>
                            <p>contact@clientcompany.com</p>
                            <p>+91 98765 12340</p>
                        </div>
                    </div>

                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Website Design Services</td>
                                <td>10</td>
                                <td>₹5,000.00</td>
                                <td>₹50,000.00</td>
                            </tr>
                            <tr>
                                <td>Content Management System</td>
                                <td>1</td>
                                <td>₹25,000.00</td>
                                <td>₹25,000.00</td>
                            </tr>
                            <tr>
                                <td>SEO Optimization</td>
                                <td>1</td>
                                <td>₹15,000.00</td>
                                <td>₹15,000.00</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="invoice-totals">
                        <p><strong>Subtotal:</strong> ₹90,000.00</p>
                        <p><strong>Tax (18%):</strong> ₹16,200.00</p>
                        <p><strong>Discount (5%):</strong> -₹4,500.00</p>
                        <p style="font-size: 1.3rem; margin-top: 20px;"><strong>Total Due:</strong> ₹101,700.00</p>
                    </div>

                    <div class="invoice-footer">
                        <p>Thank you for your business! Payment is due within 15 days.</p>
                        <p>Make checks payable to Your Business Name</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Create Your First Invoice?</h2>
                <p>Join thousands of businesses that trust Invoice Simple for professional invoicing</p>
                <a href="./invoice.php" class="cta-button">
                    <i class="fas fa-bolt"></i>Generate Invoice Now
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
                        <li><a href="services.html">Services</a></li>
                        <a href="how-it-works.html" class="active">How It Works</a>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
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
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1
        });

        const animatedElements = document.querySelectorAll('.step-content, .invoice-preview');
        animatedElements.forEach((el) => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>

</html>