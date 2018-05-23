<?php

namespace App\Form;

use App\Entity\Mascota;
use App\Entity\Consulta;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class MascotaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('animal')
            ->add('fechanac', DateType::class, array(
            'label' => 'Date',
            'format' => 'dd MM yyyy',
            'required' => true
            ))
         

            ->add('guardar', SubmitType::class, array('attr' => array('class' => 'btn btn-success'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mascota::class,
        ]);
    }
}
