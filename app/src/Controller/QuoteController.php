<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Quote;

use MeiliSearch\Bundle\SearchService;

class QuoteController extends AbstractController {

    #[Route('/')]
    public function index(QuoteRepository $quoteRepository) : Response 
    {
        return $this->render(
            'quote/index.html.twig',
            [
                'quotes' => $quoteRepository->findAll(),
            ]
        );
    }

    #[Route('/search')]
    public function search(SearchService $searchService, Request $request): Response 
    {
        $searchQuery = $request->query->get('q') ?? '';

        return $this->render(
            'quote/index.html.twig',
            [
                'quotes' => $searchService->search($this->getDoctrine()->getManager(), Quote::class, $searchQuery),
                'q' => $searchQuery
            ]
        );
    }
}
