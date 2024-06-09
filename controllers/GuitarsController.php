<?php

namespace controllers;

use core\Controller;

class GuitarsController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }

}