<section>
    <?php
    $inc_module = isset($_GET['module']) ? $_GET['module'] : '';
    switch ($inc_module) {
        case 'home':
            include FOLDER_MODULE.'home.php';
            break;
        case 'dashboard':
            include FOLDER_MODULE.'dashboard.php';
            break;
        case 'settings':
            include FOLDER_MODULE.'settings.php';
            break;
        default:
            include FOLDER_MODULE.'home.php';
            break;
    }
    ?>
</section>