<?php

namespace App\Form;

use App\Entity\Portfolio\Category;
use App\Entity\Portfolio\Feature;
use App\Entity\Portfolio\Project;
use App\Entity\Portfolio\Skill;
use App\Entity\Portfolio\State;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('version', NumberType::class, [])
            ->add('githubRepository')
            ->add('description', TextareaType::class, [
                'attr' => array(
                    'rows' => 6
                )
            ])
            ->add('client_name')
            ->add('start_date', DateType::class, [

            ])
            ->add('end_date', DateType::class, [

            ])
            ->add('isPublished',ChoiceType::class, [
                'mapped' => true,
                'expanded' => false,
                'choices' => array(
                    "Publier" => 1,
                    "Non publier" => 1,
                )
            ])
            ->add('projectLink')
            ->add('state', EntityType::class, [
                'class' => State::class,
                'choice_label' => 'title',
                'choice_value' => 'id',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('skills',EntityType::class, [
                'class' => Skill::class,
                'choice_label' => 'title',
                'choice_value' => 'id',
                'multiple' => true,
                'expanded' => false,
                'data' => $options['data']->getSkills()
            ])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title',
                'choice_value' => 'id',
                'multiple' => true,
                'expanded' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
