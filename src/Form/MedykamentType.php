<?php

namespace App\Form;

use App\Entity\Medykament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extensions\Core\Type\ChoiceType;

class MedykamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datawaznosci')
            ->add('ilosc')
            ->add('slowniklekow', ChoiceType::class, [
                'choices' => [
                    'asd' => 'asd'
                ]
            ])
            // ->add('apteczka')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medykament::class,
        ]);
    }
}
