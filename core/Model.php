<?php

namespace core;

use models\Guitars;

class Model
{
    protected $fieldsArray;
    protected static $primaryKey = 'id';
    protected static $tableName = '';
    public function __construct()
    {
        $this->fieldsArray = [];
    }
    public function __set($name, $value)
    {
        $this->fieldsArray[$name] = $value;
    }
    public function __get($name)
    {
        return $this->fieldsArray[$name];
    }
    public static function deleteById($id)
    {
        Core::get()->db->delete(static::$tableName, [static::$primaryKey => $id]);
    }
    public static function deleteByCondition($conditionAssocArray)
    {
        Core::get()->db->delete(static::$tableName, $conditionAssocArray);
    }
    public static function findById($id)
    {
        $arr = Core::get()->db->select(static::$tableName,'*',[static::$primaryKey => $id]);
        if (count($arr)>0)
            return $arr[0];
        else
            return null;
    }
    public static function findByCondition($conditionAssocArray)
    {
        $arr = Core::get()->db->select(static::$tableName,'*',$conditionAssocArray);
        if (count($arr)>0)
            return $arr;
        else
            return null;
    }
    public static function findCountries($category) :array
    {
        $tableName = '\\models\\'.ucfirst(static::$tableName);
        $table = new $tableName();
        $array = $table->findByCondition(['category' => $category]);
        $countries = [];
        foreach ($array as $arr) {
            $countries [] = $arr['country'];
        }
        $countries = array_unique($countries);
        return $countries;
    }
    public static function findBrands($category) :array
    {
        $tableName = '\\models\\'.ucfirst(static::$tableName);
        $table = new $tableName();
        $array = $table->findByCondition(['category' => $category]);
        $brands = [];
        foreach ($array as $arr) {
            $brands [] = $arr['brand'];
        }
        $brands = array_unique($brands);
        return $brands;
    }
    public static function getImage($model)
    {
        $image = $model['image'];
        if (!empty($image))
            return base64_encode($image);
        else
            return null;
    }
    public function save()
    {
        $isInsert= false;
        if(!isset($this->{static::$primaryKey}))
            $isInsert= true;
        else{
            $value= $this->{static::$primaryKey};
            if(empty($value))
                $isInsert= true;
        }
        if ($isInsert) {
            Core::get()->db->insert(static::$tableName, $this->fieldsArray);
        } else {
            Core::get()->db->update(static::$tableName, $this->fieldsArray,
                [
                    static::$primaryKey => $this->{static::$primaryKey}
                ]);
        }
    }
}