<?php
/**
 * Reusable Product Slider Section Component
 *
 * @var string $section_title   Header title (e.g., "Top Handpicked Sarees")
 * @var string $section_id      Unique element ID for Swiper instance
 * @var string $section_bg      Full-bleed background color (e.g., "#ffffff", "#faf5ea")
 * @var array  $products        List of product array items
 * @var bool   $is_instagram    Optional: true for 1:1 square cards
 */

$is_instagram = $is_instagram ?? false;
$section_bg   = $section_bg ?? '#ffffff';
$section_id   = $section_id ?? ('product-slider-' . uniqid());
$products         = $products ?? [];
$display_products = (count($products) > 0) ? array_merge($products, $products, $products) : $products;
?>

<section class="product-slider-section" id="<?php echo htmlspecialchars($section_id); ?>" style="background-color: <?php echo htmlspecialchars($section_bg); ?>;">
    <div class="product-slider-section__inner">

        <!-- SECTION HEADER -->
        <header class="product-slider-section__header">
            <h2 class="product-slider-section__title"><?php echo htmlspecialchars($section_title); ?></h2>
            <a href="#view-all" class="product-slider-section__view-all">
                <span>VIEW ALL</span>
                <svg class="product-slider-section__view-all-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </header>

        <div class="product-slider-section__divider"></div>

        <!-- SLIDER WRAPPER -->
        <div class="product-slider-wrapper">
            <div class="swiper product-slider-swiper js-product-swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($display_products as $item): ?>
                        <?php
                        $title      = $item['title'] ?? 'Luxury Silk Saree';
                        $price      = $item['price'] ?? '₹6,999';
                        $sale_price = $item['sale_price'] ?? null;
                        $image      = $item['image'] ?? 'assets/images/products/banarasi-kora-saree.jpg';
                        $badge      = $item['badge'] ?? null;
                        $badge_type = $item['badge_type'] ?? 'gold'; // gold, maroon, dark
                        $link       = $item['link'] ?? '#product-detail';
                        ?>
                        <div class="swiper-slide">
                            <div class="product-card <?php echo $is_instagram ? 'product-card--instagram' : ''; ?>">
                                <a href="<?php echo htmlspecialchars($link); ?>" class="product-card__link" aria-label="<?php echo htmlspecialchars($title); ?>">

                                    <!-- Image Box -->
                                    <div class="product-card__image-wrap">
                                        <img src="<?php echo htmlspecialchars($image); ?>"
                                             alt="<?php echo htmlspecialchars($title); ?>"
                                             class="product-card__image"
                                             loading="lazy"
                                             decoding="async">

                                        <!-- Wishlist Heart Button Top Right -->
                                        <button type="button" class="product-card__wishlist-btn js-wishlist-toggle" aria-label="Add to Wishlist">
                                            <svg class="product-card__heart-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
                                            </svg>
                                        </button>

                                        <!-- Shopping Bag Cart Button Bottom Right -->
                                        <button type="button" class="product-card__cart-btn js-add-cart" aria-label="Add to Shopping Bag">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Product Meta Info -->
                                    <div class="product-card__info">
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
            </div>

            <!-- Navigation Arrow Buttons (Matching Hero Slider Curved Arrows) -->
            <button type="button" class="product-slider__arrow product-slider__arrow--prev js-swiper-prev" aria-label="Previous Products">
                <?php echo rk_icon('curve-left', 18); ?>
            </button>
            <button type="button" class="product-slider__arrow product-slider__arrow--next js-swiper-next" aria-label="Next Products">
                <?php echo rk_icon('curve-right', 18); ?>
            </button>
        </div>

    </div>
</section>
