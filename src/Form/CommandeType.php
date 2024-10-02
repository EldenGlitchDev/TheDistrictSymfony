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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
            ->add('adresse_facturation', TextareaType::class, [
                'required' => true,
                'label' => 'Adresse de facturation*',
                'label_attr' => ['id' => 'label_form']
            ])
            ->add('adresse_livraison', TextareaType::class, [
                'required' => true,
                'label' => 'Adresse de livraison*',
                'label_attr' => ['id' => 'label_form']
            ])
            ->add('mode_paiement', ChoiceType::class, [
                'required' => true,
                'label' => 'Moyen de paiement*',
                'label_attr' => ['id' => 'label_form'],
                'choices' => [
                    'Visa' => 'Visa',
                    'MasterCard' => 'MasterCard',
                    'Paypal' => 'Paypal',
                ],
                'expanded' => false, // The expanded option is set to false to render the choices as a dropdown menu instead of a list of radio buttons or checkboxes

                'multiple' => false, // The multiple option is set to false to allow only one option to be selected.
                'placeholder' => 'Sélectionnez un moyen de paiement.'
            ])
            ->add('envoyer', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
