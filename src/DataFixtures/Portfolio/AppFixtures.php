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

        $categories = [CatagoryData::ApplicationWeb];
        $skills = [SkillData::BackEnd,SkillData::HTML,SkillData::FrontEnd, SkillData::PHP,
            SkillData::FullStack,SkillData::Symfony,SkillData::JavaScript,SkillData::Maquettage ];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::IDevLab2)
            ->setDescription
            (
                "Ce projet est une version améliorée de mon premier site et portfolio, 
                elle a pour objectif de réunir l'ensemble de mes applications web et de décrire 
                chacun de mes projets présents et futures."
            )
            ->setStartDate(new \DateTime("2021/09/18"))
            ->setPicture("assets/images/portfolio/Portfolio-IDL2.0.jpg")
            ->setSecondaryPicture("assets/images/portfolio/Portfolio-IDL2.0.jpg")
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

        $categories = [CatagoryData::ApplicationWeb];
        $skills = [SkillData::FullStack,SkillData::HTML,SkillData::CSS, SkillData::PHP,
            SkillData::Symfony,SkillData::JavaScript ];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::RYB)
            ->setDescription
            (
                "Cette application Web me permet d'archiver mes erreurs, de retrouver tous 
                les bugs que j'ai pu rencontrer et les solutions que j'ai trouvées. Elle me sert au 
                quotidien lors de conceptions d'applications diveres. Elle était développée en Laravel 
                à l'origine et a été refaite sur IDevlb 2.0 en Symfony."
            )
            ->setStartDate(new \DateTime("2021/09/28"))
            ->setPicture("assets/images/portfolio/Portfolio-RYB.jpg")
            ->setSecondaryPicture("assets/images/portfolio/Portfolio-RYB.jpg")
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

        $categories = [CatagoryData::ApplicationMobile,CatagoryData::Prototype,CatagoryData::Multiplatform];
        $skills = [SkillData::FullStack,SkillData::Dart_Flutter,
            SkillData::PHP,SkillData::Laravel,SkillData::Maquettage,SkillData::Maquettage,SkillData::AdobeXD ];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::MyBugs)
            ->setDescription
            (
                "Cette application regroupe les mêmes fonctionnalités (car elle partage la même API) 
                que \"My Repports\" mais permet également de visionner des solutions d'un bug depuis Stack overflow."
            )
            ->setStartDate(new \DateTime("2021/09/28"))
            ->setPicture("assets/images/portfolio/Portfolio-MyBugs.jpg")
            ->setSecondaryPicture("assets/images/portfolio/Portfolio-MyBugs.jpg")
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

        $categories = [CatagoryData::ApplicationWeb];
        $skills = [SkillData::BackEnd,SkillData::FrontEnd, SkillData::PHP,
            SkillData::Laravel,SkillData::Maquettage,
            SkillData::Maquettage,SkillData::AdobeXD ];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::Projeo)
            ->setDescription
            (
                "Created in 2021, it is still under development. It consists of organizing the management of a 
                business by helping to create quotes, appointment schedules, customers, partner companies, invoices, to 
                manage their time input (i.e., the number of hours worked) and benefits. The application consisted of 
                graphs, diagrams and colour codes to make it easier to use."
            )
            ->setStartDate(new \DateTime("2021/09/28"))
            ->setPicture("assets/images/portfolio/Portfolio-Projeo.jpg")
            ->setSecondaryPicture("assets/images/portfolio/Portfolio-Projeo.jpg")
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

        /* ---------- Aostart ---------- */

        $categories = [CatagoryData::SiteWeb,CatagoryData::Prototype];
        $skills = [SkillData::BackEnd,SkillData::FrontEnd, SkillData::PHP,
            SkillData::Symfony];
        $record = new Project();
        $record
            ->setTitle(PortfolioData::Aostart)
            ->setDescription
            (
                "Ce projet est un book de désigner d'espace réalisé pour une étudiante afin qu'elle 
                présente ses projets, compétences et son curriculum vitae. Il lui permet de se présenter de manière 
                rapide et efficace auprès des recruteurs et reflète son talent, sa personnalité, sa rigueur et sa motivation."
            )
            ->setStartDate(new \DateTime("2021/09/24"))
            ->setPicture("assets/images/portfolio/Portfolio-Aostart.jpg")
            ->setSecondaryPicture("assets/images/portfolio/Portfolio-Aostart.jpg")
            ->setGithubRepository("https://github.com/fsinama/Aostart")
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

        /* ---------- ---------- */

        $manager->flush();
    }
}
