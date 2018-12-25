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
        return $this->setTimer($this->timer);
    }

    public function everyTenMinutes()
    {
        return $this->changeTimer(1, '*/10');
    }

    public function everyThirtyMinutes()
    {
        return $this->changeTimer(1, '*/30');
    }

    public function hourlyAt($minute = 0)
    {
        return $this->changeTimer(1, $minute);
    }

    public function hourly()
    {
        return $this->hourlyAt(1);
    }

    public function dailyAt($hour = 0, $minute = 0)
    {
        return $this->changeTimer(1, [$minute, $hour]);
    }

    public function daily()
    {
        return $this->dailyAt(0, 0);
    }

    public function days()
    {
        return $this->changeTimer(5, implode(',', func_get_args() ?: ['*']));
    }

    public function mondays()
    {
        return $this->days(1);
    }

    public function tuesdays()
    {
        return $this->days(2);
    }

    public function wednesdays()
    {
        return $this->days(3);
    }

    public function thursdays()
    {
        return $this->days(4);
    }

    public function fridays()
    {
        return $this->days(5);
    }

    public function saturdays()
    {
        return $this->days(6);
    }

    public function sundays()
    {
        return $this->days(7);
    }
}