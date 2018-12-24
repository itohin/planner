<?php

use App\Planner\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /** @test */
    public function it_has_default_cron_timer()
    {
        $item = $this->getMockForAbstractClass(Item::class);

        $this->assertEquals($item->timer, '* * * * *');
    }
}