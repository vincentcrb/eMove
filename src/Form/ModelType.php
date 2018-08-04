<?php


namespace App\Form;


use App\Entity\Brand;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ModelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand', EntityType::class, [
                'class' => Brand:: class,
                'choice_label' => 'name'
            ])
            ->add('name', TextType::class)
            ->add('hour_rate', TextType::class)
            ->add('kilometer_rate', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}