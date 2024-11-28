<?php

namespace App\Entity;

use App\Service\ShapeInterface;
use \MathPHP\Algebra\Expression;

class Triangle implements ShapeInterface
{

    #Declare varibles for the three triangle sides
    private float $a;
    private float $b;
    private float $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    # Getters for parameters
    public function geta(): float
    {
        return $this->a;
    }

    public function getb(): float
    {
        return $this->b;
    }

    public function getc(): float
    {
        return $this->c;
    }

    public function getType(): string
    {
        return 'triangle';
    }

    # We shall use Heron's formular since we have all three triangle sides | A = sqrt(s * (s - a) * (s - b) * (s - c))
    public function calculateSurface(): float
    {
        # Obtain the semi-perimeter
        $s = ($this->a + $this->b + $this->c) / 2;

        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    # Method to calculate the circumference
    public function calculateCircumference(): float
    {
        return $this->a + $this->b + $this->c;
    }

}