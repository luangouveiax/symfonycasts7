<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $qtdNaves = 457;
        $minhaNave = [
            'name' => 'USS LeafyCruiser (NCC-0001)',
            'class' => 'Garden',
            'captain' => 'Jean-Luc Pickles',
            'status' => 'em construção',
        ];

        return $this->render('main/homepage.html.twig', [
            'qtdNaves' => $qtdNaves,
            'minhaNave' => $minhaNave
        ]);
    }
}