<?php

// 1. REUSABLE FUNCTIONS


// a. Calculate total with 10% tax
function calculateTotal($price, $quantity) {
    $subtotal = $price * $quantity;
    $tax = $subtotal * 0.10;
    return $subtotal + $tax;
}

// b. Format product name
function formatProductName($name) {
    $name = trim($name); // remove extra spaces
    $name = ucwords(strtolower($name)); // capitalize first letter of each word
    return substr($name, 0, 50); // limit to 50 characters
}

// c. Calculate discount
function calculateDiscount($price, $discountPercent) {
    return $price - ($price * ($discountPercent / 100));
}



// 2. ARRAY MANIPULATION


// a. Product list
$products = [
    ["name" => "Laptop", "price" => 1200],
    ["name" => "Phone", "price" => 800],
    ["name" => "Laptop", "price" => 1200], // duplicate
    ["name" => "Headphones", "price" => 150]
];

// Remove duplicates
$products = array_unique($products, SORT_REGULAR);

// Sort by price ascending
usort($products, function($a, $b) {
    return $a['price'] <=> $b['price'];
});

// Display products
echo "Product List:\n";
foreach ($products as $p) {
    echo $p['name'] . " - $" . $p['price'] . "\n";
}


// b. Seasonal discount on Electronics
$inventory = [
    ["name" => "TV", "category" => "Electronics", "price" => 1000],
    ["name" => "Chair", "category" => "Furniture", "price" => 200],
    ["name" => "Laptop", "category" => "Electronics", "price" => 1500]
];

foreach ($inventory as &$item) {
    if ($item['category'] == "Electronics") {
        $item['price'] *= 0.90; // 10% discount
    }
}

echo "\nUpdated Inventory:\n";
print_r($inventory);


// c. Merge supplier inventories
$supplier1 = [
    ["name" => "Mouse"],
    ["name" => "Keyboard"]
];

$supplier2 = [
    ["name" => "Mouse"],
    ["name" => "Monitor"]
];

$merged = array_merge($supplier1, $supplier2);
$merged = array_unique($merged, SORT_REGULAR);

echo "\nMerged Inventory:\n";
print_r($merged);


// ===============================
// 3. STRING MANIPULATION
// ===============================

// a. Format descriptions
$description = "High_QUALITY_LEATHER_wallet";
$description = strtolower(str_replace("_", " ", $description));

echo "\nFormatted Description: " . $description . "\n";


// b. Analyze product description
$productDesc = "This is a high-quality leather wallet with RFID protection.";

echo "\nCharacter Count: " . strlen($productDesc);
echo "\nWord Count: " . str_word_count($productDesc);

if (stripos($productDesc, "leather") !== false) {
    echo "\nKeyword found\n";
} else {
    echo "\nKeyword not found\n";
}


// c. Customer review processing
$review = "Great product! Fast delivery and excellent service.";

echo "\nPreview: " . substr($review, 0, 20) . "...\n";

$pos = strpos(strtolower($review), "excellent");
if ($pos !== false) {
    echo "Keyword 'excellent' found at position: " . $pos . "\n";
}

$updatedReview = $review . " Thank you for your feedback!";
echo $updatedReview;

?>