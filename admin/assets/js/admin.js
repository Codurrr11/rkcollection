/* ==========================================================================
   RK ADMIN — DASHBOARD INTERACTION SCRIPT
   Handles shell behavior (sidebar, account menu, keyboard shortcuts),
   Chart.js Radar Chart setup, tab switching, and pagination handlers.
   ========================================================================== */

(function () {
    'use strict';

    var layout = document.getElementById('adminLayout');
    if (!layout) {
        return;
    }

    var MOBILE = 575.98;
    var STORE_KEY = 'rkAdminSidebarCollapsed';

    var isMobile = function () {
        return window.matchMedia('(max-width: ' + MOBILE + 'px)').matches;
    };

    /* ======================================================================
       1. Sidebar — collapse on desktop, off-canvas on phones
       ====================================================================== */
    var panelCollapseBtn = document.getElementById('adminPanelCollapseBtn');
    var railExpandBtn    = document.getElementById('adminRailExpandBtn');
    var overlay          = document.getElementById('adminOverlay');

    function setCollapsed(collapsed) {
        layout.classList.toggle('is-collapsed', collapsed);
        if (panelCollapseBtn) {
            panelCollapseBtn.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
            panelCollapseBtn.setAttribute('aria-label', collapsed ? 'Open sidebar panel' : 'Close sidebar panel');
        }
        if (railExpandBtn) {
            railExpandBtn.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
            railExpandBtn.setAttribute('aria-label', collapsed ? 'Open sidebar panel' : 'Close sidebar panel');
        }
        try {
            window.localStorage.setItem(STORE_KEY, collapsed ? '1' : '0');
        } catch (e) {
            /* private mode — preference won't persist */
        }
    }

    /* Restore last desktop preference */
    try {
        if (window.localStorage.getItem(STORE_KEY) === '1') {
            layout.classList.add('is-collapsed');
            if (panelCollapseBtn) {
                panelCollapseBtn.setAttribute('aria-expanded', 'false');
            }
        }
    } catch (e) {}

    /* Sidebar Close Button (inside panel header) */
    if (panelCollapseBtn) {
        panelCollapseBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (isMobile()) {
                closeNav();
            } else {
                setCollapsed(!layout.classList.contains('is-collapsed'));
            }
        });
    }

    /* Sidebar Open Button (inside slim rail) */
    if (railExpandBtn) {
        railExpandBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            setCollapsed(!layout.classList.contains('is-collapsed'));
        });
    }

    /* Expanding when clicking the rail logo tile while collapsed */
    var railBrand = document.querySelector('.admin-sidebar__rail-brand');
    if (railBrand) {
        railBrand.addEventListener('click', function (e) {
            if (layout.classList.contains('is-collapsed')) {
                e.preventDefault();
                e.stopPropagation();
                setCollapsed(false);
            }
        });
    }

    /* Expanding when clicking any navigation button in the rail while collapsed */
    document.querySelectorAll('.admin-sidebar__rail-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (btn.id === 'adminThemeToggle' || btn.id === 'adminRailExpandBtn') { return; }
            if (layout.classList.contains('is-collapsed')) {
                setCollapsed(false);
            }
        });
    });

    /* Keyboard shortcut: Ctrl/Cmd + B toggles panel */
    document.addEventListener('keydown', function (e) {
        if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'b' && !/^(INPUT|TEXTAREA|SELECT)$/.test(document.activeElement.tagName)) {
            e.preventDefault();
            setCollapsed(!layout.classList.contains('is-collapsed'));
        }
    });

    function openNav() {
        layout.classList.add('is-nav-open');
        if (overlay) {
            overlay.hidden = false;
            window.requestAnimationFrame(function () { overlay.classList.add('is-visible'); });
        }
        document.body.style.overflow = 'hidden';
    }

    function closeNav() {
        layout.classList.remove('is-nav-open');
        if (overlay) {
            overlay.classList.remove('is-visible');
            window.setTimeout(function () { overlay.hidden = true; }, 220);
        }
        document.body.style.overflow = '';
    }

    if (overlay) {
        overlay.addEventListener('click', closeNav);
    }

    window.addEventListener('resize', function () {
        if (!isMobile() && layout.classList.contains('is-nav-open')) {
            closeNav();
        }
    });

    /* Section Accordion toggles */
    document.querySelectorAll('[data-toggle-section]').forEach(function (header) {
        header.addEventListener('click', function () {
            var section = header.closest('.admin-sidebar__section');
            if (section) {
                section.classList.toggle('is-closed');
            }
        });
    });

    /* Star Favorite Buttons */
    document.querySelectorAll('.admin-sidebar__star-btn').forEach(function (star) {
        star.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            star.classList.toggle('is-favorited');
        });
    });

    /* Tab switching on nav items without external link */
    document.querySelectorAll('.admin-sidebar__panel .admin-sidebar__item').forEach(function (item) {
        item.addEventListener('click', function (e) {
            var href = item.getAttribute('href');
            if (!href || href === '#') {
                e.preventDefault();
                document.querySelectorAll('.admin-sidebar__panel .admin-sidebar__item').forEach(function (i) {
                    i.classList.remove('is-active');
                });
                item.classList.add('is-active');
            }
        });
    });

    /* Theme Toggle */
    var themeToggle = document.getElementById('adminThemeToggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            document.documentElement.classList.toggle('dark');
        });
    }

    /* Pro Card Dismiss */
    var proClose = document.querySelector('.admin-sidebar__pro-close');
    if (proClose) {
        proClose.addEventListener('click', function () {
            var proCard = proClose.closest('.admin-sidebar__pro-card');
            if (proCard) {
                proCard.style.display = 'none';
            }
        });
    }

    /* ======================================================================
       2. Account dropdown & Keyboard shortcuts
       ====================================================================== */
    var accountTrigger = document.getElementById('adminAccountTrigger');
    var accountMenu    = document.getElementById('adminAccountMenu');

    function closeAccount() {
        if (!accountMenu) { return; }
        accountMenu.hidden = true;
        if (accountTrigger) {
            accountTrigger.setAttribute('aria-expanded', 'false');
        }
    }

    if (accountTrigger && accountMenu) {
        accountTrigger.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = accountMenu.hidden;
            accountMenu.hidden = !open;
            accountTrigger.setAttribute('aria-expanded', open ? 'true' : 'false');
        });

        document.addEventListener('click', function (e) {
            if (!accountMenu.hidden && !accountMenu.contains(e.target)) {
                closeAccount();
            }
        });
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeAccount();
            if (layout.classList.contains('is-nav-open')) { closeNav(); }
        }
        /* "/" focuses search unless activeElement is already input */
        if (e.key === '/' && !/^(INPUT|TEXTAREA|SELECT)$/.test(document.activeElement.tagName)) {
            var search = document.getElementById('adminSearch');
            if (search) {
                e.preventDefault();
                search.focus();
            }
        }
    });

    /* ======================================================================
       3. Progress bars
       ====================================================================== */
    document.querySelectorAll('[data-progress]').forEach(function (bar) {
        var pct = Math.max(0, Math.min(100, parseFloat(bar.getAttribute('data-progress')) || 0));
        window.requestAnimationFrame(function () {
            bar.style.width = pct + '%';
        });
    });

    /* ======================================================================
       4. Chart.js Radar Chart (Green theme matching reference image)
       ====================================================================== */
    if (typeof Chart !== 'undefined') {
        var radarCanvas = document.getElementById('adminRadarChart');
        if (radarCanvas) {
            var radarData = {};
            try {
                radarData = JSON.parse(radarCanvas.getAttribute('data-radar') || '{}');
            } catch (e) {
                radarData = {};
            }

            var GREEN      = '#16a34a';
            var DARK_GREEN = '#15803d';
            var BORDER     = 'rgba(0, 0, 0, 0.08)';
            var LABEL_COLOR= '#475569';

            var buildRadarData = function (metric) {
                var set = radarData[metric] || radarData['revenue'];
                if (!set) { return null; }

                return {
                    labels: set.labels,
                    datasets: [
                        {
                            label: 'Current position',
                            data: set.this_month,
                            backgroundColor: 'rgba(22, 163, 74, 0.35)',
                            borderColor: GREEN,
                            borderWidth: 2,
                            pointBackgroundColor: GREEN,
                            pointBorderColor: '#ffffff',
                            pointHoverBackgroundColor: '#ffffff',
                            pointHoverBorderColor: GREEN,
                            pointRadius: 4
                        },
                        {
                            label: 'To be',
                            data: set.last_month,
                            backgroundColor: 'rgba(21, 128, 61, 0.18)',
                            borderColor: DARK_GREEN,
                            borderWidth: 2,
                            pointBackgroundColor: DARK_GREEN,
                            pointBorderColor: '#ffffff',
                            pointHoverBackgroundColor: '#ffffff',
                            pointHoverBorderColor: DARK_GREEN,
                            pointRadius: 4
                        }
                    ]
                };
            };

            var radarChart = new Chart(radarCanvas, {
                type: 'radar',
                data: buildRadarData('revenue'),
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#181a22',
                            borderColor: 'rgba(255, 255, 255, 0.1)',
                            borderWidth: 1,
                            padding: 10,
                            cornerRadius: 6,
                            usePointStyle: true
                        }
                    },
                    scales: {
                        r: {
                            angleLines: { color: BORDER },
                            grid: { color: BORDER },
                            pointLabels: {
                                font: {
                                    family: '"Overpass", system-ui, sans-serif',
                                    size: 11,
                                    weight: 600
                                },
                                color: LABEL_COLOR
                            },
                            ticks: {
                                display: false,
                                stepSize: 20
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }
                }
            });

            /* Radar Tab Switcher (Revenue / Orders / Overall) */
            var radarTabs = document.querySelectorAll('[data-radar-tab]');
            radarTabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    var metric = tab.getAttribute('data-radar-tab');
                    var newData = buildRadarData(metric);
                    if (!newData) { return; }

                    radarTabs.forEach(function (t) {
                        t.classList.remove('is-active');
                        t.setAttribute('aria-selected', 'false');
                    });
                    tab.classList.add('is-active');
                    tab.setAttribute('aria-selected', 'true');

                    radarChart.data = newData;
                    radarChart.update();
                });
            });
        }
    }

    /* ======================================================================
       5. Recommended Actions Tab Switcher
       ====================================================================== */
    var actionTabs = document.querySelectorAll('[data-action-tab]');
    actionTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var targetTab = tab.getAttribute('data-action-tab');

            actionTabs.forEach(function (tabItem) {
                tabItem.classList.remove('is-active');
                tabItem.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('is-active');
            tab.setAttribute('aria-selected', 'true');

            document.querySelectorAll('.admin-actions-pane').forEach(function (pane) {
                pane.classList.remove('is-active');
            });

            var targetPane = document.getElementById('adminActionPane-' + targetTab);
            if (targetPane) {
                targetPane.classList.add('is-active');
            }
        });
    });

    /* ======================================================================
       6. Tasks / Goals Tab Switcher
       ====================================================================== */
    var taskTabs = document.querySelectorAll('[data-task-tab]');
    taskTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var targetView = tab.getAttribute('data-task-tab');

            taskTabs.forEach(function (tabItem) {
                tabItem.classList.remove('is-active');
                tabItem.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('is-active');
            tab.setAttribute('aria-selected', 'true');

            document.querySelectorAll('.admin-tasks-pane').forEach(function (pane) {
                pane.classList.remove('is-active');
            });

            var targetPane = document.getElementById('adminTasksPane-' + targetView);
            if (targetPane) {
                targetPane.classList.add('is-active');
            }
        });
    });

    /* ======================================================================
       7. Card Pagination Controls
       ====================================================================== */
    function setupPagination(prevBtnId, nextBtnId, infoId, maxPages) {
        var prevBtn = document.getElementById(prevBtnId);
        var nextBtn = document.getElementById(nextBtnId);
        var info    = document.getElementById(infoId);

        if (!prevBtn || !nextBtn || !info) { return; }

        var currentPage = 1;

        var updateView = function () {
            info.textContent = currentPage + ' of ' + maxPages;
        };

        prevBtn.addEventListener('click', function () {
            currentPage = currentPage > 1 ? currentPage - 1 : maxPages;
            updateView();
        });

        nextBtn.addEventListener('click', function () {
            currentPage = currentPage < maxPages ? currentPage + 1 : 1;
            updateView();
        });
    }

    setupPagination('adminTasksPrev', 'adminTasksNext', 'adminTasksPageInfo', 3);
    setupPagination('adminActivityPrev', 'adminActivityNext', 'adminActivityPageInfo', 3);

}());
