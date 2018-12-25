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

    /** @test */
    public function it_can_set_mondays()
    {
        $regularity = $this->regularity();
        $regularity->mondays();

        $this->assertEquals($regularity->timer, '* * * * 1');
    }

    /** @test */
    public function it_can_set_tuesdays()
    {
        $regularity = $this->regularity();
        $regularity->tuesdays();

        $this->assertEquals($regularity->timer, '* * * * 2');
    }

    /** @test */
    public function it_can_set_wednesdays()
    {
        $regularity = $this->regularity();
        $regularity->wednesdays();

        $this->assertEquals($regularity->timer, '* * * * 3');
    }

    /** @test */
    public function it_can_set_thursdays()
    {
        $regularity = $this->regularity();
        $regularity->thursdays();

        $this->assertEquals($regularity->timer, '* * * * 4');
    }

    /** @test */
    public function it_can_set_fridays()
    {
        $regularity = $this->regularity();
        $regularity->fridays();

        $this->assertEquals($regularity->timer, '* * * * 5');
    }

    /** @test */
    public function it_can_set_saturdays()
    {
        $regularity = $this->regularity();
        $regularity->saturdays();

        $this->assertEquals($regularity->timer, '* * * * 6');
    }

    /** @test */
    public function it_can_set_sundays()
    {
        $regularity = $this->regularity();
        $regularity->sundays();

        $this->assertEquals($regularity->timer, '* * * * 7');
    }

    public function regularity()
    {
        $regularity = $this->getMockForTrait(Regularity::class);
        $regularity->timer = '* * * * *';

        return $regularity;
    }
}