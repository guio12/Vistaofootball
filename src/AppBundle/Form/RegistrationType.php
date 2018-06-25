<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormTypeInterface;
use Doctrine\DBAL\Types\TextType;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('nom_club', \Symfony\Component\Form\Extension\Core\Type\TextType::class, array('attr' => array('maxlength' => 50, 'empty_data' => '', 'required' => true)));
    }/**
 * {@inheritdoc}
 */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user_registration';
    }

}