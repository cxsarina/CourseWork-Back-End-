<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Guitars;

class GuitarsController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }

    public function actionAccessories(): array
    {
        $guitars = new Guitars();
        $countries = $guitars->findCountries('Аксесуари');
        $brands = $guitars->findBrands('Аксесуари');
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
        $guitarsarray = $guitars->findByCondition($assocArray);
        $this->template->setParams(['guitarsarray' => $guitarsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }

    public function actionElectric(): array
    {
        $guitars = new Guitars();
        $countries = $guitars->findCountries('Електрогітара');
        $brands = $guitars->findBrands('Електрогітара');
        $assocArray = [];
        $assocArray ['category'] = 'Електрогітара';
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
        $guitarsarray = $guitars->findByCondition($assocArray);
        $this->template->setParams(['guitarsarray' => $guitarsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }

    public function actionClassic(): array
    {
        $guitars = new Guitars();
        $countries = $guitars->findCountries('Класична гітара');
        $brands = $guitars->findBrands('Класична гітара');
        $assocArray = [];
        $assocArray ['category'] = 'Класична гітара';
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
        $guitarsarray = $guitars->findByCondition($assocArray);
        $this->template->setParams(['guitarsarray' => $guitarsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }

    public function actionAcoustic(): array
    {
        $guitars = new Guitars();
        $countries = $guitars->findCountries('Акустична гітара');
        $brands = $guitars->findBrands('Акустична гітара');
        $assocArray = [];
        $assocArray ['category'] = 'Акустична гітара';
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
        $guitarsarray = $guitars->findByCondition($assocArray);
        $this->template->setParams(['guitarsarray' => $guitarsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }

    public function actionElectroacoustic(): array
    {
        $guitars = new Guitars();
        $countries = $guitars->findCountries('Електро-акустична гітара');
        $brands = $guitars->findBrands('Електро-акустична гітара');
        $assocArray = [];
        $assocArray ['category'] = 'Електро-акустична гітара';
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
        $guitarsarray = $guitars->findByCondition($assocArray);
        $this->template->setParams(['guitarsarray' => $guitarsarray, 'brands' => $brands, 'countries' => $countries]);
        return $this->render();
    }
}