<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 30/01/18
 * Time: 23:29
 */

namespace App\Form;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add('firstName', TextType::class, array( 'label' => 'Prénom:'))
            ->add('lastName', TextType::class, array('label' => 'Nom:'))
            ->add('age', IntegerType::class, array('label' => 'Age:'))
            ->add('address1', TextType::class, array('label' => 'Adresse:'))
            ->add('address2', TextType::class, array(
                'label' => 'Complément d\'adresse:',
                'required' => false,
                ))
            ->add('postalCode', IntegerType::class, array('label' => 'Code Postal:'))
            ->add('city', TextType::class, array('label' => 'Ville:'))
            ->add('country', CountryType::class, array('label' => 'Pays:'))
            ->add('email', EmailType::class, array('label' => 'Email:'))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeated Password'),
                'label' => 'Mot de Passe:',))
            ->add('submit', SubmitType::class, array('label' => 'Envoyer')
            );
    }

    public function configureOptions(OptionsResolver $resolver){

        $resolver->setDefaults(array(
            'data_class' => User::class
        ));
    }
}