<?php
// application/connect.php - Подключение к базе данных

$conn = null;

$BD = 'dekko_app';
$user = 'root';
$password = '';

try {
    $conn = new PDO('mysql:host=localhost;dbname=' . $BD, $user, $password);
} catch (PDOException $error) {
    echo 'Ошибка подключения! ' . $error->getMessage();
}