<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Créer quelques catégories de livres
        $categories = [];
        for ($i = 0; $i < 3; $i++) {
            $category = new Category();
            $category->setName($faker->word);
            $manager->persist($category);
            $categories[] = $category;
        }

        // Créer des livres associés à des catégories
        for ($i = 0; $i < 20; $i++) {
            $livre = new Livre();
            $livre->setTitre($faker->sentence);
            $livre->setAuteur($faker->name);
            $livre->setImage($faker->imageUrl()); // Vous devrez adapter cela à votre propre logique de gestion des images
            $livre->setEditeur($faker->company);
            $livre->setCategory($faker->randomElement($categories));

            $manager->persist($livre);
        }

        $manager->flush();
    }
}
