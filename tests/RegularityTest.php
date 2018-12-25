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

    public function regularity()
    {
        $regularity = $this->getMockForTrait(Regularity::class);
        $regularity->timer = '* * * * *';

        return $regularity;
    }
}