<?php
declare(strict_types=1);

class QueenAttack
{
    /**
     * @param int $i
     * @param int $j
     * @return bool
     */
    public function placeQueen(int $i, int $j): bool
    {
        if ($i < 0 || $j < 0) {
            throw new InvalidArgumentException('Coordinates must be positive.');
        }
        if ($i > 7 || $j > 7) {
            throw new InvalidArgumentException('Coordinates are out of the chest board :o.');
        }

        return true;
    }

    /**
     * [2,3], [5,6]
     * [7,4], [5,6]
     * _ _ _ _ _ _ _ _ 0
     * _ _ _ _ _ _ _ _ 1
     * _ _ _ W _ _ _ _ 2
     * _ _ _ _ _ _ _ _ 3
     * _ _ _ _ _ _ _ _ 4
     * _ _ _ _ _ _ B _ 5
     * _ _ _ _ _ _ _ _ 6
     * _ _ _ _ W _ _ _ 7
     * 0 1 2 3 4 5 6 7
     *
     * @param int[] $white Coordinates of the white Queen
     * @param int[] $black Coordinates of the black Queen
     * @return bool
     * @throws InvalidArgumentException
     */
    public function canAttack(array $white, array $black): bool
    {
        [$iw, $jw] = $white;
        [$ib, $jb] = $black;

        // Throw exception if coordinates are not valid for the white or black piece
        $this->placeQueen($iw, $jw);
        $this->placeQueen($ib, $jb);

        //First we check if it's on the same row
        //Second we check if it's on the same column
        //Finally if it's on the same diagonal
        return ($iw === $ib)
            || ($jw === $jb)
            || abs($iw - $ib) === abs($jw - $jb);
    }
}
