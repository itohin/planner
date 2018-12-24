<?php

namespace App\Planner;

use Carbon\Carbon;
use Cron\CronExpression;

abstract class Item
{
    public $timer = '* * * * *';

    abstract public function manage();

    public function isDueToRun(Carbon $interval)
    {
        return CronExpression::factory($this->timer)->isDue($interval);
    }
}