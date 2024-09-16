<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {

        $contact = new Contact();

        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $contact = $form->getData();
                $entityManager->persist($contact);
                $entityManager->flush();

                $email = (new Email())
                ->from('thedistrict@laposte.fr')
                ->to('exemple@ex.com')
                ->subject('Confirmation de contact')
                ->text('Bonjour !
                Nous avons bien reçu votre mail. Nous allons examiner votre demande et nous vous contacterons dans les plus brefs délais.
                Cordialement,
                l\'équipe The District.');

                try {
                    $mailer->send($email);
                } catch (TransportExceptionInterface $e) {

                }
                return $this->redirectToRoute('app_index');
            }







        return $this->render('contact/index.html.twig', [
                'form' => $form
        ]);
    }
}
