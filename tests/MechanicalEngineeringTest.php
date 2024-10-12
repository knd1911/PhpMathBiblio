<?php

use PHPUnit\Framework\TestCase;
use Knd\PhpMathBiblio\CivilEngineering;
use Knd\PhpMathBiblio\MechanicalEngineering;

class MechanicalEngineeringTest extends TestCase
{
    public function testCalculateForce()
    {
        $mass = 10; // kg
        $acceleration = 5; // m/s^2
        $expected = 50; // N
        $this->assertEquals($expected, MechanicalEngineering::calculateForce($mass, $acceleration));
    }

    public function testCalculateMoment()
    {
        $force = 100; // N
        $distance = 0.5; // m
        $expected = 50; // Nm
        $this->assertEquals($expected, MechanicalEngineering::calculateMoment($force, $distance));
    }

    public function testCalculateKineticEnergy()
    {
        $mass = 10; // kg
        $velocity = 2; // m/s
        $expected = 20; // J
        $this->assertEquals($expected, MechanicalEngineering::calculateKineticEnergy($mass, $velocity));
    }

    public function testCalculatePressure()
    {
        $force = 200; // N
        $area = 0.1; // m^2
        $expected = 2000; // Pa
        $this->assertEquals($expected, MechanicalEngineering::calculatePressure($force, $area));
    }

    public function testCalculateConcreteResistance()
    {
        $concreteStrength = 30; // MPa
        $area = 2; // m²
        $expectedWeight = 6116207.95; // poids maximal attendu en kg
        
        // Vérifie que la valeur calculée est proche de la valeur attendue
        $this->assertEqualsWithDelta($expectedWeight, MechanicalEngineering::calculateConcreteResistance($concreteStrength, $area), 0.1);
    }

    public function testCalculateBricks()
    {
        $length = 5; // m
        $height = 2.5; // m
        $brickLength = 0.3; // m
        $brickHeight = 0.2; // m
        $jointThickness = 0.01; // m

        $expectedBricks = 193; // nombre attendu de briques
        $this->assertEquals(
            $expectedBricks,
            CivilEngineering::calculateBricks($length, $height, $brickLength, $brickHeight, $jointThickness)
        );
    }

    public function testCalculateMasonryTime()
    {
        $numberOfBricks = 193; // nombre de briques
        $bricksPerDay = 450; // briques par jour

        $expectedTime = 0.429; // temps attendu en jours
        $this->assertEqualsWithDelta(
            $expectedTime,
            CivilEngineering::calculateMasonryTime($numberOfBricks, $bricksPerDay),
            0.001
        );
    }

    
}
