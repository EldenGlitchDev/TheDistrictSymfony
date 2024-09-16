<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MentionsLegController extends AbstractController
{
    #[Route('/mentions/leg', name: 'app_mentions_leg')]
    public function index(): Response
    {
        return $this->render('mentions_leg/index.html.twig', [
            'controller_name' => 'MentionsLegController',
        ]);
    }
}
