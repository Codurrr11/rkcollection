<?php
/**
 * RK COLLECTION — LUXURY BLOG DETAILS PAGE
 * Single source for full editorial articles matching the reference layout.
 */

require_once __DIR__ . '/includes/blog-data.php';

/* Reached as /journal-<slug>, rewritten by .htaccess to ?slug=<slug>.
   The legacy ?id=<id> form still resolves and redirects to the slug URL. */
$article = null;

if (isset($_GET['slug']) && $_GET['slug'] !== '') {
    $article = rk_blog_article_by_slug($_GET['slug']);
}

if ($article === null && isset($_GET['id'])) {
    $found = rk_blog_article((int) $_GET['id']);
    if ($found !== null && !headers_sent()) {
        header('Location: ' . rk_article_url($found), true, 301);
        exit;
    }
    $article = $found;
}

/* An unknown slug still renders the latest piece, but answers 404 so a typo in
   the public slug namespace is not a crawlable 200. */
if ($article === null) {
    if (!headers_sent()) {
        header('HTTP/1.1 404 Not Found');
    }
    $article = rk_blog_article(0);
}
$related    = rk_blog_related($article['id'], 2);
$recent     = array_slice(rk_blog_articles(), 0, 4, true);

$author_bios = [
    'RADHIKA SHARMA' => 'Radhika Sharma is a senior saree archivist and heritage curator at RK Collection. She specializes in handloom Banarasi silk authentication, silver zari inspection, and royal bridal trousseau styling.',
    'MEERA IYER'     => 'Meera Iyer is a drape stylist working between our Chennai and Varanasi studios. She has dressed brides across four generations of the same families and teaches regional drape workshops each season.',
    'ANANYA RAO'     => 'Ananya Rao reports from the weaving clusters of Andhra Pradesh, Gujarat and Uttar Pradesh, documenting the artisans and techniques behind every weave we stock.',
];
$author_bio = isset($author_bios[$article['author']])
    ? $author_bios[$article['author']]
    : $author_bios['RADHIKA SHARMA'];

