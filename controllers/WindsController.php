<?php

namespace controllers;

use core\Controller;
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
                Winds::saveProduct($this->post->productId,'Guitars',$this->post->category,
                    $this->post->brand,$this->post->model,$this->post->country,$this->post->count,
                    $this->post->price,$this->post->description,$this->post->image);
                return $this->redirect('site/updatesuccess');
            }
            else if ($this->post->action === 'delete'){
                Winds::deleteById($this->post->productId);
                return $this->redirect('site/deletesuccess');
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