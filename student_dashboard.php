<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'student') {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .student-dashboard {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }
        .student-notifications {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="student-dashboard">
        <a href="php/logout.php" class="logout-btn">Logout</a>
        <h1>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <h2>Student Portal</h2>
        
        <div class="student-notifications">
            <h3>Your Notifications</h3>
            <div class="notification-list">
                <!-- PHP code to display student-specific notifications -->
            </div>
        </div>

        <div class="exam-results">
            <h3>Exam Results</h3>
            <!-- PHP code to display student results -->
        </div>
    </div>
</body>
</html>