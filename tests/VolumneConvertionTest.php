<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Volume;

class VolumneConvertionTest extends TestCase
{
    /** @test */
    public function it_converts_from_cubic_meter_to_different_volume_units()
    {
        $volumne = new Volume(10, 'm3');

        $this->assertEquals(10000000000, $volumne->to('cubic millimeters'));
        $this->assertEquals(10000000, $volumne->to('cubic centimeter'));
        $this->assertEquals(10000, $volumne->to('cubic decimeter'));
        $this->assertEquals(0.01, $volumne->to('cubic dekameter'));
        $this->assertEquals(0.00001, $volumne->to('cubic hectometer'));
        $this->assertEquals(0.00000001, $volumne->to('cubic kilometer'));
    }

    /** @test */
    public function it_converts_from_different_volumne_units_to_cubic_meter()
    {
        $cubic_millimeters = new Volume(1, 'mm3');
        $cubic_centimeter = new Volume(1, 'cm3');
        $cubic_decimeter = new Volume(1, 'dm3');
        $cubic_dekameter = new Volume(1, 'dam3');
        $cubic_hectometer = new Volume(1, 'hm3');
        $cubic_kilometer = new Volume(1, 'km3');

        $this->assertEquals(0.000000001, $cubic_millimeters->to('cubic meter'));
        $this->assertEquals(0.000001, $cubic_centimeter->to('cubic meter'));
        $this->assertEquals(0.001, $cubic_decimeter->to('cubic meter'));
        $this->assertEquals(1000, $cubic_dekameter->to('cubic meter'));
        $this->assertEquals(1000000, $cubic_hectometer->to('cubic meter'));
        $this->assertEquals(1000000000, $cubic_kilometer->to('cubic meter'));
    }
}
