<?php
namespace App\Controller;

use App\Entity\FourSquareLocation;
use App\Entity\TimeoutLocation;
use App\Entity\ViatorLocation;
use App\Repository\FourSquareLocationRepository;
use App\Repository\TimeoutLocationRepository;
use App\Repository\ViatorLocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OutputController extends Controller
{
    /**
     * @var Iterable
     */
    private $repositories;

    /**
     * Contains Array of Serialized Objects
     * @var array
     */
    private $serializerResponseData;

    /**
     * OutputController constructor.
     * @param iterable $repositories
     */
    public function __construct(iterable $repositories)
    {
        $this->repositories = $repositories;
    }

    /**
      * @Route("/api/v1/all")
      */
    public function outputAllAction(Request $request)
    {
        $this->serializerResponseData = [];

        $this->buildOutputFromQueryParameters($request->query);

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

    /**
     * We set HTTP headers in here and not in the serialized meta response as
     * that makes no sense to 200 with a 403 return
     *
     * @return int
     */
    protected function assertApiRequestStatusCode()
    {
        // TODO: logic
        return Response::HTTP_OK;
    }

    /**
     *  Build the data to serialize by iterating through service tagged repositories and serializing the response
     *  This method currently smells and needs better sanitation because it's rushed
     *
     * @param ParameterBag $query
     * @throws \ErrorException
     */
    protected function buildOutputFromQueryParameters(ParameterBag $query)
    {
        $urlQueryString = $query->all();

        if (!$urlQueryString) {
            foreach ($this->repositories as $repository) {
                $this->serializerResponseData = array_merge($this->serializerResponseData, $repository->findAll());
            }
        } else {
            // check if the inputs are valid
            if (!array_key_exists('locationName', $urlQueryString))
            {
                throw new \ErrorException('User Error: Did not enter valid query parameters: Can only enter locationName');
            } else {
                // otherwise inject the parameters into doctrine find by
                foreach ($this->repositories as $repository) {
                    $this->serializerResponseData = array_merge($this->serializerResponseData, $repository->findBy($urlQueryString));
                }
            }
        }

        $serializer = $this->get('jms_serializer');
        $this->serializerResponseData = $serializer->serialize($this->serializerResponseData, 'json');
    }
}