<?php

namespace App\DataFixtures;

use App\Entity\ReportYourBug\ReportYourBug\ReportYourBug\User;
use App\Tools\Roles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchy;

class UserFixtures extends Fixture
{


    private $passwordEncoder;
    private const MAX_USER = 4 , MIN_USER = 0;


    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create("fr_FR");

        $userDev = new User();
        $userDev
            ->setRoles(array(Roles::SUPER_ADMIN))
            ->setUsername("Muirazakiiro")
            ->setFirstName("Florian")
            ->setLastName("SINAMA")
            ->setMail("floflo97213@gmail.com")
            ->setPassword($this->passwordEncoder->encodePassword($userDev,"royal97211"));

        $manager->persist($userDev);


        for ($i = self::MIN_USER ; $i<self::MAX_USER ;$i++)
        {
            $user = new User();
            $user
                ->setRoles(array(Roles::Random()))
                ->setUsername($faker->userName)
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setMail($faker->email)
                ->setPassword($this->passwordEncoder->encodePassword($user,$faker->password));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
