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

    public function start()
    {
        foreach ($this->getItems() as $item){
            if(!$item->isDueToRun($this->getDate())){
                continue;
            }

            $item->manage();
        }
    }

    public function add(Item $item)
    {
        $this->items[] = $item;

        return $item;
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