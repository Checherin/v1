<?php
// public/register.php
session_start();
require_once '../application/connect.php';

$error = '';
$success = '';

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
        $error = "Пользователь с таким логином уже существует!";
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
        
        $success = "Регистрация успешна! Теперь вы можете войти.";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - DEKKO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
    <div class="header_container">
        <h1 class="logo"><a href="../index.php">DEKKO</a></h1>
        <nav class="navigation">
            <ul class="navigation_list">
                <li class="navigation_item"><a href="../index.php" class="navigation_link">Главная</a></li>
                <li class="navigation_item"><a href="about.php" class="navigation_link">О нас</a></li>
                <li class="navigation_item"><a href="gallery.php" class="navigation_link">Галерея</a></li>
                <li class="navigation_item"><a href="services.php" class="navigation_link">Услуги</a></li>
                <li class="navigation_item"><a href="contacts.php" class="navigation_link">Контакты</a></li>
                <li class="navigation_item"><a href="login.php" class="navigation_link">Вход</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="form_section">
        <div class="form_container">
            <h2 class="form_title">Создайте аккаунт DEKKO</h2>
            <p class="form_voda_for_form">
                Заполните поля ниже, чтобы создать свой профиль и начать пользоваться нашими услугами.
            </p>
            <?php if ($error): ?>
                <p style="color: red; text-align: center;"><?php echo $error; ?></p>
            <?php endif; ?>
            <?php if ($success): ?>
                <p style="color: green; text-align: center;"><?php echo $success; ?></p>
            <?php endif; ?>
            <form class="main_form" method="POST">
                <div class="form_polya">
                    <label>Логин:</label>
                    <input type="text" name="login" placeholder="Придумайте логин" required>
                </div>
                <div class="form_polya">
                    <label>Пароль:</label>
                    <input type="password" name="password" placeholder="Введите пароль" required>
                </div>
                <div class="form_polya">
                    <label>Имя:</label>
                    <input type="text" name="name" placeholder="Введите ваше имя" required>
                </div>
                <div class="form_polya">
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Введите email" required>
                </div>
                <div class="form_polya">
                    <label>Телефон:</label>
                    <input type="text" name="phone" placeholder="Введите телефон">
                </div>
                <button type="submit" class="form_button">Зарегистрироваться</button>
            </form>
            <p class="form_transport_text">Уже есть аккаунт? <a href="login.php">Войти!</a></p>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="footer_container">
        <p class="footer_copy">&copy; 2025 DEKKO. Мебель на заказ.</p>
        <div class="footer_contacts">
            <p>Телефон: +7 (4236) 68-34-34</p>
            <p>Email: dekko-mebel@gmail.com</p>
            <p>Адрес: г. Находка, ул. Сидоренко, д. 1с2</p>
        </div>
        <div class="footer_social">
            <a href="https://vk.com/" class="footer_social_link"><img src="photo/icon-vk.png" alt="VK"></a>
            <a href="https://www.instagram.com/" class="footer_social_link"><img src="photo/icon-inst.png" alt="Instagram"></a>
        </div>
    </div>
</footer>
</body>
</html>