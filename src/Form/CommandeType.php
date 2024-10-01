<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_commande', null, [
                'widget' => 'single_text'
            ])
            ->add('total')
            ->add('etat')
            ->add('utilisateur', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('nom', TextType::class, [
                'required' => true,
                'label' => 'Nom*',
                'label_attr' => ['id' => 'label_form']
            ])
            ->add('prenom', TextType::class, [
                'required' => false,
                'label' => 'Prénom',
                'label_attr' => ['id' => 'label_form']
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Email*',
                'label_attr' => ['id' => 'label_form']
            ])
            ->add('telephone', TextType::class, [
                'required' => true,
                'label' => 'Téléphone*',
                'label_attr' => ['id' => 'label_form']
            ])
            ->add('adresse', TextareaType::class, [
                'required' => true,
                'label' => 'Adresse de livraison*',
                'label_attr' => ['id' => 'label_form']
            ])
            ->add('envoyer', SubmitType::class, [
                'label' => 'Envoyer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
