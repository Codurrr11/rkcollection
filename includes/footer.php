<footer class="site-footer" id="site-footer">
    <div class="site-footer__texture" aria-hidden="true"></div>
    <div class="site-footer__inner">
        <div class="site-footer__grid">

            <!-- LEFT COLUMN: NEWSLETTER, SOCIALS, PAYMENT & COPYRIGHT -->
            <div class="site-footer__brand-col">
                <h2 class="site-footer__hero-title">Stay Royal!</h2>

                <!-- Newsletter Form -->
                <form class="site-footer__newsletter" onsubmit="event.preventDefault();">
                    <div class="site-footer__input-wrap">
                        <input type="email"
                               class="site-footer__input"
                               placeholder="WRITE YOUR EMAIL"
                               required
                               aria-label="Write your email">
                        <button type="submit" class="site-footer__submit-btn" aria-label="Subscribe to newsletter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Follow Us -->
                <div class="site-footer__socials-wrap">
                    <h3 class="site-footer__col-title">Follow Us</h3>
                    <div class="site-footer__social-links">
                        <a href="#instagram" class="site-footer__social-icon" aria-label="Instagram">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="#facebook" class="site-footer__social-icon" aria-label="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#whatsapp" class="site-footer__social-icon" aria-label="WhatsApp">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                            </svg>
                        </a>
                        <a href="#pinterest" class="site-footer__social-icon" aria-label="Pinterest">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                                <circle cx="12" cy="12" r="9"></circle>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Payment Methods Badges -->
                <div class="site-footer__payment-row">
                    <span class="site-footer__pay-badge">VISA</span>
                    <span class="site-footer__pay-badge">MC</span>
                    <span class="site-footer__pay-badge">UPI</span>
                    <span class="site-footer__pay-badge">PayPal</span>
                </div>

                <!-- Copyright & Credits -->
                <div class="site-footer__copyright">
                    <p>Copyright <?php echo date('Y'); ?> RK Collection. All rights reserved.</p>
                    <p class="site-footer__credits">Handcrafted Heritage Silks for Saree Connoisseurs.</p>
                </div>
            </div>

            <!-- RIGHT COLUMN 1: PRODUCTS / COLLECTIONS -->
            <div class="site-footer__links-col">
                <h3 class="site-footer__col-title">Products</h3>
                <ul class="site-footer__nav-list">
                    <li><a href="#banarasi">BANARASI KORA / SILK</a></li>
                    <li><a href="#tissue-silk">TISSUE SILK SAREES</a></li>
                    <li><a href="#soft-silk">SOFT SILK SAREES</a></li>
                    <li><a href="#mangalagiri">MANGALAGIRI COTTON</a></li>
                    <li><a href="#kalanjali">KALANJALI HANDLOOM</a></li>
                    <li><a href="#fancy">FANCY PARTY WEAR</a></li>
                    <li><a href="#bridal">BRIDAL HERITAGE EDIT</a></li>
                    <li><a href="#gift-card">GIFT CARDS</a></li>
                </ul>
            </div>

            <!-- RIGHT COLUMN 2: COMPANY & CONTACT -->
            <div class="site-footer__links-col">
                <div class="site-footer__group">
                    <h3 class="site-footer__col-title">Company</h3>
                    <ul class="site-footer__nav-list">
                        <li><a href="#who-we-are">WHO WE ARE</a></li>
                        <li><a href="#our-way">OUR HERITAGE WAY</a></li>
                        <li><a href="#concept-store">CONCEPT BOUTIQUE</a></li>
                        <li><a href="#silk-mark">SILK MARK CERTIFIED</a></li>
                    </ul>
                </div>

                <div class="site-footer__group site-footer__group--contact">
                    <h3 class="site-footer__col-title">Contact</h3>
                    <ul class="site-footer__info-list">
                        <li><a href="mailto:care@rkcollection.com">care@rkcollection.com</a></li>
                        <li><a href="tel:+919876543210">+91 98765 43210</a></li>
                        <li><span>Hyderabad & Vijayawada</span></li>
                    </ul>
                </div>
            </div>

            <!-- RIGHT COLUMN 3: HELP & SERVICES -->
            <div class="site-footer__links-col">
                <div class="site-footer__group">
                    <h3 class="site-footer__col-title">Help</h3>
                    <ul class="site-footer__nav-list">
                        <li><a href="#terms">TERMS & CONDITIONS</a></li>
                        <li><a href="#privacy">PRIVACY POLICY</a></li>
                        <li><a href="#cookies">COOKIES POLICY</a></li>
                        <li><a href="#payments">PAYMENT METHODS</a></li>
                        <li><a href="#shipping">SHIPPING & RETURNS</a></li>
                    </ul>
                </div>

                <div class="site-footer__group site-footer__group--services">
                    <h3 class="site-footer__col-title">Services</h3>
                    <ul class="site-footer__nav-list">
                        <li><a href="#blouse-stitching">CUSTOM BLOUSE FITTING</a></li>
                        <li><a href="#video-shopping">LIVE VIDEO SHOPPING</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="assets/js/main.js?v=<?php echo time(); ?>"></script>
<?php if (!empty($page_js)): foreach ((array) $page_js as $rk_js): ?>
<script src="<?php echo htmlspecialchars($rk_js); ?>?v=<?php echo time(); ?>"></script>
<?php endforeach; endif; ?>
</body>
</html>
