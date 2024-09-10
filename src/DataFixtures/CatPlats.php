<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Plat;

class CatPlats extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $categoriePizza = new Categorie();
        $categoriePizza->setLibelle("Pizza");
        $categoriePizza->setImage("/img/pizza_cat.jpg");
        $categoriePizza->setActive("Yes");
        $manager->persist($categoriePizza); //permet de spécifier à doctrine que l'entité $categoriePizza doit être persisté







        $manager->flush(); //génération du code SQL pour mettre à jour la BDD
    }
}
