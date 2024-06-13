<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Cartitems;
use models\Keyss;

class KeyssController extends Controller
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
                    Keyss::saveProduct($this->post->productId, 'Keyss', $this->post->category,
                        $this->post->brand, $this->post->model, $this->post->country, $this->post->count,
                        $this->post->price, $this->post->description, $image);
                    return $this->redirect('/site/updatesuccess');
                }
            }
            else if ($this->post->action === 'delete'){
                Keyss::deleteById($this->post->productId);
                return $this->redirect('/site/deletesuccess');
            }
        }
        $keys = Keyss::findById($params[0]);
        $this->template->setParam('model',$keys);
        return $this->render('views/site/update.php');
    }
    public function actionView($params): array
    {
        $keys = Keyss::findById($params[0]);
        $this->template->setParam('model',$keys);
        if($this->isPost){
            if($this->post->action === 'update'){
                return $this->redirect('/keyss/update/'.$this->post->productId);
            }
            else if ($this->post->action === 'addtocart'){
                Cartitems::addToCart(Core::get()->session->get('user')['id'],$this->post->productId,'keyss',$this->post->price);
            }
        }
        return $this->render('views/layouts/view.php');
    }

    public function actionSynthesizers() : array
    {
        $keys = new Keyss();
        $countries = $keys->findCountries('Синтезатор');
        $brands = $keys->findBrands('Синтезатор');
        $assocArray = [];
        $assocArray ['category'] = 'Синтезатор';
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
        $keyssarray = $keys->findByCondition($assocArray);
        $this->template->setParams(['keyssarray' => $keyssarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionGrandpiano() : array
    {
        $keys = new Keyss();
        $countries = $keys->findCountries('Рояль');
        $brands = $keys->findBrands('Рояль');
        $assocArray = [];
        $assocArray ['category'] = 'Рояль';
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
        $keyssarray = $keys->findByCondition($assocArray);
        $this->template->setParams(['keyssarray' => $keyssarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionPiano() : array
    {
        $keys = new Keyss();
        $countries = $keys->findCountries('Піаніно');
        $brands = $keys->findBrands('Піаніно');
        $assocArray = [];
        $assocArray ['category'] = 'Піаніно';
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
        $keyssarray = $keys->findByCondition($assocArray);
        $this->template->setParams(['keyssarray' => $keyssarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionDigitalpiano() : array
    {
        $keys = new Keyss();
        $countries = $keys->findCountries('Цифрове піаніно');
        $brands = $keys->findBrands('Цифрове піаніно');
        $assocArray = [];
        $assocArray ['category'] = 'Цифрове піаніно';
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
        $keyssarray = $keys->findByCondition($assocArray);
        $this->template->setParams(['keyssarray' => $keyssarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionAccessories() : array
    {
        $keys = new Keyss();
        $countries = $keys->findCountries('Аксесуари');
        $brands = $keys->findBrands('Аксесуари');
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
        $keyssarray = $keys->findByCondition($assocArray);
        $this->template->setParams(['keyssarray' => $keyssarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
}