<?php
// Day 05: Arrays in PHP

echo "=== Part 1: Indexed Arrays ===\n\n";

// 1.1 Creating & Accessing
$fruits = ["Apple", "Banana", "Cherry"];

echo $fruits[0] . "\n";
echo $fruits[1] . "\n";
echo $fruits[2] . "\n";
echo "Total: " . count($fruits) . "\n\n";

// 1.2 Looping Through Arrays
$colors = ["Red", "Green", "Blue"];

foreach ($colors as $color) {
    echo "Color: $color\n";
}

echo "\n=== Part 2: Associative Arrays ===\n\n";

// 2.1 Creating & Accessing
$person = [
    "name" => "John",
    "age" => 25,
    "city" => "New York"
];

echo $person["name"] . "\n";
echo $person["age"] . " years old\n";
echo "Lives in " . $person["city"] . "\n\n";

// 2.2 Looping Through Keys & Values
$product = [
    "name" => "Laptop",
    "price" => 999,
    "brand" => "Dell"
];

foreach ($product as $key => $value) {
    echo "$key: $value\n";
}

echo "\n=== Part 3: Nested Arrays ===\n\n";

// 3.1 Array of Records
$students = [
    ["name" => "Alice", "grade" => 85],
    ["name" => "Bob", "grade" => 92],
    ["name" => "Charlie", "grade" => 78]
];

foreach ($students as $student) {
    echo $student["name"] . ": " . $student["grade"] . "\n";
}

echo "\n";

// 3.2 Shopping Cart Example
$cart = [
    ["item" => "Laptop", "price" => 999],
    ["item" => "Mouse", "price" => 29],
    ["item" => "Keyboard", "price" => 79]
];

$total = 0;
foreach ($cart as $product) {
    echo $product["item"] . ": $" . $product["price"] . "\n";
    $total += $product["price"];
}
echo "---\nTotal: $" . $total . "\n";

echo "\n=== Part 4: Array Functions ===\n\n";

// 4.1 Check if Value Exists
$fruits = ["apple", "banana", "cherry"];

if (in_array("banana", $fruits)) {
    echo "Banana found!\n";
}

if (!in_array("grape", $fruits)) {
    echo "Grape not found\n";
}

echo "\n";

// 4.2 Sorting Arrays
$numbers = [5, 2, 8, 1, 9];

sort($numbers);

foreach ($numbers as $n) {
    echo "$n ";
}

echo "\n\n";

// 4.3 Useful Functions
$scores = [85, 92, 78, 95, 88];

echo "Count: " . count($scores) . "\n";
echo "Sum: " . array_sum($scores) . "\n";
echo "Min: " . min($scores) . "\n";
echo "Max: " . max($scores) . "\n";
echo "Avg: " . array_sum($scores) / count($scores) . "\n";

echo "\n";

// 4.4 Array Map
$numbers = [1, 2, 3, 4, 5];

$doubled = array_map(function($n) {
    return $n * 2;
}, $numbers);

print_r($doubled);

// 4.5 Array Filter
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$evens = array_filter($numbers, function($n) {
    return $n % 2 == 0;
});

echo "Even numbers:\n";
print_r($evens);

// Filter with associative arrays
$products = [
    ["name" => "Laptop", "price" => 999, "in_stock" => true],
    ["name" => "Phone", "price" => 699, "in_stock" => false],
    ["name" => "Tablet", "price" => 450, "in_stock" => true],
    ["name" => "Watch", "price" => 299, "in_stock" => false]
];

$available = array_filter($products, function($product) {
    return $product["in_stock"] == true;
});

echo "Available products:\n";
foreach ($available as $product) {
    echo "- " . $product["name"] . ": $" . $product["price"] . "\n";
}

// Filter expensive items (price > 500)
$expensive = array_filter($products, function($product) {
    return $product["price"] > 500;
});

echo "\nExpensive products (>$500):\n";
foreach ($expensive as $product) {
    echo "- " . $product["name"] . ": $" . $product["price"] . "\n";
}


$inventory = [
    ["name" => "Shirt", "stock" => 10],
    ["name" => "Pants", "stock" => 0],
    ["name" => "Hat", "stock" => 5],
    ["name" => "Shoes", "stock" => 0]
];

$available = array_filter($inventory, function($item) {
    return $item["stock"] > 0;
});

echo "Available items:<br>";
echo implode("<br>", array_map(function($item) {
    return "- " . $item["name"] . " (" . $item["stock"] . " in stock)";
}, array_filter($inventory, fn($item) => $item["stock"] > 0)));

