<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('<strong>Loja estelar</strong>: sua opção de acabar com o monopólio de peças de naves especiais!');
    }
}