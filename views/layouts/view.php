<?php
if (empty($model))
    $model = [];
$this->Title = $model['brand'] . ' ' . $model['model'];

?>
<style>
    .product-container {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        width: 60%;
        height: 90%;
        overflow: hidden;

    }

    .product-header {
        display: flex;
        padding: 20px;
        padding-bottom: 0px;
        background-color: #fff;
    }

    .product-image {
        flex: 0 0 150px;
        width: 100%;
        height: 450px;
        object-fit: cover;
        margin-right: 20px;
    }

    .product-details-container {
        padding-top: 30px;
        margin-left: 20%;
        text-align: right;
        font-family: ;
        font-size: 18px;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 20px;
        color: #28a745;
        margin-bottom: 10px;
    }

    .add-to-cart-btn {
        margin-top: 20px;
        align-self: flex-start;
    }

    .product-description {
        padding: 20px;
        font-size: 18px;
        padding-top: 0px;
        background-color: #fff;
    }
</style>
<div class="content">
    <div class="product-container mx-auto">
        <div class="product-header">
            <img src="data:image/jpg;base64,<?= \core\Model::getImage($model) ?>" class="product-image" alt="">
            <div class="product-details-container">
                <div class="product-name"><?= $model['brand'] . ' ' . $model['model'] ?></div>
                <div class="product-price"><?= $model['price'] . ' грн' ?></div>
                <div class="product-details">Бренд: <?= $model['brand'] ?></div>
                <div class="product-details">Модель: <?= $model['model'] ?></div>
                <div class="product-details">Категорія: <?= $model['category'] ?></div>
                <div class="product-details">Країна виробник: <?= $model['country'] ?></div>
                <button class="btn btn-primary add-to-cart-btn">Додати до кошика</button>
            </div>
        </div>
        <div class="product-description">
            <h5>Опис:<br></h5>
            <?= $model['description'] ?>
        </div>
    </div>
</div>

