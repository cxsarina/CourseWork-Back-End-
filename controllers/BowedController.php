<?php

namespace controllers;

use core\Controller;
use models\Bowed;

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
                Bowed::saveProduct($this->post->productId,'Guitars',$this->post->category,
                    $this->post->brand,$this->post->model,$this->post->country,$this->post->count,
                    $this->post->price,$this->post->description,$this->post->image);
                return $this->redirect('site/updatesuccess');
            }
            else if ($this->post->action === 'delete'){
                Bowed::deleteById($this->post->productId);
                return $this->redirect('site/deletesuccess');
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