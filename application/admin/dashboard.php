<?php
// application/admin/dashboard.php
session_start();
require_once '../connect.php';

// Проверка авторизации и прав админа
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../public/login.php");
    exit;
}

// Получаем все заявки
$stmt = $conn->query("SELECT r.*, u.email FROM requests r 
                      LEFT JOIN users u ON r.user_id = u.id 
                      ORDER BY r.created_at DESC");
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получаем статистику
$stmt = $conn->query("SELECT COUNT(*) as total FROM requests");
$total_requests = $stmt->fetch()['total'];

$stmt = $conn->query("SELECT COUNT(*) as total FROM requests WHERE status = 1");
$pending_requests = $stmt->fetch()['total'];

$stmt = $conn->query("SELECT COUNT(*) as total FROM users WHERE is_admin = 0");
$total_users = $stmt->fetch()['total'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель - DEKKO</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<?php include '../../components/admin_header.php'; ?>

<main>
    <section class="form_section">
        <div class="form_container" style="max-width: 1200px;">
            <h2 class="form_title">Панель администратора</h2>
            <p style="text-align: center;">Добро пожаловать, <?php echo $_SESSION['name']; ?>!</p>
            
            <?php if (isset($_SESSION['success'])): ?>
                <p style="color: green; text-align: center;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
            <?php endif; ?>
            
            <div style="display: flex; justify-content: space-around; margin: 30px 0; gap: 20px;">
                <div style="background: #f5f5f5; padding: 20px; border-radius: 10px; text-align: center; flex: 1;">
                    <h3 style="margin-bottom: 10px;">Всего заявок</h3>
                    <p style="font-size: 32px; font-weight: bold; color: #666;"><?php echo $total_requests; ?></p>
                </div>
                <div style="background: #f5f5f5; padding: 20px; border-radius: 10px; text-align: center; flex: 1;">
                    <h3 style="margin-bottom: 10px;">На рассмотрении</h3>
                    <p style="font-size: 32px; font-weight: bold; color: #666;"><?php echo $pending_requests; ?></p>
                </div>
                <div style="background: #f5f5f5; padding: 20px; border-radius: 10px; text-align: center; flex: 1;">
                    <h3 style="margin-bottom: 10px;">Пользователей</h3>
                    <p style="font-size: 32px; font-weight: bold; color: #666;"><?php echo $total_users; ?></p>
                </div>
            </div>
            
            <h3 style="text-align: center; margin-top: 40px;">Все заявки</h3>
            
            <?php if (count($requests) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Адрес</th>
                            <th>Тип мебели</th>
                            <th>Материал</th>
                            <th>Комментарий</th>
                            <th>Статус</th>
                            <th>Дата</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requests as $req): ?>
                        <tr>
                            <td><?php echo $req['id']; ?></td>
                            <td><?php echo $req['name']; ?></td>
                            <td><?php echo $req['phone']; ?></td>
                            <td><?php echo $req['address']; ?></td>
                            <td><?php echo $req['furniture_type']; ?></td>
                            <td><?php echo $req['material']; ?></td>
                            <td><?php echo $req['comment'] ?: '-'; ?></td>
                            <td>
                                <?php 
                                if ($req['status'] == 1) echo '<span style="color: orange;">На рассмотрении</span>';
                                elseif ($req['status'] == 2) echo '<span style="color: green;">Одобрено</span>';
                                elseif ($req['status'] == 3) echo '<span style="color: red;">Отклонено</span>';
                                ?>
                            </td>
                            <td><?php echo date('d.m.Y H:i', strtotime($req['created_at'])); ?></td>
                            <td>
                                <?php if ($req['status'] == 1): ?>
                                    <a href="process/edit_request.php?id=<?php echo $req['id']; ?>&action=approve" style="color: green; text-decoration: underline;">Одобрить</a> | 
                                    <a href="process/edit_request.php?id=<?php echo $req['id']; ?>&action=reject" style="color: red; text-decoration: underline;">Отклонить</a> | 
                                <?php endif; ?>
                                <a href="process/edit_request.php?id=<?php echo $req['id']; ?>&action=delete" style="color: #555; text-decoration: underline;" onclick="return confirm('Удалить заявку?')">Удалить</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="text-align: center; margin-top: 20px; color: #666;">Заявок пока нет.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include '../../components/footer.php'; ?>

</body>
</html>