<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\DateType;

class TaskType extends AbstractType
{
  /**
   * {@inheritdoc}
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('name')
     ->add('details')
     ->add('deadline', DateType::class, array(
       'widget' => 'single_text',

      // do not render as type="date", to avoid HTML5 date pickers
      'html5' => false,

      // add a class that can be selected in JavaScript
      'attr' => ['class' => 'datepicker'],
    ))

     ->add('priority', EntityType::class, [
            'class'=>'AppBundle:Priority',
            'choice_label'=>function($priority){
                return $priority->getName() . '(' . $priority->getWeight() . ')';
        }
    ])
    ->add('done');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_task';
    }


}
