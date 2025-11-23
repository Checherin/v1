<?php
// application/public/process/auth_login.php
session_start();
require_once '../../../application/connect.php';

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
    $stmt->execute(['login' => $login, 'password' => $password]);
    
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['is_admin'] = $user['is_admin'];
        
        header("Location: ../../../index.php");
        exit;
    } else {
        $_SESSION['error'] = "Неправильный логин или пароль!";
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}