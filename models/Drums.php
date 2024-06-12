<?php

namespace models;

use core\Model;
/**
 * @property string $category Категорія
 * @property string $model Модель інструмента
 * @property string $brand Бренд інструмента
 * @property string $country Країна виробника
 * @property string $price Ціна
 * @property string $description Опис
 * @property string $count Кількість
 * @property string $image Фото товару
 * @property int $id ID
 */
class Drums extends Model
{
    public static $tableName = 'drums';
}