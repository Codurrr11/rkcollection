<?php
/**
 * Reusable Mega Menu Panel
 *
 * @var string $mega_slug  Category key from $mega_menus
 * @var array  $mega       That category's entry
 * Expects $shop_products in scope (loaded by includes/mega-menu-data.php).
 */

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
                                <a class="mega-menu__link" href="<?php echo htmlspecialchars($mega_href); ?>"><?php echo htmlspecialchars($link); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>

            <?php if ($mega_featured): ?>
                <div class="mega-menu__column mega-menu__column--featured">
                    <h3 class="mega-menu__heading">Featured</h3>
                    <a class="mega-menu__featured" href="product-details.php?id=<?php echo (int) $mega_featured['id']; ?>">
                        <span class="mega-menu__featured-frame">
                            <img class="mega-menu__featured-img"
                                 src="<?php echo htmlspecialchars($mega_featured['image']); ?>"
                                 alt="<?php echo htmlspecialchars($mega_featured['title']); ?>"
                                 loading="lazy"
                                 decoding="async">
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
