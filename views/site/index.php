<?php
/** @var array $guitarsarray */
$this->Title='Головна сторінка';
if (empty($guitarsarray))
    $guitarsarray = [];
?>
<style>
    .carousel-item{
        width: 100%;
        height: 500px;
    }
    .row{
        padding-top: 20px;
    }
    .col-md-4{
        padding: 10px;
    }
    .card > p {
        margin: 10px;
        text-align: right;
    }
</style>
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/systems.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/images/guitars.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/images/violins.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="content">
    <div class="row">
        <h2>Гітари</h2>
        <?php foreach ($guitarsarray as $guitar) { ?>
            <div class="col-md-4">
                <a style="text-decoration: none; color: inherit;" href="/guitars/view/<?= $guitar['id'] ?>">
                    <div class="card mb-4 h-100">
                        <?php if ($guitar['count'] > 0) : ?>
                            <p style="color: #28a745">♥ В наявності</p>
                        <?php else : ?>
                            <p style="color: #e12b2b">♥ Немає в наявності</p>
                        <?php endif; ?>
                        <img src="data:image/jpg;base64,<?= \core\Model::getImage($guitar) ?>" class="card-img-top"
                             alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $guitar['brand'] . ' ' . $guitar['model'] ?></h5>
                            <p class="card-text"><?= $guitar['price'] . ' грн' ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
