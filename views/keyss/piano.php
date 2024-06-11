<?php
/** @var array $keyssarray */
/** @var array $brands */
/** @var array $countries */
$this->Title = 'Піаніно';
if (empty($keyssarray))
    $keyssarray = [];
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
        <?php foreach ($keyssarray as $keyss) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= $keyss['image'] . '.jpg' ?>" class="card-img-top" alt="Класична гітара">
                    <div class="card-body">
                        <h5 class="card-title"><?= $keyss['brand'] . ' ' . $keyss['model'] ?></h5>
                        <p class="card-text"><?= $keyss['price'] . ' грн' ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>