<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unified Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-admin: #2c3e50;
            --primary-student: #4f46e5;
            --secondary: #6366f1;
            --success: #10b981;
            --danger: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #f8fafc;
        }

        /* Common Sidebar Styles */
        .sidebar {
            width: 250px;
            background: var(--primary-admin);
            color: white;
            padding: 20px;
            position: relative;
            transition: 0.3s;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            padding: 10px;
            border-bottom: 2px solid rgba(255,255,255,0.1);
        }

        /* Navigation Styles */
        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin: 8px 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            text-decoration: none;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            padding: 30px;
            background: #f8fafc;
        }

        /* Role-based Styling */
        .student-sidebar {
            background: var(--primary-student);
        }

        /* Dashboard Header */
        .dashboard-header {
            margin-bottom: 2rem;
        }

        .dashboard-header h1 {
            color: var(--primary-admin);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .student-header h1 {
            color: var(--primary-student);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 2rem;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-admin);
        }

        .student-stat .stat-value {
            color: var(--primary-student);
        }

        /* Registration Form */
        .registration-form {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        /* Notification Cards */
        .notification-card {
            background: white;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        /* Utility Classes */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Login Screen -->
    <div id="loginScreen" class="main-content">
        <div class="registration-form">
            <h2>Unified Login</h2>
            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="form-group">
                    <label>Select Role:</label>
                    <select id="userRole" class="form-control" required>
                        <option value="admin">Administrator</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <!-- Admin Dashboard -->
    <div id="adminDashboard" class="hidden">
        <div class="sidebar">
            <div class="logo">Admin Portal</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell"></i>
                        Send Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-history"></i>
                        Notification History
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content">
            <div class="dashboard-header">
                <h1>Admin Dashboard</h1>
                <p>Manage system notifications and users</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">1,234</div>
                    <p>Total Notifications Sent</p>
                </div>
                <div class="stat-card">
                    <div class="stat-value">98%</div>
                    <p>Delivery Success Rate</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Dashboard -->
    <div id="studentDashboard" class="hidden">
        <div class="sidebar student-sidebar">
            <div class="logo">Student Portal</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell"></i>
                        My Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-history"></i>
                        Notification History
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content">
            <div class="dashboard-header student-header">
                <h1>Student Dashboard</h1>
                <p>View your notifications and updates</p>
            </div>

            <!-- Registration Form (First-time Login) -->
            <div id="registrationForm" class="hidden">
                <div class="registration-form">
                    <h2>Complete Registration</h2>
                    <form onsubmit="handleRegistration(event)">
                        <!-- Registration form fields -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Student Content -->
            <div id="studentContent">
                <div class="stats-grid">
                    <div class="stat-card student-stat">
                        <div class="stat-value">12</div>
                        <p>New Notifications</p>
                    </div>
                </div>

                <div class="notification-card">
                    <h3>Latest Notification</h3>
                    <p>Your class schedule has been updated</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleLogin(e) {
            e.preventDefault();
            const role = document.getElementById('userRole').value;
            document.getElementById('loginScreen').classList.add('hidden');
            
            if(role === 'admin') {
                document.getElementById('adminDashboard').classList.remove('hidden');
            } else {
                const isFirstLogin = true; // Add your first login check logic
                if(isFirstLogin) {
                    document.getElementById('registrationForm').classList.remove('hidden');
                } else {
                    document.getElementById('studentContent').classList.remove('hidden');
                }
                document.getElementById('studentDashboard').classList.remove('hidden');
            }
        }

        function handleRegistration(e) {
            e.preventDefault();
            document.getElementById('registrationForm').classList.add('hidden');
            document.getElementById('studentContent').classList.remove('hidden');
        }

        // Add logout functionality
        function logout() {
            document.querySelectorAll('.dashboard').forEach(d => d.classList.add('hidden'));
            document.getElementById('loginScreen').classList.remove('hidden');
        }
    </script>
</body>
</html>