<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\Model;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand', EntityType::class, [
                'class' => Brand:: class,
                'choice_label' => 'name'
            ])
            ->add('model', EntityType::class, [
                'class' => Model:: class,
                'choice_label' => 'name'
            ])
            ->add('serial_number', TextType::class)
            ->add('color', TextType::class)
            ->add('license_plate', TextType::class)
            ->add('kilometers', NumberType::class)
            ->add('purchase_date', DateType::class)
            ->add('price', MoneyType::class)
            ->add('save', SubmitType::class)
        ;
    }
}