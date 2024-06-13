<?php

namespace controllers;

use core\Controller;
use core\Core;
use Exception;
use models\Cartitems;
use models\Guitars;
use models\Users;

class GuitarsController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }

    public function actionUpdate($params)
    {
        if ($this->isPost) {
            if ($this->post->action === 'save') {
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
                if (!is_null($this->files->image) && $this->files->image['error'] === UPLOAD_ERR_OK) {
                    $image = $this->files->image;
                }
                if (!$this->isErrorMessageExists()) {
                    Guitars::saveProduct($this->post->productId, 'Guitars', $this->post->category,
                        $this->post->brand, $this->post->model, $this->post->country, $this->post->count,
                        $this->post->price, $this->post->description, $image);
                    return $this->redirect('/site/updatesuccess');
                }
            } else if ($this->post->action === 'delete') {
                Guitars::deleteById($this->post->productId);
                return $this->redirect('/site/deletesuccess');
            }
        }
        $guitar = Guitars::findById($params[0]);
        $this->template->setParam('model', $guitar);
        return $this->render('views/site/update.php');
    }

    public function actionView($params): array
    {
        $guitar = Guitars::findById($params[0]);
        $this->template->setParam('model', $guitar);
        if ($this->isPost) {
            if ($this->post->action === 'update') {
                return $this->redirect('/guitars/update/' . $this->post->productId);
            }
            if (Users::IsUserLogged()) {
                if ($this->post->action === 'addtocart')
                    Cartitems::addToCart(Core::get()->session->get('user')['id'], $this->post->productId, 'guitars', $this->post->price);
            }
        }
        return $this->render('views/layouts/view.php');
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