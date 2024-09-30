<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use App\Service\PanierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Manager\CommandeManager;
use App\Manager\DetailManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CommandeController extends AbstractController
{

    private $platRepository;
    private $ps;
    private $cm;
    private $dm;

    public function __construct(PlatRepository $platRepository, PanierService $ps, CommandeManager $cm, DetailManager $dm)
    {
        $this->platRepository=$platRepository;
        $this->ps=$ps;
        $this->cm=$cm;
        $this->dm=$dm;
    }


    #[Route('/commande', name: 'app_commande')]
    public function index(Request $request, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
            $panier = $this->ps->ShowPanier();

            if (!empty($panier)){
                
            }
        










        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
}
