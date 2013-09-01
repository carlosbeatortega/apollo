<?php
namespace Basico\EmpresaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EmpresasAdmin extends Admin
{
    //Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombre', 'text', array('label' => 'Nombre de Empresa'))
            ->add('direccion', 'text', array('label' => 'Dirección'))
            ->add('telefono', 'text', array('label' => 'Teléfono'))
            ->add('poblacion', 'text', array('label' => 'Población'))
            ->add('foto', 'file', array('label' => 'Imagen'))
            ->add('fechaalta', 'date', array('label' => 'Fecha Alta'))
            ->add('fechacreacion', 'date', array('label' => 'Fecha creación'))
            ->add('numero_cuenta', 'text', array('label' => 'Cuenta corriente'))
            ->add('notas', 'text', array('label' => 'Notas'))
            ->add('email', 'text', array('label' => 'Email'))
            ->add('password', 'text', array('label' => 'password'))
            ->add('calendario', 'text', array('label' => 'Calendario'))
        ;
    }

    //Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('poblacion')
        ;
    }

    //Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('poblacion')
        ;
    }
}
?>
