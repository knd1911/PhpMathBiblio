<?php

namespace Knd\PhpMathBiblio;

/**
 * Class FluidDynamics
 *
 * Cette classe fournit des méthodes pour effectuer des calculs liés à la dynamique des fluides,
 * y compris l'équation de Bernoulli et le débit volumique.
 *
 * @package Knd\PhpMathBiblio
 */
class FluidDynamics
{
    /**
     * Calcule la pression selon l'équation de Bernoulli.
     *
     * Cette méthode utilise l'équation de Bernoulli pour calculer la pression en fonction
     * des pressions, vitesses et densité d'un fluide.
     *
     * @param float $pressure1 La pression au point 1 en pascals.
     * @param float $velocity1 La vitesse au point 1 en mètres par seconde.
     * @param float $pressure2 La pression au point 2 en pascals.
     * @param float $velocity2 La vitesse au point 2 en mètres par seconde.
     * @param float $density La densité du fluide en kilogrammes par mètre cube.
     * @return float La pression calculée au point 2 en pascals.
     */
    public static function bernoulliEquation(float $pressure1, float $velocity1, float $pressure2, float $velocity2, float $density): float
    {
        return $pressure1 + 0.5 * $density * pow($velocity1, 2) - (0.5 * $density * pow($velocity2, 2));
    }

    /**
     * Calcule le débit volumique d'un fluide.
     *
     * Cette méthode calcule le débit volumique en multipliant la section transversale
     * par la vitesse d'écoulement du fluide.
     *
     * @param float $area La section transversale du tube en mètres carrés.
     * @param float $velocity La vitesse du fluide en mètres par seconde.
     * @return float Le débit volumique en mètres cubes par seconde.
     */
    public static function volumetricFlowRate(float $area, float $velocity): float
    {
        return $area * $velocity;
    }
}
