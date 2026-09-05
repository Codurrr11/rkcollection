/**
 * RK COLLECTION — CART INTERACTION CONTROLLER
 * Handles item quantity adjustments, checkbox selection, item deletion,
 * clear all, promo code application, and live order summary calculation.
 */

document.addEventListener('DOMContentLoaded', function () {
    const cartItemsList = document.getElementById('cartItemsList');
    const cartItemBadge = document.getElementById('cartItemBadge');
    const cartClearAll = document.getElementById('cartClearAll');
    const cartEmptyState = document.getElementById('cartEmptyState');
    
    // Summary elements
    const summaryTotalItems = document.getElementById('summaryTotalItems');
    const summarySubtotal = document.getElementById('summarySubtotal');
    const summaryTaxes = document.getElementById('summaryTaxes');
    const summaryDiscount = document.getElementById('summaryDiscount');
    const summaryFinalTotal = document.getElementById('summaryFinalTotal');

    // Promo code elements
    const cartPromoInput = document.getElementById('cartPromoInput');
    const cartApplyPromo = document.getElementById('cartApplyPromo');
    const promoFeedback = document.getElementById('promoFeedback');

    let appliedDiscountPercentage = 0;
    let appliedDiscountFlat = 0;

    /**
     * Format number as Indian Rupee string (e.g., 36899 -> ₹36,899)
     */
    function formatRupee(amount) {
        return '₹' + Math.round(amount).toLocaleString('en-IN');
    }

    /**
     * Recalculate totals across all active checked rows
     */
    function recalculateCart() {
        const itemRows = document.querySelectorAll('.cart-item-row');
        let totalItemsCount = 0;
        let subtotalAmount = 0;

        itemRows.forEach(row => {
            const checkbox = row.querySelector('.cart-item-checkbox');
            const qtyNumEl = row.querySelector('.cart-qty-num');
            const unitPrice = parseFloat(row.getAttribute('data-unit-price')) || 0;
            const currentQty = parseInt(qtyNumEl.textContent, 10) || 1;

            // Update row total text
            const priceCurrentEl = row.querySelector('.cart-item-price-current');
            if (priceCurrentEl) {
                priceCurrentEl.textContent = formatRupee(unitPrice * currentQty);
            }

            if (checkbox && checkbox.checked) {
                totalItemsCount += currentQty;
                subtotalAmount += (unitPrice * currentQty);
            }
        });

        // Update item count badge
        if (cartItemBadge) {
            cartItemBadge.textContent = totalItemsCount < 10 ? '0' + totalItemsCount : totalItemsCount;
        }
        if (summaryTotalItems) {
            summaryTotalItems.textContent = (totalItemsCount < 10 ? '0' + totalItemsCount : totalItemsCount) + ' Items';
        }

        // Calculate discount
        let discountAmount = 0;
        if (appliedDiscountPercentage > 0) {
            discountAmount = (subtotalAmount * appliedDiscountPercentage) / 100;
        } else if (appliedDiscountFlat > 0) {
            discountAmount = Math.min(appliedDiscountFlat, subtotalAmount);
        }

        // Taxes (5% GST) & Final Payment (Subtotal + Taxes - Discount)
        const gstTaxes = subtotalAmount > 0 ? subtotalAmount * 0.05 : 0;
        const finalPayment = Math.max(0, subtotalAmount + gstTaxes - discountAmount);

        // Update DOM
        if (summarySubtotal) summarySubtotal.textContent = formatRupee(subtotalAmount);
        if (summaryTaxes) summaryTaxes.textContent = '+' + formatRupee(gstTaxes);
        if (summaryDiscount) summaryDiscount.textContent = '-' + formatRupee(discountAmount);
        if (summaryFinalTotal) summaryFinalTotal.textContent = formatRupee(finalPayment);

        // Handle empty state
        if (itemRows.length === 0) {
            if (cartItemsList) cartItemsList.style.display = 'none';
            if (cartEmptyState) cartEmptyState.style.display = 'block';
            if (cartClearAll) cartClearAll.style.display = 'none';
            if (cartItemBadge) cartItemBadge.textContent = '00';
        }
    }

    // Event Listener for Quantity Buttons & Actions inside Cart Container
    if (cartItemsList) {
        cartItemsList.addEventListener('click', function (e) {
            const target = e.target;
            const row = target.closest('.cart-item-row');
            if (!row) return;

            // Plus Button
            if (target.classList.contains('cart-qty-plus')) {
                const qtyEl = row.querySelector('.cart-qty-num');
                let count = parseInt(qtyEl.textContent, 10) || 1;
                count++;
                qtyEl.textContent = count < 10 ? '0' + count : count;
                recalculateCart();
            }

            // Minus Button
            if (target.classList.contains('cart-qty-minus')) {
                const qtyEl = row.querySelector('.cart-qty-num');
                let count = parseInt(qtyEl.textContent, 10) || 1;
                if (count > 1) {
                    count--;
                    qtyEl.textContent = count < 10 ? '0' + count : count;
                    recalculateCart();
                }
            }

            // Delete Item Row
            if (target.closest('.cart-remove-item')) {
                row.style.opacity = '0';
                row.style.transform = 'translateX(-20px)';
                row.style.transition = 'all 0.3s ease';
                setTimeout(() => {
                    row.remove();
                    recalculateCart();
                }, 300);
            }

            // Save for Later / Wishlist toggle
            if (target.closest('.cart-wishlist-item')) {
                const wishlistBtn = target.closest('.cart-wishlist-item');
                const svg = wishlistBtn.querySelector('svg');
                if (svg.getAttribute('fill') === 'currentColor') {
                    svg.setAttribute('fill', 'none');
                    wishlistBtn.style.color = '#888075';
                } else {
                    svg.setAttribute('fill', 'currentColor');
                    wishlistBtn.style.color = 'var(--color-maroon)';
                }
            }
        });

        // Checkbox change listener
        cartItemsList.addEventListener('change', function (e) {
            if (e.target.classList.contains('cart-item-checkbox')) {
                recalculateCart();
            }
        });
    }

    // Clear All Button
    if (cartClearAll) {
        cartClearAll.addEventListener('click', function () {
            const itemRows = document.querySelectorAll('.cart-item-row');
            itemRows.forEach(row => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(10px)';
                row.style.transition = 'all 0.25s ease';
            });
            setTimeout(() => {
                if (cartItemsList) cartItemsList.innerHTML = '';
                recalculateCart();
            }, 250);
        });
    }

    // Promo Code Application
    if (cartApplyPromo && cartPromoInput && promoFeedback) {
        cartApplyPromo.addEventListener('click', function () {
            const code = cartPromoInput.value.trim().toUpperCase();
            if (code === 'HERITAGE10') {
                appliedDiscountPercentage = 10;
                appliedDiscountFlat = 0;
                promoFeedback.style.display = 'block';
                promoFeedback.style.color = '#2b7a3e';
                promoFeedback.textContent = '✓ 10% Heritage discount applied successfully!';
            } else if (code === 'BRIDAL500') {
                appliedDiscountPercentage = 0;
                appliedDiscountFlat = 500;
                promoFeedback.style.display = 'block';
                promoFeedback.style.color = '#2b7a3e';
                promoFeedback.textContent = '✓ ₹500 Festive Bridal voucher applied!';
            } else if (code === '') {
                promoFeedback.style.display = 'block';
                promoFeedback.style.color = '#a84242';
                promoFeedback.textContent = 'Please enter a valid promo code.';
            } else {
                promoFeedback.style.display = 'block';
                promoFeedback.style.color = '#a84242';
                promoFeedback.textContent = 'Invalid promo code. Try "HERITAGE10" for 10% off.';
            }
            recalculateCart();
        });
    }

    // Initial calculation run
    recalculateCart();
});
