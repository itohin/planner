<?php

use PHPUnit\Framework\TestCase;
use App\Traits\Regularity;

class RegularityTest extends TestCase
{
    /** @test */
    public function it_can_set_timer()
    {
        $regularity = $this->getMockForTrait(Regularity::class);
        $regularity->timer = '* * * * *';

        $regularity->setTimer('new timer');

        $this->assertEquals($regularity->timer, 'new timer');
    }
}