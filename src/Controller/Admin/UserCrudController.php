<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('email'),
            ArrayField::new('roles') // Affiche les rôles sous forme de tableau
                ->hideOnForm(), // Masque le champ dans le formulaire
            ChoiceField::new('roles')
                ->setChoices([
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                ])
                ->setFormTypeOptions([
                    'multiple' => true,
                    'expanded' => true,
                ])
                ->onlyOnForms(), // Affiche ce champ seulement dans le formulaire
            TextField::new('password')
                ->hideOnIndex() // Masque le champ sur la liste des utilisateurs
                ->setFormType(PasswordType::class), // Utilise un type de formulaire pour les mots de passe
        ];
    }
}
