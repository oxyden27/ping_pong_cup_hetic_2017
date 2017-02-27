<?php

namespace HETIC\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class StartupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',        TextType::class, array('label' => 'Nom de la société', 'attr' => array('class' => 'form-control')))
            ->add('description', TextareaType::class, array('label' => 'Description', 'attr' => array('class' => 'form-control', 'rows' => '8')))
            ->add('type',        TextType::class, array('label' => 'Type de structure', 'attr' => array('class' => 'form-control')))
            ->add('imageFile',   VichFileType::class, array('label' => 'Bannière', 'required' => false, 'attr' => array('class' => '')))
            ->add('logoFile',    VichFileType::class, array('label' => 'Logo', 'required' => false, 'attr' => array('class' => '')))
            ->add('liveUrl',     TextType::class, array('label' => 'Lien du live', 'attr' => array('class' => 'form-control')))
            ->add('save',        SubmitType::class, array('label' => 'Modifer', 'attr' => array('class' => 'btn btn-primary')))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HETIC\CoreBundle\Entity\Startup'
        ));
    }
}
