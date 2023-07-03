<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Staff;
use App\Interface\BudgetInterface;
use App\Interface\FilmInterface;
use App\Service\ProductionCompany;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductionController extends AbstractController
{
    #[Route('/')]
    public function produceFilm(ProductionCompany $productionCompany, BudgetInterface $budget): Response
    {
        $staff = [
            new Staff('monthly', 5000),
            new Staff('fixed', 20000),
        ];

        $film = new Film(true, $staff, 100000);

        try {
            $totalCosts = $productionCompany->produceFilm($film, 6);
            $message = "Total costs for the film: $" . $totalCosts;
        } catch (Exception $e) {
            $message = "Error: " . $e->getMessage();
        }

        return $this->render('production/film.html.twig', [
            'message' => $message,
        ]);
    }
}