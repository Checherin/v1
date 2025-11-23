<?php
// application/public/index.php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEKKO - Мебель на заказ!</title>
    <link rel="stylesheet" href="../../css/style.css?v=1.0">
</head>
<body>

<?php include '../../components/header.php'; ?>

<main>
    <section class="index">
        <div class="index_container">
            <div class="index_text">
                <h2 class="index_title">Мебель на заказ для стильных интерьеров!</h2>
                <p class="index_comment"><b>Создаем мебель вашей мечты, которая идеально впишется в ваш дом.</b></p>
                <p class="index_voda">В DEKKO мы постоянно развиваемся и совершенствуемся. 
                    Наша цель - предоставить исключительные услуги, которые не только удовлетворяют, но и превосходят ожидания наших клиентов.
                </p>
                <button class="button index_button"><a href="services.php">Оставить заявку</a></button>
            </div>
            <div class="index_image">
                <img src="../../application/photo/index/image-itog.jpg" alt="Начальное фото" loading="lazy">
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
                    <img src="../../application/photo/index/advantage-design.png" class="advantage_icon" alt="Уникальный дизайн" loading="lazy">
                    <h3 class="advantage_title">Уникальный дизайн</h3>
                    <p class="advantage_comment">Разрабатываем уникальные проекты с учетом ваших пожеланий.</p>
                </div>
                <div class="advantage">
                    <img src="../../application/photo/index/advantage-quality.png" class="advantage_icon" alt="Высокое качество" loading="lazy">
                    <h3 class="advantage_title">Высокое качество</h3>
                    <p class="advantage_comment">Используем только лучшие материалы и фурнитуру.</p>
                </div>
                <div class="advantage">
                    <img src="../../application/photo/index/advantage-guarantee.png" class="advantage_icon" alt="Гарантия" loading="lazy">
                    <h3 class="advantage_title">Гарантия</h3>
                    <p class="advantage_comment">Гарантируем вам качество и долговечность нашей мебели.</p>
                </div>
                <div class="advantage">
                    <img src="../../application/photo/index/advantage-price.png" class="advantage_icon" alt="Доступные цены" loading="lazy">
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
                <img src="../../application/photo/index/gallery-1.jpg" alt="Кухня" loading="lazy">
                <img src="../../application/photo/index/gallery-2.jpg" alt="Гостиная" loading="lazy">
                <img src="../../application/photo/index/gallery-3.jpg" alt="Спальня" loading="lazy">
                <img src="../../application/photo/index/gallery-4.jpg" alt="Прихожая" loading="lazy">
                <img src="../../application/photo/index/gallery-5.jpg" alt="Детская" loading="lazy">
                <img src="../../application/photo/index/gallery-6.jpg" alt="Кабинет" loading="lazy">
            </div>
            <button class="gallery_button"><a href="gallery.php">Смотреть все работы</a></button>
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

<?php include '../../components/footer.php'; ?>

</body>
</html>