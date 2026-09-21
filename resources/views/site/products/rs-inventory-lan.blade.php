@php
    $pageTitle = $title ?? 'RS Inventory – LAN | Multi-Computer Inventory & Billing Software';
    $pageDescription = $description ?? 'Explore RS Inventory – LAN by RS ORANGE TECH, a retail inventory and billing solution designed for businesses that need shared inventory and billing operations across connected computers.';
    $pageCanonical = $canonicalUrl ?? url('/products/rs-inventory-lan');
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
    <meta property="og:image" content="{{ asset('site-assets/rs-inventory-lan-dashboard.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $pageCanonical }}">
    <meta property="twitter:title" content="{{ $pageTitle }}">
    <meta property="twitter:description" content="{{ $pageDescription }}">
    <meta property="twitter:image" content="{{ asset('site-assets/rs-inventory-lan-dashboard.jpg') }}">

    <!-- Custom Page Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/rs-inventory-lan.css') }}?v=1.05">

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@graph": [
            {
                "@@type": "SoftwareApplication",
                "name": "RS Inventory – LAN",
                "applicationCategory": "BusinessApplication",
                "operatingSystem": "Local Area Network (LAN) / Multi-Terminal Windows & Web",
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
                    "description": "Multi-terminal consultation and tailored demonstration available on request"
                }
            },
            {
                "@@type": "FAQPage",
                "mainEntity": [
                    {
                        "@@type": "Question",
                        "name": "What is RS Inventory – LAN?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "RS Inventory – LAN is a multi-computer retail inventory and POS billing software edition developed by RS ORANGE TECH. It enables businesses to operate multiple checkout counters and back-office computers connected over a local network with shared inventory data."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "How is the LAN edition different from RS Inventory – Solo?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "RS Inventory – Solo is designed for stores operating from a single computer. RS Inventory – LAN connects multiple billing counters and manager terminals to a shared central inventory host over a local area network."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can multiple computers access shared inventory?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. Authorized terminals connected to the local network query the shared product catalog and stock levels managed by the central host computer."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can multiple billing counters operate simultaneously?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. The LAN edition is designed to support concurrent billing across multiple checkout counters, recording transactions back to the central store host."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Does the software require a central computer or server?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. A central computer or dedicated local server acts as the primary host hosting the shared store database and coordinating records across counter terminals."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Does RS Inventory – LAN work without an internet connection?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Because communication takes place over your store's local Wi-Fi or wired Ethernet network, primary inventory lookup and counter billing do not rely on continuous external internet connectivity."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "What network configuration is required?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "A standard local area network setup utilizing a commercial Wi-Fi router or gigabit Ethernet switch is recommended to ensure low latency between counters and the central host PC."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can different employees have different permissions?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. The system supports role-based access control, enabling store administrators to assign distinct permissions for Cashiers, Store Managers, and System Admins."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can I migrate data from an existing inventory system?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. RS ORANGE TECH assists stores in onboarding product catalogs, barcodes, and supplier details from legacy spreadsheets or existing software."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "How can I request a LAN demonstration?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "You can request a multi-computer demonstration by submitting the inquiry form on this page or reaching out directly to the RS ORANGE TECH technical team."
                        }
                    }
                ]
            }
        ]
    }
    </script>
@endpush

