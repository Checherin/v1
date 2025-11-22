<?php
// public/admin/dashboard.php
session_start();
require_once '../../application/connect.php';

// Проверка авторизации и прав админа
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../login.php");
    exit;
}

// Обработка действий с заявками
if (isset($_GET['approve'])) {
    $stmt = $conn->prepare("UPDATE requests SET status = 2 WHERE id = :id");
    $stmt->execute(['id' => $_GET['approve']]);
    header("Location: dashboard.php");
    exit;
}

if (isset($_GET['reject'])) {
    $stmt = $conn->prepare("UPDATE requests SET status = 3 WHERE id = :id");
    $stmt->execute(['id' => $_GET['reject']]);
    header("Location: dashboard.php");
    exit;
}

if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM requests WHERE id = :id");
    $stmt->execute(['id' => $_GET['delete']]);
    header("Location: dashboard.php");
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
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .stats {
            display: flex;
            justify-content: space-around;
            margin: 30px 0;
            gap: 20px;
        }
        .stat-card {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            flex: 1;
        }
        .stat-card h3 {
            margin: 0 0 10px 0;
            color: #333;
        }
        .stat-card p {
            font-size: 32px;
            font-weight: bold;
            color: #666;
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-approve {
            background-color: #4CAF50;
            color: white;
        }
        .btn-reject {
            background-color: #f44336;
            color: white;
        }
        .btn-delete {
            background-color: #555;
            color: white;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="header_container">
        <h1 class="logo"><a href="../../index.php">DEKKO</a></h1>
        <nav class="navigation">
            <ul class="navigation_list">
                <li class="navigation_item"><a href="../../index.php" class="navigation_link">Главная</a></li>
                <li class="navigation_item"><a href="dashboard.php" class="navigation_link_use">Админ-панель</a></li>
                <li class="navigation_item"><a href="../logout.php" class="navigation_link">Выход</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="form_section">
        <div class="form_container" style="max-width: 1200px;">
            <h2 class="form_title">Панель администратора</h2>
            <p style="text-align: center;">Добро пожаловать, <?php echo $_SESSION['name']; ?>!</p>
            
            <div class="stats">
                <div class="stat-card">
                    <h3>Всего заявок</h3>
                    <p><?php echo $total_requests; ?></p>
                </div>
                <div class="stat-card">
                    <h3>На рассмотрении</h3>
                    <p><?php echo $pending_requests; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Пользователей</h3>
                    <p><?php echo $total_users; ?></p>
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
                                    <a href="?approve=<?php echo $req['id']; ?>" class="btn btn-approve">Одобрить</a>
                                    <a href="?reject=<?php echo $req['id']; ?>" class="btn btn-reject">Отклонить</a>
                                <?php endif; ?>
                                <a href="?delete=<?php echo $req['id']; ?>" class="btn btn-delete" onclick="return confirm('Удалить заявку?')">Удалить</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="text-align: center; margin-top: 20px;">Заявок пока нет.</p>
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