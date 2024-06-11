<?php

namespace controllers;

use core\Controller;

class DrumsController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }
    public function actionAccessories() : array
    {
        return $this->render();
    }
    public function actionElectric() : array
    {
        return $this->render();
    }
    public function actionAcoustic() : array
    {
        return $this->render();
    }
    public function actionBass() : array
    {
        return $this->render();
    }
}