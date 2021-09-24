<?php

namespace App\DataFixtures\ReportYourBug;

use App\DataFixtures\Data\ReportYourBug\TechnologyData;
use App\DataFixtures\Data\ReportYourBug\TypeData;
use App\Entity\Portfolio\Project;
use App\Entity\ReportYourBug\Technology;
use App\Entity\ReportYourBug\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

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
