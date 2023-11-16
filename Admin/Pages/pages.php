<?php

function getItems() {
    $data = file_get_contents('db.json');
    return json_decode($data, true)['items'];
}

function getItemById($id) {
    $items = getItems();
    foreach ($items as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null;
}

function saveItems($items) {
    $data = json_encode(['items' => $items], JSON_PRETTY_PRINT);
    file_put_contents('db.json', $data);
}

function addItem($item) {
    $items = getItems();
    $items[] = $item;
    saveItems($items);
}

function updateItem($id, $updatedItem) {
    $items = getItems();
    foreach ($items as &$item) {
        if ($item['id'] == $id) {
            $item = $updatedItem;
            break;
        }
    }
    saveItems($items);
}

function deleteItem($id) {
    $items = getItems();
    foreach ($items as $key => $item) {
        if ($item['id'] == $id) {
            unset($items[$key]);
            break;
        }
    }
    saveItems(array_values($items));
}

?>
