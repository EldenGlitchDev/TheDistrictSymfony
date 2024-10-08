<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{

    private $categorieRepository;
    private $platRepository;

    public function __construct(CategorieRepository $categorieRepository, PlatRepository $platRepository)
    {
        $this->categorieRepository=$categorieRepository;
        $this->platRepository=$platRepository;
    }


    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $categories = $this->categorieRepository->findAll();
        $plats = $this->platRepository->findAll();

        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
            'categories' => $categories,
            'plats' => $plats,
        ]);
    }

    #[Route('/plats', name: 'app_plat')]
    public function showplats(): Response
    {
        $plats = $this->platRepository->findAll();

        return $this->render('catalogue/plat.html.twig', [
            'controller_name' => 'CatalogueController',
            'plats' => $plats,
        ]);
    }

    #[Route('/plats/{categorie_id}', name: 'app_platcat', requirements: ['categorie_id' => '\d+'])]
    public function showplatscat(int $categorie_id): Response
    {
        $categorie = $this->categorieRepository->find($categorie_id);
        $plats = $this->platRepository->findBy(['categorie' => $categorie->getId()]);
        return $this->render('catalogue/platsparcategorie.html.twig', [
            'controller_name' => 'CatalogueController',
            'plats' => $plats,
            'categorie' => $categorie
        ]);
    }
    
    #[Route('/categories', name: 'app_categorie')]
    public function showcategorie(): Response
    {
        $categorie = $this->categorieRepository->findAll();

        return $this->render('catalogue/categorie.html.twig', [
            'controller_name' => 'CatalogueController',
            'categories' => $categorie,
        ]);
    }

    #Route temporaire pour la page contact

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {

        return $this->render('catalogue/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #Route temporaire pour le panier

    /* #[Route('/panier', name: 'app_panier')]
    public function panier(): Response
    {
        return $this->render('catalogue/panier.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }*/

    #Route pour mentions légales

    #[Route('/mentions_legales', name:'app_mentions_leg')]
    public function mentionLeg(): Response
    {
        return $this->render('catalogue\mentions_legales.html.twig', [
            'controller_name' => 'MentionsLegController',
            ] );
    }

    #Route pour politique de confidentialité

    #[Route('/pol_conf', name:'app_pol_conf')]
    public function polConf(): Response
    {
        return $this->render('catalogue\pol_conf.html.twig', [
            'controller_name' => 'PolConfController',
            ] );
    }

    #Route pour CGU

    #[Route('/cgu', name:'app_cgu')]
    public function cgu(): Response
    {
        return $this->render('mentions_leg/CGU.html.twig', [
            'controller_name' => 'CGUController',
        ] );
    }

}
