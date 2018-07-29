<?php


namespace App\Form;


use App\Entity\Marque;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ModeleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', EntityType::class, [
                'class' => Marque:: class,
                'choice_label' => 'nom'
            ])
            ->add('nom', TextType::class)
            ->add('coeff_heure', TextType::class)
            ->add('coeff_kilometre', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}