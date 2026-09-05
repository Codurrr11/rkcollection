<?php
/**
 * RK COLLECTION — ABOUT US PAGE
 */

$page_title = 'About Us | RK Collection — Handwoven Heritage Silks';
$page_css   = ['assets/css/pages.css'];
$page_js    = ['assets/js/about.js'];

include 'includes/header.php';
?>

<main class="site-main about-page" id="aboutPage">

    <!-- ==========================================================
         SECTION 1: HERO
         ========================================================== -->
    <section class="about-hero">
        <div class="about-hero__inner">
            <span class="about-hero__eyebrow">Built on Handloom Heritage</span>
            <span class="rk-script rk-script--center rk-script--lg">nine yards of it</span>
            <h1 class="about-hero__title">
                RK Collections<br>
                Handloom Weaves
            </h1>
            <p class="about-hero__desc">
                We bring life to pure silk threads, turning simple moments into lasting impressions with our blend of heritage craftsmanship and regal elegance. Join us on a journey where every weave is a testament to our passion for traditional saree artistry.
            </p>
        </div>
    </section>

    <!-- ==========================================================
         SECTION 2: FLOATING OVERLAP CARD (SERVICES / PILLARS)
         ========================================================== -->
    <div class="about-pillars-wrap">
        <div class="about-pillars-card">
            <h2 class="about-pillars-card__heading">
                Sourcing & styling beautiful<br>
                sarees for any occasion.
            </h2>

            <div class="about-pillars-grid">
                
                <!-- 1. Services -->
                <div class="about-pillar-col">
                    <div class="about-pillar-col__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22v-8"></path>
                            <path d="M12 14C8 14 5 11 5 7c4 0 7 3 7 7z"></path>
                            <path d="M12 14c4 0 7-3 7-7-4 0-7 3-7 7z"></path>
                        </svg>
                    </div>
                    <span class="about-pillar-col__label">Services</span>
                    <p class="about-pillar-col__desc">
                        Explore our bespoke saree services, tailored to add a touch of elegance and artistry to every occasion.
                    </p>
                    <a href="shop.php" class="about-pillar-col__link">
                        Explore Services
                        <svg class="link-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- 2. Heritage / Course -->
                <div class="about-pillar-col">
                    <div class="about-pillar-col__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                    </div>
                    <span class="about-pillar-col__label">Heritage</span>
                    <p class="about-pillar-col__desc">
                        Discover our authentic weaving techniques — a blend of pure silk, gold zari, and timeless craftsmanship.
                    </p>
                    <a href="#aboutIntro" class="about-pillar-col__link">
                        Discover Heritage
                        <svg class="link-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- 3. Shop -->
                <div class="about-pillar-col">
                    <div class="about-pillar-col__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                    </div>
                    <span class="about-pillar-col__label">Shop</span>
                    <p class="about-pillar-col__desc">
                        Discover a curated selection of handwoven silk sarees, each piece crafted with love for your wardrobe.
                    </p>
                    <a href="shop.php" class="about-pillar-col__link">
                        Shop Sarees
                        <svg class="link-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- ==========================================================
         SECTION 3: ABOUT INTRO (IMAGE ARCH RIGHT)
         ========================================================== -->
    <section class="about-intro-section" id="aboutIntro">
        <div class="about-intro-inner">
            
            <!-- Left Text -->
            <div class="about-intro-content">
                <span class="about-intro__eyebrow">About RK Collections</span>
                <h2 class="about-intro__title">
                    Boutique Weavers, based in the heart of Swadeshi Varanasi.
                </h2>
                <p class="about-intro__text">
                    With a commitment to creativity, sustainability, and the finest craftsmanship, we transform natural silk threads into extraordinary heirlooms. Our handloom weavers reflect the dynamic spirit of authentic Indian heritage.
                </p>
                <a href="contact.php" class="about-intro__btn">
                    Learn More
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>

            <!-- Right Image with Arch Corner -->
            <div class="about-intro-image-wrap">
                <img src="assets/images/banners/about-craft.jpg" 
                     alt="RK Collections Saree Craftsmanship" 
                     class="about-intro-image"
                     loading="lazy"
                     decoding="async">
            </div>

        </div>
    </section>

    <!-- ==========================================================
         SECTION 4: BRAND / PRESS LOGO STRIP
         ========================================================== -->
    <section class="about-press-section">
        <div class="about-press-inner">
            <span class="about-press-logo">VOGUE</span>
            <span class="about-press-logo">ELLE</span>
            <span class="about-press-logo">HARPER'S BAZAAR</span>
            <span class="about-press-logo">GRAZIA</span>
            <span class="about-press-logo">SILK MARK</span>
            <span class="about-press-logo">BRIDES</span>
        </div>
    </section>

    <!-- ==========================================================
         SECTION 5: APPROACH SECTION (IMAGE ARCH LEFT)
         ========================================================== -->
    <section class="about-approach-section">
        <div class="about-approach-inner">
            
            <!-- Left Image with Arch Corner -->
            <div class="about-approach-image-wrap">
                <img src="assets/images/banners/about-artisan.jpg" 
                     alt="Master Artisan Weaving Silk Saree" 
                     class="about-approach-image"
                     loading="lazy"
                     decoding="async">
            </div>

            <!-- Right Text -->
            <div class="about-approach-content">
                <span class="about-approach__eyebrow">Our Approach</span>
                <h2 class="about-approach__title">
                    Our unique approach is what sets us apart.
                </h2>
                <p class="about-approach__text">
                    Our approach marries traditional craftsmanship with contemporary flair, making every creation distinctly unique. Personalization and silk mark purity are at the heart of what we do, ensuring each saree captivates and resonates.
                </p>
                <a href="shop.php" class="about-approach__btn">
                    Approach Page
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>

        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
