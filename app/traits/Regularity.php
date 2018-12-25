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
        $value = (array) $value;

        $timer = explode(' ', $this->timer);

        array_splice($timer, $place - 1, 1, $value);

        $timer = array_slice($timer, 0, 5);

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