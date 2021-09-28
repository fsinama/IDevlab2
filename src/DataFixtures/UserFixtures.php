<?php

namespace App\DataFixtures;

use App\Entity\User;
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
    private const MAX_USER = 40 , MIN_USER = 0;


    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create("fr_FR");

        $userDev = new User();
        $userDev
            ->setRoles(Roles::allGranted)
            ->setUsername("Muirazakiiro")
            ->setFirstName("Florian")
            ->setLastName("SINAMA")
            ->setEmail("f.sinama972@gmail.com")
            ->setAvatar("avatar.jpg")
            ->setPassword($this->passwordEncoder->encodePassword($userDev,"Roy@l97211"));

        $manager->persist($userDev);


        /*for ($i = self::MIN_USER ; $i<self::MAX_USER ;$i++)
        {
            $user = new User();
            $user
                ->setRoles(array(Roles::Random()))
                ->setUsername($faker->userName)
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setEmail($faker->email)
                ->setAvatar("assets/images/logo/logo.png")
                ->setPassword($this->passwordEncoder->encodePassword($user,"password"));

            $manager->persist($user);
        }*/

        $manager->flush();
    }
}
