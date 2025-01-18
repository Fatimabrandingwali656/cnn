<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit;
}

include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id = $id";
$result = $conn->query($sql);
$article = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];

    $update_sql = "UPDATE articles SET title = '$title', content = '$content', image_url = '$image_url' WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
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
    <title>Edit Article</title>
</head>
<body>
    <h1>Edit Article</h1>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $article['title']; ?>" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" id="content" required><?php echo $article['content']; ?></textarea>
        <br>
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" id="image_url" value="<?php echo $article['image_url']; ?>" required>
        <br>
        <button type="submit">Update Article</button>
    </form>
</body>
</html>
