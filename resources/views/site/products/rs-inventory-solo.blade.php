@php
    $pageTitle = $title ?? 'RS Inventory – Solo | Retail Inventory & Billing Software';
    $pageDescription = $description ?? 'Discover RS Inventory – Solo by RS ORANGE TECH, a retail inventory and billing management solution designed to help businesses organize products, manage stock, and handle everyday sales operations.';
    $pageCanonical = $canonicalUrl ?? url('/products/rs-inventory-solo');
@endphp
@extends('site.layout')

@push('head')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $pageTitle }}">
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $pageCanonical }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $pageCanonical }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:image" content="{{ asset('site-assets/rs-inventory-solo-dashboard.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $pageCanonical }}">
    <meta property="twitter:title" content="{{ $pageTitle }}">
    <meta property="twitter:description" content="{{ $pageDescription }}">
    <meta property="twitter:image" content="{{ asset('site-assets/rs-inventory-solo-dashboard.jpg') }}">

    <!-- Custom Page Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/rs-inventory-solo.css') }}?v=1.02">

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@graph": [
            {
                "@@type": "SoftwareApplication",
                "name": "RS Inventory – Solo",
                "applicationCategory": "BusinessApplication",
                "operatingSystem": "Web / Cross-Platform Desktop",
                "publisher": {
                    "@@type": "Organization",
                    "name": "RS ORANGE TECH PVT LTD",
                    "url": "{{ url('/') }}",
                    "logo": "{{ asset('rslogo.png') }}"
                },
                "description": "{{ $pageDescription }}",
                "offers": {
                    "@@type": "Offer",
                    "price": "0",
                    "priceCurrency": "INR",
                    "description": "Demonstration and customized consultation available on request"
                }
            },
            {
                "@@type": "FAQPage",
                "mainEntity": [
                    {
                        "@@type": "Question",
                        "name": "What is RS Inventory – Solo?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "RS Inventory – Solo is a retail inventory and point-of-sale (POS) billing software solution developed by RS ORANGE TECH to help store owners manage products, track stock, generate invoices, and view business reports from a single application."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Who can use RS Inventory – Solo?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "The software is designed for small retail stores, independent retailers, apparel boutiques, grocery shops, electronics dealers, hardware stores, and general retail businesses requiring dependable stock management and invoice generation."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can I manage products and stock using RS Inventory – Solo?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. You can add, edit, and categorize items, maintain SKU and barcode details, set selling and purchase prices, monitor stock balances, and log stock additions or reductions."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can I create sales invoices?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. RS Inventory – Solo provides a retail POS billing workflow where you can quickly add products to an invoice, compute subtotal and taxes, record payment methods, and generate print-ready sales bills."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Does the software support customer management?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. Store staff can record customer contact details, associate them with invoices, and track customer purchase histories."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can I view sales and inventory reports?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. The system provides sales summaries, inventory balances, low-stock warnings, and transaction reports to give you clear visibility into everyday operations."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Does RS Inventory – Solo support promotional coupons?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Promotional coupon functionality—including coupon codes, validity windows, and discount rules—is supported as a configurable promotional module."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can customers earn and redeem wallet points?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Customer wallet point accumulation and redemption against bills can be enabled and configured based on your store's specific loyalty policies."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Does the software support multiple computers?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. Deployment architectures can be configured for a single primary checkout PC or scaled across multiple counter terminals connected over a local network or cloud server."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "How can I request a demonstration?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "You can request a live product walkthrough by submitting the Demo Request form on this page or contacting the RS ORANGE TECH team directly."
                        }
                    }
                ]
            }
        ]
    }
    </script>
@endpush

