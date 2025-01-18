<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit;
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO articles (title, content, image_url) VALUES ('$title', '$content', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

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

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            background-color: #c30000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #a10000;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel - Add New Article</h1>
    </header>
    <div class="container">
        <h2>Add Article</h2>
        <form method="post">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
            
            <label for="content">Content:</label>
            <textarea name="content" id="content" required></textarea>
            
            <label for="image_url">Image URL:</label>
            <input type="text" name="image_url" id="image_url" required>
            
            <button type="submit">Add Article</button>
        </form>
    </div>
</body>
</html>
