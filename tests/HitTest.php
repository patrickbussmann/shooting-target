<?php

use ShootingTarget\Hit;

/**
 * Class HitTest
 * @author Patrick Bußmann <patrick.bussmann@bussmann-it.de>
 */
class HitTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the hit itself
     */
    public function testHit()
    {
        $hit = new Hit(730, 132, 'Test', '#123ABC');
        $this->assertInstanceOf('ShootingTarget\\Hit', $hit);
        $this->assertEquals(730, $hit->getX());
        $this->assertEquals(132, $hit->getY());
        $this->assertEquals('Test', $hit->getLabel());
        $this->assertEquals('#123ABC', $hit->getColor());
        $this->assertEquals(741.840, round($hit->getDivider(), 2));
    }
}
