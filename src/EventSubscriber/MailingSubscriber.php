<?php

namespace App\EventSubscriber;

use App\Event\CommandeEvent;
use App\Event\ContactEvent;
use App\Service\MailService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailingSubscriber implements EventSubscriberInterface
{
    private $mailservice;

    public function __construct(MailService $mailService)
    {
        $this->mailservice = $mailService;
    }

    public function SendMailEventCommande(CommandeEvent $event)
    {
        $commande = $event->getCommande();
        $parameters = [
            "user" => $commande->getUtilisateur(), //peut etre erreur ici
            "commande" => $commande,
            "details" => $commande->getDetails(),
            "dateJour" => date("d-m-Y"),
            "heure" => date("H:m"),
            "dateLivraison" => date('H:i:s', strtotime('+30 minutes', strtotime(date('H:i:s'))))
        ];

        $this->mailservice->sendMailCommande(
            'thedistrict@laposte.fr',
            $commande->getUtilisateur(),
            'Commande N°' .$commande->getId(),
            CommandeEvent::TEMPLATE_COMMANDE,
            $parameters
        );
    }

    public function SendMailEventContact(ContactEvent $event){
        $contact = $event->getContact();
        // (string $emailpros ,string $emailclient, string $Nom,string $template,array $parameters)
    
        $parameters = [
            "contact" => $contact,
            "Demande" => $contact->getDemande(),
        ];

            $this->mailservice->sendMailContact(
                'random@gmail.com',
                $contact->getEmail(),
                $contact->getNom(),
                ContactEvent::TEMPLATE_CONTACT,
                $parameters);}
    

                public static function getSubscribedEvents(): array{
                    return[
                        CommandeEvent::class => [
                            ['SendMailEventCommande',1]
                        ],
                        ContactEvent::class => [
                            ['SendMailEventContact',2]
                        ]
                    ];
                }
}