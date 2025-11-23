<?php
// application/user/process/request_cancel.php
session_start();
require_once '../../../application/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../public/login.php");
    exit;
}

if (isset($_GET['id'])) {
    $request_id = (int)$_GET['id'];
    
    // Проверяем, что заявка принадлежит пользователю
    $stmt = $conn->prepare("SELECT * FROM requests WHERE id = :id AND user_id = :user_id");
    $stmt->execute(['id' => $request_id, 'user_id' => $_SESSION['user_id']]);
    
    if ($stmt->rowCount() > 0) {
        // Удаляем заявку
        $stmt = $conn->prepare("DELETE FROM requests WHERE id = :id");
        $stmt->execute(['id' => $request_id]);
        
        $_SESSION['success'] = "Заявка успешно отменена!";
    }
}

header("Location: ../profile.php");
exit;