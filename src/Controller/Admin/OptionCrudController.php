<?php

namespace App\Controller\Admin;

use App\Entity\Option;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\FormInterface;

class OptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Option::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->hideOnForm(),
            TextField::new('name', 'Параметр')->setFormTypeOptions([
                'attr' => [
                    'maxlength' => 100
                ]
            ])->setRequired(true),
            TextField::new('value', 'Значение'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function(Action $action){
                return $action->setIcon("");
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function(Action $action){
                return $action->setIcon("fa fa-edit");
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function(Action $action){
                return $action->setIcon("fa fa-eye");
            });
        //->update(Crud::PAGE_INDEX, Action::DELETE, function(Action $action){
        //    return $action->setIcon("fa fa-trash");
        //});
    }
}
