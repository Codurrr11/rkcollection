/* ==========================================================================
   RK COLLECTION — PRODUCT DETAILS PAGE
   Gallery cycling, quantity stepper and the specifications toggle.
   Loaded only on product-details.php.
   ========================================================================== */
(function () {
    'use strict';

    var root = document.getElementById('productDetails');
    if (!root) { return; }

    /* ======================================================================
       Gallery — thumbnails drive the main stage
       ====================================================================== */
    (function initGallery() {
        var slides = Array.prototype.slice.call(root.querySelectorAll('.product-details__stage-img'));
        var thumbs = Array.prototype.slice.call(root.querySelectorAll('.product-details__thumb'));

        if (slides.length < 2) { return; }

        var index = 0;

        function show(nextIndex) {
            index = (nextIndex + slides.length) % slides.length;

            slides.forEach(function (slide, i) {
                slide.classList.toggle('is-active', i === index);
            });

            thumbs.forEach(function (thumb, i) {
                var on = i === index;
                thumb.classList.toggle('is-active', on);
                thumb.setAttribute('aria-selected', on ? 'true' : 'false');
            });
        }

        thumbs.forEach(function (thumb, i) {
            thumb.addEventListener('click', function () { show(i); });
        });

        root.querySelector('.product-details__stage').addEventListener('keydown', function (e) {
            if (e.key === 'ArrowLeft')  { show(index - 1); }
            if (e.key === 'ArrowRight') { show(index + 1); }
        });
    })();

    /* ======================================================================
       Gallery zoom — toggle to magnify, move the pointer to pan
       ====================================================================== */
    (function initZoom() {
        var stage = root.querySelector('.product-details__stage');
        var btn   = document.getElementById('productZoom');

        if (!stage || !btn) { return; }

        function setOrigin(clientX, clientY) {
            var rect = stage.getBoundingClientRect();
            var x = ((clientX - rect.left) / rect.width) * 100;
            var y = ((clientY - rect.top) / rect.height) * 100;

            stage.style.setProperty('--zoom-x', Math.min(100, Math.max(0, x)) + '%');
            stage.style.setProperty('--zoom-y', Math.min(100, Math.max(0, y)) + '%');
        }

        function setZoom(on, clientX, clientY) {
            stage.classList.toggle('is-zoomed', on);
            btn.setAttribute('aria-pressed', on ? 'true' : 'false');
            btn.setAttribute('aria-label', on ? 'Zoom out' : 'Zoom in');

            if (on && typeof clientX === 'number') {
                setOrigin(clientX, clientY);
            } else if (!on) {
                stage.style.removeProperty('--zoom-x');
                stage.style.removeProperty('--zoom-y');
            }
        }

        function isZoomed() { return stage.classList.contains('is-zoomed'); }

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            setZoom(!isZoomed());
        });

        // Clicking the image itself zooms in at that point, or back out.
        stage.addEventListener('click', function (e) {
            if (e.target.closest('.product-details__zoom')) { return; }
            setZoom(!isZoomed(), e.clientX, e.clientY);
        });

        stage.addEventListener('pointermove', function (e) {
            if (!isZoomed()) { return; }
            e.preventDefault();
            setOrigin(e.clientX, e.clientY);
        });

        stage.addEventListener('pointerleave', function (e) {
            if (e.pointerType === 'mouse' && isZoomed()) { setZoom(false); }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && isZoomed()) { setZoom(false); }
        });

        // Changing the frame always drops back to the un-zoomed view.
        root.querySelectorAll('.product-details__thumb').forEach(function (el) {
            el.addEventListener('click', function () { setZoom(false); });
        });
    })();

    /* ======================================================================
       Quantity stepper
       ====================================================================== */
    (function initQuantity() {
        var input = document.getElementById('productQty');
        var minus = root.querySelector('.product-details__qty-btn--minus');
        var plus  = root.querySelector('.product-details__qty-btn--plus');

        if (!input) { return; }

        var MIN = parseInt(input.min, 10) || 1;
        var MAX = parseInt(input.max, 10) || 10;

        function set(value) {
            var next = Math.min(MAX, Math.max(MIN, value));
            input.value = next;
            if (minus) { minus.disabled = next <= MIN; }
            if (plus)  { plus.disabled  = next >= MAX; }
        }

        if (minus) {
            minus.addEventListener('click', function () { set(parseInt(input.value, 10) - 1); });
        }
        if (plus) {
            plus.addEventListener('click', function () { set(parseInt(input.value, 10) + 1); });
        }
        input.addEventListener('change', function () { set(parseInt(input.value, 10) || MIN); });

        set(parseInt(input.value, 10) || MIN);
    })();

    /* ======================================================================
       Add-to-cart feedback
       ====================================================================== */
    (function initAddToCart() {
        var cart = root.querySelector('.product-details__btn--cart');

        if (cart) {
            cart.addEventListener('click', function () {
                var original = cart.getAttribute('data-label') || cart.textContent;
                cart.classList.add('is-added');
                cart.textContent = 'Added to Bag';
                window.setTimeout(function () {
                    cart.classList.remove('is-added');
                    cart.textContent = original;
                }, 1800);
            });
        }
    })();

    /* ======================================================================
       Specifications — reveal the rows held behind "See More"
       ====================================================================== */
    (function initSpecs() {
        var list = document.getElementById('productSpecs');
        var more = document.getElementById('productSpecsMore');

        if (!list || !more) { return; }

        more.addEventListener('click', function () {
            var open = list.classList.toggle('is-open');
            more.textContent = open ? 'See Less' : 'See More';
            more.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    })();
})();
