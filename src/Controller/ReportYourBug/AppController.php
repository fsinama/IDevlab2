<?php

namespace App\Controller\ReportYourBug;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/ReportYourBug/Accueil", name="ryp_home")
     */
    public function homePage(): Response
    {
        return $this->render('ReportYourBug/index.html.twig', []);
    }
}
