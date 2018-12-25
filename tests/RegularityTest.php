<?php

use PHPUnit\Framework\TestCase;
use App\Traits\Regularity;

class RegularityTest extends TestCase
{
    /** @test */
    public function it_can_set_timer()
    {
        $regularity = $this->regularity();
        $regularity->setTimer('new timer');

        $this->assertEquals($regularity->timer, 'new timer');
    }

    /** @test */
    public function it_can_change_timer()
    {
        $regularity = $this->regularity();
        $regularity->changeTimer(1, 1);

        $this->assertEquals($regularity->timer, '1 * * * *');
    }

    /** @test */
    public function it_can_change_timer_with_array()
    {
        $regularity = $this->regularity();
        $regularity->changeTimer(5, [1, 2]);

        $this->assertEquals($regularity->timer, '* * * * 1');
    }

    /** @test */
    public function it_can_set_every_minute()
    {
        $regularity = $this->regularity();
        $regularity->everyMinute();

        $this->assertEquals($regularity->timer, '* * * * *');
    }

    /** @test */
    public function it_can_set_every_ten_minutes()
    {
        $regularity = $this->regularity();
        $regularity->everyTenMinutes();

        $this->assertEquals($regularity->timer, '*/10 * * * *');
    }

    /** @test */
    public function it_can_set_every_thirty_minutes()
    {
        $regularity = $this->regularity();
        $regularity->everyThirtyMinutes();

        $this->assertEquals($regularity->timer, '*/30 * * * *');
    }

    /** @test */
    public function it_can_set_hourly_at()
    {
        $regularity = $this->regularity();
        $regularity->hourlyAt(45);

        $this->assertEquals($regularity->timer, '45 * * * *');
    }

    /** @test */
    public function it_can_set_hourly()
    {
        $regularity = $this->regularity();
        $regularity->hourly();

        $this->assertEquals($regularity->timer, '1 * * * *');
    }

    /** @test */
    public function it_can_set_daily_at()
    {
        $regularity = $this->regularity();
        $regularity->dailyAt(12, 30);

        $this->assertEquals($regularity->timer, '30 12 * * *');
    }

    /** @test */
    public function it_can_set_daily()
    {
        $regularity = $this->regularity();
        $regularity->daily();

        $this->assertEquals($regularity->timer, '0 0 * * *');
    }

    /** @test */
    public function it_can_set_days()
    {
        $regularity = $this->regularity();
        $regularity->days(1, 3, 5);

        $this->assertEquals($regularity->timer, '* * * * 1,3,5');
    }

    public function regularity()
    {
        $regularity = $this->getMockForTrait(Regularity::class);
        $regularity->timer = '* * * * *';

        return $regularity;
    }
}