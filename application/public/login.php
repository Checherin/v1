<?php
// application/public/login.php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - DEKKO</title>
    <link rel="stylesheet" href="../../css/style.css?v=1.0">
</head>
<body>

<?php include '../../components/header.php'; ?>

<main>
    <section class="form_section">
        <div class="form_container">
            <h2 class="form_title">Войдите в аккаунт DEKKO</h2>
            <p class="form_voda_for_form">
                Войдите, чтобы начать пользоваться нашими услугами и получить доступ к управлению заказами.
            </p>
            
            <?php if (isset($_SESSION['error'])): ?>
                <p style="color: red; text-align: center;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['success'])): ?>
                <p style="color: green; text-align: center;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
            <?php endif; ?>
            
            <form class="main_form" method="POST" action="process/auth_login.php">
                <div class="form_polya">
                    <label>Логин:</label>
                    <input type="text" name="login" placeholder="Введите ваш логин" required>
                </div>
                <div class="form_polya">
                    <label>Пароль:</label>
                    <input type="password" name="password" placeholder="Введите пароль" required>
                </div>
                <button type="submit" class="form_button">Войти</button>
            </form>
            <p class="form_transport_text">Ещё нет аккаунта? <a href="register.php">Зарегистрироваться!</a></p>
        </div>
    </section>
</main>

<?php include '../../components/footer.php'; ?>

</body>
</html>