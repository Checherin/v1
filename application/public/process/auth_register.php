<?php
// application/public/process/auth_register.php
session_start();
require_once '../../../application/connect.php';

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    
    // Проверяем, существует ли пользователь
    $stmt = $conn->prepare("SELECT * FROM users WHERE login = :login");
    $stmt->execute(['login' => $login]);
    
    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "Пользователь с таким логином уже существует!";
        header("Location: ../register.php");
        exit;
    } else {
        // Регистрируем пользователя
        $stmt = $conn->prepare("INSERT INTO users (login, password, name, email, phone) 
                                VALUES (:login, :password, :name, :email, :phone)");
        
        $stmt->execute([
            'login' => $login,
            'password' => $password,
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ]);
        
        $_SESSION['success'] = "Регистрация успешна! Теперь вы можете войти.";
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../register.php");
    exit;
}