<?php


namespace App\Form;

// use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\Extension\Core\Type\EmailType;
// use Symfony\Component\Form\Extension\Core\Type\FileType;
// use Symfony\Component\Form\Extension\Core\Type\PasswordType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, ['label' => 'Email :'])
            ->add('username', TextType::class, ['label' => 'Nom :'])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Mot de Passe : '),
                'second_options' => array('label' => 'Confirmer Mot de Passe : '),
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

}
