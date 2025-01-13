<?php

namespace App\Controller;

use App\Repository\NaveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NaveApiController extends AbstractController
{
    #[Route('/api/naves')]
    public function getCollection(NaveRepository $repository): Response
    {
        $naves = $repository->findAll();

        return $this->json($naves);
    }
}