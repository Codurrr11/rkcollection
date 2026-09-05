<?php
/**
 * RK ADMIN — DATABASE CONNECTION & AUTO-INITIALIZATION
 * 
 * Connects via PDO to MySQL, automatically creating the database and
 * admin_users table if they do not already exist, with a default admin seed.
 */

if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_NAME')) define('DB_NAME', 'rkcollection_db');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASS')) define('DB_PASS', '');

function get_db_connection() {
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    try {
        // 1. Connect without db to ensure database exists
        $init_pdo = new PDO(
            'mysql:host=' . DB_HOST . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
        $init_pdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        // 2. Connect to the specific database
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );

        // 3. Ensure admin_users table exists
        $table_sql = "
            CREATE TABLE IF NOT EXISTS `admin_users` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(100) NOT NULL,
                `email` VARCHAR(150) NOT NULL UNIQUE,
                `phone` VARCHAR(25) NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                `role` VARCHAR(50) NOT NULL DEFAULT 'Store Manager',
                `avatar` VARCHAR(255) DEFAULT NULL,
                `status` ENUM('active', 'inactive', 'suspended') NOT NULL DEFAULT 'active',
                `remember_token` VARCHAR(100) DEFAULT NULL,
                `last_login` DATETIME DEFAULT NULL,
                `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                INDEX (`email`),
                INDEX (`status`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ";
        $pdo->exec($table_sql);

        // 4. Seed default admin if table is empty
        $stmt = $pdo->query("SELECT COUNT(*) FROM `admin_users`");
        if ((int)$stmt->fetchColumn() === 0) {
            $seed_stmt = $pdo->prepare("
                INSERT INTO `admin_users` (`name`, `email`, `phone`, `password`, `role`, `status`)
                VALUES (:name, :email, :phone, :password, :role, 'active')
            ");
            $seed_stmt->execute([
                ':name'     => 'Radhika Sharma',
                ':email'    => 'admin@rkcollection.com',
                ':phone'    => '+91 98765 43210',
                ':password' => password_hash('admin123', PASSWORD_BCRYPT),
                ':role'     => 'Store Manager'
            ]);
        }

        return $pdo;
    } catch (PDOException $e) {
        error_log("Database connection error: " . $e->getMessage());
        return null;
    }
}
