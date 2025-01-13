<?php

namespace App\Controller;

use App\Repository\NaveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/naves')]
class NaveApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(NaveRepository $repository): Response
    {
        $naves = $repository->findAll();

        return $this->json($naves);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, NaveRepository $repository): Response
    {
        $nave = $repository->find($id);

        if (!$nave) {
            throw $this->createNotFoundException('Nave não encontrada.');
        }

        return $this->json($nave);
    }
}