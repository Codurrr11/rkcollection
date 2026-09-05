<?php
/**
 * RK COLLECTION — CHECKOUT
 * Delivery details + payment selection against the bag summary carried over
 * from cart.php. Order placement is confirmed client side in checkout.js.
 */

$page_title = 'Checkout | RK Collection — Handwoven Heritage Silks';
$page_css   = ['assets/css/shop.css'];
$page_js    = ['assets/js/checkout.js'];

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/products-data.php';

/* Mirrors the bag rendered on cart.php */
$order_items = [
    ['product' => $shop_products[0], 'color' => 'Royal Maroon',      'blouse' => 'Unstitched included',        'qty' => 1, 'unit_price' => 6999],
    ['product' => $shop_products[4], 'color' => 'Ivory Silver',      'blouse' => 'Custom stitched (+₹1,200)',  'qty' => 1, 'unit_price' => 11500],
    ['product' => $shop_products[9], 'color' => 'Kanchipuram Gold',  'blouse' => 'Unstitched included',        'qty' => 1, 'unit_price' => 18400],
];

$subtotal = 0;
foreach ($order_items as $item) {
    $subtotal += $item['unit_price'] * $item['qty'];
}
$tax   = (int) round($subtotal * 0.05);
$total = $subtotal + $tax;

$payment_methods = [
    'upi'  => ['label' => 'UPI',                  'note' => 'GPay, PhonePe, Paytm or any UPI app'],
    'card' => ['label' => 'Credit / Debit Card',  'note' => 'Visa, Mastercard, RuPay & Amex'],
    'net'  => ['label' => 'Net Banking',          'note' => 'All major Indian banks'],
    'cod'  => ['label' => 'Cash on Delivery',     'note' => 'Available on orders up to ₹15,000'],
];
?>

