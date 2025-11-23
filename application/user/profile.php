<?php
// application/user/profile.php
session_start();
require_once '../connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
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
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<?php include '../../components/user_header.php'; ?>

<main>
    <section class="form_section">
        <div class="form_container" style="max-width: 800px;">
            <h2 class="form_title">Добро пожаловать, <?php echo $_SESSION['name']; ?>!</h2>
            
            <?php if (isset($_SESSION['success'])): ?>
                <p style="color: green; text-align: center;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
            <?php endif; ?>
            
            <h3 style="text-align: center; margin-top: 30px;">Создать заявку</h3>
            <form class="main_form" method="POST" action="process/request_create.php">
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
                    <select name="furniture_type" required>
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
                    <select name="material" required>
                        <option value="">Выберите материал</option>
                        <option value="ДСП">ДСП</option>
                        <option value="МДФ">МДФ</option>
                        <option value="Массив дерева">Массив дерева</option>
                        <option value="Шпон">Шпон</option>
                    </select>
                </div>
                <div class="form_polya">
                    <label>Комментарий:</label>
                    <textarea name="comment" placeholder="Дополнительные пожелания"></textarea>
                </div>
                <button type="submit" class="form_button">Создать заявку</button>
            </form>
            
            <h3 style="text-align: center; margin-top: 50px;">Мои заявки</h3>
            <?php if (count($requests) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Тип мебели</th>
                            <th>Адрес</th>
                            <th>Статус</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requests as $req): ?>
                        <tr>
                            <td><?php echo $req['id']; ?></td>
                            <td><?php echo $req['furniture_type']; ?></td>
                            <td><?php echo $req['address']; ?></td>
                            <td>
                                <?php 
                                if ($req['status'] == 1) echo '<span style="color: orange;">На рассмотрении</span>';
                                elseif ($req['status'] == 2) echo '<span style="color: green;">Одобрено</span>';
                                elseif ($req['status'] == 3) echo '<span style="color: red;">Отклонено</span>';
                                ?>
                            </td>
                            <td><?php echo date('d.m.Y', strtotime($req['created_at'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="text-align: center; margin-top: 20px; color: #666;">У вас пока нет заявок.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include '../../components/footer.php'; ?>

</body>
</html>