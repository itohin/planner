<?php

namespace App\Planner;

use App\Traits\Regularity;
use Carbon\Carbon;
use Cron\CronExpression;

abstract class Item
{
    use Regularity;

    public $timer = '* * * * *';

    abstract public function manage();

    public function isDueToRun(Carbon $interval)
    {
        return CronExpression::factory($this->timer)->isDue($interval);
    }
}