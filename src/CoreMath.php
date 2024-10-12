<?php

namespace Knd\PhpMathBiblio;

/**
 * Class CoreMath
 *
 * Cette classe fournit des méthodes pour effectuer des opérations mathématiques de base,
 * y compris l'addition et la multiplication de matrices, ainsi que la résolution de systèmes 
 * d'équations linéaires.
 *
 * @package Knd\PhpMathBiblio
 */
class CoreMath
{
    /**
     * Additionne deux matrices.
     *
     * Cette méthode prend deux matrices de même taille et retourne leur somme.
     *
     * @param array $matrixA La première matrice.
     * @param array $matrixB La deuxième matrice.
     * @return array La matrice résultante après addition.
     * @throws \InvalidArgumentException Si les matrices ne sont pas de la même taille.
     */
    public static function matrixAdd(array $matrixA, array $matrixB): array
    {
        $rows = count($matrixA);
        $cols = count($matrixA[0]);
        $result = [];

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $result[$i][$j] = $matrixA[$i][$j] + $matrixB[$i][$j];
            }
        }
        return $result;
    }

    /**
     * Multiplie deux matrices.
     *
     * Cette méthode prend deux matrices et retourne leur produit.
     *
     * @param array $matrixA La première matrice.
     * @param array $matrixB La deuxième matrice.
     * @return array La matrice résultante après multiplication.
     * @throws \InvalidArgumentException Si les dimensions des matrices ne sont pas compatibles pour la multiplication.
     */
    public static function matrixMultiply(array $matrixA, array $matrixB): array
    {
        $rowsA = count($matrixA);
        $colsA = count($matrixA[0]);
        $colsB = count($matrixB[0]);
        $result = [];

        for ($i = 0; $i < $rowsA; $i++) {
            for ($j = 0; $j < $colsB; $j++) {
                $result[$i][$j] = 0;
                for ($k = 0; $k < $colsA; $k++) {
                    $result[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
                }
            }
        }
        return $result;
    }

    /**
     * Résout un système d'équations linéaires par la méthode de Gauss.
     *
     * Cette méthode utilise la méthode d'élimination de Gauss pour résoudre un système
     * d'équations linéaires représenté sous forme matricielle.
     *
     * @param array $matrix La matrice des coefficients.
     * @param array $rhs Le vecteur des termes constants (right-hand side).
     * @return array Le vecteur des solutions du système.
     * @throws \InvalidArgumentException Si la matrice n'est pas carrée ou si les dimensions ne correspondent pas.
     */
    public static function solveLinearSystem(array $matrix, array $rhs): array
    {
        $n = count($rhs);

        for ($i = 0; $i < $n; $i++) {
            // Diagonalisation
            for ($j = $i + 1; $j < $n; $j++) {
                $factor = $matrix[$j][$i] / $matrix[$i][$i];
                for ($k = $i; $k < $n; $k++) {
                    $matrix[$j][$k] -= $factor * $matrix[$i][$k];
                }
                $rhs[$j] -= $factor * $rhs[$i];
            }
        }

        // Substitution arrière
        $solution = array_fill(0, $n, 0);
        for ($i = $n - 1; $i >= 0; $i--) {
            $sum = 0;
            for ($j = $i + 1; $j < $n; $j++) {
                $sum += $matrix[$i][$j] * $solution[$j];
            }
            $solution[$i] = ($rhs[$i] - $sum) / $matrix[$i][$i];
        }

        return $solution;
    }
}
