<?php
declare(strict_types=1);

class Robot implements RobotInterface
{
    protected $name;
    private static $usedNames = [];

    public function reset(string $prefix) : bool {
        echo 'I am resetted<br/><br/>';
        $this->name = $this->generateName($prefix);

        return true;
    }

    public function move() : string {
        return 'I\m moving';
    }

    public function getName() : string {
        return 'My name is '.$this->name.'<br/><br/>';
    }

    public function generateName(string $prefix) : string {
        $numericSuffix = substr(mt_rand(), 0, 3);
        $generatedName = $prefix . $numericSuffix.chr(random_int(65,90)).chr(random_int(65,90));

        if (!in_array($generatedName, self::$usedNames, true)) {
            self::$usedNames[] = $generatedName;
            return $generatedName;
        }

        return $this->generateName($prefix);
    }
}
