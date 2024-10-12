<?php

use Knd\PhpMathBiblio\CoreMath;
use PHPUnit\Framework\TestCase;
use Knd\PhpMathBiblio\CivilEngineering;

class CoreMathTest extends TestCase
{
    public function testMatrixAddition()
    {
        $matrixA = [[1, 2], [3, 4]];
        $matrixB = [[5, 6], [7, 8]];

        $expected = [[6, 8], [10, 12]];
        $this->assertEquals($expected, CoreMath::matrixAdd($matrixA, $matrixB));
    }

    public function testStressCalculation()
    {
        $force = 100;  // Newtons
        $area = 0.05;  // m^2

        $expected = 2000; // Pa
        $this->assertEquals($expected, CivilEngineering::stress($force, $area));
    }
}
