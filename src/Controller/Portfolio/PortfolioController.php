<?php

namespace App\Controller\Portfolio;

use App\Repository\Portfolio\CategoryRepository;
use App\Repository\Portfolio\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/Portfolio")]
class PortfolioController extends AbstractController
{

    #[Route("/", name:"portfolio_liste")]
    public function portfolio_list_page(ProjectRepository $projectRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('home/portfolioList.html.twig', [
            "allProjects" => $projectRepository->findAll(),
            "allCategories" => $categoryRepository->findAll(),
        ]);
    }

    #[Route("/Application/{id}", name:"portfolio_details")]
    public function portfolio_details_page(ProjectRepository $projectRepository,int $id): Response
    {
        return $this->render('home/portfolioDetails.html.twig', [
            'project' => $projectRepository->find($id),
        ]);
    }
}
