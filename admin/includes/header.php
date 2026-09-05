<?php
/**
 * RK ADMIN — DOCUMENT HEAD, SHELL AND MINIMAL TOPBAR
 *
 * Pages set $admin_title, $admin_subtitle and $admin_page before including
 * this file. Admin never loads the storefront stylesheets — its tokens live in
 * assets/css/admin.css and cannot reach the main site.
 */

require_once __DIR__ . '/auth.php';

$admin_title    = isset($admin_title) ? $admin_title : 'Dashboard';
$admin_subtitle = isset($admin_subtitle) ? $admin_subtitle : '';
$admin_page     = isset($admin_page) ? $admin_page : 'dashboard';

$logged_admin   = get_current_admin();
$header_name    = $logged_admin ? $logged_admin['name'] : 'Radhika Sharma';
$header_role    = $logged_admin ? $logged_admin['role'] : 'Store Manager';
$header_initials= strtoupper(substr($header_name, 0, 1) . (strpos($header_name, ' ') !== false ? substr($header_name, strpos($header_name, ' ') + 1, 1) : ''));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo htmlspecialchars($admin_title); ?> | RK Admin</title>

    <link rel="icon" href="assets/images/logo/logo-rk.png" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Overpass:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/admin.css?v=<?php echo time(); ?>">
</head>
<body class="admin-body">

<div class="admin-layout" id="adminLayout">

    <?php require __DIR__ . '/sidebar.php'; ?>

    <div class="admin-overlay" id="adminOverlay" hidden></div>

    <div class="admin-main">

        <header class="admin-topbar">

            <div class="admin-topbar__left">
                <div class="admin-topbar__heading">
                    <h1 class="admin-topbar__title"><?php echo htmlspecialchars($admin_title); ?></h1>
                    <?php if ($admin_subtitle !== ''): ?>
                        <p class="admin-topbar__subtitle"><?php echo htmlspecialchars($admin_subtitle); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="admin-topbar__right">

                <form class="admin-search" role="search" onsubmit="return false;">
                    <i class="bi bi-search admin-search__icon" aria-hidden="true"></i>
                    <label class="admin-visually-hidden" for="adminSearch">Search the admin</label>
                    <input type="search" id="adminSearch" class="admin-search__input"
                           placeholder="Search orders, products, customers...">
                    <kbd class="admin-search__kbd">/</kbd>
                </form>

                <div class="admin-account" id="adminAccount">
                    <button type="button" class="admin-account__trigger" id="adminAccountTrigger"
                            aria-haspopup="true" aria-expanded="false" aria-controls="adminAccountMenu">
                        <span class="admin-account__avatar" aria-hidden="true"><?php echo htmlspecialchars($header_initials); ?></span>
                        <span class="admin-account__text">
                            <span class="admin-account__name"><?php echo htmlspecialchars($header_name); ?></span>
                            <span class="admin-account__role"><?php echo htmlspecialchars($header_role); ?></span>
                        </span>
                        <i class="bi bi-chevron-down admin-account__caret" aria-hidden="true"></i>
                    </button>

                    <div class="admin-account__menu" id="adminAccountMenu" hidden>
                        <a class="admin-account__item" href="#"><i class="bi bi-person" aria-hidden="true"></i> Profile</a>
                        <a class="admin-account__item" href="#"><i class="bi bi-gear" aria-hidden="true"></i> Settings</a>
                        <a class="admin-account__item" href="../index.php"><i class="bi bi-shop" aria-hidden="true"></i> View storefront</a>
                        <span class="admin-account__divider" aria-hidden="true"></span>
                        <a class="admin-account__item admin-account__item--danger" href="logout.php"><i class="bi bi-box-arrow-right" aria-hidden="true"></i> Log out</a>
                    </div>
                </div>

            </div>
        </header>

        <main class="admin-content">