$share_url   = rawurlencode((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http')
    . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$share_title = rawurlencode($article['title']);
$share_image = rawurlencode((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http')
    . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/' . $article['image']);

$page_title = htmlspecialchars($article['title']) . ' | RK Collection Journal';
$page_css   = ['assets/css/pages.css'];

include 'includes/header.php';
?>

<main class="site-main blog-details-page" id="blogDetailsPage">

    <!-- ==========================================================
         01. HEADER TITLE & META BLOCK
         ========================================================== -->
    <header class="blog-header">
        <p class="blog-header__back">
            <a href="blog.php">&larr; Back to The Journal</a>
        </p>
        <h1 class="blog-header__title"><?php echo htmlspecialchars($article['title']); ?></h1>
        
        <div class="blog-header__meta">
            <span class="blog-header__meta-category"><?php echo htmlspecialchars($article['category']); ?></span>
            <span class="blog-header__meta-dot">•</span>
            <span>ON <?php echo htmlspecialchars($article['date']); ?></span>
            <span class="blog-header__meta-dot">•</span>
            <span>POSTED BY <?php echo htmlspecialchars($article['author']); ?></span>
            <span class="blog-header__meta-dot">•</span>
            <span>NO COMMENTS</span>
        </div>
    </header>

    <!-- ==========================================================
         02. 3-COLUMN EDITORIAL LAYOUT
         ========================================================== -->
    <section class="blog-layout">
        <div class="blog-grid">
            
            <!-- LEFT SIDEBAR: CURATOR WIDGET -->
            <aside class="blog-sidebar blog-sidebar-left">
                <div class="blog-widget blog-curator-card">
                    <h3 class="blog-widget__title">About Curator</h3>
                    <img src="assets/images/banners/contact-model.jpg" alt="Radhika Sharma" class="blog-curator-img">
                    <p class="blog-curator-bio">
                        SENIOR HANDLOOM ARCHIVIST & HERITAGE SAREE CONNOISSEUR AT RK COLLECTION VARANASI ATELIER.
                    </p>

                    <div class="blog-social-connect">
                        <span class="blog-social-connect__title">LET'S CONNECT</span>
                        <div class="blog-social-links">
                            <a href="https://www.facebook.com/rkcollection" class="blog-social-link" aria-label="Facebook" target="_blank" rel="noopener">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                            </a>
                            <a href="https://twitter.com/rkcollection" class="blog-social-link" aria-label="Twitter" target="_blank" rel="noopener">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                            </a>
                            <a href="https://www.instagram.com/rkcollection" class="blog-social-link" aria-label="Instagram" target="_blank" rel="noopener">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </a>
                            <a href="https://wa.me/919876543210" class="blog-social-link" aria-label="WhatsApp" target="_blank" rel="noopener">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- CENTER ARTICLE COLUMN -->
            <article class="blog-article-center">
                <div class="blog-article-card">
                    
                    <img src="<?php echo htmlspecialchars($article['image']); ?>" 
                         alt="<?php echo htmlspecialchars($article['title']); ?>" 
                         class="blog-featured-img">

                    <div class="blog-article-body">
                        <p><?php echo htmlspecialchars($article['content_p1']); ?></p>
                        <p><?php echo htmlspecialchars($article['content_p2']); ?></p>

                        <blockquote class="blog-pull-quote">
                            "<?php echo htmlspecialchars($article['quote']); ?>"
                        </blockquote>

                        <p><?php echo htmlspecialchars($article['content_p3']); ?></p>
                    </div>

                    <!-- Share Bar -->
                    <div class="blog-share-bar">
                        <span>SHARE THIS:</span>
                        <div class="blog-share-btns">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" class="blog-share-btn" target="_blank" rel="noopener">FACEBOOK</a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&amp;text=<?php echo $share_title; ?>" class="blog-share-btn" target="_blank" rel="noopener">TWITTER</a>
                            <a href="https://wa.me/?text=<?php echo $share_title; ?>%20<?php echo $share_url; ?>" class="blog-share-btn" target="_blank" rel="noopener">WHATSAPP</a>
                            <a href="https://pinterest.com/pin/create/button/?url=<?php echo $share_url; ?>&amp;media=<?php echo $share_image; ?>&amp;description=<?php echo $share_title; ?>" class="blog-share-btn" target="_blank" rel="noopener">PINTEREST</a>
                        </div>
                    </div>

                    <!-- Author Box -->
                    <div class="blog-author-box">
                        <img src="assets/images/banners/contact-model.jpg" alt="<?php echo htmlspecialchars($article['author']); ?>" class="blog-author-avatar">
                        <div>
                            <h4 class="blog-author-name"><?php echo htmlspecialchars(ucwords(strtolower($article['author']))); ?></h4>
                            <p class="blog-author-bio">
                                <?php echo htmlspecialchars($author_bio); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Related Posts Grid -->
                    <div class="blog-related-section">
                        <h3 class="blog-related-title">Related Posts</h3>
                        
                        <div class="blog-related-grid">
<?php foreach ($related as $rel): ?>
                            <a href="<?php echo htmlspecialchars(rk_article_url($rel)); ?>" class="blog-related-card">
                                <img src="<?php echo htmlspecialchars($rel['image']); ?>" alt="<?php echo htmlspecialchars($rel['title']); ?>" class="blog-related-img">
                                <div class="blog-related-overlay">
                                    <span class="blog-related-card-title"><?php echo htmlspecialchars($rel['title']); ?></span>
                                </div>
                            </a>
<?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Comments Area -->
                    <div class="blog-comments-section">
                        <h3 class="blog-comments-title">No comments yet</h3>
                        <p class="blog-no-comments">Be the first to share your thoughts on this article.</p>
                    </div>

                </div>
            </article>

            <!-- RIGHT SIDEBAR: RECENT POSTS & ARCHIVES -->
            <aside class="blog-sidebar blog-sidebar-right">
                
                <div class="blog-widget">
                    <h3 class="blog-widget__title">Recent Posts</h3>
                    
                    <div class="blog-recent-list">
<?php foreach ($recent as $rec): ?>
                        <div class="blog-recent-item">
                            <span class="blog-recent-category"><?php echo htmlspecialchars($rec['category']); ?></span>
                            <a href="<?php echo htmlspecialchars(rk_article_url($rec)); ?>" class="blog-recent-title"><?php echo htmlspecialchars($rec['title']); ?></a>
                        </div>
<?php endforeach; ?>
                    </div>
                </div>

                <div class="blog-widget">
                    <h3 class="blog-widget__title">Archive & Categories</h3>
                    
                    <ul class="blog-archive-list">
<?php foreach (rk_blog_categories() as $cat_slug => $cat): ?>
                        <li><a href="blog.php?cat=<?php echo htmlspecialchars($cat_slug); ?>" class="blog-archive-link"><span><?php echo htmlspecialchars(ucwords(strtolower($cat['label']))); ?></span> <span>(<?php echo (int) $cat['count']; ?>)</span></a></li>
<?php endforeach; ?>
                    </ul>
                </div>

            </aside>

        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
