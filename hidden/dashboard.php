<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (!isset($_COOKIE['auth'])) die("Access denied!");

$token = $_COOKIE['auth'];
$key = "secret123"; // Weak key (exists in rockyou.txt)

try {
    $decoded = JWT::decode($token, new Key($key, 'HS256'));
    $username = htmlspecialchars($decoded->username);
    $role = htmlspecialchars($decoded->role);
} catch (Exception $e) {
    die("Invalid token!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>🚀 Dashboard - Space Corp</title>
    <style>
        body {
            background: #0f0c29;
            color: white;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: linear-gradient(45deg, #1a1a2e, #16213e);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 191, 255, 0.3);
        }
        h2 {
            color: #00bfff;
            margin-bottom: 1rem;
        }
        .badge {
            background: <?= ($role === "admin") ? "#4CAF50" : "#ff5722" ?>;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.9em;
        }
        .admin-link {
            color: #00bfff;
            text-decoration: none;
            font-weight: bold;
        }
        .admin-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>👋 Hello, <?= $username ?>!</h2>
        <p>Your Clearance Level: <span class="badge"><?= $role ?></span></p>

        <?php if ($role === "admin"): ?>
            <p>🎉 You have admin access! <a href="admin.php" class="admin-link">Enter Command Center</a></p>
        <?php else: ?>
            <p>❌ <strong>No admin.php for you!</strong></p>
        <?php endif; ?>
    </div>
</body>
</html>
