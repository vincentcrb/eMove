<?php

namespace App\Form;

use App\Entity\Marque;
use App\Entity\Modele;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', EntityType::class, [
                'class' => Marque:: class,
                'choice_label' => 'nom'
            ])
            ->add('modele', EntityType::class, [
                'class' => Modele:: class,
                'choice_label' => 'nom'
            ])
            ->add('numero_serie', TextType::class)
            ->add('couleur', TextType::class)
            ->add('immatriculation', TextType::class)
            ->add('kilometrage', NumberType::class)
            ->add('date_achat', DateType::class)
            ->add('prix', MoneyType::class)
            ->add('save', SubmitType::class)
        ;
    }
}