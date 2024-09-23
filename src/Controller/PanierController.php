<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\PanierService;
use App\Entity\Plat;



class PanierController extends AbstractController
{

    private $PS;

    public function __construct(PanierService $PanierService)
    {
        $this->PS=$PanierService;
    }

    #[Route('/panier', name: 'app_panier')]
    public function index(): Response
    {
        $panier = $this->PS->ShowPanier();
        $dataPanier = $this->PS->ShowDataPanier();
        $total = $this->PS->getTotal();
        count($dataPanier);
        return $this->render('panier/index.html.twig', compact("dataPanier", "total"));
    }


    #[Route("/panier/ajout/{id}", name: 'app_ajout_panier', requirements: ['id' => '\d+'])]
    public function AjoutPlat(Plat $plat): Response
    {
        $this->PS->AddPlat($plat); // prends le AddPlat du PanierService.php
        return $this->redirectToRoute("app_panier");
    }

    #[Route('/panier/enlever/{id}', name: 'app_enlever_panier', requirements: ['id' => '\d+'])]
    public function RemoveQuantite(Plat $plat): Response
    {
        $this->PS->RemoveQuantity($plat);
        return $this->redirectToRoute("app_panier");
    }

    #[Route('/panier/supprimer/{id}]', name: 'app_supprimer_panier', requirements: ['id' => '\d+'])]
    public function SupprimerPlat(Plat $plat): Response
    {
        $this->PS->DeletePlat($plat);
        return $this->redirectToRoute("app_panier");
    }

    #[Route('/panier/supprimer/all', name: 'app_supprimer_tout_panier')]
    public function SupprimerToutPanier(): Response
    {
        $this->PS->DeleteAllPlat();
        return $this->redirectToRoute("app_panier");
    }


}
