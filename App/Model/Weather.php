<?php

namespace App\Model;

use App\Db;

class Weather
{
    public function findByCityId($city_id)
    {
        $db = new Db();
        $sql = "SELECT * FROM city_weather WHERE city_id=:city_id";
        return $db->query($sql, [':city_id' => $city_id]);
    }

    public function insert($params)
    {
        $db = new Db();
        $sql = "INSERT INTO `city_weather`(`city_id`, `date`, `temperature_max`, `temperature_min`, `image`) 
                VALUES (:city_id,:date,:temperature_max,:temperature_min, :image)";
        $db->query($sql, $params);
    }
}
