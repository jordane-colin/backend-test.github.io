<?php
declare(strict_types=1);

class RobotController
{
    public function index() : bool
    {
        $flyingRobot = RobotFactory::createRobot('flying');
        $walkingRobot = RobotFactory::createRobot('walking');

        $flyingRobot->getName();
        $flyingRobot->move();

        $walkingRobot->getName();
        $walkingRobot->move();

        return true;
    }
}
