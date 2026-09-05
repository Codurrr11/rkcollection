<?php
/**
 * RK COLLECTION — UNIFIED NAVIGATION & MEGA MENU COMPONENT
 * Consolidates category navigation datasets, desktop mega menu panels,
 * and the luxury mobile navigation drawer into a single unified file.
 */

require_once __DIR__ . '/products-data.php';

/* --------------------------------------------------------------------------
   MENU SPINE
   Only the identity of each menu lives here. The links themselves are built
   from the live catalogue below, so every entry in the mega menu resolves to a
   filter shop.php can actually apply.
   -------------------------------------------------------------------------- */
$mega_menu_spine = [
    'banarasi'    => ['label' => 'Banarasi',    'featured' => 1],
    'kanjivaram'  => ['label' => 'Kanjivaram',  'featured' => 9],
    'silk'        => ['label' => 'Pure Silk',   'featured' => 2],
    'cotton'      => ['label' => 'Cotton',      'featured' => 18],
    'designer'    => ['label' => 'Designer',    'featured' => 5],
    'bridal'      => ['label' => 'Bridal',      'featured' => 17],
    'collections' => ['label' => 'Collections', 'featured' => 11, 'shop_slug' => ''],
];

if (!function_exists('rk_money')) {
    function rk_money($value) {
        return '₹' . number_format((int) $value);
    }
}

/**
 * Three price bands drawn from the real spread of a category, rounded to the
 * step the shop slider uses.
 */
if (!function_exists('rk_price_links')) {
    /**
     * Price bands for one menu column, split on the shop slider's own step grid.
     *
     * Boundaries must land on the grid: the range inputs snap to their step, so
     * an off-grid value would leave the slider showing something other than the
     * filter the link applied. Bands are also checked against the real prices so
     * none of them can open an empty grid — a category with too few pieces to
     * carry three bands falls back to two, and one that cannot carry two gets no
     * price column at all.
     */
    function rk_price_links(array $products, $base, $step = 500) {
        $values = array_column($products, 'price_value');
        if (count($values) < 2) {
            return [];
        }
        sort($values);

        $min = (int) $values[0];
        $max = (int) $values[count($values) - 1];
        if ($max - $min < $step) {
            return [];
        }

        $grid = [];
        for ($v = (int) (floor($min / $step) * $step); $v <= $max; $v += $step) {
            $grid[] = $v;
        }

        $count_upto  = function ($limit) use ($values) {
            $n = 0; foreach ($values as $v) { if ($v <= $limit) { $n++; } } return $n;
        };
        $count_range = function ($from, $to) use ($values) {
            $n = 0; foreach ($values as $v) { if ($v >= $from && $v <= $to) { $n++; } } return $n;
        };
        $count_from  = function ($limit) use ($values) {
            $n = 0; foreach ($values as $v) { if ($v >= $limit) { $n++; } } return $n;
        };

        /* --- Preferred: three bands, as close to thirds as the data allows -- */
        $target_low  = $min + ($max - $min) / 3;
        $target_high = $min + ($max - $min) * 2 / 3;
        $best = null;

        foreach ($grid as $low) {
            if (!$count_upto($low)) {
                continue;
            }
            foreach ($grid as $high) {
                if ($high <= $low
                    || !$count_range($low + $step, $high)
                    || !$count_from($high + $step)) {
                    continue;
                }
                $cost = abs($low - $target_low) + abs($high - $target_high);
                if ($best === null || $cost < $best['cost']) {
                    $best = ['low' => $low, 'high' => $high, 'cost' => $cost];
                }
            }
        }

        if ($best) {
            $low  = $best['low'];
            $high = $best['high'];
            return [
                ['label' => 'Under ' . rk_money($low + $step),
                 'href'  => $base . 'max=' . $low],
                ['label' => rk_money($low + $step) . ' – ' . rk_money($high),
                 'href'  => $base . 'min=' . ($low + $step) . '&max=' . $high],
                ['label' => 'Above ' . rk_money($high),
                 'href'  => $base . 'min=' . ($high + $step)],
            ];
        }

        /* --- Fallback: a single split near the median ---------------------- */
        $median = $values[(int) floor(count($values) / 2)];
        $split  = null;
        foreach ($grid as $cut) {
            if (!$count_upto($cut) || !$count_from($cut + $step)) {
                continue;
            }
            $cost = abs($cut - $median);
            if ($split === null || $cost < $split['cost']) {
                $split = ['cut' => $cut, 'cost' => $cost];
            }
        }

        if ($split) {
            $cut = $split['cut'];
            return [
                ['label' => 'Under ' . rk_money($cut + $step),      'href' => $base . 'max=' . $cut],
                ['label' => rk_money($cut + $step) . ' & above',    'href' => $base . 'min=' . ($cut + $step)],
            ];
        }

        return [];
    }
}

