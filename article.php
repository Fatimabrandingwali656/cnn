<?php
include 'config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id = $id";
$result = $conn->query($sql);
$article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article['title']; ?></title>
</head>
<body>
    <article>
        <h1><?php echo $article['title']; ?></h1>
        <img src="<?php echo $article['image_url']; ?>" alt="Article Image">
        <p><?php echo $article['content']; ?></p>
    </article>
</body>
</html>
