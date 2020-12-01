<?php
declare(strict_types=1);

class WalkingRobot extends Robot
{
    private CONST PREFIX = 'WK';

    public function __construct()
    {
        $this->reset(self::PREFIX);
    }

    public function move() : string {
        echo 'Hey I\'m walking like a boss<br/><br/>';
    }
}
