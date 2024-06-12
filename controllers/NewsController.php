<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\News;
use models\Users;

class NewsController extends Controller
{
    public function actionAdd()
    {
        if ($this->isPost) {
            if (strlen($this->post->title) === 0)
                $this->addErrorMessage('Заголовок не вказано!');
            if (strlen($this->post->text) === 0)
                $this->addErrorMessage('Текст новини не вказано!');
            if (strlen($this->post->shorttext) === 0)
                $this->addErrorMessage('Короткий текст новини не вказано!');
            if (!is_null($this->files->image && $this->files->image['error'] === UPLOAD_ERR_OK) && !$this->isErrorMessageExists()) {
                try {
                    News::AddNews($this->post->title, $this->post->text, $this->post->shorttext, $this->post->date, $this->files->image);
                    return $this->redirect('/news/addsuccess');
                } catch (\Exception $e) {
                    $this->addErrorMessage("Не вдалося завантажити фото профілю: " . $e->getMessage());
                }
            }
        } else
            return $this->render();
    }

    public function actionAddsuccess()
    {
        return $this->render();
    }

    public function actionIndex()
    {
        $news = new News();
        $newsarray = $news->findByCondition(null);
        $this->template->setParam('newsarray', $newsarray);
        return $this->render();
    }

    public function actionView($params)
    {
        $news = News::findById($params[0]);
        $this->template->setParam('model', $news);
        return $this->render();
    }
}