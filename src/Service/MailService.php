<?php

namespace App\Service;

use App\Entity\Commande;
use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class MailService
{
    private $mailer;
    private $twig;

    public function __construct(MailerInterface $mailer, Environment $twig)
    {
        $this->mailer=$mailer;
        $this->twig=$twig;
    }

    public function sendMailContact(string $emailDistrict, string $emailClient, string $nom, string $template, array $parameters)
    {
        $email = (new Email())
        ->from($emailDistrict)
        ->to($emailClient)
        ->subject($nom)
        ->html($this->twig->render($template, $parameters));

        $this->mailer->send($email);
    }

    public function sendMailCommande(string $emailDistrict, User $user, string $subject, string $template, array $parameters)
    {
        $email = (new Email())
        ->from($emailDistrict)
        ->to($user->getEmail())
        ->subject($subject)
        ->html($this->twig->render($template, $parameters));

        $this->mailer->send($email);
    }
}