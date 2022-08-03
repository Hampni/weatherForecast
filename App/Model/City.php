<?php

namespace App\Model;

use App\Db;

class City
{
    public function findAll()
    {
        $db = new Db();
        $sql = "SELECT * FROM cities";
        return $db->query($sql);
    }

    public function findByName($name)
    {
        $db = new Db();
        $sql = "SELECT * FROM cities WHERE name=:name";
        return $db->query($sql, [':name' => $name]);
    }
}
