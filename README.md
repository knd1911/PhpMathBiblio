Knd\PhpMathBiblio

Knd\PhpMathBiblio est une bibliothèque PHP qui fournit des méthodes pour effectuer divers calculs mathématiques et physiques. Elle inclut des classes pour l'électromagnétisme, la dynamique des fluides et l'ingénierie mécanique.
Table des matières

    Installation
    Classes et Méthodes
        Électromagnétisme
        Dynamique des fluides
        Ingénierie mécanique
        Ingénierie civile
        Mathématiques de base
    Exemples d'utilisation
    Contributions
    License

Installation

Assurez-vous d'avoir PHP installé sur votre machine. Vous pouvez ajouter cette bibliothèque à votre projet via Composer :

bash

composer require knd/php-math-biblio

Classes et Méthodes
1. Électromagnétisme

Cette classe fournit des méthodes pour effectuer des calculs d'électromagnétisme.

    Méthodes :
        coulombsLaw(float $charge1, float $charge2, float $distance): float
            Calcule la force électrostatique entre deux charges.
        faradaysLaw(float $fluxChange, float $timeChange): float
            Calcule la force électromotrice induite selon la loi de Faraday.

2. Dynamique des fluides

Cette classe contient des méthodes pour effectuer des calculs en dynamique des fluides.

    Méthodes :
        bernoulliEquation(float $pressure1, float $velocity1, float $pressure2, float $velocity2, float $density): float
            Calcule la pression en utilisant l'équation de Bernoulli.
        volumetricFlowRate(float $area, float $velocity): float
            Calcule le débit volumique.

3. Ingénierie mécanique

Cette classe fournit des méthodes pour effectuer des calculs en ingénierie mécanique.

    Méthodes :
        calculateForce(float $mass, float $acceleration): float
            Calcule la force à partir de la masse et de l'accélération.
        calculateMoment(float $force, float $distance): float
            Calcule le moment à partir de la force et de la distance.
        calculateKineticEnergy(float $mass, float $velocity): float
            Calcule l'énergie cinétique.
        calculatePower(float $force, float $velocity): float
            Calcule la puissance.
        calculateWork(float $force, float $distance, float $angle = 0): float
            Calcule le travail effectué.
        calculatePressure(float $force, float $area): float
            Calcule la pression.
        calculateMomentOfInertia(array $masses, array $distances): float
            Calcule le moment d'inertie.
        calculateNaturalFrequency(float $stiffness, float $mass): float
            Calcule la fréquence naturelle.
        calculateElasticDeformation(float $force, float $originalLength, float $modulusOfElasticity, float $area): float
            Calcule la déformation élastique.
        calculateConcreteResistance(float $concreteStrength, float $area): float
            Calcule la résistance d'un béton.

4. Ingénierie civile

La classe CivilEngineering fournit des méthodes pour effectuer des calculs liés à l'ingénierie civile.

    Méthodes :
        stress(float $force, float $area): float
            Calcule la contrainte en pascals (Pa).
        strain(float $deltaLength, float $originalLength): float
            Calcule la déformation (sans unité).
        beamDeflection(float $load, float $length, float $elasticityModulus, float $inertia): float
            Calcule la flèche d'une poutre en mètres (m).
        calculateBricks(float $length, float $height, float $brickLength, float $brickHeight, float $jointThickness): int
            Calcule le nombre de briques nécessaires pour un mur.
        calculateMasonryTime(int $numberOfBricks, int $bricksPerDay): float
            Calcule le temps nécessaire pour maçonner un certain nombre de briques.

5. Mathématiques de base

La classe CoreMath fournit des méthodes pour effectuer des opérations mathématiques de base.

    Méthodes :
        matrixAdd(array $matrixA, array $matrixB): array
            Additionne deux matrices.
        matrixMultiply(array $matrixA, array $matrixB): array
            Multiplie deux matrices.
        solveLinearSystem(array $matrix, array $rhs): array
            Résout un système d'équations linéaires par la méthode de Gauss.

