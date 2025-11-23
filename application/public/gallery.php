<?php
// application/public/gallery.php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея - DEKKO</title>
    <link rel="stylesheet" href="../../css/style.css?v=1.0">
</head>
<body>

<?php include '../../components/header.php'; ?>

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
                    <img src="../../application/photo/gallery/gallery-1.jpg" alt="Современная кухня" loading="lazy">
                    <p class="gallery_comment">Современная кухня в стиле минимализм</p>
                </div>
                <div class="gallery_card">
                    <img src="../../application/photo/gallery/gallery-2.jpg" alt="Уютная спальня" loading="lazy">
                    <p class="gallery_comment">Уютная спальня с встроенным шкафом</p>
                </div>
                <div class="gallery_card">
                    <img src="../../application/photo/gallery/gallery-3.jpg" alt="Спальня с дизайнерской стенкой" loading="lazy">
                    <p class="gallery_comment">Спальня с дизайнерской стенкой</p>
                </div>
                <div class="gallery_card">
                    <img src="../../application/photo/gallery/gallery-4.jpg" alt="Детская комната" loading="lazy">
                    <p class="gallery_comment">Детская комната с функциональной мебелью</p>
                </div>
                <div class="gallery_card">
                    <img src="../../application/photo/gallery/gallery-5.jpg" alt="Молодежный интерьер" loading="lazy">
                    <p class="gallery_comment">Молодежный интерьер</p>
                </div>
                <div class="gallery_card">
                    <img src="../../application/photo/gallery/gallery-6.jpg" alt="Кабинет с эргономичным столом" loading="lazy">
                    <p class="gallery_comment">Кабинет с эргономичным столом</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../../components/footer.php'; ?>

</body>
</html>