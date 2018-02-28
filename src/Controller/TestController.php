<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
     /**
      * Simple test route
      *
      * @Route("/")
      */
    public function number()
    {
        return new Response(
            '<html><body>TEST ROUTE: APP ENABLED</body></html>'
        );
    }
}