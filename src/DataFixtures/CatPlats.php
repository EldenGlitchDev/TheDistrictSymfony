<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CatPlats extends Fixture
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher=$passwordHasher;
    }



    public function load(ObjectManager $manager): void
    {
                    /* CATEGORIES */

        // Pizza

        $categoriePizza = new Categorie();
        $categoriePizza->setLibelle("Pizza");
        $categoriePizza->setImage("pizza_cat.jpg");
        $categoriePizza->setActive("Yes");
        $manager->persist($categoriePizza); //permet de spécifier à doctrine que l'entité $categoriePizza doit être persisté

        // Burger

        $categorieBurger = new Categorie();
        $categorieBurger->setLibelle("Burger");
        $categorieBurger->setImage("burger_cat.jpg");
        $categorieBurger->setActive("Yes");
        $manager->persist($categorieBurger);

        // Wraps

        $categorieWraps = new Categorie();
        $categorieWraps->setLibelle("Wraps");
        $categorieWraps->setImage("wrap_cat.jpg");
        $categorieWraps->setActive("Yes");
        $manager->persist($categorieWraps);

        // Pasta

        $categoriePasta = new Categorie();
        $categoriePasta->setLibelle("Pasta");
        $categoriePasta->setImage("pasta_cat.jpg");
        $categoriePasta->setActive("Yes");
        $manager->persist($categoriePasta);

        // Sandwich

        $categorieSandwich = new Categorie();
        $categorieSandwich->setLibelle("Sandwich");
        $categorieSandwich->setImage("sandwich_cat.jpg");
        $categorieSandwich->setActive("Yes");
        $manager->persist($categorieSandwich);

        // Salade

        $categorieSalade = new Categorie();
        $categorieSalade->setLibelle("Salade");
        $categorieSalade->setImage("salade_cat.jpg");
        $categorieSalade->setActive("Yes");
        $manager->persist($categorieSalade);


                    /* PLATS */


        // Pizza bianca

        $platPizzaBianca = new Plat();
        $platPizzaBianca->setLibelle("Pizza Bianca");
        $platPizzaBianca->setDescription("Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.");
        $platPizzaBianca->setPrix("14.00");
        $platPizzaBianca->setImage("pizza-salmon.png");
        $platPizzaBianca->setActive("Yes");
        $platPizzaBianca->setCategorie($categoriePizza);
        $manager->persist($platPizzaBianca);

        // Pizza Margherita

        $platPizzaMargherita = new Plat();
        $platPizzaMargherita->setLibelle("Pizza Margherita");
        $platPizzaMargherita->setDescription("Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...");
        $platPizzaMargherita->setPrix("14.00");
        $platPizzaMargherita->setImage("pizza-margherita.jpg");
        $platPizzaMargherita->setActive("Yes");
        $platPizzaMargherita->setCategorie($categoriePizza);
        $manager->persist($platPizzaMargherita);

        // District Burger

        $platDistrictBurger = new Plat();
        $platDistrictBurger->setLibelle("District Burger");
        $platDistrictBurger->setDescription("Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits...");
        $platDistrictBurger->setPrix("8.00");
        $platDistrictBurger->setImage("hamburger.jpg");
        $platDistrictBurger->setActive("Yes");
        $platDistrictBurger->setCategorie($categorieBurger);
        $manager->persist($platDistrictBurger);

        // Cheesburger

        $platCheesburger = new Plat();
        $platCheesburger->setLibelle("Cheeseburger");
        $platCheesburger->setDescription("Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.");
        $platCheesburger->setPrix("8.00");
        $platCheesburger->setImage("cheesburger.jpg");
        $platCheesburger->setActive("Yes");
        $platCheesburger->setCategorie($categorieBurger);
        $manager->persist($platCheesburger);

        // Buffalo Chicken Wrap

        $platBuffaloChickenWrap = new Plat();
        $platBuffaloChickenWrap->setLibelle("Buffalo Chicken Wrap");
        $platBuffaloChickenWrap->setDescription("Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.");
        $platBuffaloChickenWrap->setPrix("5.00");
        $platBuffaloChickenWrap->setImage("buffalo-chicken.webp");
        $platBuffaloChickenWrap->setActive("Yes");
        $platBuffaloChickenWrap->setCategorie($categorieWraps);
        $manager->persist($platBuffaloChickenWrap);

        // Spaghetti aux légumes

        $platSpaghettiLegumes = new Plat();
        $platSpaghettiLegumes->setLibelle("Spaghetti aux légumes");
        $platSpaghettiLegumes->setDescription("Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide.");
        $platSpaghettiLegumes->setPrix("10.00");
        $platSpaghettiLegumes->setImage("spaghetti-legumes.jpg");
        $platSpaghettiLegumes->setActive("Yes");
        $platSpaghettiLegumes->setCategorie($categoriePasta);
        $manager->persist($platSpaghettiLegumes);

        // Lasagnes

        $platsLasagnes = new Plat();
        $platsLasagnes->setLibelle("Lasagnes");
        $platsLasagnes->setDescription("Découvrez notre recette des lasagnes, l'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.");
        $platsLasagnes->setPrix("12.00");
        $platsLasagnes->setImage("lasagnes_viande.jpg");
        $platsLasagnes->setActive("Yes");
        $platsLasagnes->setCategorie($categoriePasta);
        $manager->persist($platsLasagnes);

        // Tagliatelles au saumon

        $platsTagliatellesSaumon = new Plat();
        $platsTagliatellesSaumon->setLibelle("Tagliatelles au saumon");
        $platsTagliatellesSaumon->setDescription("Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal !");
        $platsTagliatellesSaumon->setPrix("12.00");
        $platsTagliatellesSaumon->setImage("tagliatelles_saumon.webp");
        $platsTagliatellesSaumon->setActive("Yes");
        $platsTagliatellesSaumon->setCategorie($categoriePasta);
        $manager->persist($platsTagliatellesSaumon);

        // Salade César

        $platsSaladeCesar = new Plat();
        $platsSaladeCesar->setLibelle("Salade César");
        $platsSaladeCesar->setDescription("Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.");
        $platsSaladeCesar->setPrix("7.00");
        $platsSaladeCesar->setImage("cesar_salad.jpg");
        $platsSaladeCesar->setActive("Yes");
        $platsSaladeCesar->setCategorie($categorieSalade);
        $manager->persist($platsSaladeCesar);


                    /* UTILISATEURS */

        // Utilisateur 1

        $user1 = new User();
        $user1->setEmail('emailUtil1@gmail.com');
        $user1->setPassword('hihi');

        $Password='hihi';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user1,
            $Password
        );

        $user1->setPassword($hashedPassword);
        $user1->setNom('Jean');
        $user1->setPrenom('Pierre');
        $user1->setCp('75000');
        $user1->setVille('Paris');
        $user1->setAdresse('12 rue de la paix');
        $user1->setTelephone('0123456789');
        $user1->setRoles(['ROLE_ADMIN']);

        $manager->persist($user1);


        // Utilisateur 2

        $user2 = new User();
        $user2->setEmail('emailUtil2@gmail.com');
        $user2->setPassword('hoho');

        $Password='hoho';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user2,
            $Password
        );

        $user2->setPassword($hashedPassword);
        $user2->setNom('Bruno');
        $user2->setPrenom('Sapristi');
        $user2->setCp('80000');
        $user2->setVille('Amiens');
        $user2->setAdresse('66 rue de la guerre');
        $user2->setTelephone('0189745621');
        $user2->setRoles(['ROLE_CHEF']);

        $manager->persist($user2);


        $manager->flush(); //génération du code SQL pour mettre à jour la BDD
    }
}
