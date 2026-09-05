<?php
/**
 * RK COLLECTION — 404 PAGE NOT FOUND
 */
$page_title = "Page Not Found | RK Collection";
$page_css   = ['assets/css/shop.css'];

include 'includes/header.php';
?>

<main class="site-main">
    <section class="shop-hero text-center py-5" style="background-color: #faf5ea; padding: 100px 20px;">
        <div class="container" style="max-width: 680px; margin: 0 auto;">
            <span class="rk-script rk-script--wine d-block mb-2" style="font-size: 28px; color: #540b14;">heritage weaves</span>
            <h1 class="shop-hero__title mb-3" style="font-family: 'Duru Sans', serif; font-size: 48px; color: #1c1917;">404 — Page Not Found</h1>
            <div class="shop-hero__rule mx-auto mb-4" style="width: 60px; height: 2px; background: #cfa75a;"></div>
            <p class="lead mb-4" style="color: #57534e; font-size: 16px; line-height: 1.6;">
                The page or saree drape you are looking for does not exist or may have been moved within our heritage catalogue.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                <a href="index" class="btn-pill" style="display: inline-flex; align-items: center; padding: 12px 28px; background: #540b14; color: #ffffff; text-decoration: none; border-radius: 30px; font-weight: 500;">
                    <span>Return to Home</span>
                </a>
                <a href="shop" class="btn-pill" style="display: inline-flex; align-items: center; padding: 12px 28px; background: #cfa75a; color: #1c1917; text-decoration: none; border-radius: 30px; font-weight: 500;">
                    <span>Explore Saree Catalogue</span>
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
