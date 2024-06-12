<?php

namespace controllers;

use core\Controller;
use models\Audio;

class AudioController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }
    public function actionView($params): array
    {
        $audio = Audio::findById($params[0]);
        $this->template->setParam('model',$audio);
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