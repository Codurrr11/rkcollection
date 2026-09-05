/**
 * RK COLLECTION — WISHLIST CONTROLLER
 * Handles wishlist item removals, moving items to cart, and toast notifications.
 */

document.addEventListener('DOMContentLoaded', function () {
    const wishlistGrid = document.getElementById('wishlistGrid');
    const wishlistTotalCount = document.getElementById('wishlistTotalCount');
    const wishlistEmptyState = document.getElementById('wishlistEmptyState');
    const moveAllToBagBtn = document.getElementById('moveAllToBagBtn');
    const wishlistToast = document.getElementById('wishlistToast');

    /**
     * Show temporary toast notification
     */
    function showToast(message) {
        if (!wishlistToast) return;
        wishlistToast.textContent = message;
        wishlistToast.classList.add('show');
        setTimeout(() => {
            wishlistToast.classList.remove('show');
        }, 3000);
    }

    /**
     * Recalculate wishlist item count & handle empty state
     */
    function updateWishlistState() {
        if (!wishlistGrid) return;
        const remainingCards = wishlistGrid.querySelectorAll('.wishlist-card');
        const count = remainingCards.length;

        if (wishlistTotalCount) {
            wishlistTotalCount.textContent = '(' + count + ')';
        }

        if (count === 0) {
            wishlistGrid.style.display = 'none';
            if (wishlistEmptyState) wishlistEmptyState.style.display = 'block';
            if (moveAllToBagBtn) moveAllToBagBtn.style.display = 'none';
        }
    }

    // Remove single wishlist item
    if (wishlistGrid) {
        wishlistGrid.addEventListener('click', function (e) {
            const removeBtn = e.target.closest('.wishlist-remove-item');
            if (removeBtn) {
                const card = removeBtn.closest('.wishlist-card');
                if (card) {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.9)';
                    card.style.transition = 'all 0.25s ease';
                    setTimeout(() => {
                        card.remove();
                        updateWishlistState();
                        showToast('✓ Item removed from your wishlist.');
                    }, 250);
                }
            }
        });
    }

    // Add to cart buttons (all "Add To Cart" bars sitewide)
    document.addEventListener('click', function (e) {
        const addToCartBtn = e.target.closest('.wishlist-add-to-cart');
        if (addToCartBtn) {
            const title = addToCartBtn.getAttribute('data-title') || 'Item';
            showToast('✓ Added "' + title + '" to your shopping cart!');
        }
    });

    // Move All To Bag Button
    if (moveAllToBagBtn) {
        moveAllToBagBtn.addEventListener('click', function () {
            const cards = wishlistGrid ? wishlistGrid.querySelectorAll('.wishlist-card') : [];
            if (cards.length === 0) return;

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(-10px)';
                card.style.transition = 'all 0.25s ease';
            });

            setTimeout(() => {
                if (wishlistGrid) wishlistGrid.innerHTML = '';
                updateWishlistState();
                showToast('✓ All wishlist items moved to your shopping cart!');
            }, 250);
        });
    }
});
