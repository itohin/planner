<?php

namespace App\Traits;

trait Regularity
{
    public function setTimer($timer)
    {
        $this->timer = $timer;

        return $this;
    }

    public function changeTimer($place, $value)
    {
        $timer = explode(' ', $this->timer);

        array_splice($timer, $place - 1, 1, $value);

        return $this->setTimer(implode(' ', $timer));
    }

    public function everyMinute()
    {
        $this->timer = '* * * * *';

        return $this;
    }

    public function everyTenMinutes()
    {
        $this->timer = '*/10 * * * *';

        return $this;
    }

    public function everyThirtyMinutes()
    {
        $this->timer = '*/30 * * * *';

        return $this;
    }
}