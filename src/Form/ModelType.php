<?php


namespace App\Form;


use App\Entity\Brand;
use App\Entity\Classification;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('classification', EntityType::class, [
                'class' => Classification:: class,
                'choice_label' => 'name'
            ])
            ->add('type', EntityType::class, [
                'class' => Type:: class,
                'choice_label' => 'name'
            ])
            ->add('name', TextType::class)
            ->add('image', FileType::class, array('label' => 'Image JPG, PNG'))
            ->add('save', SubmitType::class)
        ;
    }
}