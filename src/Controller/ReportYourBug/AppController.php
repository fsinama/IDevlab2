<?php

namespace App\Controller\ReportYourBug;

use App\Repository\ReportYourBug\ReportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/ReportYourBug/Accueil", name="ryp_home")
     * @param ReportRepository $repository
     * @return Response
     */
    public function homePage(ReportRepository $repository): Response
    {
        $reports = $repository->findAll();


        return $this->render('ReportYourBug/index.html.twig', [
            "reportList" => $reports
        ]);
    }


    /**
     * @Route("/api/ReportYourBug/reports", name="ryp_home")
     * @param ReportRepository $repository
     * @return Response
     */
    public function apiListReportByTitle(ReportRepository $repository): Response
    {
        $reports = $repository->findAll();


        return $this->render('ReportYourBug/index.html.twig', [
            "reportList" => $reports
        ]);
    }
}
