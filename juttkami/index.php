<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPOS - Enterprise-Grade Point of Sale Solution</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #0ea5e9;
            --accent: #f59e0b;
            --dark: #0f172a;
            --gray: #64748b;
            --light-gray: #f1f5f9;
            --white: #ffffff;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: all 0.3s;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 3rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 500;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .btn-signup {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            padding: 0.7rem 2rem;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.6);
        }

        /* Hero Section */
        .hero {
            padding: 140px 3rem 100px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -2px;
            animation: fadeInUp 0.8s ease-out;
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 3rem;
            opacity: 0.95;
            line-height: 1.8;
            animation: fadeInUp 1s ease-out;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            animation: fadeInUp 1.2s ease-out;
        }

        .btn-primary {
            background: var(--white);
            color: var(--primary);
            padding: 1.2rem 3rem;
            border-radius: 50px;
            border: none;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--white);
            padding: 1.2rem 3rem;
            border-radius: 50px;
            border: 2px solid var(--white);
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: var(--white);
            color: var(--primary);
            transform: translateY(-3px);
        }

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

        /* Animated Stats Section */
        .stats-section {
            padding: 80px 3rem;
            background: var(--dark);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 4rem;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(99, 102, 241, 0.3), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .stat-card:hover {
            transform: translateY(-10px);
            background: rgba(99, 102, 241, 0.2);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.3);
        }

        .stat-number {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .stat-label {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            z-index: 2;
        }

        .stat-description {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 0.5rem;
            position: relative;
            z-index: 2;
        }

        /* Features Section */
        .features {
            padding: 100px 3rem;
            background: var(--white);
        }

        .section-title {
            text-align: center;
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--dark);
            letter-spacing: -1px;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.3rem;
            color: var(--gray);
            margin-bottom: 4rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .features-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 3rem;
        }

        .feature-card {
            padding: 3rem;
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            border-color: var(--primary);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--white);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
            transition: all 0.4s;
        }

        .feature-card:hover .feature-icon {
            transform: rotateY(360deg);
        }

        .feature-card h3 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            font-weight: 700;
        }

        .feature-card p {
            color: var(--gray);
            line-height: 1.8;
            font-size: 1.05rem;
        }

        /* Pricing Section */
        .pricing {
            padding: 100px 3rem;
            background: linear-gradient(180deg, #f8fafc 0%, #e2e8f0 100%);
        }

        .pricing-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
        }

        .pricing-card {
            background: var(--white);
            border-radius: 24px;
            padding: 3rem;
            text-align: center;
            border: 2px solid #e2e8f0;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }

        .pricing-card::after {
            content: '';
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, transparent, rgba(99, 102, 241, 0.05));
            transition: top 0.4s;
        }

        .pricing-card:hover::after {
            top: 0;
        }

        .pricing-card:hover {
            transform: scale(1.05);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        }

        .pricing-card.featured {
            border-color: var(--primary);
            background: linear-gradient(145deg, #ffffff, #fafbff);
            box-shadow: 0 20px 60px rgba(99, 102, 241, 0.25);
            transform: scale(1.05);
        }

        .pricing-badge {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            position: relative;
            z-index: 1;
        }

        .pricing-card h3 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            font-weight: 800;
            position: relative;
            z-index: 1;
        }

        .price {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .price-period {
            color: var(--gray);
            margin-bottom: 3rem;
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .pricing-features {
            list-style: none;
            margin-bottom: 3rem;
            text-align: left;
            position: relative;
            z-index: 1;
        }

        .pricing-features li {
            padding: 1rem 0;
            border-bottom: 1px solid #e2e8f0;
            color: var(--dark);
            font-size: 1.05rem;
            transition: all 0.3s;
        }

        .pricing-features li:hover {
            padding-left: 10px;
            color: var(--primary);
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        .btn-pricing {
            width: 100%;
            padding: 1.3rem;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            font-size: 1.1rem;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
            position: relative;
            z-index: 1;
        }

        .btn-pricing:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(99, 102, 241, 0.5);
        }

        /* Contact Section */
        .contact {
            padding: 100px 3rem;
            background: var(--white);
        }

        .contact-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            color: var(--dark);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1.3rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1.05rem;
            transition: all 0.3s;
            background: var(--light-gray);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 180px;
        }

        .btn-submit {
            width: 100%;
            padding: 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(99, 102, 241, 0.5);
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: var(--white);
            padding: 4rem 3rem 2rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h4 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.8rem;
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .social-links a {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            text-decoration: none;
            font-size: 1.3rem;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-5px);
        }

        .copyright {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.95rem;
        }

        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 3rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .pricing-grid,
            .features-grid {
                grid-template-columns: 1fr;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .stats-container {
                gap: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <a href="#" class="logo">QuickPOS</a>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><button class="btn-signup">Start Free Trial</button></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Enterprise-Grade Point of Sale Solution</h1>
                <p>Transform your business operations with cutting-edge technology. QuickPOS delivers unparalleled performance, security, and scalability for businesses of all sizes.</p>
                <div class="hero-buttons">
                    <a href="#pricing" class="btn-primary">Start Free Trial</a>
                    <a href="#features" class="btn-secondary">Explore Features</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Animated Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number" data-target="50000">0</div>
                <div class="stat-label">Active Businesses</div>
                <div class="stat-description">Trust QuickPOS worldwide</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="99.9">0</div>
                <div class="stat-label">% Uptime</div>
                <div class="stat-description">Guaranteed reliability</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="2">0</div>
                <div class="stat-label">Billion+</div>
                <div class="stat-description">Transactions processed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="24">0</div>
                <div class="stat-label">7 Support</div>
                <div class="stat-description">Always here to help</div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <h2 class="section-title">Powerful Enterprise Features</h2>
        <p class="section-subtitle">Everything you need to run and grow your business efficiently with state-of-the-art technology</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📦</div>
                <h3>Advanced Inventory Management</h3>
                <p>Real-time stock tracking across multiple locations, automated reorder points, batch management, and comprehensive inventory analytics to optimize your supply chain.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Business Intelligence & Analytics</h3>
                <p>Gain actionable insights with advanced reporting, predictive analytics, custom dashboards, and AI-powered business intelligence to drive strategic decisions.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔗</div>
                <h3>Seamless Integrations</h3>
                <p>Connect with 100+ business tools including QuickBooks, Xero, Shopify, WooCommerce, and more. RESTful API for custom integrations and unlimited possibilities.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💳</div>
                <h3>Secure Payment Processing</h3>
                <p>Accept all payment methods with PCI DSS Level 1 compliance. Support for credit cards, digital wallets, contactless payments, and cryptocurrency transactions.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Customer Relationship Management</h3>
                <p>Build lasting relationships with integrated CRM, loyalty programs, personalized marketing campaigns, and detailed customer insights for targeted engagement.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Enterprise Security</h3>
                <p>Bank-grade encryption, role-based access control, audit trails, and compliance with GDPR, CCPA, and SOC 2 standards to protect your business data.</p>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing">
        <h2 class="section-title">Flexible Pricing Plans</h2>
        <p class="section-subtitle">Choose the perfect plan for your business. Scale as you grow with no hidden fees.</p>
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>Starter</h3>
                <div class="price">$29</div>
                <div class="price-period">per month</div>
                <ul class="pricing-features">
                    <li>✓ Up to 1,000 products</li>
                    <li>✓ 1 POS terminal</li>
                    <li>✓ Basic reporting & analytics</li>
                    <li>✓ Email support (24hr response)</li>
                    <li>✓ Mobile app access</li>
                    <li>✓ Standard integrations</li>
                </ul>
                <button class="btn-pricing">Start Free Trial</button>
            </div>
            <div class="pricing-card featured">
                <span class="pricing-badge">Most Popular</span>
                <h3>Professional</h3>
                <div class="price">$79</div>
                <div class="price-period">per month</div>
                <ul class="pricing-features">
                    <li>✓ Unlimited products</li>
                    <li>✓ 5 POS terminals</li>
                    <li>✓ Advanced analytics & AI insights</li>
                    <li>✓ Priority support (4hr response)</li>
                    <li>✓ Full API access</li>
                    <li>✓ Custom integrations</li>
                    <li>✓ Multi-location support</li>
                    <li>✓ CRM & loyalty programs</li>
                </ul>
                <button class="btn-pricing">Start Free Trial</button>
            </div>
            <div class="pricing-card">
                <h3>Enterprise</h3>
                <div class="price">Custom</div>
                <div class="price-period">contact sales</div>
                <ul class="pricing-features">
                    <li>✓ Everything in Professional</li>
                    <li>✓ Unlimited terminals</li>
                    <li>✓ Dedicated account manager</li>
                    <li>✓ 24/7 phone & priority support</li>
                    <li>✓ Custom development</li>
                    <li>✓ White-label options</li>
                    <li>✓ Advanced security features</li>
                    <li>✓ Training & onboarding</li>
                    <li>✓ SLA guarantee</li>
                </ul>
                <button class="btn-pricing">Contact Sales</button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2 class="section-title">Get In Touch</h2>
        <p class="section-subtitle">Have questions? Our team is here to help you succeed.</p>
        <div class="contact-container">
            <form method="POST" action="script.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>QuickPOS</h4>
                    <p style="color: rgba(255, 255, 255, 0.7); line-height: 1.8;">
                        The most advanced point of sale solution for modern businesses. Trusted by over 50,000 businesses worldwide.
                    </p>
                </div>
                <div class="footer-section">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#">Integrations</a></li>
                        <li><a href="#">API Documentation</a></li>
                        <li><a href="#">Changelog</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press Kit</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">Case Studies</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="social-links">
                    <a href="#" aria-label="Facebook">📘</a>
                    <a href="#" aria-label="Twitter">🐦</a>
                    <a href="#" aria-label="LinkedIn">💼</a>
                    <a href="#" aria-label="Instagram">📷</a>
                </div>
                <p class="copyright">© 2024 QuickPOS. All rights reserved. Built with passion for businesses worldwide.</p>
            </div>
        </div>
    </footer>

    <script>
        // Animated counter for stats
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        }

        // Intersection Observer for stats animation
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const target = parseFloat(stat.dataset.target);
                        animateCounter(stat, target);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe stats section
        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Smooth scrolling for navigation links
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

        // Form submission handler
        function handleSubmit(event) {
            event.preventDefault();
            
            const form = event.target;
            const successMessage = document.getElementById('successMessage');
            
            // Show success message
            successMessage.style.display = 'block';
            
            // Scroll to success message
            successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Reset form
            form.reset();
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        }

        // Add scroll effect to navbar
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            const currentScroll = window.pageYOffset;

            if (currentScroll > 100) {
                nav.style.padding = '0.8rem 0';
                nav.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.4)';
            } else {
                nav.style.padding = '1.2rem 0';
                nav.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.3)';
            }

            lastScroll = currentScroll;
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const hero = document.querySelector('.hero');
            const scrolled = window.pageYOffset;
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Feature cards entrance animation
        const featureObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    featureObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.feature-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease-out';
            featureObserver.observe(card);
        });

        // Pricing cards entrance animation
        const pricingObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'scale(1)';
                    }, index * 150);
                    pricingObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.pricing-card').forEach(card => {
            if (!card.classList.contains('featured')) {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                card.style.transition = 'all 0.6s ease-out';
            }
            pricingObserver.observe(card);
        });
    </script>
</body>
</html>
