<?php
namespace Tests\Unit;

use Tests\TestCase;

class StringInterpolationTest extends TestCase
{
    /** @test */
    public function it_interpolates_string()
    {
        // given
        $a = 'prefix';
        $b = 123;
        $c = 'suffix';

        // when
        $string = $a . '_' . $b . '_' . $c;
        $string2 = "{$a}_{$b}_{$c}";

        // then
        $this->assertEquals('prefix_123_suffix', $string);
        $this->assertEquals('prefix_123_suffix', $string2);
    }
}