<main class="site-main checkout-page" id="checkoutPage">

    <section class="shop-hero">
        <p class="shop-hero__eyebrow">Almost yours</p>
        <h1 class="shop-hero__title">Checkout</h1>
        <div class="shop-hero__rule" aria-hidden="true"></div>
        <nav class="shop-hero__crumbs" aria-label="Breadcrumb">
            <a class="shop-hero__crumb-link" href="index.php">Home</a>
            <span class="shop-hero__crumb-sep" aria-hidden="true">/</span>
            <a class="shop-hero__crumb-link" href="cart.php">Bag</a>
            <span class="shop-hero__crumb-sep" aria-hidden="true">/</span>
            <span class="shop-hero__crumb shop-hero__crumb--current" aria-current="page">Checkout</span>
        </nav>
    </section>

    <section class="checkout">
        <div class="checkout__inner">

            <!-- LEFT: DELIVERY + PAYMENT -->
            <form class="checkout__main" id="checkoutForm" novalidate>

                <div class="checkout-block">
                    <header class="checkout-block__head">
                        <span class="checkout-block__step">01</span>
                        <h2 class="checkout-block__title">Delivery Details</h2>
                    </header>

                    <div class="checkout-grid">
                        <div class="checkout-field">
                            <label class="checkout-label" for="coName">Full name</label>
                            <input class="checkout-input" type="text" id="coName" name="name" autocomplete="name" required>
                        </div>
                        <div class="checkout-field">
                            <label class="checkout-label" for="coPhone">Mobile number</label>
                            <input class="checkout-input" type="tel" id="coPhone" name="phone" autocomplete="tel" required>
                        </div>
                        <div class="checkout-field checkout-field--full">
                            <label class="checkout-label" for="coEmail">Email address</label>
                            <input class="checkout-input" type="email" id="coEmail" name="email" autocomplete="email" required>
                        </div>
                        <div class="checkout-field checkout-field--full">
                            <label class="checkout-label" for="coAddress">Address</label>
                            <textarea class="checkout-input checkout-input--area" id="coAddress" name="address" rows="3" autocomplete="street-address" required></textarea>
                        </div>
                        <div class="checkout-field">
                            <label class="checkout-label" for="coCity">City</label>
                            <input class="checkout-input" type="text" id="coCity" name="city" autocomplete="address-level2" required>
                        </div>
                        <div class="checkout-field">
                            <label class="checkout-label" for="coPin">PIN code</label>
                            <input class="checkout-input" type="text" id="coPin" name="pin" inputmode="numeric" autocomplete="postal-code" required>
                        </div>
                    </div>
                </div>

                <div class="checkout-block">
                    <header class="checkout-block__head">
                        <span class="checkout-block__step">02</span>
                        <h2 class="checkout-block__title">Saree Finishing</h2>
                    </header>
                    <p class="checkout-block__note">
                        Complimentary Fall &amp; Piku is applied to every saree before dispatch.
                        Tell us anything else your drape needs.
                    </p>
                    <div class="checkout-field checkout-field--full">
                        <label class="checkout-label" for="coNotes">Notes for the atelier <span class="checkout-optional">optional</span></label>
                        <textarea class="checkout-input checkout-input--area" id="coNotes" name="notes" rows="2" placeholder="Blouse measurements, gift wrapping, delivery timing&hellip;"></textarea>
                    </div>
                </div>

                <div class="checkout-block">
                    <header class="checkout-block__head">
                        <span class="checkout-block__step">03</span>
                        <h2 class="checkout-block__title">Payment Method</h2>
                    </header>

                    <div class="checkout-pay">
                        <?php $first = true; foreach ($payment_methods as $key => $pm): ?>
                            <label class="checkout-pay__option<?php echo $first ? ' is-selected' : ''; ?>">
                                <input type="radio" name="payment" value="<?php echo htmlspecialchars($key); ?>"
                                       class="checkout-pay__radio"<?php echo $first ? ' checked' : ''; ?>>
                                <span class="checkout-pay__text">
                                    <span class="checkout-pay__label"><?php echo htmlspecialchars($pm['label']); ?></span>
                                    <span class="checkout-pay__note"><?php echo htmlspecialchars($pm['note']); ?></span>
                                </span>
                            </label>
                        <?php $first = false; endforeach; ?>
                    </div>

                    <p class="checkout-secure">
                        Payments are processed by our PCI-DSS compliant gateway. We never store card details.
                        <a href="policies.php#payments">Payment policy</a>
                    </p>
                </div>

                <p class="checkout-alert" id="checkoutAlert" role="status" hidden></p>

            </form>

            <!-- RIGHT: ORDER SUMMARY -->
            <aside class="checkout__summary" aria-label="Order summary">
                <div class="checkout-summary-card">
                    <h2 class="checkout-summary__title">Your Bag</h2>

                    <ul class="checkout-summary__items">
                        <?php foreach ($order_items as $item): ?>
                            <li class="checkout-line">
                                <img class="checkout-line__img"
                                     src="<?php echo htmlspecialchars($item['product']['image']); ?>"
                                     alt="<?php echo htmlspecialchars($item['product']['title']); ?>" loading="lazy">
                                <span class="checkout-line__text">
                                    <a class="checkout-line__title" href="<?php echo htmlspecialchars(rk_product_url($item['product'])); ?>">
                                        <?php echo htmlspecialchars($item['product']['title']); ?>
                                    </a>
                                    <span class="checkout-line__meta"><?php echo htmlspecialchars($item['color']); ?> &middot; <?php echo htmlspecialchars($item['blouse']); ?></span>
                                    <span class="checkout-line__qty">Qty <?php echo (int) $item['qty']; ?></span>
                                </span>
                                <span class="checkout-line__price">₹<?php echo number_format($item['unit_price'] * $item['qty']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="checkout-totals">
                        <div class="checkout-total-row">
                            <span>Sub total</span>
                            <span class="checkout-total-val">₹<?php echo number_format($subtotal); ?></span>
                        </div>
                        <div class="checkout-total-row">
                            <span>Delivery</span>
                            <span class="checkout-total-val checkout-total-val--free">Free</span>
                        </div>
                        <div class="checkout-total-row">
                            <span>Taxes (5% GST)</span>
                            <span class="checkout-total-val">₹<?php echo number_format($tax); ?></span>
                        </div>
                        <div class="checkout-total-row checkout-total-row--grand">
                            <span>Total payable</span>
                            <span class="checkout-total-val">₹<?php echo number_format($total); ?></span>
                        </div>
                    </div>

                    <button type="submit" form="checkoutForm" class="checkout-place-btn">Place Order</button>

                    <a class="checkout-back" href="cart.php">&larr; Back to bag</a>

                    <ul class="checkout-assure">
                        <li>Silk Mark certified pure silk</li>
                        <li>Complimentary Fall &amp; Piku</li>
                        <li><a href="policies.php#shipping">7-day exchange on unstitched sarees</a></li>
                    </ul>
                </div>
            </aside>

        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
