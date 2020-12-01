<?php
declare(strict_types=1);

class FlyingRobot extends Robot
{
    private CONST PREFIX = 'FL';

    public function __construct() {
        $this->reset(self::PREFIX);
    }

    public function move() : string {
        return 'Hey I\'m flying like a seagull<br/><br/>';
    }
}
