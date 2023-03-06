<?php
namespace Tests\Unit;

use App\Money;
use Tests\TestCase;

class MoneyHelperTest extends TestCase
{
    /** @test */
    public function it_converts_cents_to_float()
    {
        // given
        $cents = 123;

        // when
        $floatValue = Money::centsToFloat($cents);

        // then
        $this->assertEquals(1.23, $floatValue);
    }

    /** @test */
    public function it_converts_float_to_cents()
    {
        // given
        $float = 1.24;
        // when
        $centsValue = Money::priceToCents($float);
        // then
        $this->assertEquals(124, $centsValue);
    }
}
