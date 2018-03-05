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
    const SORT_ASC = 'asc';
    const SORT_DESC = 'desc';

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
     * @var string $sort
     * Takes the form of name field : direction
     */
    private $sort;

    /**
      * @Route("/api/v1/all")
      */
    public function outputAllAction(Request $request)
    {
        $this->serializerResponseData = [];

        // Add sort to class, remove from request query
        if ($request->query->get('sortBy')) {
            $this->sort = $request->get('sortBy');
            $request->query->remove('sortBy');
        }

        $this->buildOutputFromQueryParameters($request->query);

        if ($this->sort) {
            $this->applySort();
        }

        return $this->renderResponse();
    }

    public function renderResponse()
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $serializer = $this->get('jms_serializer');

        try {
            $this->serializerResponseData = $serializer->serialize($this->serializerResponseData, 'json');
        } catch (\Exception $e) {
            return new Response('Error in content request', Response::HTTP_BAD_REQUEST);
        }

        $response->setContent($this->serializerResponseData);
        $response->setStatusCode($this->assertApiRequestStatusCode());

        return $response;
    }

    /**
     * We set HTTP headers in here and not in the serialized meta response as that makes no sense
     *
     * If you return an HTTP status code of 200 with an error code,
     * then Chuck Norris will roundhouse your door in, destroy your computer, instantly 35-pass wipe your backups,
     * cancel your Dropbox account, and block you from GitHub. -Phil Sturgeon
     *
     * @return int
     */
    protected function assertApiRequestStatusCode()
    {
        // Placeholder to assert response code
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
    }

    /**
     * Attempts to apply a sort, uncaught errors thrown if fails validation
     * Pretty basic stuff, but you get the idea. All these ifs need to be moved to lower logic
     *
     * @throws \ErrorException
     */
    protected function applySort()
    {
        // strtolower so we can discard case;
        $sortKeys = strtolower($this->sort);
        $sortKeys = explode(':', $sortKeys);
        $acceptableSorts = [self::SORT_ASC, self::SORT_DESC];

        if (count($sortKeys) !== 2) {
            throw new \ErrorException('Error in sort keys, please check fieldnames and direction');
        }

        if ($sortKeys[0] !== 'name') {
            throw new \ErrorException('Error in sort keys, only name can be used');
        }

        if (!in_array($sortKeys[1], $acceptableSorts)) {
            throw new \ErrorException('Error in sort keys - please specify asc or desc');
        }

        if ($sortKeys[1] === self::SORT_DESC) {
            usort($this->serializerResponseData, function ($a, $b) {
                return strtolower($a->getName()) < strtolower($b->getName());
            });
        } else {
            usort($this->serializerResponseData, function ($a, $b) {
                return strtolower($a->getName()) > strtolower($b->getName());
            });
        }
    }
}