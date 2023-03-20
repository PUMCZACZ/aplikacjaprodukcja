<?php
namespace App;

class Money
{
    public static function priceToCents(float $float): int
    {
        return floor($float * 100);
    }

    public static function centsToFloat(int $cents = null): string
    {
        if ($cents === null) {
            return 0;
        }

        return number_format($cents / 100, 2);
    }
}
