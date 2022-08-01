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

        $dom = file_get_html('https://www.gismeteo.ua/weather-kharkiv-14410/month/');
        $temperature = $dom->find('div.maxt');

        $this->view->add('temperature', $temperature);
        $this->view->display(__DIR__ . '/../Templates/mainpage.php');
    }
}