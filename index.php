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
                        <a href="#collections" class="featured-products__link">
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
                        <a href="#collections" class="featured-products__link">
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
                        <div class="collection-grid__card collection-grid__card--party">
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
                            <a href="#soft-silk" class="collection-grid__arrow-btn" aria-label="Explore Soft Silk Sarees">
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
                            <a href="#collections" class="btn-pill">
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
                        <div class="collection-grid__card collection-grid__card--kaftan">
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
                            <a href="#kuppadam" class="collection-grid__arrow-btn" aria-label="Explore Kuppadam Sico Sarees">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>

                        <!-- Kalanjali Silk Card -->
                        <div class="collection-grid__card collection-grid__card--bandhani">
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
                            <a href="#kalanjali" class="collection-grid__arrow-btn" aria-label="Explore Kalanjali Silk Sarees">
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
    // Section 1: Top Handpicked Sarees (Pure White Bg)
    $section_title = "Top Handpicked Sarees";
    $section_id    = "top-handpicked-sarees";
    $section_bg    = "#ffffff";
    $is_instagram  = false;
    $products      = [
        ['title' => 'Banarasi Kora Zari Silk Saree', 'price' => '₹8,999', 'sale_price' => '₹6,999', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => 'product-details.php?id=1'],
        ['title' => 'Tissue Silk Zari Brocade Saree', 'price' => '₹7,499', 'sale_price' => '₹5,999', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=2'],
        ['title' => 'Soft Silk Temple Border Saree', 'price' => '₹6,499', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=3'],
        ['title' => 'Kuppadam Sico Peacock Silk Saree', 'price' => '₹9,200', 'sale_price' => '₹7,800', 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=4'],
        ['title' => 'Kalanjali Silver Zari Silk Saree', 'price' => '₹11,500', 'sale_price' => null, 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => 'product-details.php?id=5'],
        ['title' => 'Pure Chanderi Handloom Silk Saree', 'price' => '₹5,800', 'sale_price' => '₹4,600', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=6'],
        ['title' => 'Paithani Royal Peacock Silk Saree', 'price' => '₹14,999', 'sale_price' => '₹12,499', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=7'],
        ['title' => 'Tussar Georgette Handcrafted Saree', 'price' => '₹8,200', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=8'],
    ];
    include __DIR__ . '/includes/product-slider.php';

    // Section 2: New Arrival Sarees (Pale Cream Bg)
    $section_title = "New Arrival Sarees";
    $section_id    = "new-arrival-sarees";
    $section_bg    = "#faf5ea";
    $is_instagram  = false;
    $products      = [
        ['title' => 'Organza Digital Floral Print Saree', 'price' => '₹4,999', 'sale_price' => '₹3,999', 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=2'],
        ['title' => 'Pastel Chiniya Zari Weave Saree', 'price' => '₹6,800', 'sale_price' => null, 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=3'],
        ['title' => 'Indigo Ajrakh Handloom Silk Saree', 'price' => '₹5,400', 'sale_price' => '₹4,400', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=4'],
        ['title' => 'Crimson Patola Georgette Silk Saree', 'price' => '₹8,900', 'sale_price' => null, 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=5'],
        ['title' => 'Tissue Zari Organza Sheer Saree', 'price' => '₹7,200', 'sale_price' => '₹5,800', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=2'],
        ['title' => 'Modern Draped Georgette Silk Saree', 'price' => '₹6,100', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=7'],
        ['title' => 'Linen Zari Border Handloom Saree', 'price' => '₹3,999', 'sale_price' => '₹3,299', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=8'],
        ['title' => 'Silk Cotton Floral Weave Saree', 'price' => '₹4,500', 'sale_price' => null, 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=9'],
    ];
    include __DIR__ . '/includes/product-slider.php';

    // Section 3: Instagram Collection (Soft Blush Bg, Square 1:1 Cards)
    $section_title = "Instagram Collection";
    $section_id    = "instagram-collection";
    $section_bg    = "#fdf3f0";
    $is_instagram  = true;
    $products      = [
        ['title' => 'Royal Velvet Border Heritage Saree', 'price' => '₹9,800', 'sale_price' => '₹7,900', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => null, 'link' => 'product-details.php?id=10'],
        ['title' => 'Aesthetic Champagne Silk Drape', 'price' => '₹8,400', 'sale_price' => null, 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => null, 'link' => 'product-details.php?id=11'],
        ['title' => 'Vintage Gold Banarasi Silk Saree', 'price' => '₹12,500', 'sale_price' => '₹9,999', 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => null, 'link' => 'product-details.php?id=12'],
        ['title' => 'Chic Boho Linen Silk Saree', 'price' => '₹4,800', 'sale_price' => null, 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => null, 'link' => 'product-details.php?id=13'],
        ['title' => 'Golden Hour Silk Heritage Drape', 'price' => '₹10,200', 'sale_price' => '₹8,600', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => null, 'link' => 'product-details.php?id=14'],
        ['title' => 'Festive Special Organza Saree', 'price' => '₹6,900', 'sale_price' => null, 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => null, 'link' => 'product-details.php?id=15'],
        ['title' => 'Bridal Velvet Heritage Edit Saree', 'price' => '₹15,000', 'sale_price' => '₹12,800', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => null, 'link' => 'product-details.php?id=17'],
        ['title' => 'Pastel Silk Drape Designer Saree', 'price' => '₹7,500', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => null, 'link' => 'product-details.php?id=17'],
    ];
    include __DIR__ . '/includes/product-slider.php';

    // Section 4: Mangalagiri Sarees (Pale Sage Green Bg)
    $section_title = "Mangalagiri Sarees";
    $section_id    = "mangalagiri-sarees";
    $section_bg    = "#f4f7f0";
    $is_instagram  = false;
    $products      = [
        ['title' => 'Mustard Handloom Mangalagiri Cotton Saree', 'price' => '₹3,499', 'sale_price' => '₹2,899', 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => 'product-details.php?id=18'],
        ['title' => 'Nizam Border Mangalagiri Silk Cotton Saree', 'price' => '₹4,200', 'sale_price' => null, 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=19'],
        ['title' => 'Pure Mangalagiri Zari Border Saree', 'price' => '₹5,100', 'sale_price' => '₹4,100', 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=6'],
        ['title' => 'Dual Tone Mangalagiri Silk Saree', 'price' => '₹4,800', 'sale_price' => null, 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=21'],
        ['title' => 'Checks Weave Mangalagiri Cotton Saree', 'price' => '₹3,200', 'sale_price' => '₹2,699', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=22'],
        ['title' => 'Stripe Pattern Mangalagiri Silk Saree', 'price' => '₹4,600', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=23'],
        ['title' => 'Temple Border Mangalagiri Handloom Saree', 'price' => '₹3,800', 'sale_price' => '₹3,100', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => 'product-details.php?id=24'],
        ['title' => 'Fine Count Mangalagiri Cotton Saree', 'price' => '₹3,600', 'sale_price' => null, 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=1'],
    ];
    include __DIR__ . '/includes/product-slider.php';

    // Section 5: Fancy Sarees (Pale Gold / Beige Bg)
    $section_title = "Fancy Sarees";
    $section_id    = "fancy-sarees";
    $section_bg    = "#faf6ea";
    $is_instagram  = false;
    $products      = [
        ['title' => 'Champagne Sequin Work Fancy Saree', 'price' => '₹8,900', 'sale_price' => '₹6,999', 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=2'],
        ['title' => 'Rose Net Embroidered Party Saree', 'price' => '₹7,600', 'sale_price' => null, 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=3'],
        ['title' => 'Metallic Wine Chiffon Shimmer Saree', 'price' => '₹6,500', 'sale_price' => '₹5,200', 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=4'],
        ['title' => 'Ruffle Border Designer Party Saree', 'price' => '₹9,400', 'sale_price' => null, 'image' => 'assets/images/collections/kuppadam-sico-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => 'product-details.php?id=5'],
        ['title' => 'Crystal Work Organza Fancy Saree', 'price' => '₹8,200', 'sale_price' => '₹6,800', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'SALE', 'badge_type' => 'maroon', 'link' => 'product-details.php?id=6'],
        ['title' => 'Shimmer Georgette Party Wear Saree', 'price' => '₹7,100', 'sale_price' => null, 'image' => 'assets/images/products/tissue-silk-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=7'],
        ['title' => 'Royal Satin Silk Fancy Border Saree', 'price' => '₹8,800', 'sale_price' => '₹7,200', 'image' => 'assets/images/collections/soft-silk-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark', 'link' => 'product-details.php?id=8'],
        ['title' => 'Glitter Sequins Embellished Saree', 'price' => '₹9,999', 'sale_price' => null, 'image' => 'assets/images/products/banarasi-kora-saree.jpg', 'badge' => 'NEW', 'badge_type' => 'royal', 'link' => 'product-details.php?id=9'],
    ];
    include __DIR__ . '/includes/product-slider.php';
    ?>

    <!-- ==========================================================
         CLIENT TESTIMONIALS SLIDER SECTION
         ========================================================== -->
    <?php include __DIR__ . '/includes/testimonials.php'; ?>

    <!-- ==========================================================
         FREQUENTLY ASKED QUESTIONS SECTION
         ========================================================== -->
    <?php include __DIR__ . '/includes/faq.php'; ?>

    <!-- ==========================================================
         HERITAGE & CRAFT JOURNAL — BLOG SLIDER SECTION
         ========================================================== -->
    <?php include __DIR__ . '/includes/blog-slider.php'; ?>

    <!-- ==========================================================
         TRUST PILLARS — USP STRIP
         ========================================================== -->
    <?php include __DIR__ . '/includes/trust-pillars.php'; ?>

</main>

<?php include 'includes/footer.php'; ?>
