<?php

namespace App\DataFixtures\Portfolio;

use App\DataFixtures\Data\Portfolio\CatagoryData;
use App\DataFixtures\Data\Portfolio\PortfolioData;
use App\DataFixtures\Data\Portfolio\SkillData;
use App\DataFixtures\Data\Portfolio\StateData;
use App\Entity\Portfolio\Category;
use App\Entity\Portfolio\Project;
use App\Entity\Portfolio\Skill;
use App\Entity\Portfolio\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* ---------- Repository ---------- */

        $stateRepository = $manager->getRepository(State::class);
        $categoryRepository = $manager->getRepository(Category::class);
        $skillRepository = $manager->getRepository(Skill::class);

        /* ---------- Portfolio ---------- */

        /* ---------- States ---------- */

        foreach (StateData::allStateType as $value) {
            $record = new State();
            $record->setTitle($value);
            $manager->persist($record);
        }

        /* ---------- Skills ---------- */

        foreach (SkillData::allSkillType as $value) {
            $record = new Skill();
            $record->setTitle($value);
            $manager->persist($record);
        }

        /* ---------- Category --------- */

        foreach (CatagoryData::allCategoryType as $value) {
            $record = new Category();
            $record->setTitle($value);
            $manager->persist($record);
        }

        $manager->flush();

        /* ---------- Project --------- */

        /* ---------- IDevLab 2.0 ---------- */

        $categories = [CatagoryData::ApplicationWeb,CatagoryData::DesignGraphique];
        $skills = [SkillData::BackEnd,SkillData::HTML,SkillData::FrontEnd, SkillData::PHP,
            SkillData::FullStack,SkillData::Symfony,SkillData::JavaScript,SkillData::ApplicationWeb ];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::IDevLab2)
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
            ->setProjectLink('app_home')
            ->setState($stateRepository->findOneBy(["title" => StateData::EnCours]));

        foreach ($categories as $value) {
            $record->addCategory($categoryRepository->findOneBy(["title" => $value]));
        }

        foreach ($skills as $value) {
            $record->addSkill($skillRepository->findOneBy(["title" => $value]));
        }

        $manager->persist($record);

        /* ---------- RepportYourBugs ---------- */

        $categories = [CatagoryData::ApplicationWeb,CatagoryData::DesignGraphique];
        $skills = [SkillData::FullStack,SkillData::HTML,SkillData::CSS, SkillData::PHP,
            SkillData::Symfony,SkillData::JavaScript,CatagoryData::ApplicationWeb ];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::RYB)
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
            ->setProjectLink("ryb_home")
            ->setState($stateRepository->findOneBy(["title" => StateData::EnCours]));

        foreach ($categories as $value) {
            $record->addCategory($categoryRepository->findOneBy(["title" => $value]));
        }

        foreach ($skills as $value) {
            $record->addSkill($skillRepository->findOneBy(["title" => $value]));
        }

        $manager->persist($record);

        /* ---------- MyBugs ---------- */

        $categories = [CatagoryData::ApplicationMobile,CatagoryData::DesignGraphique];
        $skills = [SkillData::FullStack,SkillData::Dart_Flutter, SkillData::Multiplatform,
            SkillData::PHP,SkillData::Laravel,SkillData::ApplicationWeb,CatagoryData::DesignGraphique,SkillData::AdobeXD ];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::MyBugs)
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
            ->setState($stateRepository->findOneBy(["title" => StateData::Afaire]));

        foreach ($categories as $value) {
            $record->addCategory($categoryRepository->findOneBy(["title" => $value]));
        }

        foreach ($skills as $value) {
            $record->addSkill($skillRepository->findOneBy(["title" => $value]));
        }

        $manager->persist($record);

        /* ---------- Projeo ---------- */

        $categories = [CatagoryData::ApplicationWeb,CatagoryData::DesignGraphique];
        $skills = [SkillData::BackEnd,SkillData::FrontEnd, SkillData::PHP,
            SkillData::Laravel,SkillData::ApplicationWeb,
            SkillData::DesignGraphique,SkillData::AdobeXD ];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::Projeo)
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
            ->addCategory($categoryRepository->findOneBy(["title" => CatagoryData::ApplicationWeb]))
            ->setState($stateRepository->findOneBy(["title" => StateData::Afaire]));


        foreach ($categories as $value) {
            $record->addCategory($categoryRepository->findOneBy(["title" => $value]));
        }

        foreach ($skills as $value) {
            $record->addSkill($skillRepository->findOneBy(["title" => $value]));
        }

        $manager->persist($record);

        /* ---------- ---------- */

        $manager->flush();
    }
}
