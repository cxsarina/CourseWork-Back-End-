<?php

namespace controllers;

use core\Controller;
use models\Drums;

class DrumsController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }
    public function actionView($params): array
    {
        $drums = Drums::findById($params[0]);
        $this->template->setParam('model',$drums);
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