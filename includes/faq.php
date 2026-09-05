<?php
/**
 * RK Collection — FAQ Component
 * Artistic, minimal, sober split-layout accordion section.
 */
$faqs = [
    [
        'question' => 'Are all your sarees 100% authentic handloom with Silk Mark certification?',
        'answer'   => 'Yes, every pure silk saree from RK Collection comes with official Silk Mark Organization of India certification, guaranteeing 100% pure silk yarns and authentic handloom zari craftsmanship.'
    ],
    [
        'question' => 'Do you offer complimentary Fall & Piku or custom blouse stitching?',
        'answer'   => 'We provide complimentary Fall and Piku finishing on all orders. Additionally, our master tailors offer bespoke blouse stitching services tailored to your exact measurements.'
    ],
    [
        'question' => 'What is the estimated delivery timeframe across India and worldwide?',
        'answer'   => 'Domestic orders within India are delivered within 3–5 business days via express courier. International orders are shipped via DHL/FedEx Express and reach you within 5–7 business days.'
    ],
    [
        'question' => 'Can I schedule a live video call to view saree colors and texture before buying?',
        'answer'   => 'Absolutely! We invite you to book a 1-on-1 WhatsApp video shopping session with our saree drapers to inspect thread work, zari sheen, and drape fluidity in real-time.'
    ],
    [
        'question' => 'What is your return, exchange, and order cancellation policy?',
        'answer'   => 'We offer a seamless 7-day exchange window for unstitched sarees in original condition with tags intact. If you receive a damaged product, we process instant replacements.'
    ]
];
?>

<section class="faq" id="faq">
    <div class="faq__inner">

        <header class="faq__head">
            <span class="faq__eyebrow">Frequently Asked Questions</span>
            <h2 class="faq__title">Your questions answered</h2>
            <p class="faq__subtitle">Everything about our handloom weaves, Silk Mark certification, worldwide delivery and custom tailoring &mdash; answered by the people who drape them.</p>
        </header>

        <ul class="faq__accordion">
            <?php foreach ($faqs as $index => $faq): ?>
                <li class="faq__item<?php echo $index === 0 ? ' is-open' : ''; ?>">
                    <button type="button"
                            class="faq__button"
                            aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                            aria-controls="faq-panel-<?php echo $index; ?>">
                        <span class="faq__index" aria-hidden="true"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                        <span class="faq__question-text"><?php echo htmlspecialchars($faq['question']); ?></span>
                        <span class="faq__toggle" aria-hidden="true"></span>
                    </button>

                    <div class="faq__answer-panel" id="faq-panel-<?php echo $index; ?>">
                        <div class="faq__answer-content">
                            <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="faq__foot">
            <p class="faq__foot-text">Still deciding? Speak with a saree draper.</p>
            <a href="https://wa.me/919876543210" target="_blank" rel="noopener noreferrer" class="faq__cta">
                <span>Talk to an Expert</span>
                <span class="faq__cta-arrow" aria-hidden="true"><?php echo rk_icon('arrow-right', 15, 1.7); ?></span>
            </a>
        </div>

    </div>
</section>
