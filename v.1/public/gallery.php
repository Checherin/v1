<?php
// public/gallery.php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея - DEKKO</title>
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
                <li class="navigation_item"><a href="gallery.php" class="navigation_link_use">Галерея</a></li>
                <li class="navigation_item"><a href="services.php" class="navigation_link">Услуги</a></li>
                <li class="navigation_item"><a href="contacts.php" class="navigation_link">Контакты</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['is_admin'] == 1): ?>
                        <li class="navigation_item"><a href="admin/dashboard.php" class="navigation_link">Админка</a></li>
                    <?php else: ?>
                        <li class="navigation_item"><a href="user/profile.php" class="navigation_link">Профиль</a></li>
                    <?php endif; ?>
                    <li class="navigation_item"><a href="logout.php" class="navigation_link">Выход</a></li>
                <?php else: ?>
                    <li class="navigation_item"><a href="login.php" class="navigation_link">Вход</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="gallery_voda_section gallery_section_eee">
        <div class="gallery_container">
            <h2 class="gallery_title">Описание наших работ</h2>
            <p class="gallery_voda_text">
                Добро пожаловать в нашу обширную <b>галерею</b>, где каждое изображение рассказывает свою уникальную историю. 
                Мы с гордостью представляем вам <b>лучшие работы</b>, выполненные нашей командой DEKKO. 
                Здесь вы найдёте широкий спектр проектов, от современных кухонь до уютных спален и функциональных гостиных,
                каждый из которых демонстрирует наше <b>мастерство</b>, <b>креативность</b> и <b>внимание к деталям</b>.
            </p>
            <p class="gallery_voda_text">
                Наша галерея отражает <b>широкий спектр задач</b>, с которыми мы успешно справляемся. 
                Мы работаем с клиентами из самых разных отраслей, и каждый проект для нас - это <b>уникальный вызов</b>, к которому мы подходим с полной отдачей. 
                От <b>индивидуальных дизайнерских решений</b> до <b>оптимизации пространства</b> и <b>выбора эксклюзивных материалов</b>, 
                мы всегда стремимся к безупречному качеству и оригинальным решениям.
            </p>
        </div>
    </section>

    <section class="gallery_images_section gallery_section_white">
        <div class="gallery_container">
            <h3 class="gallery_images_title">Наши работы</h3>
            <div class="gallery_list">
                <div class="gallery_card">
                    <img src="photo/gallery/gallery-1.jpg" alt="Современная кухня">
                    <p class="gallery_comment">Современная кухня в стиле минимализм</p>
                </div>
                <div class="gallery_card">
                    <img src="photo/gallery/gallery-2.jpg" alt="Уютная спальня">
                    <p class="gallery_comment">Уютная спальня с встроенным шкафом</p>
                </div>
                <div class="gallery_card">
                    <img src="photo/gallery/gallery-3.jpg" alt="Спальня с дизайнерской стенкой">
                    <p class="gallery_comment">Спальня с дизайнерской стенкой</p>
                </div>
                <div class="gallery_card">
                    <img src="photo/gallery/gallery-4.jpg" alt="Детская комната">
                    <p class="gallery_comment">Детская комната с функциональной мебелью</p>
                </div>
                <div class="gallery_card">
                    <img src="photo/gallery/gallery-5.jpg" alt="Молодежный интерьер">
                    <p class="gallery_comment">Молодежный интерьер</p>
                </div>
                <div class="gallery_card">
                    <img src="photo/gallery/gallery-6.jpg" alt="Кабинет с эргономичным столом">
                    <p class="gallery_comment">Кабинет с эргономичным столом</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="footer_container">
        <p class="footer_copy">&copy; 2025 DEKKO. Мебель на заказ.</p>
        <div class="footer_contacts">
            <p>Телефон: +7 (4236) 68-34-34</p>
            <p>Почта: dekko-mebel@gmail.com</p>
            <p>Адрес: г. Находка, ул. Сидоренко, 1, стр. 2</p>
        </div>
        <div class="footer_social">
            <a href="https://vk.com/" class="footer_social_link"><img src="photo/icon-vk.png" alt="VK"></a>
            <a href="https://www.instagram.com/" class="footer_social_link"><img src="photo/icon-inst.png" alt="Instagram"></a>
        </div>
    </div>
</footer>
</body>
</html>