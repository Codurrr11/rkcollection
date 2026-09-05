<?php require_once __DIR__ . '/icons.php'; ?>
<?php require_once __DIR__ . '/mega-menu-data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'RK Collection | Luxury Handwoven Heritage Silks'; ?></title>
    <link rel="icon" href="assets/images/logo/rk-brandmark.svg" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400..700&family=Geist:wght@300..600&family=Geist+Mono:wght@400;500&family=Great+Vibes&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/responsive.css?v=<?php echo time(); ?>">
<?php if (!empty($page_css)): foreach ((array) $page_css as $rk_css): ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($rk_css); ?>?v=<?php echo time(); ?>">
<?php endforeach; endif; ?>
</head>
<body>
<?php require_once __DIR__ . '/mobile-drawer.php'; ?>

<header class="site-header" id="siteHeader">

    <!-- ROW 1 — Announcement Bar (Glossy Gold Offer Slider) -->
    <div class="header-announcement" id="headerAnnouncement">
        <div class="header-announcement__inner">
            <div class="header-announcement__slider carousel slide carousel-fade" id="announcementSlider" data-bs-ride="carousel" data-bs-interval="2800">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <span class="header-announcement__offer-text">✨ FESTIVE SILK EDIT — COMPLIMENTARY FALL & PIKU ON ALL ORDERS</span>
                    </div>
                    <div class="carousel-item">
                        <span class="header-announcement__offer-text">👑 PURE HANDLOOM SILK MARK CERTIFIED SAREES | FREE EXPRESS SHIPPING</span>
                    </div>
                    <div class="carousel-item">
                        <span class="header-announcement__offer-text">💫 USE CODE 'HERITAGE10' FOR 10% OFF YOUR FIRST LUXURY SAREE</span>
                    </div>
                    <div class="carousel-item">
                        <span class="header-announcement__offer-text">🛍️ EXCLUSIVE BRIDAL WEAVES — BOOK A LIVE VIDEO SHOPPING SESSION</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW 2 — Logo Strip (Sober Minimal Ivory Ground) -->
    <div class="header-logo-strip">
        <div class="header-logo-strip__inner">

            <div class="header-logo-strip__side header-logo-strip__side--left">
                <button type="button" class="header-hamburger-btn" id="mobileDrawerOpen" aria-label="Open Navigation Menu">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <a class="header-text-btn" href="#about" aria-label="About Us">ABOUT</a>
                <a class="header-text-btn" href="#contact" aria-label="Contact Us">CONTACT</a>
            </div>

            <a class="header-logo-strip__brand" href="index.php" aria-label="RK Collection Home">
                <img class="header-logo-strip__logo" src="assets/images/logo/logo-rk.png" alt="RK Collection — Pure Silks & Heritage Sarees">
            </a>

            <div class="header-logo-strip__side header-logo-strip__side--right header-logo-strip__side--icons">
                <a class="header-icon-btn header-icon-btn--search" href="#" aria-label="Search" title="Search">
                    <?php echo rk_icon('search', 16, 2); ?>
                </a>
                <a class="header-icon-btn" href="#" aria-label="My Account" title="My Account">
                    <?php echo rk_icon('user', 18, 1.8); ?>
                </a>
                <a class="header-icon-btn" href="#" aria-label="My Wishlist" title="Wishlist">
                    <?php echo rk_icon('heart', 18, 1.8); ?>
                </a>
                <a class="header-icon-btn" href="#" aria-label="Shopping Bag" title="Shopping Bag">
                    <?php echo rk_icon('bag', 18, 1.8); ?>
                </a>
                <a class="header-icon-btn header-icon-btn--wa" href="https://wa.me/" target="_blank" rel="noopener" aria-label="WhatsApp" title="Chat on WhatsApp">
                    <?php echo rk_icon('whatsapp', 21); ?>
                </a>
            </div>

        </div>
    </div>

    <!-- ROW 3 — Segmented Panel Navigation Bar (Architectural Grid) -->
    <nav class="header-nav" id="headerNav" aria-label="Main Categories">
        <div class="header-nav__inner">
            <ul class="header-nav-grid" id="mainNav">
                <li class="header-nav-grid__item is-active">
                    <a class="header-nav-grid__link" href="index.php">
                        <span class="header-nav-grid__text">HOME</span>
                    </a>
                </li>
                <?php foreach ($mega_menus as $mega_slug => $mega): ?>
                    <li class="header-nav-grid__item header-nav-grid__item--mega" data-mega="<?php echo htmlspecialchars($mega_slug); ?>">
                        <a class="header-nav-grid__link"
                           href="<?php echo htmlspecialchars(rk_mega_href($mega_slug, $mega)); ?>"
                           aria-haspopup="true"
                           aria-expanded="false"
                           aria-controls="mega-<?php echo htmlspecialchars($mega_slug); ?>">
                            <span class="header-nav-grid__text"><?php echo htmlspecialchars(strtoupper($mega['label'])); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- MEGA MENU PANELS — one per category, spanning the nav container -->
        <div class="mega-menu-host" id="megaMenuHost">
            <?php foreach ($mega_menus as $mega_slug => $mega): ?>
                <?php include __DIR__ . '/mega-menu.php'; ?>
            <?php endforeach; ?>
        </div>
    </nav>

</header>
