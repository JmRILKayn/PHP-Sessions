<?php
session_start();

$is_dark_mode = $_SESSION['is_dark_mode'] ?? false;
$button_text = $is_dark_mode ? "Switch to Light Mode ☀️" : "Switch to Dark Mode 🌙";
$next_state = $is_dark_mode ? 'light' : 'dark';
?>
<!DOCTYPE html>
<html>
<head><title>Dark Mode Session Toggle</title>
    <style>
        body { font-family: Arial, sans-serif; transition: background-color 0.3s, color 0.3s; }
        .content-box { padding: 20px; border: 1px solid; margin-top: 20px; }
        .toggle-btn { padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; }
        
        <?php if ($is_dark_mode): ?>
        body { background-color: #121212; color: #ffffff; }
        .content-box { border-color: #555; background-color: #1e1e1e; }
        .toggle-btn { background-color: #a7a0a0ff; color: white; }
        <?php else: ?>
        body { background-color: #ffffff; color: #000000; }
        .content-box { border-color: #ccc; background-color: #f9f9f9; }
        .toggle-btn { background-color: #000000ff; color: white; }
        <?php endif; ?>
    </style>
</head>
<body>
    <h2>Theme Selector</h2>
    <p>The theme is currently set to: <?= $is_dark_mode ? 'DARK' : 'LIGHT' ?></p>
    <a href="toggle_mode.php?mode=<?= $next_state ?>" class="toggle-btn">
        <?= $button_text ?>
    </a>

</body>
</html>