@section('content')
<div class="solo-page">

    <!-- ========================================================
         SECTION 1: HERO SECTION
         ======================================================== -->
    <section class="solo-hero" id="hero">
        <div class="solo-container">
            <div class="solo-hero-grid">
                
                <!-- Left Column: Copy & CTAs -->
                <div class="solo-hero-content">
                    <div class="solo-product-brand">
                        <div class="solo-brand-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <div class="solo-brand-title">
                            RS Inventory <span>– Solo</span>
                        </div>
                        <span class="solo-badge primary">Retail Software</span>
                    </div>

                    <h1>Manage Your Inventory. <span class="gradient-text">Simplify Your Billing.</span></h1>
                    
                    <p class="solo-hero-sub">
                        RS Inventory – Solo is designed to help retailers manage products, track stock, create sales invoices, and organize everyday store operations from one convenient application.
                    </p>

                    <div class="solo-hero-ctas">
                        <a href="#demo-request" class="solo-btn solo-btn-primary">
                            <span>Request a Demo</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <a href="#features" class="solo-btn solo-btn-outline">
                            <span>Explore Features</span>
                        </a>
                    </div>

                    <div class="solo-hero-pills">
                        <div class="solo-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Fast POS Checkout</span>
                        </div>
                        <div class="solo-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Live Stock Levels</span>
                        </div>
                        <div class="solo-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Customer Loyalty Wallet</span>
                        </div>
                        <div class="solo-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Promotional Coupon Engine</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Visual Dashboard Preview -->
                <div class="solo-hero-visual">
                    <div class="solo-mockup-frame">
                        <div class="solo-mockup-chrome">
                            <span class="chrome-dot red"></span>
                            <span class="chrome-dot yellow"></span>
                            <span class="chrome-dot green"></span>
                            <span class="chrome-title">RS Inventory – Solo | Store Management Dashboard</span>
                        </div>
                        <img src="{{ asset('site-assets/rs-inventory-solo-dashboard.jpg') }}" 
                             alt="RS Inventory – Solo Dashboard Software Screenshot" 
                             class="solo-mockup-img"
                             loading="eager"
                             width="1280"
                             height="720">
                    </div>

                    <!-- Floating Indicator Badges -->
                    <div class="solo-floating-card card-top-right">
                        <div class="float-icon orange">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="float-text">
                            <strong>₹28,450 Today</strong>
                            <span>POS Billing Active</span>
                        </div>
                    </div>

                    <div class="solo-floating-card card-bottom-left">
                        <div class="float-icon blue">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            </svg>
                        </div>
                        <div class="float-text">
                            <strong>142 Active SKUs</strong>
                            <span>Real-Time Inventory</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 2: PRODUCT FEATURES
         ======================================================== -->
    <section class="solo-features" id="features">
        <div class="solo-container">
            <div class="solo-section-header">
                <span class="solo-badge primary">Comprehensive Capabilities</span>
                <h2>Built to Support Everyday Store Operations</h2>
                <p>Explore the essential toolset provided by RS Inventory – Solo to streamline product organization, maintain accurate stock records, and speed up retail checkout.</p>
            </div>

            <div class="solo-features-grid">
                
                <!-- Feature A: Product Management -->
                <div class="solo-feature-card">
                    <div class="solo-card-top">
                        <div class="solo-feature-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                        </div>
                        <span class="solo-badge green">Core Module</span>
                    </div>
                    <h3>Product Management</h3>
                    <p class="solo-feature-desc">Catalog and organize all your retail store items in one centralized database with custom pricing and attributes.</p>
                    <ul class="solo-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Add, edit, and categorize items with barcodes and SKUs</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Organize items into structured product categories</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Manage selling prices (MRP) and purchase costs</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Instant search and category-based filtering</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature B: Inventory Management -->
                <div class="solo-feature-card">
                    <div class="solo-card-top">
                        <div class="solo-feature-icon blue">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <span class="solo-badge green">Core Module</span>
                    </div>
                    <h3>Inventory Management</h3>
                    <p class="solo-feature-desc">Monitor available stock in real time, prevent unrecorded losses, and receive warnings before critical items run out.</p>
                    <ul class="solo-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Track real-time available quantities across all products</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Record stock additions, supplier arrivals, and damage write-offs</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Automated low-stock visual notifications</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Audit-ready stock movement logs and history</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature C: Retail Billing and POS -->
                <div class="solo-feature-card">
                    <div class="solo-card-top">
                        <div class="solo-feature-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </div>
                        <span class="solo-badge green">Core Module</span>
                    </div>
                    <h3>Retail Billing & POS</h3>
                    <p class="solo-feature-desc">Generate accurate invoices quickly during busy store hours with a streamlined point-of-sale checkout counter workflow.</p>
                    <ul class="solo-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Create instant sales invoices with barcode scan or fast search</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Automatic line-item totals, tax calculation, and bill rounding</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Apply supported item or bill discounts (flat or %)</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Record payment methods: Cash, UPI / QR, Card, or Split</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature D: Customer Management -->
                <div class="solo-feature-card">
                    <div class="solo-card-top">
                        <div class="solo-feature-icon navy">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <span class="solo-badge green">Core Module</span>
                    </div>
                    <h3>Customer Management</h3>
                    <p class="solo-feature-desc">Build stronger customer relationships by keeping contact details and past purchase records organized in one place.</p>
                    <ul class="solo-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Register customer names, phone numbers, and optional GSTIN</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Associate registered customers with invoices for easy tracking</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>View customer purchase frequency and historical bills</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Identify regular store patrons and top buyers</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature E: Reports and Analytics -->
                <div class="solo-feature-card">
                    <div class="solo-card-top">
                        <div class="solo-feature-icon blue">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="14"></line>
                            </svg>
                        </div>
                        <span class="solo-badge green">Core Module</span>
                    </div>
                    <h3>Reports & Analytics</h3>
                    <p class="solo-feature-desc">Understand how your store is performing each day through clear tables and visual transaction reports.</p>
                    <ul class="solo-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Review daily, weekly, and monthly sales revenues</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Track total inventory valuation and stock balances</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Identify top-selling products and fast-moving SKUs</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Export sales summaries for end-of-day accounts reconciliation</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature F: Promotional Coupons -->
                <div class="solo-feature-card">
                    <div class="solo-card-top">
                        <div class="solo-feature-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                <line x1="10" y1="14" x2="10" y2="18"></line>
                            </svg>
                        </div>
                        <span class="solo-badge green">Included Built-in</span>
                    </div>
                    <h3>Promotional Coupons</h3>
                    <p class="solo-feature-desc">Attract shoppers and encourage repeat visits with customizable promotional discount codes applied during billing.</p>
                    <ul class="solo-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Create custom alphanumeric coupon codes</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Define promotional validity dates and expiration rules</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Configure percentage discounts or flat bill reductions</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Apply eligible coupons directly at checkout register</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature G: Customer Wallet & Loyalty Points -->
                <div class="solo-feature-card">
                    <div class="solo-card-top">
                        <div class="solo-feature-icon navy">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                <line x1="2" y1="10" x2="22" y2="10"></line>
                                <circle cx="16" cy="15" r="1.5"></circle>
                            </svg>
                        </div>
                        <span class="solo-badge green">Included Built-in</span>
                    </div>
                    <h3>Loyalty & Wallet Points</h3>
                    <p class="solo-feature-desc">Reward your frequent retail customers by awarding points on qualifying purchases that can be redeemed on future visits.</p>
                    <ul class="solo-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Credit reward points to customer accounts on eligible bills</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Maintain and display customer loyalty point balances</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Redeem eligible points against future sales invoices</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Configurable redemption limits and minimum bill thresholds</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature H: Communication Settings -->
                <div class="solo-feature-card">
                    <div class="solo-card-top">
                        <div class="solo-feature-icon blue">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <span class="solo-badge neutral">Configurable Integration</span>
                    </div>
                    <h3>Communication Settings</h3>
                    <p class="solo-feature-desc">Connect your preferred communication gateways to deliver digital invoices and transaction notifications to store customers.</p>
                    <ul class="solo-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Configurable SMTP email settings for digital bill dispatch</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Integration hooks for customer SMS notification gateways</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Configurable WhatsApp messaging provider support</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Customer communication related to billing and promotions</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 3: INTERACTIVE PRODUCT DEMO
         ======================================================== -->
    <section class="solo-demo-section" id="demo">
        <div class="solo-container">
            <div class="solo-section-header">
                <span class="solo-badge primary">Hands-On Experience</span>
                <h2>Explore RS Inventory – Solo</h2>
                <p>Interact with the live demonstration environment below to test typical retail workflows—from viewing the dashboard and checking inventory levels to simulating a POS register checkout.</p>
            </div>

            <!-- Prominent Demonstration Label -->
            <div class="solo-demo-disclaimer">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></line>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span><strong>Interactive Preview – Sample Data:</strong> This sandbox demonstrates interface workflows and layout using simulated retail data. No data is written to a production database, and no login credentials are required.</span>
            </div>

            <!-- Application Container -->
            <div class="solo-demo-app">
                <!-- App Topbar -->
                <div class="demo-app-topbar">
                    <div class="demo-app-identity">
                        <div class="demo-app-logo">RS</div>
                        <div class="demo-app-name">RS Inventory – Solo <span style="font-weight:400; opacity:0.8;">| Retail Suite</span></div>
                    </div>
                    <div class="demo-app-status">
                        <span class="demo-status-pill">
                            <span class="indicator-dot"></span>
                            Interactive Sandbox
                        </span>
                        <span>Sample Store: <strong>City Retailers</strong></span>
                    </div>
                </div>

                <!-- Navigation Tabs -->
                <div class="demo-tabs-nav" role="tablist" aria-label="Demo Tabs">
                    <button type="button" class="demo-tab-btn active" data-tab="tab-dashboard" role="tab" aria-selected="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        Dashboard
                    </button>
                    <button type="button" class="demo-tab-btn" data-tab="tab-products" role="tab" aria-selected="false">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path></svg>
                        Product Catalog
                    </button>
                    <button type="button" class="demo-tab-btn" data-tab="tab-stock" role="tab" aria-selected="false">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                        Stock Movement
                    </button>
                    <button type="button" class="demo-tab-btn" data-tab="tab-pos" role="tab" aria-selected="false">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        POS Billing Simulator
                    </button>
                    <button type="button" class="demo-tab-btn" data-tab="tab-customers" role="tab" aria-selected="false">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                        Customers
                    </button>
                    <button type="button" class="demo-tab-btn" data-tab="tab-reports" role="tab" aria-selected="false">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        Sales Reports
                    </button>
                </div>

                <!-- 1. TAB: DASHBOARD -->
                <div class="demo-panel active" id="tab-dashboard">
                    <!-- KPI Cards -->
                    <div class="demo-kpi-grid">
                        <div class="demo-kpi-card">
                            <div class="demo-kpi-header">
                                <span>Today's Sales</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline></svg>
                            </div>
                            <div class="demo-kpi-val">₹28,450.00</div>
                            <div class="demo-kpi-note positive">▲ 8.4% compared to yesterday</div>
                        </div>

                        <div class="demo-kpi-card">
                            <div class="demo-kpi-header">
                                <span>Invoices Generated</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"></rect></svg>
                            </div>
                            <div class="demo-kpi-val">34 Bills</div>
                            <div class="demo-kpi-note">Average ticket: ₹836.00</div>
                        </div>

                        <div class="demo-kpi-card">
                            <div class="demo-kpi-header">
                                <span>Active Product SKUs</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                            </div>
                            <div class="demo-kpi-val">142 Items</div>
                            <div class="demo-kpi-note">Across 6 retail categories</div>
                        </div>

                        <div class="demo-kpi-card">
                            <div class="demo-kpi-header">
                                <span>Low-Stock Warnings</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            </div>
                            <div class="demo-kpi-val" style="color:#dc2626;">4 Items</div>
                            <div class="demo-kpi-note alert">Requires stock replenishment</div>
                        </div>
                    </div>

                    <!-- Split Overview: Recent Bills & Fast Actions -->
                    <div class="demo-dashboard-split">
                        <div class="demo-box">
                            <div class="demo-box-head">
                                <h4>Recent Counter Invoices</h4>
                                <span class="solo-badge neutral">Live Feed</span>
                            </div>
                            <div class="demo-table-wrapper">
                                <table class="demo-table">
                                    <thead>
                                        <tr>
                                            <th>Invoice #</th>
                                            <th>Time</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>INV-2026-849</strong></td>
                                            <td>10:42 AM</td>
                                            <td>Rajesh Kumar</td>
                                            <td>₹1,450.00</td>
                                            <td>UPI / QR</td>
                                            <td><span class="status-tag paid">Paid</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>INV-2026-848</strong></td>
                                            <td>10:31 AM</td>
                                            <td>Anita Sharma</td>
                                            <td>₹680.00</td>
                                            <td>Cash</td>
                                            <td><span class="status-tag paid">Paid</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>INV-2026-847</strong></td>
                                            <td>10:15 AM</td>
                                            <td>Walk-in Customer</td>
                                            <td>₹2,890.00</td>
                                            <td>Card</td>
                                            <td><span class="status-tag paid">Paid</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>INV-2026-846</strong></td>
                                            <td>09:55 AM</td>
                                            <td>Vikram Singh</td>
                                            <td>₹450.00</td>
                                            <td>UPI / QR</td>
                                            <td><span class="status-tag paid">Paid</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="demo-box">
                            <div class="demo-box-head">
                                <h4>Stock Replenishment Alerts</h4>
                                <span class="solo-badge amber">Urgent</span>
                            </div>
                            <div class="demo-table-wrapper">
                                <table class="demo-table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>In Stock</th>
                                            <th>Threshold</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Wireless Earbuds BT</td>
                                            <td><span class="status-tag low-stock">3 units</span></td>
                                            <td>10 units</td>
                                        </tr>
                                        <tr>
                                            <td>Basmati Rice (5kg Bag)</td>
                                            <td><span class="status-tag low-stock">4 bags</span></td>
                                            <td>15 bags</td>
                                        </tr>
                                        <tr>
                                            <td>Casual Denim Shirt (L)</td>
                                            <td><span class="status-tag low-stock">2 pcs</span></td>
                                            <td>8 pcs</td>
                                        </tr>
                                        <tr>
                                            <td>LED Bulb 9W Cool White</td>
                                            <td><span class="status-tag out-of-stock">0 pcs</span></td>
                                            <td>20 pcs</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. TAB: PRODUCT CATALOG -->
                <div class="demo-panel" id="tab-products">
                    <div class="demo-filter-bar">
                        <div class="demo-search-input">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            <input type="text" id="catalogSearchInput" placeholder="Search by name, SKU, or category...">
                        </div>
                        <div class="demo-category-pills">
                            <button type="button" class="category-pill-btn active" data-category="all">All Items</button>
                            <button type="button" class="category-pill-btn" data-category="apparel">Apparel</button>
                            <button type="button" class="category-pill-btn" data-category="groceries">Groceries</button>
                            <button type="button" class="category-pill-btn" data-category="electronics">Electronics</button>
                            <button type="button" class="category-pill-btn" data-category="footwear">Footwear</button>
                        </div>
                    </div>

                    <div class="demo-table-wrapper">
                        <table class="demo-table">
                            <thead>
                                <tr>
                                    <th>Item & Code</th>
                                    <th>Category</th>
                                    <th>Selling Price</th>
                                    <th>Purchase Cost</th>
                                    <th>In-Stock Qty</th>
                                    <th>Stock Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="catalog-item-row" data-category="apparel">
                                    <td><strong>Cotton Crew T-Shirt (M)</strong><br><span style="font-size:11px; color:#64748b;">SKU: APP-102 | Barcode: 89012345001</span></td>
                                    <td>Apparel</td>
                                    <td>₹499.00</td>
                                    <td>₹280.00</td>
                                    <td>45 units</td>
                                    <td><span class="status-tag in-stock">In Stock</span></td>
                                </tr>
                                <tr class="catalog-item-row" data-category="apparel">
                                    <td><strong>Casual Denim Shirt (L)</strong><br><span style="font-size:11px; color:#64748b;">SKU: APP-105 | Barcode: 89012345002</span></td>
                                    <td>Apparel</td>
                                    <td>₹1,199.00</td>
                                    <td>₹650.00</td>
                                    <td>2 units</td>
                                    <td><span class="status-tag low-stock">Low Stock</span></td>
                                </tr>
                                <tr class="catalog-item-row" data-category="groceries">
                                    <td><strong>Organic Honey (500g)</strong><br><span style="font-size:11px; color:#64748b;">SKU: GRO-304 | Barcode: 89012345003</span></td>
                                    <td>Groceries</td>
                                    <td>₹285.00</td>
                                    <td>₹190.00</td>
                                    <td>28 jars</td>
                                    <td><span class="status-tag in-stock">In Stock</span></td>
                                </tr>
                                <tr class="catalog-item-row" data-category="groceries">
                                    <td><strong>Basmati Rice Premium (5kg)</strong><br><span style="font-size:11px; color:#64748b;">SKU: GRO-308 | Barcode: 89012345004</span></td>
                                    <td>Groceries</td>
                                    <td>₹520.00</td>
                                    <td>₹410.00</td>
                                    <td>4 bags</td>
                                    <td><span class="status-tag low-stock">Low Stock</span></td>
                                </tr>
                                <tr class="catalog-item-row" data-category="electronics">
                                    <td><strong>Wireless Earbuds BT v5.2</strong><br><span style="font-size:11px; color:#64748b;">SKU: ELE-412 | Barcode: 89012345005</span></td>
                                    <td>Electronics</td>
                                    <td>₹1,499.00</td>
                                    <td>₹890.00</td>
                                    <td>3 units</td>
                                    <td><span class="status-tag low-stock">Low Stock</span></td>
                                </tr>
                                <tr class="catalog-item-row" data-category="electronics">
                                    <td><strong>Fast Charging Cable USB-C (1.5m)</strong><br><span style="font-size:11px; color:#64748b;">SKU: ELE-419 | Barcode: 89012345006</span></td>
                                    <td>Electronics</td>
                                    <td>₹249.00</td>
                                    <td>₹110.00</td>
                                    <td>62 units</td>
                                    <td><span class="status-tag in-stock">In Stock</span></td>
                                </tr>
                                <tr class="catalog-item-row" data-category="footwear">
                                    <td><strong>Lightweight Sport Running Shoes</strong><br><span style="font-size:11px; color:#64748b;">SKU: FTW-501 | Barcode: 89012345007</span></td>
                                    <td>Footwear</td>
                                    <td>₹1,899.00</td>
                                    <td>₹1,050.00</td>
                                    <td>18 pairs</td>
                                    <td><span class="status-tag in-stock">In Stock</span></td>
                                </tr>
                                <tr class="catalog-item-row" data-category="electronics">
                                    <td><strong>LED Bulb 9W Cool White</strong><br><span style="font-size:11px; color:#64748b;">SKU: ELE-430 | Barcode: 89012345008</span></td>
                                    <td>Electronics</td>
                                    <td>₹95.00</td>
                                    <td>₹55.00</td>
                                    <td>0 units</td>
                                    <td><span class="status-tag out-of-stock">Out of Stock</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 3. TAB: STOCK MOVEMENT -->
                <div class="demo-panel" id="tab-stock">
                    <div style="margin-bottom: 20px;">
                        <h4 style="margin: 0 0 6px; font-size: 16px; color: var(--solo-navy);">Inventory Audit Movement Ledger</h4>
                        <p style="margin: 0; font-size: 13px; color: var(--solo-muted);">Every inward stock shipment, customer checkout, and adjustment is recorded with an exact timestamp.</p>
                    </div>

                    <div class="demo-table-wrapper">
                        <table class="demo-table">
                            <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Product Name</th>
                                    <th>Movement Type</th>
                                    <th>Qty Change</th>
                                    <th>Reference Document</th>
                                    <th>Remaining Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Today, 10:42 AM</td>
                                    <td>Cotton Crew T-Shirt (M)</td>
                                    <td><span class="status-tag out-of-stock">POS Billing</span></td>
                                    <td style="color:#b91c1c; font-weight:700;">-2 units</td>
                                    <td>POS Bill #849</td>
                                    <td><strong>45 units</strong></td>
                                </tr>
                                <tr>
                                    <td>Today, 09:30 AM</td>
                                    <td>Fast Charging Cable USB-C</td>
                                    <td><span class="status-tag in-stock">Stock In / Purchase</span></td>
                                    <td style="color:#047857; font-weight:700;">+50 units</td>
                                    <td>PO #2026-118</td>
                                    <td><strong>62 units</strong></td>
                                </tr>
                                <tr>
                                    <td>Yesterday, 06:15 PM</td>
                                    <td>Lightweight Sport Running Shoes</td>
                                    <td><span class="status-tag out-of-stock">POS Billing</span></td>
                                    <td style="color:#b91c1c; font-weight:700;">-1 pair</td>
                                    <td>POS Bill #832</td>
                                    <td><strong>18 pairs</strong></td>
                                </tr>
                                <tr>
                                    <td>Yesterday, 02:40 PM</td>
                                    <td>Organic Honey (500g)</td>
                                    <td><span class="status-tag in-stock">Stock In / Purchase</span></td>
                                    <td style="color:#047857; font-weight:700;">+24 jars</td>
                                    <td>PO #2026-115</td>
                                    <td><strong>28 jars</strong></td>
                                </tr>
                                <tr>
                                    <td>20 Sep, 11:10 AM</td>
                                    <td>Casual Denim Shirt (L)</td>
                                    <td><span class="status-tag low-stock">Audit Correction</span></td>
                                    <td style="color:#b45309; font-weight:700;">-1 pc</td>
                                    <td>Internal Audit #ADJ-04</td>
                                    <td><strong>2 pcs</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 4. TAB: POS BILLING TERMINAL SIMULATOR -->
                <div class="demo-panel" id="tab-pos">
                    <div style="margin-bottom: 20px;">
                        <h4 style="margin: 0 0 6px; font-size: 16px; color: var(--solo-navy);">Interactive Counter Billing Register</h4>
                        <p style="margin: 0; font-size: 13px; color: var(--solo-muted);">Click any product below to add it to the active bill, adjust quantities, toggle discount rules, and complete a simulated sale.</p>
                    </div>

                    <div class="pos-terminal-grid">
                        <!-- Product Selection Grid -->
                        <div class="pos-product-browser">
                            <div style="font-size:13px; font-weight:700; color:var(--solo-navy); margin-bottom:12px;">
                                Quick Select Catalog (Click item to add)
                            </div>
                            <div class="pos-items-grid">
                                <div class="pos-item-card" data-id="item-1" data-name="Cotton Crew T-Shirt (M)" data-price="499" data-sku="APP-102">
                                    <div class="pos-item-name">Cotton Crew T-Shirt</div>
                                    <div class="pos-item-sku">APP-102 • 45 in stock</div>
                                    <div class="pos-item-footer">
                                        <div class="pos-item-price">₹499</div>
                                        <div class="pos-item-add">+</div>
                                    </div>
                                </div>

                                <div class="pos-item-card" data-id="item-2" data-name="Casual Denim Shirt (L)" data-price="1199" data-sku="APP-105">
                                    <div class="pos-item-name">Casual Denim Shirt</div>
                                    <div class="pos-item-sku">APP-105 • 2 in stock</div>
                                    <div class="pos-item-footer">
                                        <div class="pos-item-price">₹1,199</div>
                                        <div class="pos-item-add">+</div>
                                    </div>
                                </div>

                                <div class="pos-item-card" data-id="item-3" data-name="Organic Honey (500g)" data-price="285" data-sku="GRO-304">
                                    <div class="pos-item-name">Organic Honey 500g</div>
                                    <div class="pos-item-sku">GRO-304 • 28 in stock</div>
                                    <div class="pos-item-footer">
                                        <div class="pos-item-price">₹285</div>
                                        <div class="pos-item-add">+</div>
                                    </div>
                                </div>

                                <div class="pos-item-card" data-id="item-4" data-name="Basmati Rice (5kg)" data-price="520" data-sku="GRO-308">
                                    <div class="pos-item-name">Basmati Rice 5kg</div>
                                    <div class="pos-item-sku">GRO-308 • 4 in stock</div>
                                    <div class="pos-item-footer">
                                        <div class="pos-item-price">₹520</div>
                                        <div class="pos-item-add">+</div>
                                    </div>
                                </div>

                                <div class="pos-item-card" data-id="item-5" data-name="Wireless Earbuds BT" data-price="1499" data-sku="ELE-412">
                                    <div class="pos-item-name">Wireless Earbuds BT</div>
                                    <div class="pos-item-sku">ELE-412 • 3 in stock</div>
                                    <div class="pos-item-footer">
                                        <div class="pos-item-price">₹1,499</div>
                                        <div class="pos-item-add">+</div>
                                    </div>
                                </div>

                                <div class="pos-item-card" data-id="item-6" data-name="Fast Charging Cable" data-price="249" data-sku="ELE-419">
                                    <div class="pos-item-name">Fast Charging Cable</div>
                                    <div class="pos-item-sku">ELE-419 • 62 in stock</div>
                                    <div class="pos-item-footer">
                                        <div class="pos-item-price">₹249</div>
                                        <div class="pos-item-add">+</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Bill Cart Panel -->
                        <div class="pos-register-panel">
                            <div class="pos-register-header">
                                <div>
                                    <h4>Active Sales Invoice</h4>
                                    <span style="font-size:11px; color:var(--solo-muted);">Customer: Walk-in Retail Buyer</span>
                                </div>
                                <span class="solo-badge neutral">Counter #1</span>
                            </div>

                            <div class="pos-cart-list" id="posCartContainer">
                                <!-- Cart items populated dynamically by JS -->
                            </div>
                            <div class="pos-empty-cart" id="posEmptyCartMsg" style="display:none;">
                                Cart is empty. Click any item on the left to add it.
                            </div>

                            <!-- Customer Selection & Loyalty Points Wallet -->
                            <div class="solo-loyalty-section">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                                    <label for="soloCustomerSelect" style="font-size:11px; font-weight:700; color:#9a3412; text-transform:uppercase; margin:0;">Customer & Loyalty Wallet:</label>
                                    <span id="soloCustomerTierBadge" class="solo-tier-badge gold">Gold Member</span>
                                </div>
                                <select id="soloCustomerSelect" class="solo-form-control" style="font-size:12px; padding:6px 10px; height:auto; width:100%; border-color:#fed7aa; background:#fff;">
                                    <option value="walkin" data-pts="0" data-tier="none">Walk-in Customer (No Wallet)</option>
                                    <option value="rajesh" data-pts="184" data-tier="gold" selected>Rajesh Kumar (184 pts • ₹184.00 val)</option>
                                    <option value="anita" data-pts="96" data-tier="silver">Anita Sharma (96 pts • ₹96.00 val)</option>
                                    <option value="pooja" data-pts="327" data-tier="platinum">Pooja Verma (327 pts • ₹327.00 val)</option>
                                    <option value="vikram" data-pts="51" data-tier="silver">Vikram Singh (51 pts • ₹51.00 val)</option>
                                </select>
                                <div id="soloLoyaltyRedeemRow" style="display:flex; justify-content:space-between; align-items:center; margin-top:8px; padding-top:6px; border-top:1px dashed #fdba74;">
                                    <span style="font-size:11px; color:#c2410c;">Available Wallet: <strong id="soloLoyaltyPtsDisplay">184 pts</strong></span>
                                    <button type="button" id="soloRedeemToggleBtn" class="solo-btn" style="padding:4px 10px; font-size:11px; background:#ea580c; color:#fff; border:none; border-radius:4px; cursor:pointer; font-weight:600;">Redeem 100 Pts (-₹100)</button>
                                </div>
                            </div>

                            <!-- Promotional Coupon Code Engine -->
                            <div class="solo-coupon-section">
                                <label for="soloCouponInput" style="font-size:11px; font-weight:700; color:var(--solo-navy); text-transform:uppercase; display:block; margin-bottom:4px;">Promotional Coupon Code:</label>
                                <div style="display:flex; gap:6px;">
                                    <input type="text" id="soloCouponInput" class="solo-form-control" placeholder="Enter coupon (e.g. SAVE10)" style="font-size:12px; text-transform:uppercase; padding:6px 10px; height:auto; flex:1;">
                                    <button type="button" id="soloApplyCouponBtn" class="solo-btn solo-btn-outline" style="padding:6px 12px; font-size:12px; white-space:nowrap; border-radius:6px; border:1px solid #cbd5e1; cursor:pointer;">Apply</button>
                                </div>
                                <div style="display:flex; gap:6px; margin-top:6px; align-items:center;">
                                    <span style="font-size:11px; color:#64748b;">Quick Coupons:</span>
                                    <button type="button" class="solo-coupon-chip" data-code="SAVE10">SAVE10 (10% off)</button>
                                    <button type="button" class="solo-coupon-chip" data-code="FLAT100">FLAT100 (₹100 off)</button>
                                </div>
                                <div id="soloCouponStatus" style="font-size:11px; margin-top:4px; display:none;"></div>
                            </div>

                            <!-- Register Calculation Summary -->
                            <div class="pos-register-summary">
                                <div class="pos-sum-row">
                                    <span>Subtotal:</span>
                                    <strong id="posSubtotal">₹1,283.00</strong>
                                </div>
                                <div class="pos-sum-row">
                                    <span>Simulated GST (5%):</span>
                                    <strong id="posTax">₹64.15</strong>
                                </div>
                                <div class="pos-sum-row" id="soloCouponRow" style="display:none; color:#047857;">
                                    <span>Coupon Discount (<span id="soloAppliedCouponCode"></span>):</span>
                                    <strong id="soloCouponDiscountVal">-₹0.00</strong>
                                </div>
                                <div class="pos-sum-row" id="soloLoyaltyRow" style="display:none; color:#ea580c;">
                                    <span>Loyalty Wallet Redeemed:</span>
                                    <strong id="soloLoyaltyDiscountVal">-₹0.00</strong>
                                </div>
                                <div class="pos-sum-row total">
                                    <span>Grand Total:</span>
                                    <span id="posTotal">₹1,347.15</span>
                                </div>
                                <div id="soloEarnedPointsRow" style="font-size:11px; color:#047857; margin-top:6px; display:flex; align-items:center; gap:4px; justify-content:flex-end;">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    <span>Customer earns <strong id="soloEarnedPointsCount">+13</strong> loyalty points on this bill</span>
                                </div>
                            </div>

                            <!-- Tender Selection -->
                            <div style="margin-bottom:6px;">
                                <span style="font-size:11px; font-weight:700; color:var(--solo-muted); text-transform:uppercase;">Payment Tender:</span>
                            </div>
                            <div class="pos-tender-options">
                                <button type="button" class="pos-tender-btn active" data-tender="UPI / QR">UPI / QR</button>
                                <button type="button" class="pos-tender-btn" data-tender="Cash">Cash</button>
                                <button type="button" class="pos-tender-btn" data-tender="Card">Card</button>
                            </div>

                            <!-- Simulated Checkout Button -->
                            <button type="button" class="pos-checkout-btn" id="posCheckoutBtn">
                                Complete Simulated Sale
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 5. TAB: CUSTOMER DIRECTORY -->
                <div class="demo-panel" id="tab-customers">
                    <div style="margin-bottom: 20px;">
                        <h4 style="margin: 0 0 6px; font-size: 16px; color: var(--solo-navy);">Registered Store Customers</h4>
                        <p style="margin: 0; font-size: 13px; color: var(--solo-muted);">Keep customer phone numbers and purchase histories accessible for personalized billing.</p>
                    </div>

                    <div class="demo-table-wrapper">
                        <table class="demo-table">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Contact Phone</th>
                                    <th>Total Visits</th>
                                    <th>Lifetime Spend</th>
                                    <th>Reward Points</th>
                                    <th>Last Purchase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Rajesh Kumar</strong></td>
                                    <td>+91 98765 43210</td>
                                    <td>14 visits</td>
                                    <td>₹18,450</td>
                                    <td><span class="status-tag in-stock">184 pts</span></td>
                                    <td>Today (INV-849)</td>
                                </tr>
                                <tr>
                                    <td><strong>Anita Sharma</strong></td>
                                    <td>+91 98111 22334</td>
                                    <td>9 visits</td>
                                    <td>₹9,620</td>
                                    <td><span class="status-tag in-stock">96 pts</span></td>
                                    <td>Today (INV-848)</td>
                                </tr>
                                <tr>
                                    <td><strong>Vikram Singh</strong></td>
                                    <td>+91 99222 33445</td>
                                    <td>5 visits</td>
                                    <td>₹5,180</td>
                                    <td><span class="status-tag in-stock">51 pts</span></td>
                                    <td>Today (INV-846)</td>
                                </tr>
                                <tr>
                                    <td><strong>Pooja Verma</strong></td>
                                    <td>+91 97333 44556</td>
                                    <td>21 visits</td>
                                    <td>₹32,700</td>
                                    <td><span class="status-tag in-stock">327 pts</span></td>
                                    <td>Yesterday</td>
                                </tr>
                                <tr>
                                    <td><strong>Manoj Tiwari</strong></td>
                                    <td>+91 96444 55667</td>
                                    <td>3 visits</td>
                                    <td>₹3,490</td>
                                    <td><span class="status-tag in-stock">34 pts</span></td>
                                    <td>18 Sep 2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 6. TAB: SALES REPORTS -->
                <div class="demo-panel" id="tab-reports">
                    <div style="margin-bottom: 24px;">
                        <h4 style="margin: 0 0 6px; font-size: 16px; color: var(--solo-navy);">Sales & Performance Analytics</h4>
                        <p style="margin: 0; font-size: 13px; color: var(--solo-muted);">Aggregated retail performance figures for the current billing cycle.</p>
                    </div>

                    <div class="demo-dashboard-split">
                        <div class="demo-box">
                            <div class="demo-box-head">
                                <h4>Top 5 Selling Items</h4>
                                <span class="solo-badge neutral">By Volume</span>
                            </div>
                            <div style="display:flex; flex-direction:column; gap:16px; padding-top:6px;">
                                <div>
                                    <div style="display:flex; justify-content:space-between; font-size:13px; font-weight:700; margin-bottom:4px;">
                                        <span>Cotton Crew T-Shirt (M)</span>
                                        <span>128 units sold</span>
                                    </div>
                                    <div style="background:#e2e8f0; height:8px; border-radius:999px; overflow:hidden;">
                                        <div style="background:var(--solo-orange); height:100%; width:85%;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div style="display:flex; justify-content:space-between; font-size:13px; font-weight:700; margin-bottom:4px;">
                                        <span>Fast Charging Cable USB-C</span>
                                        <span>94 units sold</span>
                                    </div>
                                    <div style="background:#e2e8f0; height:8px; border-radius:999px; overflow:hidden;">
                                        <div style="background:var(--solo-blue); height:100%; width:65%;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div style="display:flex; justify-content:space-between; font-size:13px; font-weight:700; margin-bottom:4px;">
                                        <span>Organic Honey (500g)</span>
                                        <span>62 units sold</span>
                                    </div>
                                    <div style="background:#e2e8f0; height:8px; border-radius:999px; overflow:hidden;">
                                        <div style="background:var(--solo-green); height:100%; width:45%;"></div>
                                    </div>
                                </div>
                                <div>
                                    <div style="display:flex; justify-content:space-between; font-size:13px; font-weight:700; margin-bottom:4px;">
                                        <span>Basmati Rice (5kg)</span>
                                        <span>48 units sold</span>
                                    </div>
                                    <div style="background:#e2e8f0; height:8px; border-radius:999px; overflow:hidden;">
                                        <div style="background:#f59e0b; height:100%; width:35%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="demo-box">
                            <div class="demo-box-head">
                                <h4>Payment Tender Distribution</h4>
                                <span class="solo-badge green">Verified</span>
                            </div>
                            <div style="display:flex; flex-direction:column; gap:14px; padding-top:6px;">
                                <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                                    <span><strong>UPI / QR Codes:</strong> ₹18,208 (64%)</span>
                                    <span class="status-tag in-stock">Primary</span>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                                    <span><strong>Cash Tender:</strong> ₹7,397 (26%)</span>
                                    <span class="status-tag neutral">Secondary</span>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                                    <span><strong>Debit / Credit Card:</strong> ₹2,845 (10%)</span>
                                    <span class="status-tag blue">Direct</span>
                                </div>
                                <div style="margin-top:12px; padding:12px; background:var(--solo-soft); border-radius:8px; font-size:12px; color:var(--solo-muted);">
                                    ✓ End-of-day register totals balance against drawer cash and digital settlement reports.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Simulated Thermal Receipt Modal -->
    <div class="demo-receipt-modal" id="demoReceiptModal">
        <div class="receipt-slip">
            <div class="receipt-header">
                <h4>CITY RETAILERS</h4>
                <div>Store #104 • Main Market</div>
                <div>GSTIN: 07AAAAA0000A1Z5</div>
                <div style="margin-top:4px;">Bill: <strong id="receiptBillNo">INV-2026-8491</strong></div>
                <div id="receiptDateTime">21/09/2026 10:45 AM</div>
            </div>
            
            <div class="receipt-items" id="receiptItemsList">
                <!-- Receipt rows populated by JS -->
            </div>

            <div class="receipt-row" id="receiptCustomerRow">
                <span>Customer:</span>
                <span id="receiptCustomerName" style="font-weight:700;">Rajesh Kumar (Gold)</span>
            </div>
            <div class="receipt-row">
                <span>Subtotal:</span>
                <span id="receiptSubtotal">₹1,283.00</span>
            </div>
            <div class="receipt-row">
                <span>Tax (GST 5%):</span>
                <span id="receiptTax">₹64.15</span>
            </div>
            <div class="receipt-row" id="receiptCouponRow" style="color:#047857; display:none;">
                <span>Coupon (<span id="receiptCouponCode"></span>):</span>
                <span id="receiptCouponDiscount">-₹0.00</span>
            </div>
            <div class="receipt-row" id="receiptLoyaltyRow" style="color:#ea580c; display:none;">
                <span>Loyalty Points Redeemed:</span>
                <span id="receiptLoyaltyDiscount">-₹0.00</span>
            </div>
            <div class="receipt-row receipt-total">
                <span>TOTAL:</span>
                <span id="receiptGrandTotal">₹1,347.15</span>
            </div>
            <div class="receipt-row" style="margin-top:6px;">
                <span>Paid via:</span>
                <span id="receiptPaymentMethod">UPI / QR</span>
            </div>
            <div class="receipt-row" id="receiptWalletStatusRow" style="background:#fff7ed; padding:6px 8px; border-radius:4px; margin-top:6px; font-size:11px; color:#9a3412;">
                <span>Loyalty Wallet:</span>
                <span id="receiptWalletBalance" style="font-weight:700;">+13 pts earned</span>
            </div>

            <div class="receipt-footer">
                *** DEMO PREVIEW RECEIPT ***<br>
                Thank you for testing RS Inventory – Solo!
            </div>

            <button type="button" class="receipt-close-btn" id="closeReceiptBtn">Close Simulated Receipt</button>
        </div>
    </div>

    <!-- ========================================================
         SECTION 4: HOW IT WORKS
         ======================================================== -->
    <section class="solo-how-it-works" id="how-it-works">
        <div class="solo-container">
            <div class="solo-section-header">
                <span class="solo-badge primary">Simple 3-Step Setup</span>
                <h2>How RS Inventory – Solo Works</h2>
                <p>Get your retail billing and stock operations organized with a straightforward, three-step workflow designed for busy store owners.</p>
            </div>

            <div class="solo-steps-grid">
                <!-- Step 1 -->
                <div class="solo-step-card">
                    <div class="step-number-badge">1</div>
                    <div class="step-icon-wrap">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        </svg>
                    </div>
                    <h3>Organize Your Products</h3>
                    <p>Add your products and maintain essential inventory information including categories, selling prices, and initial stock quantities.</p>
                </div>

                <!-- Step 2 -->
                <div class="solo-step-card">
                    <div class="step-number-badge">2</div>
                    <div class="step-icon-wrap">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <h3>Manage Sales and Billing</h3>
                    <p>Create invoices and record sales through a convenient billing workflow with barcode scanning and flexible payment recording.</p>
                </div>

                <!-- Step 3 -->
                <div class="solo-step-card">
                    <div class="step-number-badge">3</div>
                    <div class="step-icon-wrap">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                    </div>
                    <h3>Review Your Business</h3>
                    <p>Use available reports to understand sales activity, review product movements, and maintain accurate inventory levels.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 5: BENEFITS SECTION
         ======================================================== -->
    <section class="solo-benefits" id="benefits">
        <div class="solo-container">
            <div class="solo-section-header">
                <span class="solo-badge blue">Operational Clarity</span>
                <h2>Designed for Everyday Retail Operations</h2>
                <p>RS Inventory – Solo provides tangible, practical advantages for store managers seeking to replace fragmented paper registers with unified digital software.</p>
            </div>

            <div class="solo-benefits-grid">
                <div class="solo-benefit-item">
                    <div class="solo-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    </div>
                    <div class="solo-benefit-text">
                        <h3>Easier Product and Stock Management</h3>
                        <p>Maintain centralized records of all catalog items, barcodes, and current stock balances without searching through manual logbooks.</p>
                    </div>
                </div>

                <div class="solo-benefit-item">
                    <div class="solo-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                    <div class="solo-benefit-text">
                        <h3>More Organized Billing Operations</h3>
                        <p>Generate clean, professional sales invoices quickly to reduce checkout queues and ensure accurate arithmetic calculation on every bill.</p>
                    </div>
                </div>

                <div class="solo-benefit-item">
                    <div class="solo-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div class="solo-benefit-text">
                        <h3>Convenient Access to Inventory Info</h3>
                        <p>Check available quantities and unit prices immediately during a customer consultation without needing to physically search store shelves.</p>
                    </div>
                </div>

                <div class="solo-benefit-item">
                    <div class="solo-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <div class="solo-benefit-text">
                        <h3>Improved Visibility into Sales Activity</h3>
                        <p>Track daily revenue figures, identify your highest-volume selling products, and understand seasonal demand patterns with structured summaries.</p>
                    </div>
                </div>

                <div class="solo-benefit-item">
                    <div class="solo-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                    <div class="solo-benefit-text">
                        <h3>Centralized Customer Records</h3>
                        <p>Retain contact information and past transaction history to assist returning patrons and offer personalized customer service.</p>
                    </div>
                </div>

                <div class="solo-benefit-item">
                    <div class="solo-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                    </div>
                    <div class="solo-benefit-text">
                        <h3>Reduced Dependence on Manual Ledgers</h3>
                        <p>Eliminate misplaced paper receipts, manual calculation errors, and end-of-month tallying headaches with automatic digital logging.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 6: PRODUCT SUITABILITY
         ======================================================== -->
    <section class="solo-suitability" id="suitability">
        <div class="solo-container">
            <div class="solo-section-header">
                <span class="solo-badge neutral">Intended Use Cases</span>
                <h2>Who Is RS Inventory – Solo Designed For?</h2>
                <p>RS Inventory – Solo is tailored specifically for independent retail shop owners and small businesses who require reliable product management and invoice generation.</p>
            </div>

            <div class="solo-suitability-grid">
                <div class="suitability-card">
                    <div class="suitability-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </div>
                    <h3>Small Retail Shops</h3>
                    <p>Ideal for neighborhood stores needing a clean, rapid computerized billing system to replace handwritten invoice pads.</p>
                </div>

                <div class="suitability-card">
                    <div class="suitability-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M16 8l-8 8"></path><path d="M8 8l8 8"></path></svg>
                    </div>
                    <h3>General Stores & Mini Marts</h3>
                    <p>Manage multi-category inventory with hundreds of everyday fast-moving consumer items and quick barcode checkout.</p>
                </div>

                <div class="suitability-card">
                    <div class="suitability-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"></path></svg>
                    </div>
                    <h3>Clothing & Apparel Boutiques</h3>
                    <p>Track fashion inventory by style, size, and category while providing clean printed or digital receipts to shoppers.</p>
                </div>

                <div class="suitability-card">
                    <div class="suitability-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                    </div>
                    <h3>Mobile & Electronics Stores</h3>
                    <p>Maintain accurate records of accessories, gadgets, and serial/SKU items with transparent customer warranty invoices.</p>
                </div>

                <div class="suitability-card">
                    <div class="suitability-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                    </div>
                    <h3>Hardware & Tool Shops</h3>
                    <p>Organize wide ranges of small parts, electrical fittings, and tools with instant price lookup at the checkout counter.</p>
                </div>

                <div class="suitability-card">
                    <div class="suitability-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    </div>
                    <h3>Growing Retail Ventures</h3>
                    <p>Designed for any retail establishment looking to formalize their inventory, checkout flow, and bookkeeping foundation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 7: PRICING & INQUIRY BANNER
         ======================================================== -->
    <section class="solo-pricing-banner" id="pricing-inquiry">
        <div class="solo-container">
            <div class="solo-banner-card">
                <div class="banner-content">
                    <span class="solo-badge primary" style="background:rgba(255,91,0,0.2); color:#ffaa7a; border:none; margin-bottom:12px;">Tailored Retail Deployment</span>
                    <h2>Interested in RS Inventory – Solo?</h2>
                    <p>Software setup and licensing options depend on your specific store setup, number of billing counters, and integration requirements. Contact the RS ORANGE TECH team to discuss your operational needs, request a personalized demonstration, and receive tailored deployment details.</p>
                </div>
                <div class="banner-ctas">
                    <a href="#demo-request" class="solo-btn solo-btn-primary">Request a Demo</a>
                    <a href="{{ route('contact') }}" class="solo-btn solo-btn-white">Contact Our Team</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         EDITION COMPARISON & CROSS-LINK STRIP
         ======================================================== -->
    <section class="solo-comparison-strip" style="padding: 40px 0; background: #f8fafc; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
        <div class="solo-container">
            <div style="background: white; border: 1px solid #e2e8f0; border-radius: 16px; padding: 28px 32px; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.04);">
                <div style="max-width: 640px;">
                    <span class="solo-badge primary" style="margin-bottom:8px; display:inline-block; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:var(--solo-orange, #ff5b00); background:rgba(255,91,0,0.1); padding:4px 12px; border-radius:20px;">Edition Comparison</span>
                    <h3 style="font-size:22px; font-weight:800; color:#0b1329; margin:6px 0 8px;">Looking for Multi-Counter or Multi-Branch Features?</h3>
                    <p style="color:#64748b; font-size:14px; line-height:1.6; margin:0;">Explore <strong>RS Inventory – LAN</strong> for local multi-counter store networks, or <strong>RS Inventory – Business</strong> for multi-branch retail management, customer loyalty points, and enterprise purchase workflows.</p>
                </div>
                <div style="display:flex; flex-wrap:wrap; gap:12px;">
                    <a href="{{ route('products.rs-inventory-lan') }}" class="solo-btn solo-btn-outline" style="white-space:nowrap; border:1px solid #cbd5e1; color:#1e293b; padding:10px 20px; border-radius:8px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center;">
                        <span>RS Inventory – LAN</span>
                    </a>
                    <a href="{{ route('products.rs-inventory-business') }}" class="solo-btn solo-btn-primary" style="white-space:nowrap; background:#ff5b00; color:#fff; padding:10px 20px; border-radius:8px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:6px;">
                        <span>RS Inventory – Business</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 8: DEMO REQUEST FORM
         ======================================================== -->
    <section class="solo-form-section" id="demo-request">
        <div class="solo-container">
            <div class="solo-form-box">
                <div class="solo-section-header" style="margin-bottom: 32px;">
                    <span class="solo-badge primary">Schedule a Demonstration</span>
                    <h2>Request a Product Demo</h2>
                    <p>Submit your retail store details below. Our team will review your requirements and coordinate a demonstration suited to your business.</p>
                </div>

                @if(session('status'))
                    <div class="form-alert success">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <div>
                            <strong>Submission Received</strong>
                            <p style="margin:2px 0 0;">{{ session('status') }}</p>
                        </div>
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <div class="form-alert error">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <div>
                            <strong>Please correct the following fields:</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('products.rs-inventory-solo.submit') }}" id="demoInquiryForm">
                    @csrf
                    <!-- Anti-spam Honeypot -->
                    <input type="text" name="my_custom_country_verify" style="display:none !important;" tabindex="-1" autocomplete="off">

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="input-name">Full Name <span class="req">*</span></label>
                            <input type="text" id="input-name" name="name" class="solo-form-control" value="{{ old('name') }}" placeholder="e.g. Ramesh Sharma" required>
                        </div>

                        <div class="solo-form-group">
                            <label for="input-business-name">Business / Store Name <span class="req">*</span></label>
                            <input type="text" id="input-business-name" name="business_name" class="solo-form-control" value="{{ old('business_name') }}" placeholder="e.g. City Fashion Boutique" required>
                        </div>
                    </div>

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="input-email">Email Address <span class="req">*</span></label>
                            <input type="email" id="input-email" name="email" class="solo-form-control" value="{{ old('email') }}" placeholder="e.g. ramesh@yourstore.com" required>
                        </div>

                        <div class="solo-form-group">
                            <label for="input-phone">Phone / WhatsApp Number <span class="req">*</span></label>
                            <input type="tel" id="input-phone" name="phone" class="solo-form-control" value="{{ old('phone') }}" placeholder="e.g. +91 98765 43210" required>
                        </div>
                    </div>

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="input-business-type">Business Type <span class="req">*</span></label>
                            <select id="input-business-type" name="business_type" class="solo-form-control" required>
                                <option value="" disabled {{ old('business_type') ? '' : 'selected' }}>Select your business category...</option>
                                <option value="General Retail Store" {{ old('business_type') == 'General Retail Store' ? 'selected' : '' }}>General Retail Store</option>
                                <option value="Clothing & Apparel Boutique" {{ old('business_type') == 'Clothing & Apparel Boutique' ? 'selected' : '' }}>Clothing & Apparel Boutique</option>
                                <option value="Grocery / Supermarket" {{ old('business_type') == 'Grocery / Supermarket' ? 'selected' : '' }}>Grocery / Supermarket</option>
                                <option value="Electronics & Mobile Accessories" {{ old('business_type') == 'Electronics & Mobile Accessories' ? 'selected' : '' }}>Electronics & Mobile Accessories</option>
                                <option value="Hardware, Electrical & Tools" {{ old('business_type') == 'Hardware, Electrical & Tools' ? 'selected' : '' }}>Hardware, Electrical & Tools</option>
                                <option value="Footwear & Leather Goods" {{ old('business_type') == 'Footwear & Leather Goods' ? 'selected' : '' }}>Footwear & Leather Goods</option>
                                <option value="Stationery, Books & Gifts" {{ old('business_type') == 'Stationery, Books & Gifts' ? 'selected' : '' }}>Stationery, Books & Gifts</option>
                                <option value="Other Retail Business" {{ old('business_type') == 'Other Retail Business' ? 'selected' : '' }}>Other Retail Business</option>
                            </select>
                        </div>

                        <div class="solo-form-group">
                            <label for="input-billing-counters">Number of Billing Computers <span class="req">*</span></label>
                            <select id="input-billing-counters" name="billing_counters" class="solo-form-control" required>
                                <option value="" disabled {{ old('billing_counters') ? '' : 'selected' }}>Select number of counter PCs...</option>
                                <option value="1 Single Terminal (Solo)" {{ old('billing_counters') == '1 Single Terminal (Solo)' ? 'selected' : '' }}>1 Single Terminal (Solo Counter)</option>
                                <option value="2 - 3 Terminals" {{ old('billing_counters') == '2 - 3 Terminals' ? 'selected' : '' }}>2 - 3 Terminals (Multi-Counter)</option>
                                <option value="4+ Terminals" {{ old('billing_counters') == '4+ Terminals' ? 'selected' : '' }}>4+ Terminals (Superstore / Departmental)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Features of Interest Checkboxes -->
                    <div class="solo-form-group">
                        <label>Features of Interest (Optional)</label>
                        <div class="solo-checkbox-group">
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="features_of_interest[]" value="POS Billing & Invoicing" {{ is_array(old('features_of_interest')) && in_array('POS Billing & Invoicing', old('features_of_interest')) ? 'checked' : '' }}>
                                <span>POS Billing & Invoicing</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="features_of_interest[]" value="Inventory & Low-Stock Alerts" {{ is_array(old('features_of_interest')) && in_array('Inventory & Low-Stock Alerts', old('features_of_interest')) ? 'checked' : '' }}>
                                <span>Inventory & Stock Alerts</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="features_of_interest[]" value="Barcode Scanner Support" {{ is_array(old('features_of_interest')) && in_array('Barcode Scanner Support', old('features_of_interest')) ? 'checked' : '' }}>
                                <span>Barcode Scanner Support</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="features_of_interest[]" value="Customer Management" {{ is_array(old('features_of_interest')) && in_array('Customer Management', old('features_of_interest')) ? 'checked' : '' }}>
                                <span>Customer Management</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="features_of_interest[]" value="Sales Reports & Analytics" {{ is_array(old('features_of_interest')) && in_array('Sales Reports & Analytics', old('features_of_interest')) ? 'checked' : '' }}>
                                <span>Sales Reports & Analytics</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="features_of_interest[]" value="Coupons & Loyalty Points" {{ is_array(old('features_of_interest')) && in_array('Coupons & Loyalty Points', old('features_of_interest')) ? 'checked' : '' }}>
                                <span>Coupons & Loyalty Points</span>
                            </label>
                        </div>
                    </div>

                    <!-- Preferred Contact Method -->
                    <div class="solo-form-group">
                        <label>Preferred Contact Method <span class="req">*</span></label>
                        <div class="solo-radio-group">
                            <label class="solo-radio-label">
                                <input type="radio" name="contact_method" value="WhatsApp" {{ old('contact_method', 'WhatsApp') == 'WhatsApp' ? 'checked' : '' }} required>
                                <span>WhatsApp Message</span>
                            </label>
                            <label class="solo-radio-label">
                                <input type="radio" name="contact_method" value="Phone Call" {{ old('contact_method') == 'Phone Call' ? 'checked' : '' }}>
                                <span>Phone Call</span>
                            </label>
                            <label class="solo-radio-label">
                                <input type="radio" name="contact_method" value="Email" {{ old('contact_method') == 'Email' ? 'checked' : '' }}>
                                <span>Email</span>
                            </label>
                        </div>
                    </div>

                    <!-- Additional Requirements -->
                    <div class="solo-form-group">
                        <label for="input-requirements">Additional Requirements or Specific Questions</label>
                        <textarea id="input-requirements" name="additional_requirements" class="solo-form-control" rows="3" placeholder="Tell us about any specific hardware, barcode scanners, thermal printers, or store processes you would like to discuss...">{{ old('additional_requirements') }}</textarea>
                    </div>

                    <div class="solo-form-submit">
                        <button type="submit" class="solo-btn solo-btn-primary" style="width:100%; padding:16px; border-radius:10px;">
                            <span>Submit Demo Request</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>

                    <p class="solo-form-disclaimer">
                        By submitting this form, you authorize RS ORANGE TECH to contact you regarding RS Inventory – Solo. We respect your privacy and do not share your contact details.
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 9: FREQUENTLY ASKED QUESTIONS
         ======================================================== -->
    <section class="solo-faq" id="faq">
        <div class="solo-container">
            <div class="solo-section-header">
                <span class="solo-badge primary">Clarifications</span>
                <h2>Frequently Asked Questions</h2>
                <p>Find straightforward, accurate answers regarding RS Inventory – Solo capabilities, hardware compatibility, and deployment.</p>
            </div>

            <div class="solo-faq-list">
                
                <!-- FAQ 1 -->
                <div class="solo-faq-item active">
                    <button type="button" class="solo-faq-question" aria-expanded="true">
                        <span>What is RS Inventory – Solo?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        RS Inventory – Solo is a retail inventory and point-of-sale (POS) billing software solution developed by RS ORANGE TECH PVT LTD. It is designed to help retail business owners catalog products, maintain accurate stock records, generate customer sales invoices, and analyze daily performance from one unified application.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>Who can use RS Inventory – Solo?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        The software is built for independent retailers, retail shops, general stores, apparel and fashion boutiques, mobile accessories stores, hardware shops, and growing small businesses that require a modern, dependable tool to organize everyday stock and counter billing.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>Can I manage products and stock using RS Inventory – Solo?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        Yes. The system enables you to add, edit, and categorize items, maintain barcodes and SKUs, set selling and purchase prices, monitor available quantities in real time, record stock additions or damages, and receive visual warnings when products fall below defined low-stock thresholds.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>Can I create sales invoices?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        Yes. RS Inventory – Solo includes an intuitive POS counter billing workflow. You can scan barcodes or search products, add items to a bill, calculate taxes and discounts automatically, record customer payments (Cash, UPI, or Card), and print standard thermal or A4 sales invoices.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>Does the software support customer management?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        Yes. You can store customer contact information (names, phone numbers, addresses, and tax identifiers), link them to specific sales bills during checkout, and access their historical purchase logs to identify frequent buyers.
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>Can I view sales and inventory reports?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        Yes. The software provides sales summaries by day, week, or month, inventory valuation reports, stock level alerts, and top-selling product breakdowns to help you make informed restocking decisions and simplify daily account balancing.
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>Does RS Inventory – Solo support promotional coupons?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        Yes, promotional campaigns and coupon functionality—such as setting discount codes, validity dates, percentage or flat discounts, and applying coupons during billing—are supported as a configurable promotional module that can be enabled according to your store policies.
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>Can customers earn and redeem wallet points?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        Customer loyalty reward points and wallet features—including point accumulation based on purchase spend and redemption against future bills—are supported through configurable loyalty rules tailored to your retail establishment.
                    </div>
                </div>

                <!-- FAQ 9 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>Does the software support multiple computers?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        Yes. While RS Inventory – Solo is optimized for single-counter standalone stores, deployment architectures can be configured across multiple counter terminals connected via a local store network or secure cloud hosting.
                    </div>
                </div>

                <!-- FAQ 10 -->
                <div class="solo-faq-item">
                    <button type="button" class="solo-faq-question" aria-expanded="false">
                        <span>How can I request a demonstration?</span>
                        <span class="solo-faq-icon">▼</span>
                    </button>
                    <div class="solo-faq-answer">
                        You can request a live guided walkthrough by filling out the Demo Request form on this page or contacting the RS ORANGE TECH team directly via phone at <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" style="color:var(--solo-orange); font-weight:700;">{{ $phone }}</a> or email at <a href="mailto:{{ $email }}" style="color:var(--solo-orange); font-weight:700;">{{ $email }}</a>.
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
    <!-- Interactive Demo Script -->
    <script src="{{ asset('js/rs-inventory-solo-demo.js') }}?v=1.02"></script>
@endpush
