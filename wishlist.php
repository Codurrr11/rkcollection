<?php
$page_title = 'My Wishlist | RK Collection Luxury Handwoven Silks';
$page_css   = ['assets/css/shop.css'];
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/products-data.php';

// Wishlist Items (4 Items matching reference structure)
$wishlist_products = [
    [
        'id'         => 1,
        'product'    => $shop_products[0],
        'discount'   => '-22%',
    ],
    [
        'id'         => 2,
        'product'    => $shop_products[1],
        'discount'   => '-20%',
    ],
    [
        'id'         => 7,
        'product'    => $shop_products[6],
        'discount'   => '-17%',
    ],
    [
        'id'         => 10,
        'product'    => $shop_products[9],
        'discount'   => null,
    ]
];

// Recommended Items ("Just For You" - 4 Items)
$just_for_you_products = [
    [
        'product' => $shop_products[4], // Kalanjali Silver Zari
        'badge'   => null,
        'rating'  => '4.9',
        'reviews' => 65,
    ],
    [
        'product' => $shop_products[16], // Bridal Kanjivaram Vaira Oosi
        'badge'   => '-11%',
        'rating'  => '5.0',
        'reviews' => 92,
    ],
    [
        'product' => $shop_products[5], // Pure Chanderi Handloom
        'badge'   => 'NEW',
        'rating'  => '4.8',
        'reviews' => 43,
    ],
    [
        'product' => $shop_products[12], // Banarasi Katan Meenakari
        'badge'   => '-15%',
        'rating'  => '4.9',
        'reviews' => 78,
    ]
];
?>

<main class="wishlist-page">

    <!-- BREADCRUMBS -->
    <div class="wishlist-header-bar">
        <nav class="wishlist-crumbs" aria-label="Breadcrumb navigation">
            <a href="index.php">HOME</a>
            <span>/</span>
            <span>WISHLIST</span>
        </nav>
    </div>

    <div class="wishlist-container">

        <!-- SECTION 1: MY WISHLIST (4 ITEMS) -->
        <section class="wishlist-section">
            <div class="wishlist-sec-head">
                <h1 class="wishlist-sec-title">
                    Wishlist <span class="wishlist-count" id="wishlistTotalCount">(<?php echo count($wishlist_products); ?>)</span>
                </h1>
                <button type="button" class="wishlist-btn-outline" id="moveAllToBagBtn">
                    Move All To Bag
                </button>
            </div>

            <!-- WISHLIST CARDS GRID -->
            <div class="wishlist-grid" id="wishlistGrid">
                <?php foreach ($wishlist_products as $item): 
                    $p = $item['product'];
                    $display_price = $p['sale_price'] ? $p['sale_price'] : $p['price'];
                ?>
                <div class="wishlist-card" data-id="<?php echo $p['id']; ?>">
                    <div class="wishlist-card__img-box">
                        <?php if ($item['discount']): ?>
                            <span class="wishlist-card__badge"><?php echo htmlspecialchars($item['discount']); ?></span>
                        <?php endif; ?>

                        <button type="button" class="wishlist-card__icon-btn wishlist-remove-item" title="Remove from Wishlist" aria-label="Remove item">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>

                        <a href="<?php echo htmlspecialchars($p['link']); ?>" class="wishlist-card__img-link">
                            <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" class="wishlist-card__img">
                        </a>

                        <button type="button" class="wishlist-card__add-bar wishlist-add-to-cart" data-title="<?php echo htmlspecialchars($p['title']); ?>">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Add To Cart
                        </button>
                    </div>

                    <div class="wishlist-card__info">
                        <a href="<?php echo htmlspecialchars($p['link']); ?>" class="wishlist-card__title"><?php echo htmlspecialchars($p['title']); ?></a>
                        <div class="wishlist-card__price-row">
                            <span class="wishlist-card__price"><?php echo htmlspecialchars($display_price); ?></span>
                            <?php if ($p['sale_price']): ?>
                                <span class="wishlist-card__price--mrp"><?php echo htmlspecialchars($p['price']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- EMPTY STATE (HIDDEN BY DEFAULT) -->
            <div class="wishlist-empty-state" id="wishlistEmptyState" style="display: none;">
                <h3>Your Wishlist is Empty</h3>
                <p class="text-muted mb-4">Save your favorite handwoven sarees to view or purchase them later.</p>
                <a href="shop" class="wishlist-btn-outline" style="display: inline-flex;">EXPLORE SAREE CATALOGUE</a>
            </div>
        </section>


        <!-- SECTION 2: JUST FOR YOU (RECOMMENDED SAREES) -->
        <section class="wishlist-section">
            <div class="wishlist-sec-head">
                <div class="d-flex align-items-center gap-3">
                    <span class="wishlist-sec-title__accent"></span>
                    <h2 class="wishlist-sec-title">Just For You</h2>
                </div>
                <a href="shop" class="wishlist-btn-outline">
                    See All
                </a>
            </div>

            <!-- RECOMMENDED CARDS GRID -->
            <div class="wishlist-grid">
                <?php foreach ($just_for_you_products as $rec): 
                    $p = $rec['product'];
                    $display_price = $p['sale_price'] ? $p['sale_price'] : $p['price'];
                ?>
                <div class="wishlist-card">
                    <div class="wishlist-card__img-box">
                        <?php if ($rec['badge']): ?>
                            <span class="wishlist-card__badge <?php echo $rec['badge'] === 'NEW' ? 'wishlist-card__badge--new' : ''; ?>">
                                <?php echo htmlspecialchars($rec['badge']); ?>
                            </span>
                        <?php endif; ?>

                        <a href="<?php echo htmlspecialchars($p['link']); ?>" class="wishlist-card__icon-btn" title="Quick View" aria-label="Quick View">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </a>

                        <a href="<?php echo htmlspecialchars($p['link']); ?>" class="wishlist-card__img-link">
                            <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" class="wishlist-card__img">
                        </a>

                        <button type="button" class="wishlist-card__add-bar wishlist-add-to-cart" data-title="<?php echo htmlspecialchars($p['title']); ?>">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Add To Cart
                        </button>
                    </div>

                    <div class="wishlist-card__info">
                        <a href="<?php echo htmlspecialchars($p['link']); ?>" class="wishlist-card__title"><?php echo htmlspecialchars($p['title']); ?></a>
                        <div class="wishlist-card__price-row">
                            <span class="wishlist-card__price"><?php echo htmlspecialchars($display_price); ?></span>
                            <?php if ($p['sale_price']): ?>
                                <span class="wishlist-card__price--mrp"><?php echo htmlspecialchars($p['price']); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="wishlist-card__rating">
                            ★★★★★
                            <span class="wishlist-card__rating-count">(<?php echo $rec['reviews']; ?>)</span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>

</main>

<!-- TOAST NOTIFICATION -->
<div class="wishlist-toast" id="wishlistToast"></div>

<script src="assets/js/wishlist.js?v=<?php echo time(); ?>"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
