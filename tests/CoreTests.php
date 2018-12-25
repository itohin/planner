<?php

use PHPUnit\Framework\TestCase;
use App\Core;
use App\Planner\Item;

class CoreTests extends TestCase
{
    /** @test */
    public function it_can_get_items()
    {
        $core = new Core();

        $this->assertEquals([], $core->getItems());
    }

    /** @test */
    public function it_can_add_items()
    {
        $item = $this->getMockForAbstractClass(Item::class);
        $core = new Core();

        $core->add($item);

        $this->assertCount(1, $core->getItems());
    }
}