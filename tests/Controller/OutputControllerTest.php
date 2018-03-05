<?php
namespace App\Tests\Controller;

use App\Controller\OutputController;
use App\Entity\ViatorLocation;
use App\Repository\FourSquareLocationRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class OutputControllerTest extends TestCase
{
    public function testOutput()
    {
        $repositories = [
            Mockery::mock(FourSquareLocationRepository::class),
            Mockery::mock(ViatorLocation::class)
        ];

        $controller = new OutputController($repositories);
    }
}