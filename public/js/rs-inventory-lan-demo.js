/**
 * RS Inventory – LAN Multi-Terminal Interactive Demo Sandbox
 * Simulated Multi-Computer Retail Demonstration with Networked Coupons & Loyalty Wallet
 */
document.addEventListener('DOMContentLoaded', () => {
    // ----------------------------------------------------
    // 1. SHARED MULTI-TERMINAL STORE STATE (SIMULATED)
    // ----------------------------------------------------
    const sharedInventory = {
        'item-1': { name: 'Cotton Crew T-Shirt (M)', sku: 'APP-102', price: 499, stock: 45, category: 'Apparel' },
        'item-2': { name: 'Casual Denim Shirt (L)', sku: 'APP-105', price: 1199, stock: 6, category: 'Apparel' },
        'item-3': { name: 'Organic Honey (500g)', sku: 'GRO-304', price: 285, stock: 28, category: 'Groceries' },
        'item-4': { name: 'Basmati Rice Premium (5kg)', sku: 'GRO-308', price: 520, stock: 4, category: 'Groceries' },
        'item-5': { name: 'Wireless Earbuds BT v5.2', sku: 'ELE-412', price: 1499, stock: 3, category: 'Electronics' },
        'item-6': { name: 'Fast Charging Cable USB-C', sku: 'ELE-419', price: 249, stock: 62, category: 'Electronics' }
    };

    // Central Host Customer Loyalty Database
    const lanCustomers = {
        'walkin': { name: 'Walk-in Customer', phone: '-', tier: 'Regular', points: 0, spent: 0, lastTerminal: 'None' },
        'rajesh': { name: 'Rajesh Kumar', phone: '+91 98765 43210', tier: 'Gold', points: 184, spent: 18400, lastTerminal: 'COUNTER-1' },
        'anita': { name: 'Anita Sharma', phone: '+91 98111 22334', tier: 'Silver', points: 75, spent: 7500, lastTerminal: 'COUNTER-2' },
        'pooja': { name: 'Pooja Verma', phone: '+91 99223 34455', tier: 'Platinum', points: 420, spent: 42000, lastTerminal: 'COUNTER-1' },
        'vikram': { name: 'Vikram Singh', phone: '+91 97334 55667', tier: 'Silver', points: 50, spent: 5000, lastTerminal: 'COUNTER-2' }
    };

    // Central Host Promotional Coupons Directory
    const lanCoupons = {
        'SAVE10': { type: 'percent', val: 10, minOrder: 500, desc: '10% Store-wide Off' },
        'LAN150': { type: 'flat', val: 150, minOrder: 1000, desc: 'Flat ₹150 Off' },
        'STORE50': { type: 'flat', val: 50, minOrder: 300, desc: 'Flat ₹50 Off' }
    };

    let totalStoreRevenue = 42850.00;
    let counter1Revenue = 26400.00;
    let counter2Revenue = 16450.00;
    let totalInvoicesCount = 58;

    // Terminal Carts & Active Sessions
    const cartC1 = [{ id: 'item-1', name: 'Cotton Crew T-Shirt (M)', price: 499, qty: 1 }];
    const cartC2 = [{ id: 'item-6', name: 'Fast Charging Cable USB-C', price: 249, qty: 2 }];

    const c1Session = {
        customerKey: 'rajesh',
        appliedCoupon: null,
        loyaltyRedeemed: false,
        pointsToRedeem: 100
    };

    const c2Session = {
        customerKey: 'anita',
        appliedCoupon: null,
        loyaltyRedeemed: false,
        pointsToRedeem: 50
    };

    // ----------------------------------------------------
    // 2. TAB NAVIGATION SWITCHER
    // ----------------------------------------------------
    const lanTabBtns = document.querySelectorAll('.lan-tab-btn');
    const lanPanels = document.querySelectorAll('.lan-panel');

    lanTabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.getAttribute('data-tab');

            lanTabBtns.forEach(b => b.classList.remove('active'));
            lanPanels.forEach(p => p.classList.remove('active'));

            btn.classList.add('active');
            const activePanel = document.getElementById(target);
            if (activePanel) activePanel.classList.add('active');
        });
    });

    // ----------------------------------------------------
    // 3. RENDER CENTRAL SHARED PRODUCT CATALOG
    // ----------------------------------------------------
    function renderSharedCatalog() {
        const catalogBody = document.getElementById('lanSharedCatalogBody');
        if (!catalogBody) return;

        catalogBody.innerHTML = '';
        Object.keys(sharedInventory).forEach(key => {
            const item = sharedInventory[key];
            const tr = document.createElement('tr');
            
            let statusTag = '<span class="status-tag in-stock">In Stock</span>';
            if (item.stock <= 0) {
                statusTag = '<span class="status-tag out-of-stock">Out of Stock</span>';
            } else if (item.stock <= 5) {
                statusTag = '<span class="status-tag low-stock">Low Stock</span>';
            }

            tr.innerHTML = `
                <td><strong>${item.name}</strong><br><span style="font-size:11px; color:#64748b;">SKU: ${item.sku}</span></td>
                <td>${item.category}</td>
                <td>₹${item.price.toFixed(2)}</td>
                <td><strong>${item.stock} units</strong></td>
                <td>${statusTag}</td>
            `;
            catalogBody.appendChild(tr);
        });

        // Update product card stock text in counters
        document.querySelectorAll('.lan-pos-item').forEach(card => {
            const id = card.getAttribute('data-id');
            if (sharedInventory[id]) {
                const stockSpan = card.querySelector('.lan-stock-label');
                if (stockSpan) stockSpan.textContent = `${sharedInventory[id].stock} left`;
            }
        });
    }

    // ----------------------------------------------------
    // 4. RENDER CENTRAL CUSTOMER LOYALTY WALLET REGISTRY (TAB 5)
    // ----------------------------------------------------
    function renderCustomerWalletTable() {
        const tbody = document.getElementById('lanHostCustomerWalletBody');
        if (!tbody) return;

        tbody.innerHTML = '';
        Object.keys(lanCustomers).forEach(key => {
            if (key === 'walkin') return;
            const cust = lanCustomers[key];
            const tr = document.createElement('tr');

            let tierClass = 'silver';
            if (cust.tier === 'Gold') tierClass = 'gold';
            if (cust.tier === 'Platinum') tierClass = 'platinum';

            tr.innerHTML = `
                <td><strong>${cust.name}</strong></td>
                <td>${cust.phone}</td>
                <td><span class="lan-tier-badge ${tierClass}">${cust.tier} Tier</span></td>
                <td><strong style="color:var(--lan-blue);">${cust.points} pts</strong></td>
                <td>₹${cust.points.toFixed(2)}</td>
                <td><span class="lan-sync-pill">${cust.lastTerminal}</span></td>
            `;
            tbody.appendChild(tr);
        });
    }

    // Refresh customer selects in both counters
    function refreshCustomerDropdowns() {
        const c1Select = document.getElementById('c1CustomerSelect');
        const c2Select = document.getElementById('c2CustomerSelect');

        [ { el: c1Select, activeKey: c1Session.customerKey }, { el: c2Select, activeKey: c2Session.customerKey } ].forEach(({ el, activeKey }) => {
            if (!el) return;
            el.innerHTML = '';
            Object.keys(lanCustomers).forEach(key => {
                const cust = lanCustomers[key];
                const opt = document.createElement('option');
                opt.value = key;
                opt.selected = (key === activeKey);
                if (key === 'walkin') {
                    opt.textContent = 'Walk-in Customer (Regular • 0 pts)';
                } else {
                    opt.textContent = `${cust.name} (${cust.tier} • ${cust.points} pts)`;
                }
                el.appendChild(opt);
            });
        });
    }

    // Update loyalty box for a terminal
    function updateTerminalLoyaltyBox(terminalPrefix, session) {
        const box = document.getElementById(`${terminalPrefix}LoyaltyBox`);
        const badge = document.getElementById(`${terminalPrefix}CustomerTierBadge`);
        const ptsEl = document.getElementById(`${terminalPrefix}WalletPts`);
        const btn = document.getElementById(`${terminalPrefix}RedeemBtn`);

        if (!box) return;
        const cust = lanCustomers[session.customerKey];
        if (!cust || session.customerKey === 'walkin') {
            box.style.opacity = '0.4';
            box.style.pointerEvents = 'none';
            if (badge) { badge.textContent = 'Regular'; badge.className = 'lan-tier-badge silver'; }
            if (ptsEl) ptsEl.textContent = '0 pts';
            if (btn) btn.disabled = true;
            session.loyaltyRedeemed = false;
            return;
        }

        box.style.opacity = '1';
        box.style.pointerEvents = 'auto';

        let tierClass = 'silver';
        if (cust.tier === 'Gold') tierClass = 'gold';
        if (cust.tier === 'Platinum') tierClass = 'platinum';

        if (badge) {
            badge.textContent = `${cust.tier} Tier`;
            badge.className = `lan-tier-badge ${tierClass}`;
        }
        if (ptsEl) ptsEl.textContent = `${cust.points} pts`;

        const redeemable = Math.min(cust.points, session.pointsToRedeem);
        if (btn) {
            btn.disabled = redeemable <= 0;
            if (session.loyaltyRedeemed) {
                btn.textContent = `Remove Points (-₹${redeemable})`;
                btn.classList.add('active');
            } else {
                btn.textContent = `Redeem ${redeemable} Pts`;
                btn.classList.remove('active');
            }
        }
    }

    // ----------------------------------------------------
    // 5. COUNTER 1 (MAIN BILLING POS)
    // ----------------------------------------------------
    function renderCartC1() {
        const container = document.getElementById('c1CartList');
        const emptyMsg = document.getElementById('c1EmptyMsg');
        const subtotalEl = document.getElementById('c1Subtotal');
        const couponRow = document.getElementById('c1CouponRow');
        const couponDiscountEl = document.getElementById('c1CouponDiscount');
        const loyaltyRow = document.getElementById('c1LoyaltyRow');
        const loyaltyDiscountEl = document.getElementById('c1LoyaltyDiscount');
        const taxEl = document.getElementById('c1Tax');
        const totalEl = document.getElementById('c1Total');
        const checkoutBtn = document.getElementById('c1CheckoutBtn');

        if (!container) return;
        container.innerHTML = '';

        if (cartC1.length === 0) {
            if (emptyMsg) emptyMsg.style.display = 'block';
        } else {
            if (emptyMsg) emptyMsg.style.display = 'none';
            cartC1.forEach(item => {
                const row = document.createElement('div');
                row.className = 'pos-cart-row';
                row.innerHTML = `
                    <div class="pos-cart-info">
                        <div class="pos-cart-title">${item.name}</div>
                        <div class="pos-cart-rate">₹${item.price.toFixed(2)} × ${item.qty}</div>
                    </div>
                    <div class="pos-cart-qty-ctrls">
                        <button type="button" class="qty-btn dec-c1" data-id="${item.id}">-</button>
                        <span style="font-weight:700; min-width:18px; text-align:center;">${item.qty}</span>
                        <button type="button" class="qty-btn inc-c1" data-id="${item.id}">+</button>
                    </div>
                    <div class="pos-cart-subtotal">₹${(item.price * item.qty).toFixed(2)}</div>
                `;

                row.querySelector('.dec-c1').addEventListener('click', () => {
                    item.qty -= 1;
                    if (item.qty <= 0) {
                        const idx = cartC1.indexOf(item);
                        cartC1.splice(idx, 1);
                    }
                    renderCartC1();
                });

                row.querySelector('.inc-c1').addEventListener('click', () => {
                    item.qty += 1;
                    renderCartC1();
                });

                container.appendChild(row);
            });
        }

        const subtotal = cartC1.reduce((acc, i) => acc + (i.price * i.qty), 0);
        let couponDiscount = 0;
        if (c1Session.appliedCoupon) {
            if (subtotal >= c1Session.appliedCoupon.minOrder) {
                if (c1Session.appliedCoupon.type === 'percent') {
                    couponDiscount = subtotal * (c1Session.appliedCoupon.val / 100);
                } else {
                    couponDiscount = Math.min(subtotal, c1Session.appliedCoupon.val);
                }
            } else {
                c1Session.appliedCoupon = null;
                const statusEl = document.getElementById('c1CouponStatus');
                if (statusEl) {
                    statusEl.textContent = 'Coupon removed: Cart below min order requirement';
                    statusEl.style.color = '#dc2626';
                    statusEl.style.display = 'block';
                }
            }
        }

        let loyaltyDiscount = 0;
        const cust = lanCustomers[c1Session.customerKey];
        if (c1Session.loyaltyRedeemed && cust && cust.points > 0) {
            const maxPts = Math.min(cust.points, c1Session.pointsToRedeem);
            loyaltyDiscount = Math.min(Math.max(0, subtotal - couponDiscount), maxPts);
        }

        const taxable = Math.max(0, subtotal - couponDiscount - loyaltyDiscount);
        const tax = taxable * 0.05;
        const total = taxable + tax;

        if (subtotalEl) subtotalEl.textContent = '₹' + subtotal.toFixed(2);
        
        if (couponRow && couponDiscountEl) {
            if (couponDiscount > 0) {
                couponRow.style.display = 'flex';
                couponDiscountEl.textContent = '-₹' + couponDiscount.toFixed(2);
            } else {
                couponRow.style.display = 'none';
            }
        }

        if (loyaltyRow && loyaltyDiscountEl) {
            if (loyaltyDiscount > 0) {
                loyaltyRow.style.display = 'flex';
                loyaltyDiscountEl.textContent = '-₹' + loyaltyDiscount.toFixed(2);
            } else {
                loyaltyRow.style.display = 'none';
            }
        }

        if (taxEl) taxEl.textContent = '₹' + tax.toFixed(2);
        if (totalEl) totalEl.textContent = '₹' + total.toFixed(2);

        if (checkoutBtn) {
            checkoutBtn.disabled = cartC1.length === 0;
            checkoutBtn.textContent = cartC1.length === 0 
                ? 'Add Items to Bill' 
                : `Submit Bill to Central Host (₹${total.toFixed(2)})`;
        }

        updateTerminalLoyaltyBox('c1', c1Session);
    }

    // ----------------------------------------------------
    // 6. COUNTER 2 (EXPRESS BILLING POS)
    // ----------------------------------------------------
    function renderCartC2() {
        const container = document.getElementById('c2CartList');
        const emptyMsg = document.getElementById('c2EmptyMsg');
        const subtotalEl = document.getElementById('c2Subtotal');
        const couponRow = document.getElementById('c2CouponRow');
        const couponDiscountEl = document.getElementById('c2CouponDiscount');
        const loyaltyRow = document.getElementById('c2LoyaltyRow');
        const loyaltyDiscountEl = document.getElementById('c2LoyaltyDiscount');
        const taxEl = document.getElementById('c2Tax');
        const totalEl = document.getElementById('c2Total');
        const checkoutBtn = document.getElementById('c2CheckoutBtn');

        if (!container) return;
        container.innerHTML = '';

        if (cartC2.length === 0) {
            if (emptyMsg) emptyMsg.style.display = 'block';
        } else {
            if (emptyMsg) emptyMsg.style.display = 'none';
            cartC2.forEach(item => {
                const row = document.createElement('div');
                row.className = 'pos-cart-row';
                row.innerHTML = `
                    <div class="pos-cart-info">
                        <div class="pos-cart-title">${item.name}</div>
                        <div class="pos-cart-rate">₹${item.price.toFixed(2)} × ${item.qty}</div>
                    </div>
                    <div class="pos-cart-qty-ctrls">
                        <button type="button" class="qty-btn dec-c2" data-id="${item.id}">-</button>
                        <span style="font-weight:700; min-width:18px; text-align:center;">${item.qty}</span>
                        <button type="button" class="qty-btn inc-c2" data-id="${item.id}">+</button>
                    </div>
                    <div class="pos-cart-subtotal">₹${(item.price * item.qty).toFixed(2)}</div>
                `;

                row.querySelector('.dec-c2').addEventListener('click', () => {
                    item.qty -= 1;
                    if (item.qty <= 0) {
                        const idx = cartC2.indexOf(item);
                        cartC2.splice(idx, 1);
                    }
                    renderCartC2();
                });

                row.querySelector('.inc-c2').addEventListener('click', () => {
                    item.qty += 1;
                    renderCartC2();
                });

                container.appendChild(row);
            });
        }

        const subtotal = cartC2.reduce((acc, i) => acc + (i.price * i.qty), 0);
        let couponDiscount = 0;
        if (c2Session.appliedCoupon) {
            if (subtotal >= c2Session.appliedCoupon.minOrder) {
                if (c2Session.appliedCoupon.type === 'percent') {
                    couponDiscount = subtotal * (c2Session.appliedCoupon.val / 100);
                } else {
                    couponDiscount = Math.min(subtotal, c2Session.appliedCoupon.val);
                }
            } else {
                c2Session.appliedCoupon = null;
                const statusEl = document.getElementById('c2CouponStatus');
                if (statusEl) {
                    statusEl.textContent = 'Coupon removed: Cart below min order requirement';
                    statusEl.style.color = '#dc2626';
                    statusEl.style.display = 'block';
                }
            }
        }

        let loyaltyDiscount = 0;
        const cust = lanCustomers[c2Session.customerKey];
        if (c2Session.loyaltyRedeemed && cust && cust.points > 0) {
            const maxPts = Math.min(cust.points, c2Session.pointsToRedeem);
            loyaltyDiscount = Math.min(Math.max(0, subtotal - couponDiscount), maxPts);
        }

        const taxable = Math.max(0, subtotal - couponDiscount - loyaltyDiscount);
        const tax = taxable * 0.05;
        const total = taxable + tax;

        if (subtotalEl) subtotalEl.textContent = '₹' + subtotal.toFixed(2);

        if (couponRow && couponDiscountEl) {
            if (couponDiscount > 0) {
                couponRow.style.display = 'flex';
                couponDiscountEl.textContent = '-₹' + couponDiscount.toFixed(2);
            } else {
                couponRow.style.display = 'none';
            }
        }

        if (loyaltyRow && loyaltyDiscountEl) {
            if (loyaltyDiscount > 0) {
                loyaltyRow.style.display = 'flex';
                loyaltyDiscountEl.textContent = '-₹' + loyaltyDiscount.toFixed(2);
            } else {
                loyaltyRow.style.display = 'none';
            }
        }

        if (taxEl) taxEl.textContent = '₹' + tax.toFixed(2);
        if (totalEl) totalEl.textContent = '₹' + total.toFixed(2);

        if (checkoutBtn) {
            checkoutBtn.disabled = cartC2.length === 0;
            checkoutBtn.textContent = cartC2.length === 0 
                ? 'Add Items to Bill' 
                : `Submit Bill to Central Host (₹${total.toFixed(2)})`;
        }

        updateTerminalLoyaltyBox('c2', c2Session);
    }

    // Add items in Counter 1
    document.querySelectorAll('.add-to-c1').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');
            const product = sharedInventory[id];
            if (!product) return;

            const existing = cartC1.find(i => i.id === id);
            if (existing) {
                existing.qty += 1;
            } else {
                cartC1.push({ id, name: product.name, price: product.price, qty: 1 });
            }
            renderCartC1();
        });
    });

    // Add items in Counter 2
    document.querySelectorAll('.add-to-c2').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');
            const product = sharedInventory[id];
            if (!product) return;

            const existing = cartC2.find(i => i.id === id);
            if (existing) {
                existing.qty += 1;
            } else {
                cartC2.push({ id, name: product.name, price: product.price, qty: 1 });
            }
            renderCartC2();
        });
    });

    // Customer Selection Listeners
    const c1CustSelect = document.getElementById('c1CustomerSelect');
    if (c1CustSelect) {
        c1CustSelect.addEventListener('change', (e) => {
            c1Session.customerKey = e.target.value;
            c1Session.loyaltyRedeemed = false;
            renderCartC1();
        });
    }

    const c2CustSelect = document.getElementById('c2CustomerSelect');
    if (c2CustSelect) {
        c2CustSelect.addEventListener('change', (e) => {
            c2Session.customerKey = e.target.value;
            c2Session.loyaltyRedeemed = false;
            renderCartC2();
        });
    }

    // Loyalty Redeem Button Listeners
    const c1RedeemBtn = document.getElementById('c1RedeemBtn');
    if (c1RedeemBtn) {
        c1RedeemBtn.addEventListener('click', () => {
            c1Session.loyaltyRedeemed = !c1Session.loyaltyRedeemed;
            renderCartC1();
        });
    }

    const c2RedeemBtn = document.getElementById('c2RedeemBtn');
    if (c2RedeemBtn) {
        c2RedeemBtn.addEventListener('click', () => {
            c2Session.loyaltyRedeemed = !c2Session.loyaltyRedeemed;
            renderCartC2();
        });
    }

    // Coupon Engine Application Logic
    function handleCouponApply(prefix, session, renderFn, cart) {
        const input = document.getElementById(`${prefix}CouponInput`);
        const statusEl = document.getElementById(`${prefix}CouponStatus`);
        if (!input || !statusEl) return;

        const code = input.value.trim().toUpperCase();
        if (!code) {
            statusEl.textContent = 'Please enter a coupon code';
            statusEl.style.color = '#dc2626';
            statusEl.style.display = 'block';
            return;
        }

        const coupon = lanCoupons[code];
        if (!coupon) {
            statusEl.textContent = `Coupon "${code}" not recognized across LAN`;
            statusEl.style.color = '#dc2626';
            statusEl.style.display = 'block';
            return;
        }

        const subtotal = cart.reduce((acc, i) => acc + (i.price * i.qty), 0);
        if (subtotal < coupon.minOrder) {
            statusEl.textContent = `Coupon "${code}" requires minimum bill of ₹${coupon.minOrder.toFixed(2)}`;
            statusEl.style.color = '#dc2626';
            statusEl.style.display = 'block';
            return;
        }

        session.appliedCoupon = coupon;
        statusEl.textContent = `✓ Coupon "${code}" Applied: ${coupon.desc}`;
        statusEl.style.color = '#059669';
        statusEl.style.display = 'block';
        renderFn();
    }

    const c1ApplyBtn = document.getElementById('c1ApplyCouponBtn');
    if (c1ApplyBtn) {
        c1ApplyBtn.addEventListener('click', () => {
            handleCouponApply('c1', c1Session, renderCartC1, cartC1);
        });
    }

    const c2ApplyBtn = document.getElementById('c2ApplyCouponBtn');
    if (c2ApplyBtn) {
        c2ApplyBtn.addEventListener('click', () => {
            handleCouponApply('c2', c2Session, renderCartC2, cartC2);
        });
    }

    // Coupon Chips
    document.querySelectorAll('.lan-coupon-chip').forEach(chip => {
        chip.addEventListener('click', () => {
            const target = chip.getAttribute('data-target');
            const code = chip.getAttribute('data-code');
            const input = document.getElementById(`${target}CouponInput`);
            if (input) {
                input.value = code;
                if (target === 'c1') {
                    handleCouponApply('c1', c1Session, renderCartC1, cartC1);
                } else {
                    handleCouponApply('c2', c2Session, renderCartC2, cartC2);
                }
            }
        });
    });

    // ----------------------------------------------------
    // 7. SIMULATED MULTI-TERMINAL CHECKOUT & LIVE SYNC
    // ----------------------------------------------------
    function processSimulatedCheckout(terminalName, cart, isC1) {
        if (cart.length === 0) return;

        const session = isC1 ? c1Session : c2Session;
        const subtotal = cart.reduce((acc, i) => acc + (i.price * i.qty), 0);

        let couponDiscount = 0;
        if (session.appliedCoupon && subtotal >= session.appliedCoupon.minOrder) {
            couponDiscount = session.appliedCoupon.type === 'percent'
                ? subtotal * (session.appliedCoupon.val / 100)
                : Math.min(subtotal, session.appliedCoupon.val);
        }

        const cust = lanCustomers[session.customerKey];
        let loyaltyDiscount = 0;
        let pointsRedeemed = 0;

        if (session.loyaltyRedeemed && cust && cust.points > 0) {
            pointsRedeemed = Math.min(cust.points, session.pointsToRedeem);
            loyaltyDiscount = Math.min(Math.max(0, subtotal - couponDiscount), pointsRedeemed);
        }

        const taxable = Math.max(0, subtotal - couponDiscount - loyaltyDiscount);
        const tax = taxable * 0.05;
        const grandTotal = taxable + tax;
        const billNo = `INV-${terminalName}-${Math.floor(1000 + Math.random() * 9000)}`;

        // Deduct items from shared inventory
        cart.forEach(item => {
            if (sharedInventory[item.id]) {
                sharedInventory[item.id].stock = Math.max(0, sharedInventory[item.id].stock - item.qty);
            }
        });

        // Update customer wallet on Central Host
        let pointsEarned = 0;
        if (cust && session.customerKey !== 'walkin') {
            pointsEarned = Math.floor(subtotal * 0.05); // 5% points accrual
            cust.points = Math.max(0, cust.points - pointsRedeemed) + pointsEarned;
            cust.spent += grandTotal;
            cust.lastTerminal = terminalName;
        }

        // Update financial figures
        totalStoreRevenue += grandTotal;
        totalInvoicesCount += 1;
        if (isC1) {
            counter1Revenue += grandTotal;
        } else {
            counter2Revenue += grandTotal;
        }

        // Update Central Host UI
        const hostStoreRev = document.getElementById('hostStoreRev');
        const hostInvCount = document.getElementById('hostInvCount');
        const c1RevDisplay = document.getElementById('hostC1Rev');
        const c2RevDisplay = document.getElementById('hostC2Rev');
        const streamBox = document.getElementById('lanEventStream');

        if (hostStoreRev) hostStoreRev.textContent = `₹${totalStoreRevenue.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
        if (hostInvCount) hostInvCount.textContent = `${totalInvoicesCount} Invoices`;
        if (c1RevDisplay) c1RevDisplay.textContent = `₹${counter1Revenue.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
        if (c2RevDisplay) c2RevDisplay.textContent = `₹${counter2Revenue.toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;

        // Add event to live stream
        if (streamBox) {
            const now = new Date();
            const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            const itemDesc = cart.map(i => `${i.qty}x ${i.name}`).join(', ');

            let promoInfo = '';
            if (session.appliedCoupon) promoInfo += ` • Promo [${session.appliedCoupon.desc}]`;
            if (pointsRedeemed > 0) promoInfo += ` • Redeemed ${pointsRedeemed} pts`;
            if (pointsEarned > 0) promoInfo += ` • Earned +${pointsEarned} pts`;

            const custName = cust ? cust.name : 'Walk-in';

            const div = document.createElement('div');
            div.className = 'stream-item';
            div.innerHTML = `
                <div class="stream-left">
                    <span class="stream-terminal-pill ${isC1 ? 'c1' : 'c2'}">${terminalName}</span>
                    <div>
                        <strong>${billNo}</strong> (${custName}): ${itemDesc}${promoInfo}
                        <div style="font-size:11px; color:#64748b;">Recorded on Central Host • Sync Latency: 3ms • Points Replicated</div>
                    </div>
                </div>
                <div style="text-align:right;">
                    <div style="font-weight:800; color:var(--lan-navy);">₹${grandTotal.toFixed(2)}</div>
                    <div style="font-size:11px; color:#64748b;">${timeStr}</div>
                </div>
            `;
            streamBox.insertBefore(div, streamBox.firstChild);
        }

        // Display Receipt Modal
        const receiptModal = document.getElementById('lanReceiptModal');
        const rBill = document.getElementById('lanReceiptBillNo');
        const rTerminal = document.getElementById('lanReceiptTerminal');
        const rCustomer = document.getElementById('lanReceiptCustomer');
        const rItems = document.getElementById('lanReceiptItems');
        const rDiscountRow = document.getElementById('lanReceiptDiscountRow');
        const rDiscount = document.getElementById('lanReceiptDiscount');
        const rLoyaltyRow = document.getElementById('lanReceiptLoyaltyRow');
        const rLoyalty = document.getElementById('lanReceiptLoyalty');
        const rTotal = document.getElementById('lanReceiptTotal');
        const rWalletRow = document.getElementById('lanReceiptWalletRow');
        const rWalletBal = document.getElementById('lanReceiptWalletBal');

        if (rBill) rBill.textContent = billNo;
        if (rTerminal) rTerminal.textContent = `Counter Terminal: ${terminalName}`;
        if (rCustomer) {
            rCustomer.textContent = cust ? `Customer: ${cust.name} (${cust.tier} Tier)` : 'Customer: Walk-in';
        }
        if (rTotal) rTotal.textContent = `₹${grandTotal.toFixed(2)}`;

        if (rDiscountRow && rDiscount) {
            if (couponDiscount > 0) {
                rDiscountRow.style.display = 'flex';
                rDiscount.textContent = `-₹${couponDiscount.toFixed(2)}`;
            } else {
                rDiscountRow.style.display = 'none';
            }
        }

        if (rLoyaltyRow && rLoyalty) {
            if (loyaltyDiscount > 0) {
                rLoyaltyRow.style.display = 'flex';
                rLoyalty.textContent = `-₹${loyaltyDiscount.toFixed(2)} (${pointsRedeemed} pts)`;
            } else {
                rLoyaltyRow.style.display = 'none';
            }
        }

        if (rWalletRow && rWalletBal) {
            if (cust && session.customerKey !== 'walkin') {
                rWalletRow.style.display = 'flex';
                rWalletBal.textContent = `${cust.points} pts (Earned +${pointsEarned} pts on this purchase)`;
            } else {
                rWalletRow.style.display = 'none';
            }
        }

        if (rItems) {
            rItems.innerHTML = '';
            cart.forEach(i => {
                const rRow = document.createElement('div');
                rRow.className = 'receipt-row';
                rRow.innerHTML = `<span>${i.qty}x ${i.name}</span><span>₹${(i.price * i.qty).toFixed(2)}</span>`;
                rItems.appendChild(rRow);
            });
        }

        if (receiptModal) receiptModal.classList.add('active');

        // Reset current session state
        cart.length = 0;
        session.appliedCoupon = null;
        session.loyaltyRedeemed = false;
        const statusEl = document.getElementById(`${isC1 ? 'c1' : 'c2'}CouponStatus`);
        if (statusEl) statusEl.style.display = 'none';
        const inputEl = document.getElementById(`${isC1 ? 'c1' : 'c2'}CouponInput`);
        if (inputEl) inputEl.value = '';

        // Re-render and synchronize all terminals & central registry
        if (isC1) renderCartC1(); else renderCartC2();
        refreshCustomerDropdowns();
        renderCustomerWalletTable();
        renderSharedCatalog();
    }

    const c1CheckoutBtn = document.getElementById('c1CheckoutBtn');
    if (c1CheckoutBtn) {
        c1CheckoutBtn.addEventListener('click', () => {
            processSimulatedCheckout('COUNTER-1', cartC1, true);
        });
    }

    const c2CheckoutBtn = document.getElementById('c2CheckoutBtn');
    if (c2CheckoutBtn) {
        c2CheckoutBtn.addEventListener('click', () => {
            processSimulatedCheckout('COUNTER-2', cartC2, false);
        });
    }

    const closeReceiptBtn = document.getElementById('closeLanReceiptBtn');
    const receiptModal = document.getElementById('lanReceiptModal');
    if (closeReceiptBtn && receiptModal) {
        closeReceiptBtn.addEventListener('click', () => {
            receiptModal.classList.remove('active');
        });
        receiptModal.addEventListener('click', (e) => {
            if (e.target === receiptModal) receiptModal.classList.remove('active');
        });
    }

    // ----------------------------------------------------
    // 8. INITIALIZE DEMO STATE
    // ----------------------------------------------------
    refreshCustomerDropdowns();
    renderCartC1();
    renderCartC2();
    renderSharedCatalog();
    renderCustomerWalletTable();

    // ----------------------------------------------------
    // 9. FAQ ACCORDION
    // ----------------------------------------------------
    const faqItems = document.querySelectorAll('.lan-faq-item');
    faqItems.forEach(item => {
        const questionBtn = item.querySelector('.lan-faq-question');
        if (questionBtn) {
            questionBtn.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(other => {
                    if (other !== item) {
                        other.classList.remove('active');
                        const btn = other.querySelector('.lan-faq-question');
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
});
