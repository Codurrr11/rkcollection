/* ==========================================================================
   RK COLLECTION — THE JOURNAL (blog.php)
   Category filtering, archive search, progressive "load older", scroll reveal
   and the subscribe band. All progressive: the page is fully readable if this
   file never loads.
   ========================================================================== */

(function () {
    'use strict';

    var PAGE_SIZE = 6;

    var grid = document.getElementById('journalGrid');
    if (!grid) {
        return;
    }

    var cards      = Array.prototype.slice.call(grid.querySelectorAll('.journal-card'));
    var chips      = Array.prototype.slice.call(document.querySelectorAll('.journal-chip'));
    var searchBox  = document.getElementById('journalSearch');
    var emptyState = document.getElementById('journalEmpty');
    var moreBtn    = document.getElementById('journalMore');
    var resetBtn   = document.getElementById('journalReset');

    /* Deep links from the journal archive rail arrive as blog.php?cat=<slug> */
    var urlCat = new URLSearchParams(window.location.search).get('cat');
    var activeCat = urlCat && document.querySelector('.journal-chip[data-cat="' + urlCat + '"]')
        ? urlCat
        : 'all';
    var query     = '';
    var visible   = PAGE_SIZE;

    /* ----------------------------------------------------------------------
       Keep the filter rail parked under the sticky site header, whose height
       changes when it collapses into its stuck state.
       ---------------------------------------------------------------------- */
    var siteHeader  = document.querySelector('.site-header');
    var filtersRail = document.getElementById('journalFilters');

    function syncStickyTop() {
        if (!siteHeader || !filtersRail) {
            return;
        }
        var h = Math.round(siteHeader.getBoundingClientRect().height);
        /* Written straight onto the element: setting an inherited custom
           property does not reliably invalidate an already-resolved sticky
           offset, so the rail would keep its CSS fallback. */
        filtersRail.style.top = h + 'px';
    }

    syncStickyTop();
    window.addEventListener('resize', syncStickyTop);

    if (siteHeader && 'ResizeObserver' in window) {
        new ResizeObserver(syncStickyTop).observe(siteHeader);
    } else {
        window.addEventListener('scroll', syncStickyTop, { passive: true });
    }

    /* ----------------------------------------------------------------------
       Filtering
       ---------------------------------------------------------------------- */
    function matches(card) {
        var catOk = activeCat === 'all' || card.getAttribute('data-cat') === activeCat;
        if (!catOk) {
            return false;
        }
        if (!query) {
            return true;
        }
        return (card.getAttribute('data-search') || '').indexOf(query) !== -1;
    }

    function render() {
        var shown = 0;
        var total = 0;

        cards.forEach(function (card) {
            if (!matches(card)) {
                card.classList.add('is-hidden');
                return;
            }
            total++;
            if (shown < visible) {
                card.classList.remove('is-hidden');
                shown++;
            } else {
                card.classList.add('is-hidden');
            }
        });

        if (emptyState) {
            emptyState.hidden = total !== 0;
        }
        if (moreBtn) {
            moreBtn.hidden = total <= shown;
        }
    }

    /* Category chips */
    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            chips.forEach(function (c) {
                c.classList.remove('is-active');
                c.setAttribute('aria-selected', 'false');
            });
            chip.classList.add('is-active');
            chip.setAttribute('aria-selected', 'true');

            activeCat = chip.getAttribute('data-cat') || 'all';
            visible = PAGE_SIZE;
            render();
        });
    });

    /* Search — debounced so typing stays smooth on long archives */
    if (searchBox) {
        var timer = null;
        searchBox.addEventListener('input', function () {
            window.clearTimeout(timer);
            timer = window.setTimeout(function () {
                query = searchBox.value.trim().toLowerCase();
                visible = PAGE_SIZE;
                render();
            }, 160);
        });
    }

    /* Load older stories */
    if (moreBtn) {
        moreBtn.addEventListener('click', function () {
            visible += PAGE_SIZE;
            render();
        });
    }

    /* Reset from the empty state */
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            activeCat = 'all';
            query = '';
            visible = PAGE_SIZE;
            if (searchBox) {
                searchBox.value = '';
            }
            chips.forEach(function (c) {
                var isAll = c.getAttribute('data-cat') === 'all';
                c.classList.toggle('is-active', isAll);
                c.setAttribute('aria-selected', isAll ? 'true' : 'false');
            });
            render();
        });
    }

    render();

    /* ----------------------------------------------------------------------
       Scroll reveal — classes are added here so no-JS visitors never see
       hidden content.
       ---------------------------------------------------------------------- */
    if ('IntersectionObserver' in window) {
        var targets = [].concat(
            cards,
            Array.prototype.slice.call(document.querySelectorAll(
                '.journal-lead__media, .journal-lead__text, .journal-subscribe__inner'
            ))
        );

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-in');
                    io.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

        targets.forEach(function (el, i) {
            el.classList.add('journal-reveal');
            el.style.transitionDelay = (i % 3) * 70 + 'ms';
            io.observe(el);
        });
    }

    /* ----------------------------------------------------------------------
       Subscribe band
       ---------------------------------------------------------------------- */
    var form = document.getElementById('journalSubscribe');
    var note = document.getElementById('journalSubscribeNote');

    if (form && note) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var input = document.getElementById('journalEmail');
            var value = input ? input.value.trim() : '';
            var valid = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value);

            note.classList.toggle('is-error', !valid);
            note.textContent = valid
                ? 'Thank you — the next issue is on its way.'
                : 'Please enter a valid email address.';

            if (valid && input) {
                input.value = '';
            }
        });
    }
}());
