<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            background-color: #f5f5f5;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            padding: 20px;
            color: white;
            position: relative;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-menu li {
            margin: 8px 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            text-decoration: none;
            padding: 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: #34495e;
            transform: translateX(5px);
        }

        .nav-link i {
            width: 25px;
            text-align: center;
        }

        .send-btn {
            margin-left: auto;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .send-btn:hover {
            background-color: #2980b9;
        }

        .badge {
            background-color: #e74c3c;
            color: white;
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 0.8em;
            margin-left: auto;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 30px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .stat-card h2 {
            font-size: 36px;
            color: #2c3e50;
            margin: 10px 0;
        }

        .stat-card p {
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .more-info {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        /* Logout Styles */
        .logout-container {
            position: absolute;
            bottom: 30px;
            width: calc(100% - 40px);
        }

        .logout-btn {
            width: 100%;
            background-color: teal;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .logout-btn:hover {
            background-color:  #e74c3c;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">NOTY SYSTEM</div>
        <ul class="nav-menu">
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-plus-circle"></i>
                    Create New Notification
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fas fa-history"></i>
                    Sent Notification History
                    <span class="badge">24 New</span>
                </a>
            </li>
        </ul>
        
        <div class="logout-container">
            <button class="logout-btn" onclick="confirmLogout()">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </div>
    </div>

    <div class="main-content">
        <h1>Welcome Admin</h1>
        <h2>University Notification System</h2>

        <div class="stats-container">
            <div class="stat-card">
                <h2>12000</h2>
                <p>Students</p>
                <a href="#" class="more-info">More info</a>
            </div>
            <div class="stat-card">
                <h2>50</h2>
                <p>Notifications sent</p>
                <a href="#" class="more-info">More info</a>
            </div>
            <div class="stat-card">
                <h2>44</h2>
                <p>Successful sent</p>
                <a href="#" class="more-info">More info</a>
            </div>
            <div class="stat-card">
                <h2>6</h2>
                <p>Failed</p>
                <a href="#" class="more-info">More info</a>
            </div>
        </div>
    </div>

    <script>
        function confirmLogout() {
            if(confirm('Are you sure you want to logout?')) {
                window.location.href = 'index.html';
            }
        }
    </script>
</body>
</html>