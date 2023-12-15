<?php

class ManagePage{
	
    private $dbFile = 'db.json';

    public function getItems() {
        $data = file_get_contents($this->dbFile);
        return json_decode($data, true)['items'];
    }

    public function getItemById($id) {
        $items = $this->getItems();
        foreach ($items as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }

    public function saveItems($items) {
        $data = json_encode(['items' => $items], JSON_PRETTY_PRINT);
        file_put_contents($this->dbFile, $data);
    }

    public function addItem($item) {
        $items = $this->getItems();
        $items[] = $item;
        $this->saveItems($items);
    }

    public function updateItem($id, $updatedItem) {
        $items = $this->getItems();
        foreach ($items as &$item) {
            if ($item['id'] == $id) {
                $item = $updatedItem;
                break;
            }
        }
        $this->saveItems($items);
    }

    public function deleteItem($id) {
        $items = $this->getItems();
        foreach ($items as $key => $item) {
            if ($item['id'] == $id) {
                unset($items[$key]);
                break;
            }
        }
        $this->saveItems(array_values($items));
    }
}
?>
