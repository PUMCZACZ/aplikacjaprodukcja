<?php
namespace App;

enum ClientTypeEnum: string
{
    case RETAILCLIENT = 'retail client';
    case WHOLESALECLIENT = 'wholesale client';

    public function translate(): string
    {
        return match ($this) {
            self::RETAILCLIENT      => 'klient detaliczny',
            self::WHOLESALECLIENT   => 'klient hurtowy',
        };
    }
}
