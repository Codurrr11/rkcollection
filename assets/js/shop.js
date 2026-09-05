/* ==========================================================================
   RK COLLECTION — SHOP PAGE
   Client-side filtering, sorting, pagination and the off-canvas filter drawer.
   Loaded only on shop.php.
   ========================================================================== */
(function () {
    'use strict';

    var PER_PAGE = 12;

    var root = document.getElementById('shopPage');
    if (!root) { return; }

    var els = {
        filters:       document.getElementById('shopFilters'),
        overlay:       document.getElementById('shopFiltersOverlay'),
        toggle:        document.getElementById('shopFilterToggle'),
        toggleCount:   document.getElementById('shopFilterToggleCount'),
        close:         document.getElementById('shopFiltersClose'),
        clearSidebar:  document.getElementById('shopFiltersClear'),
        grid:          document.getElementById('shopGrid'),
        count:         document.getElementById('shopResultCount'),
        sort:          document.getElementById('shopSort'),
        active:        document.getElementById('shopActiveFilters'),
        pagination:    document.getElementById('shopPagination'),
        empty:         document.getElementById('shopEmpty'),
        emptyBtn:      document.getElementById('shopEmptyClear'),
        rangeMin:      document.getElementById('shopPriceMin'),
        rangeMax:      document.getElementById('shopPriceMax'),
        rangeFill:     document.getElementById('shopPriceFill'),
        priceOutMin:   document.getElementById('shopPriceOutMin'),
        priceOutMax:   document.getElementById('shopPriceOutMax')
    };

    var items = Array.prototype.slice.call(els.grid.querySelectorAll('.shop-grid__item'));

    /* --- Product model built once from the rendered markup ---------------- */
    var products = items.map(function (el, index) {
        return {
            el:         el,
            order:      index,
            category:   el.getAttribute('data-category') || '',
            fabric:     el.getAttribute('data-fabric') || '',
            price:      parseInt(el.getAttribute('data-price'), 10) || 0,
            added:      parseInt(el.getAttribute('data-added'), 10) || 0,
            popularity: parseInt(el.getAttribute('data-popularity'), 10) || 0
        };
    });

    var PRICE_FLOOR = parseInt(els.rangeMin.min, 10);
    var PRICE_CEIL  = parseInt(els.rangeMax.max, 10);
    var PRICE_STEP  = parseInt(els.rangeMin.step, 10) || 500;

    var state = {
        category: [],
        fabric:   [],
        priceMin: PRICE_FLOOR,
        priceMax: PRICE_CEIL,
        sort:     'default',
        page:     1
    };

    /* ======================================================================
       Helpers
       ====================================================================== */
    function formatPrice(value) {
        return '₹' + value.toLocaleString('en-IN');
    }

    function labelFor(group, value) {
        var input = els.filters.querySelector(
            '.shop-filters__check-input[data-group="' + group + '"][value="' + value + '"]'
        );
        if (input) {
            var text = input.parentNode.querySelector('.shop-filters__check-text');
            if (text) { return text.textContent.trim(); }
        }
        return value;
    }

    function priceIsDefault() {
        return state.priceMin === PRICE_FLOOR && state.priceMax === PRICE_CEIL;
    }

    function activeCount() {
        return state.category.length + state.fabric.length +
            (priceIsDefault() ? 0 : 1);
    }

    function toggleValue(list, value) {
        var i = list.indexOf(value);
        if (i > -1) { list.splice(i, 1); } else { list.push(value); }
    }

    /* ======================================================================
       Filtering + sorting
       ====================================================================== */
    function matches(product) {
        if (state.category.length && state.category.indexOf(product.category) === -1) { return false; }
        if (state.fabric.length && state.fabric.indexOf(product.fabric) === -1) { return false; }
        if (product.price < state.priceMin || product.price > state.priceMax) { return false; }
        return true;
    }

    function sortList(list) {
        var sorted = list.slice();
        switch (state.sort) {
            case 'price-asc':
                sorted.sort(function (a, b) { return a.price - b.price; });
                break;
            case 'price-desc':
                sorted.sort(function (a, b) { return b.price - a.price; });
                break;
            case 'newest':
                sorted.sort(function (a, b) { return b.added - a.added; });
                break;
            case 'popularity':
                sorted.sort(function (a, b) { return b.popularity - a.popularity; });
                break;
            default:
                sorted.sort(function (a, b) { return a.order - b.order; });
        }
        return sorted;
    }

    /* ======================================================================
       Rendering
       ====================================================================== */
    function renderActivePills() {
        var count = activeCount();

        if (els.toggleCount) {
            els.toggleCount.textContent = count;
            els.toggleCount.hidden = count === 0;
        }
        if (els.clearSidebar) { els.clearSidebar.hidden = count === 0; }

        if (count === 0) {
            els.active.hidden = true;
            els.active.innerHTML = '';
            return;
        }

        var frag = document.createDocumentFragment();

        var label = document.createElement('span');
        label.className = 'shop-active__label';
        label.textContent = 'Active';
        frag.appendChild(label);

        function pill(group, value, text) {
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'shop-active__pill';
            btn.setAttribute('data-group', group);
            btn.setAttribute('data-value', value);
            btn.setAttribute('aria-label', 'Remove filter ' + text);

            var span = document.createElement('span');
            span.textContent = text;
            btn.appendChild(span);

            var x = document.createElement('span');
            x.className = 'shop-active__pill-x';
            x.setAttribute('aria-hidden', 'true');
            x.textContent = '×';
            btn.appendChild(x);

            frag.appendChild(btn);
        }

        state.category.forEach(function (v) { pill('category', v, labelFor('category', v)); });
        state.fabric.forEach(function (v) { pill('fabric', v, labelFor('fabric', v)); });

        if (!priceIsDefault()) {
            pill('price', 'price', formatPrice(state.priceMin) + ' – ' + formatPrice(state.priceMax));
        }

        var clear = document.createElement('button');
        clear.type = 'button';
        clear.className = 'shop-active__clear';
        clear.setAttribute('data-action', 'clear-all');
        clear.textContent = 'Clear All';
        frag.appendChild(clear);

        els.active.innerHTML = '';
        els.active.appendChild(frag);
        els.active.hidden = false;
    }

    function renderPagination(totalPages) {
        els.pagination.innerHTML = '';

        if (totalPages <= 1) {
            els.pagination.hidden = true;
            return;
        }
        els.pagination.hidden = false;

        var frag = document.createDocumentFragment();

        function arrow(direction, disabled, glyph, label) {
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'shop-pagination__btn shop-pagination__btn--arrow';
            btn.setAttribute('data-page', direction);
            btn.setAttribute('aria-label', label);
            btn.disabled = disabled;
            btn.innerHTML = glyph;
            frag.appendChild(btn);
        }

        function chevron(points) {
            return '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" ' +
                'stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' +
                '<polyline points="' + points + '"></polyline></svg>';
        }

        arrow('prev', state.page === 1, chevron('15 18 9 12 15 6'), 'Previous page');

        // Window the page numbers: first, last, and a band around the current page.
        var pages = [];
        for (var p = 1; p <= totalPages; p++) {
            if (p === 1 || p === totalPages || Math.abs(p - state.page) <= 1) {
                pages.push(p);
            } else if (pages[pages.length - 1] !== '...') {
                pages.push('...');
            }
        }

        pages.forEach(function (p) {
            if (p === '...') {
                var dots = document.createElement('span');
                dots.className = 'shop-pagination__dots';
                dots.textContent = '…';
                frag.appendChild(dots);
                return;
            }
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'shop-pagination__btn' + (p === state.page ? ' is-current' : '');
            btn.setAttribute('data-page', String(p));
            btn.textContent = p;
            if (p === state.page) { btn.setAttribute('aria-current', 'page'); }
            frag.appendChild(btn);
        });

        arrow('next', state.page === totalPages, chevron('9 18 15 12 9 6'), 'Next page');

        els.pagination.appendChild(frag);
    }

    function render(scrollToTop) {
        var visible = sortList(products.filter(matches));
        var total = visible.length;
        var totalPages = Math.max(1, Math.ceil(total / PER_PAGE));

        if (state.page > totalPages) { state.page = totalPages; }

        var start = (state.page - 1) * PER_PAGE;
        var page = visible.slice(start, start + PER_PAGE);

        products.forEach(function (product) { product.el.hidden = true; });

        // Re-append in sorted order so the DOM order is the visual order.
        page.forEach(function (product) {
            product.el.hidden = false;
            product.el.classList.add('is-entering');
            els.grid.appendChild(product.el);
        });

        // Next frame: release the entering state so the fade-in runs.
        window.requestAnimationFrame(function () {
            window.requestAnimationFrame(function () {
                page.forEach(function (product) { product.el.classList.remove('is-entering'); });
            });
        });

        if (total === 0) {
            els.count.textContent = 'No sarees match your selection';
            els.empty.hidden = false;
        } else {
            els.count.textContent = 'Showing ' + (start + 1) + '–' + (start + page.length) +
                ' of ' + total + (total === 1 ? ' saree' : ' sarees');
            els.empty.hidden = true;
        }

        renderPagination(totalPages);
        renderActivePills();

        if (scrollToTop) {
            var top = root.querySelector('.shop-toolbar');
            if (top) {
                var y = top.getBoundingClientRect().top + window.pageYOffset - 140;
                window.scrollTo({ top: y, behavior: 'smooth' });
            }
        }
    }

    /* ======================================================================
       Price range (dual handle)
       ====================================================================== */
    function syncRangeUI() {
        var span = PRICE_CEIL - PRICE_FLOOR;
        var left = ((state.priceMin - PRICE_FLOOR) / span) * 100;
        var right = ((state.priceMax - PRICE_FLOOR) / span) * 100;

        els.rangeFill.style.left = left + '%';
        els.rangeFill.style.width = (right - left) + '%';

        els.priceOutMin.textContent = formatPrice(state.priceMin);
        els.priceOutMax.textContent = formatPrice(state.priceMax) +
            (state.priceMax === PRICE_CEIL ? '+' : '');
    }

    function onRangeInput() {
        var min = parseInt(els.rangeMin.value, 10);
        var max = parseInt(els.rangeMax.value, 10);

        // Keep the handles from crossing.
        if (min > max - PRICE_STEP) {
            if (this === els.rangeMin) {
                min = max - PRICE_STEP;
                els.rangeMin.value = min;
            } else {
                max = min + PRICE_STEP;
                els.rangeMax.value = max;
            }
        }

        state.priceMin = min;
        state.priceMax = max;
        state.page = 1;
        syncRangeUI();
        render(false);
    }

    /* ======================================================================
       Drawer
       ====================================================================== */
    function openDrawer() {
        els.filters.classList.add('is-open');
        els.overlay.classList.add('is-open');
        document.body.style.overflow = 'hidden';
        if (els.toggle) { els.toggle.setAttribute('aria-expanded', 'true'); }
    }

    function closeDrawer() {
        els.filters.classList.remove('is-open');
        els.overlay.classList.remove('is-open');
        document.body.style.overflow = '';
        if (els.toggle) { els.toggle.setAttribute('aria-expanded', 'false'); }
    }

    /* ======================================================================
       Reset
       ====================================================================== */
    function clearAll() {
        state.category = [];
        state.fabric = [];
        state.priceMin = PRICE_FLOOR;
        state.priceMax = PRICE_CEIL;
        state.page = 1;

        els.filters.querySelectorAll('.shop-filters__check-input').forEach(function (input) {
            input.checked = false;
        });

        els.rangeMin.value = PRICE_FLOOR;
        els.rangeMax.value = PRICE_CEIL;
        syncRangeUI();
        render(false);
    }

    /* ======================================================================
       Events
       ====================================================================== */
    els.filters.addEventListener('change', function (e) {
        var input = e.target.closest('.shop-filters__check-input');
        if (!input) { return; }
        var group = input.getAttribute('data-group');
        if (!state[group]) { return; }
        toggleValue(state[group], input.value);
        state.page = 1;
        render(false);
    });

    els.filters.addEventListener('click', function (e) {
        if (e.target.closest('#shopFiltersClear')) { clearAll(); }
    });

    els.active.addEventListener('click', function (e) {
        if (e.target.closest('[data-action="clear-all"]')) {
            clearAll();
            return;
        }

        var pill = e.target.closest('.shop-active__pill');
        if (!pill) { return; }

        var group = pill.getAttribute('data-group');
        var value = pill.getAttribute('data-value');

        if (group === 'price') {
            state.priceMin = PRICE_FLOOR;
            state.priceMax = PRICE_CEIL;
            els.rangeMin.value = PRICE_FLOOR;
            els.rangeMax.value = PRICE_CEIL;
            syncRangeUI();
        } else if (state[group]) {
            toggleValue(state[group], value);
            var input = els.filters.querySelector(
                '.shop-filters__check-input[data-group="' + group + '"][value="' + value + '"]'
            );
            if (input) { input.checked = false; }
        }

        state.page = 1;
        render(false);
    });

    els.sort.addEventListener('change', function () {
        state.sort = els.sort.value;
        state.page = 1;
        render(false);
    });

    els.pagination.addEventListener('click', function (e) {
        var btn = e.target.closest('.shop-pagination__btn');
        if (!btn || btn.disabled) { return; }

        var target = btn.getAttribute('data-page');
        if (target === 'prev') {
            state.page = Math.max(1, state.page - 1);
        } else if (target === 'next') {
            state.page = state.page + 1;
        } else {
            state.page = parseInt(target, 10);
        }
        render(true);
    });

    els.rangeMin.addEventListener('input', onRangeInput);
    els.rangeMax.addEventListener('input', onRangeInput);

    if (els.emptyBtn) { els.emptyBtn.addEventListener('click', clearAll); }
    if (els.toggle) { els.toggle.addEventListener('click', openDrawer); }
    if (els.close) { els.close.addEventListener('click', closeDrawer); }
    els.overlay.addEventListener('click', closeDrawer);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && els.filters.classList.contains('is-open')) { closeDrawer(); }
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth >= 992 && els.filters.classList.contains('is-open')) { closeDrawer(); }
    });

    /* ======================================================================
       Boot — pick up any category pre-checked server side from ?category=
       ====================================================================== */
    els.filters.querySelectorAll('.shop-filters__check-input:checked').forEach(function (input) {
        var group = input.getAttribute('data-group');
        if (state[group] && state[group].indexOf(input.value) === -1) {
            state[group].push(input.value);
        }
    });

    state.sort = els.sort.value || 'default';
    syncRangeUI();
    render(false);
})();
