<?php
/**
 * Created by PhpStorm.
 * User: andderson
 * Date: 16/12/18
 * Time: 23:15
 */
namespace HTM\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('registration', SubmitType::class, array('label' => 'Subscribe'))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array(
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'autocomplete' => 'new-password'
                    ),
                ),
                'first_options' => array('attr' => array('class' => 'login__input', 'placeholder'=>'Password'), 'label' => ' '),
                'second_options' => array('attr' => array('class' => 'login__input', 'placeholder'=>'Password Confirmation'), 'label' => ' '),
                'invalid_message' => 'fos_user.password.mismatch',
            ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    /*public function getName()
    {
        return $this->getBlockPrefix();
    }*/
}