<?php
/**
 * Reusable Testimonials Partial Component
 */
$testimonials = [
    [
        'name'     => 'Priya Sharma',
        'location' => 'Mumbai',
        'avatar'   => 'assets/images/banners/about-image.png',
        'rating'   => 5,
        'quote'    => 'The Banarasi Kora silk saree I ordered for my sister’s wedding exceeded all expectations. The zari weave is so rich and surprisingly lightweight!',
        'date'     => '18 Feb 2026'
    ],
    [
        'name'     => 'Ananya Reddi',
        'location' => 'Hyderabad',
        'avatar'   => 'assets/images/products/banarasi-kora-saree.jpg',
        'rating'   => 5,
        'quote'    => 'RK Collection’s Soft Silk sarees are pure luxury. The drape is effortless and the colors are even more radiant and vibrant in person.',
        'date'     => '24 Feb 2026'
    ],
    [
        'name'     => 'Meera Iyer',
        'location' => 'Chennai',
        'avatar'   => 'assets/images/collections/soft-silk-saree.jpg',
        'rating'   => 5,
        'quote'    => 'Received my Kanjivaram pure silk saree within 3 days. Authentic handloom quality with pure silk mark certification. Truly royal!',
        'date'     => '02 Mar 2026'
    ],
    [
        'name'     => 'Kavita Patel',
        'location' => 'Ahmedabad',
        'avatar'   => 'assets/images/collections/kuppadam-sico-saree.jpg',
        'rating'   => 5,
        'quote'    => 'The Kuppadam Sico saree has such a royal peacock zari border! Got endless compliments at our family festival celebration.',
        'date'     => '10 Mar 2026'
    ],
    [
        'name'     => 'Sunita Bannerjee',
        'location' => 'Kolkata',
        'avatar'   => 'assets/images/collections/kalanjali-silk-saree.jpg',
        'rating'   => 5,
        'quote'    => 'I was hesitant to buy luxury sarees online, but RK Collection’s customer care and prompt delivery won me over. Superb weaving quality!',
        'date'     => '15 Mar 2026'
    ],
    [
        'name'     => 'Deepika Joshi',
        'location' => 'New Delhi',
        'avatar'   => 'assets/images/products/tissue-silk-saree.jpg',
        'rating'   => 5,
        'quote'    => 'The Tissue Silk saree is an absolute showstopper! Luminous shimmering metallic sheen with delicate border work. Will order again.',
        'date'     => '22 Mar 2026'
    ],
    [
        'name'     => 'Rajeshwari Rao',
        'location' => 'Bengaluru',
        'avatar'   => 'assets/images/products/banarasi-kora-saree.jpg',
        'rating'   => 5,
        'quote'    => 'Beautiful Mangalagiri cotton sarees for daily wear. Soft, breathable fabric and rich traditional colors that stay vibrant.',
        'date'     => '29 Mar 2026'
    ],
    [
        'name'     => 'Shalini Verma',
        'location' => 'Jaipur',
        'avatar'   => 'assets/images/collections/soft-silk-saree.jpg',
        'rating'   => 5,
        'quote'    => 'Exquisite craftsmanship and premium luxury packaging. The Paithani saree pallu motifs are a true heritage work of art.',
        'date'     => '05 Apr 2026'
    ],
];
$testimonials_display = array_merge($testimonials, $testimonials, $testimonials);
?>

<section class="testimonials" id="testimonials">
    <div class="testimonials__inner">

        <!-- SECTION HEADER -->
        <header class="testimonials__header">
            <h2 class="testimonials__title">Words of Appreciation</h2>
            <p class="testimonials__subtitle">Cherished experiences from women who celebrate their special moments in RK Collection sarees</p>
        </header>

        <!-- SLIDER CONTAINER -->
        <div class="testimonials__slider-wrap">
            <div class="swiper testimonials__swiper js-testimonials-swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($testimonials_display as $item): ?>
                        <div class="swiper-slide">
                            <div class="testimonials__card">
                                <!-- Watermark Quote Glyph -->
                                <span class="testimonials__quote-glyph" aria-hidden="true">“</span>

                                <!-- Top User Info Row -->
                                <div class="testimonials__user-row">
                                    <img src="<?php echo htmlspecialchars($item['avatar']); ?>"
                                         alt="<?php echo htmlspecialchars($item['name']); ?>"
                                         class="testimonials__avatar"
                                         loading="lazy"
                                         decoding="async">
                                    <div class="testimonials__user-meta">
                                        <h3 class="testimonials__name"><?php echo htmlspecialchars($item['name']); ?></h3>
                                        <span class="testimonials__location"><?php echo htmlspecialchars($item['location']); ?></span>
                                        
                                        <!-- Star Rating -->
                                        <div class="testimonials__stars" aria-label="5 out of 5 stars">
                                            <?php for ($s = 0; $s < 5; $s++): ?>
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="#f59e0b" stroke="none" aria-hidden="true">
                                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                </svg>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quote Text -->
                                <p class="testimonials__quote">
                                    “<?php echo htmlspecialchars($item['quote']); ?>”
                                </p>

                                <!-- Bottom Date Row -->
                                <div class="testimonials__card-footer">
                                    <span class="testimonials__date"><?php echo htmlspecialchars($item['date']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>
</section>
