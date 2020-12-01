<?php
declare(strict_types=1);

interface RobotInterface
{
    public function reset(string $prefix) : bool;
    public function move() : string;

    public function generateName(string $prefix) : string;

    public function getName() : string;
}
