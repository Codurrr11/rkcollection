<?php
/**
 * MEGA MENU DATA
 *
 * One entry per category nav pill. Each entry drives both the desktop hover
 * panel (includes/mega-menu.php) and the mobile drawer accordion, so the two
 * never drift apart. `featured` is an id from the shared catalogue.
 */

require_once __DIR__ . '/products-data.php';

$mega_menus = [

    'banarasi' => [
        'label'    => 'Banarasi',
        'featured' => 1,
        'columns'  => [
            ['heading' => 'By Fabric',   'links' => ['Katan Silk', 'Kora Organza', 'Georgette', 'Tissue Silk', 'Shattir']],
            ['heading' => 'By Craft',    'links' => ['Meenakari', 'Jangla', 'Jamawar', 'Shikargah', 'Cutwork']],
            ['heading' => 'By Occasion', 'links' => ['Wedding', 'Tilak Ceremony', 'Festive', 'Grah Pravesh']],
            ['heading' => 'Price Range', 'links' => ['Under ₹12,000', '₹12,000 – ₹25,000', 'Above ₹25,000']],
        ],
    ],

    'kanjivaram' => [
        'label'    => 'Kanjivaram',
        'featured' => 9,
        'columns'  => [
            ['heading' => 'By Weave',    'links' => ['Korvai', 'Vaira Oosi', 'Rettai Pettu', 'Pure Zari', 'Thread Work']],
            ['heading' => 'By Border',   'links' => ['Temple Border', 'Contrast Border', 'Rudraksham', 'Mubbagam']],
            ['heading' => 'By Occasion', 'links' => ['Nalangu', 'Seemantham', 'Temple Visit', 'Griha Pravesham']],
            ['heading' => 'Price Range', 'links' => ['Under ₹15,000', '₹15,000 – ₹30,000', 'Above ₹30,000']],
        ],
    ],

    'silk' => [
        'label'    => 'Pure Silk',
        'featured' => 2,
        'columns'  => [
            ['heading' => 'By Type',     'links' => ['Mysore Crepe', 'Soft Silk', 'Tussar Ghicha', 'Matka Silk', 'Raw Silk']],
            ['heading' => 'By Finish',   'links' => ['Plain Body', 'Zari Buti', 'Thin Zari Border', 'Printed Pallu']],
            ['heading' => 'By Occasion', 'links' => ['Festive Days', 'Family Functions', 'Office Formals', 'Gifting']],
            ['heading' => 'Price Range', 'links' => ['Under ₹6,000', '₹6,000 – ₹12,000', 'Above ₹12,000']],
        ],
    ],

    'cotton' => [
        'label'    => 'Cotton',
        'featured' => 18,
        'columns'  => [
            ['heading' => 'By Weave',    'links' => ['Jamdani', 'Kota Doria', 'Chanderi', 'Mangalagiri', 'Venkatagiri']],
            ['heading' => 'By Care',     'links' => ['Machine Washable', 'Starch Free', 'Handwash Only']],
            ['heading' => 'By Occasion', 'links' => ['Daily Wear', 'Office', 'Summer Days', 'Travel']],
            ['heading' => 'Price Range', 'links' => ['Under ₹2,500', '₹2,500 – ₹5,000', 'Above ₹5,000']],
        ],
    ],

    'designer' => [
        'label'    => 'Designer',
        'featured' => 5,
        'columns'  => [
            ['heading' => 'By Drape',        'links' => ['Ready to Wear', 'Pre-Draped', 'Ruffle Saree', 'Cape Saree']],
            ['heading' => 'By Embellishment','links' => ['Hand Embroidery', 'Sequin Work', 'Mirror Work', 'Hand Painted']],
            ['heading' => 'By Occasion',     'links' => ['Cocktail', 'Sangeet', 'Photoshoot', 'Resort Wear']],
            ['heading' => 'Price Range',     'links' => ['Under ₹8,000', '₹8,000 – ₹15,000', 'Above ₹15,000']],
        ],
    ],

    'bridal' => [
        'label'    => 'Bridal',
        'featured' => 17,
        'columns'  => [
            ['heading' => 'By Ritual',       'links' => ['Muhurtham', 'Reception', 'Engagement', 'Mehendi']],
            ['heading' => 'By Weave',        'links' => ['Bridal Kanjivaram', 'Bridal Banarasi', 'Paithani', 'Patola']],
            ['heading' => 'Colour Story',    'links' => ['Classic Red', 'Maroon & Gold', 'Ivory & Gold', 'Pastel Bridal']],
            ['heading' => 'Bridal Services', 'links' => ['Bridal Consultation', 'Custom Weaving', 'Blouse Fitting']],
        ],
    ],

    'collections' => [
        'label'     => 'Collections',
        'featured'  => 11,
        'shop_slug' => '',
        'columns'   => [
            ['heading' => 'The Editions', 'links' => ['Festive Edit', 'New Arrivals', 'Bestsellers', 'Last Few Pieces']],
            ['heading' => 'By Price',     'links' => ['Under ₹5,000', '₹5,000 – ₹10,000', '₹10,000 – ₹20,000', 'Above ₹20,000']],
            ['heading' => 'Our Heritage', 'links' => ['Silk Mark Certified', 'Handloom Mark', 'Weaver Stories']],
            ['heading' => 'Gifting',      'links' => ['Gift Cards', 'Trousseau Sets', 'Corporate Gifting']],
        ],
    ],

];

/**
 * Destination for a mega-menu link. Everything funnels into the shop listing
 * filtered by category; `shop_slug` lets a menu opt out of the filter.
 */
function rk_mega_href($slug, array $mega)
{
    $target = array_key_exists('shop_slug', $mega) ? $mega['shop_slug'] : $slug;
    return $target === '' ? 'shop.php' : 'shop.php?category=' . $target;
}
