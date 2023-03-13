<?php

namespace App\DataFixtures;

use App\Entity\Hotels;
use App\Entity\Suite;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
        private SluggerInterface $slugger
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create('fr_FR');

        $admin = new User();
        $admin->setEmail("admin@admin.fr");
        $password = "admin";
        $admin->setPassword($this->passwordHasher->hashPassword($admin, $password));
        $admin->setRoles(["ROLE_ADMIN"]);

        $manager->persist($admin);

        $users = [];

        // Generate 3 managers
        for ($i = 0; $i < 3; $i++) {
            $user = new User();
            $user->setEmail($faker->email());
            $password = "manager";
            $user->setPassword($this->passwordHasher->hashPassword($user, $password));
            $user->setRoles(["ROLE_MANAGER"]);

            $manager->persist($user);

            $users[] = $user;
        }

        $hotels = [];

        // Generate 5 hotels
        for ($i = 0; $i < 5; $i++) {
            $hotel = new Hotels();
            $hotel->setName($faker->company());
            $hotel->setCity($faker->city());
            $hotel->setAddress($faker->address());
            $hotel->setDescription($faker->text(250));
            $hotel->setImg($faker->imageUrl());
            $hotel->setSlug($this->slugger->slug($hotel->getName()));

            // Assign a manager to the first 3 hotels
            if ($i < 3) {
                $hotel->setManager($users[$i]);
            } else {
                // Assign admin to the last 2 hotels
                $hotel->setManager($admin);
            }

            $manager->persist($hotel);
            $hotels[] = $hotel;
        }

        $suites = [];

        // Generate 20 suites
        for ($i = 0; $i < 20; $i++) {
            $suite = new Suite();
            $suite->setName($faker->name());
            $suite->setImg($faker->imageUrl());
            $suite->setDescription($faker->text(250));
            $suite->setPrice($faker->numberBetween(500, 1500));
            $suite->setAvailable("1");
            $suites[] = $suite;
        }

        $suiteGroups = array_chunk($suites, 4);

        // Assign suites to hotels
        foreach ($hotels as $i => $hotel) {
            if (isset($suiteGroups[$i])) {
                $group = $suiteGroups[$i];
                foreach ($group as $suite) {
                    $suite->setHotel($hotel);
                    $manager->persist($suite);
                }
            }
        }

        $manager->flush();
    }
}