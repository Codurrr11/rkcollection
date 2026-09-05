<?php
/**
 * RK COLLECTION — THE JOURNAL (BLOG LISTING)
 * Lead story runs large; the archive runs as a rhythmic grid beneath it.
 * All copy comes from includes/blog-data.php so blog-details.php stays in sync.
 */

require_once __DIR__ . '/includes/blog-data.php';

$articles   = rk_blog_articles();
$categories = rk_blog_categories();

$active_cat = isset($_GET['cat']) && isset($categories[$_GET['cat']]) ? $_GET['cat'] : 'all';

$lead = reset($articles);                 // newest article — the big one
$rest = array_slice($articles, 1);        // everything else, still newest-first

$page_title = 'The Journal | RK Collection — Handloom Notes, Care & Craft';
$page_css   = ['assets/css/pages.css'];
$page_js    = ['assets/js/blog.js'];

include 'includes/header.php';
?>

<main class="site-main journal-page" id="journalPage">

    <!-- ==========================================================
         01. MASTHEAD — royal ink ground, gold rules, issue line
         ========================================================== -->
    <section class="journal-masthead">
        <div class="journal-masthead__grain" aria-hidden="true"></div>
        <div class="journal-masthead__arch" aria-hidden="true"></div>

        <div class="journal-masthead__inner">

            <nav class="journal-crumbs" aria-label="Breadcrumb">
                <a class="journal-crumbs__link" href="index.php">Home</a>
                <span class="journal-crumbs__sep">/</span>
                <span class="journal-crumbs__current">Journal</span>
            </nav>

            <p class="journal-masthead__issue">
                <span>Vol. 04</span>
                <span class="journal-masthead__issue-dot">&bull;</span>
                <span>Issue 09</span>
                <span class="journal-masthead__issue-dot">&bull;</span>
                <span>September 2026</span>
            </p>

            <h1 class="journal-masthead__title">The&nbsp;Journal</h1>
            <p class="journal-masthead__script">notes from the loom</p>

            <p class="journal-masthead__desc">
                Field notes, authenticity guides and care rituals from our Varanasi
                atelier — written by the archivists and stylists who handle every
                weave before it reaches you.
            </p>

            <div class="journal-masthead__stats">
                <div class="journal-stat">
                    <span class="journal-stat__num"><?php echo count($articles); ?></span>
                    <span class="journal-stat__label">Stories</span>
                </div>
                <span class="journal-stat__rule" aria-hidden="true"></span>
                <div class="journal-stat">
                    <span class="journal-stat__num"><?php echo count($categories); ?></span>
                    <span class="journal-stat__label">Sections</span>
                </div>
                <span class="journal-stat__rule" aria-hidden="true"></span>
                <div class="journal-stat">
                    <span class="journal-stat__num">03</span>
                    <span class="journal-stat__label">Curators</span>
                </div>
            </div>
        </div>

        <!-- Gold ticker strip -->
        <div class="journal-ticker" aria-hidden="true">
            <div class="journal-ticker__track">
                <?php for ($t = 0; $t < 2; $t++): ?>
                    <?php foreach ($categories as $cat): ?>
                        <span class="journal-ticker__item"><?php echo htmlspecialchars($cat['label']); ?></span>
                        <span class="journal-ticker__diamond">&#9670;</span>
                    <?php endforeach; ?>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         02. LEAD STORY — the most recent article, run large
         ========================================================== -->
    <section class="journal-lead" aria-labelledby="journalLeadTitle">
        <div class="journal-lead__inner">

            <div class="journal-lead__head">
                <span class="journal-lead__ribbon">Latest Dispatch</span>
                <span class="journal-lead__rule" aria-hidden="true"></span>
                <span class="journal-lead__index">01</span>
            </div>

            <div class="journal-lead__body">

                <a class="journal-lead__media" href="<?php echo htmlspecialchars(rk_article_url($lead)); ?>"
                   aria-label="<?php echo htmlspecialchars($lead['title']); ?>">
                    <span class="journal-lead__frame" aria-hidden="true"></span>
                    <span class="journal-lead__arch">
                        <img class="journal-lead__img"
                             src="<?php echo htmlspecialchars($lead['image']); ?>"
                             alt="<?php echo htmlspecialchars($lead['title']); ?>">
                    </span>
                    <span class="journal-lead__badge"><?php echo htmlspecialchars($lead['category']); ?></span>
                </a>

                <div class="journal-lead__text">
                    <p class="journal-lead__script">read first</p>

                    <p class="journal-lead__meta">
                        <span><?php echo htmlspecialchars($lead['date']); ?></span>
                        <span class="journal-lead__meta-dot">&bull;</span>
                        <span><?php echo htmlspecialchars($lead['read_time']); ?></span>
                    </p>

                    <h2 class="journal-lead__title" id="journalLeadTitle">
                        <a href="<?php echo htmlspecialchars(rk_article_url($lead)); ?>">
                            <?php echo htmlspecialchars($lead['title']); ?>
                        </a>
                    </h2>

                    <p class="journal-lead__excerpt"><?php echo htmlspecialchars($lead['excerpt']); ?></p>

                    <blockquote class="journal-lead__quote">
                        &ldquo;<?php echo htmlspecialchars($lead['quote']); ?>&rdquo;
                    </blockquote>

                    <div class="journal-lead__tags">
                        <?php foreach ($lead['tags'] as $tag): ?>
                            <span class="journal-tag"><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>

                    <div class="journal-lead__foot">
                        <div class="journal-byline">
                            <span class="journal-byline__avatar" aria-hidden="true">
                                <?php echo htmlspecialchars(substr($lead['author'], 0, 1)); ?>
                            </span>
                            <span class="journal-byline__text">
                                <span class="journal-byline__name"><?php echo htmlspecialchars($lead['author']); ?></span>
                                <span class="journal-byline__role"><?php echo htmlspecialchars($lead['author_role']); ?></span>
                            </span>
                        </div>

                        <a class="journal-readmore" href="<?php echo htmlspecialchars(rk_article_url($lead)); ?>">
                            <span>Read the story</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ==========================================================
         03. FILTER RAIL — categories + search + live count
         ========================================================== -->
    <section class="journal-filters" id="journalFilters">
        <div class="journal-filters__inner">

            <div class="journal-filters__chips" role="tablist" aria-label="Filter journal by section">
                <button type="button" class="journal-chip<?php echo $active_cat === 'all' ? ' is-active' : ''; ?>" data-cat="all" role="tab" aria-selected="<?php echo $active_cat === 'all' ? 'true' : 'false'; ?>">
                    <span class="journal-chip__label">All Stories</span>
                    <span class="journal-chip__count"><?php echo count($rest); ?></span>
                </button>
                <?php foreach ($categories as $slug => $cat): ?>
                    <button type="button" class="journal-chip<?php echo $active_cat === $slug ? ' is-active' : ''; ?>" data-cat="<?php echo htmlspecialchars($slug); ?>"
                            role="tab" aria-selected="<?php echo $active_cat === $slug ? 'true' : 'false'; ?>">
                        <span class="journal-chip__label"><?php echo htmlspecialchars($cat['label']); ?></span>
                        <span class="journal-chip__count"><?php echo (int) $cat['count']; ?></span>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="journal-filters__search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.9" stroke-linecap="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="search" id="journalSearch" class="journal-filters__input"
                       placeholder="Search the archive" aria-label="Search journal articles">
            </div>

        </div>
    </section>

    <!-- ==========================================================
         04. ARCHIVE GRID — every fourth card runs wide for rhythm
         ========================================================== -->
    <section class="journal-archive" aria-label="Journal archive">
        <div class="journal-archive__inner">

            <div class="journal-grid" id="journalGrid">
                <?php $i = 1; foreach ($rest as $article): ?>
                    <?php $wide = ($i % 4 === 0); ?>
                    <article class="journal-card<?php echo $wide ? ' journal-card--wide' : ''; ?>"
                             data-cat="<?php echo htmlspecialchars($article['cat_slug']); ?>"
                             data-search="<?php echo htmlspecialchars(strtolower($article['title'] . ' ' . $article['excerpt'] . ' ' . $article['category'] . ' ' . implode(' ', $article['tags']))); ?>">

                        <a class="journal-card__media" href="<?php echo htmlspecialchars(rk_article_url($article)); ?>"
                           tabindex="-1" aria-hidden="true">
                            <img class="journal-card__img"
                                 src="<?php echo htmlspecialchars($article['image']); ?>"
                                 alt="" loading="lazy">
                            <span class="journal-card__cat"><?php echo htmlspecialchars($article['category']); ?></span>
                        </a>

                        <div class="journal-card__body">
                            <span class="journal-card__index"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>

                            <p class="journal-card__meta">
                                <span><?php echo htmlspecialchars($article['date']); ?></span>
                                <span class="journal-card__meta-dot">&bull;</span>
                                <span><?php echo htmlspecialchars($article['read_time']); ?></span>
                            </p>

                            <h3 class="journal-card__title">
                                <a href="<?php echo htmlspecialchars(rk_article_url($article)); ?>">
                                    <?php echo htmlspecialchars($article['title']); ?>
                                </a>
                            </h3>

                            <p class="journal-card__excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>

                            <div class="journal-card__tags">
                                <?php foreach (array_slice($article['tags'], 0, 3) as $tag): ?>
                                    <span class="journal-tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>

                            <div class="journal-card__foot">
                                <span class="journal-card__author"><?php echo htmlspecialchars($article['author']); ?></span>
                                <span class="journal-card__arrow" aria-hidden="true">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="7" y1="17" x2="17" y2="7"></line>
                                        <polyline points="9 7 17 7 17 15"></polyline>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </article>
                <?php $i++; endforeach; ?>
            </div>

            <!-- No-results state, revealed by blog.js -->
            <div class="journal-empty" id="journalEmpty" hidden>
                <span class="journal-empty__glyph" aria-hidden="true">&#9670;</span>
                <p class="journal-empty__title">Nothing in the archive matches that.</p>
                <p class="journal-empty__desc">Try another section, or clear the search to see all stories.</p>
                <button type="button" class="journal-empty__reset" id="journalReset">Reset filters</button>
            </div>

            <div class="journal-archive__more">
                <button type="button" class="journal-more-btn" id="journalMore">
                    <span>Load older stories</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <polyline points="19 12 12 19 5 12"></polyline>
                    </svg>
                </button>
            </div>

        </div>
    </section>

    <!-- ==========================================================
         05. SUBSCRIBE BAND — royal ink, gold rule, script accent
         ========================================================== -->
    <section class="journal-subscribe">
        <div class="journal-subscribe__grain" aria-hidden="true"></div>
        <div class="journal-subscribe__inner">
            <p class="journal-subscribe__script">stay close to the loom</p>
            <h2 class="journal-subscribe__title">The Journal, delivered once a month</h2>
            <p class="journal-subscribe__desc">
                One letter each month — a new weave from the archive, a care ritual worth
                keeping, and first access to limited handloom drops. No noise.
            </p>

            <form class="journal-subscribe__form" id="journalSubscribe" novalidate>
                <label class="visually-hidden" for="journalEmail">Email address</label>
                <input type="email" id="journalEmail" class="journal-subscribe__input"
                       placeholder="your@email.com" required>
                <button type="submit" class="journal-subscribe__btn">Subscribe</button>
            </form>
            <p class="journal-subscribe__note" id="journalSubscribeNote" role="status"></p>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
