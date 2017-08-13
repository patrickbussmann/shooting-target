<?php

use ShootingTarget\Hit;
use ShootingTarget\Target;

/**
 * Class TargetTest
 * @author Patrick Bußmann <patrick.bussmann@bussmann-it.de>
 */
class TargetTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the target itself
     */
    public function testTargetConstruction()
    {
        $target = new Target();
        $this->assertInstanceOf('ShootingTarget\\Target', $target);
    }

    /**
     * Test if hits added as expected
     */
    public function testAddingHits()
    {
        $target = new Target();
        $hit = new Hit(0, 0);
        $target->setHits($hit);
        $this->assertEquals([$hit], $target->getHits());
        $target->addHit($hit);
        $this->assertEquals([$hit], $target->getHits());
        $secondHit = new Hit(1000, 1000);
        $target->addHit($secondHit);
        $this->assertEquals([$hit, $secondHit], $target->getHits());
        $target->setHits();
        $this->assertEquals([], $target->getHits());
    }
}
