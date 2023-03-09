<?php
namespace App;

enum ClientTypeEnum: string
{
    case RETAILCLIENT = 'retailclient';
    case WHOLESALECLIENT = 'wholesaleclient';

    public function translate(): string
    {
        return match ($this) {
            self::RETAILCLIENT      => 'klient detaliczny',
            self::WHOLESALECLIENT   => 'klient hurtowy',
        };
    }
}
