<?php
/**
 * RK ADMIN — ARCHITECTURAL EDITORIAL AUTHENTICATION
 * 
 * Minimalist luxury split-screen portal matching the high-fashion
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

if (isset($_GET['logged_out'])) {
    $success = 'You have safely signed out of your session.';
} elseif (isset($_GET['registered'])) {
    $success = 'Admin account registered successfully! Please sign in.';
}

// Process Login POST Request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf_token = $_POST['csrf_token'] ?? '';
    $email      = trim($_POST['email'] ?? '');
    $password   = $_POST['password'] ?? '';
    $remember   = isset($_POST['remember']);

    if (!verify_csrf_token($csrf_token)) {
        $error = 'Security session expired. Please refresh and try again.';
    } elseif ($email === '' || $password === '') {
        $error = 'Please enter both your email address and password.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $pdo = get_db_connection();
        if (!$pdo) {
            $error = 'Database connection error. Please try again later.';
        } else {
            $stmt = $pdo->prepare("SELECT * FROM `admin_users` WHERE `email` = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            $admin = $stmt->fetch();

            if ($admin && password_verify($password, $admin['password'])) {
                if ($admin['status'] !== 'active') {
                    $error = 'Your admin account is inactive or pending approval. Contact the store administrator.';
                } else {
                    login_admin($admin, true);
                    header('Location: index.php');
                    exit;
                }
            } else {
                $error = 'Invalid credentials. Please verify your email and password.';
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
    <title>Login — RK Collections Admin</title>

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
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
            </div>
            <div class="auth-hero-badge__text">
                <span class="auth-hero-badge__title">Superadmin Login</span>
                <span class="auth-hero-badge__subtitle">Store Operations, Catalog &amp; Inventory</span>
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
            <h1 class="auth-headline">Welcome, login to<br>your account.</h1>

            <!-- Notifications / Status Messages -->
            <?php if ($error !== ''): ?>
                <div class="auth-notice auth-notice--error" role="alert">
                    <i class="bi bi-exclamation-circle auth-notice__icon" aria-hidden="true"></i>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($success !== ''): ?>
                <div class="auth-notice auth-notice--success" role="alert">
                    <i class="bi bi-check-circle auth-notice__icon" aria-hidden="true"></i>
                    <span><?php echo htmlspecialchars($success); ?></span>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form class="auth-editorial-form" method="POST" action="login.php" autocomplete="on">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(get_csrf_token()); ?>">
                <input type="hidden" name="remember" value="1">

                <!-- Username or Email Field -->
                <div class="auth-form-group">
                    <label class="auth-form-label" for="loginEmail">Username or Email Address:</label>
                    <div class="auth-input-pill-wrap">
                        <input type="email" id="loginEmail" name="email" class="auth-input-pill"
                               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'admin@rkcollection.com'; ?>"
                               placeholder="name@domain.com" required autofocus autocomplete="username">
                    </div>
                </div>

                <!-- Password Field -->
                <div class="auth-form-group">
                    <label class="auth-form-label" for="loginPassword">Password:</label>
                    <div class="auth-input-pill-wrap">
                        <input type="password" id="loginPassword" name="password" class="auth-input-pill auth-input-pill--has-toggle"
                               value="<?php echo isset($_POST['password']) ? '' : 'admin123'; ?>"
                               placeholder="Your password" required autocomplete="current-password">
                        <button type="button" class="auth-pill-toggle-btn" data-toggle-password="loginPassword" title="Show or hide password" aria-label="Show password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Primary Action Row -->
                <div class="auth-actions-row">
                    <button type="submit" class="auth-btn-pill" id="loginSubmitBtn">
                        <span class="spinner" aria-hidden="true"></span>
                        <span class="btn-text">Sign In Here</span>
                    </button>
                    <a href="#" class="auth-underlined-link" id="lostPasswordLink">Lost your password?</a>
                </div>

                <!-- Secondary Nav Row -->
                <div class="auth-secondary-bar">
                    <span>New administrator? <a href="register.php" class="auth-secondary-link">Create account</a></span>
                    <button type="button" class="auth-demo-pill" id="authDemoFill" title="Auto-fill default admin credentials">
                        <i class="bi bi-lightning-fill"></i> Fill Demo
                    </button>
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
