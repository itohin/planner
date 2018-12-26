<?php

namespace App\Items;

use App\Planner\Item;

class ExampleItem extends Item
{
    public function manage()
    {
        var_dump($this->timer);
    }
}