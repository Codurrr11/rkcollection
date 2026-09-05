<?php
/**
 * PRODUCT DETAILS PAGE
 *
 * Reads product-details.php?id=<id> against the shared catalogue in
 * includes/products-data.php — the same array shop.php and the homepage
 * sliders consume. Gallery, options and tabs are driven by
 * assets/js/product-details.js; nothing here needs a page reload.
 */

require_once __DIR__ . '/includes/products-data.php';

$requested_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$product      = rk_find_product($shop_products, $requested_id);

/* An unknown id falls back to the first piece rather than a dead page */
if ($product === null) {
    $product = $shop_products[0];
}

$category_slug  = $product['category'];
$category_label = $shop_categories[$category_slug] ?? 'Sarees';
$fabric_label   = $shop_fabrics[$product['fabric']] ?? 'Silk';
$weave          = $saree_weaves[$category_slug] ?? 'Handloom Weave';
$occasion       = $saree_occasions[$category_slug] ?? 'Festive Occasions';
$wash_care      = $saree_wash_care[$product['fabric']] ?? 'Dry clean only.';

$gallery  = rk_product_gallery($product, $shop_products);
$sku      = rk_product_sku($product);
$intro    = rk_product_intro();

/* The product's own colour, used in the details copy */
$active_color  = $shop_colors[$product['color']]['label'] ?? 'Maroon';


/* Specification rows — the last four sit behind "See More" */
$specifications = [
    ['key' => 'Weave',            'value' => $weave],
    ['key' => 'Fabric',           'value' => $fabric_label],
    ['key' => 'Saree Length',     'value' => '5.5 meters'],
    ['key' => 'Blouse Piece',     'value' => '0.8m, unstitched'],
    ['key' => 'Border',           'value' => 'Contrast woven zari border'],
    ['key' => 'Pallu',            'value' => 'Zari brocade pallu'],
    ['key' => 'Transparency',     'value' => 'Opaque'],
    ['key' => 'Drape Style',      'value' => 'Nivi'],
    ['key' => 'Zari',             'value' => 'Tested gold-tone zari',        'extra' => true],
    ['key' => 'Finish',           'value' => 'Fall & piku stitched',        'extra' => true],
    ['key' => 'Occasion',         'value' => $occasion,                      'extra' => true],
    ['key' => 'Country of Origin','value' => 'India',                        'extra' => true],
];

/* Discount badge, only when the piece is actually marked down */
$discount_pct = 0;
if (!empty($product['sale_price'])) {
    $original = (int) preg_replace('/[^0-9]/', '', $product['price']);
    if ($original > 0) {
        $discount_pct = (int) round((($original - $product['price_value']) / $original) * 100);
    }
}

/* Sample reviews — same voice as the homepage testimonials, list form */
$product_reviews = [
    ['name' => 'Ananya Iyer',      'city' => 'Chennai',   'rating' => 5, 'date' => '12 August 2026',    'text' => 'The zari work is far richer in person than on screen. I wore it for my sister\'s muhurtham and three people asked where it was woven. The fall and piku were already done, which saved me a trip to the tailor.'],
    ['name' => 'Meera Raghavan',   'city' => 'Bengaluru', 'rating' => 5, 'date' => '2 August 2026',     'text' => 'Beautifully packed in a muslin wrap with a silk mark tag. The drape is soft without losing its body — it holds pleats properly all evening.'],
    ['name' => 'Shalini Deshmukh', 'city' => 'Pune',      'rating' => 4, 'date' => '21 July 2026',      'text' => 'Gorgeous saree and the colour is true to the photographs. Took a star off only because delivery ran two days past the estimate, but the quality made up for it.'],
    ['name' => 'Divya Nair',       'city' => 'Kochi',     'rating' => 5, 'date' => '9 July 2026',       'text' => 'My second purchase from RK Collection. The blouse piece matches exactly and the pallu motif is hand-drawn, not printed. Worth every rupee.'],
];

/* Related products — same category first, topped up from the wider catalogue */
$related = [];
foreach ($shop_products as $candidate) {
    if ($candidate['id'] !== $product['id'] && $candidate['category'] === $category_slug) {
        $related[] = $candidate;
    }
}
foreach ($shop_products as $candidate) {
    if (count($related) >= 8) {
        break;
    }
    if ($candidate['id'] !== $product['id'] && !in_array($candidate, $related, true)) {
        $related[] = $candidate;
    }
}
$related = array_slice($related, 0, 8);

