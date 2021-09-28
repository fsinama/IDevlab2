<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AddProfileFormType;
use App\Form\EditProfileFormType;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\LoginAuthenticator;
use App\Tools\Roles;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

#[IsGranted(Roles::ADMIN)]
#[Cache(expires: 'tomorrow')]
#[Route("/admin")]
class AdminController extends AbstractController
{
    private $passwordEncoder,$guardHandler,$authenticator;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder,
                                GuardAuthenticatorHandler $guardHandler, LoginAuthenticator $authenticator)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->guardHandler = $guardHandler;
        $this->authenticator = $authenticator;
    }

    #[Route('/dashboard', name: 'admin_home')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', []);
    }

    #[Route(path: ['/utilisateurs/liste/{role}'], name: 'admin_users')]
    public function users_page(?String $role,UserRepository $repository): Response
    {

        if ($role === str_ireplace(" ", "",Roles::SUPER_ADMIN_Display)) $role = Roles::SUPER_ADMIN_Display;
        if (empty($role)) $role = "Tous";
        return $this->render('admin/user/liste.html.twig', [
            'users' => $repository->findAll(),
            'role' =>$role
        ]);
    }

    #[Route('/utilisateurs/afficher/{id}', name: 'admin_user_details')]
    public function show_user(int $id): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $form = $this->createForm(EditProfileFormType::class, $user);

        return $this->render('admin/user/details.html.twig', [
            'user' => $user,
            'editUserForm' => $form->createView(),
            'roles' => Roles::allRoles
        ]);
    }


    #[Route('/utilisateurs/modifier/{id}', name: 'admin_user_edit')]
    public function edit_user(int $id,Request $request): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $form = $this->createForm(EditProfileFormType::class, $user);
        $form->handleRequest($request);

        return $this->saveUser('admin/user/edit.html.twig',$user,$form,$request );
    }

    #[Route('/utilisateurs/ajouter', name: 'admin_user_add')]
    public function add_user(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(AddProfileFormType::class, $user);
        $form->handleRequest($request);

        return $this->saveUser('admin/user/add.html.twig',$user,$form,$request );
    }

    #[Route('/utilisateurs/delete/{id}', name: 'admin_users_delete')]
    public function delete_user(int $id,UserRepository $repository): Response
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($repository->find($id));
        $em->flush();


        return $this->redirectToRoute('admin_users');
    }

    private function saveUser($view,$user,$form,$request): \Symfony\Component\HttpFoundation\RedirectResponse|Response
    {

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            if (!empty($form->get('plainPassword')->getData()))
            {
                $user->setPassword(
                    $this->passwordEncoder->encodePassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );
            }

            if (in_array(Roles::SUPER_ADMIN,(array)$form->get('roles')->getData())) $user->setRoles(Roles::allGranted);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            if ($user->getUsername() === $this->getUser()) {
                return $this->redirectToRoute('app_login');
            }
            return $this->redirectToRoute('admin_user_details',array("id" => $user->getId()));
        }

        return $this->render($view, [
            'user' => $user,
            'editUserForm' => $form->createView(),
            'roles' => Roles::allRoles
        ]);
    }
}
