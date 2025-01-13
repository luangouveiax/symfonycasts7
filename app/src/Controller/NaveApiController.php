<?php

namespace App\Controller;

use App\Model\Nave;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NaveApiController extends AbstractController
{
    #[Route('/api/naves')]
    public function getCollection(): Response
    {
        $naves = [
            new Nave(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                'assumido por Q'
            ),
            new Nave(
                2,
                'USS Espresso (NCC-1234-C)',
                'Latte',
                'James T. Quick!',
                'reparado',
            ),
            new Nave(
                3,
                'USS Wanderlust (NCC-2024-W)',
                'Delta Tourist',
                'Kathryn Journeyway',
                'em construção',
            ),
        ];

        return $this->json($naves);
    }
}