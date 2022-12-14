<?php

namespace App\Controllers;

use App\Model\City;
use App\Model\Weather;

class WeatherController
{
    public function index()
    {
        $city = new City();
        $foundCity = $city->findByName($_POST['city']);

        if (!$foundCity) {
            $error = ['message' => 'City was not found'];
            die(json_encode($error));
        }

        $cityId = $foundCity[0]->id;

        $weather = new Weather();
        $weatherForMonth = $weather->findByCityId($cityId);

        if (empty($weatherForMonth)) {
            $requestLink = 'https://www.gismeteo.ua/weather-' . $foundCity[0]->city_code . '/month/';

            $array = [];
            $array[':city_id'] = $cityId;
            $file = file_get_html($requestLink);

            foreach ($file->find('a.row-item') as $item) {
                foreach ($item->find('div.date') as $divDate) {
                    $array[':date'] = $divDate->innertext;
                }

                foreach ($item->find('div.temp') as $temp) {
                    $maxts = $temp->find('div.maxt');
                    foreach ($maxts as $maxt) {
                        $array[':temperature_max'] = substr($maxt->innertext, 38, 3);
                    }

                    $mints = $temp->find('div.mint');
                    foreach ($mints as $mint) {
                        $spanMin = $mint->find('span.unit_temperature_c');
                        foreach ($spanMin as $span) {
                            $array[':temperature_min'] = $span->innertext;
                        }
                    }
                }

                foreach ($item->find('div.icon') as $icon) {
                    $svgs = $icon->find('svg');
                    foreach ($svgs as $svg) {
                        $uses = $svg->find('use');
                        foreach ($uses as $use) {
                            $image = substr(substr($use->outertext, 18), 0, -3);
                            $array[':image'] = $image;
                        }
                    }
                }

                $weather->insert($array);
            }
            $forecast = $weather->findByCityId($cityId);
            die(json_encode($forecast));
        } else {
            $forecast = $weather->findByCityId($cityId);
            die(json_encode($forecast));
        }
    }
}
