<?php
namespace App;

enum OrderTypeEnum: string
{
    case BIGBAG = 'bigbag';
    case BAG = 'bag';
    case LOOSE = 'loose';

    public function translate(): string
    {
        return match ($this) {
            self::BIGBAG => 'Big Bag',
            self::BAG    => 'Worki',
            self::LOOSE  => 'Luz',
        };
    }
}
