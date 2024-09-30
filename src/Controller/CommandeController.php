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
use App\Form\CommandeType;
use App\Entity\Commande;
use App\Entity\Detail;

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
                $this->denyAccessUnlessGranted('ROLE_CLIENT');
                $user=$this->getUser();
                $form=$this->createForm(CommandeType::class, $user);
                $form->handleRequest($request);

                    if ($form->isSubmitted() && $form->isValid()){
                        $total=$this->ps->getTotal();

                        $commande = new Commande();
                        $commande->setDateCommande(new \DateTimeImmutable());
                        $commande->setTotal($total);
                        $commande->setEtat(0);
                        $commande->setUtilisateur($user);
                        $this->cm->setCommande($commande);

                        foreach ($panier as $id => $quantite){
                            $plat=$this->platRepository->find($id);
                            $detail=new Detail();
                            $detail->setQuantite($quantite);
                            $detail->setCommande($commande);
                            $detail->setPlat($plat);
                            $entityManager->persist($detail);
                        }

                        $entityManager->flush();
                        $this->ps->DeleteAllPlat();
                        $this->addFlash('success','Vous allez être livré sous peu');

                        return $this->redirectToRoute('app_index');
                    }else{
                        return $this->render('commande/index.html.twig', [
                            'form' => $form
                        ]);
                    }

                    }else{
                        return $this->redirectToRoute('app_panier');
                    }
            }
        }