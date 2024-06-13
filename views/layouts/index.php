<?php
/** @var string $Title */

/** @var string $Content */

use core\Core;
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
$current_page = $_SERVER['REQUEST_URI'];
$show_search = true;
$pages_with_search = [
    '/news/index',
    '/news/view',
];
foreach ($pages_with_search as $page) {
    if (strpos($current_page, $page) !== false) {
        $show_search = false;
        break;
    }
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
            z-index: -1;
        }

        .background-icons img {
            position: absolute;
            width: 70px;
            height: 70px;
            opacity: 0.2;
        }

        .container {
            font-family: "Comic Sans MS";
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            font-size: 12px;
            color: white;
            font-weight: bold;
            font-family: "Arial";
        }

        .dropdown-toggle::after {
            margin-top: 15px;
        }

        .cart-btn {
            margin-right: 10px;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const iconsContainer = document.querySelector('.background-icons');
            const icons = document.querySelectorAll(".background-icons img");

            iconsContainer.style.height = document.documentElement.scrollHeight + 'px';

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
                <?php if ($show_search): ?>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex" role="search" method="post" action="/site/search/">
                        <input type="search" class="form-control" placeholder="Пошук..." aria-label="Search" id="search-input" name="searchQuery">
                        <button type="submit" class="btn btn-outline-dark" style="margin-left: 3px" name="action" value="search">Пошук</button>
                    </form>
                <?php endif; ?>
                <?php if (Users::IsUserLogged()) :
                    $user = Core::get()->session->get('user');
                    $userInitials = Users::getInitials($user); ?>
                    <a href="/cartitems/index">
                        <button type="button" class="btn btn-outline-dark cart-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"></path>
                            </svg>
                        </button>
                    </a>
                    <div class="dropdown text-end">
                        <a href="#" class="d-flex link-body-emphasis text-decoration-none dropdown-toggle"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <div id="avatar-container"></div>
                        </a>
                        <ul class="dropdown-menu text-small">
                            <?php if (Users::IsUserAdmin()) : ?>
                                <li><a class="dropdown-item" href="/news/add">Додати новину</a></li>
                                <li><a class="dropdown-item" href="/site/addproduct">Додати товар</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            <?php endif; ?>
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
        <p class="text-center text-body-secondary">© 2024 Shkolna Aryna</p>
    </footer>
</div>
</body>
<script>
    const userInitials = "<?php echo $userInitials; ?>";

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function createAvatar(initials) {
        const avatar = document.getElementById('avatar-container');
        avatar.className = 'avatar';
        avatar.style.backgroundColor = getRandomColor();
        avatar.textContent = initials;
    }

    createAvatar(userInitials);
</script>
</html>
