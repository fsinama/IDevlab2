<?php

namespace App\Controller\API\ReportYourBug;

use App\Repository\ReportYourBug\ReportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/reportYourBug')]
class ApiController extends AbstractController
{

    /**
     * @param ReportRepository $repository
     * @param Request $request
     * @return Response
     */
    #[Route("/reports/render", name:"api_ryb_list_render_render")]
    public function apiListReportByTitle(ReportRepository $repository,Request $request): Response
    {
        $reports = $repository->findByFilter(
            (String) $request->get("title")??null,
            (int) $request->get("id")??null,
            (int) $request->get("technology")??null,
            (array) $request->get("types")??null
        );


        return $this->render('reportYourBug/ApiTemplates/listTemplate.html.twig', [
            "reportList" => $reports
        ]);
    }
}
