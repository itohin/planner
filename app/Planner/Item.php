<?php

namespace App\Planner;

abstract class Item
{
    public $timer = '* * * * *';

    abstract public function manage();
}