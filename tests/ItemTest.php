<?php

use App\Planner\Item;
use PHPUnit\Framework\TestCase;
use Carbon\Carbon;

class ItemTest extends TestCase
{
    /** @test */
    public function it_has_default_cron_timer()
    {
        $item = $this->getMockForAbstractClass(Item::class);

        $this->assertEquals($item->timer, '* * * * *');
    }

    /** @test */
    public function it_must_be_run()
    {
        $item = $this->getMockForAbstractClass(Item::class);

        $this->assertTrue($item->isDueToRun(Carbon::now()));
    }
}