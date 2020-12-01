<?php
declare(strict_types=1);

class Luhn
{
    public function isValid(string $str): bool
    {
        $checkSum = 0;
        // We remove any whitespace in the string
        $str = str_replace(' ', '', $str);
        // We first check if str is null (cost less in execution time), then if empty and at least if str contain any non digit character
        if (null === $str || '' === $str || !ctype_digit($str)) {
            return false;
        }

        $length = strlen($str);
        // We start the iteration on str from the right, we take the 2nd digit each time
        for ($i = $length - 2; $i >= 0; $i -= 2) {
            $total = (int) $str[$i] * 2;
            if ($total > 9) {
                $total -= 9;
            }

            $checkSum += $total;
        }

        // Same thing, start from the right, but we take the other digit
        for ($i = $length - 1; $i >= 0; $i -= 2) {
            $checkSum += $str[$i];
        }

        return ($checkSum % 10) === 0;
    }
}
