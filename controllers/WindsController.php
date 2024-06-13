<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Cartitems;
use models\Winds;

class WindsController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }
    public function actionUpdate($params)
    {
        if($this->isPost){
            if($this->post->action === 'save'){
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
                $image = null;
                if (!is_null($this->files->image && $this->files->image['error'] === UPLOAD_ERR_OK)) {
                    $image = $this->files->image;
                }
                if(!$this->isErrorMessageExists()) {
                    Winds::saveProduct($this->post->productId, 'Winds', $this->post->category,
                        $this->post->brand, $this->post->model, $this->post->country, $this->post->count,
                        $this->post->price, $this->post->description, $image);
                    return $this->redirect('/site/updatesuccess');
                }
            }
            else if ($this->post->action === 'delete'){
                Winds::deleteById($this->post->productId);
                return $this->redirect('/site/deletesuccess');
            }
        }
        $winds = Winds::findById($params[0]);
        $this->template->setParam('model',$winds);
        return $this->render('views/site/update.php');
    }
    public function actionView($params): array
    {
        $winds = Winds::findById($params[0]);
        $this->template->setParam('model',$winds);
        if($this->isPost){
            if($this->post->action === 'update'){
                return $this->redirect('/winds/update/'.$this->post->productId);
            }
            else if ($this->post->action === 'addtocart'){
                Cartitems::addToCart(Core::get()->session->get('user')['id'],$this->post->productId,'winds',$this->post->price);
            }
        }
        return $this->render('views/layouts/view.php');
    }

    public function actionHarmonicas() : array
    {
        $winds = new Winds();
        $countries = $winds->findCountries('Губна гармоніка');
        $brands = $winds->findBrands('Губна гармоніка');
        $assocArray = [];
        $assocArray ['category'] = 'Губна гармоніка';
        if ($this->isPost) {
            $brand = $this->post->brand;
            if (!empty($brand) && $brand != 'Усі') {
                $assocArray ['brand'] = $this->post->brand;
            }
            $country = $this->post->country;
            if (!empty($country) && $country != 'Усі') {
                $assocArray ['country'] = $this->post->country;
            }
        }
        $windsarray = $winds->findByCondition($assocArray);
        $this->template->setParams(['windsarray' => $windsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionWoodwinds() : array
    {
        $winds = new Winds();
        $countries = $winds->findCountries("Дерев'яні духові");
        $brands = $winds->findBrands("Дерев'яні духові");
        $assocArray = [];
        $assocArray ['category'] = "Дерев'яні духові";
        if ($this->isPost) {
            $brand = $this->post->brand;
            if (!empty($brand) && $brand != 'Усі') {
                $assocArray ['brand'] = $this->post->brand;
            }
            $country = $this->post->country;
            if (!empty($country) && $country != 'Усі') {
                $assocArray ['country'] = $this->post->country;
            }
        }
        $windsarray = $winds->findByCondition($assocArray);
        $this->template->setParams(['windsarray' => $windsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionCopperwinds() : array
    {
        $winds = new Winds();
        $countries = $winds->findCountries('Мідні духові');
        $brands = $winds->findBrands('Мідні духові');
        $assocArray = [];
        $assocArray ['category'] = 'Мідні духові';
        if ($this->isPost) {
            $brand = $this->post->brand;
            if (!empty($brand) && $brand != 'Усі') {
                $assocArray ['brand'] = $this->post->brand;
            }
            $country = $this->post->country;
            if (!empty($country) && $country != 'Усі') {
                $assocArray ['country'] = $this->post->country;
            }
        }
        $windsarray = $winds->findByCondition($assocArray);
        $this->template->setParams(['windsarray' => $windsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionAccessories() : array
    {
        $winds = new Winds();
        $countries = $winds->findCountries('Аксесуари');
        $brands = $winds->findBrands('Аксесуари');
        $assocArray = [];
        $assocArray ['category'] = 'Аксесуари';
        if ($this->isPost) {
            $brand = $this->post->brand;
            if (!empty($brand) && $brand != 'Усі') {
                $assocArray ['brand'] = $this->post->brand;
            }
            $country = $this->post->country;
            if (!empty($country) && $country != 'Усі') {
                $assocArray ['country'] = $this->post->country;
            }
        }
        $windsarray = $winds->findByCondition($assocArray);
        $this->template->setParams(['windsarray' => $windsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
}