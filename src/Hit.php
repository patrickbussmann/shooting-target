<?php

namespace ShootingTarget;

/**
 * Class Hit
 * @package ShootingTarget
 * @author Patrick Bußmann <patrick.bussmann@bussmann-it.de>
 */
class Hit
{
    /**
     * @var float the x coordinate of the hit
     */
    private $x;

    /**
     * @var float the y coordinate of the hit
     */
    private $y;

    /**
     * @var null|string the label of this hit if needed, defaults to hit number
     */
    private $label;

    /**
     * @var null|string the hex color for the hit
     */
    private $color;

    /**
     * Hit constructor.
     *
     * @param float $x
     * @param float $y
     * @param null|string $label
     * @param null|string $color
     */
    public function __construct($x, $y, $label = null, $color = null)
    {
        $this->x = $x;
        $this->y = $y;
        $this->label = $label;
        $this->color = $color;
    }

    /**
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @return null|string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return null|string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Get the divider of the hit
     *
     * @param float $fromX defaults to the middle of the target: 0
     * @param float $fromY defaults to the middle of the target: 0
     *
     * @return float the divider
     */
    public function getDivider($fromX = 0.0, $fromY = 0.0)
    {
        return sqrt(pow($this->getX() - $fromX, 2) + pow($fromY - $this->getY(), 2));
    }
}
