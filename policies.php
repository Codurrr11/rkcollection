<?php
/**
 * RK COLLECTION — POLICIES
 * One page holding every legal / service policy, anchored per section so the
 * footer links land directly on the clause they name.
 */

$sections = [
    'shipping' => [
        'label' => 'Shipping & Returns',
        'lead'  => 'Every saree is inspected, folded in muslin and dispatched from our Hyderabad atelier.',
        'body'  => [
            'Domestic orders are dispatched within 24 working hours and delivered in 3–5 business days by express courier. International orders ship via DHL or FedEx Express and arrive within 5–7 business days, with duties payable by the recipient.',
            'Complimentary Fall &amp; Piku finishing is applied to every saree before dispatch unless you ask us to skip it. Sarees sent for custom blouse stitching add 7–10 working days to the dispatch window.',
            'Unstitched sarees may be exchanged within 7 days of delivery, provided the Silk Mark tag is intact and the saree has not been worn, washed or altered. Fall &amp; Piku finishing does not affect exchange eligibility; blouse stitching does, as the fabric has been cut.',
            'If a saree reaches you damaged in transit, send us photographs within 48 hours of delivery and we will arrange a replacement or a full refund at your preference, including return pickup at our cost.',
        ],
    ],
    'payments' => [
        'label' => 'Payment Methods',
        'lead'  => 'All prices are listed in Indian Rupees and are inclusive of GST.',
        'body'  => [
            'We accept UPI, all major credit and debit cards, net banking from every major Indian bank, and wallet payments. International customers may pay by card or bank transfer.',
            'Cash on Delivery is available on domestic orders up to ₹15,000, with a nominal handling fee collected at the door.',
            'For bridal trousseau commissions we accept a 40% advance against the loom booking, with the balance due before dispatch. Advance payments on commissioned weaves are non-refundable once the warp has been set.',
            'We never store card details. Payments are processed by our PCI-DSS compliant payment gateway, and refunds return to the original payment method within 5–7 working days of approval.',
        ],
    ],
    'terms' => [
        'label' => 'Terms &amp; Conditions',
        'lead'  => 'The terms under which we sell handloom sarees through this website.',
        'body'  => [
            'Every saree listed is a handloom or handcrafted piece. Slight irregularities in weave density, motif placement and colour are inherent to hand weaving and are not treated as defects. Where a listing carries a Silk Mark reference, that certification travels with the physical saree.',
            'Product photographs are shot in natural daylight without colour retouching. Screen calibration still varies, so the saree you receive may differ marginally in tone from the image on your device.',
            'Prices, offers and availability may change without notice. An order is confirmed only once payment is received and we have sent a dispatch confirmation.',
            'All imagery, written descriptions and journal articles on this site are the property of RK Collection and may not be reproduced without written permission.',
        ],
    ],
    'privacy' => [
        'label' => 'Privacy Policy',
        'lead'  => 'What we collect, why we collect it, and what we never do with it.',
        'body'  => [
            'We collect only what an order requires: your name, delivery address, phone number and email. Bridal commissions additionally involve measurements and event dates, held solely for the duration of the commission.',
            'Your details are shared with our courier partners and payment gateway strictly to fulfil your order. We do not sell, rent or trade customer data to anyone, for any purpose.',
            'Journal subscribers may unsubscribe from every email with a single click, and doing so removes the address from our mailing list entirely.',
            'You may request a copy of the data we hold about you, or ask us to delete it, by writing to care@rkcollection.com. We respond within 30 days.',
        ],
    ],
    'cookies' => [
        'label' => 'Cookies Policy',
        'lead'  => 'A short list, because we use very few.',
        'body'  => [
            'Essential cookies keep your shopping bag and wishlist intact as you move between pages. The site cannot function without them.',
            'Preference cookies remember small conveniences such as your last-used shop filters, so you do not have to reapply them on every visit.',
            'Analytics cookies tell us which sarees and journal articles are being read, in aggregate. They do not identify you personally.',
            'You can clear or block cookies from your browser settings at any time. Blocking essential cookies will prevent the bag and wishlist from working.',
        ],
    ],
];

$active = isset($_GET['s']) && isset($sections[$_GET['s']]) ? $_GET['s'] : 'shipping';

$page_title = 'Policies | RK Collection — Shipping, Returns & Privacy';
$page_css   = ['assets/css/pages.css'];

include 'includes/header.php';
?>

<main class="site-main policies-page" id="policiesPage">

    <section class="shop-hero">
        <p class="shop-hero__eyebrow">Good to know</p>
        <h1 class="shop-hero__title">Policies</h1>
        <div class="shop-hero__rule" aria-hidden="true"></div>
        <nav class="shop-hero__crumbs" aria-label="Breadcrumb">
            <a class="shop-hero__crumb-link" href="index">Home</a>
            <span class="shop-hero__crumb-sep" aria-hidden="true">/</span>
            <span class="shop-hero__crumb shop-hero__crumb--current" aria-current="page">Policies</span>
        </nav>
    </section>

    <section class="policies">
        <div class="policies__inner">

            <!-- Side index -->
            <aside class="policies__nav" aria-label="Policy sections">
                <p class="policies__nav-title">Contents</p>
                <ul class="policies__nav-list">
                    <?php foreach ($sections as $slug => $sec): ?>
                        <li>
                            <a class="policies__nav-link<?php echo $slug === $active ? ' is-active' : ''; ?>"
                               href="#<?php echo htmlspecialchars($slug); ?>">
                                <?php echo $sec['label']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="policies__help">
                    <p class="policies__help-text">Still unsure about something?</p>
                    <a class="policies__help-link" href="contact">Talk to us &rarr;</a>
                </div>
            </aside>

            <!-- Clauses -->
            <div class="policies__body">
                <?php $n = 1; foreach ($sections as $slug => $sec): ?>
                    <article class="policy" id="<?php echo htmlspecialchars($slug); ?>">
                        <header class="policy__head">
                            <span class="policy__index"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
                            <h2 class="policy__title"><?php echo $sec['label']; ?></h2>
                        </header>
                        <p class="policy__lead"><?php echo $sec['lead']; ?></p>
                        <?php foreach ($sec['body'] as $para): ?>
                            <p class="policy__para"><?php echo $para; ?></p>
                        <?php endforeach; ?>
                    </article>
                <?php $n++; endforeach; ?>

                <p class="policies__updated">Last updated 05 September 2026</p>
            </div>

        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
