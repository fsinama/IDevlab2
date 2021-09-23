<?php

namespace App\Controller;

use App\Repository\Portfolio\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route("/", name:"app_home")]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', []);
    }

    #[Route("/application", name:"app_application")]
    public function applications_list_page(ProjectRepository $projectRepository): Response
    {
        $allProjects = $projectRepository->findAll();
        return $this->render('home/appList.html.twig', [
            "allProjects" => $allProjects,
        ]);
    }
}
