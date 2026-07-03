

<?php
// calculateTotal: Computes order total including 10% sales tax.

function calculateTotal($price, $quantity) {
    $subtotal     = $price * $quantity;  // Arithmetic: price × qty
    $taxAmount    = $subtotal * 0.10;    // 10% tax
    $totalAmount  = $subtotal + $taxAmount;
    return $totalAmount;
}

// Example usage
$itemPrice    = 49.99;
$itemQuantity = 3;
$orderTotal   = calculateTotal($itemPrice, $itemQuantity);
echo "Order Total (including tax): $ " . number_format($orderTotal, 2) . "<br>";


// formatProductName: Cleans and standardises product names.
function formatProductName($name) {
    $name = trim($name);              // Remove leading/trailing spaces
    $name = ucwords(strtolower($name)); // Capitalise each word
    if (strlen($name) > 50) {
        $name = substr($name, 0, 50); // Truncate to 50 chars
    }
    return $name;
}

echo formatProductName( "  wireless BLUETOOTH headphones  <br>" );
// Output: Wireless Bluetooth Headphones

// calculateDiscount: Applies a percentage discount to a price.

function calculateDiscount($price, $discountPercent) {
    $discountAmount = $price * ($discountPercent / 100);
    $finalPrice     = $price - $discountAmount;
    return $finalPrice;
}

$originalPrice  = 120.00;
$discountRate   = 25;
$discountedPrice = calculateDiscount($originalPrice, $discountRate);
echo "Final Price: $" . number_format($discountedPrice, 2) . "<br>";
// Output: Final Price: $90.00

// Product catalogue array — each element holds name and price.
$products = [
    ["name" => "Laptop",     "price" => 999.99],
    ["name" => "Mouse",      "price" => 25.99],
    ["name" => "Keyboard",   "price" => 79.99],
    ["name" => "Laptop",     "price" => 999.99],  // duplicate
    ["name" => "Monitor",    "price" => 349.99],
];

// Serialise rows to strings so array_unique can compare them
$products = array_map('unserialize',
    array_unique(array_map('serialize', $products)));

// Sort ascending by price using spaceship operator
usort($products, fn($a, $b) => $a["price"] <=> $b["price"]);

echo str_pad("Product", 20) . str_pad("Price", 10) . "<br>";
echo str_repeat("-", 30) . "<br>";
foreach ($products as $product) {
    echo str_pad($product["name"], 20)
        . "$" . number_format($product["price"], 2) . "<br>";
}

// Seasonal sale: 10% discount applied only to Electronics.
$inventory = [
    ["name" => "Smart TV",    "category" => "Electronics", "price" => 599.99],
    ["name" => "Sofa",        "category" => "Furniture",   "price" => 450.00],
    ["name" => "Headphones",  "category" => "Electronics", "price" => 149.99],
    ["name" => "Desk Lamp",   "category" => "Furniture",   "price" => 39.99],
];

array_walk($inventory, function (&$item) {
    if ($item["category"] === "Electronics") {
        $item["price"] *= 0.90; // Apply 10% discount
    }
});

foreach ($inventory as $item) {
    echo $item["name"] . " (" . $item["category"] . ")"
    . " - $" . number_format($item["price"], 2) . "<br>";
}

// Merging two supplier inventories into a unified catalogue.
$supplierA = ["USB-C Hub", "Wireless Mouse", "Mechanical Keyboard"];
$supplierB = ["Wireless Mouse", "Monitor Stand", "Webcam"];

$combinedInventory = array_merge($supplierA, $supplierB);

// Remove duplicate product names
$combinedInventory = array_values(array_unique($combinedInventory));

echo "Combined Inventory: " . PHP_EOL . "<br>";
foreach ($combinedInventory as $index => $product) {
    echo ($index + 1) . ". " . $product . "<br>";
}

// Format product names and descriptions for consistent display.
$productName = "##Ultra@Sound!!Speaker##";
$description = "Premium_quality_audio_with_SURROUND_SOUND_features";

// Sanitise: keep only letters, digits, spaces, hyphens
$cleanName = preg_replace("/[^a-zA-Z0-9\s\-]/", "", $productName);
$cleanName = trim($cleanName);

// Normalise description
$formattedDesc = strtolower($description);
$formattedDesc = str_replace("_", " ", $formattedDesc);

echo "Product Name : " . $cleanName ."<br>";
echo "Description  : " . $formattedDesc . "<br>";

// Keyword and readability analysis of a product description.

$description = "This is a high-quality leather wallet with RFID protection.";

$charCount  = strlen($description);
$wordCount  = str_word_count($description);
$keyword    = "leather";

echo "Character count : " . $charCount . "<br>";
echo "Word count      : " . $wordCount . "<br>";

if (stripos($description, $keyword) !== false) {
    echo "Keyword found" . "<br>";
} else {
    echo "Keyword not found" . " <br>";
}

// Review formatting: preview extraction, position search,

$review = "Great product! Fast delivery and excellent service.";

// Extract 20-character preview
$preview = substr($review, 0, 20) . "...";
echo "Preview : " . $preview . "<br>";

// Find position of 'excellent' (case-insensitive)
$searchWord = "excellent";
$position = stripos($review, $searchWord);
if ($position !== false) {
    echo "\"" . $searchWord . "\" found at position: " . $position . "<br>";
} else {
    echo "\"" . $searchWord . "\" not found." . "<br>";
}

// Append feedback message
$fullReview = $review . " Thank you for your feedback!";
echo "Full review : " . $fullReview . "<br>";

?>