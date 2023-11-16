<!DOCTYPE html>
<html>
    <head>
        <title>Product Detail</title>
    </head>
    <body>
        <div>
            <?php 
            if (isset($_GET['product'])) {
                $product = $_GET['product'];
                $product_data = [
                    'GreenRoof' => "A modular green roofing system that utilizes smart sensors to regulate water, sunlight, and nutrients, allowing urban spaces to contribute positively to the environment.",
                    'Smart Irrigation' => "The system detects soil moisture levels and provides optimal water quantities, reducing wastage and ensuring plant health.",
                    'Pollinator Patches' => "Specific sections within the GreenRoof™ are designed to attract and support urban pollinators like bees and butterflies.",
                ];
                if (isset($product_data[$product])){
                    $product_info = $product_data[$product];
                    echo "<h1>$product</h1>";
                    echo "<p>Description: " . $product_info['description'] . "</p>";

                    if ($product_info['created by user']) {
                        echo "<button onclick=\"window.location.href='edit.php?product=$product'\">Edit</button>";
                        echo "<button onclick=\"window.location.href='delete.php?product=$product'\">Delete</button>";
                    }
                } else {
                    echo "<p>Product not found</p>";
                }
            } else {
                echo "<p>Product not specified</p>";
            }
            ?>
        </div>
    </body>
</html>
