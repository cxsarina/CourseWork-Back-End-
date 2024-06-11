<?php

namespace controllers;

use core\Controller;

class BowedController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }
    public function actionViolins(): array
    {
        return $this->render();
    }
    public function actionCellos(): array
    {
        return $this->render();
    }
    public function actionDoublebass(): array
    {
        return $this->render();
    }
    public function actionAccessories() : array
    {
        return $this->render();
    }
}