<?php
session_start();
const MAX_HISTORY = 5; 
$current_product_id = $_GET['id'] ?? null; 
$product_data = [
    101 => "Advanced PHP Handbook",
    102 => "Laravel Development Course",
    103 => "API Design Masterclass",
    104 => "Cloud Server Optimization Guide",
    105 => "Front-End Frameworks Cheat Sheet"
];

if (!$current_product_id || !isset($product_data[$current_product_id])) {
    header('Location: products.php'); // Redirect if invalid
    exit;
}

$product_name = $product_data[$current_product_id];

if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}

$current_item = ['id' => $current_product_id, 'name' => $product_name];
$history_list = $_SESSION['history'];
$history_list = array_filter($history_list, fn($item) => $item['id'] !== $current_product_id);
array_unshift($history_list, $current_item);
$_SESSION['history'] = array_slice($history_list, 0, MAX_HISTORY);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Detail: <?= htmlspecialchars($product_name) ?></title>
    <style>
        body { font-family: Arial, sans-serif; }
        .history-list { border-top: 2px solid #ddd; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="product-box">
        <h2>Product Detail: <?= htmlspecialchars($product_name) ?></h2>
        <p>This is where the detailed information about the product goes. The session was updated when you loaded this page.</p>
    </div>

    <p><a href="products.php">← Back to Product List</a></p>
    <hr>
    
    <div class="history-list">
        <h3>Recently Viewed (From Session):</h3>
        <?php 
        if (count($_SESSION['history']) > 1): 
        ?>
            <ul>
                <?php 
                for ($i = 1; $i < count($_SESSION['history']); $i++): 
                    $item = $_SESSION['history'][$i];
                ?>
                    <li>
                        <a href="product_detail.php?id=<?= $item['id'] ?>">
                            <?= htmlspecialchars($item['name']) ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        <?php else: ?>
            <p>View more products to see your history appear here.</p>
        <?php endif; ?>
    </div>
</body>
</html>