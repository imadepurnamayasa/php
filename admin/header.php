<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <?php $menu1 = menu($koneksi); ?>
                    <?php foreach ($menu1 as $row_menu1) { ?>
                        <?php $menu2 = menu2($koneksi, $row_menu1->ID); ?>
                        <?php if (count($menu2) === 0) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?= $row_menu1->NAMA ?></a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown<?= $row_menu1->ID ?>" data-bs-toggle="dropdown" aria-expanded="false"><?= $row_menu1->NAMA ?></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown<?= $row_menu1->ID ?>">
                                    <?php foreach ($menu2 as $row_menu2) { ?>
                                        <li><a class="dropdown-item" href="index.php?modul=<?= $row_menu2->M_MODUL_ID ?>"><?= $row_menu2->NAMA ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">PENGGUNA</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Pengaturan</a></li>
                            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="index.php?modul=keluar">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">