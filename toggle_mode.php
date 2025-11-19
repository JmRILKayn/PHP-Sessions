<?php
session_start();

$mode = $_GET['mode'] ?? null;

if ($mode === 'dark') {
    $_SESSION['is_dark_mode'] = true;
} elseif ($mode === 'light') {
    $_SESSION['is_dark_mode'] = false;
}

header('Location: index.php');
exit;
?>