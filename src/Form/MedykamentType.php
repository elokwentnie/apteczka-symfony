<?php

namespace App\Form;

use App\Entity\Medykament;
use App\Repository\ListalekowRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;

class MedykamentType extends AbstractType
{
    private $lRepo;
    public function __construct(ListalekowRepository $lRepo) {
        $this->lRepo = $lRepo;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datawaznosci')
            ->add('ilosc')
            ->add('slowniklekow', ChoiceType::class, [
                'choices' => array_flip($this->lRepo->getChoices()),
                'attr' => [
                    'class' => 'asd'
                ]
            ]);

            $builder->get('slowniklekow')
            ->addModelTransformer(new CallbackTransformer(
                function ($val) {
                    // transform the array to a string
                    return $val ? $val->getId() : null;
                },
                function ($val) {
                    // transform the strin4this0.lRepog back to an array
                    return !$val ? null : $this->lRepo->find($val);
                }
            ))
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medykament::class,
        ]);
    }
}
