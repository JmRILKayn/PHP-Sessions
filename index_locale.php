<?php
session_start();

$current_locale = $_SESSION['locale'] ?? 'en';

$translations = [
    'en' => [
        'title' => 'Language Selector',
        'greeting' => 'Hello! Your current language is English.',
        'switch' => 'Switch Language:',
    ],
    'es' => [
        'title' => '¡Bienvenido a nuestro sitio web!',
        'greeting' => '¡Hola! Su idioma actual es español.',
        'switch' => 'Cambiar idioma:',
    ],
    'fr' => [
        'title' => 'Bienvenue sur notre site web !',
        'greeting' => 'Bonjour ! Votre langue actuelle est le français.',
        'switch' => 'Changer de langue:',
    ],
];

$text = $translations[$current_locale];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($text['title']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h2><?= htmlspecialchars($text['title']) ?></h2>
    <p><?= htmlspecialchars($text['greeting']) ?></p>
    <hr>
    <h3><?= htmlspecialchars($text['switch']) ?> (Current: <?= strtoupper($current_locale) ?>)</h3>
    <p>
        <a href="set_locale.php?lang=en">English</a> |
        <a href="set_locale.php?lang=es">Español</a> |
        <a href="set_locale.php?lang=fr">French</a>
    </p>

</body>
</html>