<?php
namespace App;

enum CompanyTagEnum: string
{
    case PARTSSUPPLIER = 'Parts Supplier';
    case RAWMATERIALSUPLIER = 'Raw Material Supplier';
    case BAGSUPPLIER = 'Bag Supplier';
    case CUSTOMER = 'Customer';

    public function translate(): string
    {
        return match ($this) {
            self::PARTSSUPPLIER      => 'Dostawca Części',
            self::RAWMATERIALSUPLIER => 'Dostawca Surowca',
            self::BAGSUPPLIER        => 'Dostawca Worków',
            self::CUSTOMER           => 'Klient',
        };
    }
}
