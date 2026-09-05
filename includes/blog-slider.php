<?php
/**
 * RK Collection — Blog / Journal Slider Component
 * Pure, sober, modern editorial journal section.
 */
$articles = [
    [
        'title'    => 'The Sacred Art of Kadwa Weaving in Pure Gold Zari',
        'category' => 'HERITAGE WEAVING',
        'date'     => 'SEP 02, 2026',
        'read'     => '5 MIN READ',
        'excerpt'  => 'Discover the intricate handloom technique passed down through generations of master Varanasi weavers, crafting motifs without loose threads.',
        'image'    => 'assets/images/products/banarasi-kora-saree.jpg',
        'link'     => '#read-article-1'
    ],
    [
        'title'    => 'Kanjivaram Secrets: Identifying Pure Silk & Real Silver Zari',
        'category' => 'AUTHENTICITY GUIDE',
        'date'     => 'AUG 28, 2026',
        'read'     => '4 MIN READ',
        'excerpt'  => 'How to test silk mark authenticity, inspect Korvai borders, and spot authentic silver-plated zari threads in royal South Indian handlooms.',
        'image'    => 'assets/images/collections/kalanjali-silk-saree.jpg',
        'link'     => '#read-article-2'
    ],
    [
        'title'    => 'The Renaissance of Metallic Tissue Silks in Festive Fashion',
        'category' => 'FASHION TRENDS',
        'date'     => 'AUG 20, 2026',
        'read'     => '6 MIN READ',
        'excerpt'  => 'Exploring why lightweight tissue silk sarees with subtle golden sheen have become the preferred choice for modern bridal celebrations.',
        'image'    => 'assets/images/products/tissue-silk-saree.jpg',
        'link'     => '#read-article-3'
    ],
    [
        'title'    => 'Bridal Weaves Guide: Morning Rituals vs Evening Gala',
        'category' => 'BRIDAL STYLING',
        'date'     => 'AUG 12, 2026',
        'read'     => '7 MIN READ',
        'excerpt'  => 'A curated guide to choosing pastel Mangalagiris for daytime pūjās and heavy rich oxblood Kanjeevarams for evening receptions.',
        'image'    => 'assets/images/collections/soft-silk-saree.jpg',
        'link'     => '#read-article-4'
    ],
    [
        'title'    => 'Saree Care 101: Preserving Handwoven Silks for Generations',
        'category' => 'MAINTENANCE',
        'date'     => 'AUG 05, 2026',
        'read'     => '4 MIN READ',
        'excerpt'  => 'Essential techniques for folding, storing in muslin bags, and preserving zari luster without chemical damage across decades.',
        'image'    => 'assets/images/collections/kuppadam-sico-saree.jpg',
        'link'     => '#read-article-5'
    ],
];
$articles_display = array_merge($articles, $articles, $articles);
?>

<section class="blog-section" id="blog-journal">
    <div class="blog-section__inner">

        <!-- SECTION HEADER -->
        <header class="blog-section__header">
            <div class="blog-section__header-left">
                <span class="blog-section__eyebrow">HERITAGE & CRAFT JOURNAL</span>
                <h2 class="blog-section__title">Stories from the Handloom</h2>
            </div>
            <div class="blog-section__header-right">
                <div class="blog-section__nav-btns">
                    <button type="button" class="blog-section__arrow blog-section__arrow--prev js-blog-prev" aria-label="Previous Articles">
                        <?php echo rk_icon('curve-left', 18); ?>
                    </button>
                    <button type="button" class="blog-section__arrow blog-section__arrow--next js-blog-next" aria-label="Next Articles">
                        <?php echo rk_icon('curve-right', 18); ?>
                    </button>
                </div>
            </div>
        </header>

        <!-- SWIPER CAROUSEL -->
        <div class="swiper blog-section__swiper js-blog-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($articles_display as $article): ?>
                    <div class="swiper-slide">
                        <article class="blog-card">
                            <a href="<?php echo htmlspecialchars($article['link']); ?>" class="blog-card__image-link">
                                <div class="blog-card__image-wrapper">
                                    <img src="<?php echo htmlspecialchars($article['image']); ?>"
                                         alt="<?php echo htmlspecialchars($article['title']); ?>"
                                         class="blog-card__img"
                                         loading="lazy">
                                </div>
                            </a>
                            <div class="blog-card__content">
                                <div class="blog-card__meta">
                                    <span class="blog-card__category"><?php echo htmlspecialchars($article['category']); ?></span>
                                    <span class="blog-card__dot">•</span>
                                    <span class="blog-card__read-time"><?php echo htmlspecialchars($article['read']); ?></span>
                                </div>
                                <h3 class="blog-card__title">
                                    <a href="<?php echo htmlspecialchars($article['link']); ?>">
                                        <?php echo htmlspecialchars($article['title']); ?>
                                    </a>
                                </h3>
                                <p class="blog-card__excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                                <a href="<?php echo htmlspecialchars($article['link']); ?>" class="blog-card__read-more">
                                    <span>Read Story</span>
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- CENTERED BOTTOM VIEW ALL CTA -->
        <div class="blog-section__footer">
            <a href="#all-articles" class="blog-section__view-all-btn">
                <span>View All Journal Entries</span>
                <?php echo rk_icon('curve-right', 16); ?>
            </a>
        </div>

    </div>
</section>
