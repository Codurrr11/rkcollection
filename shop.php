<?php
/**
 * SHOP / SAREE LISTING PAGE
 *
 * Filter sidebar + product grid. Filtering, sorting and pagination all run
 * client side in assets/js/shop.js; PHP renders the full catalogue once and
 * pre-selects the category coming in from ?category=<slug>.
 */

/* Shared catalogue + taxonomy — single source of truth for every product page */
require_once __DIR__ . '/includes/products-data.php';

/* Incoming category from the header nav pills — shop.php?category=banarasi */
$active_category = isset($_GET['category']) ? strtolower(trim($_GET['category'])) : '';
if (!array_key_exists($active_category, $shop_categories)) {
    $active_category = '';
}

/* Facet counts for the sidebar */
$category_counts = array_fill_keys(array_keys($shop_categories), 0);
$fabric_counts   = array_fill_keys(array_keys($shop_fabrics), 0);
foreach ($shop_products as $p) {
    if (isset($category_counts[$p['category']])) { $category_counts[$p['category']]++; }
    if (isset($fabric_counts[$p['fabric']]))     { $fabric_counts[$p['fabric']]++; }
}

/* Price range bounds, rounded out to the slider step */
$price_step  = 500;
$price_floor = 0;
$price_ceil  = (int) (ceil(max(array_column($shop_products, 'price_value')) / $price_step) * $price_step);

/* Page-scoped assets — hooks consumed by includes/header.php + includes/footer.php */
$page_title = 'Sarees | RK Collection — Handwoven Heritage Silks';
$page_css   = ['assets/css/page-header.css', 'assets/css/shop.css'];
$page_js    = ['assets/js/shop.js'];

include 'includes/header.php';
?>

