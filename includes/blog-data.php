<?php
/**
 * RK COLLECTION — JOURNAL DATA
 * Single source of truth for blog.php and blog-details.php.
 * Sorted newest-first at read time, so the lead story on the listing page and
 * the "Recent" rail on the detail page never drift apart.
 */

$rk_blog_articles = [

    4 => [
        'id'          => 4,
        'title'       => 'How to Read a Saree Before You Ever Buy It',
        'category'    => 'AUTHENTICITY GUIDE',
        'cat_slug'    => 'authenticity',
        'date'        => 'SEPTEMBER 04, 2026',
        'date_iso'    => '2026-09-04',
        'author'      => 'RADHIKA SHARMA',
        'author_role' => 'Senior Handloom Archivist',
        'image'       => 'assets/images/collections/kalanjali-silk-saree.jpg',
        'read_time'   => '9 MIN READ',
        'tags'        => ['Silk Mark', 'Zari', 'Buying Guide'],
        'excerpt'     => 'A saree tells you everything about itself before the price tag does — in the weight of the pallu, the sound of the fold, the back of the motif. Here is the five-minute inspection our archivists run on every weave that enters the atelier.',
        'quote'       => 'Turn the saree over. The reverse side is the only page in the book that cannot be edited by a showroom light.',
        'content_p1'  => 'Every saree that reaches the RK Collection atelier passes through a five-minute inspection before it is ever photographed. It is not a technical audit — it is a reading. Weight, drape, the sound the fabric makes when folded, the discipline of the reverse side: these tell you more about a weave in five minutes than a certificate can.',
        'content_p2'  => 'Begin with the back. On a genuine Kadwa or Korvai weave, each motif is finished independently, so the reverse is nearly as tidy as the front. On a cut-work imitation, you will find floating threads shorn flat between motifs. Next, test the zari: draw a single thread and unwind it. Real zari reveals a red or orange silk core wound with flattened silver wire. Synthetic alloy unwinds into plastic film with no core at all.',
        'content_p3'  => 'Finally, weigh the saree across your forearm rather than in your palm. Pure mulberry silk carries a dense, liquid fall that gathers at the elbow instead of springing back. And always ask for the Silk Mark hologram — but treat it as the last confirmation of what your hands already told you, never as the first.',
    ],

    1 => [
        'id'          => 1,
        'title'       => 'The Sacred Art of Kadwa Weaving in Pure Gold Zari',
        'category'    => 'HERITAGE WEAVING',
        'cat_slug'    => 'heritage',
        'date'        => 'SEPTEMBER 02, 2026',
        'date_iso'    => '2026-09-02',
        'author'      => 'RADHIKA SHARMA',
        'author_role' => 'Senior Handloom Archivist',
        'image'       => 'assets/images/banners/about-hero.jpg',
        'read_time'   => '7 MIN READ',
        'tags'        => ['Banarasi', 'Kadwa', 'Heritage'],
        'excerpt'     => 'Two master weavers, one wooden pit loom, and up to eight weeks for a single saree. Inside the Varanasi technique where every motif is woven independently and nothing floats loose on the reverse.',
        'quote'       => 'Handloom silk weaving is not merely a textile craft; it is the sacred breath of generations of Varanasi artisans preserved in pure gold zari.',
        'content_p1'  => 'Kadwa weaving is one of the most meticulous and celebrated handloom techniques originating from the ancient city of Banaras. Unlike standard Jacquard weaves where extra brocade threads float loosely on the reverse side of the saree, the Kadwa technique involves hand-embroidery directly into the fabric using a shuttle for every individual motif.',
        'content_p2'  => 'Each gold and silver zari motif is woven independently, ensuring zero floating threads on the back. This painstaking craftsmanship requires two master weavers working in perfect unison on a traditional wooden pit loom for up to four to eight weeks for a single saree.',
        'content_p3'  => 'When inspecting an authentic Kadwa Banarasi silk saree, notice the crisp definition of the zari Kalka (paisley) and Jaal patterns. The texture is soft, opulent, and exceptionally comfortable against the skin without snagging.',
    ],

    2 => [
        'id'          => 2,
        'title'       => 'Kanjivaram Secrets: Identifying Pure Silk & Real Silver Zari',
        'category'    => 'AUTHENTICITY GUIDE',
        'cat_slug'    => 'authenticity',
        'date'        => 'AUGUST 28, 2026',
        'date_iso'    => '2026-08-28',
        'author'      => 'RADHIKA SHARMA',
        'author_role' => 'Senior Handloom Archivist',
        'image'       => 'assets/images/banners/about-craft.jpg',
        'read_time'   => '6 MIN READ',
        'tags'        => ['Kanjivaram', 'Silver Zari', 'Silk Mark'],
        'excerpt'     => 'The weight of a Kanjivaram lies not in its silk alone but in genuine silver wire wound with mulberry thread. Three tests that separate the real Kanchipuram loom from a convincing copy.',
        'quote'       => 'The weight of a pure Kanjivaram lies not just in its silk, but in the genuine silver wire wound meticulously with mulberry silk.',
        'content_p1'  => 'Kanjivaram silk sarees from Kanchipuram are famed for their thick mulberry silk and Korvai interweaving technique. But how do you verify if the zari is authentic silver or synthetic alloy?',
        'content_p2'  => 'Authentic Kanjivaram zari is created by twisting a pure red silk thread with silver wire, which is then dipped in 24k gold. A simple burn test on a loose thread or scratch test will reveal the underlying red silk core and genuine silver brilliance.',
        'content_p3'  => 'Always demand the government-backed Silk Mark Certification tag on your purchase to guarantee 100% pure natural silk threads.',
    ],

    3 => [
        'id'          => 3,
        'title'       => 'The Renaissance of Metallic Tissue Silks in Festive Fashion',
        'category'    => 'FASHION TRENDS',
        'cat_slug'    => 'trends',
        'date'        => 'AUGUST 20, 2026',
        'date_iso'    => '2026-08-20',
        'author'      => 'RADHIKA SHARMA',
        'author_role' => 'Senior Handloom Archivist',
        'image'       => 'assets/images/banners/about-artisan.jpg',
        'read_time'   => '5 MIN READ',
        'tags'        => ['Tissue Silk', 'Festive', 'Bridal'],
        'excerpt'     => 'Woven with a metallic zari warp and a fine silk weft, tissue catches candlelight the way no other fabric can. Why it has returned to every serious festive trousseau.',
        'quote'       => 'Tissue silk offers a translucent metallic sheen that captures ambient candlelight like no other fabric in the world.',
        'content_p1'  => 'Tissue silk sarees have undergone a modern renaissance across luxury Indian bridal trousseaus. Woven with metallic zari warp and fine silk weft, tissue creates a luminous 3D sheen.',
        'content_p2'  => 'Ideal for evening galas, sangeet celebrations, and reception dinners, tissue sarees combine weightless drape with grand royal grandeur.',
        'content_p3'  => 'Pair tissue silks with contrasting velvet blouses or diamond heritage jewelry to elevate your festive look.',
    ],

    5 => [
        'id'          => 5,
        'title'       => 'Nine Yards, Nine Drapes: A Field Guide to the Pallu',
        'category'    => 'DRAPE & STYLING',
        'cat_slug'    => 'styling',
        'date'        => 'AUGUST 14, 2026',
        'date_iso'    => '2026-08-14',
        'author'      => 'MEERA IYER',
        'author_role' => 'Drape Stylist',
        'image'       => 'assets/images/collections/party-collection.jpg',
        'read_time'   => '8 MIN READ',
        'tags'        => ['Drape', 'Pallu', 'Styling'],
        'excerpt'     => 'The Nivi drape is only one answer. From the Kachha of Maharashtra to the Seedha pallu of the north, each regional fold was engineered for a different body, climate and occasion.',
        'quote'       => 'A drape is not decoration. Every regional fold began as an answer to a question about work, weather or worship.',
        'content_p1'  => 'The Nivi drape most of us learned first is a relatively recent standardisation, popularised in the late nineteenth century because it photographed well and travelled easily. It is elegant, forgiving, and by no means the only correct way to wear nine yards of silk.',
        'content_p2'  => 'The Maharashtrian Kachha passes the fabric between the legs and tucks it at the back, freeing the wearer to ride, farm or dance. The Bengali Atpoure uses broad box pleats and a pallu carried over both shoulders, traditionally with a keyring knotted into the end. The Seedha pallu of Gujarat and Uttar Pradesh brings the decorated end forward across the chest, precisely because the border was the most expensive part of the weave and deserved to be seen.',
        'content_p3'  => 'Choose the drape for the saree, not the other way round. A stiff Kanjivaram holds architectural pleats and wants a Nivi or Seedha. A featherweight tissue or chiffon collapses under structure and comes alive in a loose Atpoure fold.',
    ],

    6 => [
        'id'          => 6,
        'title'       => 'Storing Pure Silk Through an Indian Monsoon',
        'category'    => 'SILK CARE',
        'cat_slug'    => 'care',
        'date'        => 'AUGUST 06, 2026',
        'date_iso'    => '2026-08-06',
        'author'      => 'RADHIKA SHARMA',
        'author_role' => 'Senior Handloom Archivist',
        'image'       => 'assets/images/collections/soft-silk-saree.jpg',
        'read_time'   => '6 MIN READ',
        'tags'        => ['Silk Care', 'Storage', 'Zari'],
        'excerpt'     => 'Humidity is the quiet enemy of zari. A practical archival routine — muslin over plastic, refolding on a calendar, and why your wardrobe should never share a wall with the bathroom.',
        'quote'       => 'Silk does not die of age. It dies of being folded in the same place for eleven years.',
        'content_p1'  => 'Plastic is the single most common mistake in Indian saree storage. A polythene cover traps ambient humidity against the fabric, and trapped humidity tarnishes silver zari to a dull grey within a season. Wrap every silk saree in unbleached cotton muslin instead, which breathes while still keeping dust and light out.',
        'content_p2'  => 'Refold on a schedule. A saree left in the same fold for years develops permanent crease lines exactly where the zari sits, and zari that has cracked along a fold cannot be restored. Open, refold along a different line, and rest each saree flat twice a year — monsoon end and winter end is an easy rhythm to remember.',
        'content_p3'  => 'Keep the wardrobe off any wall shared with a bathroom or exterior monsoon face, tuck a few whole cloves or neem leaves into the shelf rather than naphthalene, and never hang a heavy Kanjivaram on a rod. The weight of its own pallu will stretch the drape out of true within a year.',
    ],

    7 => [
        'id'          => 7,
        'title'       => 'The Bridal Trousseau, Planned Backwards From the Wedding Day',
        'category'    => 'BRIDAL EDIT',
        'cat_slug'    => 'bridal',
        'date'        => 'JULY 29, 2026',
        'date_iso'    => '2026-07-29',
        'author'      => 'MEERA IYER',
        'author_role' => 'Drape Stylist',
        'image'       => 'assets/images/collections/kuppadam-sico-saree.jpg',
        'read_time'   => '10 MIN READ',
        'tags'        => ['Bridal', 'Trousseau', 'Planning'],
        'excerpt'     => 'A handloom bridal saree takes eight to sixteen weeks on the loom. Working backwards from the muhurat is the only planning method that survives contact with a real wedding calendar.',
        'quote'       => 'Book the loom before the venue. The hall can be moved; eight weeks of hand-weaving cannot.',
        'content_p1'  => 'Most trousseau planning fails for one reason: it begins with shopping rather than with lead time. A commissioned Kadwa Banarasi or a Korvai Kanjivaram takes eight to sixteen weeks on the loom, and no amount of goodwill compresses that. Fix the muhurat, then count backwards.',
        'content_p2'  => 'Sixteen weeks out, commission the primary wedding saree and lock the colour against the jewellery you already own, not against a swatch on a screen. Ten weeks out, order blouses — allow two fittings, because a bridal blouse is a structured garment and the first fitting is never the last. Six weeks out, assemble the secondary events: sangeet, mehendi, reception, and the lighter day-after saree that everyone forgets.',
        'content_p3'  => 'Reserve the final three weeks entirely for alterations and fall-and-pico finishing. Nothing new should enter the trousseau in that window. The brides who enjoy their own weddings are, without exception, the ones who finished shopping a month early.',
    ],

    8 => [
        'id'          => 8,
        'title'       => 'Bandhani: Ten Thousand Knots Tied by Hand',
        'category'    => 'HERITAGE WEAVING',
        'cat_slug'    => 'heritage',
        'date'        => 'JULY 18, 2026',
        'date_iso'    => '2026-07-18',
        'author'      => 'RADHIKA SHARMA',
        'author_role' => 'Senior Handloom Archivist',
        'image'       => 'assets/images/collections/bandhani-collection.jpg',
        'read_time'   => '7 MIN READ',
        'tags'        => ['Bandhani', 'Kutch', 'Resist Dye'],
        'excerpt'     => 'Before a single drop of dye touches the cloth, an artisan in Kutch has tied every dot by fingernail. The grammar of Bandhani, and how to spot a printed imitation in seconds.',
        'quote'       => 'Open a true Bandhani and it will never lie completely flat. Those small puckers are the fingerprints of the knots.',
        'content_p1'  => 'Bandhani is a resist-dye tradition of Gujarat and Rajasthan in which thousands of minute points of fabric are pinched and tied with thread before dyeing, so that the tied points resist the colour. A single fine saree can carry between ten and one hundred thousand individual knots, tied by artisans who grow one fingernail long specifically for the purpose.',
        'content_p2'  => 'The pattern vocabulary is precise rather than decorative. Ekdali is a single dot, Trikunti a cluster of three, Chaubandi a cluster of four, and Shikari depicts figures. A Gharchola, the traditional Gujarati wedding saree, sets Bandhani clusters inside a zari-checked grid, and each square carries a fixed number of dots.',
        'content_p3'  => 'To distinguish a true Bandhani from a screen print, look at the reverse and stretch the cloth gently. Real tie-dye leaves a slightly puckered, three-dimensional texture where the knots were, and the dots are minutely irregular. A print is flat, perfectly uniform, and identical on both faces.',
    ],

    9 => [
        'id'          => 9,
        'title'       => 'Why Two Handloom Sarees Are Never Truly Identical',
        'category'    => 'ARTISAN STORIES',
        'cat_slug'    => 'artisans',
        'date'        => 'JULY 05, 2026',
        'date_iso'    => '2026-07-05',
        'author'      => 'ANANYA RAO',
        'author_role' => 'Field Correspondent',
        'image'       => 'assets/images/banners/about-image.png',
        'read_time'   => '6 MIN READ',
        'tags'        => ['Artisans', 'Handloom', 'Provenance'],
        'excerpt'     => 'Two sarees from the same loom, the same weaver and the same dye lot will still differ. That variance is not a defect in handloom — it is the only proof of authorship the craft has.',
        'quote'       => 'A powerloom repeats. A handloom remembers. You can see the difference at the selvedge.',
        'content_p1'  => 'Ask a weaver in Varanasi why two sarees from the same warp do not match perfectly and you will get a shrug and a practical answer: the humidity changed, the yarn from the second reel sat a little tighter, and the afternoon light was different by the time the second pallu was reached.',
        'content_p2'  => 'That variance is measurable. Handloom beat-up pressure is applied by a human arm rather than a calibrated motor, so weft density shifts by a few picks per inch across the length of a saree. The effect is a fabric that catches light unevenly and moves with a softness a powerloom copy cannot reproduce at any price.',
        'content_p3'  => 'This is why we photograph each piece individually rather than reusing a catalogue image across a batch, and why the saree that arrives at your door will differ very slightly from the one on screen. Treat that difference as a signature, because that is precisely what it is.',
    ],

    10 => [
        'id'          => 10,
        'title'       => 'Blouse Necklines That Respect the Pallu',
        'category'    => 'DRAPE & STYLING',
        'cat_slug'    => 'styling',
        'date'        => 'JUNE 24, 2026',
        'date_iso'    => '2026-06-24',
        'author'      => 'MEERA IYER',
        'author_role' => 'Drape Stylist',
        'image'       => 'assets/images/products/banarasi-kora-saree.jpg',
        'read_time'   => '5 MIN READ',
        'tags'        => ['Blouse', 'Tailoring', 'Styling'],
        'excerpt'     => 'The blouse is not an accessory to the saree; it is the frame the pallu hangs from. A tailoring guide organised by what the border is already doing.',
        'quote'       => 'Choose the neckline after you have decided which shoulder carries the pallu. Not before.',
        'content_p1'  => 'The most common tailoring error is choosing a neckline in isolation, from a catalogue, before the saree has been draped even once. The blouse frames the pallu, and the pallu decides how much of that frame will ever be visible.',
        'content_p2'  => 'A heavy zari border already draws a strong horizontal line across the chest, so pair it with a restrained boat or high round neck and let the border do the talking. A plain or tone-on-tone pallu leaves the neckline as the only architecture in the upper half, which is where a deep V, a sweetheart, or a structured square earns its place.',
        'content_p3'  => 'Two practical notes from the fitting room: sleeve length should be settled while standing with the arm raised, not lowered, and the back opening should be cut for the jewellery you will actually wear. A wide back with a long haar competes badly, and no amount of good silk rescues it.',
    ],

    11 => [
        'id'          => 11,
        'title'       => 'Mangalagiri Cotton for the Everyday Wardrobe',
        'category'    => 'FASHION TRENDS',
        'cat_slug'    => 'trends',
        'date'        => 'JUNE 12, 2026',
        'date_iso'    => '2026-06-12',
        'author'      => 'ANANYA RAO',
        'author_role' => 'Field Correspondent',
        'image'       => 'assets/images/collections/kalanjali-silk-saree.jpg',
        'read_time'   => '5 MIN READ',
        'tags'        => ['Cotton', 'Everyday', 'Mangalagiri'],
        'excerpt'     => 'Not every handloom belongs to a wedding. The Nizam border cotton of Andhra Pradesh is built for heat, repetition and Tuesday mornings — and it improves with every wash.',
        'quote'       => 'The finest compliment a cotton saree can receive is that it looks better in its fourth year than its first.',
        'content_p1'  => 'Mangalagiri cotton is woven in a small temple town in Andhra Pradesh on pit looms, with a characteristic Nizam border and no printing or embroidery anywhere on the body. The entire design vocabulary lives in the weave and the border, which is exactly why it survives daily wear.',
        'content_p2'  => 'The fabric is tightly woven but breathable, which is the combination that matters in Indian summers. It takes a crisp pleat straight off the line, needs no starch after the first few washes, and softens progressively rather than thinning.',
        'content_p3'  => 'Wash it separately in cold water for the first three cycles, dry it in shade rather than direct sun to protect the border dye, and iron it very slightly damp. Handled this way, a Mangalagiri outlasts most of the synthetics bought alongside it by a decade.',
    ],

];

