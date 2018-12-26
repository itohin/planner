<?php

use PHPUnit\Framework\TestCase;
use App\Core;
use App\Planner\Item;
use Carbon\Carbon;

class CoreTest extends TestCase
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

    /** @test */
    public function it_cant_add_not_item()
    {
        $this->expectException(TypeError::class);

        $core = new Core();
        $core->add('something');

    }

    /** @test */
    public function it_can_set_date()
    {
        $core = new Core;

        $core->setDate(Carbon::now());

        $this->assertInstanceOf(Carbon::class, $core->getDate());

    }

    /** @test */
    public function it_has_default_date_setup()
    {
        $core = new Core;

        $this->assertInstanceOf(Carbon::class, $core->getDate());

    }

    /** @test */
    public function it_can_start_item()
    {
        $item = $this->getMockForAbstractClass(Item::class);
        $item->expects($this->once())->method('manage');

        $core = new Core();
        $core->add($item);

        $core->start();

    }

    /** @test */
    public function it_cant_start_unexpected_item()
    {
        $item = $this->getMockForAbstractClass(Item::class);
        $item->monthly();

        $item->expects($this->never())->method('manage');

        $core = new Core();
        $core->setDate(Carbon::create(2019, 2, 22, 0, 0, 0));
        $core->add($item);

        $core->start();

    }
}