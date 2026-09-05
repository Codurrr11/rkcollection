<?php
/**
 * RK Collection — Trust Pillars Strip
 * Minimal, sober, premium USP section for homepage bottom.
 */
$trust_pillars = [
    [
        'icon' => '<svg width="36" height="36" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 36h32"/><path d="M12 36V20l12-8 12 8v16"/><rect x="18" y="26" width="12" height="10" rx="1"/><path d="M24 26v10"/><path d="M18 31h12"/></svg>',
        'title' => 'Fast Delivery',
        'desc'  => 'Delivery within 3-5 days'
    ],
    [
        'icon' => '<svg width="36" height="36" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="14" width="36" height="24" rx="3"/><path d="M6 22h36"/><path d="M12 30h8"/><path d="M12 34h4"/><circle cx="36" cy="32" r="3"/></svg>',
        'title' => 'Quick Payment',
        'desc'  => '100% secure payment'
    ],
    [
        'icon' => '<svg width="36" height="36" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4v6"/><path d="M24 38v6"/><path d="M4 24h6"/><path d="M38 24h6"/><circle cx="24" cy="24" r="14"/><path d="M24 16v8l6 4"/></svg>',
        'title' => 'Customer Support',
        'desc'  => 'Support with a quick response'
    ],
    [
        'icon' => '<svg width="36" height="36" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4 6 14v4h36v-4Z"/><path d="M10 18v18"/><path d="M18 18v18"/><path d="M30 18v18"/><path d="M38 18v18"/><path d="M4 36h40"/><path d="M6 40h36"/><circle cx="24" cy="10" r="2" fill="currentColor" stroke="none"/></svg>',
        'title' => 'Material Quality',
        'desc'  => 'Best quality is our motto'
    ],
];
?>

<section class="trust-pillars" id="trust-pillars">
    <div class="trust-pillars__inner">
        <?php foreach ($trust_pillars as $i => $pillar): ?>
            <div class="trust-pillars__item">
                <span class="trust-pillars__icon">
                    <?php echo $pillar['icon']; ?>
                </span>
                <div class="trust-pillars__text">
                    <h4 class="trust-pillars__title"><?php echo htmlspecialchars($pillar['title']); ?></h4>
                    <p class="trust-pillars__desc"><?php echo htmlspecialchars($pillar['desc']); ?></p>
                </div>
            </div>
            <?php if ($i < count($trust_pillars) - 1): ?>
                <span class="trust-pillars__divider" aria-hidden="true"></span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