/* Shared with the catalogue — whichever file loads first defines it. */
if (!function_exists('rk_slugify')) {
    function rk_slugify($text)
    {
        $text = preg_replace('/[^A-Za-z0-9]+/', '-', (string) $text);
        return strtolower(trim($text, '-'));
    }
}

/**
 * URL slug for an article, taken from its headline.
 */
function rk_article_slug(array $article)
{
    return rk_slugify($article['title']);
}

/**
 * The public URL for an article, e.g. /journal-the-sacred-art-of-kadwa-weaving.
 *
 * The "journal-" prefix keeps articles in their own namespace without adding a
 * path segment: a nested /journal/<slug> would change the directory the browser
 * resolves this site's relative asset paths against and break them. The prefix
 * also guarantees an article can never be shadowed by a product slug.
 *
 * Accepts an article row or a bare id.
 */
function rk_article_url($article)
{
    if (!is_array($article)) {
        $article = rk_blog_article($article);
    }
    return $article ? 'journal-' . rk_article_slug($article) : 'blog.php';
}

function rk_blog_article_by_slug($slug)
{
    $slug = rk_slugify(preg_replace('/^journal-/', '', (string) $slug));
    foreach (rk_blog_articles() as $article) {
        if (rk_article_slug($article) === $slug) {
            return $article;
        }
    }
    return null;
}

