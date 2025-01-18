<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Reset and Body Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Header Styling */
        header {
            background-color: #c30000;
            color: white;
            padding: 15px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Container Styling */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        /* Admin Navigation Bar */
        .admin-nav {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .admin-nav a {
            text-decoration: none;
            color: white;
            background-color: #c30000;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .admin-nav a:hover {
            background-color: #a10000;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        /* Add Article Button */
        .add-article-btn {
            display: inline-block;
            text-decoration: none;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .add-article-btn:hover {
            background-color: #218838;
        }

        /* Footer Styling */
        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <div class="container">
        <div class="admin-nav">
            <a href="add_article.php">Add New Article</a>
            <a href="logout.php">Logout</a>
        </div>
        <h2>Manage Articles</h2>
        <a href="add_article.php" class="add-article-btn">+ Add Article</a>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Table Row -->
                <tr>
                    <td>Sample Article Title</td>
                    <td>Sample content goes here...</td>
                    <td><img src="sample-image.jpg" alt="Article Image" width="80"></td>
                    <td>
                        <a href="edit_article.php?id=1" style="color: blue; text-decoration: none;">Edit</a> |
                        <a href="delete_article.php?id=1" style="color: red; text-decoration: none;">Delete</a>
                    </td>
                </tr>
                <!-- More rows should be dynamically generated here -->
            </tbody>
        </table>
    </div>
    <footer>
        <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
    </footer>
</body>
</html>
