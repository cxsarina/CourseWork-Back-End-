<?php
/** @var string $Title */

/** @var string $Content */

use models\Users;

if (empty($Title))
    $Title = '';
if (empty($Content))
    $Content = '';
$icons = ['/images/note1.png', '/images/note2.png', '/images/note3.png'];

$icon_positions = [];
for ($i = 0; $i < 60; $i++) {
    $icon_positions[] = [
        'icon' => $icons[array_rand($icons)],
        'top' => rand(0, 90),
        'left' => rand(0, 90)
    ];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $Title ?></title>
    <link rel="icon" type="image/png" href="/images/vinyl.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link href="/css/style.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <style>
        .background-icons {
            position: absolute;
            width: 100%;
            height: 120%;
            z-index: -1;
        }

        .background-icons img {
            position: absolute;
            width: 70px;
            height: 70px;
            opacity: 0.2;
        }
        .container{
            font-family: "Comic Sans MS";
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const icons = document.querySelectorAll(".background-icons img");
            icons.forEach(icon => {
                let overlapping = true;
                while (overlapping) {
                    overlapping = false;
                    const top = Math.random() * 90 + "%";
                    const left = Math.random() * 90 + "%";
                    icon.style.top = top;
                    icon.style.left = left;
                    for (let otherIcon of icons) {
                        if (otherIcon !== icon && isOverlapping(icon, otherIcon)) {
                            overlapping = true;
                            break;
                        }
                    }
                }
            });

            function isOverlapping(icon1, icon2) {
                const rect1 = icon1.getBoundingClientRect();
                const rect2 = icon2.getBoundingClientRect();
                return !(rect1.right < rect2.left || rect1.left > rect2.right || rect1.bottom < rect2.top || rect1.top > rect2.bottom);
            }
        });
    </script>
</head>
<body>
<div class="background-icons">
    <?php foreach ($icon_positions as $pos) { ?>
        <img src="<?= $pos['icon'] ?>" style="top: <?= $pos['top'] ?>%; left: <?= $pos['left'] ?>%;">
    <?php } ?>
</div>
<div class="container">
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="/images/vinyl.png" width="40" height="32" alt="Bootstrap">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 link-secondary">ГОЛОВНА</a></li>
                    <li><a href="/news/index" class="nav-link px-2 link-body-emphasis">НОВИНИ</a></li>
                    <?php if (!Users::IsUserLogged()) : ?>
                        <li><a href="/users/login" class="nav-link px-2 link-body-emphasis">УВІЙТИ</a></li>
                        <li><a href="/users/register" class="nav-link px-2 link-body-emphasis">ЗАРЕЄСТРУВАТИСЯ</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                <?php if (Users::IsUserLogged()) : ?>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                 class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/users/logout">Вихід</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="/guitars/index" role="button">
                            ГІТАРИ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/guitars/classic">КЛАСИЧНІ ГІТАРИ</a></li>
                            <li><a class="dropdown-item" href="/guitars/electric">ЕЛЕКТРО ГІТАРИ</a></li>
                            <li><a class="dropdown-item" href="/guitars/acoustic">АКУСТИЧНІ ГІТАРИ</a></li>
                            <li><a class="dropdown-item" href="/guitars/electroacoustic">ЕЛЕКТРО-АКУСТИЧНІ
                                    ГІТАРИ</a></li>
                            <li><a class="dropdown-item" href="/guitars/accessories">АКСЕСУАРИ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/keyss/index" role="button">
                            КЛАВІШНІ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/keyss/synthesizers">СИНТЕЗАТОРИ</a></li>
                            <li><a class="dropdown-item" href="/keyss/grandpiano">РОЯЛІ</a></li>
                            <li><a class="dropdown-item" href="/keyss/piano">ПІАНІНО</a></li>
                            <li><a class="dropdown-item" href="/keyss/digitalpiano">ЦИФРОВЕ ПІАНІНО</a></li>
                            <li><a class="dropdown-item" href="/keyss/accessories">АКСЕСУАРИ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/drums/index/" role="button">
                            УДАРНІ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/drums/electric">ЕЛЕКТРОННІ УДАРНІ</a></li>
                            <li><a class="dropdown-item" href="/drums/acoustic">АКУСТИЧНІ УДАРНІ</a></li>
                            <li><a class="dropdown-item" href="/drums/bass">БАС БАРАБАНИ</a></li>
                            <li><a class="dropdown-item" href="/drums/accessories">АКСЕСУАРИ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/winds/index" role="button">
                            ДУХОВІ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/winds/harmonicas">ГУБНІ ГАРМОНІКИ</a></li>
                            <li><a class="dropdown-item" href="/winds/woodwinds">ДЕРЕВ'ЯННІ ДУХОВІ</a></li>
                            <li><a class="dropdown-item" href="/winds/copperwinds">МІДНІ ДУХОВІ</a></li>
                            <li><a class="dropdown-item" href="/winds/accessories">АКСЕСУАРИ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/bowed/index" role="button">
                            СМИЧКОВІ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/bowed/violins">СКРИПКИ</a></li>
                            <li><a class="dropdown-item" href="/bowed/cellos">ВІОЛОНЧЕЛІ</a></li>
                            <li><a class="dropdown-item" href="/bowed/doublebass">КОНТРАБАСИ</a></li>
                            <li><a class="dropdown-item" href="/bowed/accessories">АКСЕСУАРИ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/audio/index" role="button">
                            ЗВУК
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/audio/audiosystems">АКУСТИЧНІ СИСТЕМИ</a></li>
                            <li><a class="dropdown-item" href="/audio/loudspeakers">ГУЧНОМОВЦІ</a></li>
                            <li><a class="dropdown-item" href="/audio/subwoofers">САБВУФЕРИ</a></li>
                            <li><a class="dropdown-item" href="/audio/poweramps">ПІДСИЛЮВАЧІ ПОТУЖНОСТІ</a></li>
                            <li><a class="dropdown-item" href="/audio/accessories">АКСЕСУАРИ ДЛЯ ЗВУКОВОГО
                                    ОБЛАДНАННЯ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <h1><?= $Title ?></h1>
        <?= $Content ?>
    </div>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        </ul>
        <p class="text-center text-body-secondary">© 2024 Shkolna Aryna, Inc</p>
    </footer>
</div>

</body>
</html>
