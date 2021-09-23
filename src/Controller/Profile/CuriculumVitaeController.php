<?php

namespace App\Controller\Profile;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CuriculumVitaeController extends AbstractController
{
    #[Route("/Profile/CV", name:"profile_cv")]
    public function index(): Response
    {
        return $this->render('profile/cv.html.twig', [
        ]);
    }
}