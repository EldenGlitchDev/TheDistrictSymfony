<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
                'label' => 'Nom*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12']
                ])
            ->add('prenom', TextType::class, [
                'required' => false,
                'label' => 'Prénom',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12']
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Email*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12']
            ])
            ->add('telephone', TextType::class, [
                'required' => true,
                'label' => 'Téléphone*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12']
            ])
            ->add('demande', TextareaType::class, [
                'required' => true,
                'label' => 'Votre demande*',
                'label_attr' => ['id' => 'label_form'],
                'attr' => ['class' => 'form-label col-12']
            ])
            ->add('envoyer', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['class' => 'btn btn-primary col-2 mb-4']
                ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
