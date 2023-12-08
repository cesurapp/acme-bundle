<?php

namespace Cesurapp\AcmeBundle\Tests\_App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AcmeController extends AbstractController
{
    #[Route('/', methods: ['GET', 'POST'])]
    public function homeAction(): Response
    {
        return new Response('hi');
    }
}
