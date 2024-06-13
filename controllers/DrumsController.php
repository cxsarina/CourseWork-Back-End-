<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Cartitems;
use models\Drums;

class DrumsController extends Controller
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
                    Drums::saveProduct($this->post->productId, 'Drums', $this->post->category,
                        $this->post->brand, $this->post->model, $this->post->country, $this->post->count,
                        $this->post->price, $this->post->description, $image);
                    return $this->redirect('/site/updatesuccess');
                }
            }
            else if ($this->post->action === 'delete'){
                Drums::deleteById($this->post->productId);
                return $this->redirect('/site/deletesuccess');
            }
        }
        $drums = Drums::findById($params[0]);
        $this->template->setParam('model',$drums);
        return $this->render('views/site/update.php');
    }
    public function actionView($params): array
    {
        $drums = Drums::findById($params[0]);
        $this->template->setParam('model',$drums);
        if($this->isPost){
            if($this->post->action === 'update'){
                return $this->redirect('/drums/update/'.$this->post->productId);
            }
            else if ($this->post->action === 'addtocart'){
                Cartitems::addToCart(Core::get()->session->get('user')['id'],$this->post->productId,'drums',$this->post->price);
            }
        }
        return $this->render('views/layouts/view.php');
    }

    public function actionAccessories() : array
    {
        $drums = new Drums();
        $countries = $drums->findCountries('Аксесуари');
        $brands = $drums->findBrands('Аксесуари');
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
        $drumsarray = $drums->findByCondition($assocArray);
        $this->template->setParams(['drumsarray' => $drumsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionElectric() : array
    {
        $drums = new Drums();
        $countries = $drums->findCountries('Електронні ударні');
        $brands = $drums->findBrands('Електронні ударні');
        $assocArray = [];
        $assocArray ['category'] = 'Електронні ударні';
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
        $drumsarray = $drums->findByCondition($assocArray);
        $this->template->setParams(['drumsarray' => $drumsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionAcoustic() : array
    {
        $drums = new Drums();
        $countries = $drums->findCountries('Акустичні ударні');
        $brands = $drums->findBrands('Акустичні ударні');
        $assocArray = [];
        $assocArray ['category'] = 'Акустичні ударні';
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
        $drumsarray = $drums->findByCondition($assocArray);
        $this->template->setParams(['drumsarray' => $drumsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionBass() : array
    {
        $drums = new Drums();
        $countries = $drums->findCountries('Бас барабани');
        $brands = $drums->findBrands('Бас барабани');
        $assocArray = [];
        $assocArray ['category'] = 'Бас барабани';
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
        $drumsarray = $drums->findByCondition($assocArray);
        $this->template->setParams(['drumsarray' => $drumsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
}