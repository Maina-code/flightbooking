<?php
session_start();
if (isset($_SESSION['full_name'])) {
    $admin = isset($_SESSION['full_name']) ? $_SESSION['admin'] : 'newadmin';

//     header("location: admin_dashboard.php");
//     exit();
// } else {
//     header ("location:login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        nav {
            background-color: #4CAF50;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dashboard-content {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-content a {
            display: block;
            margin-bottom: 10px;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to the Admin Dashboard</h1>
    </header>

    <nav>
        <a href="#">Dashboard</a>
        <a href="flightmanagement.php">Flight Management</a>
        <a href="usermanagement.php">User Management</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="dashboard-content">
       
       
        
        <h3>Quick Links</h3>
        <a href="flightmanagement.php">Flight Management</a>
        <a href="usermanagement.php">User Management</a>
    </div>

</body>
</html>