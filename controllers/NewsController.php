<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\News;

class NewsController extends Controller
{
    public function actionAdd()
    {
        return $this->render();
    }

    public function actionIndex()
    {
        $db = Core::get()->db;

        $news = new News();
        $news->id = 1;
        $news->title = '!! news !!';
        $news->text = '!! news !!';
        $news->short_text = '!! news !!';
        $news->date = '2024-04-28 19:00:00';
        $news->save();
        /*$rows = $db->select("news",["title"],[
            'id' => 1
        ]);*/
        /*$db->insert('news',[
            'title' => 'Заголовок',
            'text' => 'text',
            'short_text' => 'short_text',
            'date' => '2024-04-28 18:00:00'
        ]);*/
        /*$db->delete('news',[
           'id' => 4
        ]);*/
        /*$db->update('news',[
            'title' => 'new title'
        ],
            [
                'id' => 1
            ]);*/

        return $this->render();
    }

    public function actionView($params)
    {
        return $this->render();
    }
}