/**
 * All articles, newest first.
 */
function rk_blog_articles()
{
    global $rk_blog_articles;
    $list = $rk_blog_articles;
    uasort($list, function ($a, $b) {
        return strcmp($b['date_iso'], $a['date_iso']);
    });
    return $list;
}

/**
 * One article by id, falling back to the most recent when the id is unknown.
 */
function rk_blog_article($id)
{
    global $rk_blog_articles;
    if (isset($rk_blog_articles[$id])) {
        return $rk_blog_articles[$id];
    }
    $list = rk_blog_articles();
    return reset($list);
}

/**
 * Category filter list with live counts: [slug => ['label' => ..., 'count' => n]].
 */
function rk_blog_categories()
{
    $cats = [];
    foreach (rk_blog_articles() as $a) {
        if (!isset($cats[$a['cat_slug']])) {
            $cats[$a['cat_slug']] = ['label' => $a['category'], 'count' => 0];
        }
        $cats[$a['cat_slug']]['count']++;
    }
    return $cats;
}

/**
 * Up to $limit other articles, preferring the same category.
 */
function rk_blog_related($id, $limit = 3)
{
    $current = rk_blog_article($id);
    $same = [];
    $rest = [];
    foreach (rk_blog_articles() as $a) {
        if ($a['id'] === $current['id']) {
            continue;
        }
        if ($a['cat_slug'] === $current['cat_slug']) {
            $same[] = $a;
        } else {
            $rest[] = $a;
        }
    }
    return array_slice(array_merge($same, $rest), 0, $limit);
}
