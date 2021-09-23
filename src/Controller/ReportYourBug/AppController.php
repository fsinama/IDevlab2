<?php

namespace App\Controller\ReportYourBug;

use App\Repository\ReportYourBug\ReportRepository;
use App\Repository\ReportYourBug\TechnologyRepository;
use App\Repository\ReportYourBug\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @param ReportRepository $reportRepository
     * @param TechnologyRepository $technologyRepository
     * @param TypeRepository $typeRepository
     * @return Response
     */
    #[Route("/reportYourBug/Accueil", name:"ryb_home")]
    public function homePage(ReportRepository $reportRepository,TechnologyRepository $technologyRepository,TypeRepository $typeRepository): Response
    {
        $reports = $reportRepository->findAll();
        $technologies = $technologyRepository->findAll();
        $types = $typeRepository->findAll();


        return $this->render('reportYourBug/index.html.twig', [
            "reportList" => $reports,
            "typesList" => $types,
            "technologyList" => $technologies
        ]);
    }


    /**
     * @param ReportRepository $repository
     * @param Request $request
     * @return Response
     */
    #[Route("/api/reportYourBug/reports", name:"ryb_api_list")]
    public function apiListReportByTitle(ReportRepository $repository,Request $request): Response
    {
        $reports = $repository->findByFilter(
            (String) $request->get("title"),
            (int) $request->get("id"),
            (int) $request->get("technology"),
            (array) $request->get("types")
        );


        return $this->render('ReportYourBug/ApiTemplates/listTemplate.html.twig', [
            "reportList" => $reports
        ]);
    }
}
