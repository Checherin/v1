<?php
// application/public/contacts.php
session_start();

$message = '';
if (isset($_POST['send_message'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $msg = htmlspecialchars($_POST['message']);
    
    // Здесь можно добавить отправку email или сохранение в БД
    $message = "Ваше сообщение успешно отправлено! Мы свяжемся с вами в ближайшее время.";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты - DEKKO</title>
    <link rel="stylesheet" href="../../css/style.css?v=1.0">
</head>
<body>

<?php include '../../components/header.php'; ?>

<main>
    <section class="contacts_section contacts_section_eee">
        <div class="contacts_container">
            <h2 class="contacts_title">Свяжитесь с нами</h2>
            <p class="contacts_voda_text">
                Если у вас возникли вопросы о нашей мебели, предложения по сотрудничеству или вы просто хотите обсудить свои идеи, свяжитесь с нами. 
                Наша команда <b>DEKKO</b> готова предоставить вам всю необходимую информацию и помочь воплотить ваши мебельные мечты в реальность.
            </p>
            <p class="contacts_voda_text">
                Вы можете воспользоваться формой обратной связи на этой странице, позвонить нам по телефону или написать электронное письмо. 
                Мы ценим каждого клиента и стремимся отвечать на все запросы максимально оперативно.
            </p>

            <div class="contacts_content">
                <!-- Контактная информация -->
                <div class="contact_information">
                    <h3 class="contact_information_title">Наши контактные данные</h3>
                    <p class="contact_voda_text">
                        Мы доступны для связи по следующим каналам. 
                        Выберите наиболее удобный для вас способ, и мы с удовольствием ответим на все ваши вопросы.
                    </p>
                    <p><b>Телефон:</b> +7 (4236) 68-34-34</p>
                    <p><b>Email:</b> dekko-mebel@gmail.com</p>
                    <p><b>Адрес:</b> г. Находка, ул. Сидоренко, д. 1с2</p>
                    <p><b>Время работы:</b> Пн-Пт: 9:00 - 18:00 (без перерыва)</p>
                    <p class="contact_voda_text">
                        Мы работаем по будням. Если у вас возник срочный вопрос в выходные, пожалуйста, 
                        оставьте сообщение через форму, и мы свяжемся с вами в ближайший рабочий день.
                    </p>
                </div>

                <!-- Форма обратной связи -->
                <div class="contact_form">
                    <div class="container_form">
                        <h3 class="contact_form_title">Оставьте нам сообщение</h3>
                        <p class="contact_voda_form">
                            Заполните форму ниже, и мы свяжемся с вами в ближайшее время, 
                            чтобы обсудить ваш запрос или ответить на вопросы.
                        </p>
                        
                        <?php if ($message): ?>
                            <p style="color: green; text-align: center; margin-bottom: 15px;"><?php echo $message; ?></p>
                        <?php endif; ?>

                        <hr>

                        <form method="POST">
                            <label><b>Ваше имя</b></label>
                            <input type="text" name="name" placeholder="Введите ваше имя" required>

                            <label><b>Ваш Email</b></label>
                            <input type="email" name="email" placeholder="Введите вашу почту" required>

                            <label><b>Тема сообщения</b></label>
                            <input type="text" name="subject" placeholder="Укажите тему сообщения" required>

                            <label><b>Ваше сообщение</b></label>
                            <textarea name="message" placeholder="Введите ваше сообщение" required style="min-height: 120px;"></textarea>

                            <div class="clearfix">
                                <button type="submit" name="send_message" class="contact_form_button">Отправить сообщение</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Карта -->
            <div class="contact_map">
                <h3 class="contact_map_title">Мы на карте</h3>
                <p class="contact_map_voda_text">
                    Посетите наш офис, чтобы лично ознакомиться с образцами материалов и обсудить ваш проект. 
                    Мы всегда рады видеть вас!
                </p>
                <div style="position:relative; overflow:hidden; border-radius: 10px; margin-top: 20px;">
                    <iframe 
                        src="https://yandex.ru/map-widget/v1/org/torgovy_dvor_kupecheskiy/1849279867/?ll=132.890942%2C42.848452&z=16"
                        width="100%" 
                        height="450" 
                        frameborder="0" 
                        allowfullscreen="true" 
                        style="position:relative; border-radius: 10px;">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../../components/footer.php'; ?>

</body>
</html>