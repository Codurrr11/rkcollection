<?php
require_once __DIR__ . '/includes/auth.php';
logout_admin();
header('Location: login.php?logged_out=1');
exit;
