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

    // Initial renders
    updateDashboardKPIs();
    renderPOSProducts();
    updateCustomerLoyaltyUI();
    renderCart();
    renderCatalogTable();
});
