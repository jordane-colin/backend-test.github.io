<?php
declare(strict_types=1);

class RobotFactory
{
    public static function createRobot(string $type) : Robot {
        switch ($type) {
            case 'flying':
                $robot = new FlyingRobot();
                break;
            case 'walking':
                $robot = new WalkingRobot();
                break;
            default:
                throw new \RuntimeException('Unknown Robot Type');
        }

        return $robot;
    }
}
