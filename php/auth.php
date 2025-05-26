<?php
// Enable error reporting (add at the VERY TOP)
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once 'config.php';

// Validate POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die(json_encode(['success' => false, 'message' => 'Invalid request method']));
}

// Get inputs
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// Validate inputs
if (empty($username) || empty($password)) {
    http_response_code(400);
    die(json_encode(['success' => false, 'message' => 'Username/password required']));
}

try {
    // Fetch user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verify user and password
    if (!$user || !password_verify($password, $user['password'])) {
        die(json_encode(['success' => false, 'message' => 'Invalid credentials']));
    }

    // Set session data
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // ✅ Return valid JSON
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'redirect' => 'admin_dashboard.php'
    ]);
    exit;

} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    die(json_encode(['success' => false, 'message' => 'Database error']));
}