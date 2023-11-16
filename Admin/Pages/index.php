<?php
include 'pages.php';

$items = getItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item List</title>
</head>
<body>
    <h1>Item List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['description']; ?></td>
                <td><a href="details.php?id=<?php echo $item['id']; ?>">View Details</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="create.php">Create New Item</a>
</body>
</html>
