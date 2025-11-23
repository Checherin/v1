<?php
// application/user/process/request_create.php
session_start();
require_once '../../../application/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../public/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $furniture_type = htmlspecialchars($_POST['furniture_type']);
    $material = htmlspecialchars($_POST['material']);
    $comment = htmlspecialchars($_POST['comment']);
    
    $stmt = $conn->prepare("INSERT INTO requests (user_id, name, phone, address, furniture_type, material, comment, status) 
                            VALUES (:user_id, :name, :phone, :address, :furniture_type, :material, :comment, 1)");
    
    $stmt->execute([
        'user_id' => $_SESSION['user_id'],
        'name' => $_SESSION['name'],
        'phone' => $phone,
        'address' => $address,
        'furniture_type' => $furniture_type,
        'material' => $material,
        'comment' => $comment
    ]);
    
    $_SESSION['success'] = "Заявка успешно создана!";
    header("Location: ../profile.php");
    exit;
} else {
    header("Location: ../profile.php");
    exit;
}