<main class="site-main shop-page" id="shopPage">

    <!-- ==========================================================
         PAGE HEADER BAND
         ========================================================== -->
    <section class="shop-hero">
        <p class="shop-hero__eyebrow">The Collection</p>
        <h1 class="shop-hero__title">Sarees</h1>
        <div class="shop-hero__rule" aria-hidden="true"></div>
        <nav class="shop-hero__crumbs" aria-label="Breadcrumb">
            <a class="shop-hero__crumb-link" href="index.php">Home</a>
            <span class="shop-hero__crumb-sep" aria-hidden="true">/</span>
            <span class="shop-hero__crumb shop-hero__crumb--current" aria-current="page">Sarees</span>
        </nav>
    </section>

    <!-- ==========================================================
         FILTERS + GRID
         ========================================================== -->
    <div class="shop-layout">
        <div class="shop-layout__inner">

            <!-- SIDEBAR FILTERS -->
            <aside class="shop-filters" id="shopFilters" aria-label="Product Filters">

                <div class="shop-filters__head">
                    <h2 class="shop-filters__heading">Filter</h2>
                    <button type="button" class="shop-filters__clear" id="shopFiltersClear" hidden>Clear All</button>
                    <button type="button" class="shop-filters__close" id="shopFiltersClose" aria-label="Close Filters">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <!-- CATEGORY -->
                <div class="shop-filters__group">
                    <h3 class="shop-filters__group-title">Category</h3>
                    <ul class="shop-filters__list">
                        <?php foreach ($shop_categories as $slug => $label): ?>
                            <li>
                                <label class="shop-filters__check">
                                    <input type="checkbox"
                                           class="shop-filters__check-input"
                                           data-group="category"
                                           value="<?php echo htmlspecialchars($slug); ?>"
                                           <?php echo ($active_category === $slug) ? 'checked' : ''; ?>>
                                    <span class="shop-filters__box" aria-hidden="true"></span>
                                    <span class="shop-filters__check-text"><?php echo htmlspecialchars($label); ?></span>
                                    <span class="shop-filters__count"><?php echo (int) $category_counts[$slug]; ?></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- PRICE -->
                <div class="shop-filters__group">
                    <h3 class="shop-filters__group-title">Price</h3>

                    <div class="shop-filters__price-values">
                        <span id="shopPriceOutMin">₹0</span>
                        <span class="shop-filters__price-dash" aria-hidden="true"></span>
                        <span id="shopPriceOutMax">₹<?php echo number_format($price_ceil); ?></span>
                    </div>

                    <div class="shop-range">
                        <div class="shop-range__track" aria-hidden="true">
                            <div class="shop-range__fill" id="shopPriceFill"></div>
                        </div>
                        <input type="range"
                               class="shop-range__input"
                               id="shopPriceMin"
                               min="<?php echo (int) $price_floor; ?>"
                               max="<?php echo (int) $price_ceil; ?>"
                               step="<?php echo (int) $price_step; ?>"
                               value="<?php echo (int) $price_floor; ?>"
                               aria-label="Minimum price">
                        <input type="range"
                               class="shop-range__input"
                               id="shopPriceMax"
                               min="<?php echo (int) $price_floor; ?>"
                               max="<?php echo (int) $price_ceil; ?>"
                               step="<?php echo (int) $price_step; ?>"
                               value="<?php echo (int) $price_ceil; ?>"
                               aria-label="Maximum price">
                    </div>

                    <p class="shop-filters__price-caption">Drag to set your range</p>
                </div>

                <!-- FABRIC -->
                <div class="shop-filters__group">
                    <h3 class="shop-filters__group-title">Fabric</h3>
                    <ul class="shop-filters__list">
                        <?php foreach ($shop_fabrics as $slug => $label): ?>
                            <li>
                                <label class="shop-filters__check">
                                    <input type="checkbox"
                                           class="shop-filters__check-input"
                                           data-group="fabric"
                                           value="<?php echo htmlspecialchars($slug); ?>">
                                    <span class="shop-filters__box" aria-hidden="true"></span>
                                    <span class="shop-filters__check-text"><?php echo htmlspecialchars($label); ?></span>
                                    <span class="shop-filters__count"><?php echo (int) $fabric_counts[$slug]; ?></span>
                                </label>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </aside>

            <div class="shop-filters__overlay" id="shopFiltersOverlay"></div>

            <!-- PRODUCT COLUMN -->
            <div class="shop-main">

                <!-- TOOLBAR -->
                <div class="shop-toolbar">
                    <div class="shop-toolbar__left">
                        <button type="button" class="shop-filter-toggle" id="shopFilterToggle" aria-expanded="false" aria-controls="shopFilters">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                <line x1="7" y1="12" x2="17" y2="12"></line>
                                <line x1="10" y1="17" x2="14" y2="17"></line>
                            </svg>
                            <span>Filter</span>
                            <span class="shop-filter-toggle__count" id="shopFilterToggleCount" hidden>0</span>
                        </button>
                        <p class="shop-toolbar__count" id="shopResultCount">Showing 1–12 of <?php echo count($shop_products); ?> sarees</p>
                    </div>

                    <div class="shop-sort">
                        <label class="shop-sort__label" for="shopSort">Sort by</label>
                        <select class="shop-sort__select" id="shopSort">
                            <option value="default">Default Sorting</option>
                            <option value="price-asc">Price — Low to High</option>
                            <option value="price-desc">Price — High to Low</option>
                            <option value="newest">Newest Arrivals</option>
                            <option value="popularity">Popularity</option>
                        </select>
                    </div>
                </div>

                <!-- ACTIVE FILTER PILLS (rendered by shop.js) -->
                <div class="shop-active" id="shopActiveFilters" hidden></div>

                <!-- GRID -->
                <div class="shop-grid" id="shopGrid">
                    <?php foreach ($shop_products as $item): ?>
                        <?php
                        $title      = $item['title'];
                        $price      = $item['price'];
                        $sale_price = $item['sale_price'] ?? null;
                        $image      = $item['image'];
                        $badge      = $item['badge'] ?? null;
                        $badge_type = $item['badge_type'] ?? 'gold';
                        $cat_label  = $shop_categories[$item['category']] ?? '';
                        $link       = $item['link'];
                        ?>
                        <div class="shop-grid__item"
                             data-category="<?php echo htmlspecialchars($item['category']); ?>"
                             data-fabric="<?php echo htmlspecialchars($item['fabric']); ?>"
                             data-price="<?php echo (int) $item['price_value']; ?>"
                             data-added="<?php echo (int) $item['added']; ?>"
                             data-popularity="<?php echo (int) $item['popularity']; ?>">

                            <div class="product-card">
                                <a href="<?php echo htmlspecialchars($link); ?>" class="product-card__link" aria-label="<?php echo htmlspecialchars($title); ?>">

                                    <div class="product-card__image-wrap">
                                        <img src="<?php echo htmlspecialchars($image); ?>"
                                             alt="<?php echo htmlspecialchars($title); ?>"
                                             class="product-card__image"
                                             loading="lazy"
                                             decoding="async">

                                        <?php if ($badge): ?>
                                            <span class="product-card__badge product-card__badge--<?php echo htmlspecialchars($badge_type); ?>"><?php echo htmlspecialchars($badge); ?></span>
                                        <?php endif; ?>

                                        <button type="button" class="product-card__wishlist-btn js-wishlist-toggle" aria-label="Add to Wishlist">
                                            <svg class="product-card__heart-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
                                            </svg>
                                        </button>

                                        <button type="button" class="product-card__cart-btn js-add-cart" aria-label="Add to Shopping Bag">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="product-card__info">
                                        <p class="product-card__meta"><?php echo htmlspecialchars($cat_label); ?></p>
                                        <h3 class="product-card__title"><?php echo htmlspecialchars($title); ?></h3>
                                        <div class="product-card__price-row">
                                            <?php if ($sale_price): ?>
                                                <span class="product-card__price product-card__price--sale"><?php echo htmlspecialchars($sale_price); ?></span>
                                                <span class="product-card__price product-card__price--original"><?php echo htmlspecialchars($price); ?></span>
                                            <?php else: ?>
                                                <span class="product-card__price"><?php echo htmlspecialchars($price); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </a>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- EMPTY STATE -->
                <div class="shop-empty" id="shopEmpty" hidden>
                    <h2 class="shop-empty__title">No sarees found</h2>
                    <p class="shop-empty__text">Try widening your price range or removing a filter.</p>
                    <button type="button" class="shop-empty__btn" id="shopEmptyClear">Clear All Filters</button>
                </div>

                <!-- PAGINATION (rendered by shop.js) -->
                <nav class="shop-pagination" id="shopPagination" aria-label="Pagination"></nav>

            </div>

        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>
