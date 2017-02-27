<?php

namespace HETIC\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use HETIC\CoreBundle\Form\StartupType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname',   TextType::class, array('label' => 'Nom'))
            ->add('firstname',  TextType::class, array('label' => 'Prénom'))
            ->add('phone',      TextType::class, array('label' => 'Téléphone'))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getName()
    {
        return 'user_registration';
    }
}
