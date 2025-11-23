<header class="header">
    <div class="header_container">
        <h1 class="logo"><a href="index.php">DEKKO</a></h1>
        <nav class="navigation">
            <ul class="navigation_list">
                <li class="navigation_item"><a href="index.php" class="navigation_link">Главная</a></li>
                <li class="navigation_item"><a href="about.php" class="navigation_link">О нас</a></li>
                <li class="navigation_item"><a href="gallery.php" class="navigation_link">Галерея</a></li>
                <li class="navigation_item"><a href="services.php" class="navigation_link">Услуги</a></li>
                <li class="navigation_item"><a href="contacts.php" class="navigation_link">Контакты</a></li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['is_admin'] == 1): ?>
                        <li class="navigation_item"><a href="../admin/dashboard.php" class="navigation_link">Админка</a></li>
                    <?php else: ?>
                        <li class="navigation_item"><a href="../user/profile.php" class="navigation_link">Профиль</a></li>
                    <?php endif; ?>
                    <li class="navigation_item"><a href="../../application/logout.php" class="navigation_link">Выход</a></li>
                <?php else: ?>
                    <li class="navigation_item"><a href="login.php" class="navigation_link">Вход</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>