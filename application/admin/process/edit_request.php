<?php
// application/admin/process/edit_request.php
session_start();
require_once '../../../application/connect.php';

// Проверка авторизации и прав админа
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../../public/login.php");
    exit;
}

if (isset($_GET['id']) && isset($_GET['action'])) {
    $request_id = (int)$_GET['id'];
    $action = $_GET['action'];
    
    if ($action == 'approve') {
        // Одобрить заявку (status = 2)
        $stmt = $conn->prepare("UPDATE requests SET status = 2 WHERE id = :id");
        $stmt->execute(['id' => $request_id]);
        $_SESSION['success'] = "Заявка одобрена!";
        
    } elseif ($action == 'reject') {
        // Отклонить заявку (status = 3)
        $stmt = $conn->prepare("UPDATE requests SET status = 3 WHERE id = :id");
        $stmt->execute(['id' => $request_id]);
        $_SESSION['success'] = "Заявка отклонена!";
        
    } elseif ($action == 'delete') {
        // Удалить заявку
        $stmt = $conn->prepare("DELETE FROM requests WHERE id = :id");
        $stmt->execute(['id' => $request_id]);
        $_SESSION['success'] = "Заявка удалена!";
    }
}

header("Location: ../dashboard.php");
exit;