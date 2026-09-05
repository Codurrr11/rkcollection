<?php
/**
 * RK Collection — Luxury Mobile Navigation Drawer Component
 * Slide-over offcanvas drawer for mobile & tablet devices.
 */
?>

<!-- MOBILE DRAWER BACKDROP OVERLAY -->
<div class="mobile-drawer-overlay" id="mobileDrawerOverlay"></div>

<!-- MOBILE NAVIGATION DRAWER -->
<aside class="mobile-drawer" id="mobileDrawer" aria-label="Mobile Navigation" aria-hidden="true">
    <div class="mobile-drawer__header">
        <a href="index.php" class="mobile-drawer__logo-link">
            <img src="assets/images/logo/logo-rk.png" alt="RK Collection" class="mobile-drawer__logo">
        </a>
        <button type="button" class="mobile-drawer__close-btn" id="mobileDrawerClose" aria-label="Close Navigation Menu">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    <div class="mobile-drawer__body">

        <!-- SEARCH INPUT -->
        <div class="mobile-drawer__search">
            <input type="text" class="mobile-drawer__search-input" placeholder="Search handloom sarees..." aria-label="Search sarees">
            <button type="button" class="mobile-drawer__search-btn" aria-label="Search">
                <?php echo rk_icon('search', 16); ?>
            </button>
        </div>

        <!-- MAIN CATEGORY LINKS — accordion mirrors the desktop mega menus -->
        <nav class="mobile-drawer__nav">
            <span class="mobile-drawer__nav-heading">SAREE COLLECTIONS</span>
            <ul class="mobile-drawer__menu">
                <li><a href="index.php" class="mobile-drawer__link is-active">Home</a></li>
            </ul>

            <ul class="mobile-acc">
                <?php foreach ($mega_menus as $mega_slug => $mega): ?>
                    <li class="mobile-acc__item" data-acc>
                        <button type="button"
                                class="mobile-acc__trigger"
                                aria-expanded="false"
                                aria-controls="acc-<?php echo htmlspecialchars($mega_slug); ?>">
                            <span><?php echo htmlspecialchars($mega['label']); ?></span>
                            <svg class="mobile-acc__chevron" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>

                        <div class="mobile-acc__panel" id="acc-<?php echo htmlspecialchars($mega_slug); ?>">
                            <div class="mobile-acc__panel-inner">
                                <?php foreach ($mega['columns'] as $column): ?>
                                    <span class="mobile-acc__group-heading"><?php echo htmlspecialchars($column['heading']); ?></span>
                                    <ul class="mobile-acc__list">
                                        <?php foreach ($column['links'] as $link): ?>
                                            <li><a class="mobile-acc__link" href="<?php echo htmlspecialchars(rk_mega_href($mega_slug, $mega)); ?>"><?php echo htmlspecialchars($link); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endforeach; ?>
                                <a class="mobile-acc__view-all" href="<?php echo htmlspecialchars(rk_mega_href($mega_slug, $mega)); ?>"><span>View All <?php echo htmlspecialchars($mega['label']); ?></span><span class="mobile-acc__view-all-arrow" aria-hidden="true"><?php echo rk_icon('arrow-right', 13, 1.7); ?></span></a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="mobile-drawer__divider"></div>

        <!-- QUICK LINKS -->
        <nav class="mobile-drawer__nav">
            <span class="mobile-drawer__nav-heading">QUICK LINKS</span>
            <ul class="mobile-drawer__menu">
                <li><a href="#about" class="mobile-drawer__link">About Our Heritage</a></li>
                <li><a href="#testimonials" class="mobile-drawer__link">Client Reviews</a></li>
                <li><a href="#faq" class="mobile-drawer__link">Frequently Asked Questions</a></li>
                <li><a href="#contact" class="mobile-drawer__link">Contact & Stores</a></li>
            </ul>
        </nav>

    </div>

    <!-- DRAWER FOOTER CONTACT CTA -->
    <div class="mobile-drawer__footer">
        <a href="https://wa.me/919876543210" target="_blank" rel="noopener" class="mobile-drawer__wa-btn">
            <?php echo rk_icon('whatsapp', 20); ?>
            <span>WhatsApp Shopping</span>
        </a>
        <p class="mobile-drawer__contact-info">Call us: +91 98765 43210</p>
    </div>
</aside>
