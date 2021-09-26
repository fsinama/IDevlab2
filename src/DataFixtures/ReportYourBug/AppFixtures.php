<?php

namespace App\DataFixtures\ReportYourBug;

use App\DataFixtures\Data\ReportYourBug\ReportData;
use App\DataFixtures\Data\ReportYourBug\TechnologyData;
use App\DataFixtures\Data\ReportYourBug\TypeData;
use App\Entity\ReportYourBug\Report;
use App\Entity\ReportYourBug\Technology;
use App\Entity\ReportYourBug\Type;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker as Faker;

class AppFixtures extends Fixture
{
    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        /* ---------- Technology ---------- */

        foreach (TechnologyData::allTechnology as $name => $image_path) {
            $record = new Technology();
            $record
                ->setName($name)
                ->setImagePath($image_path);
            $manager->persist($record);
        }

        /* ---------- Type ---------- */

        foreach (TypeData::allType as $value) {
            $record = new Type();
            $record
                ->setName($value);
            $manager->persist($record);
        }

        $manager->flush();
    }
}
