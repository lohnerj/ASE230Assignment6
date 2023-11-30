<?php

class JsonCrudCreate
{
    public static function create($filename, $data)
    {
        $jsonData = self::readJsonFile($filename);
        $jsonData[] = $data;
        self::writeJsonFile($filename, $jsonData);
    }

    protected static function readJsonFile($filename)
    {
        $content = file_get_contents($filename);
        return json_decode($content, true) ?: [];
    }

    protected static function writeJsonFile($filename, $data)
    {
        file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    }
}

class JsonCrudRead extends JsonCrudCreate
{
    public static function read($filename)
    {
        return self::readJsonFile($filename);
    }
}

class JsonCrudUpdate extends JsonCrudCreate
{
    public static function update($filename, $index, $newData)
    {
        $jsonData = self::readJsonFile($filename);

        if (isset($jsonData[$index])) {
            $jsonData[$index] = $newData;
            self::writeJsonFile($filename, $jsonData);
        } else {
            throw new Exception("Index $index does not exist.");
        }
    }
}

class JsonCrudDelete extends JsonCrudCreate
{
    public static function delete($filename, $index)
    {
        $jsonData = self::readJsonFile($filename);

        if (isset($jsonData[$index])) {
            array_splice($jsonData, $index, 1);
            self::writeJsonFile($filename, $jsonData);
        } else {
            throw new Exception("Index $index does not exist.");
        }
    }
}

// Example Usage:

// Create
JsonCrudCreate::create('data.json', ['name' => 'John', 'age' => 25]);

// Read
$data = JsonCrudRead::read('data.json');
var_dump($data);

// Update
JsonCrudUpdate::update('data.json', 0, ['name' => 'Jane', 'age' => 30]);

// Delete
JsonCrudDelete::delete('data.json', 0);

?>
