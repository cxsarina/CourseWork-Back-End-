<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Bowed;
use models\Cartitems;

class BowedController extends Controller
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
                    Bowed::saveProduct($this->post->productId, 'Bowed', $this->post->category,
                        $this->post->brand, $this->post->model, $this->post->country, $this->post->count,
                        $this->post->price, $this->post->description, $image);
                    return $this->redirect('/site/updatesuccess');
                }
            }
            else if ($this->post->action === 'delete'){
                Bowed::deleteById($this->post->productId);
                return $this->redirect('/site/deletesuccess');
            }
        }
        $bowed = Bowed::findById($params[0]);
        $this->template->setParam('model',$bowed);
        return $this->render('views/site/update.php');
    }
    public function actionView($params): array
    {
        $bowed = Bowed::findById($params[0]);
        $this->template->setParam('model',$bowed);
        if($this->isPost){
            if($this->post->action === 'update'){
                return $this->redirect('/bowed/update/'.$this->post->productId);
            }
            else if ($this->post->action === 'addtocart'){
                Cartitems::addToCart(Core::get()->session->get('user')['id'],$this->post->productId,'bowed',$this->post->price);
            }
        }
        return $this->render('views/layouts/view.php');
    }

    public function actionViolins(): array
    {
        $bowed = new Bowed();
        $countries = $bowed->findCountries('Скрипка');
        $brands = $bowed->findBrands('Скрипка');
        $assocArray = [];
        $assocArray ['category'] = 'Скрипка';
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
        $bowedarray = $bowed->findByCondition($assocArray);
        $this->template->setParams(['bowedarray' => $bowedarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionCellos(): array
    {
        $bowed = new Bowed();
        $countries = $bowed->findCountries('Віолончель');
        $brands = $bowed->findBrands('Віолончель');
        $assocArray = [];
        $assocArray ['category'] = 'Віолончель';
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
        $bowedarray = $bowed->findByCondition($assocArray);
        $this->template->setParams(['bowedarray' => $bowedarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionDoublebass(): array
    {
        $bowed = new Bowed();
        $countries = $bowed->findCountries('Контрабас');
        $brands = $bowed->findBrands('Контрабас');
        $assocArray = [];
        $assocArray ['category'] = 'Контрабас';
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
        $bowedarray = $bowed->findByCondition($assocArray);
        $this->template->setParams(['bowedarray' => $bowedarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionAccessories() : array
    {
        $bowed = new Bowed();
        $countries = $bowed->findCountries('Аксесуари');
        $brands = $bowed->findBrands('Аксесуари');
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
        $bowedarray = $bowed->findByCondition($assocArray);
        $this->template->setParams(['bowedarray' => $bowedarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
}