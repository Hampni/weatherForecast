<?php

namespace App\Controllers;

use App\Model\City;
use App\View;

class MainpageController
{

    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function index()
    {
        $cities = new City();
        $this->view->add('cities', $cities->findAll());
        $this->view->display(__DIR__ . '/../Templates/mainpage.php');
    }
}