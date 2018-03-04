<?php
namespace App\Controller;

use App\Repository\FourSquareLocationRepository;
use App\Repository\TimeoutLocationRepository;
use App\Repository\ViatorLocationRepository;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as FOSRest;

/**
 * @Route("/")
 */
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
      * @FOSRest\Get("/api/v1/all")
      */
    public function outputAllAction()
    {
        $returnArray = $this->fourSquareLocationRepository->findAll();
        return View::create($returnArray, Response::HTTP_OK , []);
    }
}