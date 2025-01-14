<?php

namespace App\Controller;

use App\Repository\NaveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NaveController extends AbstractController
{
    #[Route('/naves/{id<\d+>}', name: 'app_nave_show')]
    public function show(int $id, NaveRepository $repository): Response
    {
        $nave = $repository->find($id);

        if(!$nave){
            throw $this->createNotFoundException('Nave não encontrada.');
        }

        return $this->render('nave/show.html.twig', [
            'nave' => $nave,
        ]);
    }
}