Exemples d'utilisation
1. Électromagnétisme

php

use Knd\PhpMathBiblio\Electromagnetism;

// Loi de Coulomb
$force = Electromagnetism::coulombsLaw(1e-6, 2e-6, 0.1);
echo "Force électrostatique: $force N\n";

// Loi de Faraday
$emf = Electromagnetism::faradaysLaw(0.05, 2);
echo "Force électromotrice: $emf V\n";

2. Dynamique des fluides

php

use Knd\PhpMathBiblio\FluidDynamics;

// Équation de Bernoulli
$pressure = FluidDynamics::bernoulliEquation(101325, 10, 0, 15, 1.225);
echo "Pression calculée: $pressure Pa\n";

// Débit volumique
$flowRate = FluidDynamics::volumetricFlowRate(0.1, 5);
echo "Débit volumique: $flowRate m³/s\n";

3. Ingénierie mécanique

php

use Knd\PhpMathBiblio\MechanicalEngineering;

// Force
$force = MechanicalEngineering::calculateForce(10, 9.81);
echo "Force: $force N\n";

// Moment
$moment = MechanicalEngineering::calculateMoment($force, 2);
echo "Moment: $moment Nm\n";

// Énergie cinétique
$kineticEnergy = MechanicalEngineering::calculateKineticEnergy(10, 15);
echo "Énergie cinétique: $kineticEnergy J\n";

// Puissance
$power = MechanicalEngineering::calculatePower($force, 3);
echo "Puissance: $power W\n";

// Travail
$work = MechanicalEngineering::calculateWork($force, 5);
echo "Travail: $work J\n";

// Pression
$pressure = MechanicalEngineering::calculatePressure($force, 2);
echo "Pression: $pressure Pa\n";

// Moment d'inertie
$inertia = MechanicalEngineering::calculateMomentOfInertia([2, 3], [1, 2]);
echo "Moment d'inertie: $inertia kg·m²\n";

// Fréquence naturelle
$frequency = MechanicalEngineering::calculateNaturalFrequency(1000, 10);
echo "Fréquence naturelle: $frequency Hz\n";

// Déformation élastique
$deformation = MechanicalEngineering::calculateElasticDeformation(500, 2, 200e9, 0.01);
echo "Déformation élastique: $deformation m\n";

// Résistance du béton
$concreteResistance = MechanicalEngineering::calculateConcreteResistance(25, 0.5);
echo "Capacité portante du béton: $concreteResistance kg\n";

4. Ingénierie civile

php

use Knd\PhpMathBiblio\CivilEngineering;

// Contrainte
$stress = CivilEngineering::stress(1000, 5);

// Déformation
$strain = CivilEngineering::strain(0.02, 2);

// Flèche d'une poutre
$deflection = CivilEngineering::beamDeflection(5000, 6, 200000000000, 0.0001);

// Nombre de briques
$numberOfBricks = CivilEngineering::calculateBricks(5, 3, 0.2, 0.1, 0.01);

// Temps de maçonnerie
$masonryTime = CivilEngineering::calculateMasonryTime(100, 50);

5. Mathématiques de base

php

use Knd\PhpMathBiblio\CoreMath;

// Addition de matrices
$result = CoreMath::matrixAdd([[1, 2], [3, 4]], [[5, 6], [7, 8]]);

// Multiplication de matrices
$result = CoreMath::matrixMultiply([[1, 2], [3, 4]], [[5, 6], [7, 8]]);

// Résolution d'un système d'équations linéaires
$result = CoreMath::solveLinearSystem([[2, -1], [1, 1]], [1, 3]);

Contributions

Les contributions à la bibliothèque sont les bienvenues. Si vous souhaitez contribuer, veuillez ouvrir une pull request sur le dépôt GitHub.
License

Cette bibliothèque est sous licence MIT. Veuillez consulter le fichier LICENSE pour plus de détails.
