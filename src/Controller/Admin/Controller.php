<?php

namespace App\Controller\Admin;

use App\Tools\Roles;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted(Roles::ADMIN)]
#[Cache(expires: 'tomorrow')]
#[Route("/admin")]
class Controller extends AbstractController
{
    #[Route('/dashboard', name: 'admin_home')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', []);
    }
}
