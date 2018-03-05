<?php
namespace App\Tests\Controller;

use App\Controller\OutputController;
use App\Entity\ViatorLocation;
use App\Repository\FourSquareLocationRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class OutputControllerTest extends TestCase
{
    public function testOutputControllerCreation()
    {
        $repositories = [
            Mockery::mock(FourSquareLocationRepository::class),
            Mockery::mock(ViatorLocation::class)
        ];

        $controller = new OutputController($repositories);
        $this->assertInstanceOf(OutputController::class, $controller);
    }


    /**
     * @expectedException \ErrorException
     */
    public function testSortOne()
    {
        $repositories = [
            Mockery::mock(FourSquareLocationRepository::class),
            Mockery::mock(ViatorLocation::class)
        ];

        $controller = new OutputController($repositories);

        // Private properties, time for reverse engineering
        $reflectionClass = new \ReflectionClass($controller);
        $sortProperty = $reflectionClass->getProperty('sort');
        $sortProperty->setAccessible(true);
        $sortProperty->setValue($controller, 'Please:Fail');

        $sortMethod = $reflectionClass->getMethod('applySort');
        $sortMethod->setAccessible(true);
        $result = $sortMethod->invokeArgs($controller, []);
    }

    /**
     * @expectedException \ErrorException
     */
    public function testSortTwo()
    {
        $repositories = [
            Mockery::mock(FourSquareLocationRepository::class),
            Mockery::mock(ViatorLocation::class)
        ];

        $controller = new OutputController($repositories);

        // Private properties, time for reverse engineering
        $reflectionClass = new \ReflectionClass($controller);
        $sortProperty = $reflectionClass->getProperty('sort');
        $sortProperty->setAccessible(true);
        $sortProperty->setValue($controller, 'Name:descc');

        $sortMethod = $reflectionClass->getMethod('applySort');
        $sortMethod->setAccessible(true);
        $result = $sortMethod->invokeArgs($controller, []);
    }
}