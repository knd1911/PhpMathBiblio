<?php

namespace Knd\PhpMathBiblio;

/**
 * Class CivilEngineering
 *
 * Cette classe fournit des méthodes pour effectuer des calculs liés à l'ingénierie civile, 
 * y compris le calcul de la contrainte, de la déformation, de la flèche des poutres, 
 * ainsi que des méthodes pour calculer le nombre de briques et le temps de maçonnerie.
 *
 * @package Knd\PhpMathBiblio
 */
class CivilEngineering
{
    /**
     * Calcule la contrainte.
     *
     * La contrainte est définie comme la force appliquée par unité de surface.
     * Formule : σ = F / A
     *
     * @param float $force La force appliquée en newtons (N).
     * @param float $area La surface en mètres carrés (m²).
     * @return float La contrainte en pascals (Pa).
     */
    public static function stress(float $force, float $area): float
    {
        return $force / $area;
    }

    /**
     * Calcule la déformation.
     *
     * La déformation est définie comme le changement de longueur par rapport à la longueur originale.
     * Formule : ε = ΔL / L
     *
     * @param float $deltaLength Le changement de longueur en mètres (m).
     * @param float $originalLength La longueur originale en mètres (m).
     * @return float La déformation (sans unité).
     */
    public static function strain(float $deltaLength, float $originalLength): float
    {
        return $deltaLength / $originalLength;
    }

    /**
     * Calcule la flèche d'une poutre sous charge.
     *
     * La flèche d'une poutre est calculée en utilisant la charge appliquée, la longueur de la poutre,
     * le module d'élasticité et le moment d'inertie.
     *
     * @param float $load La charge appliquée en newtons (N).
     * @param float $length La longueur de la poutre en mètres (m).
     * @param float $elasticityModulus Le module d'élasticité du matériau en pascals (Pa).
     * @param float $inertia Le moment d'inertie de la section de la poutre en mètres à la quatrième puissance (m^4).
     * @return float La flèche en mètres (m).
     */
    public static function beamDeflection(float $load, float $length, float $elasticityModulus, float $inertia): float
    {
        return ($load * pow($length, 3)) / (3 * $elasticityModulus * $inertia);
    }

    /**
     * Calcule le nombre de briques nécessaires pour un mur.
     *
     * @param float $length La longueur du mur en mètres (m).
     * @param float $height La hauteur du mur en mètres (m).
     * @param float $brickLength La longueur d'une brique en mètres (m).
     * @param float $brickHeight La hauteur d'une brique en mètres (m).
     * @param float $jointThickness L'épaisseur du joint en mètres (m).
     * @return int Le nombre total de briques nécessaires.
     */
    public static function calculateBricks($length, $height, $brickLength, $brickHeight, $jointThickness) {
        // Calculer le volume du mur
        $wallArea = $length * $height;

        // Volume d'une brique (incluant le joint)
        $brickArea = ($brickLength + $jointThickness) * ($brickHeight + $jointThickness);
        
        // Nombre total de briques nécessaires
        $numberOfBricks = ceil($wallArea / $brickArea);
        
        return $numberOfBricks;
    }

    /**
     * Calcule le temps nécessaire pour maçonner un certain nombre de briques.
     *
     * @param int $numberOfBricks Le nombre total de briques.
     * @param int $bricksPerDay Le nombre de briques posées par jour.
     * @return float Le temps en jours nécessaire pour la maçonnerie.
     */
    public static function calculateMasonryTime($numberOfBricks, $bricksPerDay) {
        return $numberOfBricks / $bricksPerDay; // Temps en jours
    }
}