/* Page-scoped assets — hooks consumed by includes/header.php + includes/footer.php */
$page_title = $product['title'] . ' | RK Collection';
$page_css   = ['assets/css/page-header.css', 'assets/css/product-details.css'];
$page_js    = ['assets/js/product-details.js'];

include 'includes/header.php';

/**
 * Star row — filled stars up to the rating, hairline stars for the remainder.
 */
function rk_stars($rating, $size = 13)
{
    $full = (int) round($rating);
    $out  = '';
    for ($i = 1; $i <= 5; $i++) {
        $class = $i <= $full ? '' : ' product-details__star--empty';
        $out .= '<svg class="product-details__star' . $class . '" width="' . $size . '" height="' . $size . '"'
             . ' viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">'
             . '<path d="M12 2.6l2.9 5.9 6.5.9-4.7 4.6 1.1 6.5L12 17.4 6.2 20.5l1.1-6.5L2.6 9.4l6.5-.9L12 2.6z"/>'
             . '</svg>';
    }
    return $out;
}
?>

<main class="site-main product-details-page">

    <!-- ==========================================================
         PAGE HEADER BAND (shared component with shop.php)
         ========================================================== -->
    <section class="shop-hero">
        <p class="shop-hero__eyebrow">The Collection</p>
        <h1 class="shop-hero__title">Product Details</h1>
        <div class="shop-hero__rule" aria-hidden="true"></div>
        <nav class="shop-hero__crumbs" aria-label="Breadcrumb">
            <a class="shop-hero__crumb-link" href="index.php">Home</a>
            <span class="shop-hero__crumb-sep" aria-hidden="true">/</span>
            <a class="shop-hero__crumb-link" href="shop.php">Sarees</a>
            <span class="shop-hero__crumb-sep" aria-hidden="true">/</span>
            <a class="shop-hero__crumb-link" href="shop.php?category=<?php echo htmlspecialchars($category_slug); ?>"><?php echo htmlspecialchars($category_label); ?></a>
            <span class="shop-hero__crumb-sep" aria-hidden="true">/</span>
            <span class="shop-hero__crumb shop-hero__crumb--current" aria-current="page"><?php echo htmlspecialchars($product['title']); ?></span>
        </nav>
    </section>

    <!-- ==========================================================
         MAIN PRODUCT BLOCK
         ========================================================== -->
    <section class="product-details" id="productDetails">
        <div class="product-details__inner">

            <!-- GALLERY -->
            <div class="product-details__gallery">

                <div class="product-details__stage" tabindex="0" role="group" aria-label="Product gallery">
                    <div class="framed-image">
                        <?php foreach ($gallery as $i => $frame): ?>
                            <img src="<?php echo htmlspecialchars($frame); ?>"
                                 alt="<?php echo htmlspecialchars($product['title']); ?> — view <?php echo $i + 1; ?>"
                                 class="product-details__stage-img<?php echo $i === 0 ? ' is-active' : ''; ?>"
                                 <?php echo $i === 0 ? '' : 'loading="lazy" '; ?>decoding="async">
                        <?php endforeach; ?>
                    </div>

                    <?php if (!empty($product['badge'])): ?>
                        <span class="product-details__badge"><?php echo htmlspecialchars($product['badge']); ?></span>
                    <?php endif; ?>

                    <button type="button" class="product-details__zoom" id="productZoom" aria-pressed="false" aria-label="Zoom in">
                        <svg class="product-details__zoom-icon product-details__zoom-icon--in" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7"></circle>
                            <line x1="21" y1="21" x2="16.2" y2="16.2"></line>
                            <line x1="11" y1="8" x2="11" y2="14"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                        <svg class="product-details__zoom-icon product-details__zoom-icon--out" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" aria-hidden="true">
                            <circle cx="11" cy="11" r="7"></circle>
                            <line x1="21" y1="21" x2="16.2" y2="16.2"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                    </button>
                </div>

            </div>

            <!-- INFO -->
            <div class="product-details__info">

                <p class="product-details__sku">
                    <span class="product-details__sku-key">SKU</span>
                    <span class="product-details__sku-value"><?php echo htmlspecialchars($sku); ?></span>
                </p>

                <p class="product-details__eyebrow"><?php echo htmlspecialchars($category_label . ' · ' . $fabric_label); ?></p>
                <h2 class="product-details__title"><?php echo htmlspecialchars($product['title']); ?></h2>

                <ul class="product-details__thumbs" role="tablist" aria-label="Gallery thumbnails">
                    <?php foreach ($gallery as $i => $frame): ?>
                        <li>
                            <button type="button"
                                    class="product-details__thumb<?php echo $i === 0 ? ' is-active' : ''; ?>"
                                    role="tab"
                                    aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                                    aria-label="View image <?php echo $i + 1; ?>">
                                <img src="<?php echo htmlspecialchars($frame); ?>"
                                     alt=""
                                     class="product-details__thumb-img"
                                     loading="lazy"
                                     decoding="async">
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="product-details__price-row">
                    <?php if (!empty($product['sale_price'])): ?>
                        <span class="product-details__price"><?php echo htmlspecialchars($product['sale_price']); ?></span>
                        <span class="product-details__price product-details__price--original"><?php echo htmlspecialchars($product['price']); ?></span>
                        <?php if ($discount_pct > 0): ?>
                            <span class="product-details__save"><?php echo $discount_pct; ?>% off</span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="product-details__price"><?php echo htmlspecialchars($product['price']); ?></span>
                    <?php endif; ?>
                </div>

                <p class="product-details__intro"><?php echo htmlspecialchars($intro); ?></p>

                <!-- QUANTITY + CTAS -->
                <div class="product-details__buy-row">
                    <div class="product-details__qty">
                        <button type="button" class="product-details__qty-btn product-details__qty-btn--minus" aria-label="Decrease quantity">−</button>
                        <input type="number" class="product-details__qty-input" id="productQty" value="1" min="1" max="10" aria-label="Quantity">
                        <button type="button" class="product-details__qty-btn product-details__qty-btn--plus" aria-label="Increase quantity">+</button>
                    </div>

                    <button type="button" class="product-details__btn product-details__btn--cart" data-label="Add to Cart">Add to Cart</button>
                    <button type="button" class="product-details__btn product-details__btn--buy">Buy Now</button>
                </div>

                <!-- PRODUCT DETAILS -->
                <div class="product-details__facts">
                    <h3 class="product-details__facts-title">Product Details</h3>

                    <div class="product-details__facts-group">
                        <h4 class="product-details__facts-subtitle">Care</h4>
                        <p class="product-details__facts-text">
                            <?php echo htmlspecialchars($wash_care); ?>
                            Iron on low heat through a cotton cloth. Keep away from direct sunlight and perfume.
                        </p>
                    </div>

                    <div class="product-details__facts-group">
                        <h4 class="product-details__facts-subtitle">Specifications</h4>
                        <dl class="product-details__specs" id="productSpecs">
                            <?php foreach ($specifications as $spec): ?>
                                <div class="product-details__spec<?php echo !empty($spec['extra']) ? ' product-details__spec--extra' : ''; ?>">
                                    <dt class="product-details__spec-key"><?php echo htmlspecialchars($spec['key']); ?></dt>
                                    <dd class="product-details__spec-value"><?php echo htmlspecialchars($spec['value']); ?></dd>
                                </div>
                            <?php endforeach; ?>
                        </dl>
                        <button type="button" class="product-details__facts-more" id="productSpecsMore" aria-expanded="false" aria-controls="productSpecs">See More</button>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ==========================================================
         CUSTOMER REVIEWS
         ========================================================== -->
    <section class="product-details__reviews-section">
        <div class="product-details__reviews-inner">

            <h2 class="product-details__reviews-title">Customer Reviews</h2>

            <ul class="product-details__reviews">
                <?php foreach ($product_reviews as $review): ?>
                    <li class="product-details__review">
                        <span class="product-details__review-avatar" aria-hidden="true"><?php echo htmlspecialchars(mb_substr($review['name'], 0, 1)); ?></span>
                        <div class="product-details__review-body">
                            <div class="product-details__review-head">
                                <h3 class="product-details__review-name"><?php echo htmlspecialchars($review['name']); ?></h3>
                                <span class="product-details__stars" aria-label="<?php echo (int) $review['rating']; ?> out of 5"><?php echo rk_stars($review['rating'], 11); ?></span>
                                <span class="product-details__review-date"><?php echo htmlspecialchars($review['city'] . ' · ' . $review['date']); ?></span>
                            </div>
                            <p class="product-details__review-text"><?php echo htmlspecialchars($review['text']); ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <button type="button" class="product-details__write-btn">Write a Review</button>

        </div>
    </section>

    <!-- ==========================================================
         RELATED PRODUCTS — the homepage slider component, unchanged
         ========================================================== -->
    <?php
    $section_title = "Explore Related Products";
    $section_id    = "related-products";
    $section_bg    = "#faf5ea";
    $is_instagram  = false;
    $products      = $related;
    include __DIR__ . '/includes/product-slider.php';
    ?>

</main>

<?php include 'includes/footer.php'; ?>
