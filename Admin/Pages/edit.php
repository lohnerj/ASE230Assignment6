<?php
include 'pages.php';

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];
    $item = getItemById($itemId);
    if ($item) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedItem = [
                'id' => $item['id'],
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ];
            updateItem($itemId, $updatedItem);
            header('Location: detail.php?id=' . $itemId);
            exit;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $item['name']; ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $item['description']; ?></textarea>
        <br>
        <button type="submit">Save Changes</button>
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
