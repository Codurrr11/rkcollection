<?php
/**
 * SHARED SAREE CATALOGUE
 *
 * Single source of truth for every page that lists or shows a product —
 * shop.php, product-details.php and the homepage sliders. Same array shape as
 * the one includes/product-slider.php already consumes (title, price,
 * sale_price, image, badge, badge_type, link), extended with the attributes
 * the shop filters and the detail page need.
 */

/* --------------------------------------------------------------------------
   FILTER TAXONOMY
   -------------------------------------------------------------------------- */
$shop_categories = [
    'banarasi'    => 'Banarasi',
    'kanjivaram'  => 'Kanjivaram',
    'mangalagiri' => 'Mangalagiri',
    'cotton'      => 'Cotton',
    'silk'        => 'Silk',
    'designer'    => 'Designer',
    'bridal'      => 'Bridal',
    'fancy'       => 'Fancy',
];

$shop_fabrics = [
    'pure-silk'   => 'Pure Silk',
    'cotton-silk' => 'Cotton Silk',
    'georgette'   => 'Georgette',
    'chiffon'     => 'Chiffon',
    'organza'     => 'Organza',
    'tussar'      => 'Tussar',
];

$shop_colors = [
    'maroon' => ['label' => 'Maroon', 'hex' => '#540b14'],
    'gold'   => ['label' => 'Gold',   'hex' => '#cfa75a'],
    'green'  => ['label' => 'Green',  'hex' => '#2f5d43'],
    'pink'   => ['label' => 'Pink',   'hex' => '#d59aa6'],
    'blue'   => ['label' => 'Blue',   'hex' => '#2c4a72'],
    'orange' => ['label' => 'Orange', 'hex' => '#d0762c'],
    'black'  => ['label' => 'Black',  'hex' => '#1c1917'],
    'white'  => ['label' => 'White',  'hex' => '#f4efe6'],
];

/* --------------------------------------------------------------------------
   PER-CATEGORY CRAFT DETAIL
   Keyed lookups so the product rows stay lean — the detail page composes its
   copy and its specification table from these.
   -------------------------------------------------------------------------- */
$saree_weaves = [
    'banarasi'    => 'Handloom Brocade Weave',
    'kanjivaram'  => 'Korvai Interlocked Weave',
    'mangalagiri' => 'Pit Loom Nizam Weave',
    'cotton'      => 'Handloom Plain Weave',
    'silk'        => 'Jacquard Zari Weave',
    'designer'    => 'Handwoven with Hand Embellishment',
    'bridal'      => 'Heavy Zari Brocade Weave',
    'fancy'       => 'Powerloom Fancy Weave',
];

$saree_occasions = [
    'banarasi'    => 'Weddings, Receptions, Festive Ceremonies',
    'kanjivaram'  => 'Weddings, Temple Visits, Muhurtham',
    'mangalagiri' => 'Daily Wear, Office, Small Gatherings',
    'cotton'      => 'Daily Wear, Summer Occasions',
    'silk'        => 'Festivals, Family Functions',
    'designer'    => 'Cocktail Evenings, Sangeet, Receptions',
    'bridal'      => 'Bridal Muhurtham, Reception',
    'fancy'       => 'Parties, Casual Celebrations',
];

$saree_wash_care = [
    'pure-silk'   => 'Dry clean only. Store wrapped in muslin.',
    'cotton-silk' => 'Dry clean recommended. Gentle hand wash in cold water.',
    'georgette'   => 'Dry clean only. Do not wring or tumble dry.',
    'chiffon'     => 'Dry clean only. Iron on low heat with a cloth.',
    'organza'     => 'Dry clean only. Hang on a padded rod to hold shape.',
    'tussar'      => 'Dry clean for the first three washes, then gentle hand wash.',
];

/* Colours each weave is stocked in — drives the detail-page swatch row. */
$saree_color_options = [
    'banarasi'    => ['maroon', 'gold', 'pink', 'green'],
    'kanjivaram'  => ['maroon', 'gold', 'green', 'blue'],
    'mangalagiri' => ['blue', 'orange', 'white', 'green'],
    'cotton'      => ['white', 'pink', 'blue', 'green'],
    'silk'        => ['gold', 'green', 'black', 'maroon'],
    'designer'    => ['blue', 'white', 'black', 'pink'],
    'bridal'      => ['maroon', 'gold', 'pink'],
    'fancy'       => ['orange', 'black', 'pink', 'blue'],
];

