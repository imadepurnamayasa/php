<section>
    <?php
    $module = isset($_GET['module']) ? $_GET['module'] : '';
    switch ($module) {
        case 'home':
            include FOLDER_MODULE.'home.php';
            break;
        case 'dashboard':
            include FOLDER_MODULE.'dashboard.php';
            break;
        case 'settings':
            include FOLDER_MODULE.'settings.php';
            break;
        case 'login':
            include FOLDER_MODULE.'login/login.php';
            break;
        default:
            include FOLDER_MODULE.'home.php';
            break;
    }
    ?>
</section>