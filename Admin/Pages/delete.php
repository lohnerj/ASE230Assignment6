<?php
include 'pages.php';

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];
    $item = getItemById($itemId);
    if ($item) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            deleteItem($itemId);
            header('Location: index.php');
            exit;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Item</title>
</head>
<body>
    <h1>Delete Item</h1>
    <p>Are you sure you want to delete this item?</p>
    <p>ID: <?php echo $item['id']; ?></p>
    <p>Name: <?php echo $item['name']; ?></p>
    <p>Description: <?php echo $item['description']; ?></p>
    <form method="post">
        <button type="submit">Confirm Delete</button>
    </form>
    <br>
    <a href="details.php?id=<?php echo $itemId; ?>">Back to Details</a>
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
