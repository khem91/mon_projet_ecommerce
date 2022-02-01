<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'label' => 'Nom du plat',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ecrire ici le nom...'
                ]
            ])
            ->add('description',TextType::class,[
                'label' => 'Description de la catégorie',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ecrire ici la description'
                ]
            ])
            ->add('price',MoneyType::class,[
                'label' => 'Prix du plat',
                'required' => false,
                'divisor' => 100
            ])
            ->add('image',TextType::class,[
                'label' => 'Image du plat',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ajouter le chemin de l\'image ici'
                ]
            ])
            ->add('category',EntityType::class, [
                'label' => 'Choisir la catégorie',
                'placeholder' => '-- Choisir --',
                'required' => false,
                'class' => Category::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
