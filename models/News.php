<?php

namespace models;

use core\Core;
use core\Model;

/**
 * @property string $title Заголовок новини
 * @property string $text Текст новини
 * @property string $short_text Короткий текст новини
 * @property string $date Дата новини
 * @property string $image Фото
 * @property int $id ID новини
 */
class News extends Model
{
    public static $tableName = 'news';
    public static function getDate($news): string
    {
        $dateTime = $news['date'];
        $dateTime = explode(' ', $dateTime);
        $date = $dateTime[0];
        $date = explode('-',$date);
        $date = array_reverse($date);
        return implode('.',$date);
    }
    public static function AddNews($title, $text, $shorttext, $date, $image){
        $news = new News();
        $news->title = $title;
        $news->text = $text;
        $news->short_text = $shorttext;
        $news->date = $date;
        $news->image = Model::getImageContent($image);
        $news->saveInsert();
    }
}