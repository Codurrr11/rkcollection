<?php
/**
 * PRODUCT DETAILS PAGE
 *
 * Reached as /<product-slug>, which .htaccess rewrites to
 * product-details.php?slug=<slug>. The legacy ?id=<id> form still resolves and
 * is redirected to the slug URL so old links and bookmarks keep working.
 *
 * Reads the shared catalogue in includes/products-data.php — the same array
 * shop.php and the homepage sliders consume. Gallery, options and tabs are
 * driven by assets/js/product-details.js; nothing here needs a page reload.
 */

require_once __DIR__ . '/includes/products-data.php';

$product = null;

if (isset($_GET['slug']) && $_GET['slug'] !== '') {
    $product = rk_find_product_by_slug($shop_products, $_GET['slug']);
}

/* Legacy ?id= link: resolve it, then send the browser to the slug URL */
if ($product === null && isset($_GET['id'])) {
    $product = rk_find_product($shop_products, (int) $_GET['id']);
    if ($product !== null && !headers_sent()) {
        header('Location: ' . rk_product_url($product), true, 301);
        exit;
    }
}

/* An unknown slug still renders a useful page rather than a dead end, but it
   answers 404 — the slug namespace is public and guessable now, so a typo must
   not return a crawlable 200. */
if ($product === null) {
    if (!headers_sent()) {
        header('HTTP/1.1 404 Not Found');
    }
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
$page_css   = ['assets/css/shop.css'];
$page_js    = ['assets/js/product-details.js'];

include 'includes/header.php';

/**
 * Star row — filled stars up to the rating, hairline/empty stars for the remainder.
 */
function rk_stars($rating, $size = 14)
{
    $full = (int) round($rating);
    $out  = '';
    for ($i = 1; $i <= 5; $i++) {
        $class = $i <= $full ? ' product-details__star--full' : ' product-details__star--empty';
        $out .= '<svg class="product-details__star' . $class . '" width="' . $size . '" height="' . $size . '"'
             . ' viewBox="0 0 24 24" aria-hidden="true">'
             . '<path d="M12 1.7L15.3 8.4L22.7 9.5L17.3 14.7L18.6 22.1L12 18.6L5.4 22.1L6.7 14.7L1.3 9.5L8.7 8.4L12 1.7Z"/>'
             . '</svg>';
    }
    return $out;
}
?>

<main class="site-main product-details-page">

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

                <!-- TOP META ROW: CATEGORY & SKU -->
                <div class="product-details__meta-top">
                    <span class="product-details__category-tag"><?php echo htmlspecialchars($category_label . ' · ' . $fabric_label); ?></span>
                    <span class="product-details__sku-pill">SKU: <?php echo htmlspecialchars($sku); ?></span>
                </div>

                <!-- TITLE -->
                <h1 class="product-details__title"><?php echo htmlspecialchars($product['title']); ?></h1>

                <!-- RATING & STOCK SUMMARY ROW -->
                <div class="product-details__rating-summary">
                    <div class="product-details__stars-group">
                        <?php echo rk_stars(4.8, 15); ?>
                        <span class="product-details__rating-score">4.8</span>
                    </div>
                    <span class="product-details__rating-divider">·</span>
                    <a href="#productReviewsSection" class="product-details__rating-link">128 Verified Ratings</a>
                    <span class="product-details__rating-divider">·</span>
                    <span class="product-details__stock-badge">✓ In Stock</span>
                </div>

                <!-- PRICE ROW -->
                <div class="product-details__price-row">
                    <?php if (!empty($product['sale_price'])): ?>
                        <span class="product-details__price"><?php echo htmlspecialchars($product['sale_price']); ?></span>
                        <span class="product-details__price product-details__price--original"><?php echo htmlspecialchars($product['price']); ?></span>
                        <?php if ($discount_pct > 0): ?>
                            <span class="product-details__save"><?php echo $discount_pct; ?>% OFF</span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="product-details__price"><?php echo htmlspecialchars($product['price']); ?></span>
                    <?php endif; ?>
                    <span class="product-details__tax-note">Inclusive of all taxes</span>
                    <span class="rk-zari-rule rk-zari-rule--left product-details__price-rule" aria-hidden="true"></span>
                </div>

                <!-- COLOR & GALLERY THUMBNAILS SELECTOR -->
                <div class="product-details__variant-block">
                    <div class="product-details__variant-header">
                        <span class="product-details__variant-label">Color / Weave View:</span>
                        <span class="product-details__variant-active"><?php echo htmlspecialchars($active_color); ?></span>
                    </div>
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
                </div>

                <!-- CRAFT & WEAVE SUMMARY BOX -->
                <div class="product-details__craft-box">
                    <p class="product-details__craft-label">The Weave</p>
                    <p class="product-details__intro"><?php echo htmlspecialchars($intro); ?></p>
                    <div class="product-details__craft-highlights">

                        <span class="product-details__highlight-item">
                            <!-- Pit loom: warp threads crossed by the weft -->
                            <svg class="product-details__highlight-icon" width="15" height="15" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" aria-hidden="true">
                                <path d="M4 4v16M9 4v16M15 4v16M20 4v16"></path>
                                <path d="M3 9h18M3 15h18" opacity="0.55"></path>
                            </svg>
                            <span>Handloom Pit Loom</span>
                        </span>

                        <span class="product-details__highlight-item">
                            <!-- Zari: a spool of wound gold thread -->
                            <svg class="product-details__highlight-icon" width="15" height="15" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M7 3h10M7 21h10"></path>
                                <path d="M9 3v18M15 3v18"></path>
                                <path d="M9 8l6 3M9 13l6 3" opacity="0.55"></path>
                            </svg>
                            <span>Pure Zari Motif</span>
                        </span>

                        <span class="product-details__highlight-item">
                            <!-- Fall &amp; Piku: needle and thread through the hem -->
                            <svg class="product-details__highlight-icon" width="15" height="15" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 4L9.5 14.5"></path>
                                <path d="M18.2 2.6l3.2 3.2-1.6 1.6-3.2-3.2z"></path>
                                <path d="M9.5 14.5l-1.2 3.2 3.2-1.2" opacity="0.85"></path>
                                <path d="M3 20c2.5-2.5 5-2.5 7.5 0" opacity="0.55"></path>
                            </svg>
                            <span>Fall &amp; Piku Ready</span>
                        </span>

                    </div>
                    <p class="product-details__artisan-note">
                        Woven on a traditional pit loom in Varanasi. Slight irregularities in the
                        weave are the signature of handloom, never a defect.
                    </p>
                </div>

                <!-- QUANTITY + CTAS -->
                <div class="product-details__buy-row">
                    <div class="product-details__qty">
                        <button type="button" class="product-details__qty-btn product-details__qty-btn--minus" aria-label="Decrease quantity">−</button>
                        <input type="number" class="product-details__qty-input" id="productQty" value="1" min="1" max="10" aria-label="Quantity">
                        <button type="button" class="product-details__qty-btn product-details__qty-btn--plus" aria-label="Increase quantity">+</button>
                    </div>

                    <button type="button" class="product-details__btn product-details__btn--cart" data-label="Add to Bag">Add to Bag</button>
                    <button type="button" class="product-details__btn product-details__btn--buy">Buy Now</button>
                </div>

                <!-- TRUST STRIP -->
                <div class="product-details__trust-strip">
                    <div class="product-details__trust-item">
                        <svg class="product-details__trust-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                        <span>Free Shipping in India</span>
                    </div>
                    <div class="product-details__trust-item">
                        <svg class="product-details__trust-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <span>Pure Silk Mark Certified</span>
                    </div>
                    <div class="product-details__trust-item">
                        <svg class="product-details__trust-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                        </svg>
                        <span>7-Day Returns</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ==========================================================
         PRODUCT DETAILS & SPECIFICATIONS (FULL-WIDTH 2-COLUMN SECTION)
         ========================================================== -->
    <section class="product-full-details-section" id="productFullDetails">
        <div class="product-full-details__inner">
            
            <p class="product-full-details__eyebrow">PRODUCT DETAILS</p>

            <div class="product-full-details__grid">
                
                <!-- LEFT COLUMN: EXTRA DETAILS & CARE -->
                <div class="product-full-details__left">
                    <div class="product-full-details__block">
                        <h3 class="product-full-details__heading">Care</h3>
                        <p class="product-full-details__text">
                            <?php echo htmlspecialchars($wash_care); ?>
                            Iron on low heat through a cotton cloth. Keep away from direct sunlight and perfume.
                        </p>
                    </div>

                    <div class="product-full-details__block">
                        <h3 class="product-full-details__heading">Craft & Heritage</h3>
                        <p class="product-full-details__text">
                            Woven to order on a traditional pit loom, with the motif carried unbroken from body to pallu. Each piece is finished by hand, so no two drapes fall exactly alike. Certified Pure Silk Mark guarantees authenticity.
                        </p>
                    </div>
                </div>

                <!-- RIGHT COLUMN: SPECIFICATIONS GRID -->
                <div class="product-full-details__right">
                    <h3 class="product-full-details__heading">Specifications</h3>

                    <dl class="product-details__specs" id="productSpecs">
                        <?php foreach ($specifications as $spec): ?>
                            <div class="product-details__spec<?php echo !empty($spec['extra']) ? ' product-details__spec--extra' : ''; ?>">
                                <dt class="product-details__spec-key"><?php echo htmlspecialchars($spec['key']); ?></dt>
                                <dd class="product-details__spec-value"><?php echo htmlspecialchars($spec['value']); ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                    <button type="button" class="product-details__facts-more" id="productSpecsMore" aria-expanded="false" aria-controls="productSpecs">SEE MORE</button>
                </div>

            </div>

        </div>
    </section>

    <!-- ==========================================================
         CUSTOMER RATINGS & REVIEWS SECTION (MODERN LUXURY UI)
         ========================================================== -->
    <section class="product-reviews-section" id="productReviewsSection">
        <div class="product-reviews__inner">
            
            <p class="product-reviews__eyebrow">RATINGS & REVIEWS</p>

            <!-- TOP RATING BREAKDOWN SUMMARY CARD -->
            <div class="product-reviews__summary-card">
                <div class="product-reviews__score-box">
                    <div class="product-reviews__big-score">4.8</div>
                    <div class="product-reviews__stars-row">
                        <?php echo rk_stars(5, 16); ?>
                    </div>
                    <p class="product-reviews__total-count">Based on 128 Verified Reviews</p>
                    <span class="product-reviews__verified-badge">✦ 100% VERIFIED PURCHASES</span>
                </div>

                <div class="product-reviews__divider-v"></div>

                <div class="product-reviews__bars-box">
                    <div class="product-reviews__bar-row">
                        <span class="product-reviews__bar-lbl">5 Star</span>
                        <div class="product-reviews__bar-track">
                            <div class="product-reviews__bar-fill" style="width: 84%;"></div>
                        </div>
                        <span class="product-reviews__bar-count">108</span>
                    </div>
                    <div class="product-reviews__bar-row">
                        <span class="product-reviews__bar-lbl">4 Star</span>
                        <div class="product-reviews__bar-track">
                            <div class="product-reviews__bar-fill" style="width: 12%;"></div>
                        </div>
                        <span class="product-reviews__bar-count">15</span>
                    </div>
                    <div class="product-reviews__bar-row">
                        <span class="product-reviews__bar-lbl">3 Star</span>
                        <div class="product-reviews__bar-track">
                            <div class="product-reviews__bar-fill" style="width: 3%;"></div>
                        </div>
                        <span class="product-reviews__bar-count">4</span>
                    </div>
                    <div class="product-reviews__bar-row">
                        <span class="product-reviews__bar-lbl">2 Star</span>
                        <div class="product-reviews__bar-track">
                            <div class="product-reviews__bar-fill" style="width: 1%;"></div>
                        </div>
                        <span class="product-reviews__bar-count">1</span>
                    </div>
                    <div class="product-reviews__bar-row">
                        <span class="product-reviews__bar-lbl">1 Star</span>
                        <div class="product-reviews__bar-track">
                            <div class="product-reviews__bar-fill" style="width: 0%;"></div>
                        </div>
                        <span class="product-reviews__bar-count">0</span>
                    </div>
                </div>
            </div>

            <!-- BOTTOM 2-COLUMN GRID: REVIEWS LIST + ADD REVIEW FORM -->
            <div class="product-reviews__grid">
                
                <!-- LEFT COLUMN: RECENT REVIEWS -->
                <div class="product-reviews__list-column">
                    <div class="product-reviews__list-header">
                        <h3 class="product-reviews__column-title">Client Feedback</h3>
                        <span class="product-reviews__filter-badge">Showing 4 of 128 Reviews</span>
                    </div>

                    <ul class="product-reviews__list" id="productReviewsList">
                        <?php foreach ($product_reviews as $review): ?>
                            <li class="product-review-item">
                                <div class="product-review-item__head">
                                    <div class="product-review-item__author">
                                        <span class="product-review-item__avatar"><?php echo htmlspecialchars(mb_substr($review['name'], 0, 1)); ?></span>
                                        <div class="product-review-item__author-info">
                                            <h4 class="product-review-item__name"><?php echo htmlspecialchars($review['name']); ?></h4>
                                            <span class="product-review-item__meta"><?php echo htmlspecialchars($review['city'] . ' · ' . $review['date']); ?></span>
                                        </div>
                                    </div>
                                    <div class="product-review-item__rating">
                                        <span class="product-review-item__stars"><?php echo rk_stars($review['rating'], 13); ?></span>
                                        <span class="product-review-item__verified">✓ Verified Buyer</span>
                                    </div>
                                </div>
                                <p class="product-review-item__text"><?php echo htmlspecialchars($review['text']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- RIGHT COLUMN: ADD A REVIEW FORM -->
                <div class="product-reviews__form-column">
                    <div class="product-reviews__form-card">
                        <h3 class="product-reviews__column-title">Add a Review</h3>
                        <p class="product-reviews__form-sub">Share your experience with this handwoven weave.</p>

                        <form class="product-review-form" id="addReviewForm" onsubmit="event.preventDefault(); submitProductReview();">
                            
                            <div class="review-form-group">
                                <label class="review-form-label">Your Rating <span class="required">*</span></label>
                                <div class="review-star-picker" id="reviewStarPicker" data-rating="5">
                                    <?php for ($s = 1; $s <= 5; $s++): ?>
                                        <button type="button" class="star-pick-btn active" data-value="<?php echo $s; ?>" title="<?php echo $s; ?> Star<?php echo $s > 1 ? 's' : ''; ?>" aria-label="<?php echo $s; ?> Star">
                                            <svg class="star-pick-icon" width="22" height="22" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 1.7L15.3 8.4L22.7 9.5L17.3 14.7L18.6 22.1L12 18.6L5.4 22.1L6.7 14.7L1.3 9.5L8.7 8.4L12 1.7Z"/>
                                            </svg>
                                        </button>
                                    <?php endfor; ?>
                                </div>
                            </div>

                            <div class="review-form-row">
                                <div class="review-form-group">
                                    <label for="reviewName" class="review-form-label">Your Name <span class="required">*</span></label>
                                    <input type="text" id="reviewName" class="review-form-input" placeholder="e.g. Priya Sharma" required>
                                </div>
                                <div class="review-form-group">
                                    <label for="reviewEmail" class="review-form-label">Email Address <span class="required">*</span></label>
                                    <input type="email" id="reviewEmail" class="review-form-input" placeholder="e.g. priya@example.com" required>
                                </div>
                            </div>

                            <div class="review-form-group">
                                <label for="reviewText" class="review-form-label">Your Review <span class="required">*</span></label>
                                <textarea id="reviewText" class="review-form-textarea" rows="4" placeholder="Tell us about the drape, zari quality, color, and blouse fit..." required></textarea>
                            </div>

                            <button type="submit" class="review-submit-btn">SUBMIT REVIEW</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ==========================================================
         RELATED PRODUCTS SLIDER
         ========================================================== -->
    <?php
    $display_related = (count($related) > 0) ? array_merge($related, $related, $related) : $related;
    ?>
    <section class="product-slider-section" id="related-products" style="background-color: #faf5ea;">
        <div class="product-slider-section__inner">
            <header class="product-slider-section__header">
                <h2 class="product-slider-section__title">More Sarees to Explore</h2>
                <a href="shop" class="product-slider-section__view-all">
                    <span>VIEW ALL</span>
                    <svg class="product-slider-section__view-all-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </header>
            <div class="product-slider-section__divider"></div>
            <div class="product-slider-wrapper">
                <div class="swiper product-slider-swiper js-product-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($display_related as $item): 
                            $r_title      = $item['title'] ?? 'Luxury Silk Saree';
                            $r_price      = $item['price'] ?? '₹6,999';
                            $r_sale_price = $item['sale_price'] ?? null;
                            $r_image      = $item['image'] ?? 'assets/images/products/banarasi-kora-saree.jpg';
                            $r_link       = $item['link'] ?? '#product-detail';
                        ?>
                            <div class="swiper-slide">
                                <div class="product-card">
                                    <a href="<?php echo htmlspecialchars($r_link); ?>" class="product-card__link" aria-label="<?php echo htmlspecialchars($r_title); ?>">
                                        <div class="product-card__image-wrap">
                                            <img src="<?php echo htmlspecialchars($r_image); ?>" alt="<?php echo htmlspecialchars($r_title); ?>" class="product-card__image" loading="lazy" decoding="async">
                                            <button type="button" class="product-card__wishlist-btn js-wishlist-toggle" aria-label="Add to Wishlist">
                                                <svg class="product-card__heart-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
                                                </svg>
                                            </button>
                                            <button type="button" class="product-card__cart-btn js-add-cart" aria-label="Add to Cart">
                                                <svg class="product-card__cart-plus" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                </svg>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="product-card__info">
                                            <h3 class="product-card__title"><?php echo htmlspecialchars($r_title); ?></h3>
                                            <div class="product-card__price-row">
                                                <?php if ($r_sale_price): ?>
                                                    <span class="product-card__price product-card__price--sale"><?php echo htmlspecialchars($r_sale_price); ?></span>
                                                    <span class="product-card__price product-card__price--original"><?php echo htmlspecialchars($r_price); ?></span>
                                                <?php else: ?>
                                                    <span class="product-card__price"><?php echo htmlspecialchars($r_price); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="button" class="product-slider__arrow product-slider__arrow--prev js-swiper-prev" aria-label="Previous Products">
                    <?php echo rk_icon('curve-left', 18); ?>
                </button>
                <button type="button" class="product-slider__arrow product-slider__arrow--next js-swiper-next" aria-label="Next Products">
                    <?php echo rk_icon('curve-right', 18); ?>
                </button>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
