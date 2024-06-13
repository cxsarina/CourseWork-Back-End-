<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Audio;
use models\Cartitems;

class AudioController extends Controller
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
                if(!$this->isErrorMessageExists()){
                    Audio::saveProduct($this->post->productId, 'Audio', $this->post->category,
                        $this->post->brand, $this->post->model, $this->post->country, $this->post->count,
                        $this->post->price, $this->post->description, $image);
                    return $this->redirect('/site/updatesuccess');
                }
            }
            else if ($this->post->action === 'delete'){
                Audio::deleteById($this->post->productId);
                return $this->redirect('/site/deletesuccess');
            }
        }
        $audio = Audio::findById($params[0]);
        $this->template->setParam('model',$audio);
        return $this->render('views/site/update.php');
    }
    public function actionView($params): array
    {
        $audio = Audio::findById($params[0]);
        $this->template->setParam('model',$audio);
        if($this->isPost){
            if($this->post->action === 'update'){
                return $this->redirect('/audio/update/'.$this->post->productId);
            }
            else if ($this->post->action === 'addtocart'){
                Cartitems::addToCart(Core::get()->session->get('user')['id'],$this->post->productId,'audio',$this->post->price);
            }
        }
        return $this->render('views/layouts/view.php');
    }

    public function actionAudiosystems(): array
    {
        $audio = new Audio();
        $countries = $audio->findCountries('Акустична система');
        $brands = $audio->findBrands('Акустична система');
        $assocArray = [];
        $assocArray ['category'] = 'Акустична система';
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
        $audioarray = $audio->findByCondition($assocArray);
        $this->template->setParams(['audioarray' => $audioarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionSubwoofers(): array
    {
        $audio = new Audio();
        $countries = $audio->findCountries('Сабвуфер');
        $brands = $audio->findBrands('Сабвуфер');
        $assocArray = [];
        $assocArray ['category'] = 'Сабвуфер';
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
        $audioarray = $audio->findByCondition($assocArray);
        $this->template->setParams(['audioarray' => $audioarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionLoudspeakers(): array
    {
        $audio = new Audio();
        $countries = $audio->findCountries('Гучномовець');
        $brands = $audio->findBrands('Гучномовець');
        $assocArray = [];
        $assocArray ['category'] = 'Гучномовець';
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
        $audioarray = $audio->findByCondition($assocArray);
        $this->template->setParams(['audioarray' => $audioarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionPoweramps(): array
    {
        $audio = new Audio();
        $countries = $audio->findCountries('Підсилювач потужності');
        $brands = $audio->findBrands('Підсилювач потужності');
        $assocArray = [];
        $assocArray ['category'] = 'Підсилювач потужності';
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
        $audioarray = $audio->findByCondition($assocArray);
        $this->template->setParams(['audioarray' => $audioarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
    public function actionAccessories() : array
    {
        $audio = new Audio();
        $countries = $audio->findCountries('Аксесуари');
        $brands = $audio->findBrands('Аксесуари');
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
        $audioarray = $audio->findByCondition($assocArray);
        $this->template->setParams(['audioarray' => $audioarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
}