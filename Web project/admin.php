<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .nav-item {
            margin-bottom: 10px;
        }
        .nav-link {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .nav-link:hover {
            background-color: #555;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <div class="nav-item">
            <a href="#" class="nav-link">People Logged In</a>
        </div>
        <div class="nav-item">
            <a href="#" class="nav-link">Employees Details</a>
        </div>
        <div class="nav-item">
            <a href="#" class="nav-link">Additional Section</a>
        </div>
        <!-- Add more sections here as needed -->
    </div>
    <div class="main-content">
        <h1>Welcome to the Admin Control Page</h1>
        <p>Main content area. You can manage various aspects of your system here.</p>
        <button class="button">Manage Users</button>
        <button class="button">Manage Posts</button>
        <button class="button">Manage Settings</button>
    </div>
</div>

</body>
</html>
