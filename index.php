<?php

require_once 'vendor/autoload.php';

$item = new \App\Items\ExampleItem();

$item->setTimer('new timer');

var_dump($item->timer);