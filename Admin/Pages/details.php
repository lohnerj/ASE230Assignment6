<?php
include 'pages.php';

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];
    $item = getItemById($itemId);
    if ($item) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item Details</title>
</head>
<body>
    <h1>Item Details</h1>
    <p>ID: <?php echo $item['id']; ?></p>
    <p>Name: <?php echo $item['name']; ?></p>
    <p>Description: <?php echo $item['description']; ?></p>
    <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $item['id']; ?>">Delete</a>
    <br>
    <a href="index.php">Back to List</a>
</body>
</html>

<?php
    } else {
        echo "Item not found.";
    }
} else {
    echo "Invalid request.";
}
?>
