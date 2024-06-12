<?php

namespace controllers;

use core\Controller;
use core\Model;
use core\Template;
use models\Guitars;
use models\News;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $guitars = new Guitars();
        $guitarsarray = $guitars->findByCondition(null);
        $this->template->setParam('guitarsarray', $guitarsarray);
        return $this->render();
    }

    public function actionAddproduct()
    {
        if ($this->isPost) {
            if (strlen($this->post->category) === 0)
                $this->addErrorMessage('Підкатегорію не вказано!');
            if (strlen($this->post->brand) === 0)
                $this->addErrorMessage('Бренд не вказано!');
            if (strlen($this->post->model) === 0)
                $this->addErrorMessage('Модель не вказано!');
            if (strlen($this->post->count) === 0)
                $this->addErrorMessage('Кількість не вказано!');
            if (strlen($this->post->price) === 0)
                $this->addErrorMessage('Ціну не вказано!');
            if (strlen($this->post->description) === 0)
                $this->addErrorMessage('Немає опису!');
            if (!is_null($this->files->image && $this->files->image['error'] === UPLOAD_ERR_OK) && !$this->isErrorMessageExists()) {
                $country = $this->post->country;
                if ($this->post->country === '') {
                    $country = null;
                }
                Model::saveProduct(null,$this->post->table, $this->post->category, $this->post->brand, $this->post->model, $country, $this->post->count, $this->post->price, $this->post->description, $this->files->image);
                return $this->redirect('/site/addsuccess');
            }
        } else
            return $this->render('views/site/add.php');
    }

    public function actionAddsuccess()
    {
        return $this->render();
    }

    public function actionUpdatesuccess()
    {
        return $this->render();
    }
    public function actionDeletesuccess()
    {
        return $this->render();
    }
    public function actionCart()
    {
        return $this->render();
    }
}