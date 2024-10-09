<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Sequentially;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                'label' => 'Nom*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12 rounded-pill'],
                'constraints' => new Sequentially([
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'match' => 'true',
                        'message' => "Veuillez saisir un nom valide, sans caractères numérique."
                    ])
                ])
            ])
            ->add('prenom', TextType::class, [
                'required' => false,
                'label' => 'Prénom',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12 rounded-pill'],
                'constraints' => new Sequentially([
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'match' => 'true',
                        'message' => "Veuillez saisir un nom valide, sans caractères numérique."
                    ])
                ])
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Email*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12 rounded-pill'],
                'constraints' => new Sequentially([
                    new Regex([
                        'pattern' => '/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/',
                        'match' => 'true',
                        'message' => "Veuillez saisir un email valide."
                    ])
                ])
            ])
            ->add('telephone', TextType::class, [
                'required' => true,
                'label' => 'Téléphone*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12 rounded-pill'],
                'constraints' => new Sequentially([
                    new Regex([
                        'pattern' => '/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/',
                        'match' => 'true',
                        'message' => "Veuillez saisir un numéro de téléphone valide."
                    ])
                ])
            ])
            ->add('adresse_facturation', TextareaType::class, [
                'required' => true,
                'label' => 'Adresse de facturation*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12 rounded-pill']
            ])
            ->add('adresse_livraison', TextareaType::class, [
                'required' => true,
                'label' => 'Adresse de livraison*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12 rounded-pill']
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
                'expanded' => false,

                'multiple' => false,
                'placeholder' => 'Sélectionnez un moyen de paiement.',
                'attr' => [
                    'class' => 'rounded-pill'
                ],
            ])
            ->add('check',  CheckboxType::class, [
                'label' => 'Accepter les CGU',
                'attr' => [
                    'class' => 'form-check-input rounded-pill'
                ],
                'mapped' => false,
                'required' => true,
                'label_attr' => ['id' => 'checkboxCGU']
                
            ])
            ->add('envoyer', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['class' => 'btn btn-primary col-2 mb-4 rounded-pill']
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
