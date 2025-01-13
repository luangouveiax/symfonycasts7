<?php

namespace App\Controller;

use App\Repository\NaveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function homepage(NaveRepository $naveRepository): Response
    {
        $naves = $naveRepository->findAll();
        $minhaNave = $naves[array_rand($naves)];

        return $this->render('main/homepage.html.twig', [
            'minhaNave' => $minhaNave,
            'naves' => $naves,
        ]);
    }
}