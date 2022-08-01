<?php
require __DIR__ . '/autoload.php';
include __DIR__ . '/simple_html_dom.php';


$params = explode('/', $_SERVER['REQUEST_URI']);
$classes = explode('?', implode($params));

$ctrl = !empty($classes[0]) ? ucfirst($classes[0]) : 'Mainpage';
$class = '\App\Controllers\\' . $ctrl . 'Controller';

$controller = new $class;
$controller->index();

