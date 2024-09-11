<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'app_catalogue')]
    public function index(): Response
    {
        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

    #[Route('/panier', name: 'app_panier')]
    public function panier(): Response
    {
        return $this->render('catalogue/panier.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }

    #[Route('/commande', name: 'app_commande')]
    public function commande(): Response
    {
        return $this->render('catalogue/commande.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('catalogue/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

}
