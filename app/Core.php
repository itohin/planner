<?php

namespace App;

use App\Planner\Item;
use Carbon\Carbon;

class Core
{
    protected $items = [];

    protected $date;

    public function getItems()
    {
        return $this->items;
    }

    public function add(Item $item)
    {
        $this->items[] = $item;
    }

    public function setDate(Carbon $date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        if(!$this->date){
            return Carbon::now();
        }
        return $this->date;
    }
}