/**
 * Build one menu's columns from the catalogue. Every href is a real shop query.
 */
if (!function_exists('rk_mega_build_columns')) {
    function rk_mega_build_columns($slug, array $shop_products, array $shop_categories, array $shop_fabrics) {
        $is_all = ($slug === 'collections');
        $scoped = $is_all
            ? $shop_products
            : array_values(array_filter($shop_products, function ($p) use ($slug) {
                return $p['category'] === $slug;
            }));

        if (!$scoped) {
            $scoped = $shop_products;
        }

        $base = $is_all ? 'shop?' : 'shop?category=' . rawurlencode($slug) . '&';

        /* --- By fabric: only fabrics this category actually stocks --------- */
        $fabric_counts = [];
        foreach ($scoped as $p) {
            $fabric_counts[$p['fabric']] = isset($fabric_counts[$p['fabric']]) ? $fabric_counts[$p['fabric']] + 1 : 1;
        }
        arsort($fabric_counts);

        $fabric_links = [];
        foreach (array_slice(array_keys($fabric_counts), 0, 5) as $fabric) {
            $fabric_links[] = [
                'label' => isset($shop_fabrics[$fabric]) ? $shop_fabrics[$fabric] : ucfirst($fabric),
                'href'  => $base . 'fabric=' . rawurlencode($fabric),
                'count' => $fabric_counts[$fabric],
            ];
        }

        /* --- By price: bands from the real spread -------------------------- */
        $price_links = rk_price_links($scoped, $base);

        /* --- The edit: sorts the shop already supports --------------------- */
        $edit_links = [
            ['label' => 'New Arrivals',       'href' => $base . 'sort=newest'],
            ['label' => 'Bestsellers',        'href' => $base . 'sort=popularity'],
            ['label' => 'Price: Low to High', 'href' => $base . 'sort=price-asc'],
            ['label' => 'Price: High to Low', 'href' => $base . 'sort=price-desc'],
        ];

        /* --- Cross-links to the other weaves ------------------------------- */
        $other_links = [];
        foreach ($shop_categories as $cat_slug => $cat_label) {
            if ($cat_slug === $slug) {
                continue;
            }
            $other_links[] = [
                'label' => $cat_label,
                'href'  => 'shop?category=' . rawurlencode($cat_slug),
            ];
        }
        $other_links   = array_slice($other_links, 0, 6);
        $other_links[] = ['label' => 'View Every Saree', 'href' => 'shop'];

        $columns = [
            ['heading' => 'By Fabric',   'links' => $fabric_links],
            ['heading' => 'By Price',    'links' => $price_links],
            ['heading' => 'The Edit',    'links' => $edit_links],
            ['heading' => 'More Weaves', 'links' => $other_links],
        ];

        return array_values(array_filter($columns, function ($column) {
            return !empty($column['links']);
        }));
    }
}

$mega_menus = [];
foreach ($mega_menu_spine as $mega_slug => $mega_meta) {
    $mega_menus[$mega_slug] = $mega_meta + [
        'columns' => rk_mega_build_columns($mega_slug, $shop_products, $shop_categories, $shop_fabrics),
    ];
}

if (!function_exists('rk_mega_href')) {
    function rk_mega_href($slug, array $mega) {
        $target = array_key_exists('shop_slug', $mega) ? $mega['shop_slug'] : $slug;
        return $target === '' ? 'shop' : 'shop?category=' . $target;
    }
}

/**
 * Render Desktop Mega Menu Panels
 */
