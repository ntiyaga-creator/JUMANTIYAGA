<?php
require_once 'php/config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test database connection
try {
    $pdo->query("SELECT 1");
    echo "✅ Database connection successful!<br>";
} catch (PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}

// Test admin credentials
$username = 'admin';
$password = 'admin123';

// Fetch user from database
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

echo "<h3>Debug Output:</h3>";
echo "Username queried: " . $username . "<br>";

if (!$user) {
    die("❌ User not found in database.");
} else {
    echo "✅ User found: " . $user['username'] . "<br>";
    echo "🔑 Stored password hash: " . $user['password'] . "<br>";
}

// Verify password
if (password_verify($password, $user['password'])) {
    echo "🎉 Password is valid!";
} else {
    echo "❌ Invalid credentials!";
}