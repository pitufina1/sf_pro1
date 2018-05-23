<?php

namespace App\Form;

use App\Entity\Consulta;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('fechahora', DateTimeType::class, array(
            'label' => 'DateTime',
            'format' => 'dd MM yyyy',
            'required' => true
            ))
            ->add('descripcion')
            ->add('importe')
            ->add('mascota')
            ->add('guardar', SubmitType::class, array('attr' => array('class' => 'btn btn-success'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consulta::class,
        ]);
    }
}
