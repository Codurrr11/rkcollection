<?php include 'includes/header.php'; ?>

<main class="site-main">

    <!-- ==========================================================
         HERO ROYAL GALLERY
         Features the 4 Indian palace polyfoil arches framing
         handcrafted heritage silk sarees with central insignia.
         ========================================================== -->
    <section class="hero hero--royal-gallery" id="hero">
        <div class="hero-slider carousel slide carousel-fade" id="heroSlider"
             data-bs-ride="carousel" data-bs-interval="3000"
             data-bs-pause="hover" data-bs-touch="true">

            <div class="carousel-inner hero-slider__track">
                <div class="carousel-item hero-slider__slide hero-slider__slide--1 active">
                    <img class="hero__banner"
                         src="assets/images/banners/banner.png"
                         width="1672" height="941"
                         alt="RK Collection — handwoven heritage silk sarees"
                         loading="eager" decoding="sync">
                </div>
                <div class="carousel-item hero-slider__slide hero-slider__slide--2">
                    <img class="hero__banner"
                         src="assets/images/banners/banner2.png"
                         width="1808" height="870"
                         alt="RK Collection — festive and bridal silk edit"
                         loading="eager" decoding="async">
                </div>
                <div class="carousel-item hero-slider__slide hero-slider__slide--3">
                    <img class="hero__banner"
                         src="assets/images/banners/banner3.png"
                         width="1672" height="941"
                         alt="RK Collection — artisanal handloom pure silks"
                         loading="eager" decoding="async">
                </div>
            </div>

            <button class="hero-slider__arrow hero-slider__arrow--prev" type="button"
                    data-bs-target="#heroSlider" data-bs-slide="prev" aria-label="Previous slide">
                <?php echo rk_icon('curve-left', 20, 2); ?>
            </button>
            <button class="hero-slider__arrow hero-slider__arrow--next" type="button"
                    data-bs-target="#heroSlider" data-bs-slide="next" aria-label="Next slide">
                <?php echo rk_icon('curve-right', 20, 2); ?>
            </button>

            <div class="hero-slider__dots carousel-indicators">
                <button type="button" class="hero-slider__dot active"
                        data-bs-target="#heroSlider" data-bs-slide-to="0"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" class="hero-slider__dot"
                        data-bs-target="#heroSlider" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" class="hero-slider__dot"
                        data-bs-target="#heroSlider" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
            </div>

            <!-- Sleek Minimal Anchor Button -->
            <div class="hero-slider__cta-wrap">
                <a href="#about" class="hero-slider__anchor-btn" aria-label="Explore collection">
                    <span class="hero-slider__anchor-text">EXPLORE COLLECTION</span>
                    <span class="hero-slider__anchor-icon" aria-hidden="true">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="7" y1="17" x2="17" y2="7"></line>
                            <polyline points="7 7 17 7 17 17"></polyline>
                        </svg>
                    </span>
                </a>
            </div>

        </div>
    </section>

    <!-- ==========================================================
         FEATURED PRODUCTS & SHOP BY COLLECTION
         Sub-block 1: Asymmetric 2-column featured products layout with "COLLECTION" watermark
         Sub-block 2: Shop By Collection masonry grid on pale yellow full-bleed ground
         ========================================================== -->
    <section class="featured-products" id="featuredProducts">

        <!-- SUB-BLOCK 1: Featured Products -->
        <div class="featured-products__inner">

            <!-- Rotated Vertical Watermark Text -->
            <div class="featured-products__watermark" aria-hidden="true">COLLECTION</div>

            <div class="featured-products__grid">

                <!-- Left Card (Top-Left, Taller) -->
                <article class="featured-products__card featured-products__card--left">
                    <div class="featured-products__image-container">
                        <div class="framed-image">
                            <img src="assets/images/products/banarasi-kora-saree.jpg"
                                 alt="Banarasi Kora Silk Sarees"
                                 loading="lazy" decoding="async">
                        </div>
                    </div>
                    <div class="featured-products__content">
                        <h3 class="featured-products__title">Banarasi Kora Silk Sarees</h3>
                        <p class="featured-products__desc">
                            Handcrafted with fine zari weave, lightweight organza texture and royal heritage floral brocade motifs.
                        </p>
                        <a href="shop?category=banarasi" class="featured-products__link">
                            <span>Shop now</span>
                            <svg class="featured-products__link-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Right Card (Top-Right, Offset Lower) -->
                <article class="featured-products__card featured-products__card--right">
                    <div class="featured-products__content">
                        <h3 class="featured-products__title">Tissue Silk Sarees</h3>
                        <p class="featured-products__desc">
                            Luminous sheer tissue weave with shimmering metallic sheen and delicate gold brocade borders.
                        </p>
                        <a href="shop?category=silk" class="featured-products__link">
                            <span>Shop now</span>
                            <svg class="featured-products__link-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                    <div class="featured-products__image-container">
                        <div class="framed-image">
                            <img src="assets/images/products/tissue-silk-saree.jpg"
                                 alt="Tissue Silk Sarees"
                                 loading="lazy" decoding="async">
                        </div>
                    </div>
                </article>

            </div>
        </div>

        <!-- SUB-BLOCK 2: Shop By Collection -->
        <div class="shop-by-collection">
            <div class="shop-by-collection__inner">

                <!-- Section Header -->
                <header class="shop-by-collection__header">
                    <span class="shop-by-collection__eyebrow">SHOP BY</span>
                    <h2 class="shop-by-collection__heading">COLLECTION</h2>
                </header>

                <!-- Grid Layout -->
                <div class="collection-grid">

                    <!-- LEFT COLUMN: Soft Silk Sarees + Text Block -->
                    <div class="collection-grid__col collection-grid__col--left">
                        <!-- Soft Silk Card -->
                        <div class="collection-grid__card collection-grid__card--soft-silk">
                            <div class="collection-grid__image-wrap">
                                <div class="framed-image">
                                    <img src="assets/images/collections/soft-silk-saree.jpg"
                                         alt="Soft Silk Sarees"
                                         loading="lazy" decoding="async">
                                </div>
                            </div>
                            <div class="collection-grid__overlay">
                                <span class="collection-grid__label">Soft Silk</span>
                                <span class="collection-grid__script">Sarees</span>
                            </div>
                            <a href="shop?category=silk" class="collection-grid__arrow-btn" aria-label="Explore Soft Silk Sarees">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>

                        <!-- Text Block below Soft Silk Card -->
                        <div class="collection-grid__info-block">
                            <h3 class="collection-grid__info-heading">
                                THIS SEASON WE EXPLORED THE ARTISTRY OF PURE SILK SAREES.
                            </h3>
                            <p class="collection-grid__info-text">
                                RK Collection brings you 'Serenity of Silk', our masterwork saree collection woven by heritage artisans with pure silk threads.
                            </p>
                            <a href="shop" class="btn-pill">
                                <span>Show More</span>
                                <svg class="btn-pill__icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: Stacked Kuppadam Sico & Kalanjali Silk Cards -->
                    <div class="collection-grid__col collection-grid__col--right">
                        <!-- Kuppadam Sico Card -->
                        <div class="collection-grid__card collection-grid__card--kuppadam">
                            <div class="collection-grid__image-wrap">
                                <div class="framed-image">
                                    <img src="assets/images/collections/kuppadam-sico-saree.jpg"
                                         alt="Kuppadam Sico Sarees"
                                         loading="lazy" decoding="async">
                                </div>
                            </div>
                            <div class="collection-grid__overlay">
                                <span class="collection-grid__label">Kuppadam Sico</span>
                                <span class="collection-grid__script">Sarees</span>
                            </div>
                            <a href="shop?category=cotton" class="collection-grid__arrow-btn" aria-label="Explore Kuppadam Sico Sarees">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>

                        <!-- Kalanjali Silk Card -->
                        <div class="collection-grid__card collection-grid__card--kalanjali">
                            <div class="collection-grid__image-wrap">
                                <div class="framed-image">
                                    <img src="assets/images/collections/kalanjali-silk-saree.jpg"
                                         alt="Kalanjali Silk Sarees"
                                         loading="lazy" decoding="async">
                                </div>
                            </div>
                            <div class="collection-grid__overlay">
                                <span class="collection-grid__label">Kalanjali Silk</span>
                                <span class="collection-grid__script">Sarees</span>
                            </div>
                            <a href="shop?category=designer" class="collection-grid__arrow-btn" aria-label="Explore Kalanjali Silk Sarees">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- ==========================================================
         ABOUT — editorial poster: blush linen ground, blush disc,
         cut-out portrait, flanking Heritage / Elegance blocks.
         ========================================================== -->
    <section class="about" id="about">
        <div class="about__inner">

            <span class="rk-script rk-script--wine">woven with care</span>
            <h2 class="about__title">RK Collection</h2>

            <div class="about__stage">

                <div class="about__col about__col--left">
                    <h3 class="about__label">Heritage</h3>
                    <p class="about__text">
                        Every drape begins at the loom. Motifs kept within
                        weaving families for generations, set thread by thread
                        over weeks of patient work.
                    </p>
                </div>

                <figure class="about__figure">
                    <span class="about__disc" aria-hidden="true"></span>
                    <img class="about__portrait"
                         src="assets/images/banners/about-image.png"
                         width="1024" height="1536"
                         alt="Model wearing a handwoven Patola silk saree"
                         loading="lazy" decoding="async">
                </figure>

                <div class="about__col about__col--right">
                    <h3 class="about__label">Elegance</h3>
                    <p class="about__text">
                        Quiet luxury, made to be worn. Sarees that carry you
                        through weddings, festivals, and the ordinary evenings
                        in between.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ==========================================================
         PRODUCT SLIDER SECTIONS (5 REUSABLE INSTANCES)
         ========================================================== -->
    <?php
    if (!function_exists('rk_render_product_slider')) {
        function rk_render_product_slider($section_title, $section_id, $section_bg, $products, $is_instagram = false) {
            $is_instagram = $is_instagram ?? false;
            $section_bg   = $section_bg ?? '#ffffff';
            $section_id   = $section_id ?? ('product-slider-' . uniqid());
            $products     = $products ?? [];
            $display_products = (count($products) > 0) ? array_merge($products, $products, $products) : $products;
            ?>
            <section class="product-slider-section" id="<?php echo htmlspecialchars($section_id); ?>" style="background-color: <?php echo htmlspecialchars($section_bg); ?>;">
                <div class="product-slider-section__inner">
                    <header class="product-slider-section__header">
                        <h2 class="product-slider-section__title"><?php echo htmlspecialchars($section_title); ?></h2>
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
                                <?php foreach ($display_products as $item): 
                                    $title      = $item['title'] ?? 'Luxury Silk Saree';
                                    $price      = $item['price'] ?? '₹6,999';
                                    $sale_price = $item['sale_price'] ?? null;
                                    $image      = $item['image'] ?? 'assets/images/products/banarasi-kora-saree.jpg';
                                    $link       = $item['link'] ?? 'shop.php';
                                ?>
                                    <div class="swiper-slide">
                                        <div class="product-card <?php echo $is_instagram ? 'product-card--instagram' : ''; ?>">
                                            <a href="<?php echo htmlspecialchars($link); ?>" class="product-card__link" aria-label="<?php echo htmlspecialchars($title); ?>">
                                                <div class="product-card__image-wrap">
                                                    <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" class="product-card__image" loading="lazy" decoding="async">
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
                        <button type="button" class="product-slider__arrow product-slider__arrow--prev js-swiper-prev" aria-label="Previous Products">
                            <?php echo rk_icon('curve-left', 18); ?>
                        </button>
                        <button type="button" class="product-slider__arrow product-slider__arrow--next js-swiper-next" aria-label="Next Products">
                            <?php echo rk_icon('curve-right', 18); ?>
                        </button>
                    </div>
                </div>
            </section>
            <?php
        }
    }

    // Section 1: Top Handpicked Sarees (Pure White Bg)
    rk_render_product_slider("Top Handpicked Sarees", "top-handpicked-sarees", "#ffffff", [
        ['title' => 'Banarasi Kora Zari Silk Saree', 'price' => '₹8,999', 'sale_price' => '₹6,999', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => rk_product_url(1)],
        ['title' => 'Tissue Silk Zari Brocade Saree', 'price' => '₹7,499', 'sale_price' => '₹5,999', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(2)],
        ['title' => 'Soft Silk Temple Border Saree', 'price' => '₹6,499', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(3)],
        ['title' => 'Kuppadam Sico Peacock Silk Saree', 'price' => '₹9,200', 'sale_price' => '₹7,800', 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(4)],
        ['title' => 'Kalanjali Silver Zari Silk Saree', 'price' => '₹11,500', 'sale_price' => null, 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => rk_product_url(5)],
        ['title' => 'Pure Chanderi Handloom Silk Saree', 'price' => '₹5,800', 'sale_price' => '₹4,600', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(6)],
        ['title' => 'Paithani Royal Peacock Silk Saree', 'price' => '₹14,999', 'sale_price' => '₹12,499', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(7)],
        ['title' => 'Tussar Georgette Handcrafted Saree', 'price' => '₹8,200', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(8)],
    ]);

    // Section 2: New Arrival Sarees (Pale Cream Bg)
    rk_render_product_slider("New Arrival Sarees", "new-arrival-sarees", "#faf5ea", [
        ['title' => 'Organza Digital Floral Print Saree', 'price' => '₹4,999', 'sale_price' => '₹3,999', 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(2)],
        ['title' => 'Pastel Chiniya Zari Weave Saree', 'price' => '₹6,800', 'sale_price' => null, 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(3)],
        ['title' => 'Indigo Ajrakh Handloom Silk Saree', 'price' => '₹5,400', 'sale_price' => '₹4,400', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(4)],
        ['title' => 'Crimson Patola Georgette Silk Saree', 'price' => '₹8,900', 'sale_price' => null, 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(5)],
        ['title' => 'Tissue Zari Organza Sheer Saree', 'price' => '₹7,200', 'sale_price' => '₹5,800', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(2)],
        ['title' => 'Modern Draped Georgette Silk Saree', 'price' => '₹6,100', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(7)],
        ['title' => 'Linen Zari Border Handloom Saree', 'price' => '₹3,999', 'sale_price' => '₹3,299', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(8)],
        ['title' => 'Silk Cotton Floral Weave Saree', 'price' => '₹4,500', 'sale_price' => null, 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(9)],
    ]);

    // Section 3: Instagram Collection (Soft Blush Bg, Square 1:1 Cards)
    rk_render_product_slider("Instagram Collection", "instagram-collection", "#fdf3f0", [
        ['title' => 'Royal Velvet Border Heritage Saree', 'price' => '₹9,800', 'sale_price' => '₹7,900', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => null, 'link' => rk_product_url(10)],
        ['title' => 'Aesthetic Champagne Silk Drape', 'price' => '₹8,400', 'sale_price' => null, 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => null, 'link' => rk_product_url(11)],
        ['title' => 'Vintage Gold Banarasi Silk Saree', 'price' => '₹12,500', 'sale_price' => '₹9,999', 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => null, 'link' => rk_product_url(12)],
        ['title' => 'Chic Boho Linen Silk Saree', 'price' => '₹4,800', 'sale_price' => null, 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => null, 'link' => rk_product_url(13)],
        ['title' => 'Golden Hour Silk Heritage Drape', 'price' => '₹10,200', 'sale_price' => '₹8,600', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => null, 'link' => rk_product_url(14)],
        ['title' => 'Festive Special Organza Saree', 'price' => '₹6,900', 'sale_price' => null, 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => null, 'link' => rk_product_url(15)],
        ['title' => 'Bridal Velvet Heritage Edit Saree', 'price' => '₹15,000', 'sale_price' => '₹12,800', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => null, 'link' => rk_product_url(17)],
        ['title' => 'Pastel Silk Drape Designer Saree', 'price' => '₹7,500', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => null, 'link' => rk_product_url(17)],
    ], true);

    // Section 4: Mangalagiri Sarees (Pale Sage Green Bg)
    rk_render_product_slider("Mangalagiri Sarees", "mangalagiri-sarees", "#f4f7f0", [
        ['title' => 'Mustard Handloom Mangalagiri Cotton Saree', 'price' => '₹3,499', 'sale_price' => '₹2,899', 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => rk_product_url(18)],
        ['title' => 'Nizam Border Mangalagiri Silk Cotton Saree', 'price' => '₹4,200', 'sale_price' => null, 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(19)],
        ['title' => 'Pure Mangalagiri Zari Border Saree', 'price' => '₹5,100', 'sale_price' => '₹4,100', 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(6)],
        ['title' => 'Dual Tone Mangalagiri Silk Saree', 'price' => '₹4,800', 'sale_price' => null, 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(21)],
        ['title' => 'Checks Weave Mangalagiri Cotton Saree', 'price' => '₹3,200', 'sale_price' => '₹2,699', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(22)],
        ['title' => 'Stripe Pattern Mangalagiri Silk Saree', 'price' => '₹4,600', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(23)],
        ['title' => 'Temple Border Mangalagiri Handloom Saree', 'price' => '₹3,800', 'sale_price' => '₹3,100', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => rk_product_url(24)],
        ['title' => 'Fine Count Mangalagiri Cotton Saree', 'price' => '₹3,600', 'sale_price' => null, 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(1)],
    ]);

    // Section 5: Fancy Sarees (Pale Gold / Beige Bg)
    rk_render_product_slider("Fancy Sarees", "fancy-sarees", "#faf6ea", [
        ['title' => 'Champagne Sequin Work Fancy Saree', 'price' => '₹8,900', 'sale_price' => '₹6,999', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(2)],
        ['title' => 'Rose Net Embroidered Party Saree', 'price' => '₹7,600', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(3)],
        ['title' => 'Metallic Wine Chiffon Shimmer Saree', 'price' => '₹6,500', 'sale_price' => '₹5,200', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(4)],
        ['title' => 'Ruffle Border Designer Party Saree', 'price' => '₹9,400', 'sale_price' => null, 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => rk_product_url(5)],
        ['title' => 'Crystal Work Organza Fancy Saree', 'price' => '₹8,200', 'sale_price' => '₹6,800', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => rk_product_url(6)],
        ['title' => 'Shimmer Georgette Party Wear Saree', 'price' => '₹7,100', 'sale_price' => null, 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(7)],
        ['title' => 'Royal Satin Silk Fancy Border Saree', 'price' => '₹8,800', 'sale_price' => '₹7,200', 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => rk_product_url(8)],
        ['title' => 'Glitter Sequins Embellished Saree', 'price' => '₹9,999', 'sale_price' => null, 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => rk_product_url(9)],
    ]);
    ?>

    <!-- ==========================================================
         CLIENT TESTIMONIALS SLIDER SECTION
         ========================================================== -->
    <?php
    $testimonials = [
        ['name' => 'Priya Sharma', 'location' => 'Mumbai', 'avatar' => 'assets/images/banners/about-image.png', 'quote' => 'The Banarasi Kora silk saree I ordered for my sister’s wedding exceeded all expectations. The zari weave is so rich and surprisingly lightweight!', 'date' => '18 Feb 2026'],
        ['name' => 'Ananya Reddi', 'location' => 'Hyderabad', 'avatar' => 'assets/images/products/banarasi-kora-saree.jpg', 'quote' => 'RK Collection’s Soft Silk sarees are pure luxury. The drape is effortless and the colors are even more radiant and vibrant in person.', 'date' => '24 Feb 2026'],
        ['name' => 'Meera Iyer', 'location' => 'Chennai', 'avatar' => 'assets/images/collections/soft-silk-saree.jpg', 'quote' => 'Received my Kanjivaram pure silk saree within 3 days. Authentic handloom quality with pure silk mark certification. Truly royal!', 'date' => '02 Mar 2026'],
        ['name' => 'Kavita Patel', 'location' => 'Ahmedabad', 'avatar' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'quote' => 'The Kuppadam Sico saree has such a royal peacock zari border! Got endless compliments at our family festival celebration.', 'date' => '10 Mar 2026'],
        ['name' => 'Sunita Bannerjee', 'location' => 'Kolkata', 'avatar' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'quote' => 'I was hesitant to buy luxury sarees online, but RK Collection’s customer care and prompt delivery won me over. Superb weaving quality!', 'date' => '15 Mar 2026'],
    ];
    $testimonials_display = array_merge($testimonials, $testimonials);
    ?>
    <section class="testimonials" id="testimonials">
        <div class="testimonials__inner">
            <header class="testimonials__header">
                <span class="rk-script rk-script--center">in her words</span>
                <h2 class="testimonials__title">Words of Appreciation</h2>
                <span class="rk-zari-rule" aria-hidden="true"></span>
                <p class="testimonials__subtitle">Cherished experiences from women who celebrate their special moments in RK Collection sarees</p>
            </header>
            <div class="testimonials__slider-wrap">
                <div class="swiper testimonials__swiper js-testimonials-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($testimonials_display as $item): ?>
                            <div class="swiper-slide">
                                <div class="testimonials__card">
                                    <div class="testimonials__user-row">
                                        <img src="<?php echo htmlspecialchars($item['avatar']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="testimonials__avatar" loading="lazy" decoding="async">
                                        <div class="testimonials__user-meta">
                                            <h3 class="testimonials__name"><?php echo htmlspecialchars($item['name']); ?></h3>
                                            <span class="testimonials__location"><?php echo htmlspecialchars($item['location']); ?></span>
                                            <div class="testimonials__stars" aria-label="5 out of 5 stars">
                                                <?php for ($s = 0; $s < 5; $s++): ?>
                                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="#f59e0b" stroke="none" aria-hidden="true">
                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                    </svg>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="testimonials__quote">“<?php echo htmlspecialchars($item['quote']); ?>”</p>
                                    <div class="testimonials__card-footer">
                                        <span class="testimonials__date"><?php echo htmlspecialchars($item['date']); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         FREQUENTLY ASKED QUESTIONS SECTION
         ========================================================== -->
    <?php
    $faqs = [
        ['question' => 'Are all your sarees 100% authentic handloom with Silk Mark certification?', 'answer' => 'Yes, every pure silk saree from RK Collection comes with official Silk Mark Organization of India certification, guaranteeing 100% pure silk yarns and authentic handloom zari craftsmanship.'],
        ['question' => 'Do you offer complimentary Fall & Piku or custom blouse stitching?', 'answer' => 'We provide complimentary Fall and Piku finishing on all orders. Additionally, our master tailors offer bespoke blouse stitching services tailored to your exact measurements.'],
        ['question' => 'What is the estimated delivery timeframe across India and worldwide?', 'answer' => 'Domestic orders within India are delivered within 3–5 business days via express courier. International orders are shipped via DHL/FedEx Express and reach you within 5–7 business days.'],
        ['question' => 'Can I schedule a live video call to view saree colors and texture before buying?', 'answer' => 'Absolutely! We invite you to book a 1-on-1 WhatsApp video shopping session with our saree drapers to inspect thread work, zari sheen, and drape fluidity in real-time.'],
        ['question' => 'What is your return, exchange, and order cancellation policy?', 'answer' => 'We offer a seamless 7-day exchange window for unstitched sarees in original condition with tags intact. If you receive a damaged product, we process instant replacements.'],
    ];
    ?>
    <section class="faq" id="faq">
        <div class="faq__inner">
            <header class="faq__head">
                <span class="faq__eyebrow">Frequently Asked Questions</span>
                <h2 class="faq__title">Your questions answered</h2>
                <p class="faq__subtitle">Everything about our handloom weaves, Silk Mark certification, worldwide delivery and custom tailoring &mdash; answered by the people who drape them.</p>
            </header>
            <ul class="faq__accordion">
                <?php foreach ($faqs as $index => $faq): ?>
                    <li class="faq__item<?php echo $index === 0 ? ' is-open' : ''; ?>">
                        <button type="button" class="faq__button" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="faq-panel-<?php echo $index; ?>">
                            <span class="faq__index" aria-hidden="true"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                            <span class="faq__question-text"><?php echo htmlspecialchars($faq['question']); ?></span>
                            <span class="faq__toggle" aria-hidden="true"></span>
                        </button>
                        <div class="faq__answer-panel" id="faq-panel-<?php echo $index; ?>">
                            <div class="faq__answer-content">
                                <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="faq__foot">
                <p class="faq__foot-text">Still deciding? Speak with a saree draper.</p>
                <a href="https://wa.me/919876543210" target="_blank" rel="noopener noreferrer" class="faq__cta">
                    <span>Talk to an Expert</span>
                    <span class="faq__cta-arrow" aria-hidden="true"><?php echo rk_icon('arrow-right', 15, 1.7); ?></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         HERITAGE & CRAFT JOURNAL — BLOG SLIDER SECTION
         ========================================================== -->
    <?php
    $articles = [
        ['title' => 'The Sacred Art of Kadwa Weaving in Pure Gold Zari', 'category' => 'HERITAGE WEAVING', 'date' => 'SEP 02, 2026', 'read' => '5 MIN READ', 'excerpt' => 'Discover the intricate handloom technique passed down through generations of master Varanasi weavers, crafting motifs without loose threads.', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'link' => rk_article_url(1)],
        ['title' => 'Kanjivaram Secrets: Identifying Pure Silk & Real Silver Zari', 'category' => 'AUTHENTICITY GUIDE', 'date' => 'AUG 28, 2026', 'read' => '4 MIN READ', 'excerpt' => 'How to test silk mark authenticity, inspect Korvai borders, and spot authentic silver-plated zari threads in royal South Indian handlooms.', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'link' => rk_article_url(2)],
        ['title' => 'The Renaissance of Metallic Tissue Silks in Festive Fashion', 'category' => 'FASHION TRENDS', 'date' => 'AUG 20, 2026', 'read' => '6 MIN READ', 'excerpt' => 'Exploring why lightweight tissue silk sarees with subtle golden sheen have become the preferred choice for modern bridal celebrations.', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'link' => rk_article_url(3)],
    ];
    $articles_display = array_merge($articles, $articles);
    ?>
    <section class="blog-section" id="blog-journal">
        <div class="blog-section__inner">
            <header class="blog-section__header">
                <div class="blog-section__header-left">
                    <span class="blog-section__eyebrow">HERITAGE & CRAFT JOURNAL</span>
                    <h2 class="blog-section__title">Stories from the Handloom</h2>
                </div>
                <div class="blog-section__header-right">
                    <div class="blog-section__nav-btns">
                        <button type="button" class="blog-section__arrow blog-section__arrow--prev js-blog-prev" aria-label="Previous Articles">
                            <?php echo rk_icon('curve-left', 18); ?>
                        </button>
                        <button type="button" class="blog-section__arrow blog-section__arrow--next js-blog-next" aria-label="Next Articles">
                            <?php echo rk_icon('curve-right', 18); ?>
                        </button>
                    </div>
                </div>
            </header>
            <div class="swiper blog-section__swiper js-blog-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($articles_display as $article): ?>
                        <div class="swiper-slide">
                            <article class="blog-card">
                                <a href="<?php echo htmlspecialchars($article['link']); ?>" class="blog-card__image-link">
                                    <div class="blog-card__image-wrapper">
                                        <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="blog-card__img" loading="lazy">
                                    </div>
                                </a>
                                <div class="blog-card__content">
                                    <div class="blog-card__meta">
                                        <span class="blog-card__category"><?php echo htmlspecialchars($article['category']); ?></span>
                                        <span class="blog-card__dot">•</span>
                                        <span class="blog-card__read-time"><?php echo htmlspecialchars($article['read']); ?></span>
                                    </div>
                                    <h3 class="blog-card__title">
                                        <a href="<?php echo htmlspecialchars($article['link']); ?>">
                                            <?php echo htmlspecialchars($article['title']); ?>
                                        </a>
                                    </h3>
                                    <p class="blog-card__excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                                    <a href="<?php echo htmlspecialchars($article['link']); ?>" class="blog-card__read-more">
                                        <span>Read Story</span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="blog-section__footer">
                <a href="blog.php" class="blog-section__view-all-btn">
                    <span>View All Journal Entries</span>
                    <?php echo rk_icon('curve-right', 16); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         TRUST PILLARS — USP STRIP
         ========================================================== -->
    <?php
    $trust_pillars = [
        ['icon' => '<svg width="36" height="36" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 36h32"/><path d="M12 36V20l12-8 12 8v16"/><rect x="18" y="26" width="12" height="10" rx="1"/><path d="M24 26v10"/><path d="M18 31h12"/></svg>', 'title' => 'Fast Delivery', 'desc' => 'Delivery within 3-5 days'],
        ['icon' => '<svg width="36" height="36" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="14" width="36" height="24" rx="3"/><path d="M6 22h36"/><path d="M12 30h8"/><path d="M12 34h4"/><circle cx="36" cy="32" r="3"/></svg>', 'title' => 'Quick Payment', 'desc' => '100% secure payment'],
        ['icon' => '<svg width="36" height="36" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4v6"/><path d="M24 38v6"/><path d="M4 24h6"/><path d="M38 24h6"/><circle cx="24" cy="24" r="14"/><path d="M24 16v8l6 4"/></svg>', 'title' => 'Customer Support', 'desc' => 'Support with a quick response'],
        ['icon' => '<svg width="36" height="36" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4 6 14v4h36v-4Z"/><path d="M10 18v18"/><path d="M18 18v18"/><path d="M30 18v18"/><path d="M38 18v18"/><path d="M4 36h40"/><path d="M6 40h36"/><circle cx="24" cy="10" r="2" fill="currentColor" stroke="none"/></svg>', 'title' => 'Material Quality', 'desc' => 'Best quality is our motto'],
    ];
    ?>
    <section class="trust-pillars" id="trust-pillars">
        <div class="trust-pillars__inner">
            <?php foreach ($trust_pillars as $i => $pillar): ?>
                <div class="trust-pillars__item">
                    <span class="trust-pillars__icon">
                        <?php echo $pillar['icon']; ?>
                    </span>
                    <div class="trust-pillars__text">
                        <h4 class="trust-pillars__title"><?php echo htmlspecialchars($pillar['title']); ?></h4>
                        <p class="trust-pillars__desc"><?php echo htmlspecialchars($pillar['desc']); ?></p>
                    </div>
                </div>
                <?php if ($i < count($trust_pillars) - 1): ?>
                    <span class="trust-pillars__divider" aria-hidden="true"></span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
