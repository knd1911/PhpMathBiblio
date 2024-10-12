<?php

namespace Knd\PhpMathBiblio;

/**
 * Class MechanicalEngineering
 *
 * Cette classe fournit des méthodes pour effectuer des calculs liés à l'ingénierie mécanique,
 * y compris des calculs de force, moment, énergie cinétique, puissance, travail, pression,
 * moment d'inertie, fréquence naturelle, déformation élastique et résistance du béton.
 *
 * @package Knd\PhpMathBiblio
 */
class MechanicalEngineering
{
    /**
     * Calcule la force à partir de la masse et de l'accélération.
     *
     * @param float $mass La masse en kilogrammes.
     * @param float $acceleration L'accélération en mètres par seconde carrée.
     * @return float La force en newtons.
     */
    public static function calculateForce(float $mass, float $acceleration): float
    {
        return $mass * $acceleration;
    }

    /**
     * Calcule le moment à partir de la force et de la distance.
     *
     * @param float $force La force en newtons.
     * @param float $distance La distance en mètres.
     * @return float Le moment en newton-mètres.
     */
    public static function calculateMoment(float $force, float $distance): float
    {
        return $force * $distance;
    }

    /**
     * Calcule l'énergie cinétique à partir de la masse et de la vitesse.
     *
     * @param float $mass La masse en kilogrammes.
     * @param float $velocity La vitesse en mètres par seconde.
     * @return float L'énergie cinétique en joules.
     */
    public static function calculateKineticEnergy(float $mass, float $velocity): float
    {
        return 0.5 * $mass * pow($velocity, 2);
    }

    /**
     * Calcule la puissance à partir de la force et de la vitesse.
     *
     * @param float $force La force en newtons.
     * @param float $velocity La vitesse en mètres par seconde.
     * @return float La puissance en watts.
     */
    public static function calculatePower(float $force, float $velocity): float
    {
        return $force * $velocity;
    }

    /**
     * Calcule le travail effectué à partir de la force, de la distance et de l'angle.
     *
     * @param float $force La force en newtons.
     * @param float $distance La distance en mètres.
     * @param float $angle L'angle en degrés (défaut à 0).
     * @return float Le travail en joules.
     */
    public static function calculateWork(float $force, float $distance, float $angle = 0): float
    {
        return $force * $distance * cos(deg2rad($angle)); // angle en degrés
    }

    /**
     * Calcule la pression à partir de la force et de la surface.
     *
     * @param float $force La force en newtons.
     * @param float $area La surface en mètres carrés.
     * @return float La pression en pascals.
     */
    public static function calculatePressure(float $force, float $area): float
    {
        return $force / $area;
    }

    /**
     * Calcule le moment d'inertie à partir des masses et des distances.
     *
     * @param array $masses Les masses en kilogrammes.
     * @param array $distances Les distances en mètres.
     * @return float Le moment d'inertie en kilogramme-mètre carré.
     */
    public static function calculateMomentOfInertia(array $masses, array $distances): float
    {
        $momentOfInertia = 0;
        for ($i = 0; $i < count($masses); $i++) {
            $momentOfInertia += $masses[$i] * pow($distances[$i], 2);
        }
        return $momentOfInertia;
    }

    /**
     * Calcule la fréquence naturelle d'un système.
     *
     * @param float $stiffness La raideur en newtons par mètre.
     * @param float $mass La masse en kilogrammes.
     * @return float La fréquence naturelle en hertz.
     */
    public static function calculateNaturalFrequency(float $stiffness, float $mass): float
    {
        return (1 / (2 * M_PI)) * sqrt($stiffness / $mass);
    }

    /**
     * Calcule la déformation élastique d'un matériau.
     *
     * @param float $force La force appliquée en newtons.
     * @param float $originalLength La longueur originale en mètres.
     * @param float $modulusOfElasticity Le module d'élasticité en pascals.
     * @param float $area La surface de la section transversale en mètres carrés.
     * @return float La déformation élastique en mètres.
     */
    public static function calculateElasticDeformation(float $force, float $originalLength, float $modulusOfElasticity, float $area): float
    {
        return ($force * $originalLength) / ($modulusOfElasticity * $area);
    }

    /**
     * Calcule la résistance d'un béton en fonction de sa résistance et de la surface.
     *
     * @param float $concreteStrength La résistance du béton en MPa.
     * @param float $area La surface en mètres carrés.
     * @return float La capacité portante en kilogrammes.
     */
    public static function calculateConcreteResistance(float $concreteStrength, float $area): float
    {
        // Convertir MPa en Pa
        $concreteStrengthPa = $concreteStrength * 1e6; // 1 MPa = 1e6 Pa
        
        // Calculer la capacité portante (en N)
        $capacity = $concreteStrengthPa * $area;
        
        // Convertir la capacité portante en poids (en kg)
        $weight = $capacity / 9.81; // g = 9.81 m/s²
        
        return $weight;
    }
}
