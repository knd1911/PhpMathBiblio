<?php

namespace Knd\PhpMathBiblio;

/**
 * Class Electromagnetism
 *
 * Cette classe fournit des méthodes pour effectuer des calculs liés à l'électromagnétisme,
 * y compris les lois de Coulomb et de Faraday.
 *
 * @package Knd\PhpMathBiblio
 */
class Electromagnetism
{
    /**
     * Calcule la force entre deux charges électriques selon la loi de Coulomb.
     *
     * Cette méthode utilise la loi de Coulomb pour calculer la force entre deux charges
     * électriques en fonction de leur magnitude et de la distance qui les sépare.
     *
     * @param float $charge1 La première charge en coulombs.
     * @param float $charge2 La deuxième charge en coulombs.
     * @param float $distance La distance entre les charges en mètres.
     * @return float La force électrostatique en newtons.
     * @throws \InvalidArgumentException Si la distance est nulle ou négative.
     */
    public static function coulombsLaw(float $charge1, float $charge2, float $distance): float
    {
        if ($distance <= 0) {
            throw new \InvalidArgumentException("La distance doit être supérieure à zéro.");
        }
        
        $k = 8.9875517923 * pow(10, 9); // Constante de Coulomb
        return $k * ($charge1 * $charge2) / pow($distance, 2);
    }

    /**
     * Calcule la force électromotrice (f.e.m) selon la loi de Faraday.
     *
     * Cette méthode utilise la loi de Faraday pour calculer la force électromotrice induite
     * dans un circuit en fonction du changement de flux magnétique dans le temps.
     *
     * @param float $fluxChange Le changement de flux magnétique en weber.
     * @param float $timeChange Le changement de temps en secondes.
     * @return float La force électromotrice en volts.
     * @throws \InvalidArgumentException Si le changement de temps est nul ou négatif.
     */
    public static function faradaysLaw(float $fluxChange, float $timeChange): float
    {
        if ($timeChange <= 0) {
            throw new \InvalidArgumentException("Le changement de temps doit être supérieur à zéro.");
        }
        
        return -$fluxChange / $timeChange;
    }
}
