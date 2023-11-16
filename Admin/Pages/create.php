<?php
include 'pages.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newItem = [
        'id' => count(getItems()) + 1, // Auto-increment ID
        'name' => $_POST['name'],
        'description' => $_POST['description'],
    ];
    addItem($newItem);
    header('Location: edit.php?id=' . $newItem['id']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Item</title>
</head>
<body>
    <h1>Create New Item</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>
        <button type="submit">Create</button>
    </form>
    <br>
    <a href="index.php">Back to List</a>
</body>
</html>
