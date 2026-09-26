@php
    $pageTitle = $title ?? 'RS Inventory – Business | Enterprise Retail & Multi-Branch Management Software';
    $pageDescription = $description ?? 'Explore RS Inventory – Business by RS ORANGE TECH. An enterprise retail management solution integrating multi-location inventory, purchasing, POS billing, customer loyalty, and business analytics.';
    $pageCanonical = $canonicalUrl ?? url('/products/rs-inventory-business');
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
    <meta property="og:image" content="{{ asset('site-assets/rs-inventory-business-dashboard.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $pageCanonical }}">
    <meta property="twitter:title" content="{{ $pageTitle }}">
    <meta property="twitter:description" content="{{ $pageDescription }}">
    <meta property="twitter:image" content="{{ asset('site-assets/rs-inventory-business-dashboard.jpg') }}">

    <!-- Custom Page Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/rs-inventory-business.css') }}?v=1.01">

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@graph": [
            {
                "@@type": "SoftwareApplication",
                "name": "RS Inventory – Business",
                "applicationCategory": "BusinessApplication",
                "operatingSystem": "Cloud, Hybrid LAN & Multi-Location Windows/Web",
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
                    "description": "Enterprise multi-location retail consultation and customized deployment on request"
                }
            },
            {
                "@@type": "FAQPage",
                "mainEntity": [
                    {
                        "@@type": "Question",
                        "name": "What is RS Inventory – Business?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "RS Inventory – Business is the flagship retail ERP and enterprise management edition developed by RS ORANGE TECH. It scales beyond single-store setups to integrate multi-location stock tracking, procurement, supplier management, POS billing, customer loyalty, promotional coupons, and consolidated business analytics into a unified platform."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "How is the Business edition different from RS Inventory – Solo and LAN?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "RS Inventory – Solo is built for single-computer retail stores, and RS Inventory – LAN manages connected checkout counters within a single local network. RS Inventory – Business connects multiple store outlets, central warehouses, purchasing workflows, customer loyalty ledgers, and multi-tier employee permissions."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Does RS Inventory – Business support multi-branch stock transfers?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. Authorized managers can generate transfer manifests between central warehouses and branch outlets, tracking inventory in transit and updating stock records upon confirmed receipt."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "How does the customer loyalty points system work?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "The loyalty engine accrues reward points automatically based on configurable purchase values. Customers can redeem points against future bills, while the system maintains a complete debit/credit ledger with automatic reversal on refunded transactions."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can I configure promotional discount coupons?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. Administrators can create percentage or flat discount coupons with minimum spend thresholds, expiration dates, usage limits, and specific category eligibility. All coupon redemptions are validated on the backend."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "What employee roles and permissions are supported?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "The software features role-based access control (RBAC) with predefined and custom roles including Business Administrator, Store Manager, Cashier, Inventory Auditor, and Accountant."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Does the system support supplier purchasing and goods receipt?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. It supports purchase order generation, supplier directories, cost price tracking, and Goods Received Notes (GRN) that update inventory levels upon receipt confirmation."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can it integrate with WhatsApp and email communication?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. The business settings include configurable communication gateways for sending digital invoices, loyalty balance alerts, and promotional announcements via email SMTP and WhatsApp Business APIs."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can we migrate data from existing POS or ERP software?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Yes. The RS ORANGE TECH technical engineering team provides structured onboarding and migration assistance for existing product catalogs, SKU barcodes, customer balances, and supplier lists."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "How do I request an enterprise demonstration or pilot?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "You can request a tailored demonstration by submitting the corporate inquiry form on this page or contacting the RS ORANGE TECH enterprise solutions team directly."
                        }
                    }
                ]
            }
        ]
    }
    </script>
@endpush

