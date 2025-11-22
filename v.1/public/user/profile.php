<?php
// public/user/profile.php
session_start();
require_once '../../application/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// Обработка создания заявки
$message = '';
if (isset($_POST['create_request'])) {
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
    
    $message = "Заявка успешно создана!";
}

// Получаем заявки пользователя
$stmt = $conn->prepare("SELECT * FROM requests WHERE user_id = :user_id ORDER BY created_at DESC");
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет - DEKKO</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="header">
    <div class="header_container">
        <h1 class="logo"><a href="../../index.php">DEKKO</a></h1>
        <nav class="navigation">
            <ul class="navigation_list">
                <li class="navigation_item"><a href="../../index.php" class="navigation_link">Главная</a></li>
                <li class="navigation_item"><a href="../about.php" class="navigation_link">О нас</a></li>
                <li class="navigation_item"><a href="../gallery.php" class="navigation_link">Галерея</a></li>
                <li class="navigation_item"><a href="../services.php" class="navigation_link">Услуги</a></li>
                <li class="navigation_item"><a href="../contacts.php" class="navigation_link">Контакты</a></li>
                <li class="navigation_item"><a href="../logout.php" class="navigation_link">Выход</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="form_section">
        <div class="form_container" style="max-width: 800px;">
            <h2 class="form_title">Добро пожаловать, <?php echo $_SESSION['name']; ?>!</h2>
            
            <?php if ($message): ?>
                <p style="color: green; text-align: center;"><?php echo $message; ?></p>
            <?php endif; ?>
            
            <h3 style="text-align: center; margin-top: 30px;">Создать заявку</h3>
            <form class="main_form" method="POST">
                <div class="form_polya">
                    <label>Телефон:</label>
                    <input type="text" name="phone" placeholder="Введите телефон" required>
                </div>
                <div class="form_polya">
                    <label>Адрес:</label>
                    <input type="text" name="address" placeholder="Введите адрес" required>
                </div>
                <div class="form_polya">
                    <label>Тип мебели:</label>
                    <select name="furniture_type" required style="width: 100%; padding: 13px; border: 1px solid #ccc; border-radius: 5px;">
                        <option value="">Выберите тип</option>
                        <option value="Кухня">Кухня</option>
                        <option value="Спальня">Спальня</option>
                        <option value="Гостиная">Гостиная</option>
                        <option value="Прихожая">Прихожая</option>
                        <option value="Детская">Детская</option>
                        <option value="Кабинет">Кабинет</option>
                    </select>
                </div>
                <div class="form_polya">
                    <label>Материал:</label>
                    <select name="material" required style="width: 100%; padding: 13px; border: 1px solid #ccc; border-radius: 5px;">
                        <option value="">Выберите материал</option>
                        <option value="ДСП">ДСП</option>
                        <option value="МДФ">МДФ</option>
                        <option value="Массив дерева">Массив дерева</option>
                        <option value="Шпон">Шпон</option>
                    </select>
                </div>
                <div class="form_polya">
                    <label>Комментарий:</label>
                    <textarea name="comment" placeholder="Дополнительные пожелания" style="width: 100%; padding: 13px; border: 1px solid #ccc; border-radius: 5px; min-height: 100px;"></textarea>
                </div>
                <button type="submit" name="create_request" class="form_button">Создать заявку</button>
            </form>
            
            <h3 style="text-align: center; margin-top: 50px;">Мои заявки</h3>
            <?php if (count($requests) > 0): ?>
                <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f0f0f0;">
                            <th style="padding: 10px; border: 1px solid #ddd;">№</th>
                            <th style="padding: 10px; border: 1px solid #ddd;">Тип мебели</th>
                            <th style="padding: 10px; border: 1px solid #ddd;">Адрес</th>
                            <th style="padding: 10px; border: 1px solid #ddd;">Статус</th>
                            <th style="padding: 10px; border: 1px solid #ddd;">Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requests as $req): ?>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $req['id']; ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $req['furniture_type']; ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $req['address']; ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">
                                <?php 
                                if ($req['status'] == 1) echo '<span style="color: orange;">На рассмотрении</span>';
                                elseif ($req['status'] == 2) echo '<span style="color: green;">Одобрено</span>';
                                elseif ($req['status'] == 3) echo '<span style="color: red;">Отклонено</span>';
                                ?>
                            </td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo date('d.m.Y', strtotime($req['created_at'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="text-align: center; margin-top: 20px;">У вас пока нет заявок.</p>
            <?php endif; ?>
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
    </div>
</footer>
</body>
</html>