if (!function_exists('rk_render_desktop_mega_panels')) {
    function rk_render_desktop_mega_panels(array $mega_menus, ?array $shop_products = null) {
        if ($shop_products === null) {
            $shop_products = $GLOBALS['shop_products'] ?? [];
        }
        foreach ($mega_menus as $mega_slug => $mega) {
            $mega_href     = rk_mega_href($mega_slug, $mega);
            $mega_featured = rk_find_product($shop_products, $mega['featured'] ?? 0);
            ?>
            <div class="mega-menu" id="mega-<?php echo htmlspecialchars($mega_slug); ?>" data-mega-panel="<?php echo htmlspecialchars($mega_slug); ?>" role="region" aria-label="<?php echo htmlspecialchars($mega['label']); ?> menu" hidden>
                <div class="mega-menu__inner">
                    <div class="mega-menu__columns">
                        <?php foreach ($mega['columns'] as $column): ?>
                            <div class="mega-menu__column">
                                <h3 class="mega-menu__heading"><?php echo htmlspecialchars($column['heading']); ?></h3>
                                <ul class="mega-menu__list">
                                    <?php foreach ($column['links'] as $link): ?>
                                        <li>
                                            <a class="mega-menu__link" href="<?php echo htmlspecialchars($link['href']); ?>">
                                                <span><?php echo htmlspecialchars($link['label']); ?></span>
                                                <?php if (!empty($link['count'])): ?>
                                                    <span class="mega-menu__link-count"><?php echo (int) $link['count']; ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>

                        <?php if ($mega_featured): ?>
                            <div class="mega-menu__column mega-menu__column--featured">
                                <h3 class="mega-menu__heading">Featured</h3>
                                <a class="mega-menu__featured" href="<?php echo htmlspecialchars($mega_featured['link']); ?>">
                                    <span class="mega-menu__featured-frame">
                                        <img class="mega-menu__featured-img" src="<?php echo htmlspecialchars($mega_featured['image']); ?>" alt="<?php echo htmlspecialchars($mega_featured['title']); ?>" loading="lazy" decoding="async">
                                    </span>
                                    <span class="mega-menu__featured-name"><?php echo htmlspecialchars($mega_featured['title']); ?></span>
                                    <span class="mega-menu__featured-price"><?php echo htmlspecialchars($mega_featured['sale_price'] ?: $mega_featured['price']); ?></span>
                                    <span class="mega-menu__featured-cta">Shop Now</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mega-menu__footer">
                        <a class="mega-menu__view-all" href="<?php echo htmlspecialchars($mega_href); ?>">
                            View All <?php echo htmlspecialchars($mega['label']); ?>
                            <span class="mega-menu__view-all-arrow" aria-hidden="true"><?php echo rk_icon('arrow-right', 14, 1.7); ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

/**
 * Render Mobile Navigation Drawer
 */
if (!function_exists('rk_render_mobile_drawer')) {
    function rk_render_mobile_drawer(array $mega_menus) {
        ?>
        <div class="mobile-drawer-overlay" id="mobileDrawerOverlay"></div>
        <aside class="mobile-drawer" id="mobileDrawer" aria-label="Mobile Navigation" aria-hidden="true">
            <div class="mobile-drawer__header">
                <a href="index" class="mobile-drawer__logo-link">
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
                <div class="mobile-drawer__search">
                    <input type="text" class="mobile-drawer__search-input" placeholder="Search handloom sarees..." aria-label="Search sarees">
                    <button type="button" class="mobile-drawer__search-btn" aria-label="Search">
                        <?php echo rk_icon('search', 16); ?>
                    </button>
                </div>

                <nav class="mobile-drawer__nav">
                    <span class="mobile-drawer__nav-heading">SAREE COLLECTIONS</span>
                    <ul class="mobile-drawer__menu">
                        <li><a href="index" class="mobile-drawer__link is-active">Home</a></li>
                    </ul>

                    <ul class="mobile-acc">
                        <?php foreach ($mega_menus as $mega_slug => $mega): ?>
                            <li class="mobile-acc__item" data-acc>
                                <button type="button" class="mobile-acc__trigger" aria-expanded="false" aria-controls="acc-<?php echo htmlspecialchars($mega_slug); ?>">
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
                                                    <li><a class="mobile-acc__link" href="<?php echo htmlspecialchars($link['href']); ?>"><?php echo htmlspecialchars($link['label']); ?></a></li>
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

                <nav class="mobile-drawer__nav">
                    <span class="mobile-drawer__nav-heading">QUICK LINKS</span>
                    <ul class="mobile-drawer__menu">
                        <li><a href="about" class="mobile-drawer__link">About Our Heritage</a></li>
                        <li><a href="index#testimonials" class="mobile-drawer__link">Client Reviews</a></li>
                        <li><a href="index#faq" class="mobile-drawer__link">Frequently Asked Questions</a></li>
                        <li><a href="contact" class="mobile-drawer__link">Contact & Stores</a></li>
                        <li><a href="blog" class="mobile-drawer__link">The Journal</a></li>
                    </ul>
                </nav>
            </div>

            <div class="mobile-drawer__footer">
                <a href="https://wa.me/919876543210" target="_blank" rel="noopener" class="mobile-drawer__wa-btn">
                    <?php echo rk_icon('whatsapp', 20); ?>
                    <span>WhatsApp Shopping</span>
                </a>
                <p class="mobile-drawer__contact-info">Call us: +91 98765 43210</p>
            </div>
        </aside>
        <?php
    }
}
