<?php
/**
 * RK ADMIN — AUTHENTICATION & SESSION MANAGEMENT
 * 
 * Provides session handling, CSRF generation/validation, password verification,
 * cookie-based remember me, and route protection.
 */

if (session_status() === PHP_SESSION_NONE) {
    // Secure session settings
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    session_start();
}

require_once __DIR__ . '/db.php';

function get_csrf_token() {
    if (empty($_SESSION['admin_csrf_token'])) {
        $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['admin_csrf_token'];
}

function verify_csrf_token($token) {
    if (empty($_SESSION['admin_csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['admin_csrf_token'], (string)$token);
}

function login_admin($admin, $remember = false) {
    session_regenerate_id(true);
    $_SESSION['admin_logged_in']  = true;
    $_SESSION['admin_user_id']    = (int)$admin['id'];
    $_SESSION['admin_user_name']  = $admin['name'];
    $_SESSION['admin_user_email'] = $admin['email'];
    $_SESSION['admin_user_role']  = $admin['role'];
    $_SESSION['admin_user_phone'] = $admin['phone'];

    $pdo = get_db_connection();
    if ($pdo) {
        $stmt = $pdo->prepare("UPDATE admin_users SET last_login = NOW() WHERE id = :id");
        $stmt->execute([':id' => $admin['id']]);
    }

    if ($remember) {
        $raw_token = bin2hex(random_bytes(32));
        setcookie('rk_admin_remember', $admin['id'] . ':' . $raw_token, time() + (86400 * 30), '/', '', false, true);
        if ($pdo) {
            $stmt = $pdo->prepare("UPDATE admin_users SET remember_token = :token WHERE id = :id");
            $stmt->execute([':token' => hash('sha256', $raw_token), ':id' => $admin['id']]);
        }
    }
}

function is_admin_logged_in() {
    if (!empty($_SESSION['admin_logged_in']) && !empty($_SESSION['admin_user_id'])) {
        return true;
    }

    // Auto-login via remember me cookie
    if (!empty($_COOKIE['rk_admin_remember'])) {
        $parts = explode(':', $_COOKIE['rk_admin_remember']);
        if (count($parts) === 2) {
            $user_id = (int)$parts[0];
            $raw_token = $parts[1];
            $pdo = get_db_connection();
            if ($pdo) {
                $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id = :id AND status = 'active' LIMIT 1");
                $stmt->execute([':id' => $user_id]);
                $user = $stmt->fetch();
                if ($user && !empty($user['remember_token']) && hash_equals($user['remember_token'], hash('sha256', $raw_token))) {
                    login_admin($user, false);
                    return true;
                }
            }
        }
    }

    return false;
}

function get_current_admin() {
    if (!is_admin_logged_in()) {
        return null;
    }
    return [
        'id'    => $_SESSION['admin_user_id'] ?? 1,
        'name'  => $_SESSION['admin_user_name'] ?? 'Radhika Sharma',
        'email' => $_SESSION['admin_user_email'] ?? 'admin@rkcollection.com',
        'role'  => $_SESSION['admin_user_role'] ?? 'Store Manager',
        'phone' => $_SESSION['admin_user_phone'] ?? '+91 98765 43210'
    ];
}

function logout_admin() {
    if (isset($_COOKIE['rk_admin_remember'])) {
        setcookie('rk_admin_remember', '', time() - 3600, '/', '', false, true);
    }
    if (!empty($_SESSION['admin_user_id'])) {
        $pdo = get_db_connection();
        if ($pdo) {
            $stmt = $pdo->prepare("UPDATE admin_users SET remember_token = NULL WHERE id = :id");
            $stmt->execute([':id' => $_SESSION['admin_user_id']]);
        }
    }
    $_SESSION = [];
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_destroy();
    }
}

function require_admin_login() {
    if (!is_admin_logged_in()) {
        header('Location: login.php');
        exit;
    }
}
