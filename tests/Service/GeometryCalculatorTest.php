<?php

namespace App\Tests\Service;

use App\Entity\Circle;
use App\Service\GeometryCalculator;
use PHPUnit\Framework\TestCase;

class GeometryCalculatorTest extends TestCase
{
    private $geometryCalculator;

    protected function setUp(): void
    {
        // This is called before each test method runs.
        $this->geometryCalculator = new GeometryCalculator();
    }

    public function testSumDiametersOfTwoCircles(): void
    {
        # Create two circle objects with known radii
        $circle1 = new Circle(2);  
        $circle2 = new Circle(3); 

        // Expected sum of diameters: 2*5 + 2*10 = 10 + 20 = 30
        $expectedSum = 10;

        // Call the method to sum the diameters
        $actualSum = $this->geometryCalculator->sumDiameters($circle1, $circle2);

        // Assert that the result is as expected
        $this->assertEquals($expectedSum, $actualSum);
    }
}
