<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\PanierService;



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
        return $this->render('panier/index.html.twig', []);
    }


    #[Route("/add/{plat_id}", name: 'add_plat')]
    public function add()
    {
        
    }


}
