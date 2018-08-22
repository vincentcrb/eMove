<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_start', DateType::class, array(
                'widget' => 'single_text',
                //'html5' => false,
                //'attr' => ['class' => 'form-control datepicker js-datepicker'],
                'format' => 'yyyy-MM-dd',
            ))
            ->add('date_end', DateType::class, array(
                'widget' => 'single_text',
                //'html5' => false,
                //'attr' => ['class' => 'form-control datepicker js-datepicker'],
                'format' => 'yyyy-MM-dd',
            ))
            ->add('save', SubmitType::class, array(
                'attr' => ['class' => 'btn btn-primary'],
            ))
        ;
    }
}