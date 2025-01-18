<?php
include 'config.php';

// Fetch articles from the database
$sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 10";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Homepage</title>
    <style>
        /* Reset and Body Styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header Styling */
        header {
            background-color: #c30000;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        /* Navigation Bar */
        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #575757;
        }

        /* Featured Section */
        .featured {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f1f1f1;
            padding: 20px;
            margin: 20px 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .featured img {
            max-width: 300px;
            margin-right: 20px;
            border-radius: 8px;
        }

        .featured .content {
            max-width: 600px;
        }

        .featured h2 {
            margin: 0 0 10px 0;
        }

        .featured p {
            margin: 0 0 15px 0;
        }

        .featured a {
            text-decoration: none;
            color: #c30000;
            font-weight: bold;
        }

        .featured a:hover {
            text-decoration: underline;
        }

        /* News Grid */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px;
        }

        .news-item {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .news-item:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .news-item img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .news-item h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
        }

        .news-item p {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #666;
        }

        .news-item a {
            text-decoration: none;
            color: #c30000;
            font-weight: bold;
        }

        .news-item a:hover {
            text-decoration: underline;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>My News Website</h1>
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="#">Politics</a>
        <a href="#">Sports</a>
        <a href="#">Tech</a>
        <a href="#">Entertainment</a>
    </nav>

    <!-- Featured Article -->
    <div class="featured">
        <img src="featured-image.jpg" alt="Featured">
        <div class="content">
            <h2>Featured Article Title</h2>
            <p>Here is a brief description of the featured article. It's engaging, informative, and interesting!</p>
            <a href="#">Read More</a>
        </div>
    </div>

    <!-- News Grid -->
    <div class="news-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="news-item">
                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Article Image">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars(substr($row['content'], 0, 100)) . '...'; ?></p>
                    <a href="article.php?id=<?php echo $row['id']; ?>">Read More</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No articles found.</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 My News Website. All rights reserved.</p>
    </footer>
</body>
</html>