/* --------------------------------------------------------------------------
   CATALOGUE
   -------------------------------------------------------------------------- */
$shop_products = [
    ['id' => 1,  'title' => 'Banarasi Kora Zari Silk Saree',      'price' => '₹8,999',  'sale_price' => '₹6,999',  'price_value' => 6999,  'category' => 'banarasi',    'fabric' => 'pure-silk',   'color' => 'maroon', 'image' => 'assets/images/products/banarasi-kora-saree.jpg',     'badge' => 'BESTSELLER', 'badge_type' => 'dark',   'added' => 24, 'popularity' => 98],
    ['id' => 2,  'title' => 'Tissue Silk Zari Brocade Saree',     'price' => '₹7,499',  'sale_price' => '₹5,999',  'price_value' => 5999,  'category' => 'silk',        'fabric' => 'pure-silk',   'color' => 'gold',   'image' => 'assets/images/products/tissue-silk-saree.jpg',       'badge' => 'SALE',       'badge_type' => 'maroon', 'added' => 23, 'popularity' => 91],
    ['id' => 3,  'title' => 'Soft Silk Temple Border Saree',      'price' => '₹6,499',  'sale_price' => null,      'price_value' => 6499,  'category' => 'silk',        'fabric' => 'pure-silk',   'color' => 'green',  'image' => 'assets/images/collections/soft-silk-saree.jpg',      'badge' => 'NEW',        'badge_type' => 'royal',   'added' => 22, 'popularity' => 74],
    ['id' => 4,  'title' => 'Kuppadam Sico Peacock Silk Saree',   'price' => '₹9,200',  'sale_price' => '₹7,800',  'price_value' => 7800,  'category' => 'designer',    'fabric' => 'cotton-silk', 'color' => 'blue',   'image' => 'assets/images/collections/kuppadam-sico-saree.jpg',  'badge' => 'SALE',       'badge_type' => 'maroon', 'added' => 21, 'popularity' => 86],
    ['id' => 5,  'title' => 'Kalanjali Silver Zari Silk Saree',   'price' => '₹11,500', 'sale_price' => null,      'price_value' => 11500, 'category' => 'designer',    'fabric' => 'pure-silk',   'color' => 'white',  'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'BESTSELLER', 'badge_type' => 'dark',   'added' => 20, 'popularity' => 95],
    ['id' => 6,  'title' => 'Pure Chanderi Handloom Saree',       'price' => '₹5,800',  'sale_price' => '₹4,600',  'price_value' => 4600,  'category' => 'cotton',      'fabric' => 'cotton-silk', 'color' => 'pink',   'image' => 'assets/images/products/banarasi-kora-saree.jpg',     'badge' => 'NEW',        'badge_type' => 'royal',   'added' => 19, 'popularity' => 68],
    ['id' => 7,  'title' => 'Paithani Royal Peacock Silk Saree',  'price' => '₹14,999', 'sale_price' => '₹12,499', 'price_value' => 12499, 'category' => 'bridal',      'fabric' => 'pure-silk',   'color' => 'green',  'image' => 'assets/images/products/tissue-silk-saree.jpg',       'badge' => 'SALE',       'badge_type' => 'maroon', 'added' => 18, 'popularity' => 93],
    ['id' => 8,  'title' => 'Tussar Georgette Handcrafted Saree', 'price' => '₹8,200',  'sale_price' => null,      'price_value' => 8200,  'category' => 'fancy',       'fabric' => 'tussar',      'color' => 'orange', 'image' => 'assets/images/collections/soft-silk-saree.jpg',      'badge' => 'NEW',        'badge_type' => 'royal',   'added' => 17, 'popularity' => 71],
    ['id' => 9,  'title' => 'Kanjivaram Bridal Zari Silk Saree',  'price' => '₹24,500', 'sale_price' => '₹21,900', 'price_value' => 21900, 'category' => 'kanjivaram',  'fabric' => 'pure-silk',   'color' => 'maroon', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'BRIDAL',     'badge_type' => 'dark',   'added' => 16, 'popularity' => 99],
    ['id' => 10, 'title' => 'Kanjivaram Temple Korvai Saree',     'price' => '₹18,400', 'sale_price' => null,      'price_value' => 18400, 'category' => 'kanjivaram',  'fabric' => 'pure-silk',   'color' => 'gold',   'image' => 'assets/images/collections/kuppadam-sico-saree.jpg',  'badge' => null,         'badge_type' => 'gold',   'added' => 15, 'popularity' => 88],
    ['id' => 11, 'title' => 'Mangalagiri Cotton Nizam Border',    'price' => '₹3,400',  'sale_price' => '₹2,750',  'price_value' => 2750,  'category' => 'mangalagiri', 'fabric' => 'cotton-silk', 'color' => 'blue',   'image' => 'assets/images/collections/bandhani-collection.jpg',  'badge' => 'SALE',       'badge_type' => 'maroon', 'added' => 14, 'popularity' => 64],
    ['id' => 12, 'title' => 'Mangalagiri Pattu Ghicha Saree',     'price' => '₹4,250',  'sale_price' => null,      'price_value' => 4250,  'category' => 'mangalagiri', 'fabric' => 'cotton-silk', 'color' => 'orange', 'image' => 'assets/images/collections/party-collection.jpg',     'badge' => null,         'badge_type' => 'gold',   'added' => 13, 'popularity' => 58],
    ['id' => 13, 'title' => 'Banarasi Katan Meenakari Saree',     'price' => '₹16,750', 'sale_price' => '₹14,200', 'price_value' => 14200, 'category' => 'banarasi',    'fabric' => 'pure-silk',   'color' => 'pink',   'image' => 'assets/images/products/banarasi-kora-saree.jpg',     'badge' => 'SALE',       'badge_type' => 'maroon', 'added' => 12, 'popularity' => 90],
    ['id' => 14, 'title' => 'Banarasi Organza Tissue Saree',      'price' => '₹9,850',  'sale_price' => null,      'price_value' => 9850,  'category' => 'banarasi',    'fabric' => 'organza',     'color' => 'white',  'image' => 'assets/images/products/tissue-silk-saree.jpg',       'badge' => 'NEW',        'badge_type' => 'royal',   'added' => 11, 'popularity' => 79],
    ['id' => 15, 'title' => 'Chiffon Hand-Painted Pichwai Saree', 'price' => '₹7,100',  'sale_price' => '₹5,680',  'price_value' => 5680,  'category' => 'designer',    'fabric' => 'chiffon',     'color' => 'green',  'image' => 'assets/images/collections/party-collection.jpg',     'badge' => 'SALE',       'badge_type' => 'maroon', 'added' => 10, 'popularity' => 72],
    ['id' => 16, 'title' => 'Georgette Sequin Cocktail Saree',    'price' => '₹6,300',  'sale_price' => null,      'price_value' => 6300,  'category' => 'fancy',       'fabric' => 'georgette',   'color' => 'black',  'image' => 'assets/images/collections/kaftan-collection.jpg',    'badge' => null,         'badge_type' => 'gold',   'added' => 9,  'popularity' => 66],
    ['id' => 17, 'title' => 'Bridal Kanjivaram Vaira Oosi Saree', 'price' => '₹32,000', 'sale_price' => '₹28,500', 'price_value' => 28500, 'category' => 'bridal',      'fabric' => 'pure-silk',   'color' => 'maroon', 'image' => 'assets/images/collections/kalanjali-silk-saree.jpg', 'badge' => 'BRIDAL',     'badge_type' => 'dark',   'added' => 8,  'popularity' => 97],
    ['id' => 18, 'title' => 'Bridal Banarasi Gold Tissue Saree',  'price' => '₹26,900', 'sale_price' => null,      'price_value' => 26900, 'category' => 'bridal',      'fabric' => 'organza',     'color' => 'gold',   'image' => 'assets/images/products/tissue-silk-saree.jpg',       'badge' => null,         'badge_type' => 'gold',   'added' => 7,  'popularity' => 89],
    ['id' => 19, 'title' => 'Handloom Jamdani Cotton Saree',      'price' => '₹3,900',  'sale_price' => '₹3,120',  'price_value' => 3120,  'category' => 'cotton',      'fabric' => 'cotton-silk', 'color' => 'white',  'image' => 'assets/images/collections/bandhani-collection.jpg',  'badge' => 'SALE',       'badge_type' => 'maroon', 'added' => 6,  'popularity' => 61],
    ['id' => 20, 'title' => 'Kota Doria Zari Check Saree',        'price' => '₹2,650',  'sale_price' => null,      'price_value' => 2650,  'category' => 'cotton',      'fabric' => 'cotton-silk', 'color' => 'pink',   'image' => 'assets/images/collections/party-collection.jpg',     'badge' => null,         'badge_type' => 'gold',   'added' => 5,  'popularity' => 54],
    ['id' => 21, 'title' => 'Tussar Ghicha Kantha Work Saree',    'price' => '₹10,400', 'sale_price' => '₹8,900',  'price_value' => 8900,  'category' => 'silk',        'fabric' => 'tussar',      'color' => 'orange', 'image' => 'assets/images/collections/soft-silk-saree.jpg',      'badge' => 'SALE',       'badge_type' => 'maroon', 'added' => 4,  'popularity' => 76],
    ['id' => 22, 'title' => 'Mysore Crepe Silk Plain Saree',      'price' => '₹5,200',  'sale_price' => null,      'price_value' => 5200,  'category' => 'silk',        'fabric' => 'pure-silk',   'color' => 'black',  'image' => 'assets/images/collections/kaftan-collection.jpg',    'badge' => null,         'badge_type' => 'gold',   'added' => 3,  'popularity' => 69],
    ['id' => 23, 'title' => 'Designer Organza Floral Drape',      'price' => '₹12,800', 'sale_price' => '₹10,900', 'price_value' => 10900, 'category' => 'designer',    'fabric' => 'organza',     'color' => 'blue',   'image' => 'assets/images/collections/kuppadam-sico-saree.jpg',  'badge' => 'NEW',        'badge_type' => 'royal',   'added' => 2,  'popularity' => 83],
    ['id' => 24, 'title' => 'Fancy Chiffon Ombre Party Saree',    'price' => '₹4,800',  'sale_price' => null,      'price_value' => 4800,  'category' => 'fancy',       'fabric' => 'chiffon',     'color' => 'pink',   'image' => 'assets/images/collections/bandhani-collection.jpg',  'badge' => null,         'badge_type' => 'gold',   'added' => 1,  'popularity' => 57],
];

/* Every card sitewide points at the detail page for its own id. */
foreach ($shop_products as $i => $p) {
    $shop_products[$i]['link'] = 'product-details.php?id=' . $p['id'];
}

/**
 * Look a product up by its id. Returns null when the id is unknown.
 */
function rk_find_product(array $products, $id)
{
    foreach ($products as $product) {
        if ((int) $product['id'] === (int) $id) {
            return $product;
        }
    }
    return null;
}

/**
 * Gallery frames for a product — the hero shot first, then three companion
 * views drawn from the same catalogue so every product has a full strip.
 */
function rk_product_gallery(array $product, array $products)
{
    $gallery = [$product['image']];
    foreach ($products as $other) {
        if (count($gallery) >= 4) {
            break;
        }
        if ($other['id'] !== $product['id'] && !in_array($other['image'], $gallery, true)) {
            $gallery[] = $other['image'];
        }
    }
    return $gallery;
}

/**
 * SKU built from the product's own attributes so it stays stable.
 */
function rk_product_sku(array $product)
{
    return strtoupper(substr($product['category'], 0, 3) . '-' . substr($product['fabric'], 0, 3))
        . '-' . str_pad((string) $product['id'], 4, '0', STR_PAD_LEFT);
}

/**
 * Short lead paragraph shown beside the price. Deliberately says nothing the
 * specification grid already states — craft and character only.
 */
function rk_product_intro()
{
    return 'Woven to order on a traditional pit loom, with the motif carried unbroken from '
        . 'body to pallu. Each piece is finished by hand, so no two drapes fall exactly alike.';
}
