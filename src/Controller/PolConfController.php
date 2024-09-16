<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PolConfController extends AbstractController
{
    #[Route('/pol/conf', name: 'app_pol_conf')]
    public function index(): Response
    {
        return $this->render('pol_conf/index.html.twig', [
            'controller_name' => 'PolConfController',
        ]);
    }
}
