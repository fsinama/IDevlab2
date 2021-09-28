<?php

namespace App\Controller\Admin\Portfolio;

use App\Entity\Portfolio\Project;
use App\Form\ProjectType;
use App\Repository\Portfolio\ProjectRepository;
use App\Repository\UserRepository;
use App\Security\LoginAuthenticator;
use App\Tools\Roles;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

#[IsGranted(Roles::ADMIN)]
#[Cache(expires: 'tomorrow')]
#[Route("/admin/portfolio")]
class Controller extends AbstractController
{

    private $repository;
    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route('/liste', name: 'admin_portfolio_liste')]
    public function liste(): Response
    {
        return $this->render('admin/portfolio/liste.html.twig', [
            'projects' => $this->repository->findAll(),
        ]);
    }

    #[Route('/modifier/{id}', name: 'admin_portfolio_edit')]
    public function edit(int $id,Request $request): Response
    {
        $project = $this->repository->find($id);
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render('admin/portfolio/edit.html.twig', [
            'project' => $project,
            'projectForm' =>$form->createView()
        ]);
    }

    #[Route('/details/{id}', name: 'admin_portfolio_show')]
    public function show(int $id,Request $request): Response
    {
        $project = $this->repository->find($id);
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render('admin/portfolio/details.html.twig', [
            'project' => $project,
            'projectForm' =>$form->createView()
        ]);
    }
}
