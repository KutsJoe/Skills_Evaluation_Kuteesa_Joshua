<?php


namespace App\Service;

use App\Entity\Circle;

class GeometryCalculator
{
    public function sumAreas(ShapeInterface $shape1, ShapeInterface $shape2): float
    {
        return $shape1->calculateSurface() + $shape2->calculateSurface();
    }

        # Sum the diameters of two given cirlces
        public function sumDiameters(ShapeInterface $shape1, ShapeInterface $shape2): float
        {
            # Ensure that both shapes are circles or implement a 'calculateDiameter' method
            if ($shape1 instanceof Circle && $shape2 instanceof Circle) {
                return $shape1->calculateDiameter() + $shape2->calculateDiameter();
            }
    
            // Handle the case where the shapes do not have a 'calculateDiameter' method (e.g., non-circles)
            throw new \InvalidArgumentException("Both shapes must be circles to calculate diameters.");
        }
}