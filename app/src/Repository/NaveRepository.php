<?php

namespace App\Repository;

use App\Model\Nave;
use Psr\Log\LoggerInterface;

class NaveRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info('Coleção de naves recuperadas');

        return [
            new Nave(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                'assumida por Q'
            ),
            new Nave(
                2,
                'USS Espresso (NCC-1234-C)',
                'Latte',
                'James T. Quick!',
                'reparada',
            ),
            new Nave(
                3,
                'USS Wanderlust (NCC-2024-W)',
                'Delta Tourist',
                'Kathryn Journeyway',
                'em construção',
            ),
        ];
    }

    public function find(int $id): ?Nave
    {
        foreach ($this->findAll() as $nave) {
            if ($nave->getId() === $id) {
                return $nave;
            }
        }
        
        return null;
    }
}