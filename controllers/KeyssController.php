<?php

namespace controllers;

use core\Controller;
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
                Keyss::saveProduct($this->post->productId,'Guitars',$this->post->category,
                    $this->post->brand,$this->post->model,$this->post->country,$this->post->count,
                    $this->post->price,$this->post->description,$this->post->image);
                return $this->redirect('site/updatesuccess');
            }
            else if ($this->post->action === 'delete'){
                Keyss::deleteById($this->post->productId);
                return $this->redirect('site/deletesuccess');
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