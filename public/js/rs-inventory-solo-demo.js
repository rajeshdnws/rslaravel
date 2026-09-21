/**
 * RS Inventory – Solo Interactive Demo Sandbox & Page Interactions
 * Simulated Client-Side Retail Demonstration
 */
document.addEventListener('DOMContentLoaded', () => {
    // ----------------------------------------------------
    // 1. DEMO TAB SWITCHER
    // ----------------------------------------------------
    const tabButtons = document.querySelectorAll('.demo-tab-btn');
    const tabPanels = document.querySelectorAll('.demo-panel');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-tab');

            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanels.forEach(panel => panel.classList.remove('active'));

            button.classList.add('active');
            const activePanel = document.getElementById(targetTab);
            if (activePanel) {
                activePanel.classList.add('active');
            }
        });
    });

    // ----------------------------------------------------
    // 2. PRODUCT CATALOG LIVE SEARCH & CATEGORY FILTER
    // ----------------------------------------------------
    const productSearchInput = document.getElementById('catalogSearchInput');
    const categoryButtons = document.querySelectorAll('.category-pill-btn');
    const catalogRows = document.querySelectorAll('.catalog-item-row');

    let currentCategory = 'all';
    let currentSearchTerm = '';

    function filterCatalog() {
        catalogRows.forEach(row => {
            const rowCategory = (row.getAttribute('data-category') || '').toLowerCase();
            const rowText = row.textContent.toLowerCase();

            const matchesCategory = currentCategory === 'all' || rowCategory === currentCategory;
            const matchesSearch = currentSearchTerm === '' || rowText.includes(currentSearchTerm);

            if (matchesCategory && matchesSearch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    if (productSearchInput) {
        productSearchInput.addEventListener('input', (e) => {
            currentSearchTerm = e.target.value.toLowerCase().trim();
            filterCatalog();
        });
    }

    categoryButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            categoryButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentCategory = btn.getAttribute('data-category').toLowerCase();
            filterCatalog();
        });
    });

    // ----------------------------------------------------
    // ----------------------------------------------------
    // 3. POS BILLING TERMINAL SIMULATOR WITH LOYALTY & COUPONS
    // ----------------------------------------------------
    const posCart = [];
    const posCartContainer = document.getElementById('posCartContainer');
    const posEmptyCartMsg = document.getElementById('posEmptyCartMsg');
    const posSubtotalEl = document.getElementById('posSubtotal');
    const posTaxEl = document.getElementById('posTax');
    const posTotalEl = document.getElementById('posTotal');
    const posCheckoutBtn = document.getElementById('posCheckoutBtn');
    const posTenderBtns = document.querySelectorAll('.pos-tender-btn');
    const receiptModal = document.getElementById('demoReceiptModal');
    const closeReceiptBtn = document.getElementById('closeReceiptBtn');

    // Loyalty & Coupon elements
    const customerSelect = document.getElementById('soloCustomerSelect');
    const customerTierBadge = document.getElementById('soloCustomerTierBadge');
    const loyaltyPtsDisplay = document.getElementById('soloLoyaltyPtsDisplay');
    const loyaltyRedeemRow = document.getElementById('soloLoyaltyRedeemRow');
    const redeemToggleBtn = document.getElementById('soloRedeemToggleBtn');

    const couponInput = document.getElementById('soloCouponInput');
    const applyCouponBtn = document.getElementById('soloApplyCouponBtn');
    const couponStatus = document.getElementById('soloCouponStatus');
    const quickCouponChips = document.querySelectorAll('.solo-coupon-chip');

    const soloCouponRow = document.getElementById('soloCouponRow');
    const soloAppliedCouponCode = document.getElementById('soloAppliedCouponCode');
    const soloCouponDiscountVal = document.getElementById('soloCouponDiscountVal');

    const soloLoyaltyRow = document.getElementById('soloLoyaltyRow');
    const soloLoyaltyDiscountVal = document.getElementById('soloLoyaltyDiscountVal');

    const soloEarnedPointsRow = document.getElementById('soloEarnedPointsRow');
    const soloEarnedPointsCount = document.getElementById('soloEarnedPointsCount');

    let selectedTender = 'UPI / QR';

    // Store state for simulated customers & coupons
    const soloCustomers = {
        'rajesh': { name: 'Rajesh Kumar', tier: 'Gold', points: 184 },
        'anita': { name: 'Anita Sharma', tier: 'Silver', points: 96 },
        'pooja': { name: 'Pooja Verma', tier: 'Platinum', points: 327 },
        'vikram': { name: 'Vikram Singh', tier: 'Silver', points: 51 },
        'walkin': { name: 'Walk-in Customer', tier: 'none', points: 0 }
    };

    const soloCoupons = {
        'SAVE10': { code: 'SAVE10', type: 'percent', val: 10, minOrder: 500, label: '10% Off' },
        'FLAT100': { code: 'FLAT100', type: 'flat', val: 100, minOrder: 500, label: '₹100 Off' },
        'WELCOME50': { code: 'WELCOME50', type: 'flat', val: 50, minOrder: 200, label: '₹50 Off' }
    };

    let activeCustomerId = 'rajesh';
    let isLoyaltyRedeemed = false;
    let pointsToRedeem = 0;
    let appliedCoupon = null;

    // Handle Customer Selection
    if (customerSelect) {
        customerSelect.addEventListener('change', () => {
            activeCustomerId = customerSelect.value;
            const cust = soloCustomers[activeCustomerId] || soloCustomers['walkin'];
            isLoyaltyRedeemed = false;

            if (customerTierBadge) {
                customerTierBadge.className = 'solo-tier-badge ' + (cust.tier === 'none' ? 'silver' : cust.tier.toLowerCase());
                customerTierBadge.textContent = cust.tier === 'none' ? 'No Tier' : cust.tier + ' Member';
            }

            if (loyaltyPtsDisplay) {
                loyaltyPtsDisplay.textContent = cust.points + ' pts';
            }

            if (loyaltyRedeemRow) {
                loyaltyRedeemRow.style.display = cust.points > 0 ? 'flex' : 'none';
            }

            if (redeemToggleBtn) {
                const redeemable = Math.min(cust.points, 100);
                redeemToggleBtn.textContent = `Redeem ${redeemable} Pts (-₹${redeemable})`;
                redeemToggleBtn.style.background = '#ea580c';
            }

            updatePosTotals();
        });
    }

    // Handle Loyalty Points Redeem Toggle
    if (redeemToggleBtn) {
        redeemToggleBtn.addEventListener('click', () => {
            const cust = soloCustomers[activeCustomerId];
            if (!cust || cust.points <= 0) return;

            const redeemable = Math.min(cust.points, 100);

            if (!isLoyaltyRedeemed) {
                isLoyaltyRedeemed = true;
                pointsToRedeem = redeemable;
                redeemToggleBtn.textContent = `Cancel Redemption (-₹${redeemable})`;
                redeemToggleBtn.style.background = '#b91c1c';
            } else {
                isLoyaltyRedeemed = false;
                pointsToRedeem = 0;
                redeemToggleBtn.textContent = `Redeem ${redeemable} Pts (-₹${redeemable})`;
                redeemToggleBtn.style.background = '#ea580c';
            }
            updatePosTotals();
        });
    }

    // Handle Coupon Input & Apply
    function applyCouponCode(rawCode) {
        const code = rawCode.trim().toUpperCase();
        if (!code) return;

        const subtotal = posCart.reduce((acc, item) => acc + (item.price * item.qty), 0);
        const coupon = soloCoupons[code];

        if (!coupon) {
            if (couponStatus) {
                couponStatus.style.display = 'block';
                couponStatus.style.color = '#dc2626';
                couponStatus.textContent = `Invalid coupon code "${code}". Try SAVE10 or FLAT100.`;
            }
            return;
        }

        if (subtotal < coupon.minOrder) {
            if (couponStatus) {
                couponStatus.style.display = 'block';
                couponStatus.style.color = '#dc2626';
                couponStatus.textContent = `Coupon ${code} requires minimum cart of ₹${coupon.minOrder.toFixed(2)}. Current: ₹${subtotal.toFixed(2)}`;
            }
            return;
        }

        appliedCoupon = coupon;
        if (couponStatus) {
            couponStatus.style.display = 'block';
            couponStatus.style.color = '#047857';
            couponStatus.textContent = `Coupon ${coupon.code} applied successfully (${coupon.label})!`;
        }
        if (couponInput) couponInput.value = coupon.code;
        updatePosTotals();
    }

    if (applyCouponBtn && couponInput) {
        applyCouponBtn.addEventListener('click', () => {
            applyCouponCode(couponInput.value);
        });
        couponInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                applyCouponCode(couponInput.value);
            }
        });
    }

    quickCouponChips.forEach(chip => {
        chip.addEventListener('click', () => {
            const code = chip.getAttribute('data-code');
            applyCouponCode(code);
        });
    });

    // Handle tender selection
    posTenderBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            posTenderBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            selectedTender = btn.getAttribute('data-tender');
        });
    });

    // Add item to POS cart
    document.querySelectorAll('.pos-item-card').forEach(itemCard => {
        itemCard.addEventListener('click', () => {
            const id = itemCard.getAttribute('data-id');
            const name = itemCard.getAttribute('data-name');
            const price = parseFloat(itemCard.getAttribute('data-price')) || 0;
            const sku = itemCard.getAttribute('data-sku');

            const existing = posCart.find(i => i.id === id);
            if (existing) {
                existing.qty += 1;
            } else {
                posCart.push({ id, name, price, sku, qty: 1 });
            }

            renderPosCart();
        });
    });

    function updatePosTotals() {
        if (!posSubtotalEl || !posTotalEl) return;

        const subtotal = posCart.reduce((acc, item) => acc + (item.price * item.qty), 0);
        const tax = subtotal * 0.05; // 5% simulated GST

        // Coupon calculation
        let couponDiscount = 0.00;
        if (appliedCoupon && subtotal >= appliedCoupon.minOrder) {
            if (appliedCoupon.type === 'percent') {
                couponDiscount = (subtotal * appliedCoupon.val) / 100;
            } else if (appliedCoupon.type === 'flat') {
                couponDiscount = Math.min(appliedCoupon.val, subtotal);
            }
            if (soloCouponRow) {
                soloCouponRow.style.display = 'flex';
                if (soloAppliedCouponCode) soloAppliedCouponCode.textContent = appliedCoupon.code;
                if (soloCouponDiscountVal) soloCouponDiscountVal.textContent = '-₹' + couponDiscount.toFixed(2);
            }
        } else {
            if (appliedCoupon && subtotal < appliedCoupon.minOrder) {
                appliedCoupon = null;
                if (couponStatus) {
                    couponStatus.style.display = 'block';
                    couponStatus.style.color = '#dc2626';
                    couponStatus.textContent = 'Cart subtotal fell below coupon minimum.';
                }
            }
            if (soloCouponRow) soloCouponRow.style.display = 'none';
        }

        // Loyalty Points calculation
        let loyaltyDiscount = 0.00;
        const cust = soloCustomers[activeCustomerId];
        if (isLoyaltyRedeemed && cust && cust.points > 0) {
            pointsToRedeem = Math.min(cust.points, 100);
            loyaltyDiscount = pointsToRedeem * 1.00; // 1 point = ₹1
            const maxAllowable = Math.max(0, subtotal + tax - couponDiscount);
            if (loyaltyDiscount > maxAllowable) loyaltyDiscount = maxAllowable;

            if (soloLoyaltyRow) {
                soloLoyaltyRow.style.display = 'flex';
                if (soloLoyaltyDiscountVal) soloLoyaltyDiscountVal.textContent = `-₹${loyaltyDiscount.toFixed(2)} (${pointsToRedeem} pts)`;
            }
        } else {
            if (soloLoyaltyRow) soloLoyaltyRow.style.display = 'none';
        }

        const total = Math.max(0, subtotal + tax - couponDiscount - loyaltyDiscount);
        const pointsEarned = Math.floor(total / 100); // 1 pt per ₹100

        posSubtotalEl.textContent = '₹' + subtotal.toFixed(2);
        if (posTaxEl) posTaxEl.textContent = '₹' + tax.toFixed(2);
        posTotalEl.textContent = '₹' + total.toFixed(2);

        if (soloEarnedPointsRow && soloEarnedPointsCount) {
            if (cust && cust.tier !== 'none' && pointsEarned > 0) {
                soloEarnedPointsRow.style.display = 'flex';
                soloEarnedPointsCount.textContent = `+${pointsEarned}`;
            } else {
                soloEarnedPointsRow.style.display = 'none';
            }
        }

        if (posCheckoutBtn) {
            posCheckoutBtn.disabled = posCart.length === 0;
            posCheckoutBtn.textContent = posCart.length === 0 
                ? 'Add Items to Complete Bill' 
                : `Complete Simulated Sale (₹${total.toFixed(2)})`;
        }
    }

    function renderPosCart() {
        if (!posCartContainer) return;

        posCartContainer.innerHTML = '';

        if (posCart.length === 0) {
            if (posEmptyCartMsg) posEmptyCartMsg.style.display = 'block';
        } else {
            if (posEmptyCartMsg) posEmptyCartMsg.style.display = 'none';

            posCart.forEach(item => {
                const row = document.createElement('div');
                row.className = 'pos-cart-row';
                row.innerHTML = `
                    <div class="pos-cart-info">
                        <div class="pos-cart-title">${item.name}</div>
                        <div class="pos-cart-rate">₹${item.price.toFixed(2)} × ${item.qty}</div>
                    </div>
                    <div class="pos-cart-qty-ctrls">
                        <button type="button" class="qty-btn dec-btn" data-id="${item.id}">-</button>
                        <span style="font-weight:700; min-width:18px; text-align:center;">${item.qty}</span>
                        <button type="button" class="qty-btn inc-btn" data-id="${item.id}">+</button>
                    </div>
                    <div class="pos-cart-subtotal">₹${(item.price * item.qty).toFixed(2)}</div>
                `;

                // Events for + / -
                row.querySelector('.dec-btn').addEventListener('click', (e) => {
                    e.stopPropagation();
                    const target = posCart.find(i => i.id === item.id);
                    if (target) {
                        target.qty -= 1;
                        if (target.qty <= 0) {
                            const idx = posCart.indexOf(target);
                            posCart.splice(idx, 1);
                        }
                        renderPosCart();
                    }
                });

                row.querySelector('.inc-btn').addEventListener('click', (e) => {
                    e.stopPropagation();
                    const target = posCart.find(i => i.id === item.id);
                    if (target) {
                        target.qty += 1;
                        renderPosCart();
                    }
                });

                posCartContainer.appendChild(row);
            });
        }

        updatePosTotals();
    }

    // Checkout button - Show receipt modal & update customer wallet
    if (posCheckoutBtn) {
        posCheckoutBtn.addEventListener('click', () => {
            if (posCart.length === 0) return;

            const subtotal = posCart.reduce((acc, item) => acc + (item.price * item.qty), 0);
            const tax = subtotal * 0.05;
            
            let couponDiscount = 0.00;
            if (appliedCoupon && subtotal >= appliedCoupon.minOrder) {
                couponDiscount = appliedCoupon.type === 'percent' 
                    ? (subtotal * appliedCoupon.val) / 100 
                    : Math.min(appliedCoupon.val, subtotal);
            }

            let loyaltyDiscount = 0.00;
            const cust = soloCustomers[activeCustomerId];
            if (isLoyaltyRedeemed && cust && cust.points > 0) {
                loyaltyDiscount = pointsToRedeem * 1.00;
            }

            const grandTotal = Math.max(0, subtotal + tax - couponDiscount - loyaltyDiscount);
            const pointsEarned = Math.floor(grandTotal / 100);

            // Update Customer Wallet in memory
            let prevPoints = cust ? cust.points : 0;
            if (cust && cust.tier !== 'none') {
                if (isLoyaltyRedeemed) {
                    cust.points -= pointsToRedeem;
                }
                cust.points += pointsEarned;
                if (loyaltyPtsDisplay) loyaltyPtsDisplay.textContent = cust.points + ' pts';
            }

            // Populate receipt modal
            const receiptItemsList = document.getElementById('receiptItemsList');
            const receiptCustomerName = document.getElementById('receiptCustomerName');
            const receiptSubtotal = document.getElementById('receiptSubtotal');
            const receiptTax = document.getElementById('receiptTax');
            const receiptCouponRow = document.getElementById('receiptCouponRow');
            const receiptCouponCode = document.getElementById('receiptCouponCode');
            const receiptCouponDiscount = document.getElementById('receiptCouponDiscount');
            const receiptLoyaltyRow = document.getElementById('receiptLoyaltyRow');
            const receiptLoyaltyDiscount = document.getElementById('receiptLoyaltyDiscount');
            const receiptGrandTotal = document.getElementById('receiptGrandTotal');
            const receiptPaymentMethod = document.getElementById('receiptPaymentMethod');
            const receiptWalletStatusRow = document.getElementById('receiptWalletStatusRow');
            const receiptWalletBalance = document.getElementById('receiptWalletBalance');
            const receiptDateTime = document.getElementById('receiptDateTime');
            const receiptBillNo = document.getElementById('receiptBillNo');

            if (receiptCustomerName) {
                receiptCustomerName.textContent = cust.tier !== 'none' 
                    ? `${cust.name} (${cust.tier} Member)` 
                    : 'Walk-in Retail Customer';
            }

            if (receiptItemsList) {
                receiptItemsList.innerHTML = '';
                posCart.forEach(item => {
                    const row = document.createElement('div');
                    row.className = 'receipt-row';
                    row.innerHTML = `
                        <span>${item.qty}x ${item.name}</span>
                        <span>₹${(item.price * item.qty).toFixed(2)}</span>
                    `;
                    receiptItemsList.appendChild(row);
                });
            }

            if (receiptSubtotal) receiptSubtotal.textContent = '₹' + subtotal.toFixed(2);
            if (receiptTax) receiptTax.textContent = '₹' + tax.toFixed(2);

            if (receiptCouponRow) {
                if (couponDiscount > 0 && appliedCoupon) {
                    receiptCouponRow.style.display = 'flex';
                    if (receiptCouponCode) receiptCouponCode.textContent = appliedCoupon.code;
                    if (receiptCouponDiscount) receiptCouponDiscount.textContent = '-₹' + couponDiscount.toFixed(2);
                } else {
                    receiptCouponRow.style.display = 'none';
                }
            }

            if (receiptLoyaltyRow) {
                if (loyaltyDiscount > 0) {
                    receiptLoyaltyRow.style.display = 'flex';
                    if (receiptLoyaltyDiscount) receiptLoyaltyDiscount.textContent = `-₹${loyaltyDiscount.toFixed(2)} (${pointsToRedeem} pts)`;
                } else {
                    receiptLoyaltyRow.style.display = 'none';
                }
            }

            if (receiptGrandTotal) receiptGrandTotal.textContent = '₹' + grandTotal.toFixed(2);
            if (receiptPaymentMethod) receiptPaymentMethod.textContent = selectedTender;
            if (receiptBillNo) receiptBillNo.textContent = 'INV-' + Math.floor(100000 + Math.random() * 900000);
            if (receiptDateTime) {
                const now = new Date();
                receiptDateTime.textContent = now.toLocaleDateString() + ' ' + now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            }

            if (receiptWalletStatusRow && receiptWalletBalance) {
                if (cust && cust.tier !== 'none') {
                    receiptWalletStatusRow.style.display = 'flex';
                    receiptWalletBalance.textContent = `+${pointsEarned} pts earned | Wallet Balance: ${cust.points} pts`;
                } else {
                    receiptWalletStatusRow.style.display = 'none';
                }
            }

            if (receiptModal) {
                receiptModal.classList.add('active');
            }
        });
    }

    if (closeReceiptBtn && receiptModal) {
        closeReceiptBtn.addEventListener('click', () => {
            receiptModal.classList.remove('active');
            // Reset simulated cart after successful simulation
            posCart.length = 0;
            isLoyaltyRedeemed = false;
            pointsToRedeem = 0;
            appliedCoupon = null;
            if (couponStatus) couponStatus.style.display = 'none';
            if (couponInput) couponInput.value = '';
            if (redeemToggleBtn) {
                const cust = soloCustomers[activeCustomerId];
                const redeemable = Math.min(cust ? cust.points : 0, 100);
                redeemToggleBtn.textContent = `Redeem ${redeemable} Pts (-₹${redeemable})`;
                redeemToggleBtn.style.background = '#ea580c';
            }
            renderPosCart();
        });
    }

    if (receiptModal) {
        receiptModal.addEventListener('click', (e) => {
            if (e.target === receiptModal) {
                receiptModal.classList.remove('active');
            }
        });
    }

    // Initialize initial default sample cart item for preview delight
    posCart.push({ id: 'item-1', name: 'Cotton Crew T-Shirt (M)', price: 499.00, sku: 'APP-102', qty: 2 });
    posCart.push({ id: 'item-3', name: 'Organic Honey (500g)', price: 285.00, sku: 'GRO-304', qty: 1 });
    renderPosCart();

    // ----------------------------------------------------
    // 4. FAQ ACCORDION
    // ----------------------------------------------------
    const faqItems = document.querySelectorAll('.solo-faq-item');

    faqItems.forEach(item => {
        const questionBtn = item.querySelector('.solo-faq-question');
        if (questionBtn) {
            questionBtn.addEventListener('click', () => {
                const isActive = item.classList.contains('active');

                // Close other items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        const otherBtn = otherItem.querySelector('.solo-faq-question');
                        if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                    }
                });

                // Toggle current item
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

    // Smooth scrolling for anchor buttons
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
});
