<?php
// index.php
session_start();
require_once 'application/connect.php';

// Если пользователь авторизован, перенаправляем его
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['is_admin'] == 1) {
        header("Location: public/admin/dashboard.php");
        exit;
    } else {
        header("Location: public/user/profile.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEKKO - Мебель на заказ!</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header class="header">
    <div class="header_container">
        <h1 class="logo"><a href="index.php">DEKKO</a></h1>
        <nav class="navigation">
            <ul class="navigation_list">
                <li class="navigation_item"><a href="index.php" class="navigation_link_use">Главная</a></li>
                <li class="navigation_item"><a href="public/about.php" class="navigation_link">О нас</a></li>
                <li class="navigation_item"><a href="public/gallery.php" class="navigation_link">Галерея</a></li>
                <li class="navigation_item"><a href="public/services.php" class="navigation_link">Услуги</a></li>
                <li class="navigation_item"><a href="public/contacts.php" class="navigation_link">Контакты</a></li>
                <li class="navigation_item"><a href="public/login.php" class="navigation_link">Вход</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="index">
        <div class="index_container">
            <div class="index_text">
                <h2 class="index_title">Мебель на заказ для стильных интерьеров!</h2>
                <p class="index_comment"><b>Создаем мебель вашей мечты, которая идеально впишется в ваш дом.</b></p>
                <p class="index_voda">В DEKKO мы постоянно развиваемся и совершенствуемся. 
                    Наша цель - предоставить исключительные услуги, которые не только удовлетворяют, но и превосходят ожидания наших клиентов.
                </p>
                <button class="button index_button"><a href="public/services.php">Оставить заявку</a></button>
            </div>
            <div class="index_image">
                <img src="public/photo/index/image-itog.jpg" alt="Начальное фото">
            </div>
        </div>
    </section>

    <section class="advantages">
        <div class="advantages_container">
            <h2 class="advantages_title">Почему выбирают DEKKO?</h2>
            <p class="advantages_voda">
                Выбор партнёра для ваших нужд — это важное решение. <b>DEKKO предлагает</b> не просто услуги, 
                а <b>комплексные решения</b>, разработанные с учётом специфики каждого проекта.
            </p>
            <div class="advantages_list">
                <div class="advantage">
                    <img src="public/photo/index/advantage-design.png" class="advantage_icon" alt="Уникальный дизайн">
                    <h3 class="advantage_title">Уникальный дизайн</h3>
                    <p class="advantage_comment">Разрабатываем уникальные проекты с учетом ваших пожеланий.</p>
                </div>
                <div class="advantage">
                    <img src="public/photo/index/advantage-quality.png" class="advantage_icon" alt="Высокое качество">
                    <h3 class="advantage_title">Высокое качество</h3>
                    <p class="advantage_comment">Используем только лучшие материалы и фурнитуру.</p>
                </div>
                <div class="advantage">
                    <img src="public/photo/index/advantage-guarantee.png" class="advantage_icon" alt="Гарантия">
                    <h3 class="advantage_title">Гарантия</h3>
                    <p class="advantage_comment">Гарантируем вам качество и долговечность нашей мебели.</p>
                </div>
                <div class="advantage">
                    <img src="public/photo/index/advantage-price.png" class="advantage_icon" alt="Доступные цены">
                    <h3 class="advantage_title">Доступные цены</h3>
                    <p class="advantage_comment">Предлагаем выгодные цены и гибкую систему скидок.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="gallery_container">
            <h2 class="gallery_title">Наши работы</h2>
            <p class="gallery_voda">Приглашаем вас ознакомиться с нашей галереей работ, которая является ярким свидетельством нашего опыта и мастерства.</p>
            <div class="gallery_list">
                <img src="public/photo/index/gallery-1.jpg" alt="Кухня">
                <img src="public/photo/index/gallery-2.jpg" alt="Гостиная">
                <img src="public/photo/index/gallery-3.jpg" alt="Спальня">
                <img src="public/photo/index/gallery-4.jpg" alt="Прихожая">
                <img src="public/photo/index/gallery-5.jpg" alt="Детская">
                <img src="public/photo/index/gallery-6.jpg" alt="Кабинет">
            </div>
            <button class="gallery_button"><a href="public/gallery.php">Смотреть все работы</a></button>
        </div>
    </section>

    <section class="review-section">    
        <div class="review_container">
            <h2 class="review_title">Что говорят наши клиенты</h2>
            <p class="review_voda">
                Нет ничего важнее, чем слова благодарности от тех, кому мы помогли.
            </p>
            <div class="review_list">
                <div class="review">
                    <p class="review_text">
                        "Я просто в восторге от новой кухни, которую для меня сделала команда DEKKO!"
                    </p>
                    <p class="review_user">- Анна Е.В.</p>
                </div>
                <div class="review">
                    <p class="review_text">
                        "Заказывали кухню у DEKKO, и остались в полном восторге!"
                    </p>
                    <p class="review_user">- Сергей А.А.</p>
                </div>
                <div class="review">
                    <p class="review_text">
                        "Нужна была мебель для спальни, и DEKKO справились на отлично."
                    </p>
                    <p class="review_user">- Настя А.Ф.</p>
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
            <a href="https://vk.com/" class="footer_social_link"><img src="public/photo/icon-vk.png" alt="VK"></a>
            <a href="https://www.instagram.com/" class="footer_social_link"><img src="public/photo/icon-inst.png" alt="Instagram"></a>
        </div>
    </div>
</footer>
</body>
</html>