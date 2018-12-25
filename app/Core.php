<?php

namespace App;

class Core
{
    protected $events;

    public function getEvents()
    {
        return $this->events;
    }

    public function add($item)
    {
        $this->items[] = $item;
    }
}