<?php
namespace App\Controller;

use App\Repository\FourSquareLocationRepository;
use App\Repository\TimeoutLocationRepository;
use App\Repository\ViatorLocationRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OutputController
{
    /**
     * @var FourSquareLocationRepository
     */
    private $fourSquareLocationRepository;

    /**
     * @var TimeoutLocationRepository
     */
    private $timeoutLocationRepository;

    /**
     * @var ViatorLocationRepository
     */
    private $viatorLocationRepository;

    public function __construct(FourSquareLocationRepository $fourSquareLocationRepository, TimeoutLocationRepository $timeoutLocationRepository, ViatorLocationRepository $viatorLocationRepository)
    {
        $this->fourSquareLocationRepository = $fourSquareLocationRepository;
        $this->timeoutLocationRepository = $timeoutLocationRepository;
        $this->viatorLocationRepository = $viatorLocationRepository;
    }

    /**
      * @Route("/api/v1/")
      */
    public function outputAllFeed()
    {
        $returnArray = $this->fourSquareLocationRepository->findAll();
        dump($returnArray);
        return new Response('Endpoint');
    }
}