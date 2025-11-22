<?php
// public/about.php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас - DEKKO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
    <div class="header_container">
        <h1 class="logo"><a href="../index.php">DEKKO</a></h1>
        <nav class="navigation">
            <ul class="navigation_list">
                <li class="navigation_item"><a href="../index.php" class="navigation_link">Главная</a></li>
                <li class="navigation_item"><a href="about.php" class="navigation_link_use">О нас</a></li>
                <li class="navigation_item"><a href="gallery.php" class="navigation_link">Галерея</a></li>
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
    <section class="about_section about_section_eee">
        <div class="about_container">
            <h2 class="about_title">О компании DEKKO</h2>
            <div class="about_mission">
                <h3>Наша миссия и ценности</h3>
                <p class="about_text_block">
                    В <b>DEKKO</b> мы верим, что каждый проект — это <b>возможность создать что-то</b> по-настоящему <b>значимое</b>. 
                    Наша <b>миссия</b> заключается в том, чтобы предоставлять <b>инновационные</b> и <b>эффективные решения</b>, 
                    которые приносят реальную <b>пользу нашим клиентам</b> и обществу в целом. Мы стремимся к совершенству, 
                    постоянно развиваясь и адаптируясь к меняющимся условиям рынка.
                </p>
                <p class="about_text_block">
                    Наши основные <b>ценности</b> — это <b>честность</b>, <b>прозрачность</b>, <b>ответственность</b> и <b>уважение</b> к каждому клиенту. 
                    Мы строим <b>долгосрочные отношения</b>, основанные на доверии и взаимной выгоде. 
                    Эти принципы являются фундаментом нашей работы и определяют каждое наше решение, 
                    позволяя нам достигать выдающихся результатов и укреплять наше положение на рынке.
                </p>
                <p class="about_text_block">
                    Каждый элемент мебели, созданный в <b>DEKKO</b>, является воплощением нашего <b>стремления к совершенству</b>. 
                    Мы не просто производим мебель, мы создаем функциональные произведения искусства, 
                    которые призваны <b>улучшать качество жизни</b> и <b>давать комфорт</b> нашим заказчикам.
                </p>
            </div>
        </div>
    </section>

    <section class="about_section about_section_white">
        <div class="about_container">
            <div class="about_history">
                <h3>Наша история: Путь к качеству</h3>
                <p class="about_text_block">
                    DEKKO начала свою деятельность <b>в 1992 году</b> как небольшая мастерская, <b>основанная Фролковой Людмилой Викторовной</b>. 
                    <b>Страсть к созданию качественной мебели</b> и стремление предложить клиентам индивидуальные решения стали фундаментом нашего дела. 
                    На первых этапах <b>мы специализировались на мебели для спален</b>, работая по индивидуальным заказам и 
                    уделяя особое внимание <b>качеству материалов</b> и <b>точности исполнения</b>.
                </p>
                <p class="about_text_block">
                    <b>Мы учились</b>, адаптировались к новым технологиям <b>и постоянно совершенствовались</b>, 
                    чтобы сегодня стать надёжным партнёром для сотен клиентов по всей стране. 
                    Наша история — это история постоянного <b>стремления</b> к лучшему, <b>инновациям</b> и <b>преданности своему делу</b>.
                </p>
                <p class="about_text_block">
                    С момента основания, DEKKO развивалось, постоянно <b>улучшая производственные процессы</b>. 
                    Мы инвестировали в новейшее оборудование и обучение персонала, чтобы всегда быть <b>на шаг впереди</b>. 
                    Это позволило нам не только следовать трендам, но и задавать их, предлагая клиентам <b>уникальные и персонализированные решения</b>.
                </p>
            </div>
        </div>
    </section>

    <section class="about_section about_section_eee">
        <div class="about_container">
            <div class="about_team">
                <h3>Наша команда: Сердце DEKKO</h3>
                <p class="about_team_voda_text">
                    За каждым успешным проектом стоит <b>команда профессионалов</b>, и DEKKO не исключение. 
                    Мы собрали вместе <b>талантливых и опытных специалистов</b>, каждый из которых является экспертом в своей области.
                </p>
                <div class="team_members">
                    <div class="team_member">
                        <img src="photo/about/team-num1.jpg" alt="Настя Фролова">
                        <h4>Настя Фролова</h4>
                        <p class="team_member_position">Генеральный директор</p>
                        <p class="team_member_description">
                            Опыт более 15 лет в мебельной индустрии, вдохновитель и стратег DEKKO. 
                            Под её руководством компания достигла значительных высот.
                        </p>
                    </div>
                    <div class="team_member">
                        <img src="photo/about/team-num2.jpg" alt="Мария Иванова">
                        <h4>Мария Иванова</h4>
                        <p class="team_member_position">Ведущий дизайнер</p>
                        <p class="team_member_description">
                            Автор многочисленных эксклюзивных проектов, виртуоз в создании уникальных интерьеров, 
                            сочетающих эстетику и функциональность.
                        </p>
                    </div>
                    <div class="team_member">
                        <img src="photo/about/team-num3.jpg" alt="Андрей Кузнецов">
                        <h4>Андрей Кузнецов</h4>
                        <p class="team_member_position">Руководитель производства</p>
                        <p class="team_member_description">
                            Отвечает за безупречное качество и соблюдение всех стандартов на каждом этапе изготовления, 
                            обеспечивая точность и надёжность.
                        </p>
                    </div>
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