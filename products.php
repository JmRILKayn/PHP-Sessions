<?php
session_start();

$product_data = [
    101 => "Advanced PHP Handbook",
    102 => "Laravel Development Course",
    103 => "API Design Masterclass",
    104 => "Cloud Server Optimization Guide",
    105 => "Front-End Frameworks Cheat Sheet"
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>
    <h2>Available Products</h2>
    <p>Click any product to view its details. Your viewing history will be tracked via the session on the next page.</p>

    <ul>
        <?php foreach ($product_data as $id => $name): ?>
            <li>
                <a href="product_detail.php?id=<?= $id ?>">
                    <?= htmlspecialchars($name) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>