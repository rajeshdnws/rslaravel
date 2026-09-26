/**
 * RS Inventory – Business (Enterprise Edition) Interactive Sandbox
 * Multi-Branch Retail ERP & Point of Sale Simulator
 * RS ORANGE TECH PVT LTD
 */
document.addEventListener('DOMContentLoaded', () => {

    // ----------------------------------------------------
    // 1. ENTERPRISE STORE STATE & MULTI-BRANCH INVENTORY
    // ----------------------------------------------------
    const enterpriseData = {
        branches: {
            'all': { name: 'All Outlets (Consolidated)', sales: 684310, orders: 482, margin: '34.2%', valuation: '₹1.89 Cr' },
            'b1': { name: 'Downtown Flagship Store', sales: 342150, orders: 246, margin: '35.8%', valuation: '₹84.50 L' },
            'b2': { name: 'Central Distribution Warehouse', sales: 185200, orders: 86, margin: '31.5%', valuation: '₹72.10 L' },
            'b3': { name: 'Suburban Express Outlet', sales: 156960, orders: 150, margin: '33.9%', valuation: '₹32.40 L' }
        },
        products: {
            'biz-1': { name: 'Executive Formal Blazer (Navy)', sku: 'APP-501', price: 3499, b1: 28, b2: 150, b3: 12, category: 'Apparel' },
            'biz-2': { name: 'Italian Leather Oxford Shoes', sku: 'FTW-302', price: 4299, b1: 14, b2: 60, b3: 6, category: 'Footwear' },
            'biz-3': { name: 'Smart Wireless Noise-Cancelling ANC', sku: 'ELE-808', price: 5999, b1: 9, b2: 45, b3: 4, category: 'Electronics' },
            'biz-4': { name: 'Organic Cold-Pressed Olive Oil 1L', sku: 'GRO-109', price: 950, b1: 42, b2: 240, b3: 20, category: 'Groceries' },
            'biz-5': { name: 'Mechanical Ergonomic Keyboard RGB', sku: 'ELE-912', price: 2899, b1: 18, b2: 80, b3: 8, category: 'Electronics' },
            'biz-6': { name: 'Designer Silk Scarf Collection', sku: 'ACC-204', price: 1299, b1: 35, b2: 120, b3: 15, category: 'Accessories' }
        },
        customers: {
            'c1': { name: 'Rahul Sharma', tier: 'VIP Gold', phone: '+91 98765 43210', points: 450 },
            'c2': { name: 'Anita Roy', tier: 'Silver Club', phone: '+91 98123 45678', points: 180 },
            'c3': { name: 'Walk-in Guest', tier: 'Standard', phone: 'N/A', points: 0 }
        },
        activeCoupons: {
            'SAVE10': { type: 'percent', value: 10, minSpend: 2000, desc: '10% off orders above ₹2,000' },
            'FLAT500': { type: 'flat', value: 500, minSpend: 3500, desc: 'Flat ₹500 off orders above ₹3,500' },
            'FESTIVE20': { type: 'percent', value: 20, minSpend: 5000, desc: '20% off festive orders above ₹5,000' }
        }
    };

    let currentBranch = 'all';
    let activeCustomerKey = 'c1';
    let appliedCoupon = null;
    let loyaltyPointsToRedeem = 0;
    const cart = [
        { id: 'biz-1', name: 'Executive Formal Blazer (Navy)', price: 3499, qty: 1 }
    ];

    // ----------------------------------------------------
    // 2. TAB SWITCHER
    // ----------------------------------------------------
    const tabBtns = document.querySelectorAll('.biz-tab-btn');
    const panels = document.querySelectorAll('.biz-panel');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.getAttribute('data-tab');
            tabBtns.forEach(b => b.classList.remove('active'));
            panels.forEach(p => p.classList.remove('active'));

            btn.classList.add('active');
            const targetPanel = document.getElementById(target);
            if (targetPanel) targetPanel.classList.add('active');
        });
    });

    // ----------------------------------------------------
    // 3. BRANCH SELECTOR (EXECUTIVE KPI UPDATER)
    // ----------------------------------------------------
    const branchSelect = document.getElementById('bizBranchSelect');
    if (branchSelect) {
        branchSelect.addEventListener('change', (e) => {
            currentBranch = e.target.value;
            updateDashboardKPIs();
            renderPOSProducts();
            renderCatalogTable();
        });
    }

    function updateDashboardKPIs() {
        const branchInfo = enterpriseData.branches[currentBranch] || enterpriseData.branches['all'];
        
        const kpiSales = document.getElementById('bizKpiSales');
        const kpiOrders = document.getElementById('bizKpiOrders');
        const kpiMargin = document.getElementById('bizKpiMargin');
        const kpiValuation = document.getElementById('bizKpiValuation');
        const branchBadgeName = document.getElementById('bizActiveBranchBadge');

        if (kpiSales) kpiSales.textContent = '₹' + branchInfo.sales.toLocaleString('en-IN');
        if (kpiOrders) kpiOrders.textContent = branchInfo.orders.toString();
        if (kpiMargin) kpiMargin.textContent = branchInfo.margin;
        if (kpiValuation) kpiValuation.textContent = branchInfo.valuation;
        if (branchBadgeName) branchBadgeName.textContent = branchInfo.name;
    }

    // ----------------------------------------------------
    // 4. POS BILLING & LOYALTY TERMINAL
    // ----------------------------------------------------
    function renderPOSProducts() {
        const container = document.getElementById('bizPosItemsGrid');
        if (!container) return;

        container.innerHTML = '';
        Object.keys(enterpriseData.products).forEach(id => {
            const p = enterpriseData.products[id];
            const stockCount = currentBranch === 'all' ? (p.b1 + p.b2 + p.b3) : (p[currentBranch] || p.b1);

            const card = document.createElement('div');
            card.className = 'pos-item-card';
            card.innerHTML = `
                <div class="pos-item-name">${p.name}</div>
                <div class="pos-item-sku">SKU: ${p.sku} • <span class="pos-stock-tag">${stockCount} in stock</span></div>
                <div class="pos-item-footer">
                    <div class="pos-item-price">₹${p.price.toLocaleString('en-IN')}</div>
                    <div class="pos-item-add">+</div>
                </div>
            `;

            card.addEventListener('click', () => {
                const existing = cart.find(item => item.id === id);
                if (existing) {
                    existing.qty += 1;
                } else {
                    cart.push({ id, name: p.name, price: p.price, qty: 1 });
                }
                renderCart();
            });

            container.appendChild(card);
        });
    }

    // Customer Selector in POS
    const customerSelect = document.getElementById('bizPosCustomerSelect');
    const loyaltyChip = document.getElementById('bizCustomerLoyaltyChip');

    if (customerSelect) {
        customerSelect.addEventListener('change', (e) => {
            activeCustomerKey = e.target.value;
            loyaltyPointsToRedeem = 0;
            const chkRedeem = document.getElementById('bizRedeemLoyaltyChk');
            if (chkRedeem) chkRedeem.checked = false;
            updateCustomerLoyaltyUI();
            renderCart();
        });
    }

    function updateCustomerLoyaltyUI() {
        const cust = enterpriseData.customers[activeCustomerKey];
        if (loyaltyChip && cust) {
            loyaltyChip.innerHTML = `⭐ ${cust.tier} (${cust.points} Pts Available)`;
        }
    }

    // Loyalty Points Checkbox
    const redeemLoyaltyChk = document.getElementById('bizRedeemLoyaltyChk');
    if (redeemLoyaltyChk) {
        redeemLoyaltyChk.addEventListener('change', (e) => {
            const cust = enterpriseData.customers[activeCustomerKey];
            if (e.target.checked && cust) {
                // Each point = ₹1 discount, max 50% of subtotal
                const subtotal = cart.reduce((acc, i) => acc + (i.price * i.qty), 0);
                const maxRedeemable = Math.min(cust.points, Math.floor(subtotal * 0.5));
                loyaltyPointsToRedeem = maxRedeemable;
            } else {
                loyaltyPointsToRedeem = 0;
            }
            renderCart();
        });
    }

    // Coupon Code Apply
    const couponInput = document.getElementById('bizCouponInput');
    const couponBtn = document.getElementById('bizApplyCouponBtn');
    const couponStatusMsg = document.getElementById('bizCouponStatus');

    if (couponBtn && couponInput) {
        couponBtn.addEventListener('click', () => {
            const code = couponInput.value.trim().toUpperCase();
            if (!code) return;

            const coupon = enterpriseData.activeCoupons[code];
            const subtotal = cart.reduce((acc, i) => acc + (i.price * i.qty), 0);

            if (!coupon) {
                if (couponStatusMsg) {
                    couponStatusMsg.textContent = 'Invalid promo code';
                    couponStatusMsg.style.color = '#ef4444';
                }
                appliedCoupon = null;
            } else if (subtotal < coupon.minSpend) {
                if (couponStatusMsg) {
                    couponStatusMsg.textContent = `Min spend ₹${coupon.minSpend} required`;
                    couponStatusMsg.style.color = '#f59e0b';
                }
                appliedCoupon = null;
            } else {
                appliedCoupon = { code, ...coupon };
                if (couponStatusMsg) {
                    couponStatusMsg.textContent = `Applied: ${coupon.desc}`;
                    couponStatusMsg.style.color = '#10b981';
                }
            }
            renderCart();
        });
    }

    function renderCart() {
        const container = document.getElementById('bizCartList');
        const emptyMsg = document.getElementById('bizEmptyCart');
        const subtotalEl = document.getElementById('bizSubtotal');
        const discountRow = document.getElementById('bizDiscountRow');
        const discountEl = document.getElementById('bizDiscountAmount');
        const loyaltyRow = document.getElementById('bizLoyaltyRow');
        const loyaltyEl = document.getElementById('bizLoyaltyAmount');
        const taxEl = document.getElementById('bizTaxAmount');
        const totalEl = document.getElementById('bizGrandTotal');
        const pointsEarnedEl = document.getElementById('bizPointsEarned');
        const checkoutBtn = document.getElementById('bizCheckoutBtn');

        if (!container) return;
        container.innerHTML = '';

        if (cart.length === 0) {
            if (emptyMsg) emptyMsg.style.display = 'block';
        } else {
            if (emptyMsg) emptyMsg.style.display = 'none';

            cart.forEach(item => {
                const row = document.createElement('div');
                row.className = 'pos-cart-row';
                row.innerHTML = `
                    <div class="pos-cart-info">
                        <div class="pos-cart-title">${item.name}</div>
                        <div class="pos-cart-rate">₹${item.price.toLocaleString('en-IN')} × ${item.qty}</div>
                    </div>
                    <div class="pos-cart-qty-ctrls">
                        <button type="button" class="qty-btn dec-btn" data-id="${item.id}">-</button>
                        <span style="font-weight:700; min-width:18px; text-align:center;">${item.qty}</span>
                        <button type="button" class="qty-btn inc-btn" data-id="${item.id}">+</button>
                    </div>
                    <div class="pos-cart-subtotal">₹${(item.price * item.qty).toLocaleString('en-IN')}</div>
                `;

                row.querySelector('.dec-btn').addEventListener('click', () => {
                    item.qty -= 1;
                    if (item.qty <= 0) {
                        const idx = cart.indexOf(item);
                        cart.splice(idx, 1);
                    }
                    renderCart();
                });

                row.querySelector('.inc-btn').addEventListener('click', () => {
                    item.qty += 1;
                    renderCart();
                });

                container.appendChild(row);
            });
        }

        const subtotal = cart.reduce((acc, i) => acc + (i.price * i.qty), 0);
        let discount = 0;

        if (appliedCoupon && subtotal >= appliedCoupon.minSpend) {
            if (appliedCoupon.type === 'percent') {
                discount = Math.round(subtotal * (appliedCoupon.value / 100));
            } else {
                discount = appliedCoupon.value;
            }
        }

        const postDiscountSubtotal = Math.max(0, subtotal - discount);
        const loyaltyDeduction = Math.min(loyaltyPointsToRedeem, postDiscountSubtotal);
        const taxableAmount = Math.max(0, postDiscountSubtotal - loyaltyDeduction);
        const gstTax = Math.round(taxableAmount * 0.18);
        const grandTotal = taxableAmount + gstTax;
        const pointsToEarn = Math.floor(grandTotal / 100);

        if (subtotalEl) subtotalEl.textContent = '₹' + subtotal.toLocaleString('en-IN', { minimumFractionDigits: 2 });

        if (discountRow && discountEl) {
            if (discount > 0) {
                discountRow.style.display = 'flex';
                discountEl.textContent = '-₹' + discount.toLocaleString('en-IN', { minimumFractionDigits: 2 });
            } else {
                discountRow.style.display = 'none';
            }
        }

        if (loyaltyRow && loyaltyEl) {
            if (loyaltyDeduction > 0) {
                loyaltyRow.style.display = 'flex';
                loyaltyEl.textContent = '-₹' + loyaltyDeduction.toLocaleString('en-IN', { minimumFractionDigits: 2 }) + ` (${loyaltyDeduction} pts)`;
            } else {
                loyaltyRow.style.display = 'none';
            }
        }

        if (taxEl) taxEl.textContent = '₹' + gstTax.toLocaleString('en-IN', { minimumFractionDigits: 2 });
        if (totalEl) totalEl.textContent = '₹' + grandTotal.toLocaleString('en-IN', { minimumFractionDigits: 2 });
        if (pointsEarnedEl) pointsEarnedEl.textContent = `+${pointsToEarn} Pts`;

        if (checkoutBtn) {
            checkoutBtn.disabled = cart.length === 0;
            checkoutBtn.textContent = cart.length === 0 
                ? 'Add Products to Bill' 
                : `Complete Invoice & Print Receipt (₹${grandTotal.toLocaleString('en-IN')})`;
        }
    }

    // Complete POS Sale
    const checkoutBtn = document.getElementById('bizCheckoutBtn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            if (cart.length === 0) return;

            const subtotal = cart.reduce((acc, i) => acc + (i.price * i.qty), 0);
            let discount = 0;
            if (appliedCoupon && subtotal >= appliedCoupon.minSpend) {
                discount = appliedCoupon.type === 'percent' ? Math.round(subtotal * (appliedCoupon.value / 100)) : appliedCoupon.value;
            }
            const loyaltyDeduction = Math.min(loyaltyPointsToRedeem, Math.max(0, subtotal - discount));
            const taxable = Math.max(0, subtotal - discount - loyaltyDeduction);
            const gst = Math.round(taxable * 0.18);
            const grandTotal = taxable + gst;
            const pointsEarned = Math.floor(grandTotal / 100);
            const invoiceNo = `INV-BIZ-${Math.floor(100000 + Math.random() * 900000)}`;
            const cust = enterpriseData.customers[activeCustomerKey];

            // Deduct stock from active branch
            const branchKey = currentBranch === 'all' ? 'b1' : currentBranch;
            cart.forEach(item => {
                const prod = enterpriseData.products[item.id];
                if (prod && prod[branchKey] !== undefined) {
                    prod[branchKey] = Math.max(0, prod[branchKey] - item.qty);
                }
            });

            // Update loyalty points
            if (cust) {
                cust.points = cust.points - loyaltyDeduction + pointsEarned;
                updateCustomerLoyaltyUI();
            }

            // Update branch sales
            enterpriseData.branches[branchKey].sales += grandTotal;
            enterpriseData.branches[branchKey].orders += 1;
            enterpriseData.branches['all'].sales += grandTotal;
            enterpriseData.branches['all'].orders += 1;
            updateDashboardKPIs();

            // Populate Receipt Modal
            const rModal = document.getElementById('bizReceiptModal');
            const rInvoiceNo = document.getElementById('bizReceiptInvoiceNo');
            const rCustomer = document.getElementById('bizReceiptCustomer');
            const rBranch = document.getElementById('bizReceiptBranch');
            const rItems = document.getElementById('bizReceiptItems');
            const rSubtotal = document.getElementById('bizReceiptSubtotal');
            const rTax = document.getElementById('bizReceiptTax');
            const rDiscount = document.getElementById('bizReceiptDiscount');
            const rTotal = document.getElementById('bizReceiptTotal');
            const rLoyaltyMsg = document.getElementById('bizReceiptLoyaltyMsg');

            if (rInvoiceNo) rInvoiceNo.textContent = invoiceNo;
            if (rCustomer) rCustomer.textContent = `Customer: ${cust.name} (${cust.tier})`;
            if (rBranch) rBranch.textContent = `Branch: ${enterpriseData.branches[branchKey].name}`;
            if (rSubtotal) rSubtotal.textContent = `₹${subtotal.toLocaleString('en-IN')}`;
            if (rTax) rTax.textContent = `₹${gst.toLocaleString('en-IN')}`;
            if (rDiscount) rDiscount.textContent = discount > 0 ? `-₹${discount.toLocaleString('en-IN')}` : '₹0.00';
            if (rTotal) rTotal.textContent = `₹${grandTotal.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
            if (rLoyaltyMsg) rLoyaltyMsg.textContent = `Loyalty Redeemed: ${loyaltyDeduction} pts | Points Earned Today: +${pointsEarned} pts | New Balance: ${cust.points} pts`;

            if (rItems) {
                rItems.innerHTML = '';
                cart.forEach(i => {
                    const row = document.createElement('div');
                    row.className = 'receipt-row';
                    row.innerHTML = `<span>${i.qty}x ${i.name}</span><span>₹${(i.price * i.qty).toLocaleString('en-IN')}</span>`;
                    rItems.appendChild(row);
                });
            }

            if (rModal) rModal.classList.add('active');

            // Reset cart
            cart.length = 0;
            loyaltyPointsToRedeem = 0;
            const chk = document.getElementById('bizRedeemLoyaltyChk');
            if (chk) chk.checked = false;
            renderCart();
            renderPOSProducts();
            renderCatalogTable();
        });
    }

    // Close Receipt Modal
    const closeReceiptBtn = document.getElementById('closeBizReceiptBtn');
    const receiptModal = document.getElementById('bizReceiptModal');
    if (closeReceiptBtn && receiptModal) {
        closeReceiptBtn.addEventListener('click', () => receiptModal.classList.remove('active'));
        receiptModal.addEventListener('click', (e) => {
            if (e.target === receiptModal) receiptModal.classList.remove('active');
        });
    }

    // ----------------------------------------------------
    // 5. PURCHASING & GOODS RECEIPT (TAB 3)
    // ----------------------------------------------------
    const receivePoBtn = document.getElementById('bizReceivePoBtn');
    const poStatusBadge = document.getElementById('bizPoStatusBadge');

    if (receivePoBtn && poStatusBadge) {
        receivePoBtn.addEventListener('click', () => {
            if (poStatusBadge.textContent === 'Received & Synced') return;

            // Increment central warehouse stock for ordered items
            enterpriseData.products['biz-1'].b2 += 50;
            enterpriseData.products['biz-3'].b2 += 25;

            poStatusBadge.textContent = 'Received & Synced';
            poStatusBadge.className = 'status-tag in-stock';
            receivePoBtn.disabled = true;
            receivePoBtn.textContent = '✓ Stock Inward Complete';

            renderPOSProducts();
            renderCatalogTable();

            // Add alert notice
            const grnNotice = document.getElementById('bizGrnNotice');
            if (grnNotice) {
                grnNotice.style.display = 'block';
                grnNotice.textContent = 'Goods Received Note (GRN #7842) verified. +50 Blazers & +25 ANC Headphones inwarded to Central Warehouse!';
            }
        });
    }

    // ----------------------------------------------------
    // 6. INTER-BRANCH STOCK TRANSFER (TAB 5)
    // ----------------------------------------------------
    const transferBtn = document.getElementById('bizDispatchTransferBtn');
    const transferSource = document.getElementById('bizTransferSource');
    const transferDest = document.getElementById('bizTransferDest');
    const transferProduct = document.getElementById('bizTransferProduct');
    const transferQty = document.getElementById('bizTransferQty');
    const transferTableBody = document.getElementById('bizTransferTableBody');

    if (transferBtn && transferSource && transferDest && transferProduct && transferQty) {
        transferBtn.addEventListener('click', () => {
            const src = transferSource.value;
            const dest = transferDest.value;
            const prodId = transferProduct.value;
            const qty = parseInt(transferQty.value, 10) || 0;

            if (src === dest) {
                alert('Source and destination branches must be different.');
                return;
            }
            if (qty <= 0) {
                alert('Please enter a valid transfer quantity.');
                return;
            }

            const product = enterpriseData.products[prodId];
            if (!product || (product[src] || 0) < qty) {
                alert(`Insufficient stock at source branch. Available: ${product ? (product[src] || 0) : 0}`);
                return;
            }

            // Deduct from source and add to destination
            product[src] -= qty;
            product[dest] += qty;

            const manifestNo = `TRF-${Math.floor(1000 + Math.random() * 9000)}`;
            const srcName = enterpriseData.branches[src].name;
            const destName = enterpriseData.branches[dest].name;

            if (transferTableBody) {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td><strong>${manifestNo}</strong></td>
                    <td>${product.name} (${qty} units)</td>
                    <td>${srcName}</td>
                    <td>${destName}</td>
                    <td><span class="status-tag in-stock">Completed</span></td>
                `;
                transferTableBody.insertBefore(tr, transferTableBody.firstChild);
            }

            renderPOSProducts();
            renderCatalogTable();
            alert(`Stock transfer ${manifestNo} successfully executed! ${qty} units of ${product.name} moved from ${srcName} to ${destName}.`);
        });
    }

    // ----------------------------------------------------
    // 7. SHARED CATALOG TABLE RENDERER
    // ----------------------------------------------------
    function renderCatalogTable() {
        const tbody = document.getElementById('bizCatalogTableBody');
        if (!tbody) return;

        tbody.innerHTML = '';
        Object.keys(enterpriseData.products).forEach(id => {
            const p = enterpriseData.products[id];
            const totalStock = p.b1 + p.b2 + p.b3;
            const tr = document.createElement('tr');

            let statusTag = '<span class="status-tag in-stock">In Stock</span>';
            if (totalStock <= 15) {
                statusTag = '<span class="status-tag low-stock">Low Stock</span>';
            }

            tr.innerHTML = `
                <td><strong>${p.name}</strong><br><span style="font-size:11px; color:#64748b;">SKU: ${p.sku}</span></td>
                <td>${p.category}</td>
                <td>₹${p.price.toLocaleString('en-IN')}</td>
                <td>${p.b1} units</td>
                <td>${p.b2} units</td>
                <td>${p.b3} units</td>
                <td><strong>${totalStock} units</strong></td>
                <td>${statusTag}</td>
            `;
            tbody.appendChild(tr);
        });
    }

    // ----------------------------------------------------
    // 8. FAQ ACCORDION
    // ----------------------------------------------------
    const faqItems = document.querySelectorAll('.biz-faq-item');
    faqItems.forEach(item => {
        const questionBtn = item.querySelector('.biz-faq-question');
        if (questionBtn) {
            questionBtn.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(other => {
                    if (other !== item) {
                        other.classList.remove('active');
                        const btn = other.querySelector('.biz-faq-question');
                        if (btn) btn.setAttribute('aria-expanded', 'false');
                    }
                });

                if (isActive) {
                    item.classList.remove('active');
                    questionBtn.setAttribute('aria-expanded', 'false');
                } else {
                    item.classList.add('active');
                    questionBtn.setAttribute('aria-expanded', 'true');
                }
            });
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });

    // ----------------------------------------------------
    // 9. CENTRALIZED API SERVICE & INSTALLATION TRACKING
    // ----------------------------------------------------
    const API_CONFIG = {
        environment: 'production', // 'development', 'staging', 'production'
        baseUrls: {
            development: window.location.origin + '/api/inventory/v1',
            staging: window.location.origin + '/api/inventory/v1',
            production: (window.location.protocol === 'http:' ? 'https://' + window.location.host : window.location.origin) + '/api/inventory/v1'
        },
        getBaseUrl() {
            return this.baseUrls[this.environment] || this.baseUrls.production;
        }
    };

    const InventoryControlApiService = {
        getInstallationId() {
            let instId = localStorage.getItem('rs_biz_installation_id');
            if (!instId) {
                const randHex = () => Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1).toUpperCase();
                instId = `INST-${randHex()}-${randHex()}-${randHex()}`;
                localStorage.setItem('rs_biz_installation_id', instId);
            }
            return instId;
        },

        getDeviceId() {
            let devId = localStorage.getItem('rs_biz_device_id');
            if (!devId) {
                const randHex = () => Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1).toUpperCase();
                devId = `DEV-${randHex()}-${randHex()}`;
                localStorage.setItem('rs_biz_device_id', devId);
            }
            return devId;
        },

        getAppVersion() {
            return '1.0.0';
        },

        getLocalState() {
            const raw = localStorage.getItem('rs_biz_local_config');
            if (raw) {
                try { return JSON.parse(raw); } catch (e) {}
            }
            return {
                registration_status: 'UNREGISTERED',
                store_profile_completed: false,
                license_status: 'NOT_ACTIVATED',
                license_key: null,
                license_expiry: null,
                last_server_validation: null,
                last_heartbeat: null,
                api_environment: API_CONFIG.environment,
                app_version: this.getAppVersion()
            };
        },

        setLocalState(state) {
            const current = this.getLocalState();
            const updated = { ...current, ...state };
            localStorage.setItem('rs_biz_local_config', JSON.stringify(updated));
            return updated;
        },

        getStoreProfile() {
            const raw = localStorage.getItem('rs_biz_store_profile');
            if (raw) {
                try { return JSON.parse(raw); } catch (e) {}
            }
            return null;
        },

        setStoreProfile(profile) {
            localStorage.setItem('rs_biz_store_profile', JSON.stringify(profile));
        },

        getEventQueue() {
            const raw = localStorage.getItem('rs_biz_event_queue');
            if (raw) {
                try { return JSON.parse(raw); } catch (e) {}
            }
            return [];
        },

        pushEvent(type, payload) {
            const q = this.getEventQueue();
            q.push({ id: Date.now(), type, payload, timestamp: new Date().toISOString() });
            localStorage.setItem('rs_biz_event_queue', JSON.stringify(q));
        },

        async request(endpoint, options = {}) {
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), 6000);

            try {
                const response = await fetch(`${API_CONFIG.getBaseUrl()}${endpoint}`, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        ...(options.headers || {})
                    },
                    signal: controller.signal,
                    ...options
                });

                clearTimeout(timeoutId);

                const data = await response.json().catch(() => ({}));

                if (response.ok) {
                    return { success: true, status: response.status, data };
                }

                // Handle HTTP error codes
                let userMsg = 'We could not connect to the registration server right now. Your local data is safe. Please check your internet connection and try again.';
                if (data && data.message) {
                    userMsg = data.message;
                }

                return { success: false, status: response.status, message: userMsg, errors: data.errors };
            } catch (err) {
                clearTimeout(timeoutId);
                return {
                    success: false,
                    status: 0,
                    message: 'We could not connect to the registration server right now. Your local data is safe. Please check your internet connection and try again.'
                };
            }
        },

        async registerInstallation() {
            const installationId = this.getInstallationId();
            const deviceId = this.getDeviceId();

            const payload = {
                installation_id: installationId,
                device_id: deviceId,
                product: 'RS_INVENTORY',
                edition: 'BUSINESS',
                app_version: this.getAppVersion(),
                os_name: 'Windows',
                os_version: '11.0',
                installation_source: 'Website',
                installed_at: new Date().toISOString()
            };

            const res = await this.request('/installations/register', {
                method: 'POST',
                body: JSON.stringify(payload)
            });

            if (res.success) {
                this.setLocalState({
                    registration_status: 'REGISTERED',
                    license_status: res.data.data?.license_status || 'NOT_ACTIVATED',
                    store_profile_completed: res.data.data?.store_profile_completed || false,
                    last_server_validation: new Date().toISOString()
                });
            } else {
                this.setLocalState({ registration_status: 'PENDING' });
                this.pushEvent('INSTALLATION_DETECTED', payload);
            }

            return res;
        },

        async submitStoreProfile(profileData) {
            const installationId = this.getInstallationId();

            const payload = {
                installation_id: installationId,
                ...profileData
            };

            // Save locally immediately
            this.setStoreProfile(profileData);
            this.setLocalState({ store_profile_completed: true });

            const res = await this.request('/installations/store-profile', {
                method: 'POST',
                body: JSON.stringify(payload)
            });

            if (!res.success) {
                this.pushEvent('STORE_PROFILE_COMPLETED', payload);
            }

            return res;
        },

        async activateLicense(licenseKey) {
            const installationId = this.getInstallationId();
            const deviceId = this.getDeviceId();

            const payload = {
                installation_id: installationId,
                device_id: deviceId,
                license_key: licenseKey,
                app_version: this.getAppVersion()
            };

            const res = await this.request('/licenses/activate', {
                method: 'POST',
                body: JSON.stringify(payload)
            });

            if (res.success) {
                this.setLocalState({
                    license_status: 'ACTIVE',
                    license_key: licenseKey,
                    license_expiry: res.data.data?.expires_at || 'Lifetime',
                    last_server_validation: new Date().toISOString()
                });
            }

            return res;
        },

        async validateLicense() {
            const installationId = this.getInstallationId();
            const deviceId = this.getDeviceId();
            const localState = this.getLocalState();

            const res = await this.request('/licenses/validate', {
                method: 'POST',
                body: JSON.stringify({
                    installation_id: installationId,
                    device_id: deviceId,
                    license_key: localState.license_key
                })
            });

            if (res.success) {
                this.setLocalState({
                    license_status: res.data.license_status || localState.license_status,
                    last_server_validation: new Date().toISOString()
                });
            }

            return res;
        },

        async sendHeartbeat() {
            const installationId = this.getInstallationId();
            const deviceId = this.getDeviceId();

            const payload = {
                installation_id: installationId,
                device_id: deviceId,
                app_version: this.getAppVersion(),
                os_name: 'Windows',
                os_version: '11.0'
            };

            const res = await this.request('/installations/heartbeat', {
                method: 'POST',
                body: JSON.stringify(payload)
            });

            if (res.success) {
                this.setLocalState({ last_heartbeat: new Date().toISOString() });
            }

            return res;
        },

        async flushEventQueue() {
            const queue = this.getEventQueue();
            if (queue.length === 0) return;

            const remaining = [];
            for (const item of queue) {
                let success = false;
                if (item.type === 'INSTALLATION_DETECTED') {
                    const r = await this.request('/installations/register', { method: 'POST', body: JSON.stringify(item.payload) });
                    if (r.success) success = true;
                } else if (item.type === 'STORE_PROFILE_COMPLETED') {
                    const r = await this.request('/installations/store-profile', { method: 'POST', body: JSON.stringify(item.payload) });
                    if (r.success) success = true;
                }

                if (!success) {
                    remaining.push(item);
                }
            }

            localStorage.setItem('rs_biz_event_queue', JSON.stringify(remaining));
        }
    };

    // ----------------------------------------------------
    // 10. UI BINDING & FIRST LAUNCH WORKFLOW
    // ----------------------------------------------------
    function initLicenseAndRegistrationUI() {
        const instId = InventoryControlApiService.getInstallationId();
        const devId = InventoryControlApiService.getDeviceId();
        const localState = InventoryControlApiService.getLocalState();
        const storeProfile = InventoryControlApiService.getStoreProfile();

        // Display IDs in UI
        const dispInstId = document.getElementById('bizDisplayInstallationId');
        const dispDevId = document.getElementById('bizDisplayDeviceId');
        const dispLicenseStatus = document.getElementById('bizDisplayLicenseStatus');
        const dispLicenseExpiry = document.getElementById('bizDisplayLicenseExpiry');
        const dispLicenseBadge = document.getElementById('bizLicenseBadge');
        const dispStoreName = document.getElementById('bizDisplayStoreName');
        const dispStoreMobile = document.getElementById('bizDisplayStoreMobile');
        const dispStoreBadge = document.getElementById('bizStoreProfileBadge');
        const dispLastSeen = document.getElementById('bizDisplayLastSeen');
        const dispQueueStatus = document.getElementById('bizDisplayQueueStatus');

        if (dispInstId) dispInstId.textContent = instId;
        if (dispDevId) dispDevId.textContent = `Device: ${devId}`;

        if (dispLicenseStatus) dispLicenseStatus.textContent = localState.license_status === 'ACTIVE' ? 'Active License' : 'Not Activated';
        if (dispLicenseExpiry) dispLicenseExpiry.textContent = `Expiry: ${localState.license_expiry || 'N/A'}`;
        if (dispLicenseBadge) {
            dispLicenseBadge.textContent = localState.license_status === 'ACTIVE' ? 'Active' : 'Not Activated';
            dispLicenseBadge.className = localState.license_status === 'ACTIVE' ? 'biz-badge emerald' : 'biz-badge amber';
        }

        if (dispStoreName) dispStoreName.textContent = storeProfile ? storeProfile.store_name : 'No Store Setup';
        if (dispStoreMobile) dispStoreMobile.textContent = storeProfile ? storeProfile.mobile : 'Store profile incomplete';
        if (dispStoreBadge) {
            const isComp = localState.store_profile_completed;
            dispStoreBadge.textContent = isComp ? 'Profile Complete' : 'Incomplete';
            dispStoreBadge.className = isComp ? 'biz-badge emerald' : 'biz-badge amber';
        }

        if (dispLastSeen) {
            dispLastSeen.textContent = localState.last_heartbeat ? new Date(localState.last_heartbeat).toLocaleTimeString() : 'Just now';
        }

        if (dispQueueStatus) {
            const queueLen = InventoryControlApiService.getEventQueue().length;
            dispQueueStatus.textContent = `Offline Queue: ${queueLen} Pending`;
        }

        // Fill Store Profile fields in Settings Tab
        if (storeProfile) {
            const setVal = (id, val) => { const el = document.getElementById(id); if (el) el.value = val || ''; };
            setVal('bizStoreName', storeProfile.store_name);
            setVal('bizOwnerName', storeProfile.owner_name);
            setVal('bizStoreMobile', storeProfile.mobile);
            setVal('bizStoreEmail', storeProfile.email);
            setVal('bizStoreAddress', storeProfile.address);
            setVal('bizStoreCity', storeProfile.city);
            setVal('bizStoreState', storeProfile.state);
            setVal('bizStorePincode', storeProfile.pincode);
            setVal('bizStoreGstin', storeProfile.gstin);
        }

        // Check First Launch Modal
        const firstModal = document.getElementById('bizFirstLaunchModal');
        if (firstModal && (!storeProfile || !localState.store_profile_completed)) {
            firstModal.classList.add('active');
        }
    }

    // Save First Launch Store Profile
    const flSaveBtn = document.getElementById('flSaveBtn');
    if (flSaveBtn) {
        flSaveBtn.addEventListener('click', async () => {
            const store_name = document.getElementById('flStoreName')?.value.trim();
            const owner_name = document.getElementById('flOwnerName')?.value.trim();
            const mobile = document.getElementById('flMobile')?.value.trim();
            const email = document.getElementById('flEmail')?.value.trim();
            const address = document.getElementById('flAddress')?.value.trim();
            const city = document.getElementById('flCity')?.value.trim();
            const state = document.getElementById('flState')?.value.trim();
            const pincode = document.getElementById('flPincode')?.value.trim();
            const gstin = document.getElementById('flGstin')?.value.trim();

            if (!store_name || !mobile || !address) {
                alert('Please complete all required fields (*): Store Name, Mobile Number, Address.');
                return;
            }

            flSaveBtn.disabled = true;
            flSaveBtn.textContent = 'Registering Store Profile...';

            const profileData = { store_name, owner_name, mobile, email, address, city, state, pincode, gstin };
            await InventoryControlApiService.submitStoreProfile(profileData);

            const modal = document.getElementById('bizFirstLaunchModal');
            if (modal) modal.classList.remove('active');

            initLicenseAndRegistrationUI();
            alert(`Welcome to RS Inventory – Business! Store "${store_name}" registered successfully.`);
        });
    }

    // Activate License Button
    const btnActivate = document.getElementById('bizBtnActivateLicense');
    const licenseNotice = document.getElementById('bizLicenseNotice');
    if (btnActivate) {
        btnActivate.addEventListener('click', async () => {
            const inputKey = document.getElementById('bizLicenseKeyInput')?.value.trim();
            if (!inputKey) {
                alert('Please enter a license key to activate.');
                return;
            }

            btnActivate.disabled = true;
            btnActivate.textContent = 'Activating...';

            const res = await InventoryControlApiService.activateLicense(inputKey);
            btnActivate.disabled = false;
            btnActivate.textContent = 'Activate License';

            if (licenseNotice) {
                licenseNotice.style.display = 'block';
                if (res.success) {
                    licenseNotice.style.color = '#10b981';
                    licenseNotice.textContent = '✓ License Activated Successfully! All Business Enterprise features unlocked.';
                } else {
                    licenseNotice.style.color = '#ef4444';
                    licenseNotice.textContent = res.message;
                }
            }

            initLicenseAndRegistrationUI();
        });
    }

    // Refresh License Button
    const btnRefresh = document.getElementById('bizBtnRefreshLicense');
    if (btnRefresh) {
        btnRefresh.addEventListener('click', async () => {
            btnRefresh.disabled = true;
            btnRefresh.textContent = 'Checking...';

            await InventoryControlApiService.validateLicense();
            await InventoryControlApiService.sendHeartbeat();
            await InventoryControlApiService.flushEventQueue();

            btnRefresh.disabled = false;
            btnRefresh.textContent = 'Refresh Status';

            initLicenseAndRegistrationUI();
            alert('License status and server synchronization refreshed.');
        });
    }

    // Save Store Profile in Settings Tab
    const saveStoreBtn = document.getElementById('bizSaveStoreProfileBtn');
    const storeMsg = document.getElementById('bizStoreProfileStatusMsg');
    if (saveStoreBtn) {
        saveStoreBtn.addEventListener('click', async () => {
            const store_name = document.getElementById('bizStoreName')?.value.trim();
            const owner_name = document.getElementById('bizOwnerName')?.value.trim();
            const mobile = document.getElementById('bizStoreMobile')?.value.trim();
            const email = document.getElementById('bizStoreEmail')?.value.trim();
            const address = document.getElementById('bizStoreAddress')?.value.trim();
            const city = document.getElementById('bizStoreCity')?.value.trim();
            const state = document.getElementById('bizStoreState')?.value.trim();
            const pincode = document.getElementById('bizStorePincode')?.value.trim();
            const gstin = document.getElementById('bizStoreGstin')?.value.trim();

            if (!store_name || !mobile || !address) {
                alert('Please complete all required fields (*): Store Name, Mobile Number, Address.');
                return;
            }

            saveStoreBtn.disabled = true;
            saveStoreBtn.textContent = 'Saving...';

            const profileData = { store_name, owner_name, mobile, email, address, city, state, pincode, gstin };
            const res = await InventoryControlApiService.submitStoreProfile(profileData);

            saveStoreBtn.disabled = false;
            saveStoreBtn.textContent = 'Save & Sync Store Profile';

            if (storeMsg) {
                storeMsg.textContent = res.success ? '✓ Store Profile Synced' : '✓ Saved Locally (Pending Sync)';
            }

            initLicenseAndRegistrationUI();
        });
    }

    // ----------------------------------------------------
    // 11. INTERACTIVE LIVE API ENDPOINT TESTER
    // ----------------------------------------------------
    const apiTestPresets = {
        'register': {
            endpoint: '/installations/register',
            payload: {
                installation_id: 'INST-DEMO-7788',
                device_id: 'DEV-TEST-001',
                product: 'RS_INVENTORY',
                edition: 'BUSINESS',
                app_version: '1.0.0',
                os_name: 'Windows',
                os_version: '11.0 Pro',
                installation_source: 'Website',
                installed_at: new Date().toISOString()
            }
        },
        'store-profile': {
            endpoint: '/installations/store-profile',
            payload: {
                installation_id: 'INST-DEMO-7788',
                store_name: 'Apex Mega Supermarket',
                owner_name: 'Rajesh Kumar',
                mobile: '+91 98765 43210',
                email: 'rajesh@apexsupermart.com',
                address: 'Plot 104, Trade Center, Sector 18',
                city: 'Noida',
                state: 'Uttar Pradesh',
                pincode: '201301',
                gstin: '09AAACA12341Z5'
            }
        },
        'activate': {
            endpoint: '/licenses/activate',
            payload: {
                installation_id: 'INST-DEMO-7788',
                device_id: 'DEV-TEST-001',
                license_key: 'RS-BIZ-ENTERPRISE-2026',
                app_version: '1.0.0'
            }
        },
        'validate': {
            endpoint: '/licenses/validate',
            payload: {
                installation_id: 'INST-DEMO-7788',
                device_id: 'DEV-TEST-001',
                license_key: 'RS-BIZ-ENTERPRISE-2026'
            }
        },
        'heartbeat': {
            endpoint: '/installations/heartbeat',
            payload: {
                installation_id: 'INST-DEMO-7788',
                device_id: 'DEV-TEST-001',
                app_version: '1.0.1',
                os_name: 'Windows',
                os_version: '11.0 Pro'
            }
        }
    };

    let activeTestKey = 'register';

    function updateGeneratedCurlCommand() {
        const preset = apiTestPresets[activeTestKey] || apiTestPresets['register'];
        const inputEl = document.getElementById('apiTestPayloadInput');
        const curlEl = document.getElementById('apiTestCurlOutput');
        
        let rawBody = inputEl ? inputEl.value : JSON.stringify(preset.payload, null, 2);

        const fullUrl = `${API_CONFIG.getBaseUrl()}${preset.endpoint}`;
        const curlCmd = `curl -X POST "${fullUrl}" \\\n  -H "Content-Type: application/json" \\\n  -H "Accept: application/json" \\\n  -d '${rawBody.replace(/'/g, "'\\''")}'`;

        if (curlEl) curlEl.textContent = curlCmd;
    }

    function loadApiTestPreset(key) {
        activeTestKey = key;
        const preset = apiTestPresets[key] || apiTestPresets['register'];
        const urlEl = document.getElementById('apiTestEndpointUrl');
        const inputEl = document.getElementById('apiTestPayloadInput');

        if (urlEl) urlEl.textContent = `${API_CONFIG.getBaseUrl()}${preset.endpoint}`;
        if (inputEl) inputEl.value = JSON.stringify(preset.payload, null, 2);

        // Highlight active preset button
        document.querySelectorAll('.api-test-btn').forEach(btn => {
            if (btn.getAttribute('data-endpoint') === key) {
                btn.style.background = 'var(--biz-blue-soft)';
                btn.style.borderColor = 'var(--biz-blue)';
                btn.style.color = 'var(--biz-blue)';
            } else {
                btn.style.background = '#ffffff';
                btn.style.borderColor = 'var(--biz-line)';
                btn.style.color = 'var(--biz-muted)';
            }
        });

        updateGeneratedCurlCommand();
    }

    const payloadInputEl = document.getElementById('apiTestPayloadInput');
    if (payloadInputEl) {
        payloadInputEl.addEventListener('input', () => updateGeneratedCurlCommand());
    }

    const copyCurlBtn = document.getElementById('apiCopyCurlBtn');
    if (copyCurlBtn) {
        copyCurlBtn.addEventListener('click', () => {
            const curlEl = document.getElementById('apiTestCurlOutput');
            if (curlEl && curlEl.textContent) {
                navigator.clipboard.writeText(curlEl.textContent);
                copyCurlBtn.textContent = '✓ Copied!';
                setTimeout(() => { copyCurlBtn.textContent = '📋 Copy cURL'; }, 2000);
            }
        });
    }

    // Attach click handlers to API test buttons
    document.querySelectorAll('.api-test-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const key = btn.getAttribute('data-endpoint');
            loadApiTestPreset(key);
        });
    });

    // Execute Live API Request
    const sendApiTestBtn = document.getElementById('apiTestSendBtn');
    if (sendApiTestBtn) {
        sendApiTestBtn.addEventListener('click', async () => {
            const preset = apiTestPresets[activeTestKey] || apiTestPresets['register'];
            const inputEl = document.getElementById('apiTestPayloadInput');
            const outputEl = document.getElementById('apiTestResponseOutput');
            const statusEl = document.getElementById('apiTestStatusCode');
            const timeEl = document.getElementById('apiTestResponseTime');

            let bodyData = {};
            try {
                bodyData = JSON.parse(inputEl.value);
            } catch (err) {
                if (outputEl) outputEl.textContent = '❌ Invalid JSON format in request body input!';
                if (statusEl) { statusEl.textContent = 'JSON Error'; statusEl.className = 'status-tag low-stock'; }
                return;
            }

            sendApiTestBtn.disabled = true;
            sendApiTestBtn.textContent = 'Sending Request...';
            if (outputEl) outputEl.textContent = 'Executing HTTP request to Laravel API backend...';

            const startTime = performance.now();
            const result = await InventoryControlApiService.request(preset.endpoint, {
                method: 'POST',
                body: JSON.stringify(bodyData)
            });
            const duration = Math.round(performance.now() - startTime);

            sendApiTestBtn.disabled = false;
            sendApiTestBtn.textContent = '⚡ Send API Request Now';

            if (timeEl) timeEl.textContent = `${duration} ms`;

            if (statusEl) {
                statusEl.textContent = `HTTP ${result.status || 0} ${result.success ? 'OK' : 'Error'}`;
                statusEl.className = result.success ? 'status-tag in-stock' : 'status-tag low-stock';
            }

            if (outputEl) {
                const responseObj = result.data || { success: result.success, message: result.message };
                outputEl.textContent = JSON.stringify(responseObj, null, 2);
            }

            initLicenseAndRegistrationUI();
        });
    }

    // Initialize default API test preset
    loadApiTestPreset('register');

    // Startup Sequence Execution
    (async function runStartupSequence() {
        // Step 1: Register installation
        await InventoryControlApiService.registerInstallation();
        // Step 2: Flush pending queue items
        await InventoryControlApiService.flushEventQueue();
        // Step 3: Send Heartbeat
        await InventoryControlApiService.sendHeartbeat();
        // Step 4: Bind UI
        initLicenseAndRegistrationUI();
    })();

    // Initial renders
    updateDashboardKPIs();
    renderPOSProducts();
    updateCustomerLoyaltyUI();
    renderCart();
    renderCatalogTable();
});
