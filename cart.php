<?php
$page_title = 'Shopping Cart | RK Collection Luxury Handwoven Silks';
$page_css   = ['assets/css/shop.css'];
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/products-data.php';

// Select 3 sample items from products data for initial cart demonstration
$cart_items = [
    [
        'id'            => 1,
        'product'       => $shop_products[0], // Banarasi Kora Zari Silk Saree
        'tag'           => 'BANARASI SILK',
        'color'         => 'Royal Maroon',
        'blouse'        => 'Unstitched Included',
        'qty'           => 1,
        'unit_price'    => 6999,
        'mrp_price'     => 8999,
    ],
    [
        'id'            => 5,
        'product'       => $shop_products[4], // Kalanjali Silver Zari Silk Saree
        'tag'           => 'SILK MARK CERTIFIED',
        'color'         => 'Ivory Silver',
        'blouse'        => 'Custom Stitched (+₹1,200)',
        'qty'           => 1,
        'unit_price'    => 11500,
        'mrp_price'     => null,
    ],
    [
        'id'            => 10,
        'product'       => $shop_products[9], // Kanjivaram Temple Korvai Saree
        'tag'           => 'HERITAGE KANJIVARAM',
        'color'         => 'Kanchipuram Gold',
        'blouse'        => 'Unstitched Included',
        'qty'           => 1,
        'unit_price'    => 18400,
        'mrp_price'     => null,
    ]
];
?>

<main class="cart-page">

    <!-- BREADCRUMBS -->
    <div class="cart-header-bar">
        <nav class="cart-crumbs" aria-label="Breadcrumb navigation">
            <a href="index.php">HOME</a>
            <span>/</span>
            <span>CARTS</span>
        </nav>
    </div>

    <!-- MAIN CART SECTION -->
    <section class="cart-layout">
        <div class="cart-grid">

            <!-- LEFT COLUMN: CART ITEMS LIST -->
            <div class="cart-items-column">
                <div class="cart-items-head">
                    <h1 class="cart-items-title">
                        CARTS 
                        <span class="cart-items-count" id="cartItemBadge">03</span>
                    </h1>
                    <button type="button" class="cart-clear-btn" id="cartClearAll">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                        DELETE ALL
                    </button>
                </div>

                <!-- CART ITEMS CONTAINER -->
                <div class="cart-items-list" id="cartItemsList">
                    <?php foreach ($cart_items as $index => $item): 
                        $p = $item['product'];
                        $item_total = $item['unit_price'] * $item['qty'];
                    ?>
                    <div class="cart-item-row" data-id="<?php echo $item['id']; ?>" data-unit-price="<?php echo $item['unit_price']; ?>">
                        <input type="checkbox" class="cart-item-checkbox" checked aria-label="Select <?php echo htmlspecialchars($p['title']); ?>">
                        
                        <a href="<?php echo htmlspecialchars($p['link']); ?>" class="cart-item-thumb">
                            <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" class="cart-item-img">
                        </a>

                        <div class="cart-item-details">
                            <span class="cart-item-tag"><?php echo htmlspecialchars($item['tag']); ?></span>
                            <a href="<?php echo htmlspecialchars($p['link']); ?>" class="cart-item-name"><?php echo htmlspecialchars($p['title']); ?></a>
                            <div class="cart-item-specs">
                                <span>Color: <strong><?php echo htmlspecialchars($item['color']); ?></strong></span>
                                <span>•</span>
                                <span>Blouse: <strong><?php echo htmlspecialchars($item['blouse']); ?></strong></span>
                            </div>
                        </div>

                        <div class="cart-item-right">
                            <div class="cart-item-price">
                                <?php if ($item['mrp_price']): ?>
                                    <span class="cart-item-price--original">₹<?php echo number_format($item['mrp_price']); ?></span>
                                <?php endif; ?>
                                <span class="cart-item-price-current">₹<?php echo number_format($item_total); ?></span>
                            </div>

                            <div class="cart-item-controls">
                                <button type="button" class="cart-icon-btn cart-remove-item" title="Remove Item" aria-label="Remove Item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </button>
                                <button type="button" class="cart-icon-btn cart-wishlist-item" title="Save for Later" aria-label="Save for Later">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                </button>
                                <div class="cart-qty-selector">
                                    <button type="button" class="cart-qty-btn cart-qty-minus" aria-label="Decrease Quantity">−</button>
                                    <span class="cart-qty-num"><?php echo sprintf('%02d', $item['qty']); ?></span>
                                    <button type="button" class="cart-qty-btn cart-qty-plus" aria-label="Increase Quantity">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- EMPTY STATE (HIDDEN BY DEFAULT) -->
                <div class="cart-empty-state" id="cartEmptyState" style="display: none;">
                    <h2>Your Cart is Empty</h2>
                    <p class="text-muted mb-4">Discover our handwoven silk collections crafted by master artisans across India.</p>
                    <a href="shop.php" class="cart-btn-primary" style="max-width: 280px; margin: 0 auto;">EXPLORE SAREE CATALOGUE</a>
                </div>
            </div>

            <!-- RIGHT COLUMN: ORDER SUMMARY CARD -->
            <div class="cart-summary-column">
                <h2 class="cart-summary-title">SUMMARY</h2>

                <div class="cart-summary-card">
                    <div class="cart-summary-rows">
                        <div class="cart-summary-row">
                            <span>Total items</span>
                            <span class="cart-summary-val" id="summaryTotalItems">03 Items</span>
                        </div>
                        <div class="cart-summary-row">
                            <span>Sub total</span>
                            <span class="cart-summary-val" id="summarySubtotal">₹36,899</span>
                        </div>
                        <div class="cart-summary-row">
                            <span>Est. Delivery</span>
                            <span class="cart-summary-val cart-summary-val--free">FREE</span>
                        </div>
                        <div class="cart-summary-row">
                            <span>Taxes (5% GST)</span>
                            <span class="cart-summary-val cart-summary-val--tax" id="summaryTaxes">+₹1,845</span>
                        </div>
                        <div class="cart-summary-row">
                            <span>Discount</span>
                            <span class="cart-summary-val cart-summary-val--discount" id="summaryDiscount">-₹0</span>
                        </div>
                        <div class="cart-summary-row cart-summary-row--total">
                            <span>Final payment</span>
                            <span class="cart-summary-val" id="summaryFinalTotal">₹38,744</span>
                        </div>
                    </div>

                    <!-- PROMO CODE INPUT -->
                    <div class="cart-promo-box">
                        <input type="text" class="cart-promo-input" id="cartPromoInput" placeholder="Enter promo code (e.g. HERITAGE10)" aria-label="Enter promo code">
                        <button type="button" class="cart-promo-btn" id="cartApplyPromo">APPLY</button>
                    </div>
                    <div id="promoFeedback" style="font-size: 12px; margin-top: -16px; margin-bottom: 18px; display: none;"></div>

                    <!-- CHECKOUT BUTTON -->
                    <div class="cart-checkout-btns">
                        <a href="checkout.php" class="cart-btn-primary">
                            CHECKOUT
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<script src="assets/js/cart.js?v=<?php echo time(); ?>"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