@section('content')
<div class="lan-page">

    <!-- ========================================================
         SECTION 1: HERO SECTION
         ======================================================== -->
    <section class="lan-hero" id="hero">
        <div class="lan-container">
            <div class="lan-hero-grid">
                
                <!-- Left Column: Copy & CTAs -->
                <div class="lan-hero-content">
                    <div class="lan-product-brand">
                        <div class="lan-brand-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                <line x1="6" y1="6" x2="6.01" y2="6"></line>
                                <line x1="6" y1="18" x2="6.01" y2="18"></line>
                            </svg>
                        </div>
                        <div class="lan-brand-title">
                            RS Inventory <span>– LAN</span>
                        </div>
                        <span class="lan-badge cyan">Multi-Terminal Edition</span>
                    </div>

                    <h1>One Inventory. Multiple Computers. <span class="gradient-text">Connected Operations.</span></h1>
                    
                    <p class="lan-hero-sub">
                        RS Inventory – LAN is designed for businesses that want to manage inventory and retail billing across multiple computers connected through a local network.
                    </p>

                    <div class="lan-hero-ctas">
                        <a href="#demo-request" class="lan-btn lan-btn-primary">
                            <span>Request a LAN Demo</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <a href="#features" class="lan-btn lan-btn-outline">
                            <span>Explore Features</span>
                        </a>
                    </div>

                    <div class="lan-hero-pills">
                        <div class="lan-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Shared Live Inventory</span>
                        </div>
                        <div class="lan-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Multi-Counter POS Billing</span>
                        </div>
                        <div class="lan-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Networked Loyalty Wallet</span>
                        </div>
                        <div class="lan-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>Store-Wide Coupon Engine</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Visual Dashboard Mockup -->
                <div class="lan-hero-visual">
                    <div class="lan-mockup-frame">
                        <div class="lan-mockup-chrome">
                            <span class="chrome-dot red"></span>
                            <span class="chrome-dot yellow"></span>
                            <span class="chrome-dot green"></span>
                            <span class="chrome-title">RS Inventory – LAN | Central Server Host Monitor</span>
                        </div>
                        <img src="{{ asset('site-assets/rs-inventory-lan-dashboard.jpg') }}" 
                             alt="RS Inventory – LAN Multi-Computer Dashboard Screenshot" 
                             class="lan-mockup-img"
                             loading="eager"
                             width="1280"
                             height="720">
                    </div>

                    <!-- Floating Badges -->
                    <div class="lan-floating-card card-top-right">
                        <div class="lan-float-icon blue">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                <line x1="12" y1="17" x2="12" y2="21"></line>
                            </svg>
                        </div>
                        <div class="lan-float-text">
                            <strong>Terminal 01 & 02: Active</strong>
                            <span>Simultaneous Checkout</span>
                        </div>
                    </div>

                    <div class="lan-floating-card card-bottom-left">
                        <div class="lan-float-icon green">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        </div>
                        <div class="lan-float-text">
                            <strong>Host IP: 192.168.1.100</strong>
                            <span>Shared Database Online</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 2: PRODUCT FEATURES
         ======================================================== -->
    <section class="lan-features" id="features">
        <div class="lan-container">
            <div class="lan-section-header">
                <span class="lan-badge blue">Connected Retail Suite</span>
                <h2>Capabilities for Multi-Computer Retailers</h2>
                <p>RS Inventory – LAN coordinates product records, customer billing, and stock balances across your counters so your staff can operate with unified store intelligence.</p>
            </div>

            <div class="lan-features-grid">
                
                <!-- Feature A: Shared Inventory -->
                <div class="lan-feature-card">
                    <div class="lan-card-top">
                        <div class="lan-feature-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            </svg>
                        </div>
                        <span class="lan-badge green">Core LAN Module</span>
                    </div>
                    <h3>Shared Inventory</h3>
                    <p class="lan-feature-desc">Connect multiple checkout terminals to a unified central inventory host to maintain consistent stock quantities across the store.</p>
                    <ul class="lan-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Centralized product master accessible by all counter PCs</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Shared live stock visibility preventing accidental overselling</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Cross-terminal product search and price verification</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Consistent stock deduction upon invoice generation</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature B: Multi-Computer Billing -->
                <div class="lan-feature-card">
                    <div class="lan-card-top">
                        <div class="lan-feature-icon orange">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                <line x1="12" y1="17" x2="12" y2="21"></line>
                            </svg>
                        </div>
                        <span class="lan-badge green">Core LAN Module</span>
                    </div>
                    <h3>Multi-Computer Billing</h3>
                    <p class="lan-feature-desc">Operate multiple checkout points simultaneously to process high footfall without creating long bottlenecks at a single register.</p>
                    <ul class="lan-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Create sales invoices from multiple authorized computers</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Counter-specific invoice prefixes for clear shift auditing</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Instant transaction transmission to central store host</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Individual cash drawer tracking per cashier station</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature C: Product and Stock Management -->
                <div class="lan-feature-card">
                    <div class="lan-card-top">
                        <div class="lan-feature-icon cyan">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                        </div>
                        <span class="lan-badge green">Core LAN Module</span>
                    </div>
                    <h3>Product & Stock Management</h3>
                    <p class="lan-feature-desc">Manage your full retail catalog centrally while keeping cashiers informed with current pricing and low-stock indicators.</p>
                    <ul class="lan-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Central product registration, barcode mapping, and category setup</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Log inward purchase shipments from the back office terminal</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Record stock returns, transfers, and damaged goods</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Store-wide low-stock thresholds with proactive replenishment alerts</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature D: Customer Management -->
                <div class="lan-feature-card">
                    <div class="lan-card-top">
                        <div class="lan-feature-icon navy">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            </svg>
                        </div>
                        <span class="lan-badge green">Core LAN Module</span>
                    </div>
                    <h3>Customer Management</h3>
                    <p class="lan-feature-desc">Recognize customers regardless of which billing counter they step up to with unified patron contact records.</p>
                    <ul class="lan-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Customer profile registration accessible by any checkout counter</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>View customer purchase frequency and historical store bills</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Maintain optional customer GSTIN numbers for B2B billing</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Unified customer reward point ledgers across all terminals</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature E: Centralized Reports -->
                <div class="lan-feature-card">
                    <div class="lan-card-top">
                        <div class="lan-feature-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="14"></line>
                            </svg>
                        </div>
                        <span class="lan-badge green">Core LAN Module</span>
                    </div>
                    <h3>Centralized Reports</h3>
                    <p class="lan-feature-desc">Monitor aggregated store revenue or drill down into individual counter performance from the central management screen.</p>
                    <ul class="lan-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Consolidated sales reports combining all terminal receipts</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Individual terminal and cashier shift reconciliation</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Overall inventory valuation and movement audit records</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Payment tender breakdowns (Cash, UPI, Card) per counter</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature F: User Roles and Permissions -->
                <div class="lan-feature-card">
                    <div class="lan-card-top">
                        <div class="lan-feature-icon cyan">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <span class="lan-badge blue">Security Feature</span>
                    </div>
                    <h3>User Roles & Permissions</h3>
                    <p class="lan-feature-desc">Safeguard store margins and sensitive operations with tiered permissions for cashiers, managers, and administrators.</p>
                    <ul class="lan-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Role-based login profiles (Administrator, Manager, Cashier)</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Restrict price overrides and manual discount modifications</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Manager approval required for bill cancellations or refunds</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Audit log tracking which staff member generated each bill</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature G: Promotions and Loyalty -->
                <div class="lan-feature-card">
                    <div class="lan-card-top">
                        <div class="lan-feature-icon orange">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                        </div>
                        <span class="lan-badge green">Included Built-in</span>
                    </div>
                    <h3>Promotions & Customer Loyalty</h3>
                    <p class="lan-feature-desc">Run store-wide campaigns and allow shoppers to redeem points seamlessly at any active checkout counter.</p>
                    <ul class="lan-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Configurable promotional coupon codes and validity dates</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Coupon redemption applied uniformly across any connected counter</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Shared customer wallet points with live debit upon redemption</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Loyalty transaction history consolidated on the central host</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature H: Communication Settings -->
                <div class="lan-feature-card">
                    <div class="lan-card-top">
                        <div class="lan-feature-icon navy">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <span class="lan-badge neutral">Configurable Integration</span>
                    </div>
                    <h3>Communication Settings</h3>
                    <p class="lan-feature-desc">Configure email, SMS, or WhatsApp delivery credentials to send digital invoices directly from your central host.</p>
                    <ul class="lan-feature-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Central SMTP configuration for automated e-invoice delivery</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Support for customer SMS gateway notification integrations</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Configurable WhatsApp Business messaging provider setup</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Single communication setup managed centrally on host PC</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 3: ARCHITECTURE (HOW RS INVENTORY – LAN WORKS)
         ======================================================== -->
    <section class="lan-architecture-section" id="architecture">
        <div class="lan-container">
            <div class="lan-section-header">
                <span class="lan-badge blue">Network Topology</span>
                <h2>How RS Inventory – LAN Works</h2>
                <p>RS Inventory – LAN links your counter terminals to a primary host computer over your local store network. Here is a conceptual view of the architecture.</p>
            </div>

            <!-- Conceptual Architecture Diagram -->
            <div class="lan-topology-wrap">
                <div class="lan-topology-diagram">
                    
                    <!-- Top: Central Host Server -->
                    <div class="topology-host-node">
                        <span class="topology-host-badge">Central Store Host / Primary PC</span>
                        <h4>CENTRAL HOST SERVER (192.168.1.100)</h4>
                        <p>Hosts master product database, centralized stock ledger, and consolidated transaction records. Runs automated database backups.</p>
                    </div>

                    <!-- Middle: Local Area Network Switch / Router -->
                    <div class="topology-bus">
                        <div class="topology-bus-line"></div>
                        <div class="topology-router-box">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                            <span>Local Area Network (LAN Switch / Wi-Fi Router) • Low Latency Bus</span>
                        </div>
                        <div class="topology-bus-split"></div>
                    </div>

                    <!-- Bottom: Connected Counter Terminals -->
                    <div class="topology-terminals-row">
                        <!-- Terminal 1 -->
                        <div class="topology-client-card">
                            <div class="client-icon-wrap">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                </svg>
                            </div>
                            <h5>Terminal 01: Counter A</h5>
                            <p>Cashier Checkout Counter</p>
                            <span class="topology-client-ip">IP: 192.168.1.101</span>
                        </div>

                        <!-- Terminal 2 -->
                        <div class="topology-client-card">
                            <div class="client-icon-wrap" style="color:var(--lan-orange); background:var(--lan-orange-soft);">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                </svg>
                            </div>
                            <h5>Terminal 02: Counter B</h5>
                            <p>Express Billing Counter</p>
                            <span class="topology-client-ip">IP: 192.168.1.102</span>
                        </div>

                        <!-- Terminal 3 -->
                        <div class="topology-client-card">
                            <div class="client-icon-wrap" style="color:#0891b2; background:#ecfeff;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <h5>Terminal 03: Back Office</h5>
                            <p>Store Manager / Inward Stock</p>
                            <span class="topology-client-ip">IP: 192.168.1.110</span>
                        </div>
                    </div>

                </div>

                <div class="architecture-note-box">
                    <strong>Deployment Note:</strong> This diagram illustrates the conceptual multi-terminal local network architecture. Actual network topology, database host configuration, and offline handling depend on your specific in-store network hardware and verified setup specifications.
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 4: MULTI-TERMINAL INTERACTIVE DEMO
         ======================================================== -->
    <section class="lan-demo-section" id="demo">
        <div class="lan-container">
            <div class="lan-section-header">
                <span class="lan-badge blue">Interactive Experience</span>
                <h2>Experience RS Inventory – LAN</h2>
                <p>Test how counter terminals and the central host coordinate sales and inventory in the simulated multi-terminal sandbox below.</p>
            </div>

            <!-- Disclaimer -->
            <div class="lan-demo-disclaimer">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></line>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span><strong>Interactive Preview – Sample Data:</strong> This sandbox demonstrates multi-terminal checkout and host synchronization using simulated retail data. Synchronization is demonstrated on the client side without altering production records.</span>
            </div>

            <div class="lan-demo-app">
                <!-- App Topbar -->
                <div class="lan-app-topbar">
                    <div class="lan-app-identity">
                        <div class="lan-app-logo">LAN</div>
                        <div class="lan-app-name">RS Inventory – LAN <span style="font-weight:400; opacity:0.8;">| Multi-Counter Suite</span></div>
                    </div>
                    <div>
                        <span class="lan-sync-pill">
                            <span style="width:6px; height:6px; border-radius:50%; background:#34d399;"></span>
                            LAN Host Connected (192.168.1.100)
                        </span>
                    </div>
                </div>

                <!-- Navigation Tabs -->
                <div class="lan-tabs-nav" role="tablist">
                    <button type="button" class="lan-tab-btn active" data-tab="tab-counter-1">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line></svg>
                        🖥 Counter 1 (Main Billing POS)
                    </button>
                    <button type="button" class="lan-tab-btn" data-tab="tab-counter-2">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line></svg>
                        🖥 Counter 2 (Express Billing POS)
                    </button>
                    <button type="button" class="lan-tab-btn" data-tab="tab-central-host">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        🏢 Central Host (Manager Monitor)
                    </button>
                    <button type="button" class="lan-tab-btn" data-tab="tab-shared-inventory">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                        📦 Shared Product Catalog
                    </button>
                    <button type="button" class="lan-tab-btn" data-tab="tab-lan-loyalty-coupons">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 12V8H6a2 2 0 0 1-2-2c0-1.1.9-2 2-2h12v4"></path><path d="M4 6v12a2 2 0 0 0 2 2h14v-4"></path><circle cx="18" cy="12" r="2"></circle></svg>
                        🎁 Network Coupons & Loyalty
                    </button>
                </div>

                <!-- 1. TAB: COUNTER 1 -->
                <div class="lan-panel active" id="tab-counter-1">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px;">
                        <div>
                            <h4 style="margin:0 0 4px; font-size:16px; color:var(--lan-navy);">Terminal 01 • Main Checkout Register</h4>
                            <p style="margin:0; font-size:13px; color:var(--lan-muted);">Cashier: Amit S. • IP: 192.168.1.101 • Connected to Central Server</p>
                        </div>
                        <span class="status-tag in-stock">Counter Active</span>
                    </div>

                    <div class="pos-terminal-grid">
                        <div class="pos-product-browser">
                            <div style="font-size:13px; font-weight:700; color:var(--lan-navy); margin-bottom:12px;">Click to Add Items to Counter 1</div>
                            <div class="pos-items-grid">
                                <div class="pos-item-card lan-pos-item add-to-c1" data-id="item-1">
                                    <div class="pos-item-name">Cotton Crew T-Shirt</div>
                                    <div class="pos-item-sku">APP-102 • <span class="lan-stock-label">45 left</span></div>
                                    <div class="pos-item-footer"><div class="pos-item-price">₹499</div><div class="pos-item-add">+</div></div>
                                </div>
                                <div class="pos-item-card lan-pos-item add-to-c1" data-id="item-2">
                                    <div class="pos-item-name">Casual Denim Shirt</div>
                                    <div class="pos-item-sku">APP-105 • <span class="lan-stock-label">6 left</span></div>
                                    <div class="pos-item-footer"><div class="pos-item-price">₹1,199</div><div class="pos-item-add">+</div></div>
                                </div>
                                <div class="pos-item-card lan-pos-item add-to-c1" data-id="item-5">
                                    <div class="pos-item-name">Wireless Earbuds BT</div>
                                    <div class="pos-item-sku">ELE-412 • <span class="lan-stock-label">3 left</span></div>
                                    <div class="pos-item-footer"><div class="pos-item-price">₹1,499</div><div class="pos-item-add">+</div></div>
                                </div>
                            </div>
                        </div>

                        <!-- Counter 1 Cart -->
                        <div class="pos-register-panel">
                            <div class="pos-register-header">
                                <div>
                                    <h4>Counter 1 Active Bill</h4>
                                    <span style="font-size:11px; color:var(--lan-muted);">Prefix: INV-C1-849</span>
                                </div>
                                <span class="lan-badge blue">Counter 1</span>
                            </div>

                            <!-- Customer Selection & Loyalty -->
                            <div style="margin-bottom:12px;">
                                <label style="font-size:11px; font-weight:700; color:var(--lan-navy); margin-bottom:4px; display:block;">Select Customer Account:</label>
                                <select id="c1CustomerSelect" class="solo-form-control" style="font-size:12px; padding:6px 10px; width:100%; border-radius:6px; border:1px solid #cbd5e1;">
                                    <option value="walkin">Walk-in Customer (Regular • 0 pts)</option>
                                    <option value="rajesh" selected>Rajesh Kumar (Gold • 184 pts)</option>
                                    <option value="anita">Anita Sharma (Silver • 75 pts)</option>
                                    <option value="pooja">Pooja Verma (Platinum • 420 pts)</option>
                                    <option value="vikram">Vikram Singh (Silver • 50 pts)</option>
                                </select>
                            </div>

                            <!-- Loyalty Points Wallet Box -->
                            <div class="lan-loyalty-box" id="c1LoyaltyBox">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                                    <div style="font-size:11px; font-weight:700; color:#1e40af;">
                                        ⭐ Loyalty Wallet: <span id="c1CustomerTierBadge" class="lan-tier-badge gold">Gold Tier</span>
                                    </div>
                                    <span class="lan-sync-pill">LAN Synced</span>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center;">
                                    <span style="font-size:12px; color:#1e3a8a;">Balance: <strong id="c1WalletPts">184 pts</strong> (₹184.00)</span>
                                    <button type="button" class="lan-redeem-btn" id="c1RedeemBtn">Redeem 100 Pts</button>
                                </div>
                            </div>

                            <div class="pos-cart-list" id="c1CartList"></div>
                            <div class="pos-empty-cart" id="c1EmptyMsg" style="display:none;">Counter 1 cart is empty.</div>

                            <!-- Promotional Coupon Box -->
                            <div class="lan-coupon-box">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                                    <span style="font-size:11px; font-weight:700; color:#1d4ed8;">🎟 Store Promo Coupon:</span>
                                    <span style="font-size:10px; color:#64748b;">Instant LAN Verification</span>
                                </div>
                                <div style="display:flex; gap:6px;">
                                    <input type="text" id="c1CouponInput" placeholder="e.g. SAVE10" style="flex:1; font-size:12px; padding:6px 10px; border:1px solid #cbd5e1; border-radius:6px; text-transform:uppercase;">
                                    <button type="button" class="lan-btn lan-btn-primary" id="c1ApplyCouponBtn" style="padding:6px 12px; font-size:11px; border-radius:6px;">Apply</button>
                                </div>
                                <div style="display:flex; gap:6px; margin-top:6px; flex-wrap:wrap;">
                                    <span class="lan-coupon-chip" data-target="c1" data-code="SAVE10">SAVE10 (10% off)</span>
                                    <span class="lan-coupon-chip" data-target="c1" data-code="LAN150">LAN150 (₹150 off)</span>
                                </div>
                                <div id="c1CouponStatus" style="font-size:11px; margin-top:4px; font-weight:600; display:none;"></div>
                            </div>

                            <div class="pos-register-summary">
                                <div class="pos-sum-row"><span>Subtotal:</span><strong id="c1Subtotal">₹499.00</strong></div>
                                <div class="pos-sum-row lan-disc-row" id="c1CouponRow" style="display:none;"><span>Coupon Discount:</span><strong id="c1CouponDiscount">-₹0.00</strong></div>
                                <div class="pos-sum-row lan-disc-row" id="c1LoyaltyRow" style="display:none;"><span>Points Redeemed:</span><strong id="c1LoyaltyDiscount">-₹0.00</strong></div>
                                <div class="pos-sum-row"><span>Tax (GST 5%):</span><span id="c1Tax">₹24.95</span></div>
                                <div class="pos-sum-row total"><span>Grand Total:</span><span id="c1Total">₹523.95</span></div>
                            </div>

                            <button type="button" class="pos-checkout-btn" id="c1CheckoutBtn">Submit Bill to Central Host</button>
                        </div>

                    </div>
                </div>

                <!-- 2. TAB: COUNTER 2 -->
                <div class="lan-panel" id="tab-counter-2">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px;">
                        <div>
                            <h4 style="margin:0 0 4px; font-size:16px; color:var(--lan-navy);">Terminal 02 • Express Billing Register</h4>
                            <p style="margin:0; font-size:13px; color:var(--lan-muted);">Cashier: Priya V. • IP: 192.168.1.102 • Connected to Central Server</p>
                        </div>
                        <span class="status-tag in-stock">Express Counter Active</span>
                    </div>

                    <div class="pos-terminal-grid">
                        <div class="pos-product-browser">
                            <div style="font-size:13px; font-weight:700; color:var(--lan-navy); margin-bottom:12px;">Click to Add Items to Counter 2</div>
                            <div class="pos-items-grid">
                                <div class="pos-item-card lan-pos-item add-to-c2" data-id="item-3">
                                    <div class="pos-item-name">Organic Honey 500g</div>
                                    <div class="pos-item-sku">GRO-304 • <span class="lan-stock-label">28 left</span></div>
                                    <div class="pos-item-footer"><div class="pos-item-price">₹285</div><div class="pos-item-add">+</div></div>
                                </div>
                                <div class="pos-item-card lan-pos-item add-to-c2" data-id="item-4">
                                    <div class="pos-item-name">Basmati Rice 5kg</div>
                                    <div class="pos-item-sku">GRO-308 • <span class="lan-stock-label">4 left</span></div>
                                    <div class="pos-item-footer"><div class="pos-item-price">₹520</div><div class="pos-item-add">+</div></div>
                                </div>
                                <div class="pos-item-card lan-pos-item add-to-c2" data-id="item-6">
                                    <div class="pos-item-name">Fast Charging Cable</div>
                                    <div class="pos-item-sku">ELE-419 • <span class="lan-stock-label">62 left</span></div>
                                    <div class="pos-item-footer"><div class="pos-item-price">₹249</div><div class="pos-item-add">+</div></div>
                                </div>
                            </div>
                        </div>

                        <!-- Counter 2 Cart -->
                        <div class="pos-register-panel">
                            <div class="pos-register-header">
                                <div>
                                    <h4>Counter 2 Active Bill</h4>
                                    <span style="font-size:11px; color:var(--lan-muted);">Prefix: INV-C2-412</span>
                                </div>
                                <span class="lan-badge primary">Counter 2</span>
                            </div>

                            <!-- Customer Selection & Loyalty -->
                            <div style="margin-bottom:12px;">
                                <label style="font-size:11px; font-weight:700; color:var(--lan-navy); margin-bottom:4px; display:block;">Select Customer Account:</label>
                                <select id="c2CustomerSelect" class="solo-form-control" style="font-size:12px; padding:6px 10px; width:100%; border-radius:6px; border:1px solid #cbd5e1;">
                                    <option value="walkin">Walk-in Customer (Regular • 0 pts)</option>
                                    <option value="rajesh">Rajesh Kumar (Gold • 184 pts)</option>
                                    <option value="anita" selected>Anita Sharma (Silver • 75 pts)</option>
                                    <option value="pooja">Pooja Verma (Platinum • 420 pts)</option>
                                    <option value="vikram">Vikram Singh (Silver • 50 pts)</option>
                                </select>
                            </div>

                            <!-- Loyalty Points Wallet Box -->
                            <div class="lan-loyalty-box" id="c2LoyaltyBox">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                                    <div style="font-size:11px; font-weight:700; color:#1e40af;">
                                        ⭐ Loyalty Wallet: <span id="c2CustomerTierBadge" class="lan-tier-badge silver">Silver Tier</span>
                                    </div>
                                    <span class="lan-sync-pill">LAN Synced</span>
                                </div>
                                <div style="display:flex; justify-content:space-between; align-items:center;">
                                    <span style="font-size:12px; color:#1e3a8a;">Balance: <strong id="c2WalletPts">75 pts</strong> (₹75.00)</span>
                                    <button type="button" class="lan-redeem-btn" id="c2RedeemBtn">Redeem 50 Pts</button>
                                </div>
                            </div>

                            <div class="pos-cart-list" id="c2CartList"></div>
                            <div class="pos-empty-cart" id="c2EmptyMsg" style="display:none;">Counter 2 cart is empty.</div>

                            <!-- Promotional Coupon Box -->
                            <div class="lan-coupon-box">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                                    <span style="font-size:11px; font-weight:700; color:#1d4ed8;">🎟 Store Promo Coupon:</span>
                                    <span style="font-size:10px; color:#64748b;">Instant LAN Verification</span>
                                </div>
                                <div style="display:flex; gap:6px;">
                                    <input type="text" id="c2CouponInput" placeholder="e.g. SAVE10" style="flex:1; font-size:12px; padding:6px 10px; border:1px solid #cbd5e1; border-radius:6px; text-transform:uppercase;">
                                    <button type="button" class="lan-btn lan-btn-primary" id="c2ApplyCouponBtn" style="padding:6px 12px; font-size:11px; border-radius:6px;">Apply</button>
                                </div>
                                <div style="display:flex; gap:6px; margin-top:6px; flex-wrap:wrap;">
                                    <span class="lan-coupon-chip" data-target="c2" data-code="SAVE10">SAVE10 (10% off)</span>
                                    <span class="lan-coupon-chip" data-target="c2" data-code="LAN150">LAN150 (₹150 off)</span>
                                </div>
                                <div id="c2CouponStatus" style="font-size:11px; margin-top:4px; font-weight:600; display:none;"></div>
                            </div>

                            <div class="pos-register-summary">
                                <div class="pos-sum-row"><span>Subtotal:</span><strong id="c2Subtotal">₹498.00</strong></div>
                                <div class="pos-sum-row lan-disc-row" id="c2CouponRow" style="display:none;"><span>Coupon Discount:</span><strong id="c2CouponDiscount">-₹0.00</strong></div>
                                <div class="pos-sum-row lan-disc-row" id="c2LoyaltyRow" style="display:none;"><span>Points Redeemed:</span><strong id="c2LoyaltyDiscount">-₹0.00</strong></div>
                                <div class="pos-sum-row"><span>Tax (GST 5%):</span><span id="c2Tax">₹24.90</span></div>
                                <div class="pos-sum-row total"><span>Grand Total:</span><span id="c2Total">₹522.90</span></div>
                            </div>

                            <button type="button" class="pos-checkout-btn" id="c2CheckoutBtn" style="background:var(--lan-blue);">Submit Bill to Central Host</button>
                        </div>
                    </div>
                </div>


                <!-- 3. TAB: CENTRAL HOST MANAGER MONITOR -->
                <div class="lan-panel" id="tab-central-host">
                    <div style="margin-bottom:20px;">
                        <h4 style="margin:0 0 4px; font-size:16px; color:var(--lan-navy);">Store Host Console • Consolidated Store Real-Time Feed</h4>
                        <p style="margin:0; font-size:13px; color:var(--lan-muted);">Central Server (192.168.1.100) aggregating live transactions from all counter terminals.</p>
                    </div>

                    <!-- Terminal Status Cards -->
                    <div class="host-terminals-grid">
                        <div class="host-terminal-card">
                            <div class="host-terminal-header">
                                <h5>Terminal 01 (Main Counter)</h5>
                                <span class="status-tag in-stock">ONLINE</span>
                            </div>
                            <div class="terminal-meta-row"><span>Operator:</span><strong>Amit S.</strong></div>
                            <div class="terminal-meta-row"><span>Today's Counter Total:</span><strong id="hostC1Rev">₹26,400.00</strong></div>
                            <div class="terminal-meta-row"><span>Network Latency:</span><span>3ms (Local LAN)</span></div>
                        </div>

                        <div class="host-terminal-card">
                            <div class="host-terminal-header">
                                <h5>Terminal 02 (Express Counter)</h5>
                                <span class="status-tag in-stock">ONLINE</span>
                            </div>
                            <div class="terminal-meta-row"><span>Operator:</span><strong>Priya V.</strong></div>
                            <div class="terminal-meta-row"><span>Today's Counter Total:</span><strong id="hostC2Rev">₹16,450.00</strong></div>
                            <div class="terminal-meta-row"><span>Network Latency:</span><span>4ms (Local LAN)</span></div>
                        </div>

                        <div class="host-terminal-card">
                            <div class="host-terminal-header">
                                <h5>Consolidated Store Total</h5>
                                <span class="status-tag paid">BALANCED</span>
                            </div>
                            <div class="terminal-meta-row"><span>Combined Revenue:</span><strong id="hostStoreRev" style="color:var(--lan-blue); font-size:15px;">₹42,850.00</strong></div>
                            <div class="terminal-meta-row"><span>Total Bills Processed:</span><strong id="hostInvCount">58 Invoices</strong></div>
                            <div class="terminal-meta-row"><span>Central Database:</span><span>Ready & Synced</span></div>
                        </div>
                    </div>

                    <!-- Live Multi-Counter Transaction Feed -->
                    <div style="margin-top:20px;">
                        <h5 style="font-size:14px; font-weight:800; color:var(--lan-navy); margin:0 0 10px;">Live Multi-Counter Transaction Feed</h5>
                        <div class="live-stream-box" id="lanEventStream">
                            <div class="stream-item">
                                <div class="stream-left">
                                    <span class="stream-terminal-pill c1">COUNTER-1</span>
                                    <div><strong>INV-C1-849</strong>: 1x Cotton Crew T-Shirt (M)<div style="font-size:11px; color:#64748b;">Recorded on Central Host • Sync Latency: 3ms</div></div>
                                </div>
                                <div style="text-align:right;"><div style="font-weight:800; color:var(--lan-navy);">₹523.95</div><div style="font-size:11px; color:#64748b;">Just now</div></div>
                            </div>
                            <div class="stream-item">
                                <div class="stream-left">
                                    <span class="stream-terminal-pill c2">COUNTER-2</span>
                                    <div><strong>INV-C2-411</strong>: 2x Fast Charging Cable USB-C<div style="font-size:11px; color:#64748b;">Recorded on Central Host • Sync Latency: 4ms</div></div>
                                </div>
                                <div style="text-align:right;"><div style="font-weight:800; color:var(--lan-navy);">₹522.90</div><div style="font-size:11px; color:#64748b;">2 mins ago</div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. TAB: SHARED PRODUCT CATALOG -->
                <div class="lan-panel" id="tab-shared-inventory">
                    <div style="margin-bottom:18px;">
                        <h4 style="margin:0 0 4px; font-size:16px; color:var(--lan-navy);">Centralized Store Catalog & Stock Levels</h4>
                        <p style="margin:0; font-size:13px; color:var(--lan-muted);">When any checkout counter submits an invoice, the corresponding stock updates in this shared table immediately.</p>
                    </div>

                    <div class="demo-table-wrapper">
                        <table class="demo-table">
                            <thead>
                                <tr>
                                    <th>Item & Code</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Central Stock Balance</th>
                                    <th>Stock Status</th>
                                </tr>
                            </thead>
                            <tbody id="lanSharedCatalogBody"></tbody>
                        </table>
                    </div>
                </div>

                <!-- 5. TAB: NETWORK COUPONS & CUSTOMER WALLET -->
                <div class="lan-panel" id="tab-lan-loyalty-coupons">
                    <div style="margin-bottom:18px;">
                        <h4 style="margin:0 0 4px; font-size:16px; color:var(--lan-navy);">Store-Wide Promotional Coupon Engine & Central Loyalty Wallet</h4>
                        <p style="margin:0; font-size:13px; color:var(--lan-muted);">Coupons and customer points are centralized on the Store Server (192.168.1.100). Any discount applied or points redeemed at any counter is synchronized immediately across all terminals.</p>
                    </div>

                    <!-- Active Network Coupons Section -->
                    <div style="margin-bottom:24px;">
                        <h5 style="font-size:14px; font-weight:800; color:var(--lan-navy); margin:0 0 12px; display:flex; align-items:center; gap:8px;">
                            <span>Active Network Promotional Coupons</span>
                            <span class="status-tag in-stock">ALL COUNTERS SYNCED</span>
                        </h5>
                        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:14px;">
                            <div class="lan-coupon-card">
                                <div>
                                    <div style="font-weight:800; font-size:15px; color:var(--lan-blue);">SAVE10</div>
                                    <div style="font-size:12px; color:#475569; margin-top:2px;">10% Off on entire bill</div>
                                    <div style="font-size:11px; color:#64748b; margin-top:4px;">Min purchase: ₹500.00 • Active on C1 & C2</div>
                                </div>
                                <span class="lan-sync-pill">Active</span>
                            </div>
                            <div class="lan-coupon-card">
                                <div>
                                    <div style="font-weight:800; font-size:15px; color:var(--lan-blue);">LAN150</div>
                                    <div style="font-size:12px; color:#475569; margin-top:2px;">Flat ₹150 Off instant discount</div>
                                    <div style="font-size:11px; color:#64748b; margin-top:4px;">Min purchase: ₹1,000.00 • Multi-counter ready</div>
                                </div>
                                <span class="lan-sync-pill">Active</span>
                            </div>
                            <div class="lan-coupon-card">
                                <div>
                                    <div style="font-weight:800; font-size:15px; color:var(--lan-blue);">STORE50</div>
                                    <div style="font-size:12px; color:#475569; margin-top:2px;">Flat ₹50 Off quick discount</div>
                                    <div style="font-size:11px; color:#64748b; margin-top:4px;">Min purchase: ₹300.00 • Instant verify</div>
                                </div>
                                <span class="lan-sync-pill">Active</span>
                            </div>
                        </div>
                    </div>

                    <!-- Synchronized Customer Loyalty Wallet Registry -->
                    <div>
                        <h5 style="font-size:14px; font-weight:800; color:var(--lan-navy); margin:0 0 12px; display:flex; align-items:center; gap:8px;">
                            <span>Central Customer Loyalty Wallet Registry (Real-Time Synced)</span>
                            <span class="lan-sync-pill">Host 192.168.1.100</span>
                        </h5>
                        <div class="demo-table-wrapper">
                            <table class="demo-table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Mobile Number</th>
                                        <th>Loyalty Tier</th>
                                        <th>Available Points Balance</th>
                                        <th>Wallet Value (₹)</th>
                                        <th>Last Terminal Activity</th>
                                    </tr>
                                </thead>
                                <tbody id="lanHostCustomerWalletBody">
                                    <!-- Populated dynamically by JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="architecture-note-box" style="margin-top:20px;">
                        <strong>Network Architecture Note:</strong> When a customer shops at Counter 1 and later at Counter 2, their loyalty points and coupon usage are validated in single-millisecond LAN RPC calls to the central server. This prevents double redemption across multiple cash registers even under heavy festival rushes.
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Simulated Multi-Terminal Receipt Modal -->
    <div class="demo-receipt-modal" id="lanReceiptModal">
        <div class="receipt-slip">
            <div class="receipt-header">
                <h4>CITY RETAILERS (LAN SUITE)</h4>
                <div id="lanReceiptTerminal">Counter Terminal: COUNTER-1</div>
                <div>Server Host: 192.168.1.100</div>
                <div style="margin-top:4px;">Bill: <strong id="lanReceiptBillNo">INV-C1-849</strong></div>
                <div id="lanReceiptCustomer" style="font-size:12px; color:#475569; margin-top:3px;">Customer: Rajesh Kumar (Gold)</div>
            </div>
            
            <div class="receipt-items" id="lanReceiptItems"></div>

            <div class="receipt-row" id="lanReceiptDiscountRow" style="display:none; color:#059669;">
                <span>Coupon Discount:</span>
                <span id="lanReceiptDiscount">-₹0.00</span>
            </div>
            <div class="receipt-row" id="lanReceiptLoyaltyRow" style="display:none; color:#1d4ed8;">
                <span>Points Redeemed:</span>
                <span id="lanReceiptLoyalty">-₹0.00</span>
            </div>

            <div class="receipt-row receipt-total">
                <span>TOTAL BILLED:</span>
                <span id="lanReceiptTotal">₹0.00</span>
            </div>

            <div class="receipt-row" id="lanReceiptWalletRow" style="font-size:11px; color:#64748b; border-top:1px dashed #cbd5e1; padding-top:6px; margin-top:6px; display:none;">
                <span>Updated Points Balance:</span>
                <strong id="lanReceiptWalletBal" style="color:#0f172a;">184 pts</strong>
            </div>

            <div class="receipt-footer">
                *** DEMO MULTI-TERMINAL PREVIEW ***<br>
                Transaction & Points synchronized to Central Store Host!
            </div>

            <button type="button" class="receipt-close-btn" id="closeLanReceiptBtn">Close Simulated Receipt</button>
        </div>
    </div>


    <!-- ========================================================
         SECTION 5: BUSINESS BENEFITS
         ======================================================== -->
    <section class="lan-benefits" id="benefits">
        <div class="lan-container">
            <div class="lan-section-header">
                <span class="lan-badge blue">Operational Advantages</span>
                <h2>Designed for Connected Retail Operations</h2>
                <p>RS Inventory – LAN brings structured, reliable coordination across your checkout stations and stockroom without complicated multi-software setups.</p>
            </div>

            <div class="lan-benefits-grid">
                <div class="lan-benefit-item">
                    <div class="lan-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    </div>
                    <div class="lan-benefit-text">
                        <h3>Access to Shared Inventory Information</h3>
                        <p>Any counter clerk can instantly verify available stock numbers and item locations without walking over to other registers or the backroom.</p>
                    </div>
                </div>

                <div class="lan-benefit-item">
                    <div class="lan-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                    <div class="lan-benefit-text">
                        <h3>Organized Multi-Terminal Billing Workflow</h3>
                        <p>Process customers simultaneously during peak hours with separate counter invoice numbering and dedicated cash drawer accountability.</p>
                    </div>
                </div>

                <div class="lan-benefit-item">
                    <div class="lan-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path></svg>
                    </div>
                    <div class="lan-benefit-text">
                        <h3>Centralized Product Records</h3>
                        <p>Update product selling prices, MRP, or new SKU arrivals once on the host PC and have them instantly reflected on all counter registers.</p>
                    </div>
                </div>

                <div class="lan-benefit-item">
                    <div class="lan-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                    <div class="lan-benefit-text">
                        <h3>Easier Coordination Between Staff</h3>
                        <p>Store cashiers focus on customer checkout while managers log supplier shipments and manage promotions from the office computer.</p>
                    </div>
                </div>

                <div class="lan-benefit-item">
                    <div class="lan-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <div class="lan-benefit-text">
                        <h3>Improved Visibility into Sales Activity</h3>
                        <p>Consolidated reports combine figures from all registers, providing clear end-of-day revenue reconciliation and shift audits.</p>
                    </div>
                </div>

                <div class="lan-benefit-item">
                    <div class="lan-benefit-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                    </div>
                    <div class="lan-benefit-text">
                        <h3>Reduced Manual Reconciliation</h3>
                        <p>Eliminate manual paper slips and end-of-day tallying between separate single-PC registers with unified local data storage.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 6: PRODUCT SUITABILITY
         ======================================================== -->
    <section class="lan-suitability" id="suitability">
        <div class="lan-container">
            <div class="lan-section-header">
                <span class="lan-badge neutral">Store Categories</span>
                <h2>Who Is RS Inventory – LAN Designed For?</h2>
                <p>RS Inventory – LAN is suited for retail businesses where a single checkout counter creates customer queues or where separate office and billing PCs are needed.</p>
            </div>

            <div class="lan-suitability-grid">
                <div class="lan-suitability-card">
                    <div class="lan-suitability-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M16 8l-8 8"></path></svg>
                    </div>
                    <h3>Multi-Counter Supermarkets</h3>
                    <p>Grocery marts with two or more billing desks sharing the same fast-moving stock catalog and barcode scanning workflow.</p>
                </div>

                <div class="lan-suitability-card">
                    <div class="lan-suitability-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"></path></svg>
                    </div>
                    <h3>Apparel & Footwear Showrooms</h3>
                    <p>Clothing boutiques with separate floor billing and manager stockroom verification terminals.</p>
                </div>

                <div class="lan-suitability-card">
                    <div class="lan-suitability-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect></svg>
                    </div>
                    <h3>Electronics & Gadget Retailers</h3>
                    <p>Mobile and accessories stores managing checkout counters along with customer service and warranty desks.</p>
                </div>

                <div class="lan-suitability-card">
                    <div class="lan-suitability-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                    </div>
                    <h3>Hardware, Paint & Sanitary Stores</h3>
                    <p>Shops with counter billing at the front desk and warehouse/godown stock issue verification terminals.</p>
                </div>

                <div class="lan-suitability-card">
                    <div class="lan-suitability-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path></svg>
                    </div>
                    <h3>Departmental & General Stores</h3>
                    <p>Multi-section retail outlets requiring synchronized product pricing and coordinated cashier operations.</p>
                </div>

                <div class="lan-suitability-card">
                    <div class="lan-suitability-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                    <h3>Wholesale & Retail Mixed Counters</h3>
                    <p>Businesses operating separate consumer checkout and wholesale invoice processing counters under one roof.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 7: LAN REQUIREMENTS & COMPATIBILITY
         ======================================================== -->
    <section class="lan-requirements" id="requirements">
        <div class="lan-container">
            <div class="lan-section-header">
                <span class="lan-badge cyan">Deployment Guidelines</span>
                <h2>Check Your LAN Setup</h2>
                <p>Ensure your store environment meets the recommended network and computer specifications for dependable multi-terminal performance.</p>
            </div>

            <div class="lan-req-grid">
                <div class="lan-req-card">
                    <h4>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect></svg>
                        Central Host PC Specs
                    </h4>
                    <ul class="lan-req-list">
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Dedicated PC or local server (Windows 10/11 or Linux host)</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>8 GB RAM or higher recommended for host machine</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Fast SSD storage for database logging and automated daily backups</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Static IP assignment within your local subnet</li>
                    </ul>
                </div>

                <div class="lan-req-card">
                    <h4>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect></svg>
                        Counter Billing Terminals
                    </h4>
                    <ul class="lan-req-list">
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Standard desktop PCs, all-in-one POS units, or counter laptops</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Compatible with standard USB / Bluetooth barcode scanners</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Compatible with 2-inch and 3-inch thermal POS receipt printers</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Chrome / modern browser or dedicated client interface</li>
                    </ul>
                </div>

                <div class="lan-req-card">
                    <h4>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line></svg>
                        Local Network Configuration
                    </h4>
                    <ul class="lan-req-list">
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Gigabit Ethernet switch (recommended) or reliable store Wi-Fi router</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Low latency (< 10ms) communication across terminals</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>Isolated store subnet to prevent interference from guest Wi-Fi</li>
                        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>External internet optional for counter billing; required for cloud backups</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         EDITION COMPARISON & CROSS-LINK STRIP
         ======================================================== -->
    <section class="lan-comparison-strip">
        <div class="lan-container">
            <div class="lan-compare-box">
                <div class="lan-compare-text">
                    <span class="lan-badge primary" style="margin-bottom:8px;">Edition Comparison</span>
                    <h3>Operating a Single Billing Counter?</h3>
                    <p>If your store only requires inventory tracking and billing on a single computer, explore <strong>RS Inventory – Solo</strong>. It provides complete product management and POS invoicing without local network setup prerequisites.</p>
                </div>
                <div style="display:flex; flex-wrap:wrap; gap:12px;">
                    <a href="{{ route('products.rs-inventory-solo') }}" class="lan-btn lan-btn-outline" style="white-space:nowrap;">
                        <span>RS Inventory – Solo</span>
                    </a>
                    <a href="{{ route('products.rs-inventory-business') }}" class="lan-btn lan-btn-primary" style="white-space:nowrap;">
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
    <section class="lan-form-section" id="demo-request">
        <div class="lan-container">
            <div class="lan-form-box">
                <div class="lan-section-header" style="margin-bottom: 32px;">
                    <span class="lan-badge blue">Consultation & Demonstration</span>
                    <h2>Request a LAN Product Demo</h2>
                    <p>Tell us about your store layout, number of checkout counters, and network setup. Our engineering team will review your requirements and coordinate a demonstration.</p>
                </div>

                @if(session('status'))
                    <div class="form-alert success">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <div>
                            <strong>Inquiry Received</strong>
                            <p style="margin:2px 0 0;">{{ session('status') }}</p>
                        </div>
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <div class="form-alert error">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <div>
                            <strong>Please resolve the following fields:</strong>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('products.rs-inventory-lan.submit') }}" id="lanInquiryForm">
                    @csrf
                    <!-- Honeypot -->
                    <input type="text" name="my_custom_country_verify" style="display:none !important;" tabindex="-1" autocomplete="off">

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="lan-name">Full Name <span class="req">*</span></label>
                            <input type="text" id="lan-name" name="name" class="solo-form-control" value="{{ old('name') }}" placeholder="e.g. Sunil Mehta" required>
                        </div>

                        <div class="solo-form-group">
                            <label for="lan-business-name">Business / Store Name <span class="req">*</span></label>
                            <input type="text" id="lan-business-name" name="business_name" class="solo-form-control" value="{{ old('business_name') }}" placeholder="e.g. Prime Departmental Store" required>
                        </div>
                    </div>

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="lan-email">Work Email Address <span class="req">*</span></label>
                            <input type="email" id="lan-email" name="email" class="solo-form-control" value="{{ old('email') }}" placeholder="e.g. sunil@primestore.com" required>
                        </div>

                        <div class="solo-form-group">
                            <label for="lan-phone">Phone / WhatsApp Number <span class="req">*</span></label>
                            <input type="tel" id="lan-phone" name="phone" class="solo-form-control" value="{{ old('phone') }}" placeholder="e.g. +91 98765 43210" required>
                        </div>
                    </div>

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="lan-business-type">Business Type <span class="req">*</span></label>
                            <select id="lan-business-type" name="business_type" class="solo-form-control" required>
                                <option value="" disabled {{ old('business_type') ? '' : 'selected' }}>Select your business category...</option>
                                <option value="Supermarket / Grocery Mart" {{ old('business_type') == 'Supermarket / Grocery Mart' ? 'selected' : '' }}>Supermarket / Grocery Mart</option>
                                <option value="Clothing & Apparel Showroom" {{ old('business_type') == 'Clothing & Apparel Showroom' ? 'selected' : '' }}>Clothing & Apparel Showroom</option>
                                <option value="Consumer Electronics & Mobiles" {{ old('business_type') == 'Consumer Electronics & Mobiles' ? 'selected' : '' }}>Consumer Electronics & Mobiles</option>
                                <option value="Hardware, Sanitary & Paint" {{ old('business_type') == 'Hardware, Sanitary & Paint' ? 'selected' : '' }}>Hardware, Sanitary & Paint</option>
                                <option value="Footwear & Leather Goods" {{ old('business_type') == 'Footwear & Leather Goods' ? 'selected' : '' }}>Footwear & Leather Goods</option>
                                <option value="Departmental Store" {{ old('business_type') == 'Departmental Store' ? 'selected' : '' }}>Departmental Store</option>
                                <option value="Other Multi-Counter Retail" {{ old('business_type') == 'Other Multi-Counter Retail' ? 'selected' : '' }}>Other Multi-Counter Retail</option>
                            </select>
                        </div>

                        <div class="solo-form-group">
                            <label for="lan-billing-computers">Number of Billing Computers / Counters <span class="req">*</span></label>
                            <select id="lan-billing-computers" name="billing_computers" class="solo-form-control" required>
                                <option value="" disabled {{ old('billing_computers') ? '' : 'selected' }}>Select number of counter PCs...</option>
                                <option value="2 Counters (Dual Counter)" {{ old('billing_computers') == '2 Counters (Dual Counter)' ? 'selected' : '' }}>2 Counters (Dual Counter)</option>
                                <option value="3 - 5 Counters (Multi-Counter)" {{ old('billing_computers') == '3 - 5 Counters (Multi-Counter)' ? 'selected' : '' }}>3 - 5 Counters (Multi-Counter)</option>
                                <option value="6+ Counters (Large Store / Mart)" {{ old('billing_computers') == '6+ Counters (Large Store / Mart)' ? 'selected' : '' }}>6+ Counters (Large Store / Mart)</option>
                            </select>
                        </div>
                    </div>

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="lan-locations">Number of Store Locations <span class="req">*</span></label>
                            <select id="lan-locations" name="store_locations" class="solo-form-control" required>
                                <option value="" disabled {{ old('store_locations') ? '' : 'selected' }}>Select store locations...</option>
                                <option value="1 Single Store Location" {{ old('store_locations') == '1 Single Store Location' ? 'selected' : '' }}>1 Single Store Location</option>
                                <option value="2 - 3 Outlets" {{ old('store_locations') == '2 - 3 Outlets' ? 'selected' : '' }}>2 - 3 Outlets</option>
                                <option value="4+ Chain Stores" {{ old('store_locations') == '4+ Chain Stores' ? 'selected' : '' }}>4+ Chain Stores</option>
                            </select>
                        </div>

                        <div class="solo-form-group">
                            <label for="lan-software">Current Inventory / Billing System</label>
                            <input type="text" id="lan-software" name="current_software" class="solo-form-control" value="{{ old('current_software') }}" placeholder="e.g. Busy, Tally, Excel, or Paper Billing">
                        </div>
                    </div>

                    <!-- Required Features Checkboxes -->
                    <div class="solo-form-group">
                        <label>Required LAN Capabilities (Select all that apply)</label>
                        <div class="solo-checkbox-group">
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_features[]" value="Shared Live Stock" {{ is_array(old('required_features')) && in_array('Shared Live Stock', old('required_features')) ? 'checked' : '' }}>
                                <span>Shared Live Inventory</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_features[]" value="Multi-Terminal Billing" {{ is_array(old('required_features')) && in_array('Multi-Terminal Billing', old('required_features')) ? 'checked' : '' }}>
                                <span>Concurrent POS Billing</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_features[]" value="Cashier Shift Reconciliation" {{ is_array(old('required_features')) && in_array('Cashier Shift Reconciliation', old('required_features')) ? 'checked' : '' }}>
                                <span>Cashier Shift Auditing</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_features[]" value="Role-Based Security" {{ is_array(old('required_features')) && in_array('Role-Based Security', old('required_features')) ? 'checked' : '' }}>
                                <span>Role-Based Permissions</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_features[]" value="Thermal Receipt Printing" {{ is_array(old('required_features')) && in_array('Thermal Receipt Printing', old('required_features')) ? 'checked' : '' }}>
                                <span>Thermal Receipt Printing</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_features[]" value="Centralized Sales Reporting" {{ is_array(old('required_features')) && in_array('Centralized Sales Reporting', old('required_features')) ? 'checked' : '' }}>
                                <span>Consolidated Reports</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_features[]" value="Promotional Coupon Engine" {{ is_array(old('required_features')) && in_array('Promotional Coupon Engine', old('required_features')) ? 'checked' : '' }}>
                                <span>Promotional Coupon Engine</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_features[]" value="Customer Loyalty Points Wallet" {{ is_array(old('required_features')) && in_array('Customer Loyalty Points Wallet', old('required_features')) ? 'checked' : '' }}>
                                <span>Customer Loyalty Points Wallet</span>
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
                        <label for="lan-requirements-text">Additional Store Network or Hardware Notes</label>
                        <textarea id="lan-requirements-text" name="additional_requirements" class="solo-form-control" rows="3" placeholder="Specify any details regarding your Wi-Fi router, Ethernet cabling, existing barcode scanners, thermal printers, or store layout...">{{ old('additional_requirements') }}</textarea>
                    </div>

                    <div class="solo-form-submit">
                        <button type="submit" class="lan-btn lan-btn-primary" style="width:100%; padding:16px; border-radius:10px;">
                            <span>Submit LAN Demo Request</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>

                    <p class="solo-form-disclaimer">
                        By submitting this request, you authorize RS ORANGE TECH to contact you regarding RS Inventory – LAN. We respect your privacy.
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 9: FREQUENTLY ASKED QUESTIONS
         ======================================================== -->
    <section class="lan-faq" id="faq">
        <div class="lan-container">
            <div class="lan-section-header">
                <span class="lan-badge blue">Clarifications</span>
                <h2>Frequently Asked Questions</h2>
                <p>Answers to common questions regarding multi-computer deployment, network prerequisites, and data synchronization.</p>
            </div>

            <div class="lan-faq-list">
                
                <!-- FAQ 1 -->
                <div class="lan-faq-item active">
                    <button type="button" class="lan-faq-question" aria-expanded="true">
                        <span>What is RS Inventory – LAN?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        RS Inventory – LAN is a multi-computer retail inventory management and point-of-sale (POS) billing software edition developed by RS ORANGE TECH PVT LTD. It connects multiple checkout counters and management PCs over a local area network to operate with a shared product catalog, synchronized stock levels, and centralized sales reporting.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>How is the LAN edition different from RS Inventory – Solo?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        RS Inventory – Solo is designed for stores operating on a single standalone computer. RS Inventory – LAN includes multi-terminal client-server architecture, enabling multiple cashiers to create invoices simultaneously while sharing stock counts and submitting transactions to a primary host computer.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>Can multiple computers access shared inventory?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        Yes. When authorized counter computers are connected to your local network, they query the master product catalog and live stock balances stored on the primary store host PC.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>Can multiple billing counters operate simultaneously?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        Yes. Multiple checkout counters can generate sales invoices concurrently. Invoices can be configured with counter-specific prefixes (e.g. INV-C1 and INV-C2) for transparent shift handovers and drawer audits.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>Does the software require a central computer or server?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        Yes. One computer on your store premises acts as the primary host hosting the shared database and central services, while counter terminals connect to it as clients across the local network.
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>Does RS Inventory – LAN work without an internet connection?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        Because terminal communication takes place over your in-store local Wi-Fi or wired Ethernet network, primary counter billing and shared inventory lookups do not depend on external internet uptime. An internet connection is recommended for digital email/WhatsApp invoicing and cloud backups.
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>What network configuration is required?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        A reliable local area network using a standard Wi-Fi router or gigabit Ethernet switch is required. We recommend wired Ethernet connections for high-volume checkout counters to ensure minimal latency and steady connectivity.
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>Can different employees have different permissions?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        Yes. RS Inventory – LAN includes role-based access control. Cashier profiles can be restricted to creating invoices without permission to view overall store profitability, override base prices, or write off inventory.
                    </div>
                </div>

                <!-- FAQ 9 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>Can I migrate data from an existing inventory system?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        Yes. The RS ORANGE TECH team provides assistance in migrating existing product masters, barcodes, categories, and supplier lists from spreadsheets or legacy billing software into the central host database.
                    </div>
                </div>

                <!-- FAQ 10 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>How can I request a LAN demonstration?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        You can request a guided multi-terminal demonstration by filling out the Demo Request form above or speaking with the RS ORANGE TECH technical team at <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" style="color:var(--lan-blue); font-weight:700;">{{ $phone }}</a> or via email at <a href="mailto:{{ $email }}" style="color:var(--lan-blue); font-weight:700;">{{ $email }}</a>.
                    </div>
                </div>

                <!-- FAQ 11 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>How do promotional coupons work across multiple billing counters in LAN?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        Promotional coupons are configured centrally on the store's primary server PC. When a cashier at Counter 1 or Counter 2 enters a coupon code, the software instantly verifies minimum bill value, expiry date, and usage limits over the local network within milliseconds. This guarantees uniform promotional pricing across all cash registers without requiring internet connectivity.
                    </div>
                </div>

                <!-- FAQ 12 -->
                <div class="lan-faq-item">
                    <button type="button" class="lan-faq-question" aria-expanded="false">
                        <span>Can customer loyalty points be earned and redeemed at different counters without internet?</span>
                        <span class="lan-faq-icon">▼</span>
                    </button>
                    <div class="lan-faq-answer">
                        Yes. Because customer records and loyalty wallets reside in the centralized LAN database on the host machine, points earned at Counter 1 are immediately available for redemption at Counter 2 or express counters. Built-in concurrency locking prevents duplicate points redemptions across counters.
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 10: BOTTOM CTA BANNER
         ======================================================== -->
    <section class="lan-cta-banner">
        <div class="lan-container">
            <div class="lan-cta-card">
                <div>
                    <span class="lan-badge cyan" style="margin-bottom:12px;">Multi-Computer Deployment</span>
                    <h2 style="font-size:clamp(26px, 3vw, 36px); margin:0 0 12px; font-weight:800;">Ready to Explore Multi-Computer Inventory Management?</h2>
                    <p style="font-size:16px; color:#cbd5e1; margin:0; max-width:640px; line-height:1.6;">
                        Contact RS ORANGE TECH to discuss your store's requirements and explore whether RS Inventory – LAN is suitable for your business.
                    </p>
                </div>
                <div style="display:flex; flex-wrap:wrap; gap:16px; flex-shrink:0; z-index:2;">
                    <a href="#demo-request" class="lan-btn lan-btn-primary">Request a LAN Demo</a>
                    <a href="{{ route('contact') }}" class="lan-btn lan-btn-white">Contact Our Team</a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
    <!-- Multi-Terminal Interactive Demo Script -->
    <script src="{{ asset('js/rs-inventory-lan-demo.js') }}?v=1.05"></script>
@endpush
