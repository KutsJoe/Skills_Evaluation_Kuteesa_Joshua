<?php

namespace App\Entity;

use App\Service\ShapeInterface;

class Circle implements ShapeInterface
{

    #Declare radius varibale for the calculations
    private float $radius;

    private string $type;

    public function __construct(float $radius)
    {
        $this->type = 'circle';
        $this->radius = $radius;

    }

    #Define  getters
    public function getRadius(): float
    {
        return $this->radius;
    }

    public function getType(): string
    {
        return 'circle';
    }

    # Method to calculate surface for a circle, surface = π * radius^2
    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }

    # Method to calculate 
    public function calculateCircumference(): float
    {
        return 2 * pi() * $this->radius;
    }

    
}

