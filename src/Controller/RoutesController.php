<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RoutesController extends AbstractController
{

    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
    
    #[Route('/circle/{radius}', name: 'circle', methods:['GET', 'HEAD'])]
    public function circle($radius,  SerializerInterface $serializer): Response
    {
        #Create new circle object
        $circle = new Circle($radius);

        #Build json response
        $circleJson = 
        [
            "type" => $circle->getType(),
            "radius" => $circle->getRadius(),
            "surface" => floor($circle->calculateSurface() * 100) / 100 ,
            "circumference" => floor($circle->calculateCircumference() * 100) / 100
        ];

        $jsonResponse = $serializer->serialize($circleJson, 'json');

        return JsonResponse::fromJsonString($jsonResponse);
    }


    #[Route('/triangle/{a}/{b}/{c}', name: 'triangle', methods:['GET', 'HEAD'])]
    public function triangle($a, $b, $c,   SerializerInterface $serializer): Response
    {
        #Create new triangle object
        $triangle = new Triangle($a, $b, $c);

        #Build json response
        $triangleJson = 
        [
            "type" => $triangle->getType(),
            "a" => $triangle->geta(),
            "b" => $triangle->getb(),
            "c" => $triangle->getc(),
            "surface" => floor($triangle->calculateSurface() * 100) / 100 ,
            "circumference" => floor($triangle->calculateCircumference() * 100) / 100
        ];

        $jsonResponse = $serializer->serialize($triangleJson, 'json');

        return JsonResponse::fromJsonString($jsonResponse);
    }


}
