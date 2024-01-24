<?php
// src/DataFixtures/UserFixture.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i <= 10; $i++) {
            $user = new User();

            $user->setlastName($faker->lastName());
            $user->setfirstName($faker->firstName());
         
            $user->setTelephone($faker->randomElement(['0235569852', '0335569852', '0435569852','0535569852']));
            $user->setEmail($faker->email());
          
            $user->setRoles([$faker->randomElement(['ROLE_USER', 'ROLE_ADMIN'])]);
            $user->setPassword($faker->password());

            //$manager->persist($user);
        }

        //$manager->flush();
    }
}