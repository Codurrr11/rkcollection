// RK Collection — Interactive & GSAP Motion Controller

(function () {
    'use strict';

    if (window.gsap && window.ScrollTrigger) {
        gsap.registerPlugin(ScrollTrigger);
    }

    function reducedMotion() {
        return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    }

    /**
     * Sticky Header Behavior:
     * On scroll > 36px, smoothly collapse the top announcement row
     * and compact the logo strip for a sleek floating luxury header.
     */
    function initNavbar() {
        var $header = $('#siteHeader');
        var announce = document.getElementById('headerAnnouncement');
        if (!$header.length) { return; }

        var collapsed = false;
        var naturalHeight = 0;

        function collapse() {
            if (collapsed) { return; }
            collapsed = true;
            $header.addClass('is-stuck');
            if (!announce) { return; }

            naturalHeight = announce.offsetHeight;

            if (window.gsap && !reducedMotion()) {
                gsap.to(announce, {
                    height: 0,
                    opacity: 0,
                    duration: 0.35,
                    ease: 'power2.inOut',
                    overwrite: 'auto'
                });
            } else {
                announce.style.height = '0px';
                announce.style.opacity = '0';
            }
        }

        function expand() {
            if (!collapsed) { return; }
            collapsed = false;
            $header.removeClass('is-stuck');
            if (!announce) { return; }

            if (window.gsap && !reducedMotion()) {
                gsap.to(announce, {
                    height: naturalHeight || 'auto',
                    opacity: 1,
                    duration: 0.35,
                    ease: 'power2.inOut',
                    overwrite: 'auto',
                    onComplete: function () {
                        gsap.set(announce, { clearProps: 'height,opacity' });
                    }
                });
            } else {
                announce.style.height = '';
                announce.style.opacity = '';
            }
        }

        function sync() {
            if (window.pageYOffset > 36) {
                collapse();
            } else {
                expand();
            }
        }

        $(window).on('scroll', sync);
        sync();
    }

    /**
     * Navigation Interaction:
     * Active state click handler and subtle hover indicator.
     */
    function initNavInteraction() {
        var items = document.querySelectorAll('.header-nav-grid__item');
        items.forEach(function (item) {
            item.addEventListener('click', function (e) {
                var link = item.querySelector('a');
                if (link && link.getAttribute('href') === '#') {
                    e.preventDefault();
                    items.forEach(function (i) { i.classList.remove('is-active'); });
                    item.classList.add('is-active');
                }
            });
        });
    }

    /**
     * Hero Royal Gallery Entrance:
     * Staggered GSAP reveal for the brandmark, nav cells, 4 arches, and plinth.
     */
    function initHeroAnimations() {
        if (!window.gsap || reducedMotion()) { return; }

        var tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

        // Staggered reveal for nav grid cells
        var navItems = document.querySelectorAll('.header-nav-grid__item');
        if (navItems.length) {
            tl.from(navItems, {
                y: -6,
                opacity: 0,
                duration: 0.5,
                stagger: 0.04,
                clearProps: 'transform,opacity'
            }, 0.1);
        }

        // Hero banner majestic reveal
        var banner = document.querySelector('.hero__banner');
        if (banner) {
            tl.from(banner, {
                scale: 0.985,
                y: 18,
                opacity: 0,
                duration: 1.2,
                clearProps: 'transform,opacity'
            }, 0.25);
        }
    }

    /**
     * About Section Reveal:
     * Scroll-triggered entrance — the headline and disc settle first, the
     * portrait rises, then the two label blocks fade in from either side.
     * Every tween clears its props so an interrupted timeline never leaves
     * the section stuck mid-animation.
     */
    function initAboutAnimations() {
        var section = document.getElementById('about');
        if (!section || !window.gsap || !window.ScrollTrigger || reducedMotion()) { return; }

        var tl = gsap.timeline({
            defaults: { ease: 'power3.out', clearProps: 'transform,opacity' },
            scrollTrigger: {
                trigger: section,
                start: 'top 78%',
                once: true
            }
        });

        tl.from(section.querySelector('.about__title'), {
            y: 26, opacity: 0, duration: 0.9
        });

        tl.from(section.querySelector('.about__disc'), {
            scale: 0.86, opacity: 0, duration: 1, transformOrigin: '50% 50%'
        }, '-=0.55');

        tl.from(section.querySelector('.about__portrait'), {
            y: 34, opacity: 0, duration: 1.05
        }, '-=0.75');

        tl.from(section.querySelector('.about__col--left'), {
            x: -22, opacity: 0, duration: 0.8
        }, '-=0.6');

        tl.from(section.querySelector('.about__col--right'), {
            x: 22, opacity: 0, duration: 0.8
        }, '-=0.65');
    }

    /**
     * Hero Slider Carousel Controller:
     * Enforces 3-second auto-advancing slides, pause-on-hover,
     * touch swipe support, and indicator synchronization.
     */
    function initHeroSlider() {
        var sliderEl = document.getElementById('heroSlider');
        if (!sliderEl) { return; }

        if (window.bootstrap && window.bootstrap.Carousel) {
            var carousel = bootstrap.Carousel.getOrCreateInstance(sliderEl, {
                interval: 3000,
                ride: 'carousel',
                pause: 'hover',
                wrap: true,
                touch: true
            });
            carousel.cycle();
        }
    }

    /**
     * Featured Products & Shop By Collection Scroll Reveal:
     * Subtle entrance animations for cards, watermark text, and collection grid.
     */
    function initFeaturedProductsAnimations() {
        if (!window.gsap || !window.ScrollTrigger || reducedMotion()) { return; }

        // Watermark slow subtle parallax
        var watermark = document.querySelector('.featured-products__watermark');
        if (watermark) {
            gsap.to(watermark, {
                y: 40,
                ease: 'none',
                scrollTrigger: {
                    trigger: '.featured-products',
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1
                }
            });
        }

        // Featured Products Cards staggered entrance
        var cards = document.querySelectorAll('.featured-products__card');
        if (cards.length) {
            gsap.from(cards, {
                y: 35,
                opacity: 0,
                duration: 0.9,
                stagger: 0.2,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: '.featured-products__grid',
                    start: 'top 82%'
                }
            });
        }

        // Shop By Collection Grid Entrance
        var collectionCards = document.querySelectorAll('.collection-grid__card');
        if (collectionCards.length) {
            gsap.from(collectionCards, {
                y: 30,
                opacity: 0,
                duration: 0.85,
                stagger: 0.15,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: '.collection-grid',
                    start: 'top 82%'
                }
            });
        }
    }

    /**
     * Initialize Product Swiper Sliders:
     * Instantiates Swiper for every .js-product-swiper element on the page.
     */
    function initProductSliders() {
        if (!window.Swiper) { return; }

        var sliderSections = document.querySelectorAll('.product-slider-section');
        sliderSections.forEach(function (section) {
            var swiperEl = section.querySelector('.js-product-swiper');
            var prevBtn = section.querySelector('.js-swiper-prev');
            var nextBtn = section.querySelector('.js-swiper-next');

            if (!swiperEl) { return; }

            var productSwiper = new Swiper(swiperEl, {
                slidesPerView: 1.2,
                spaceBetween: 16,
                loop: true,
                loopAdditionalSlides: 8,
                speed: 900,
                grabCursor: true,
                watchSlidesProgress: true,
                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                breakpoints: {
                    576: {
                        slidesPerView: 2.2,
                        spaceBetween: 20
                    },
                    992: {
                        slidesPerView: 3.2,
                        spaceBetween: 24
                    },
                    1200: {
                        slidesPerView: 4.2,
                        spaceBetween: 24
                    },
                    1400: {
                        slidesPerView: 4.5,
                        spaceBetween: 28
                    },
                    1920: {
                        slidesPerView: 5.5,
                        spaceBetween: 32
                    },
                    2560: {
                        slidesPerView: 6.5,
                        spaceBetween: 36
                    }
                }
            });

            if (productSwiper.autoplay && productSwiper.autoplay.start) {
                productSwiper.autoplay.start();
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    productSwiper.slidePrev();
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    productSwiper.slideNext();
                });
            }
        });

        // Wishlist heart toggle click handler
        $(document).on('click', '.js-wishlist-toggle', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).toggleClass('is-active');
        });

        // Add to cart — the button carries a label now, so confirm in words
        // rather than with a scale pop that would fight its hover lift.
        $(document).on('click', '.js-add-cart', function (e) {
            e.preventDefault();
            e.stopPropagation();

            var btn   = $(this);
            var label = btn.find('span');

            if (btn.hasClass('is-added')) { return; }

            var original = label.text();
            btn.addClass('is-added');
            label.text('Added to Cart');

            setTimeout(function () {
                btn.removeClass('is-added');
                label.text(original);
            }, 1500);
        });
    }

    /**
     * Initialize Testimonials Swiper Slider:
     * Slow, smooth auto-slide with comfortable reading pause between transitions.
     */
    function initTestimonialSlider() {
        if (!window.Swiper) { return; }

        var swiperEl = document.querySelector('.js-testimonials-swiper');
        if (!swiperEl) { return; }

        var testimonialSwiper = new Swiper(swiperEl, {
            slidesPerView: 1.2,
            spaceBetween: 16,
            loop: true,
            loopAdditionalSlides: 8,
            speed: 1200,
            grabCursor: true,
            allowTouchMove: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            breakpoints: {
                576: {
                    slidesPerView: 2.2,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 3.2,
                    spaceBetween: 24
                },
                1200: {
                    slidesPerView: 4.2,
                    spaceBetween: 24
                },
                1400: {
                    slidesPerView: 4.5,
                    spaceBetween: 28
                },
                1920: {
                    slidesPerView: 5.5,
                    spaceBetween: 32
                },
                2560: {
                    slidesPerView: 6.5,
                    spaceBetween: 36
                }
            }
        });

        if (testimonialSwiper.autoplay && testimonialSwiper.autoplay.start) {
            testimonialSwiper.autoplay.start();
        }
    }

    /**
     * Initialize FAQ Accordion:
     * Handles smooth slideToggle collapse/expand with animated chevron icon rotation.
     */
    function initFaqAccordion() {
        var buttons = document.querySelectorAll('.faq__button');
        if (!buttons.length) { return; }

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                var item = button.closest('.faq__item');
                var willOpen = !item.classList.contains('is-open');

                // Each answer toggles on its own — several can stay open
                item.classList.toggle('is-open', willOpen);
                button.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
            });
        });
    }

    /**
     * Initialize Mobile Navigation Drawer:
     * Toggles offcanvas menu open/close state, handles backdrop overlay clicks & esc key.
     */
    /* ======================================================================
       MEGA MENU
       Hover panels on desktop, drawer accordion below 992px.
       ====================================================================== */
    function initMegaMenu() {
        var nav   = document.getElementById('headerNav');
        var host  = document.getElementById('megaMenuHost');
        var DELAY = 150;

        if (nav && host) {
            var triggers = Array.prototype.slice.call(nav.querySelectorAll('.header-nav-grid__item--mega'));
            var openTimer = null;
            var closeTimer = null;
            var current = null;

            function isDesktop() {
                return window.matchMedia('(min-width: 992px)').matches;
            }

            function panelFor(slug) {
                return host.querySelector('[data-mega-panel="' + slug + '"]');
            }

            function close() {
                if (!current) { return; }

                var panel = panelFor(current);
                var item  = nav.querySelector('.header-nav-grid__item--mega[data-mega="' + current + '"]');

                if (panel) {
                    panel.classList.remove('is-open');
                    // wait for the fade before pulling it out of the layout
                    window.setTimeout(function () {
                        if (!panel.classList.contains('is-open')) { panel.hidden = true; }
                    }, 200);
                }
                if (item) {
                    item.classList.remove('is-open');
                    var link = item.querySelector('.header-nav-grid__link');
                    if (link) { link.setAttribute('aria-expanded', 'false'); }
                }
                current = null;
            }

            function open(slug) {
                if (current === slug) { return; }
                close();

                var panel = panelFor(slug);
                var item  = nav.querySelector('.header-nav-grid__item--mega[data-mega="' + slug + '"]');
                if (!panel) { return; }

                panel.hidden = false;
                // Flush layout so the transition starts from the hidden state.
                // A forced reflow is reliable where rAF stalls in a background tab.
                void panel.offsetHeight;
                panel.classList.add('is-open');

                if (item) {
                    item.classList.add('is-open');
                    var link = item.querySelector('.header-nav-grid__link');
                    if (link) { link.setAttribute('aria-expanded', 'true'); }
                }
                current = slug;
            }

            function clearTimers() {
                window.clearTimeout(openTimer);
                window.clearTimeout(closeTimer);
            }

            function scheduleOpen(slug) {
                if (!isDesktop()) { return; }
                clearTimers();
                openTimer = window.setTimeout(function () { open(slug); }, DELAY);
            }

            function scheduleClose() {
                clearTimers();
                closeTimer = window.setTimeout(close, DELAY);
            }

            triggers.forEach(function (item) {
                var slug = item.getAttribute('data-mega');

                item.addEventListener('mouseenter', function () { scheduleOpen(slug); });

                // Keyboard: focusing the trigger opens its panel straight away
                var link = item.querySelector('.header-nav-grid__link');
                if (link) {
                    link.addEventListener('focus', function () {
                        if (isDesktop()) { clearTimers(); open(slug); }
                    });
                }
            });

            // Leaving the nav (triggers + panels are both inside it) closes.
            nav.addEventListener('mouseleave', scheduleClose);
            nav.addEventListener('mouseenter', function () { window.clearTimeout(closeTimer); });

            nav.addEventListener('focusout', function (e) {
                if (!nav.contains(e.relatedTarget)) { close(); }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && current) { close(); }
            });

            // Don't leave a panel hanging when the sticky header resizes.
            window.addEventListener('scroll', function () {
                if (current) { clearTimers(); close(); }
            }, { passive: true });

            window.addEventListener('resize', function () {
                if (!isDesktop() && current) { clearTimers(); close(); }
            });
        }

        /* --- Mobile drawer accordion ------------------------------------- */
        $(document).on('click', '.mobile-acc__trigger', function () {
            var $item = $(this).closest('.mobile-acc__item');
            var open  = !$item.hasClass('is-open');

            $item.siblings('.mobile-acc__item').removeClass('is-open')
                 .find('.mobile-acc__trigger').attr('aria-expanded', 'false');

            $item.toggleClass('is-open', open);
            $(this).attr('aria-expanded', open ? 'true' : 'false');
        });
    }

    function initMobileDrawer() {
        var drawer = document.getElementById('mobileDrawer');
        var overlay = document.getElementById('mobileDrawerOverlay');
        var openBtn = document.getElementById('mobileDrawerOpen');
        var closeBtn = document.getElementById('mobileDrawerClose');

        if (!drawer) { return; }

        function openDrawer() {
            drawer.classList.add('is-active');
            if (overlay) { overlay.classList.add('is-active'); }
            drawer.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeDrawer() {
            drawer.classList.remove('is-active');
            if (overlay) { overlay.classList.remove('is-active'); }
            drawer.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        if (openBtn) { openBtn.addEventListener('click', openDrawer); }
        if (closeBtn) { closeBtn.addEventListener('click', closeDrawer); }
        if (overlay) { overlay.addEventListener('click', closeDrawer); }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer.classList.contains('is-active')) {
                closeDrawer();
            }
        });

        // Close drawer when clicking any link inside
        var drawerLinks = drawer.querySelectorAll('a');
        drawerLinks.forEach(function (link) {
            link.addEventListener('click', closeDrawer);
        });
    }

    /**
     * Initialize Blog / Journal Swiper Slider:
     * Auto-sliding carousel with prev/next navigation arrow controls.
     */
    function initBlogSlider() {
        if (!window.Swiper) { return; }

        var swiperEl = document.querySelector('.js-blog-swiper');
        if (!swiperEl) { return; }

        var blogSwiper = new Swiper(swiperEl, {
            slidesPerView: 1.2,
            spaceBetween: 20,
            loop: true,
            loopAdditionalSlides: 8,
            speed: 800,
            grabCursor: true,
            allowTouchMove: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            navigation: {
                nextEl: '.js-blog-next',
                prevEl: '.js-blog-prev'
            },
            breakpoints: {
                576: {
                    slidesPerView: 2.1,
                    spaceBetween: 24
                },
                992: {
                    slidesPerView: 3.1,
                    spaceBetween: 28
                },
                1400: {
                    slidesPerView: 3.2,
                    spaceBetween: 32
                },
                1920: {
                    slidesPerView: 4.2,
                    spaceBetween: 36
                }
            }
        });

        $(document).on('click', '.js-blog-prev', function (e) {
            e.preventDefault();
            if (blogSwiper) { blogSwiper.slidePrev(); }
        });
        $(document).on('click', '.js-blog-next', function (e) {
            e.preventDefault();
            if (blogSwiper) { blogSwiper.slideNext(); }
        });
    }

    $(document).ready(function () {
        initNavbar();
        initNavInteraction();
        initHeroAnimations();
        initHeroSlider();
        initAboutAnimations();
        initFeaturedProductsAnimations();
        initProductSliders();
        initTestimonialSlider();
        initFaqAccordion();
        initMobileDrawer();
        initMegaMenu();
        initBlogSlider();
    });
})();
