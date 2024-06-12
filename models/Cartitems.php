<?php

namespace models;

use core\Model;

/**
 * @property string $price Ціна
 * @property string $product_type Тип товару
 * @property int $product_id ID товару
 * @property int $user_id ID користувача
 * @property int $id ID
 */
class Cartitems extends Model
{
    public static $tableName = 'cartitems';
}