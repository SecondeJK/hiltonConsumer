<?php
namespace App\Controller;

use App\Repository\FourSquareLocationRepository;
use App\Repository\TimeoutLocationRepository;
use App\Repository\ViatorLocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OutputController extends Controller
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

    /**
     * Contains Array of Serialized Objects
     * @var array
     */
    private $serializerResponseData;

    /**
     * OutputController constructor.
     * @param FourSquareLocationRepository $fourSquareLocationRepository
     * @param TimeoutLocationRepository $timeoutLocationRepository
     * @param ViatorLocationRepository $viatorLocationRepository
     */
    public function __construct(FourSquareLocationRepository $fourSquareLocationRepository, TimeoutLocationRepository $timeoutLocationRepository, ViatorLocationRepository $viatorLocationRepository)
    {
        $this->fourSquareLocationRepository = $fourSquareLocationRepository;
        $this->timeoutLocationRepository = $timeoutLocationRepository;
        $this->viatorLocationRepository = $viatorLocationRepository;
    }

    /**
      * @Route("/api/v1/all")
      */
    public function outputAllAction(Request $request)
    {
        $this->serializerResponseData = $this->fourSquareLocationRepository->findAll();
        $serializer = $this->get('jms_serializer');
        $this->serializerResponseData = $serializer->serialize($this->serializerResponseData, 'json');
        return $this->renderResponse();
    }

    protected function renderResponse()
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($this->serializerResponseData);
        $response->setStatusCode($this->assertApiRequestStatusCode());
        return $response;
    }

    protected function assertApiRequestStatusCode()
    {
        return Response::HTTP_OK;
    }
}