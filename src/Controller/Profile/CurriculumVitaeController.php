<?php

namespace App\Controller\Profile;

use App\DataFixtures\Data\Portfolio\PortfolioData;
use App\Repository\Portfolio\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurriculumVitaeController extends AbstractController
{
    #[Route("/Profile/CV", name:"profile_cv")]
    public function index(ProjectRepository $repository): Response
    {

        return $this->render('profile/cv.html.twig', array(
            'allProject' => $repository->findBy(array(),array(),3)
        ));
    }
}