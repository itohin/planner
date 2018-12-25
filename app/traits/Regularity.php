<?php

namespace App\Traits;

trait Regularity
{
    public function setTimer($timer)
    {
        $this->timer = $timer;
    }

    public function everyMinute()
    {
        $this->timer = '* * * * *';
    }

    public function everyTenMinutes()
    {
        $this->timer = '*/10 * * * *';
    }

    public function everyThirtyMinutes()
    {
        $this->timer = '*/30 * * * *';
    }
}