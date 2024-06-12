<?php
/** @var array $drumsarray */
/** @var array $brands */
/** @var array $countries */
$this->Title = 'Бас барабани';
if (empty($drumsarray))
    $drumsarray = [];
?>
<style>
    .sidebar {
        position: absolute;
        top: 220px;
        width: 250px;
        background-color: #f8f9fa;
        border-right: 1px solid #dee2e6;
        border-left: 1px solid #dee2e6;
        padding-top: 20px;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        flex: 1;
    }

    .sidebar {
        padding-left: 5px;
    }

    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-img-top {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .col-md-4 {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

</style>
<div class="sidebar">
    <h5 class="text-center">Фільтри</h5>
    <form method="post" action="">
        <div class="mb-3 w-75">
            <label for="brand" class="form-label">Бренд</label>
            <select name="brand" class="form-select" id="brand">
                <option selected>Усі</option>
                <?php foreach ($brands as $brand) { ?>
                    <option value="<?= $brand ?>"><?= $brand ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3 w-75">
            <label for="category" class="form-label">Країна виробника</label>
            <select name="country" class="form-select" id="category">
                <option selected>Усі</option>
                <?php foreach ($countries as $country) { ?>
                    <option value="<?= $country ?>"><?= $country ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-50 ">Застосувати</button>
    </form>
</div>
<div class="content">
    <div class="row">
        <?php foreach ($drumsarray as $drums) { ?>
            <div class="col-md-4">
                <a style="text-decoration: none; color: inherit;" href="/drums/view/<?= $drums['id'] ?>">
                    <div class="card mb-4">
                        <img src="data:image/jpg;base64,<?= \core\Model::getImage($drums) ?>" class="card-img-top"
                             alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $drums['brand'] . ' ' . $drums['model'] ?></h5>
                            <p class="card-text"><?= $drums['price'] . ' грн' ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
