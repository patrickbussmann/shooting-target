<?php

use ShootingTarget\Hit;
use ShootingTarget\Target;

/**
 * Class TargetTest.
 *
 * @author Patrick Bußmann <patrick.bussmann@bussmann-it.de>
 */
class TargetTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the target itself.
     */
    public function testTargetConstruction()
    {
        $hit = new Hit(10, 20);
        $target = new Target(1, 2, 3, 4, 5, [$hit]);
        $this->assertInstanceOf('ShootingTarget\\Target', $target);
        foreach ($target->getHits() as $hit) {
            $this->assertEquals(10, $hit->getX());
            $this->assertEquals(20, $hit->getY());
        }
    }

    /**
     * Test if hits added as expected.
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

    /**
     * Test if draw is callable.
     */
    public function testDrawTarget()
    {
        $target = new Target(0.5, 0.5, 2.5, 4, 10);
        $target->addHit(new Hit(0, 0, null, '#123456'));
        $target->addHit(new Hit(500, 500));
        $target->addHit(new Hit(-500, 500));
        $target->addHit(new Hit(500, -500));
        $target->addHit(new Hit(-500, -500));

        ob_start();
        $target->draw();
        $pictureString = ob_get_contents();
        ob_end_clean();

        $this->assertGreaterThanOrEqual(3318000, strlen($pictureString));
        $this->assertLessThanOrEqual(3319000, strlen($pictureString));

        ob_start();
        $target->draw(20, Target::DRAW_TYPE_GIF);
        ob_end_clean();

        ob_start();
        $target->draw(20, Target::DRAW_TYPE_JPEG);
        ob_end_clean();
    }
}
