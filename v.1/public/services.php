<?php
// public/services.php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Услуги - DEKKO</title>
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
                <li class="navigation_item"><a href="services.php" class="navigation_link_use">Услуги</a></li>
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
    <section class="services_section services_section_eee">
        <div class="services_container">
            <h2 class="services_title">Наши услуги и порядок подачи заявки</h2>
            <p class="services_voda_text">
                В <b>DEKKO</b> мы предлагаем полный спектр услуг по созданию мебели на заказ - от первого эскиза до установки готового 
                изделия в вашем доме. Мы работаем, чтобы ваши мебельные <b>мечты стали реальностью</b>, обеспечивая индивидуальный подход и 
                безупречное качество на каждом этапе.
            </p>
            <p class="services_voda_text">
                Мы понимаем, что <b>каждый проект уникален</b>, поэтому готовы воплотить в жизнь самые смелые идеи и адаптироваться к любым вашим требованиям. 
                От небольших элементов интерьера до комплексных решений для всего дома - <b>DEKKO</b> ваш надёжный партнёр в мире качественной и 
                стильной мебели.
            </p>
            
            <h3 class="services_instruction_title">Подробная инструкция по оформлению заказа</h3>

            <div class="services_list">
                <div class="service_card">
                    <img src="photo/services/design-icon.png" alt="Иконка дизайна" class="service_icon">
                    <h3 class="service_name">Индивидуальный дизайн</h3>
                    <p class="service_comment">
                        Наши опытные дизайнеры создадут <b>уникальный проект</b>, идеально соответствующий вашему интерьеру и личным предпочтениям. 
                        Мы внимательно выслушаем все ваши пожелания и предоставим <b>3D-визуализацию</b>.
                    </p>
                </div>
                <div class="service_card">
                    <img src="photo/services/create-icon.png" alt="Иконка производства" class="service_icon">
                    <h3 class="service_name">Производство мебели</h3>
                    <p class="service_comment">
                        Мы используем только <b>высококачественные, экологически чистые материалы</b> и современное оборудование для изготовления 
                        вашей мебели. Каждый этап производства строго контролируется.
                    </p>
                </div>
                <div class="service_card">
                    <img src="photo/services/transport-icon.png" alt="Иконка доставки" class="service_icon">
                    <h3 class="service_name">Доставка</h3>
                    <p class="service_comment">
                        Мы гарантируем <b>аккуратную и своевременную доставку</b> готовой мебели прямо к вашему дому. 
                        Наша логистическая служба тщательно планирует маршруты.
                    </p>
                </div>
                <div class="service_card">
                    <img src="photo/services/installation-icon.png" alt="Иконка монтажа" class="service_icon">
                    <h3 class="service_name">Монтаж и установка</h3>
                    <p class="service_comment">
                        Профессиональная сборка и установка — залог долгой службы мебели. Наши квалифицированные специалисты <b>быстро и качественно</b> 
                        соберут все элементы.
                    </p>
                </div>
            </div>

            <div class="list_process">
                <h3 class="list_process_title">Инструкция по подаче заявки</h3>
                <p class="process_voda_text">
                    Ниже представлена инструкция, чтобы вы могли без лишних хлопот получить желаемую мебель. 
                    Следуйте этим простым шагам, и очень скоро ваш интерьер преобразится!
                </p>
                <ol class="process_list">
                    <li><b>Шаг 1: Связь с нами.</b> 
                        Обсудите ваши идеи и потребности с нашими сотрудниками. 
                        Вы можете позвонить нам, написать на почту или заполнить <a href="contacts.php" style="color: #0066cc;">форму на сайте</a>.
                    </li>
                    <li><b>Шаг 2: Разработка проекта.</b> 
                        Наш дизайнер приедет на замер, разработает индивидуальный проект и предоставит <b>3D-модель</b>. 
                        Вы сможете увидеть, как мебель будет выглядеть в вашем интерьере.
                    </li>
                    <li><b>Шаг 3: Производство.</b> 
                        После согласования всех деталей мы приступим к производству вашей мебели. 
                        Мы строго следим за соблюдением технологий и сроков.
                    </li>
                    <li><b>Шаг 4: Доставка и установка.</b> 
                        Аккуратно доставим и профессионально установим вашу новую мебель в удобное для вас время.
                    </li>
                </ol>
                <p class="process_voda_text">
                    Свяжитесь с нами сегодня, чтобы начать работу над вашим проектом. 
                    Мы готовы ответить на любые вопросы и предложить оптимальные решения!
                </p>
                <div class="process_button_in_contact">
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['is_admin'] == 0): ?>
                        <a href="user/profile.php" class="button contact_button">Создать заявку</a>
                    <?php elseif (isset($_SESSION['user_id']) && $_SESSION['is_admin'] == 1): ?>
                        <a href="contacts.php" class="button contact_button">Связаться с нами</a>
                    <?php else: ?>
                        <a href="login.php" class="button contact_button">Войти и создать заявку</a>
                    <?php endif; ?>
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
            <p>Email: dekko-mebel@gmail.com</p>
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