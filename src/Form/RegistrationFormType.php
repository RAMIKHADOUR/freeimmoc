<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class,[
            'attr'=>['class'=>'form-control','minlength'=>'2','maxlength'=>'50'],
         
         
            'constraints'=>[new NotBlank(),new Assert\Length(['min'=>2,'max'=> 50])]])

        ->add('prenom',TextType::class,[
            'attr'=>['class'=>'form-control','minlength'=>'2','maxlength'=>'50'],
         
            'label_attr'=>['class'=>'form-label'],
            'constraints'=>[new Assert\NotBlank(),new Assert\Length(['min'=>2, 'max'=>50])]])

        ->add('mobile',TextType::class,[
            'attr'=>['class'=>'form-control'],
       
            'label_attr'=>['class'=>'form-label'],
            'constraints'=>[new Assert\NotBlank()]])
        ->add('tele_fixe',TextType::class,[
            'attr'=>['class'=>'form-control','minlength'=>'2','maxlength'=>'10'],
   
            'label_attr'=>['class'=>'form-label'],
            'constraints'=>[new Assert\NotBlank()]])

             ->add('tele_fixe',TextType::class,[
            'attr'=>['class'=>'form-control','minlength'=>'2','maxlength'=>'10'],
            'label'=>'Télé-Fixe',
            'label_attr'=>['class'=>'form-label'],
            'constraints'=>[new Assert\NotBlank()]])
        ->add('adresse',TextType::class,[
            'attr'=>['class'=>'form-control','minlength' =>'2','maxlength'=>'100'],
            'label'=>'Adresse',
            'label_attr'=>['class'=>'form-label'],
            'constraints'=>[new NotBlank(),new Assert\Length(['min'=>2,'max'=>100])]])

        ->add('ville',TextType::class,[
            'attr'=>['class'=>'form-control','minlength'=>'2','maxlength'=>'50'],
            'label'=>'Ville',
            'label_attr'=>['class'=>'form-label'],
            'constraints'=>[new NotBlank(),new Assert\Length(['min'=>2,'max'=>50])]])
        ->add('codepostale',TextType::class,[
            'attr'=>['class'=>'form-control'],
            'label'=>'Code-Postale',
            'label_attr'=>['class'=>'form-label'],
            'constraints'=>[new Assert\NotBlank()]])

        ->add('email')
        ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
        ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer le mot de passe'],
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
