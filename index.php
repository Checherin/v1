<?php
// index.php - Роутер (перенаправление пользователей)
session_start();

// Если пользователь авторизован
if (isset($_SESSION['user_id'])) {
    // Если админ - в админку
    if ($_SESSION['is_admin'] == 1) {
        header("Location: application/admin/dashboard.php");
        exit;
    } 
    // Если обычный пользователь - в профиль
    else {
        header("Location: application/user/profile.php");
        exit;
    }
} 
// Если не авторизован - на главную страницу
else {
    header("Location: application/public/index.php");
    exit;
}