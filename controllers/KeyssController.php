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
    public function actionSynthesizers() : array
    {
        return $this->render();
    }
    public function actionGrandpiano() : array
    {
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
        return $this->render();
    }
    public function actionAccessories() : array
    {
        return $this->render();
    }
}