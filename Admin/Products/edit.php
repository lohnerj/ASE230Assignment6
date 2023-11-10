<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title>
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

            if (isset($product_data[$product])) {
                $product_info = $product_data[$product];
                $lines = explode("\n", $product_info);

                echo "<h1>Edit Product: $product</h1>";
                echo "<form action=\"save_changes.php\" method=\"post\">";
                echo "<textarea name=\"new_info\" rows=\"10\" cols=\"50\">";
                foreach ($lines as $line) {
                    echo $line . "\n";
                }

                echo "<textarea>";
                echo "<input type=\"hidden\" name=\"product\" value=\"$product\">";
                echo "<input type=\"submit\" value=\"Save Changes\">";
                echo "</form>";
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