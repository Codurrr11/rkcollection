<?php
/**
 * RK ADMIN — ARCHITECTURAL EDITORIAL REGISTRATION
 * 
 * Minimalist luxury split-screen onboarding portal matching the high-fashion
 * fluted architectural aesthetic with smooth pill inputs.
 */

require_once __DIR__ . '/includes/auth.php';

// Redirect if already logged in
if (is_admin_logged_in()) {
    header('Location: index.php');
    exit;
}

$error   = '';
$success = '';

$val_name  = '';
$val_email = '';
$val_phone = '';

// Process Register POST Request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf_token       = $_POST['csrf_token'] ?? '';
    $name             = trim($_POST['name'] ?? '');
    $email            = trim($_POST['email'] ?? '');
    $phone            = trim($_POST['phone'] ?? '');
    $password         = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    $val_name  = $name;
    $val_email = $email;
    $val_phone = $phone;

    if (!verify_csrf_token($csrf_token)) {
        $error = 'Security session expired. Please refresh and try again.';
    } elseif ($name === '' || $email === '' || $phone === '' || $password === '' || $confirm_password === '') {
        $error = 'All fields are required. Please fill in your complete details.';
    } elseif (strlen($name) < 2) {
        $error = 'Please enter your full legal name.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please provide a valid email address.';
    } elseif (strlen(preg_replace('/[^0-9]/', '', $phone)) < 8) {
        $error = 'Please enter a valid mobile / contact number.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match. Please re-check confirmation.';
    } else {
        $pdo = get_db_connection();
        if (!$pdo) {
            $error = 'Database connection error. Please try again later.';
        } else {
            // Check existing email
            $stmt = $pdo->prepare("SELECT `id` FROM `admin_users` WHERE `email` = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            if ($stmt->fetch()) {
                $error = 'An admin account with this email address already exists. Please sign in instead.';
            } else {
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $ins_stmt = $pdo->prepare("
                    INSERT INTO `admin_users` (`name`, `email`, `phone`, `password`, `role`, `status`)
                    VALUES (:name, :email, :phone, :password, 'Store Manager', 'active')
                ");
                $ins_stmt->execute([
                    ':name'     => $name,
                    ':email'    => $email,
                    ':phone'    => $phone,
                    ':password' => $hash
                ]);

                $user_id = (int)$pdo->lastInsertId();
                $fetch_stmt = $pdo->prepare("SELECT * FROM `admin_users` WHERE `id` = :id LIMIT 1");
                $fetch_stmt->execute([':id' => $user_id]);
                $new_admin = $fetch_stmt->fetch();

                if ($new_admin) {
                    login_admin($new_admin, true);
                    header('Location: index.php');
                    exit;
                } else {
                    header('Location: login.php?registered=1');
                    exit;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Create Account — RK Collections Admin</title>

    <link rel="icon" href="assets/images/logo/logo-rk.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/admin-auth.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="auth-page">

    <!-- ==============================================================
         LEFT CANVAS: FLUTED ARCHITECTURAL LUXURY HERO (57%)
         ============================================================== -->
    <aside class="auth-hero-pane" aria-label="Visual showcase">
        <div class="auth-hero-pane__bg" role="img" aria-label="Abstract fluted dark sculpture"></div>
        <div class="auth-hero-pane__overlay"></div>

        <!-- Top-Left Glassmorphic Badge -->
        <div class="auth-hero-badge">
            <div class="auth-hero-badge__icon">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <div class="auth-hero-badge__text">
                <span class="auth-hero-badge__title">Superadmin Portal</span>
                <span class="auth-hero-badge__subtitle">Manager Onboarding &amp; Provisioning</span>
            </div>
        </div>

        <!-- Bottom-Left Bespoke Geometric Wordmark -->
        <div class="auth-hero-brand">
            <div class="auth-hero-brand__emblem">
                <svg width="30" height="30" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="4,28 10,21 10,28" fill="#ffffff"/>
                    <polygon points="12,28 18,21 18,28" fill="#ffffff"/>
                    <polygon points="20,28 26,21 26,28" fill="#ffffff"/>
                    <polygon points="4,19 10,12 10,19" fill="#ffffff"/>
                    <polygon points="12,19 18,12 18,19" fill="#ffffff"/>
                    <polygon points="4,10 10,3 10,10" fill="#ffffff"/>
                </svg>
            </div>
            <span class="auth-hero-brand__name">RK Collections</span>
        </div>

        <!-- Bottom-Right Copyright -->
        <div class="auth-hero-copyright">
            &copy; RK Collections 2026
        </div>
    </aside>

    <!-- ==============================================================
         RIGHT CANVAS: EDITORIAL PURE WHITE WORKSPACE (43%)
         ============================================================== -->
    <main class="auth-form-pane">

        <!-- Top Header Identity -->
        <header class="auth-top-header">
            <div>
                <div class="auth-platform-title">RK Collections™</div>
                <div class="auth-platform-sub">Store Management Platform</div>
            </div>
        </header>

        <!-- Centered Core Form Section -->
        <section class="auth-main-wrap">
            <h1 class="auth-headline">Create your<br>admin account.</h1>

            <!-- Notifications / Status Messages -->
            <?php if ($error !== ''): ?>
                <div class="auth-notice auth-notice--error" role="alert">
                    <i class="bi bi-exclamation-circle auth-notice__icon" aria-hidden="true"></i>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <!-- Register Form -->
            <form class="auth-editorial-form" method="POST" action="register.php" autocomplete="on">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(get_csrf_token()); ?>">

                <!-- Full Name Field -->
                <div class="auth-form-group">
                    <label class="auth-form-label" for="regName">Full Name:</label>
                    <div class="auth-input-pill-wrap">
                        <input type="text" id="regName" name="name" class="auth-input-pill"
                               value="<?php echo htmlspecialchars($val_name); ?>"
                               placeholder="e.g. Radhika Sharma" required autofocus autocomplete="name">
                    </div>
                </div>

                <!-- Email Address Field -->
                <div class="auth-form-group">
                    <label class="auth-form-label" for="regEmail">Work Email Address:</label>
                    <div class="auth-input-pill-wrap">
                        <input type="email" id="regEmail" name="email" class="auth-input-pill"
                               value="<?php echo htmlspecialchars($val_email); ?>"
                               placeholder="radhika@domain.com" required autocomplete="email">
                    </div>
                </div>

                <!-- Phone Field -->
                <div class="auth-form-group">
                    <label class="auth-form-label" for="regPhone">Mobile Number:</label>
                    <div class="auth-input-pill-wrap">
                        <input type="tel" id="regPhone" name="phone" class="auth-input-pill"
                               value="<?php echo htmlspecialchars($val_phone); ?>"
                               placeholder="+91 98765 43210" required autocomplete="tel">
                    </div>
                </div>

                <!-- Password Field with Strength Indicator -->
                <div class="auth-form-group">
                    <label class="auth-form-label" for="regPassword">Password:</label>
                    <div class="auth-input-pill-wrap">
                        <input type="password" id="regPassword" name="password" class="auth-input-pill auth-input-pill--has-toggle"
                               placeholder="Minimum 6 characters" required autocomplete="new-password">
                        <button type="button" class="auth-pill-toggle-btn" data-toggle-password="regPassword" title="Show or hide password" aria-label="Show password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="auth-strength-meter">
                        <div class="auth-strength-meter__bars">
                            <span class="auth-strength-meter__bar"></span>
                            <span class="auth-strength-meter__bar"></span>
                            <span class="auth-strength-meter__bar"></span>
                            <span class="auth-strength-meter__bar"></span>
                        </div>
                        <span class="auth-strength-meter__label" id="regPasswordText">Minimum 6 characters</span>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="auth-form-group">
                    <label class="auth-form-label" for="regConfirmPassword">Confirm Password:</label>
                    <div class="auth-input-pill-wrap">
                        <input type="password" id="regConfirmPassword" name="confirm_password" class="auth-input-pill auth-input-pill--has-toggle"
                               placeholder="Re-type your password" required autocomplete="new-password">
                        <button type="button" class="auth-pill-toggle-btn" data-toggle-password="regConfirmPassword" title="Show or hide password" aria-label="Show password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Primary Action Row -->
                <div class="auth-actions-row">
                    <button type="submit" class="auth-btn-pill" id="regSubmitBtn">
                        <span class="spinner" aria-hidden="true"></span>
                        <span class="btn-text">Create Account</span>
                    </button>
                    <a href="login.php" class="auth-underlined-link">Already registered? Sign in</a>
                </div>

            </form>
        </section>

        <!-- Bottom Divider & Store Link -->
        <footer class="auth-bottom-footer">
            <a href="../index.php" class="auth-footer-domain">www.rkcollection.in</a>
            <span class="auth-footer-badge">
                <i class="bi bi-shield-lock-fill"></i> Enterprise Secure 256-Bit
            </span>
        </footer>

    </main>

</div>

<script src="assets/js/admin-auth.js?v=<?php echo time(); ?>"></script>
</body>
</html>
