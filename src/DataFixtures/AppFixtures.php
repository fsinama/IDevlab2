<?php

namespace App\DataFixtures;

use App\Entity\Portfolio\Category;
use App\Entity\Portfolio\Project;
use App\Entity\Portfolio\Skill;
use App\Entity\Portfolio\State;
use App\Repository\Portfolio\StateRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* ---------- Repository ---------- */

        $stateRepository = $manager->getRepository(State::class);
        $categoryRepository = $manager->getRepository(Category::class);

        /* ---------- Portfolio ---------- */

        /* ---------- States ---------- */

        $states = [ "À faire", "En cours", "Terminer" ];

        foreach ($states as $value) {
            $record = new State();
            $record->setTitle($value);
            $manager->persist($record);
        }

        /* ---------- Skills ---------- */

        $skills = ["BackEnd","FrontEnd","FullStack","HTML","CSS",
            "PHP","Symfony","Laravel","PHP - Symfony - Laravel",
            "JavaScript","Design Graphique","Adobe XD","Sketch",
            "Dart","Flutter","Dart | Flutter","Website","Mobile",
            "Android","IOS","Multiplateform"];

        foreach ($skills as $value) {
            $record = new Skill();
            $record->setTitle($value);
            $manager->persist($record);
        }

        /* ---------- Category --------- */

        $categories = ["Design","Drupal","WordPress","Mockup","PHP",
            "Website","Mobile","Logiciel","Logo","Dessin"];

        foreach ($categories as $value) {
            $record = new Category();
            $record->setTitle($value);
            $manager->persist($record);
        }

        $manager->flush();

        /* ---------- Project --------- */

        /* ---------- IDevLab 2.0 ---------- */

        $record = new Project();
        $record
            ->setTitle("IDevLab 2.0 ( Web )")
            ->setDescription
            (
                "Ce projet est une version améliorer de mon premier site et portfolio, 
                elle a pour objectif de réunir l'ensemble de mes applications web et de décrire 
                chacun de mes projet présent et future."
            )
            ->setStartDate(new \DateTime("2021/09/18"))
            ->setPicture("assets/images/Portfolio-Projet-1.jpeg")
            ->setSecondaryPicture("assets/images/Portfolio-Projet-1.jpeg")
            ->setGithubRepository("https://github.com/fsinama/IDevlab2.0")
            ->setVersion(1.0)
            ->setIsPublished(true)
            ->setProjectLink('/')
            ->addCategory($categoryRepository->findOneBy(["title" => "Website"]))
            ->setState($stateRepository->findOneBy(["title" => "En cours"]));

        $manager->persist($record);

        /* ---------- MyRepports ---------- */

        $record = new Project();
        $record
            ->setTitle("ReportYourBug ( Web )")
            ->setDescription
            (
                "Une application Web me permettant d'archiver mes erreurs, de retrouver tous 
                les bugs que j'ai pu rencontrer et les solutions que j'ai trouvées. Elle me sert aux 
                quotidiens lors de conceptions d'application diveres. Elle était développer en Laravel 
                a l'origine et a été refaite sur IDevlb 2.0 en Symfony."
            )
            ->setStartDate(new \DateTime("2021/09/28"))
            ->setPicture("assets/images/Portfolio-Projet-2.jpeg")
            ->setSecondaryPicture("assets/images/Portfolio-Projet-2.jpeg")
            ->setGithubRepository("https://github.com/fsinama/IDevlab2.0")
            ->setVersion(1.0)
            ->setIsPublished(true)
            ->setProjectLink("/ReportYourBug/Accueil")
            ->addCategory($categoryRepository->findOneBy(["title" => "Website"]))
            ->setState($stateRepository->findOneBy(["title" => "En cours"]));

        $manager->persist($record);

        /* ---------- MyBugs ---------- */

        $record = new Project();
        $record
            ->setTitle("MyBugs ( Mobile )")
            ->setDescription
            (
                "Cette application regroupe les mêmes fonctionnalités ( car elle partage la même API ) 
                que \"My Repports\" mais permet également de visionner des solutions d'un bug depuis Stack overflow."
            )
            ->setStartDate(new \DateTime("2021/09/28"))
            ->setPicture("assets/images/Portfolio-Projet-3.jpeg")
            ->setSecondaryPicture("assets/images/Portfolio-Projet-3.jpeg")
            ->setGithubRepository("https://github.com/fsinama/MyBugs-api")
            ->setVersion(1.0)
            ->setIsPublished(false)
            ->addCategory($categoryRepository->findOneBy(["title" => "Mobile"]))
            ->setState($stateRepository->findOneBy(["title" => "À faire"]));

        $manager->persist($record);

        /* ---------- Projeo ---------- */

        $record = new Project();
        $record
            ->setTitle("Projeo ( Web )")
            ->setDescription
            (
                "Created in 2021, it is still under development. It consists of organizing the management of a 
                business by helping to create quotes, appointment schedules, customers, partner companies, invoices, to 
                manage their time input (i.e., the number of hours worked) and benefits. The application consisted of 
                graphs, diagrams and colour codes to make it easier to use. I loved working on this app for its 
                technology and, because I love developing mobile apps. I also enjoyed working with my tutor 
                on this project."
            )
            ->setStartDate(new \DateTime("2021/09/28"))
            ->setPicture("assets/images/Portfolio-Projet-4.jpeg")
            ->setSecondaryPicture("assets/images/Portfolio-Projet-4.jpeg")
            ->setGithubRepository("")
            ->setVersion(1.0)
            ->setIsPublished(false)
            ->addCategory($categoryRepository->findOneBy(["title" => "WebSite"]))
            ->setState($stateRepository->findOneBy(["title" => "À faire"]));

        $manager->persist($record);

        /* ---------- ---------- */

        $manager->flush();
    }
}
