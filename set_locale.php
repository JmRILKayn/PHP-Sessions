<?php
session_start();

$locale = $_GET['lang'] ?? '';

if (in_array($locale, ['en', 'es', 'fr'])) {
    $_SESSION['locale'] = $locale;
}

header('Location: index_locale.php');
exit;
?>