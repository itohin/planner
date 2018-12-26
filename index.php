<?php

require_once 'vendor/autoload.php';

use App\Core;
use App\Items\ExampleItem;

$core = new Core;

$core->add(new ExampleItem())->everyMinute();

$core->start();