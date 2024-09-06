<?php

namespace App\Form;

use App\Entity\Calendar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class CalendarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un titre',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Le titre ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Entrez le titre de l\'événement',
                    'class' => 'form-control mb-3',
                ],
            ])
            ->add('start', DateTimeType::class, [
                'label' => 'Date et heure de début',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control datetimepicker mb-3',
                ],
            ])
            ->add('endd', DateTimeType::class, [
                'label' => 'Date et heure de fin',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control datetimepicker mb-3',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Entrez une courte description de l\'événement',
                    'class' => 'form-control mb-3',
                    'rows' => 5,
                ],
            ])
            ->add('all_day', CheckboxType::class, [
                'label' => 'Événement sur toute la journée',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input mb-3',
                ],
            ])
            ->add('background_color', ColorType::class, [
                'label' => 'Couleur de fond',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
            ])
            ->add('border_color', ColorType::class, [
                'label' => 'Couleur de la bordure',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
            ])
            ->add('text_color', ColorType::class, [
                'label' => 'Couleur du texte',
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calendar::class,
        ]);
    }
}


































