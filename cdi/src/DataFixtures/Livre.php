<?php
namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Livre;
use App\Entity\Category;
use Faker\Factory;

class LivreFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $categories = [];
        for ($i = 0; $i < 3; $i++) {
            $category = new Category();
            $category->setName($faker->unique()->word); // Utilisation de unique() pour éviter les doublons
            $manager->persist($category);
            $categories[] = $category;
        }
    
        // Créer d'autres catégories prédéfinies
        $categoryTitles = ['Sciences', 'Roman', 'SFiction', 'Biographie', 'Polar', 'Guide'];
        foreach ($categoryTitles as $title) {
            $category = new Category();
            $category->setName($title);
            $manager->persist($category);
            $categories[] = $category;
        }
        // Créer des livres associés à des catégories
        for ($i = 0; $i < 20; $i++) {
            $livre = new Livre();
            $livre->setTitre($faker->sentence);
            $livre->setAuteur($faker->name);
            $livre->setCategory($faker->randomElement($categories));
            // Ajouter d'autres propriétés au besoin

            $manager->persist($livre);
        }

        $manager->flush();
    }
}