@section('content')
<div class="biz-page">

    <!-- ========================================================
         SECTION 1: HERO
         ======================================================== -->
    <section class="biz-hero" id="hero">
        <div class="biz-container">
            <div class="biz-hero-grid">
                
                <!-- Left Column -->
                <div class="biz-hero-content">
                    <div class="biz-product-brand">
                        <div class="biz-brand-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <div class="biz-brand-title">
                            RS Inventory <span>– Business</span>
                        </div>
                        <span class="biz-badge blue">Enterprise Edition</span>
                    </div>

                    <h1>Scale Operations Across Outlets. <span class="gradient-text">Unified Retail ERP.</span></h1>
                    
                    <p class="biz-hero-sub">
                        RS Inventory – Business unites multi-location inventory, purchasing, POS billing, customer loyalty, promotional coupons, and executive analytics into an intuitive, high-performance retail management platform.
                    </p>

                    <div class="biz-hero-ctas">
                        <a href="#demo-request" class="biz-btn biz-btn-primary">
                            <span>Request Business Demo</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <a href="#sandbox" class="biz-btn biz-btn-outline">
                            <span>Explore Interactive Sandbox</span>
                        </a>
                    </div>

                    <div class="biz-hero-pills">
                        <div class="biz-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Multi-Branch Logistics</span>
                        </div>
                        <div class="biz-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Loyalty & Coupon Engine</span>
                        </div>
                        <div class="biz-hero-pill-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Purchasing & GRN</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Dashboard Mockup -->
                <div class="biz-hero-visual">
                    <div class="biz-mockup-frame">
                        <div class="biz-mockup-chrome">
                            <span class="chrome-dot red"></span>
                            <span class="chrome-dot yellow"></span>
                            <span class="chrome-dot green"></span>
                            <span class="chrome-title">RS Inventory – Business | Executive Analytics Overview</span>
                        </div>
                        <img src="{{ asset('site-assets/rs-inventory-business-dashboard.jpg') }}" 
                             alt="RS Inventory – Business Enterprise Multi-Store Dashboard" 
                             class="biz-mockup-img"
                             loading="eager"
                             width="1280"
                             height="720">
                    </div>

                    <!-- Floating Badges -->
                    <div class="biz-floating-card card-top-right">
                        <div class="biz-float-icon blue">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="biz-float-label">Consolidated Revenue</div>
                            <div class="biz-float-value">₹6,84,310 / mo</div>
                        </div>
                    </div>

                    <div class="biz-floating-card card-bottom-left">
                        <div class="biz-float-icon emerald">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div>
                            <div class="biz-float-label">Outlets Synced</div>
                            <div class="biz-float-value">3 Active Branches</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 2: CORE ENTERPRISE MODULES
         ======================================================== -->
    <section class="biz-modules" id="modules">
        <div class="biz-container">
            <div class="biz-section-header">
                <span class="biz-badge purple">Full-Featured Suite</span>
                <h2>Modular Architecture for Growing Retail Brands</h2>
                <p>Designed to support complex retail workflows without operational fragmentation or data silos.</p>
            </div>

            <div class="biz-modules-grid">
                <!-- Module 1: Centralized Inventory -->
                <div class="biz-module-card">
                    <div class="biz-module-icon blue">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                    </div>
                    <h3>Centralized Inventory</h3>
                    <p>Standardized product masters, barcode SKU management, multi-tax brackets, and automated reorder alerts across all facilities.</p>
                    <ul class="biz-module-features">
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Unified SKU & Barcode Registry</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Min/Max Restock Thresholds</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Complete Stock Movement Audit Ledger</li>
                    </ul>
                </div>

                <!-- Module 2: Purchasing & GRN -->
                <div class="biz-module-card">
                    <div class="biz-module-icon orange">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </div>
                    <h3>Purchasing & Supplier Orders</h3>
                    <p>Streamline procurement with formal purchase orders, vendor credit balances, and verified stock receiving via Goods Received Notes.</p>
                    <ul class="biz-module-features">
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Supplier Directory & Payables Tracking</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> PO-to-GRN Stock Inwarding</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Landed Cost & Margin Protection</li>
                    </ul>
                </div>

                <!-- Module 3: Multi-Location Logistics -->
                <div class="biz-module-card">
                    <div class="biz-module-icon emerald">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <h3>Multi-Location Transfers</h3>
                    <p>Coordinate stock transfers between central warehouses and store outlets with transfer verification to eliminate inventory shrinkage.</p>
                    <ul class="biz-module-features">
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Transfer Request Manifests</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> In-Transit Inventory Visibility</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Discrepancy & Shrinkage Logging</li>
                    </ul>
                </div>

                <!-- Module 4: CRM & Loyalty Points -->
                <div class="biz-module-card">
                    <div class="biz-module-icon purple">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3>Customer CRM & Loyalty</h3>
                    <p>Build repeat business with tier-based loyalty wallets, points accrual, customer credit limits, and complete transaction histories.</p>
                    <ul class="biz-module-features">
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Configurable Points Accrual & Redemption</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Customer Wallet Balance Ledger</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Automatic Reversal on Returns</li>
                    </ul>
                </div>

                <!-- Module 5: Dynamic Promotions & Coupons -->
                <div class="biz-module-card">
                    <div class="biz-module-icon amber">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                    </div>
                    <h3>Promotions & Coupons</h3>
                    <p>Run targeted marketing campaigns with coupon codes, percentage or flat discounts, minimum purchase rules, and redemption controls.</p>
                    <ul class="biz-module-features">
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Percentage & Flat Value Codes</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Backend Fraud & Overuse Protection</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Campaign ROI Reporting</li>
                    </ul>
                </div>

                <!-- Module 6: Executive Analytics -->
                <div class="biz-module-card">
                    <div class="biz-module-icon cyan">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <h3>Financial & Inventory Analytics</h3>
                    <p>Access consolidated real-time reporting covering gross margin calculations, sales by outlet, dead-stock aging, and tax liability summaries.</p>
                    <ul class="biz-module-features">
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Accurate Margin & Profitability Metrics</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Outlet-Wise Performance Benchmark</li>
                        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> One-Click Audit Export</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 3: ARCHITECTURE & MULTI-LOCATION TOPOLOGY
         ======================================================== -->
    <section class="biz-architecture" id="architecture">
        <div class="biz-container">
            <div class="biz-section-header">
                <span class="biz-badge blue">Enterprise Deployment</span>
                <h2>Multi-Location Architecture & Topology</h2>
                <p>Seamlessly coordinate central headquarters, regional distribution warehouses, and front-line store branches.</p>
            </div>

            <div class="biz-arch-diagram">
                <div class="biz-arch-tiers">
                    <!-- Central Cloud / HQ Tier -->
                    <div class="biz-arch-tier-box central">
                        <div class="biz-arch-icon" style="background:#dbeafe; color:var(--biz-blue);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
                        </div>
                        <h4 style="margin:0 0 6px; font-size:16px; color:var(--biz-navy); font-weight:800;">Headquarters & Cloud Server</h4>
                        <p style="margin:0; font-size:12px; color:var(--biz-muted); line-height:1.5;">Consolidated database, purchasing approvals, price master, and global analytics.</p>
                    </div>

                    <!-- Connector 1 -->
                    <div class="biz-arch-connector">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        <span style="font-size:11px; font-weight:700; color:var(--biz-blue);">Encrypted Sync</span>
                    </div>

                    <!-- Distribution Warehouse Tier -->
                    <div class="biz-arch-tier-box highlight">
                        <div class="biz-arch-icon" style="background:#dcfce7; color:var(--biz-emerald);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        </div>
                        <h4 style="margin:0 0 6px; font-size:16px; color:var(--biz-navy); font-weight:800;">Central Warehouse</h4>
                        <p style="margin:0; font-size:12px; color:var(--biz-muted); line-height:1.5;">Bulk supplier receiving (GRN), barcoding, dispatch manifests, and stock transfers.</p>
                    </div>

                    <!-- Connector 2 -->
                    <div class="biz-arch-connector">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        <span style="font-size:11px; font-weight:700; color:var(--biz-blue);">LAN / Branch Sync</span>
                    </div>

                    <!-- Retail Outlets Tier -->
                    <div class="biz-arch-tier-box central">
                        <div class="biz-arch-icon" style="background:#f3e8ff; color:var(--biz-purple);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                        </div>
                        <h4 style="margin:0 0 6px; font-size:16px; color:var(--biz-navy); font-weight:800;">Retail Outlets (1 to 50+)</h4>
                        <p style="margin:0; font-size:12px; color:var(--biz-muted); line-height:1.5;">Counter billing, customer loyalty redemptions, local stock queries, and drawer shifts.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 4: INTERACTIVE MULTI-LOCATION SANDBOX
         ======================================================== -->
    <section class="biz-demo-section" id="sandbox">
        <div class="biz-container">
            <div class="biz-section-header">
                <span class="biz-badge blue">Interactive Experience</span>
                <h2>Experience RS Inventory – Business</h2>
                <p>Test the multi-branch console, advanced POS billing, customer loyalty engine, and stock transfers below.</p>
            </div>

            <!-- Disclaimer -->
            <div class="biz-demo-disclaimer">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <span><strong>Interactive Demonstration:</strong> This sandbox simulates multi-location branch switching, loyalty point deductions, coupon applications, and stock transfers in real-time.</span>
            </div>

            <div class="biz-demo-app">
                <!-- Topbar -->
                <div class="biz-app-topbar">
                    <div class="biz-app-identity">
                        <div class="biz-app-logo">BIZ</div>
                        <div class="biz-app-name">RS Inventory – Business <span style="font-weight:400; opacity:0.8;">| Retail ERP Suite</span></div>
                    </div>
                    
                    <div class="biz-branch-selector-wrap">
                        <label for="bizBranchSelect" style="font-size:13px; font-weight:700;">Active Branch:</label>
                        <select id="bizBranchSelect" class="biz-branch-select">
                            <option value="all">🏢 All Stores (Consolidated)</option>
                            <option value="b1">🏬 Downtown Flagship Store</option>
                            <option value="b2">📦 Central Distribution Warehouse</option>
                            <option value="b3">🏪 Suburban Express Outlet</option>
                        </select>
                    </div>
                </div>

                <!-- Tabs Navigation -->
                <div class="biz-tabs-nav" role="tablist">
                    <button type="button" class="biz-tab-btn active" data-tab="tab-dashboard">
                        📊 Executive Dashboard
                    </button>
                    <button type="button" class="biz-tab-btn" data-tab="tab-pos">
                        🖥 Advanced POS & Loyalty
                    </button>
                    <button type="button" class="biz-tab-btn" data-tab="tab-purchasing">
                        📥 Purchasing & GRN
                    </button>
                    <button type="button" class="biz-tab-btn" data-tab="tab-loyalty">
                        🎁 Coupons & Loyalty Hub
                    </button>
                    <button type="button" class="biz-tab-btn" data-tab="tab-transfers">
                        🚚 Inter-Branch Stock Transfers
                    </button>
                    <button type="button" class="biz-tab-btn" data-tab="tab-license">
                        🔑 License & Registration
                    </button>
                </div>

                <!-- ==================== TAB 1: EXECUTIVE DASHBOARD ==================== -->
                <div class="biz-panel active" id="tab-dashboard">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                        <div>
                            <h4 style="margin:0 0 4px; font-size:17px; color:var(--biz-navy); font-weight:800;">Real-Time Financial & Store Performance</h4>
                            <p style="margin:0; font-size:13px; color:var(--biz-muted);">Filtered View: <span id="bizActiveBranchBadge" style="font-weight:700; color:var(--biz-blue);">All Outlets (Consolidated)</span></p>
                        </div>
                        <span class="status-tag in-stock">Central Host Live</span>
                    </div>

                    <!-- 4 KPI Cards -->
                    <div class="biz-kpi-grid">
                        <div class="biz-kpi-card">
                            <div class="biz-kpi-header">
                                <span class="biz-kpi-title">Gross Revenue</span>
                                <span class="biz-badge blue" style="padding:2px 8px; font-size:10px;">This Month</span>
                            </div>
                            <div class="biz-kpi-value" id="bizKpiSales">₹6,84,310</div>
                            <div class="biz-kpi-sub">▲ +14.2% vs last month</div>
                        </div>

                        <div class="biz-kpi-card">
                            <div class="biz-kpi-header">
                                <span class="biz-kpi-title">Invoices Processed</span>
                                <span class="biz-badge emerald" style="padding:2px 8px; font-size:10px;">Transactions</span>
                            </div>
                            <div class="biz-kpi-value" id="bizKpiOrders">482</div>
                            <div class="biz-kpi-sub">Avg Bill Value: ₹1,419</div>
                        </div>

                        <div class="biz-kpi-card">
                            <div class="biz-kpi-header">
                                <span class="biz-kpi-title">Gross Margin</span>
                                <span class="biz-badge purple" style="padding:2px 8px; font-size:10px;">Profitability</span>
                            </div>
                            <div class="biz-kpi-value" id="bizKpiMargin">34.2%</div>
                            <div class="biz-kpi-sub" style="color:var(--biz-blue);">Cost of Goods Deducted</div>
                        </div>

                        <div class="biz-kpi-card">
                            <div class="biz-kpi-header">
                                <span class="biz-kpi-title">Inventory Valuation</span>
                                <span class="biz-badge amber" style="padding:2px 8px; font-size:10px;">At Cost</span>
                            </div>
                            <div class="biz-kpi-value" id="bizKpiValuation">₹1.89 Cr</div>
                            <div class="biz-kpi-sub" style="color:var(--biz-navy);">3,240 Total Stock Units</div>
                        </div>
                    </div>

                    <!-- Split Widgets: Comparison Bar Chart + Catalog Breakdown -->
                    <div class="biz-split-metrics">
                        <div class="biz-widget-box">
                            <div class="biz-widget-header">
                                <h4>Branch Sales Contribution</h4>
                                <span style="font-size:12px; color:var(--biz-muted);">Live Sync</span>
                            </div>
                            <div class="biz-bar-chart">
                                <div class="biz-bar-row">
                                    <div class="biz-bar-meta">
                                        <span>Downtown Flagship Store</span>
                                        <strong>₹3,42,150 (50%)</strong>
                                    </div>
                                    <div class="biz-bar-track">
                                        <div class="biz-bar-fill blue" style="width: 50%;"></div>
                                    </div>
                                </div>
                                <div class="biz-bar-row">
                                    <div class="biz-bar-meta">
                                        <span>Central Distribution Warehouse (B2B Bulk)</span>
                                        <strong>₹1,85,200 (27%)</strong>
                                    </div>
                                    <div class="biz-bar-track">
                                        <div class="biz-bar-fill purple" style="width: 27%;"></div>
                                    </div>
                                </div>
                                <div class="biz-bar-row">
                                    <div class="biz-bar-meta">
                                        <span>Suburban Express Outlet</span>
                                        <strong>₹1,56,960 (23%)</strong>
                                    </div>
                                    <div class="biz-bar-track">
                                        <div class="biz-bar-fill orange" style="width: 23%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="biz-widget-box">
                            <div class="biz-widget-header">
                                <h4>Recent Enterprise Events</h4>
                                <span class="status-tag in-stock">4ms Latency</span>
                            </div>
                            <div style="font-size:12px; display:flex; flex-direction:column; gap:12px;">
                                <div style="display:flex; justify-content:space-between; padding-bottom:8px; border-bottom:1px solid var(--biz-line);">
                                    <div><strong>INV-BIZ-84102</strong> • Flagship Counter 1<br><span style="color:var(--biz-muted);">2x Formal Blazer (Loyalty Redeemed)</span></div>
                                    <strong style="color:var(--biz-navy);">₹6,498.00</strong>
                                </div>
                                <div style="display:flex; justify-content:space-between; padding-bottom:8px; border-bottom:1px solid var(--biz-line);">
                                    <div><strong>PO-7842</strong> • Supplier Inward (GRN)<br><span style="color:var(--biz-muted);">+50 Blazers, +25 ANC Headphones</span></div>
                                    <strong style="color:var(--biz-emerald);">+75 Units</strong>
                                </div>
                                <div style="display:flex; justify-content:space-between;">
                                    <div><strong>TRF-3910</strong> • Stock Transfer Completed<br><span style="color:var(--biz-muted);">Warehouse ➔ Suburban Express</span></div>
                                    <strong style="color:var(--biz-purple);">20 Units</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==================== TAB 2: ADVANCED POS & LOYALTY ==================== -->
                <div class="biz-panel" id="tab-pos">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px;">
                        <div>
                            <h4 style="margin:0 0 4px; font-size:16px; color:var(--biz-navy); font-weight:800;">Enterprise POS Billing Terminal</h4>
                            <p style="margin:0; font-size:13px; color:var(--biz-muted);">Select customer for loyalty benefits, apply coupons, and checkout.</p>
                        </div>
                        <span class="status-tag in-stock">Terminal Online</span>
                    </div>

                    <div class="pos-terminal-grid">
                        <!-- Product Selection Browser -->
                        <div class="pos-product-browser">
                            <div style="font-size:13px; font-weight:700; color:var(--biz-navy); margin-bottom:12px;">Click Product to Add to Bill</div>
                            <div class="pos-items-grid" id="bizPosItemsGrid"></div>
                        </div>

                        <!-- Register & Checkout Sidebar -->
                        <div class="pos-register-panel">
                            <div class="pos-register-header">
                                <div>
                                    <h4>Active Customer Invoice</h4>
                                    <span style="font-size:11px; color:var(--biz-muted);">Prefix: INV-BIZ-924</span>
                                </div>
                                <span class="biz-badge blue" style="font-size:10px;">GST 18% Ready</span>
                            </div>

                            <!-- Customer Selection & Loyalty Chip -->
                            <div class="pos-customer-box">
                                <div>
                                    <label for="bizPosCustomerSelect" style="font-weight:700; font-size:11px; display:block; margin-bottom:2px; color:var(--biz-muted);">CUSTOMER ACCOUNT:</label>
                                    <select id="bizPosCustomerSelect" style="border:1px solid var(--biz-line); border-radius:4px; padding:3px 6px; font-size:12px; font-weight:700;">
                                        <option value="c1">Rahul Sharma (VIP Gold)</option>
                                        <option value="c2">Anita Roy (Silver Club)</option>
                                        <option value="c3">Walk-in Guest</option>
                                    </select>
                                </div>
                                <div class="loyalty-chip" id="bizCustomerLoyaltyChip">
                                    ⭐ VIP Gold (450 Pts Available)
                                </div>
                            </div>

                            <!-- Cart Items -->
                            <div class="pos-cart-list" id="bizCartList"></div>
                            <div class="pos-empty-cart" id="bizEmptyCart" style="display:none;">Invoice is currently empty.</div>

                            <!-- Coupon Code Input -->
                            <div style="margin-bottom:8px;">
                                <div style="display:flex; justify-content:space-between; margin-bottom:4px; font-size:12px;">
                                    <label for="bizCouponInput" style="font-weight:700; color:var(--biz-navy);">PROMO / COUPON CODE:</label>
                                    <span style="color:var(--biz-muted);">Try: <strong>SAVE10</strong> or <strong>FLAT500</strong></span>
                                </div>
                                <div class="coupon-input-group">
                                    <input type="text" id="bizCouponInput" class="coupon-input" placeholder="e.g. SAVE10">
                                    <button type="button" id="bizApplyCouponBtn" class="coupon-apply-btn">Apply</button>
                                </div>
                                <div id="bizCouponStatus" style="font-size:11px; font-weight:700;"></div>
                            </div>

                            <!-- Loyalty Points Redemption Toggle -->
                            <div style="background:#fffbeb; border:1px solid #fef3c7; border-radius:8px; padding:8px 12px; margin-bottom:12px; font-size:12px;">
                                <label style="display:flex; align-items:center; gap:8px; cursor:pointer; font-weight:700; color:#92400e;">
                                    <input type="checkbox" id="bizRedeemLoyaltyChk">
                                    <span>Redeem available loyalty points (1 pt = ₹1 discount)</span>
                                </label>
                            </div>

                            <!-- Financial Summary -->
                            <div class="pos-register-summary">
                                <div class="pos-sum-row"><span>Items Subtotal:</span><strong id="bizSubtotal">₹3,499.00</strong></div>
                                <div class="pos-sum-row discount" id="bizDiscountRow" style="display:none;"><span>Coupon Discount:</span><strong id="bizDiscountAmount">-₹0.00</strong></div>
                                <div class="pos-sum-row discount" id="bizLoyaltyRow" style="display:none;"><span>Loyalty Redeemed:</span><strong id="bizLoyaltyAmount">-₹0.00</strong></div>
                                <div class="pos-sum-row"><span>GST Tax (18% Included):</span><span id="bizTaxAmount">₹533.75</span></div>
                                <div class="pos-sum-row total"><span>Grand Total:</span><span id="bizGrandTotal">₹3,499.00</span></div>
                                <div style="font-size:11px; color:#059669; font-weight:700; text-align:right; margin-top:2px;">
                                    Points Earned on this Bill: <span id="bizPointsEarned">+34 Pts</span>
                                </div>
                            </div>

                            <button type="button" class="pos-checkout-btn" id="bizCheckoutBtn">Complete Invoice & Print Receipt</button>
                        </div>
                    </div>
                </div>

                <!-- ==================== TAB 3: PURCHASING & GRN ==================== -->
                <div class="biz-panel" id="tab-purchasing">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px;">
                        <div>
                            <h4 style="margin:0 0 4px; font-size:16px; color:var(--biz-navy); font-weight:800;">Purchase Orders & Goods Received Notes (GRN)</h4>
                            <p style="margin:0; font-size:13px; color:var(--biz-muted);">Manage supplier procurement, verify shipments, and auto-increment stock upon confirmed receipt.</p>
                        </div>
                        <span class="status-tag in-stock">Procurement Active</span>
                    </div>

                    <div id="bizGrnNotice" class="form-alert success" style="display:none; margin-bottom:16px;"></div>

                    <!-- Active Purchase Order Card -->
                    <div style="background:var(--biz-soft); border:1px solid var(--biz-line); border-radius:12px; padding:24px; margin-bottom:24px;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; flex-wrap:wrap; gap:10px;">
                            <div>
                                <span class="biz-badge blue" style="margin-bottom:6px;">PO Number: PO-7842</span>
                                <h3 style="margin:0; font-size:18px; color:var(--biz-navy);">Supplier: Raymond Textiles Ltd</h3>
                                <p style="margin:2px 0 0; font-size:13px; color:var(--biz-muted);">Destination: Central Distribution Warehouse • Created: Today</p>
                            </div>
                            <div style="text-align:right;">
                                <span class="status-tag transit" id="bizPoStatusBadge">Dispatched / Awaiting Delivery</span>
                                <div style="margin-top:6px; font-size:15px; font-weight:900; color:var(--biz-navy);">Total Cost: ₹1,85,000</div>
                            </div>
                        </div>

                        <div class="demo-table-wrapper" style="margin-bottom:16px;">
                            <table class="demo-table">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>SKU</th>
                                        <th>Ordered Qty</th>
                                        <th>Unit Cost</th>
                                        <th>Total Value</th>
                                        <th>Receiving Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Executive Formal Blazer (Navy)</strong></td>
                                        <td>APP-501</td>
                                        <td>50 units</td>
                                        <td>₹1,900</td>
                                        <td>₹95,000</td>
                                        <td><span class="status-tag transit">Verified in Batch</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Smart Wireless Noise-Cancelling ANC</strong></td>
                                        <td>ELE-808</td>
                                        <td>25 units</td>
                                        <td>₹3,600</td>
                                        <td>₹90,000</td>
                                        <td><span class="status-tag transit">Verified in Batch</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div style="display:flex; justify-content:flex-end;">
                            <button type="button" class="biz-btn biz-btn-blue biz-btn-sm" id="bizReceivePoBtn">
                                <span>Confirm Inward & Generate GRN (+75 Units)</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ==================== TAB 4: COUPONS & LOYALTY HUB ==================== -->
                <div class="biz-panel" id="tab-loyalty">
                    <div style="margin-bottom:20px;">
                        <h4 style="margin:0 0 4px; font-size:16px; color:var(--biz-navy); font-weight:800;">Promotional Coupons & Customer Loyalty Rules</h4>
                        <p style="margin:0; font-size:13px; color:var(--biz-muted);">Configure marketing campaign codes, redemption thresholds, and wallet conversion ratios.</p>
                    </div>

                    <!-- Active Coupons Grid -->
                    <div class="coupon-cards-grid">
                        <div class="coupon-card">
                            <span class="coupon-code-badge">SAVE10</span>
                            <h4 style="margin:0 0 4px; font-size:15px; color:var(--biz-navy);">10% Storewide Discount</h4>
                            <p style="font-size:13px; color:var(--biz-muted); margin:0 0 8px;">Valid on all apparel & footwear orders above ₹2,000.</p>
                            <div style="font-size:11px; font-weight:700; color:#059669;">● Status: Active & Redeemed 128 times</div>
                        </div>

                        <div class="coupon-card">
                            <span class="coupon-code-badge">FLAT500</span>
                            <h4 style="margin:0 0 4px; font-size:15px; color:var(--biz-navy);">Flat ₹500 Instant Off</h4>
                            <p style="font-size:13px; color:var(--biz-muted); margin:0 0 8px;">Valid on electronics & luxury goods above ₹3,500.</p>
                            <div style="font-size:11px; font-weight:700; color:#059669;">● Status: Active & Redeemed 84 times</div>
                        </div>

                        <div class="coupon-card">
                            <span class="coupon-code-badge">FESTIVE20</span>
                            <h4 style="margin:0 0 4px; font-size:15px; color:var(--biz-navy);">20% VIP Festive Offer</h4>
                            <p style="font-size:13px; color:var(--biz-muted); margin:0 0 8px;">Exclusive for Gold & Silver tier loyalty members.</p>
                            <div style="font-size:11px; font-weight:700; color:#059669;">● Status: Active & Redeemed 42 times</div>
                        </div>
                    </div>

                    <!-- Loyalty Conversion Settings Card -->
                    <div style="background:var(--biz-soft); border:1px solid var(--biz-line); border-radius:12px; padding:20px;">
                        <h4 style="margin:0 0 10px; font-size:15px; color:var(--biz-navy);">Customer Loyalty Program Configuration</h4>
                        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; font-size:13px;">
                            <div style="background:#ffffff; padding:14px; border-radius:8px; border:1px solid var(--biz-line);">
                                <span style="color:var(--biz-muted); font-size:11px; text-transform:uppercase; font-weight:700;">Earn Rate</span>
                                <div style="font-size:18px; font-weight:900; color:var(--biz-navy); margin-top:4px;">1 Point per ₹100</div>
                                <div style="color:var(--biz-muted); font-size:12px;">Earned on all paid invoices</div>
                            </div>
                            <div style="background:#ffffff; padding:14px; border-radius:8px; border:1px solid var(--biz-line);">
                                <span style="color:var(--biz-muted); font-size:11px; text-transform:uppercase; font-weight:700;">Redemption Value</span>
                                <div style="font-size:18px; font-weight:900; color:var(--biz-navy); margin-top:4px;">1 Point = ₹1.00</div>
                                <div style="color:var(--biz-muted); font-size:12px;">Instant billing credit</div>
                            </div>
                            <div style="background:#ffffff; padding:14px; border-radius:8px; border:1px solid var(--biz-line);">
                                <span style="color:var(--biz-muted); font-size:11px; text-transform:uppercase; font-weight:700;">Return Policy</span>
                                <div style="font-size:18px; font-weight:900; color:var(--biz-navy); margin-top:4px;">Auto Reversal</div>
                                <div style="color:var(--biz-muted); font-size:12px;">Reversed upon refund</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==================== TAB 5: INTER-BRANCH STOCK TRANSFERS ==================== -->
                <div class="biz-panel" id="tab-transfers">
                    <div style="margin-bottom:18px;">
                        <h4 style="margin:0 0 4px; font-size:16px; color:var(--biz-navy); font-weight:800;">Inter-Branch Stock Transfers & Logistics Manifest</h4>
                        <p style="margin:0; font-size:13px; color:var(--biz-muted);">Rebalance inventory across outlets with automated stock verification and in-transit tracking.</p>
                    </div>

                    <!-- Dispatch Transfer Form -->
                    <div class="transfer-form-grid">
                        <div>
                            <label for="bizTransferSource" style="font-size:12px; font-weight:700; color:var(--biz-navy); display:block; margin-bottom:4px;">Source Location:</label>
                            <select id="bizTransferSource" class="solo-form-control" style="padding:8px 12px; font-size:13px;">
                                <option value="b2">Central Distribution Warehouse</option>
                                <option value="b1">Downtown Flagship Store</option>
                                <option value="b3">Suburban Express Outlet</option>
                            </select>
                        </div>
                        <div>
                            <label for="bizTransferDest" style="font-size:12px; font-weight:700; color:var(--biz-navy); display:block; margin-bottom:4px;">Destination Outlet:</label>
                            <select id="bizTransferDest" class="solo-form-control" style="padding:8px 12px; font-size:13px;">
                                <option value="b3">Suburban Express Outlet</option>
                                <option value="b1">Downtown Flagship Store</option>
                                <option value="b2">Central Distribution Warehouse</option>
                            </select>
                        </div>
                        <div>
                            <label for="bizTransferProduct" style="font-size:12px; font-weight:700; color:var(--biz-navy); display:block; margin-bottom:4px;">Product & Quantity:</label>
                            <div style="display:flex; gap:8px;">
                                <select id="bizTransferProduct" class="solo-form-control" style="padding:8px 12px; font-size:13px; flex:2;">
                                    <option value="biz-1">Formal Blazer (APP-501)</option>
                                    <option value="biz-2">Oxford Shoes (FTW-302)</option>
                                    <option value="biz-3">ANC Headphones (ELE-808)</option>
                                    <option value="biz-4">Olive Oil 1L (GRO-109)</option>
                                </select>
                                <input type="number" id="bizTransferQty" class="solo-form-control" value="10" min="1" max="100" style="padding:8px 10px; font-size:13px; width:70px;">
                            </div>
                        </div>
                        <div>
                            <button type="button" class="biz-btn biz-btn-primary biz-btn-sm" id="bizDispatchTransferBtn" style="padding:10px 16px;">
                                <span>Dispatch Transfer</span>
                            </button>
                        </div>
                    </div>

                    <!-- Transfer History Table -->
                    <div class="demo-table-wrapper">
                        <table class="demo-table">
                            <thead>
                                <tr>
                                    <th>Manifest No</th>
                                    <th>Product Transferred</th>
                                    <th>From Location</th>
                                    <th>To Location</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="bizTransferTableBody">
                                <tr>
                                    <td><strong>TRF-9104</strong></td>
                                    <td>Italian Leather Oxford Shoes (12 units)</td>
                                    <td>Central Distribution Warehouse</td>
                                    <td>Downtown Flagship Store</td>
                                    <td><span class="status-tag in-stock">Completed</span></td>
                                </tr>
                                <tr>
                                    <td><strong>TRF-8841</strong></td>
                                    <td>Mechanical Ergonomic Keyboard (8 units)</td>
                                    <td>Central Distribution Warehouse</td>
                                    <td>Suburban Express Outlet</td>
                                    <td><span class="status-tag in-stock">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ==================== TAB 6: LICENSE & STORE REGISTRATION ==================== -->
                <div class="biz-panel" id="tab-license">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                        <div>
                            <h4 style="margin:0 0 4px; font-size:17px; color:var(--biz-navy); font-weight:800;">Installation, Store Registration & Licensing</h4>
                            <p style="margin:0; font-size:13px; color:var(--biz-muted);">Manage your Installation ID, Store Profile, and software license key.</p>
                        </div>
                        <span class="status-tag in-stock" id="bizSyncStatusBadge">Connected (Live API)</span>
                    </div>

                    <!-- Status Cards Grid -->
                    <div class="biz-kpi-grid" style="margin-bottom:24px;">
                        <div class="biz-kpi-card">
                            <div class="biz-kpi-header">
                                <span class="biz-kpi-title">Installation ID</span>
                                <span class="biz-badge blue" style="padding:2px 8px; font-size:10px;">Local Identifier</span>
                            </div>
                            <div class="biz-kpi-value" id="bizDisplayInstallationId" style="font-size:16px; font-family:monospace;">Generating...</div>
                            <div class="biz-kpi-sub" id="bizDisplayDeviceId">Device: DEV-XXXXXXXX</div>
                        </div>

                        <div class="biz-kpi-card">
                            <div class="biz-kpi-header">
                                <span class="biz-kpi-title">License Status</span>
                                <span class="biz-badge amber" id="bizLicenseBadge" style="padding:2px 8px; font-size:10px;">Not Activated</span>
                            </div>
                            <div class="biz-kpi-value" id="bizDisplayLicenseStatus" style="font-size:18px;">Not Activated</div>
                            <div class="biz-kpi-sub" id="bizDisplayLicenseExpiry">Expiry: N/A</div>
                        </div>

                        <div class="biz-kpi-card">
                            <div class="biz-kpi-header">
                                <span class="biz-kpi-title">Store Profile</span>
                                <span class="biz-badge emerald" id="bizStoreProfileBadge" style="padding:2px 8px; font-size:10px;">Profile Complete</span>
                            </div>
                            <div class="biz-kpi-value" id="bizDisplayStoreName" style="font-size:16px;">Main Retail Store</div>
                            <div class="biz-kpi-sub" id="bizDisplayStoreMobile">+91 Registered</div>
                        </div>

                        <div class="biz-kpi-card">
                            <div class="biz-kpi-header">
                                <span class="biz-kpi-title">System Telemetry</span>
                                <span class="biz-badge purple" style="padding:2px 8px; font-size:10px;">Version 1.0.0</span>
                            </div>
                            <div class="biz-kpi-value" id="bizDisplayLastSeen" style="font-size:14px;">Just now</div>
                            <div class="biz-kpi-sub" id="bizDisplayQueueStatus">Offline Queue: 0 Pending</div>
                        </div>
                    </div>

                    <!-- Live Backend API Endpoint Tester Widget -->
                    <div class="biz-widget-box" style="padding:24px; margin-bottom:24px; border:1px solid #bfdbfe; background:#f8fafc;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div style="width:34px; height:34px; border-radius:8px; background:var(--biz-blue-soft); color:var(--biz-blue); display:grid; place-items:center; font-weight:800; font-size:16px;">⚡</div>
                                <div>
                                    <h4 style="margin:0; font-size:16px; color:var(--biz-navy); font-weight:800;">Interactive Live Backend API Endpoint Tester</h4>
                                    <span style="font-size:12px; color:var(--biz-muted);">Execute test requests directly against the live Laravel backend API with seeded dummy payload presets.</span>
                                </div>
                            </div>
                            <span class="biz-badge blue" style="font-size:10px;">Laravel API v1</span>
                        </div>

                        <!-- Endpoint Trigger Buttons -->
                        <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:16px;">
                            <button type="button" class="api-test-btn active" data-endpoint="register" style="padding:8px 14px; border-radius:6px; border:1px solid var(--biz-blue); background:var(--biz-blue-soft); color:var(--biz-blue); font-size:12px; font-weight:700; cursor:pointer;">
                                ▶ POST /installations/register
                            </button>
                            <button type="button" class="api-test-btn" data-endpoint="store-profile" style="padding:8px 14px; border-radius:6px; border:1px solid var(--biz-emerald); background:#ffffff; color:var(--biz-emerald); font-size:12px; font-weight:700; cursor:pointer;">
                                ▶ POST /installations/store-profile
                            </button>
                            <button type="button" class="api-test-btn" data-endpoint="activate" style="padding:8px 14px; border-radius:6px; border:1px solid var(--biz-purple); background:#ffffff; color:var(--biz-purple); font-size:12px; font-weight:700; cursor:pointer;">
                                ▶ POST /licenses/activate
                            </button>
                            <button type="button" class="api-test-btn" data-endpoint="validate" style="padding:8px 14px; border-radius:6px; border:1px solid var(--biz-amber); background:#ffffff; color:var(--biz-amber); font-size:12px; font-weight:700; cursor:pointer;">
                                ▶ POST /licenses/validate
                            </button>
                            <button type="button" class="api-test-btn" data-endpoint="heartbeat" style="padding:8px 14px; border-radius:6px; border:1px solid var(--biz-navy); background:#ffffff; color:var(--biz-navy); font-size:12px; font-weight:700; cursor:pointer;">
                                ▶ POST /installations/heartbeat
                            </button>
                        </div>

                        <!-- Inspector Split View -->
                        <div class="biz-split-metrics" style="align-items:start;">
                            <!-- Left: Payload Editor -->
                            <div>
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                                    <label style="font-size:12px; font-weight:700; color:var(--biz-navy);">Request Body (JSON Payload):</label>
                                    <span id="apiTestEndpointUrl" style="font-family:monospace; font-size:11px; color:var(--biz-blue); font-weight:700;">/api/inventory/v1/installations/register</span>
                                </div>
                                <textarea id="apiTestPayloadInput" rows="7" style="width:100%; padding:10px; border:1px solid var(--biz-line); border-radius:8px; font-family:monospace; font-size:12px; background:#0b1329; color:#38bdf8; resize:vertical; box-sizing:border-box;"></textarea>
                                <button type="button" id="apiTestSendBtn" class="biz-btn biz-btn-blue" style="width:100%; margin-top:8px; padding:10px; font-size:13px;">
                                    ⚡ Send API Request Now
                                </button>
                            </div>

                            <!-- Right: Server Response Output -->
                            <div>
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                                    <label style="font-size:12px; font-weight:700; color:var(--biz-navy);">Backend Response Inspector:</label>
                                    <div style="display:flex; gap:8px; align-items:center;">
                                        <span id="apiTestStatusCode" class="status-tag in-stock" style="font-size:10px;">HTTP 200 OK</span>
                                        <span id="apiTestResponseTime" style="font-size:11px; color:var(--biz-muted);">0 ms</span>
                                    </div>
                                </div>
                                <pre id="apiTestResponseOutput" style="width:100%; height:205px; padding:10px; border:1px solid var(--biz-line); border-radius:8px; font-family:monospace; font-size:12px; background:#0b1329; color:#4ade80; overflow:auto; margin:0; box-sizing:border-box;">Ready. Click any API endpoint button above to test live request/response data.</pre>
                            </div>
                        </div>

                        <!-- Generated cURL Command Snippet -->
                        <div style="margin-top:16px; border-top:1px dashed var(--biz-line); padding-top:14px;">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
                                <label style="font-size:12px; font-weight:700; color:var(--biz-navy);">Generated cURL Terminal Command:</label>
                                <button type="button" id="apiCopyCurlBtn" class="biz-btn biz-btn-outline" style="padding:4px 10px; font-size:11px;">📋 Copy cURL</button>
                            </div>
                            <pre id="apiTestCurlOutput" style="width:100%; height:90px; padding:10px; border:1px solid var(--biz-line); border-radius:8px; font-family:monospace; font-size:11px; background:#1e293b; color:#f8fafc; overflow:auto; margin:0; box-sizing:border-box; white-space:pre-wrap; word-break:break-all;"></pre>
                        </div>
                    </div>

                    <!-- 2 Column Section: License Activation + Store Profile Form -->
                    <div class="biz-split-metrics" style="align-items:start;">
                        
                        <!-- Left: License Key Activation Form -->
                        <div class="biz-widget-box" style="padding:24px;">
                            <div class="biz-widget-header" style="margin-bottom:16px;">
                                <h4>🔑 Product License Activation</h4>
                                <span style="font-size:12px; color:var(--biz-muted);">RS Inventory – Business</span>
                            </div>
                            <p style="font-size:13px; color:var(--biz-muted); line-height:1.5; margin-bottom:16px;">
                                Enter your business license key provided by RS ORANGE TECH to activate enterprise capabilities and server synchronization.
                            </p>

                            <form id="bizLicenseActivateForm" onsubmit="return false;">
                                <div style="margin-bottom:14px;">
                                    <label for="bizLicenseKeyInput" style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:6px;">License Key *</label>
                                    <input type="text" id="bizLicenseKeyInput" placeholder="e.g. RS-BIZ-ENTERPRISE-2026" 
                                           style="width:100%; padding:10px 14px; border:1px solid var(--biz-line); border-radius:8px; font-family:monospace; font-size:14px; text-transform:uppercase;">
                                </div>
                                <div style="display:flex; gap:10px;">
                                    <button type="button" id="bizBtnActivateLicense" class="biz-btn biz-btn-primary" style="padding:10px 20px; font-size:13px; flex:1;">
                                        Activate License
                                    </button>
                                    <button type="button" id="bizBtnRefreshLicense" class="biz-btn biz-btn-outline" style="padding:10px 16px; font-size:13px;">
                                        Refresh Status
                                    </button>
                                </div>
                                <div id="bizLicenseNotice" style="margin-top:12px; font-size:13px; font-weight:600; display:none;"></div>
                            </form>

                            <!-- Test Keys Box for Demonstration -->
                            <div style="margin-top:20px; padding:12px; background:var(--biz-soft); border-radius:8px; border:1px dashed var(--biz-line); font-size:12px;">
                                <strong style="color:var(--biz-navy);">Sample Demo License Keys:</strong>
                                <div style="margin-top:6px; display:flex; flex-direction:column; gap:4px; font-family:monospace;">
                                    <span style="cursor:pointer; color:var(--biz-blue);" onclick="document.getElementById('bizLicenseKeyInput').value='RS-BIZ-ENTERPRISE-2026';"><code>RS-BIZ-ENTERPRISE-2026</code> (Click to autofill)</span>
                                    <span style="cursor:pointer; color:var(--biz-blue);" onclick="document.getElementById('bizLicenseKeyInput').value='RS-BIZ-9988-7766-5544';"><code>RS-BIZ-9988-7766-5544</code> (Click to autofill)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Store Profile Settings -->
                        <div class="biz-widget-box" style="padding:24px;">
                            <div class="biz-widget-header" style="margin-bottom:16px;">
                                <h4>🏬 Store Profile & Registration Information</h4>
                                <button type="button" id="bizToggleEditStoreBtn" class="biz-btn biz-btn-outline" style="padding:6px 12px; font-size:12px;">Edit Profile</button>
                            </div>
                            
                            <form id="bizStoreProfileForm" onsubmit="return false;">
                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
                                    <div>
                                        <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Store Name *</label>
                                        <input type="text" id="bizStoreName" class="biz-form-field" placeholder="e.g. Apex Retail Store" required>
                                    </div>
                                    <div>
                                        <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Owner Name</label>
                                        <input type="text" id="bizOwnerName" class="biz-form-field" placeholder="e.g. Rajesh Kumar">
                                    </div>
                                </div>

                                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
                                    <div>
                                        <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Mobile Number *</label>
                                        <input type="text" id="bizStoreMobile" class="biz-form-field" placeholder="+91 9876543210" required>
                                    </div>
                                    <div>
                                        <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Email Address</label>
                                        <input type="email" id="bizStoreEmail" class="biz-form-field" placeholder="store@example.com">
                                    </div>
                                </div>

                                <div style="margin-bottom:12px;">
                                    <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Store Address *</label>
                                    <textarea id="bizStoreAddress" class="biz-form-field" rows="2" placeholder="Full store location address" required></textarea>
                                </div>

                                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; margin-bottom:12px;">
                                    <div>
                                        <label style="display:block; font-size:11px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">City</label>
                                        <input type="text" id="bizStoreCity" class="biz-form-field" placeholder="Mumbai">
                                    </div>
                                    <div>
                                        <label style="display:block; font-size:11px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">State</label>
                                        <input type="text" id="bizStoreState" class="biz-form-field" placeholder="Maharashtra">
                                    </div>
                                    <div>
                                        <label style="display:block; font-size:11px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">PIN Code</label>
                                        <input type="text" id="bizStorePincode" class="biz-form-field" placeholder="400001">
                                    </div>
                                </div>

                                <div style="margin-bottom:16px;">
                                    <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">GSTIN (Optional)</label>
                                    <input type="text" id="bizStoreGstin" class="biz-form-field" placeholder="27AAAAA0000A1Z5">
                                </div>

                                <div style="display:flex; justify-content:space-between; align-items:center;">
                                    <button type="button" id="bizSaveStoreProfileBtn" class="biz-btn biz-btn-primary" style="padding:10px 24px; font-size:13px;">
                                        Save & Sync Store Profile
                                    </button>
                                    <span id="bizStoreProfileStatusMsg" style="font-size:12px; font-weight:600; color:var(--biz-emerald);"></span>
                                </div>
                            </form>
                        </div>

                    </div>

                    <!-- Privacy Information Notice -->
                    <div style="margin-top:24px; padding:16px 20px; background:#f8fafc; border-radius:10px; border:1px solid #e2e8f0; font-size:12px; line-height:1.6; color:#475569;">
                        <div style="display:flex; align-items:center; gap:8px; font-weight:800; color:var(--biz-navy); margin-bottom:6px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            <span>RS ORANGE TECH Privacy & Data Transmitted Notice</span>
                        </div>
                        <p style="margin:0 0 6px;">
                            <strong>Data Transmitted:</strong> Store details (Store Name, Owner Name, Mobile, Email, Address, City, State, PIN Code, GSTIN), Installation ID, Device ID, Application Version, and License Key information are transmitted to RS ORANGE TECH servers for software registration, licensing, support, and version update management.
                        </p>
                        <p style="margin:0; color:#dc2626;">
                            <strong>Data Excluded:</strong> Your local inventory database, sales history, purchase orders, customer transaction ledgers, supplier balances, and passwords are NEVER transmitted to the registration server.
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- First Launch Store Setup Modal -->
    <div class="biz-modal" id="bizFirstLaunchModal">
        <div class="biz-modal-content" style="max-width:560px;">
            <div style="text-align:center; margin-bottom:20px;">
                <div class="biz-brand-icon" style="margin:0 auto 12px; width:44px; height:44px; background:var(--biz-orange-soft); color:var(--biz-orange); display:grid; place-items:center; border-radius:12px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                </div>
                <h3 style="margin:0 0 6px; font-size:20px; font-weight:800; color:var(--biz-navy);">Welcome to RS Inventory – Business</h3>
                <p style="margin:0; font-size:13px; color:var(--biz-muted);">Please set up your store profile to complete installation registration.</p>
            </div>

            <form id="bizFirstLaunchForm" onsubmit="return false;">
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
                    <div>
                        <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Store Name *</label>
                        <input type="text" id="flStoreName" class="biz-form-field" placeholder="e.g. Metro Fashion Hub" required>
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Owner Name</label>
                        <input type="text" id="flOwnerName" class="biz-form-field" placeholder="e.g. Vikram Singh">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:12px;">
                    <div>
                        <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Mobile Number *</label>
                        <input type="text" id="flMobile" class="biz-form-field" placeholder="+91 9876543210" required>
                    </div>
                    <div>
                        <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Email</label>
                        <input type="email" id="flEmail" class="biz-form-field" placeholder="store@example.com">
                    </div>
                </div>

                <div style="margin-bottom:12px;">
                    <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">Store Address *</label>
                    <textarea id="flAddress" class="biz-form-field" rows="2" placeholder="Full shop address" required></textarea>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; margin-bottom:12px;">
                    <div>
                        <label style="display:block; font-size:11px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">City</label>
                        <input type="text" id="flCity" class="biz-form-field" placeholder="Bengaluru">
                    </div>
                    <div>
                        <label style="display:block; font-size:11px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">State</label>
                        <input type="text" id="flState" class="biz-form-field" placeholder="Karnataka">
                    </div>
                    <div>
                        <label style="display:block; font-size:11px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">PIN Code</label>
                        <input type="text" id="flPincode" class="biz-form-field" placeholder="560001">
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-size:12px; font-weight:700; color:var(--biz-navy); margin-bottom:4px;">GSTIN (Optional)</label>
                    <input type="text" id="flGstin" class="biz-form-field" placeholder="29AAAAA0000A1Z5">
                </div>

                <div style="margin-bottom:16px; padding:10px 12px; background:var(--biz-soft); border-radius:6px; font-size:11px; color:var(--biz-muted); line-height:1.4;">
                    ℹ️ Store information is submitted to RS ORANGE TECH central registration servers. Your local stock database and transaction logs remain completely offline and private.
                </div>

                <button type="button" id="flSaveBtn" class="biz-btn biz-btn-primary" style="width:100%; padding:12px; font-size:14px;">
                    Save Store Profile & Continue
                </button>
            </form>
        </div>
    </div>

    <!-- Simulated Enterprise Receipt Modal -->
    <div class="demo-receipt-modal" id="bizReceiptModal">
        <div class="receipt-slip">
            <div class="receipt-header">
                <h4>RS RETAIL ENTERPRISE</h4>
                <div id="bizReceiptBranch">Branch: Downtown Flagship Store</div>
                <div>GSTIN: 07AAACR1234F1Z5</div>
                <div style="margin-top:4px;">Invoice: <strong id="bizReceiptInvoiceNo">INV-BIZ-104928</strong></div>
                <div style="font-size:11px; color:#6b7280;" id="bizReceiptCustomer">Customer: Rahul Sharma (VIP Gold)</div>
            </div>
            
            <div class="receipt-items" id="bizReceiptItems"></div>

            <div class="receipt-row">
                <span>Subtotal:</span>
                <span id="bizReceiptSubtotal">₹0.00</span>
            </div>
            <div class="receipt-row" style="color:#059669;">
                <span>Discount / Promo:</span>
                <span id="bizReceiptDiscount">-₹0.00</span>
            </div>
            <div class="receipt-row">
                <span>GST Tax (18%):</span>
                <span id="bizReceiptTax">₹0.00</span>
            </div>
            <div class="receipt-row receipt-total">
                <span>TOTAL PAID:</span>
                <span id="bizReceiptTotal">₹0.00</span>
            </div>

            <div class="receipt-footer" id="bizReceiptLoyaltyMsg">
                Loyalty Redeemed: 0 pts | Points Earned Today: +34 pts
            </div>

            <button type="button" class="receipt-close-btn" id="closeBizReceiptBtn">Close Simulated Invoice</button>
        </div>
    </div>

    <!-- ========================================================
         SECTION 5: ROLE-BASED ACCESS CONTROL (RBAC)
         ======================================================== -->
    <section class="biz-rbac" id="permissions">
        <div class="biz-container">
            <div class="biz-section-header">
                <span class="biz-badge blue">Enterprise Security</span>
                <h2>Granular Role-Based Permissions</h2>
                <p>Ensure strict separation of duties between executive management, branch supervisors, and front-line store cashiers.</p>
            </div>

            <div class="biz-rbac-table-wrap">
                <table class="biz-rbac-table">
                    <thead>
                        <tr>
                            <th>Capability & Operation</th>
                            <th>Business Admin</th>
                            <th>Branch Manager</th>
                            <th>Store Cashier</th>
                            <th>Inventory Auditor</th>
                            <th>Accountant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>POS Invoicing & Customer Billing</td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                        </tr>
                        <tr>
                            <td>Apply Custom Line Discounts & Price Overrides</td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                        </tr>
                        <tr>
                            <td>Dispatch Inter-Branch Stock Transfers</td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                        </tr>
                        <tr>
                            <td>Create Purchase Orders & Confirm Goods Receipt (GRN)</td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                        </tr>
                        <tr>
                            <td>Access Gross Margins & Financial Statements</td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-check">✓</span></td>
                        </tr>
                        <tr>
                            <td>Configure Coupons, Loyalty Ratios & Tax Rates</td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                        </tr>
                        <tr>
                            <td>Manage Employee Accounts & Role Assignments</td>
                            <td><span class="rbac-check">✓</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                            <td><span class="rbac-dash">—</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 6: ENTERPRISE FINANCIAL REPORTS
         ======================================================== -->
    <section class="biz-reports" id="reports">
        <div class="biz-container">
            <div class="biz-section-header">
                <span class="biz-badge emerald">Actionable Intelligence</span>
                <h2>Enterprise Reporting & Financial Analytics</h2>
                <p>Auditable summaries and automated exports designed for board reporting, tax compliance, and multi-store restocking.</p>
            </div>

            <div class="biz-reports-grid">
                <div class="biz-report-card">
                    <h4>Multi-Store Revenue & Margins</h4>
                    <p>Track top-line revenue, Cost of Goods Sold (COGS), and gross margins across individual store outlets with date-range filters.</p>
                </div>
                <div class="biz-report-card">
                    <h4>Inventory Valuation & Aging</h4>
                    <p>FIFO/Weighted-average stock valuations, dead-stock identification, and fast-moving SKU velocity analytics.</p>
                </div>
                <div class="biz-report-card">
                    <h4>Supplier Payables & GRN Log</h4>
                    <p>Complete reconciliation of purchased quantities against received goods, invoice discrepancies, and pending payments.</p>
                </div>
                <div class="biz-report-card">
                    <h4>Customer Loyalty & Liability</h4>
                    <p>Track outstanding unredeemed customer reward points, wallet liabilities, and repeat-order purchase frequencies.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 7: TRILOGY COMPARISON TABLE
         ======================================================== -->
    <section class="biz-comparison" id="comparison">
        <div class="biz-container">
            <div class="biz-section-header">
                <span class="biz-badge blue">Product Family</span>
                <h2>Compare RS Inventory Editions</h2>
                <p>Select the edition tailored to your retail architecture and business operational scale.</p>
            </div>

            <div class="biz-compare-table-wrap">
                <table class="biz-compare-table">
                    <thead>
                        <tr>
                            <th>Feature / Capability</th>
                            <th>RS Inventory – Solo</th>
                            <th>RS Inventory – LAN</th>
                            <th class="highlight">RS Inventory – Business</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Target Environment</td>
                            <td>Single Checkout PC</td>
                            <td>Multi-Counter Local Network</td>
                            <td class="highlight">Multi-Branch Chain / Warehouses</td>
                        </tr>
                        <tr>
                            <td>Point of Sale (POS) Billing</td>
                            <td>✓ (Single terminal)</td>
                            <td>✓ (Concurrent counters)</td>
                            <td class="highlight">✓ (Enterprise POS with Split Tender)</td>
                        </tr>
                        <tr>
                            <td>Shared Live Inventory</td>
                            <td>— (Local device only)</td>
                            <td>✓ (Local LAN host)</td>
                            <td class="highlight">✓ (Multi-Store Cloud & Hybrid)</td>
                        </tr>
                        <tr>
                            <td>Inter-Branch Stock Transfers</td>
                            <td>—</td>
                            <td>—</td>
                            <td class="highlight">✓ (Transfer Manifests & Tracking)</td>
                        </tr>
                        <tr>
                            <td>Supplier Orders & GRN Receiving</td>
                            <td>Basic expense log</td>
                            <td>Basic expense log</td>
                            <td class="highlight">✓ (Full PO & Inward Verification)</td>
                        </tr>
                        <tr>
                            <td>Customer Loyalty Points Wallet</td>
                            <td> Loyalty Points Wallet</td>
                            <td>Loyalty Points Wallet</td>
                            <td class="highlight">✓ (Accrual & Debit Ledgers)</td>
                        </tr>
                        <tr>
                            <td>Promotional Coupon Engine</td>
                            <td>Coupon Engine</td>
                            <td>Coupon Engine</td>
                            <td class="highlight">✓ (Backend Rule Engine)</td>
                        </tr>
                        <tr>
                            <td>Role-Based Access Control (RBAC)</td>
                            <td>Standard password</td>
                            <td>Manager & Cashier roles</td>
                            <td class="highlight">✓ (5 Granular Permission Tiers)</td>
                        </tr>
                        <tr>
                            <td>Communication Integrations</td>
                            <td>Email receipt</td>
                            <td>Email / WhatsApp receipt</td>
                            <td class="highlight">✓ (SMTP, SMS & WhatsApp API)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 8: DEMO REQUEST FORM
         ======================================================== -->
    <section class="biz-form-section" id="demo-request">
        <div class="biz-container">
            <div class="biz-form-box">
                <div class="biz-section-header" style="margin-bottom:32px;">
                    <span class="biz-badge blue">Consultation & Enterprise Trial</span>
                    <h2>Request an Enterprise Demo</h2>
                    <p>Discuss your multi-branch layout, inventory volume, and POS requirements with an RS ORANGE TECH enterprise software architect.</p>
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

                @if(isset($errors) && (is_object($errors) ? (method_exists($errors, 'any') && $errors->any()) : !empty($errors)))
                    <div class="form-alert error">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <div>
                            <strong>Please resolve the following fields:</strong>
                            <ul>
                                @php
                                    $allErrors = is_object($errors) && method_exists($errors, 'all') ? $errors->all() : (array) $errors;
                                @endphp
                                @foreach($allErrors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('products.rs-inventory-business.submit') }}" id="bizInquiryForm">
                    @csrf
                    <!-- Honeypot -->
                    <input type="text" name="my_custom_country_verify" style="display:none !important;" tabindex="-1" autocomplete="off">

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="biz-name">Full Name <span class="req">*</span></label>
                            <input type="text" id="biz-name" name="name" class="solo-form-control" value="{{ old('name') }}" placeholder="e.g. Vikram Malhotra" required>
                        </div>

                        <div class="solo-form-group">
                            <label for="biz-business-name">Company / Business Name <span class="req">*</span></label>
                            <input type="text" id="biz-business-name" name="business_name" class="solo-form-control" value="{{ old('business_name') }}" placeholder="e.g. Apex Retail Group" required>
                        </div>
                    </div>

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="biz-email">Corporate Work Email <span class="req">*</span></label>
                            <input type="email" id="biz-email" name="email" class="solo-form-control" value="{{ old('email') }}" placeholder="e.g. vikram@apexretail.com" required>
                        </div>

                        <div class="solo-form-group">
                            <label for="biz-phone">Direct Contact / WhatsApp <span class="req">*</span></label>
                            <input type="tel" id="biz-phone" name="phone" class="solo-form-control" value="{{ old('phone') }}" placeholder="e.g. +91 98765 43210" required>
                        </div>
                    </div>

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="biz-business-type">Industry / Retail Category <span class="req">*</span></label>
                            <select id="biz-business-type" name="business_type" class="solo-form-control" required>
                                <option value="" disabled {{ old('business_type') ? '' : 'selected' }}>Select your retail category...</option>
                                <option value="Multi-Store Supermarket Chain" {{ old('business_type') == 'Multi-Store Supermarket Chain' ? 'selected' : '' }}>Multi-Store Supermarket Chain</option>
                                <option value="Apparel & Fashion Retail" {{ old('business_type') == 'Apparel & Fashion Retail' ? 'selected' : '' }}>Apparel & Fashion Retail</option>
                                <option value="Consumer Electronics & Mobiles" {{ old('business_type') == 'Consumer Electronics & Mobiles' ? 'selected' : '' }}>Consumer Electronics & Mobiles</option>
                                <option value="Hardware, Sanitary & Building Materials" {{ old('business_type') == 'Hardware, Sanitary & Building Materials' ? 'selected' : '' }}>Hardware, Sanitary & Building Materials</option>
                                <option value="Footwear & Leather Chain" {{ old('business_type') == 'Footwear & Leather Chain' ? 'selected' : '' }}>Footwear & Leather Chain</option>
                                <option value="Pharmacy & Healthcare Retail" {{ old('business_type') == 'Pharmacy & Healthcare Retail' ? 'selected' : '' }}>Pharmacy & Healthcare Retail</option>
                                <option value="Other Multi-Location Enterprise" {{ old('business_type') == 'Other Multi-Location Enterprise' ? 'selected' : '' }}>Other Multi-Location Enterprise</option>
                            </select>
                        </div>

                        <div class="solo-form-group">
                            <label for="biz-outlets">Number of Outlets / Warehouses <span class="req">*</span></label>
                            <select id="biz-outlets" name="store_outlets" class="solo-form-control" required>
                                <option value="" disabled {{ old('store_outlets') ? '' : 'selected' }}>Select number of locations...</option>
                                <option value="1 - 3 Outlets" {{ old('store_outlets') == '1 - 3 Outlets' ? 'selected' : '' }}>1 - 3 Outlets</option>
                                <option value="4 - 10 Outlets" {{ old('store_outlets') == '4 - 10 Outlets' ? 'selected' : '' }}>4 - 10 Outlets</option>
                                <option value="11 - 25 Outlets" {{ old('store_outlets') == '11 - 25 Outlets' ? 'selected' : '' }}>11 - 25 Outlets</option>
                                <option value="25+ Large Enterprise Chain" {{ old('store_outlets') == '25+ Large Enterprise Chain' ? 'selected' : '' }}>25+ Large Enterprise Chain</option>
                            </select>
                        </div>
                    </div>

                    <div class="solo-grid-row">
                        <div class="solo-form-group">
                            <label for="biz-terminals">Estimated Billing Counters / Terminals <span class="req">*</span></label>
                            <select id="biz-terminals" name="billing_terminals" class="solo-form-control" required>
                                <option value="" disabled {{ old('billing_terminals') ? '' : 'selected' }}>Select total billing PCs...</option>
                                <option value="2 - 5 Terminals" {{ old('billing_terminals') == '2 - 5 Terminals' ? 'selected' : '' }}>2 - 5 Terminals</option>
                                <option value="6 - 15 Terminals" {{ old('billing_terminals') == '6 - 15 Terminals' ? 'selected' : '' }}>6 - 15 Terminals</option>
                                <option value="16 - 50 Terminals" {{ old('billing_terminals') == '16 - 50 Terminals' ? 'selected' : '' }}>16 - 50 Terminals</option>
                                <option value="50+ Terminals" {{ old('billing_terminals') == '50+ Terminals' ? 'selected' : '' }}>50+ Terminals</option>
                            </select>
                        </div>

                        <div class="solo-form-group">
                            <label for="biz-turnover">Approximate Annual Turnover</label>
                            <select id="biz-turnover" name="annual_turnover" class="solo-form-control">
                                <option value="" disabled {{ old('annual_turnover') ? '' : 'selected' }}>Select annual turnover bracket...</option>
                                <option value="Under ₹1 Crore" {{ old('annual_turnover') == 'Under ₹1 Crore' ? 'selected' : '' }}>Under ₹1 Crore</option>
                                <option value="₹1 Cr - ₹5 Crore" {{ old('annual_turnover') == '₹1 Cr - ₹5 Crore' ? 'selected' : '' }}>₹1 Cr - ₹5 Crore</option>
                                <option value="₹5 Cr - ₹25 Crore" {{ old('annual_turnover') == '₹5 Cr - ₹25 Crore' ? 'selected' : '' }}>₹5 Cr - ₹25 Crore</option>
                                <option value="₹25 Crore+" {{ old('annual_turnover') == '₹25 Crore+' ? 'selected' : '' }}>₹25 Crore+</option>
                            </select>
                        </div>
                    </div>

                    <!-- Required Enterprise Modules Checkboxes -->
                    <div class="solo-form-group">
                        <label>Priority Enterprise Capabilities (Select all that apply)</label>
                        <div class="solo-checkbox-group">
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_modules[]" value="Multi-Location Transfers" {{ is_array(old('required_modules')) && in_array('Multi-Location Transfers', old('required_modules')) ? 'checked' : '' }}>
                                <span>Multi-Branch Stock Transfers</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_modules[]" value="Purchasing & GRN" {{ is_array(old('required_modules')) && in_array('Purchasing & GRN', old('required_modules')) ? 'checked' : '' }}>
                                <span>Purchasing & Goods Receipt (GRN)</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_modules[]" value="Customer Loyalty Points" {{ is_array(old('required_modules')) && in_array('Customer Loyalty Points', old('required_modules')) ? 'checked' : '' }}>
                                <span>Customer Loyalty & Wallet</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_modules[]" value="Promotional Coupon Engine" {{ is_array(old('required_modules')) && in_array('Promotional Coupon Engine', old('required_modules')) ? 'checked' : '' }}>
                                <span>Promotional Coupon Engine</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_modules[]" value="Role-Based Security (RBAC)" {{ is_array(old('required_modules')) && in_array('Role-Based Security (RBAC)', old('required_modules')) ? 'checked' : '' }}>
                                <span>Role-Based Permissions (RBAC)</span>
                            </label>
                            <label class="solo-checkbox-label">
                                <input type="checkbox" name="required_modules[]" value="Executive Financial Reporting" {{ is_array(old('required_modules')) && in_array('Executive Financial Reporting', old('required_modules')) ? 'checked' : '' }}>
                                <span>Consolidated Financial Reports</span>
                            </label>
                        </div>
                    </div>

                    <!-- Preferred Contact Channel -->
                    <div class="solo-form-group">
                        <label>Preferred Communication Channel <span class="req">*</span></label>
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
                                <span>Corporate Email</span>
                            </label>
                        </div>
                    </div>

                    <!-- Additional Requirements -->
                    <div class="solo-form-group">
                        <label for="biz-requirements-text">Enterprise Scope & Architecture Notes</label>
                        <textarea id="biz-requirements-text" name="additional_requirements" class="solo-form-control" rows="3" placeholder="Tell us about your current software (e.g. Tally, SAP, Busy, Excel), server infrastructure, number of employees, or integration requirements...">{{ old('additional_requirements') }}</textarea>
                    </div>

                    <div class="solo-form-submit">
                        <button type="submit" class="biz-btn biz-btn-primary" style="width:100%; padding:16px; border-radius:10px;">
                            <span>Submit Enterprise Demo Request</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>

                    <p class="solo-form-disclaimer">
                        By submitting this form, you authorize RS ORANGE TECH to contact you regarding RS Inventory – Business. We respect your corporate privacy.
                    </p>
                </form>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 9: FREQUENTLY ASKED QUESTIONS
         ======================================================== -->
    <section class="biz-faq" id="faq">
        <div class="biz-container">
            <div class="biz-section-header">
                <span class="biz-badge blue">Enterprise FAQs</span>
                <h2>Frequently Asked Questions</h2>
                <p>Everything you need to know about deploying RS Inventory – Business across your retail organization.</p>
            </div>

            <div class="biz-faq-list">
                <!-- FAQ 1 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>What is RS Inventory – Business?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        RS Inventory – Business is the flagship retail ERP edition developed by RS ORANGE TECH. It scales beyond single-store setups to integrate multi-location stock tracking, procurement, supplier management, POS billing, customer loyalty, promotional coupons, and consolidated business analytics into a unified platform.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>How is the Business edition different from RS Inventory – Solo and LAN?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        RS Inventory – Solo is designed for stores operating on a single PC, and RS Inventory – LAN coordinates concurrent checkout counters over a local in-store network. RS Inventory – Business connects multiple store outlets, central warehouses, purchasing workflows, customer loyalty ledgers, and multi-tier employee permissions.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>Does RS Inventory – Business support multi-branch stock transfers?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        Yes. Authorized managers can generate transfer manifests between central warehouses and branch outlets, tracking inventory in transit and updating stock records upon confirmed receipt.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>How does the customer loyalty points system work?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        The loyalty engine accrues reward points automatically based on configurable purchase values. Customers can redeem points against future bills, while the system maintains a complete debit/credit ledger with automatic reversal on refunded transactions.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>Can I configure promotional discount coupons?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        Yes. Administrators can create percentage or flat discount coupons with minimum spend thresholds, expiration dates, usage limits, and specific category eligibility. All coupon redemptions are validated on the backend.
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>What employee roles and permissions are supported?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        The software features role-based access control (RBAC) with predefined and custom roles including Business Administrator, Store Manager, Cashier, Inventory Auditor, and Accountant.
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>Does the system support supplier purchasing and goods receipt?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        Yes. It supports purchase order generation, supplier directories, cost price tracking, and Goods Received Notes (GRN) that update inventory levels upon receipt confirmation.
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>Can it integrate with WhatsApp and email communication?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        Yes. The business settings include configurable communication gateways for sending digital invoices, loyalty balance alerts, and promotional announcements via email SMTP and WhatsApp Business APIs.
                    </div>
                </div>

                <!-- FAQ 9 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>Can we migrate data from existing POS or ERP software?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        Yes. The RS ORANGE TECH technical engineering team provides structured onboarding and migration assistance for existing product catalogs, SKU barcodes, customer balances, and supplier lists.
                    </div>
                </div>

                <!-- FAQ 10 -->
                <div class="biz-faq-item">
                    <button type="button" class="biz-faq-question" aria-expanded="false">
                        <span>How do I request an enterprise demonstration or pilot?</span>
                        <span class="biz-faq-icon">▼</span>
                    </button>
                    <div class="biz-faq-answer">
                        You can request a tailored demonstration by submitting the corporate inquiry form on this page or contacting the RS ORANGE TECH enterprise solutions team at <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" style="color:var(--biz-blue); font-weight:700;">{{ $phone }}</a> or via email at <a href="mailto:{{ $email }}" style="color:var(--biz-blue); font-weight:700;">{{ $email }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         SECTION 10: BOTTOM CTA BANNER
         ======================================================== -->
    <section class="biz-cta-banner">
        <div class="biz-container">
            <div class="biz-cta-card">
                <div>
                    <span class="biz-badge blue" style="margin-bottom:12px; background:rgba(29, 78, 216, 0.25); color:#93c5fd;">Enterprise Retail Modernization</span>
                    <h2 style="font-size:clamp(26px, 3vw, 36px); margin:0 0 12px; font-weight:800;">Ready to Scale Your Retail Brand with RS Inventory?</h2>
                    <p style="font-size:16px; color:#cbd5e1; margin:0; max-width:640px; line-height:1.6;">
                        Contact RS ORANGE TECH today to consult with our enterprise retail specialists and schedule a customized multi-branch pilot.
                    </p>
                </div>
                <div style="display:flex; flex-wrap:wrap; gap:16px; flex-shrink:0; z-index:2;">
                    <a href="#demo-request" class="biz-btn biz-btn-primary">Request Business Demo</a>
                    <a href="{{ route('contact') }}" class="biz-btn biz-btn-white">Contact Our Team</a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
    <!-- Multi-Branch Interactive Demo Script -->
    <script src="{{ asset('js/rs-inventory-business-demo.js') }}?v=1.01"></script>
@endpush
