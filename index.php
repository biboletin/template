<?php

include __DIR__ . '/vendor/autoload.php';

use Biboletin\Template\View;

$view = new View();
$view->data(['title' => 'Site title']);
$view->template('index');
echo $view->render();

// $view->clearCache();

